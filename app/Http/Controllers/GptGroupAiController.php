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
use Illuminate\Support\Str;
use Throwable;
use Laravel\Ai\Exceptions\ProviderOverloadedException;
use Laravel\Ai\Exceptions\RateLimitedException;
use Symfony\Component\HttpFoundation\Cookie;


class GptGroupAiController extends Controller
{
    public function chat(
    GptGroupAiChatRequest $request
): JsonResponse {
    $validated = $request->validated();

    try {
        $visitorUuid = $request->cookie(
            'gpt_group_ai_visitor'
        ) ?: (string) Str::uuid();

        $language = $validated['language'] ?? 'en';

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

        $conversationId =
            $validated['conversation_id'] ?? null;

        if ($conversationId) {
            $this->ensureConversationBelongsToVisitor(
                conversationId: $conversationId,
                visitor: $visitor
            );
        }

        $requestToken = (string) Str::uuid();

        $agent = GptGroupAssistant::make(
            visitor: $visitor,
            language: $language,
            requestToken: $requestToken,
            pageUrl: $validated['page_url'] ?? null
        );

        if ($conversationId) {
            $agent->continue(
                $conversationId,
                as: $visitor
            );
        } else {
            $agent->forUser($visitor);
        }

        $response = retry(
            times: 3,

            callback: function () use (
                $agent,
                $validated
            ) {
                return $agent->prompt(
                    $validated['message'],
                    provider: 'openrouter',
                    model: 'openrouter/free',
                    timeout: 120
                );
            },

            sleepMilliseconds: function (int $attempt) {
                return $attempt * 2000;
            },

            when: function (Throwable $exception) {
                return $exception
                    instanceof ProviderOverloadedException
                    || $exception
                        instanceof RateLimitedException;
            }
        );

        $newConversationId =
            $response->conversationId;

        AiLead::query()
            ->where(
                'request_token',
                $requestToken
            )
            ->update([
                'agent_conversation_id' =>
                    $newConversationId,
            ]);

        $answer = trim((string) $response);

        $this->captureUnansweredQuestion(
            visitor: $visitor,
            conversationId: $newConversationId,
            question: $validated['message'],
            answer: $answer
        );

        /*
        |--------------------------------------------------------------------------
        | Positional parameters are used for Symfony version compatibility.
        |--------------------------------------------------------------------------
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

        return response()
            ->json([
                'success' => true,

                'data' => [
                    'conversation_id' =>
                        $newConversationId,

                    'message' => $answer,
                ],
            ])
            ->withCookie($cookie);

    } catch (ProviderOverloadedException $exception) {
        report($exception);

        return response()->json([
            'success' => false,
            'error_code' =>
                'AI_PROVIDER_OVERLOADED',

            'message' =>
                'The AI service is temporarily busy. Please wait a few seconds and try again.',
        ], 503);

    } catch (RateLimitedException $exception) {
        report($exception);

        return response()->json([
            'success' => false,
            'error_code' =>
                'AI_RATE_LIMITED',

            'message' =>
                'The free AI usage limit has been reached. Please try again later.',
        ], 429);

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


    public function messages(
        Request $request,
        string $conversationId
    ): JsonResponse {
        $visitor = $this->resolveVisitor($request);

        $this->ensureConversationBelongsToVisitor(
            conversationId: $conversationId,
            visitor: $visitor
        );

        $messagesTable = config(
            'ai.conversations.tables.messages',
            'agent_conversation_messages'
        );

        $messages = DB::table($messagesTable)
            ->where('conversation_id', $conversationId)
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
    }

    private function resolveVisitor(
        Request $request
    ): AiVisitor {
        $visitorUuid = $request->cookie(
            'gpt_group_ai_visitor'
        );

        abort_unless($visitorUuid, 403);

        return AiVisitor::query()
            ->where('uuid', $visitorUuid)
            ->firstOrFail();
    }

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

        abort_unless($exists, 403);
    }

    private function captureUnansweredQuestion(
        AiVisitor $visitor,
        string $conversationId,
        string $question,
        string $answer
    ): void {
        $normalizedAnswer = mb_strtolower($answer);

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
                fn($pattern) =>
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
            $existing->increment('asked_count');

            $existing->update([
                'ai_visitor_id' => $visitor->id,
                'agent_conversation_id' =>
                $conversationId,
                'agent_response' => $answer,
            ]);

            return;
        }

        AiUnansweredQuestion::create([
            'ai_visitor_id' => $visitor->id,
            'agent_conversation_id' =>
            $conversationId,
            'question' => $question,
            'agent_response' => $answer,
            'asked_count' => 1,
            'is_resolved' => false,
        ]);
    }
}
