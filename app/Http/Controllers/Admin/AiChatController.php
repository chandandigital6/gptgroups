<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AiLead;
use App\Models\AiVisitor;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class AiChatController extends Controller
{
    /**
     * AI conversations listing.
     */
    public function index(Request $request)
    {
        $search = trim(
            (string) $request->get('search')
        );

        $conversationsTable = config(
            'ai.conversations.tables.conversations',
            'agent_conversations'
        );

        $messagesTable = config(
            'ai.conversations.tables.messages',
            'agent_conversation_messages'
        );

        $query = DB::table(
            $conversationsTable . ' as conversations'
        )
            ->leftJoin(
                'ai_visitors as visitors',
                'visitors.id',
                '=',
                'conversations.user_id'
            )
            ->select([
                'conversations.id',
                'conversations.user_id',
                'conversations.created_at',
                'conversations.updated_at',

                'visitors.uuid as visitor_uuid',
                'visitors.name as visitor_name',
                'visitors.email as visitor_email',
                'visitors.phone as visitor_phone',
                'visitors.language as visitor_language',
                'visitors.ip_address as visitor_ip',
                'visitors.user_agent',
                'visitors.last_seen_at',
            ])
            ->selectSub(
                DB::table($messagesTable)
                    ->selectRaw('COUNT(*)')
                    ->whereColumn(
                        $messagesTable . '.conversation_id',
                        'conversations.id'
                    ),
                'messages_count'
            )
            ->selectSub(
                DB::table($messagesTable)
                    ->select('content')
                    ->whereColumn(
                        $messagesTable . '.conversation_id',
                        'conversations.id'
                    )
                    ->where('role', 'user')
                    ->latest('created_at')
                    ->limit(1),
                'last_user_message'
            )
            ->selectSub(
                DB::table($messagesTable)
                    ->select('created_at')
                    ->whereColumn(
                        $messagesTable . '.conversation_id',
                        'conversations.id'
                    )
                    ->latest('created_at')
                    ->limit(1),
                'last_message_at'
            );

        if ($search !== '') {
            $query->where(function ($builder) use (
                $search,
                $messagesTable
            ) {
                $builder
                    ->where(
                        'visitors.name',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'visitors.email',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'visitors.phone',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'visitors.uuid',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhereExists(
                        function ($messageQuery) use (
                            $search,
                            $messagesTable
                        ) {
                            $messageQuery
                                ->selectRaw('1')
                                ->from($messagesTable)
                                ->whereColumn(
                                    $messagesTable
                                        . '.conversation_id',
                                    'conversations.id'
                                )
                                ->where(
                                    $messagesTable . '.content',
                                    'like',
                                    '%' . $search . '%'
                                );
                        }
                    );
            });
        }

        $conversations = $query
            ->orderByRaw(
                'COALESCE(last_message_at, conversations.updated_at, conversations.created_at) DESC'
            )
            ->paginate(20)
            ->withQueryString();

        $conversations->getCollection()
            ->transform(function ($conversation) {
                $conversation->last_user_message =
                    $this->extractMessageContent(
                        $conversation->last_user_message
                    );

                return $conversation;
            });

        $totalConversations = DB::table(
            $conversationsTable
        )->count();

        $totalMessages = DB::table(
            $messagesTable
        )->count();

        $totalVisitors = AiVisitor::query()->count();

        $totalLeads = AiLead::query()->count();

        return view(
            'admin.ai_chats.index',
            compact(
                'conversations',
                'search',
                'totalConversations',
                'totalMessages',
                'totalVisitors',
                'totalLeads'
            )
        );
    }

    /**
     * View full conversation.
     */
    public function show(
        string $conversationId
    ) {
        $conversationsTable = config(
            'ai.conversations.tables.conversations',
            'agent_conversations'
        );

        $messagesTable = config(
            'ai.conversations.tables.messages',
            'agent_conversation_messages'
        );

        $conversation = DB::table(
            $conversationsTable
        )
            ->where('id', $conversationId)
            ->first();

        abort_unless(
            $conversation,
            404,
            'Conversation not found.'
        );

        $visitor = null;

        if (!empty($conversation->user_id)) {
            $visitor = AiVisitor::query()
                ->find($conversation->user_id);
        }

        $messages = DB::table($messagesTable)
            ->where(
                'conversation_id',
                $conversationId
            )
            ->whereIn('role', [
                'user',
                'assistant',
                'tool',
                'system',
            ])
            ->orderBy('created_at')
            ->get([
                'id',
                'role',
                'content',
                'created_at',
            ])
            ->map(function ($message) {
                $message->display_content =
                    $this->extractMessageContent(
                        $message->content
                    );

                return $message;
            });

        $leads = collect();

        if ($visitor) {
            $leads = AiLead::query()
                ->where(
                    'ai_visitor_id',
                    $visitor->id
                )
                ->latest()
                ->get();
        }

        $userMessagesCount = $messages
            ->where('role', 'user')
            ->count();

        $assistantMessagesCount = $messages
            ->where('role', 'assistant')
            ->count();

        return view(
            'admin.ai_chats.show',
            compact(
                'conversation',
                'visitor',
                'messages',
                'leads',
                'userMessagesCount',
                'assistantMessagesCount'
            )
        );
    }

    /**
     * Delete conversation and messages.
     */
    public function destroy(
        string $conversationId
    ) {
        $conversationsTable = config(
            'ai.conversations.tables.conversations',
            'agent_conversations'
        );

        $messagesTable = config(
            'ai.conversations.tables.messages',
            'agent_conversation_messages'
        );

        $conversation = DB::table(
            $conversationsTable
        )
            ->where('id', $conversationId)
            ->first();

        abort_unless(
            $conversation,
            404,
            'Conversation not found.'
        );

        DB::transaction(
            function () use (
                $conversationId,
                $conversationsTable,
                $messagesTable
            ) {
                DB::table($messagesTable)
                    ->where(
                        'conversation_id',
                        $conversationId
                    )
                    ->delete();

                DB::table($conversationsTable)
                    ->where('id', $conversationId)
                    ->delete();
            }
        );

        return redirect()
            ->route('admin.ai-chats.index')
            ->with(
                'success',
                'AI conversation deleted successfully.'
            );
    }

    /**
     * Convert stored message JSON/content into readable text.
     */
    private function extractMessageContent(
        mixed $content
    ): string {
        if ($content === null) {
            return '';
        }

        if (is_array($content)) {
            return $this->extractFromArray(
                $content
            );
        }

        if (is_object($content)) {
            return $this->extractFromArray(
                (array) $content
            );
        }

        $content = trim((string) $content);

        if ($content === '') {
            return '';
        }

        $decoded = json_decode(
            $content,
            true
        );

        if (
            json_last_error()
            === JSON_ERROR_NONE
        ) {
            if (is_array($decoded)) {
                return $this->extractFromArray(
                    $decoded
                );
            }

            if (is_string($decoded)) {
                return trim($decoded);
            }
        }

        return trim(
            strip_tags($content)
        );
    }

    /**
     * Extract readable text from message array.
     */
    private function extractFromArray(
        array $content
    ): string {
        if (
            isset($content['text'])
            && is_string($content['text'])
        ) {
            return trim($content['text']);
        }

        if (
            isset($content['content'])
            && is_string($content['content'])
        ) {
            return trim($content['content']);
        }

        $parts = collect($content)
            ->map(function ($item) {
                if (is_string($item)) {
                    return trim($item);
                }

                if (is_array($item)) {
                    return $this->extractFromArray(
                        $item
                    );
                }

                if (is_object($item)) {
                    return $this->extractFromArray(
                        (array) $item
                    );
                }

                return '';
            })
            ->filter()
            ->values();

        if ($parts->isNotEmpty()) {
            return $parts->implode("\n");
        }

        return json_encode(
            $content,
            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
            | JSON_PRETTY_PRINT
        ) ?: '';
    }
}