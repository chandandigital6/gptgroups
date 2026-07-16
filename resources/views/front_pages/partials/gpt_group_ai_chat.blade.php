<style>
    [x-cloak] {
        display: none !important;
    }

    .gpt-ai-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .gpt-ai-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .gpt-ai-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 9999px;
    }

    .gpt-ai-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    @keyframes gpt-ai-bounce {
        0%,
        80%,
        100% {
            transform: translateY(0);
            opacity: 0.45;
        }

        40% {
            transform: translateY(-5px);
            opacity: 1;
        }
    }

    .gpt-ai-dot {
        animation: gpt-ai-bounce 1.4s infinite ease-in-out;
    }

    .gpt-ai-dot:nth-child(2) {
        animation-delay: 0.15s;
    }

    .gpt-ai-dot:nth-child(3) {
        animation-delay: 0.3s;
    }
</style>

<div
    x-data="gptGroupAiChat()"
    x-init="init()"
    x-cloak
    class="fixed bottom-4 right-4 z-[9999] sm:bottom-5 sm:right-5"
>
    {{-- Chat Window --}}
    <div
        x-show="open"
        x-transition:enter="transition duration-200 ease-out"
        x-transition:enter-start="translate-y-3 scale-95 opacity-0"
        x-transition:enter-end="translate-y-0 scale-100 opacity-100"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-y-0 scale-100 opacity-100"
        x-transition:leave-end="translate-y-3 scale-95 opacity-0"
        class="mb-3 flex h-[min(650px,calc(100vh-95px))]
               w-[min(400px,calc(100vw-24px))]
               flex-col overflow-hidden rounded-[28px]
               border border-slate-200 bg-white shadow-2xl"
    >
        {{-- Header --}}
        <div class="relative overflow-hidden bg-slate-950 px-5 py-4 text-white">
            <div
                class="pointer-events-none absolute -right-10 -top-12 h-32 w-32
                       rounded-full bg-cyan-500/20 blur-2xl"
            ></div>

            <div class="relative flex items-start justify-between gap-4">
                <div class="flex min-w-0 items-center gap-3">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center
                               rounded-2xl bg-cyan-500 text-lg font-black text-white
                               shadow-lg shadow-cyan-950/30"
                    >
                        AI
                    </div>

                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <h3 class="truncate text-base font-bold">
                                GPT Group AI Assistant
                            </h3>

                            <span
                                class="inline-flex h-2 w-2 shrink-0 rounded-full bg-emerald-400"
                                title="Online"
                            ></span>
                        </div>

                        <p class="mt-1 truncate text-xs text-slate-300">
                            Products, services, network and partnerships
                        </p>
                    </div>
                </div>

                <button
                    type="button"
                    @click="open = false"
                    class="flex h-9 w-9 shrink-0 items-center justify-center
                           rounded-full bg-white/10 text-lg transition
                           hover:bg-white/20"
                    aria-label="Close AI Assistant"
                >
                    ✕
                </button>
            </div>
        </div>

        {{-- Messages --}}
        <div
            x-ref="messages"
            class="gpt-ai-scrollbar flex-1 space-y-4 overflow-y-auto
                   bg-slate-50 px-4 py-5"
        >
            <template
                x-for="message in messages"
                :key="message.id"
            >
                <div
                    class="flex"
                    :class="message.role === 'user'
                        ? 'justify-end'
                        : 'justify-start'"
                >
                    <div
                        class="max-w-[88%] whitespace-pre-wrap break-words
                               rounded-2xl px-4 py-3 text-sm leading-6 shadow-sm"
                        :class="message.role === 'user'
                            ? 'rounded-br-md bg-cyan-600 text-white'
                            : message.type === 'error'
                                ? 'rounded-bl-md border border-red-200 bg-red-50 text-red-700'
                                : 'rounded-bl-md border border-slate-200 bg-white text-slate-700'"
                        x-text="message.content"
                    ></div>
                </div>
            </template>

            {{-- Loading Bubble --}}
            <div
                x-show="loading"
                class="flex justify-start"
            >
                <div
                    class="flex items-center gap-3 rounded-2xl rounded-bl-md
                           border border-slate-200 bg-white px-4 py-3 shadow-sm"
                >
                    <div class="flex items-center gap-1">
                        <span class="gpt-ai-dot h-2 w-2 rounded-full bg-cyan-500"></span>
                        <span class="gpt-ai-dot h-2 w-2 rounded-full bg-cyan-500"></span>
                        <span class="gpt-ai-dot h-2 w-2 rounded-full bg-cyan-500"></span>
                    </div>

                    <span class="text-xs font-medium text-slate-500">
                        GPT Group AI is thinking...
                    </span>
                </div>
            </div>
        </div>

        {{-- Suggestions --}}
        <div
            x-show="showSuggestions"
            class="border-t border-slate-100 bg-white px-4 py-3"
        >
            <p class="mb-2 text-[11px] font-semibold uppercase tracking-wide text-slate-400">
                Quick questions
            </p>

            <div class="gpt-ai-scrollbar flex gap-2 overflow-x-auto pb-1">
                <template
                    x-for="suggestion in suggestions"
                    :key="suggestion"
                >
                    <button
                        type="button"
                        @click="useSuggestion(suggestion)"
                        :disabled="loading"
                        class="shrink-0 rounded-full border border-slate-200
                               bg-white px-3 py-2 text-xs font-semibold
                               text-slate-700 transition hover:border-cyan-500
                               hover:bg-cyan-50 hover:text-cyan-700
                               disabled:cursor-not-allowed disabled:opacity-50"
                        x-text="suggestion"
                    ></button>
                </template>
            </div>
        </div>

        {{-- Error Alert --}}
        <div
            x-show="error"
            x-transition
            class="border-t border-red-100 bg-red-50 px-4 py-3"
        >
            <div class="flex items-start justify-between gap-3">
                <p
                    class="text-xs leading-5 text-red-700"
                    x-text="error"
                ></p>

                <button
                    type="button"
                    @click="error = ''"
                    class="shrink-0 text-sm font-bold text-red-500 hover:text-red-700"
                    aria-label="Close error"
                >
                    ✕
                </button>
            </div>

            <button
                x-show="canRetry && lastMessage"
                type="button"
                @click="retryLastMessage()"
                :disabled="loading"
                class="mt-2 rounded-lg bg-red-600 px-3 py-1.5
                       text-xs font-semibold text-white transition
                       hover:bg-red-700 disabled:opacity-50"
            >
                Try Again
            </button>
        </div>

        {{-- Input --}}
        <form
            @submit.prevent="sendMessage()"
            class="border-t border-slate-200 bg-white p-4"
        >
            <div class="flex items-end gap-2">
                <textarea
                    x-ref="input"
                    x-model="input"
                    @input="resizeTextarea($event)"
                    @keydown.enter="
                        if (!$event.shiftKey) {
                            $event.preventDefault();
                            sendMessage();
                        }
                    "
                    rows="1"
                    maxlength="5000"
                    placeholder="Ask GPT Group..."
                    class="max-h-28 min-h-[48px] flex-1 resize-none
                           overflow-y-auto rounded-2xl border border-slate-300
                           bg-white px-4 py-3 text-sm text-slate-800
                           outline-none transition placeholder:text-slate-400
                           focus:border-cyan-500 focus:ring-2 focus:ring-cyan-100
                           disabled:cursor-not-allowed disabled:bg-slate-100"
                    :disabled="loading"
                ></textarea>

                <button
                    type="submit"
                    :disabled="loading || !input.trim()"
                    class="flex h-12 w-12 shrink-0 items-center justify-center
                           rounded-2xl bg-cyan-600 text-white shadow-md
                           transition hover:bg-cyan-700
                           disabled:cursor-not-allowed disabled:bg-cyan-300"
                    aria-label="Send message"
                >
                    <template x-if="!loading">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="h-5 w-5"
                        >
                            <path
                                d="M3.478 2.405a.75.75 0 0 0-.926.94l2.432
                                7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432
                                7.905a.75.75 0 0 0 .926.94 60.519 60.519
                                0 0 0 18.445-8.986.75.75 0 0 0
                                0-1.218A60.517 60.517 0 0 0 3.478 2.405Z"
                            />
                        </svg>
                    </template>

                    <template x-if="loading">
                        <svg
                            class="h-5 w-5 animate-spin"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"
                            ></circle>

                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373
                                   0 12h4Zm2 5.291A7.962 7.962 0 0 1
                                   4 12H0c0 3.042 1.135 5.824
                                   3 7.938l3-2.647Z"
                            ></path>
                        </svg>
                    </template>
                </button>
            </div>

            <div class="mt-2 flex items-center justify-between gap-3 px-1">
                <p class="text-[10px] text-slate-400">
                    Press Enter to send • Shift + Enter for new line
                </p>

                <p
                    class="text-[10px] text-slate-400"
                    x-text="input.length + '/5000'"
                ></p>
            </div>
        </form>
    </div>

    {{-- Floating Button --}}
    <button
        type="button"
        @click="toggleChat()"
        class="ml-auto flex h-16 w-16 items-center justify-center
               rounded-full bg-cyan-600 text-white shadow-xl
               shadow-cyan-900/25 transition duration-200
               hover:scale-105 hover:bg-cyan-700"
        aria-label="Open GPT Group AI Assistant"
    >
        <template x-if="!open">
            <div class="relative">
                <span class="text-2xl">✦</span>

                <span
                    class="absolute -right-2 -top-2 h-3 w-3 rounded-full
                           border-2 border-cyan-600 bg-emerald-400"
                ></span>
            </div>
        </template>

        <template x-if="open">
            <span class="text-xl">✕</span>
        </template>
    </button>
</div>

<script>
    function gptGroupAiChat() {
        return {
            open: false,
            loading: false,
            historyLoaded: false,
            input: '',
            error: '',
            canRetry: false,
            lastMessage: '',
            requestController: null,

            conversationId: localStorage.getItem(
                'gpt_group_ai_conversation_id'
            ),

            messages: [
                {
                    id: crypto.randomUUID(),
                    role: 'assistant',
                    type: 'normal',
                    content:
                        'Welcome to GPT Group. How may I assist you today?'
                }
            ],

            suggestions: [
                'Explore our business verticals',
                'Tell me about GPT Group',
                'Become a business partner',
                'View our Oman network',
                'Contact GPT Group'
            ],

            get showSuggestions() {
                return (
                    !this.loading &&
                    this.messages.filter(
                        message => message.role === 'user'
                    ).length === 0
                );
            },

            init() {
                this.$watch('open', async (isOpen) => {
                    if (!isOpen) {
                        return;
                    }

                    await this.$nextTick();

                    if (
                        this.conversationId &&
                        !this.historyLoaded
                    ) {
                        await this.loadHistory();
                    }

                    this.focusInput();
                    this.scrollToBottom();
                });
            },

            toggleChat() {
                this.open = !this.open;
            },

            focusInput() {
                this.$nextTick(() => {
                    this.$refs.input?.focus();
                });
            },

            resizeTextarea(event) {
                const textarea = event.target;

                textarea.style.height = 'auto';

                textarea.style.height = Math.min(
                    textarea.scrollHeight,
                    112
                ) + 'px';
            },

            resetTextarea() {
                this.$nextTick(() => {
                    if (this.$refs.input) {
                        this.$refs.input.style.height = '48px';
                    }
                });
            },

            async parseJsonResponse(response) {
                const rawResponse = await response.text();

                if (!rawResponse.trim()) {
                    throw new Error(
                        'Server returned an empty response.'
                    );
                }

                try {
                    return JSON.parse(rawResponse);
                } catch (parseError) {
                    console.error(
                        'Invalid non-JSON response:',
                        rawResponse
                    );

                    if (
                        response.status === 419 ||
                        rawResponse.includes('Page Expired')
                    ) {
                        throw new Error(
                            'Your session has expired. Please refresh the page and try again.'
                        );
                    }

                    if (
                        response.status === 404
                    ) {
                        throw new Error(
                            'AI chat route was not found. Please check the Laravel route.'
                        );
                    }

                    if (
                        response.status === 500
                    ) {
                        throw new Error(
                            'A server error occurred. Please check storage/logs/laravel.log.'
                        );
                    }

                    throw new Error(
                        'Server returned an invalid response. Please try again.'
                    );
                }
            },

            async loadHistory() {
                if (!this.conversationId) {
                    this.historyLoaded = true;
                    return;
                }

                try {
                    const url =
                        @json(url('/gpt-group-ai/conversations'))
                        + '/'
                        + encodeURIComponent(this.conversationId)
                        + '/messages';

                    const response = await fetch(url, {
                        method: 'GET',
                        credentials: 'same-origin',

                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const result = await this.parseJsonResponse(
                        response
                    );

                    if (
                        !response.ok ||
                        !result.success
                    ) {
                        throw new Error(
                            result.message ||
                            'Unable to load conversation history.'
                        );
                    }

                    if (
                        Array.isArray(result.data) &&
                        result.data.length
                    ) {
                        this.messages = result.data
                            .filter(message =>
                                ['user', 'assistant'].includes(
                                    message.role
                                )
                            )
                            .map(message => ({
                                id:
                                    message.id ||
                                    crypto.randomUUID(),

                                role: message.role,
                                type: 'normal',
                                content:
                                    this.extractMessageContent(
                                        message.content
                                    )
                            }));
                    }
                } catch (error) {
                    console.error(
                        'AI history error:',
                        error
                    );

                    localStorage.removeItem(
                        'gpt_group_ai_conversation_id'
                    );

                    this.conversationId = null;
                } finally {
                    this.historyLoaded = true;
                    this.scrollToBottom();
                }
            },

            extractMessageContent(content) {
                if (typeof content === 'string') {
                    return content;
                }

                if (
                    content &&
                    typeof content === 'object'
                ) {
                    if (
                        typeof content.text === 'string'
                    ) {
                        return content.text;
                    }

                    if (
                        Array.isArray(content)
                    ) {
                        return content
                            .map(item => {
                                if (
                                    typeof item === 'string'
                                ) {
                                    return item;
                                }

                                return item?.text || '';
                            })
                            .filter(Boolean)
                            .join('\n');
                    }

                    try {
                        return JSON.stringify(content);
                    } catch (error) {
                        return '';
                    }
                }

                return String(content ?? '');
            },

            async useSuggestion(suggestion) {
                if (this.loading) {
                    return;
                }

                this.input = suggestion;
                await this.sendMessage();
            },

            async retryLastMessage() {
                if (
                    !this.lastMessage ||
                    this.loading
                ) {
                    return;
                }

                this.error = '';
                this.canRetry = false;
                this.input = this.lastMessage;

                await this.sendMessage({
                    addUserMessage: false
                });
            },

            async sendMessage(options = {}) {
                const {
                    addUserMessage = true
                } = options;

                const message = this.input.trim();

                if (
                    !message ||
                    this.loading
                ) {
                    return;
                }

                const csrfToken = document
                    .querySelector(
                        'meta[name="csrf-token"]'
                    )
                    ?.getAttribute('content');

                if (!csrfToken) {
                    this.error =
                        'CSRF token is missing. Add the CSRF meta tag to your layout.';

                    this.canRetry = false;
                    return;
                }

                this.lastMessage = message;
                this.input = '';
                this.error = '';
                this.canRetry = false;
                this.resetTextarea();

                if (addUserMessage) {
                    this.messages.push({
                        id: crypto.randomUUID(),
                        role: 'user',
                        type: 'normal',
                        content: message
                    });
                }

                this.loading = true;
                this.scrollToBottom();

                this.requestController =
                    new AbortController();

                const timeoutId = setTimeout(() => {
                    this.requestController?.abort();
                }, 130000);

                try {
                    const response = await fetch(
                        @json(route('gpt-group-ai.chat')),
                        {
                            method: 'POST',
                            credentials: 'same-origin',
                            signal:
                                this.requestController.signal,

                            headers: {
                                'Content-Type':
                                    'application/json',

                                'Accept':
                                    'application/json',

                                'X-Requested-With':
                                    'XMLHttpRequest',

                                'X-CSRF-TOKEN':
                                    csrfToken
                            },

                            body: JSON.stringify({
                                message: message,

                                conversation_id:
                                    this.conversationId
                                    || null,

                                language:
                                    document
                                        .documentElement
                                        .lang
                                    || 'en',

                                page_url:
                                    window.location.href
                            })
                        }
                    );

                    const result =
                        await this.parseJsonResponse(
                            response
                        );

                    if (
                        !response.ok ||
                        !result.success
                    ) {
                        const apiError =
                            new Error(
                                result.message ||
                                this.getStatusMessage(
                                    response.status
                                )
                            );

                        apiError.status =
                            response.status;

                        apiError.code =
                            result.error_code || null;

                        throw apiError;
                    }

                    if (
                        !result.data ||
                        !result.data.message
                    ) {
                        throw new Error(
                            'AI response message is missing.'
                        );
                    }

                    this.conversationId =
                        result.data.conversation_id
                        || this.conversationId;

                    if (this.conversationId) {
                        localStorage.setItem(
                            'gpt_group_ai_conversation_id',
                            this.conversationId
                        );
                    }

                    this.messages.push({
                        id: crypto.randomUUID(),
                        role: 'assistant',
                        type: 'normal',
                        content:
                            result.data.message
                    });

                    this.lastMessage = '';
                    this.canRetry = false;
                } catch (error) {
                    console.error(
                        'GPT Group AI error:',
                        error
                    );

                    if (
                        error.name === 'AbortError'
                    ) {
                        this.error =
                            'The AI request took too long. Please try again.';

                        this.canRetry = true;
                    } else if (
                        !navigator.onLine
                    ) {
                        this.error =
                            'No internet connection. Please check your network and try again.';

                        this.canRetry = true;
                    } else if (
                        error.status === 503 ||
                        error.code ===
                            'AI_PROVIDER_OVERLOADED'
                    ) {
                        this.error =
                            'The AI service is temporarily busy. Please wait a few seconds and try again.';

                        this.canRetry = true;
                    } else if (
                        error.status === 429 ||
                        error.code ===
                            'AI_RATE_LIMITED'
                    ) {
                        this.error =
                            'The free AI usage limit has been reached. Please wait and try again later.';

                        this.canRetry = true;
                    } else if (
                        error.status === 419
                    ) {
                        this.error =
                            'Your session has expired. Please refresh the page and try again.';

                        this.canRetry = false;
                    } else if (
                        error.status === 403
                    ) {
                        this.error =
                            'This conversation is no longer available. A new conversation will be started.';

                        localStorage.removeItem(
                            'gpt_group_ai_conversation_id'
                        );

                        this.conversationId = null;
                        this.canRetry = true;
                    } else {
                        this.error =
                            error.message ||
                            'Sorry, the request could not be completed.';

                        this.canRetry = true;
                    }
                } finally {
                    clearTimeout(timeoutId);

                    this.requestController = null;
                    this.loading = false;

                    this.scrollToBottom();
                    this.focusInput();
                }
            },

            getStatusMessage(status) {
                const messages = {
                    400: 'The request is invalid.',
                    403: 'You are not allowed to access this conversation.',
                    404: 'The AI endpoint was not found.',
                    419: 'Your session has expired. Please refresh the page.',
                    422: 'Please check your message and try again.',
                    429: 'Too many requests. Please wait and try again.',
                    500: 'The server could not complete the AI request.',
                    503: 'The AI provider is temporarily busy.'
                };

                return messages[status]
                    || 'Unable to get an AI response.';
            },

            scrollToBottom() {
                this.$nextTick(() => {
                    const container =
                        this.$refs.messages;

                    if (container) {
                        container.scrollTop =
                            container.scrollHeight;
                    }
                });
            }
        };
    }
</script>