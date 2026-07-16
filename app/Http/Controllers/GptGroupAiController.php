<?php

namespace App\Http\Controllers;

use App\Ai\Agents\GptGroupAssistant;
use App\Http\Requests\GptGroupAiChatRequest;
use App\Models\AiLead;
use App\Models\AiUnansweredQuestion;
use App\Models\AiVisitor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Ai\Exceptions\ProviderOverloadedException;
use Laravel\Ai\Exceptions\RateLimitedException;
use RuntimeException;
use Symfony\Component\HttpFoundation\Cookie;
use Throwable;

class GptGroupAiController extends Controller
{
    /**
     * Send a message to GPT Group AI Assistant.
     */
    public function chat(
        GptGroupAiChatRequest $request
    ): JsonResponse {
        $validated = $request->validated();

        try {
            /*
            |--------------------------------------------------------------------------
            | Resolve or create visitor UUID
            |--------------------------------------------------------------------------
            */

            $visitorUuid = $request->cookie(
                'gpt_group_ai_visitor'
            ) ?: (string) Str::uuid();

            $language = $validated['language'] ?? 'en';

            /*
            |--------------------------------------------------------------------------
            | Create or update visitor
            |--------------------------------------------------------------------------
            */

            $visitor = AiVisitor::updateOrCreate(
                [
                    'uuid' => $visitorUuid,
                ],
                [
                    'language' => $language,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'last_seen_at' => now(),
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | Validate existing conversation
            |--------------------------------------------------------------------------
            */

            $conversationId =
                $validated['conversation_id'] ?? null;

            if (!empty($conversationId)) {
                $this->ensureConversationBelongsToVisitor(
                    conversationId: $conversationId,
                    visitor: $visitor
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Create request tracking token
            |--------------------------------------------------------------------------
            */

            $requestToken = (string) Str::uuid();

            /*
            |--------------------------------------------------------------------------
            | Create AI agent
            |--------------------------------------------------------------------------
            */

            $agent = GptGroupAssistant::make(
                visitor: $visitor,
                language: $language,
                requestToken: $requestToken,
                pageUrl: $validated['page_url'] ?? null
            );

            /*
            |--------------------------------------------------------------------------
            | Start or continue conversation
            |--------------------------------------------------------------------------
            */

            if (!empty($conversationId)) {
                $agent->continue(
                    $conversationId,
                    as: $visitor
                );
            } else {
                $agent->forUser($visitor);
            }

            /*
            |--------------------------------------------------------------------------
            | Provider configuration
            |--------------------------------------------------------------------------
            */

            $provider = config(
                'ai.default',
                'openai'
            );

            $model = config(
                'ai.model',
                env('AI_DEFAULT_MODEL', 'gpt-5-mini')
            );

            /*
            |--------------------------------------------------------------------------
            | Send prompt with retries
            |--------------------------------------------------------------------------
            */

            $response = retry(
                times: 3,

                callback: function () use (
                    $agent,
                    $validated,
                    $provider,
                    $model
                ) {
                    return $agent->prompt(
                        $validated['message'],
                        provider: $provider,
                        model: $model,
                        timeout: 120
                    );
                },

                sleepMilliseconds: function (
                    int $attempt
                ): int {
                    return $attempt * 2000;
                },

                when: function (
                    Throwable $exception
                ): bool {
                    return $exception
                        instanceof ProviderOverloadedException
                        || $exception
                        instanceof RateLimitedException;
                }
            );

            /*
            |--------------------------------------------------------------------------
            | Extract conversation ID and answer
            |--------------------------------------------------------------------------
            */

            $newConversationId =
                $response->conversationId ?? null;

            $answer = trim((string) $response);

            /*
            |--------------------------------------------------------------------------
            | Do not return success with an empty answer
            |--------------------------------------------------------------------------
            */

            if ($answer === '') {
                Log::warning(
                    'OpenAI returned an empty AI response.',
                    [
                        'provider' => $provider,
                        'model' => $model,
                        'visitor_id' => $visitor->id,
                        'conversation_id' =>
                            $newConversationId,
                        'response_class' =>
                            get_debug_type($response),
                    ]
                );

                throw new RuntimeException(
                    'AI_EMPTY_RESPONSE'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Update lead conversation ID
            |--------------------------------------------------------------------------
            */

            if (!empty($newConversationId)) {
                AiLead::query()
                    ->where(
                        'request_token',
                        $requestToken
                    )
                    ->update([
                        'agent_conversation_id' =>
                            $newConversationId,
                    ]);

                /*
                |--------------------------------------------------------------------------
                | Capture unanswered questions
                |--------------------------------------------------------------------------
                */

                $this->captureUnansweredQuestion(
                    visitor: $visitor,
                    conversationId:
                        $newConversationId,
                    question:
                        $validated['message'],
                    answer: $answer
                );
            } else {
                Log::warning(
                    'AI response conversation ID is missing.',
                    [
                        'provider' => $provider,
                        'model' => $model,
                        'visitor_id' => $visitor->id,
                    ]
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Create visitor cookie
            |--------------------------------------------------------------------------
            |
            | Positional arguments are being used because the installed Symfony
            | version may not support the same named arguments.
            |
            */

            $cookie = Cookie::create(
                'gpt_group_ai_visitor',
                $visitorUuid,
                now()->addYear(),
                '/',
                null,
                $request->isSecure(),
                true,
                false,
                Cookie::SAMESITE_LAX
            );

            /*
            |--------------------------------------------------------------------------
            | Success response
            |--------------------------------------------------------------------------
            */

            return response()
                ->json([
                    'success' => true,

                    'data' => [
                        'conversation_id' =>
                            $newConversationId
                            ?: $conversationId,

                        'message' => $answer,
                    ],
                ])
                ->withCookie($cookie);
        } catch (
            ProviderOverloadedException $exception
        ) {
            report($exception);

            return response()->json([
                'success' => false,

                'error_code' =>
                    'AI_PROVIDER_OVERLOADED',

                'message' =>
                    'The AI service is temporarily busy. Please wait a few seconds and try again.',
            ], 503);
        } catch (
            RateLimitedException $exception
        ) {
            report($exception);

            return response()->json([
                'success' => false,

                'error_code' =>
                    'AI_RATE_LIMITED',

                'message' =>
                    'The AI request limit has been reached. Please wait and try again.',
            ], 429);
        } catch (
            RuntimeException $exception
        ) {
            report($exception);

            if (
                $exception->getMessage()
                === 'AI_EMPTY_RESPONSE'
            ) {
                return response()->json([
                    'success' => false,

                    'error_code' =>
                        'AI_EMPTY_RESPONSE',

                    'message' =>
                        'The AI did not return an answer. Please try again.',
                ], 503);
            }

            return response()->json([
                'success' => false,

                'error_code' =>
                    'AI_RUNTIME_ERROR',

                'message' => app()->isProduction()
                    ? 'The GPT Group AI assistant is temporarily unavailable.'
                    : $exception->getMessage(),
            ], 500);
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,

                'error_code' =>
                    'AI_REQUEST_FAILED',

                'message' => app()->isProduction()
                    ? 'The GPT Group AI assistant is temporarily unavailable.'
                    : $exception->getMessage(),
            ], 500);
        }
    }

    /**
     * Get stored messages of a conversation.
     */
    public function messages(
        Request $request,
        string $conversationId
    ): JsonResponse {
        try {
            $visitor = $this->resolveVisitor(
                $request
            );

            $this->ensureConversationBelongsToVisitor(
                conversationId: $conversationId,
                visitor: $visitor
            );

            $messagesTable = config(
                'ai.conversations.tables.messages',
                'agent_conversation_messages'
            );

            $messages = DB::table($messagesTable)
                ->where(
                    'conversation_id',
                    $conversationId
                )
                ->whereIn('role', [
                    'user',
                    'assistant',
                ])
                ->orderBy('created_at')
                ->get([
                    'id',
                    'role',
                    'content',
                    'created_at',
                ]);

            return response()->json([
                'success' => true,
                'data' => $messages,
            ]);
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,
                'error_code' =>
                    'CONVERSATION_LOAD_FAILED',

                'message' =>
                    'Unable to load the conversation.',
            ], $exception->getCode() === 403 ? 403 : 500);
        }
    }

    /**
     * Resolve visitor from cookie.
     */
    private function resolveVisitor(
        Request $request
    ): AiVisitor {
        $visitorUuid = $request->cookie(
            'gpt_group_ai_visitor'
        );

        abort_unless(
            !empty($visitorUuid),
            403,
            'Visitor session is missing.'
        );

        return AiVisitor::query()
            ->where('uuid', $visitorUuid)
            ->firstOrFail();
    }

    /**
     * Ensure conversation belongs to current visitor.
     */
    private function ensureConversationBelongsToVisitor(
        string $conversationId,
        AiVisitor $visitor
    ): void {
        $conversationsTable = config(
            'ai.conversations.tables.conversations',
            'agent_conversations'
        );

        $exists = DB::table($conversationsTable)
            ->where('id', $conversationId)
            ->where('user_id', $visitor->id)
            ->exists();

        abort_unless(
            $exists,
            403,
            'This conversation does not belong to this visitor.'
        );
    }

    /**
     * Store questions that the assistant could not answer.
     */
    private function captureUnansweredQuestion(
        AiVisitor $visitor,
        string $conversationId,
        string $question,
        string $answer
    ): void {
        $normalizedAnswer = mb_strtolower(
            trim($answer)
        );

        if ($normalizedAnswer === '') {
            return;
        }

        $patterns = [
            'could not find',
            'cannot find',
            'information is not available',
            'not available in the official knowledge base',
            'mujhe jankari nahi mili',
            'mujhe yah jankari nahi mili',
            'जानकारी उपलब्ध नहीं',
            'لم أجد',
            'غير متوفرة',
        ];

        $unanswered = collect($patterns)
            ->contains(
                fn (string $pattern): bool =>
                    str_contains(
                        $normalizedAnswer,
                        mb_strtolower($pattern)
                    )
            );

        if (!$unanswered) {
            return;
        }

        $existing = AiUnansweredQuestion::query()
            ->where('question', $question)
            ->where('is_resolved', false)
            ->first();

        if ($existing) {
            $existing->increment(
                'asked_count'
            );

            $existing->update([
                'ai_visitor_id' =>
                    $visitor->id,

                'agent_conversation_id' =>
                    $conversationId,

                'agent_response' =>
                    $answer,
            ]);

            return;
        }

        AiUnansweredQuestion::create([
            'ai_visitor_id' =>
                $visitor->id,

            'agent_conversation_id' =>
                $conversationId,

            'question' =>
                $question,

            'agent_response' =>
                $answer,

            'asked_count' => 1,
            'is_resolved' => false,
        ]);
    }
}