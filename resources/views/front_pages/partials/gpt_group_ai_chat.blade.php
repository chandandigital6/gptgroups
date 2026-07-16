<style>
    [x-cloak] {
        display: none !important;
    }

    html.gpt-ai-chat-open,
    body.gpt-ai-chat-open {
        overflow: hidden !important;
        overscroll-behavior: none;
    }

    .gpt-ai-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }

    .gpt-ai-scrollbar::-webkit-scrollbar {
        width: 5px;
        height: 5px;
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

    .gpt-ai-safe-bottom {
        padding-bottom: max(
            12px,
            env(safe-area-inset-bottom)
        );
    }

    @media (max-width: 639px) {
        .gpt-ai-mobile-panel {
            width: 100vw !important;
            height: var(--gpt-ai-viewport-height, 100dvh) !important;
            max-width: none !important;
            max-height: none !important;
            border-radius: 0 !important;
            border: 0 !important;
            margin: 0 !important;
        }

        .gpt-ai-mobile-wrapper {
            inset: 0 !important;
            width: 100vw !important;
            height: var(--gpt-ai-viewport-height, 100dvh) !important;
        }
    }
</style>

<div
    x-data="gptGroupAiChat()"
    x-init="init()"
    x-cloak
    class="pointer-events-none fixed inset-0 z-[99999] sm:inset-auto sm:bottom-5 sm:right-5"
>
    {{-- Mobile backdrop --}}
    <div
        x-show="open"
        x-transition.opacity
        @click="closeChat()"
        class="pointer-events-auto fixed inset-0 hidden bg-slate-950/30 backdrop-blur-[2px] sm:block"
    ></div>

    {{-- Chat wrapper --}}
    <div
        class="gpt-ai-mobile-wrapper pointer-events-none fixed inset-0 flex items-end justify-end sm:static sm:block"
    >
        {{-- Chat panel --}}
        <section
            x-show="open"
            x-transition:enter="transition duration-200 ease-out"
            x-transition:enter-start="translate-y-5 scale-[0.98] opacity-0"
            x-transition:enter-end="translate-y-0 scale-100 opacity-100"
            x-transition:leave="transition duration-150 ease-in"
            x-transition:leave-start="translate-y-0 scale-100 opacity-100"
            x-transition:leave-end="translate-y-5 scale-[0.98] opacity-0"
            @keydown.escape.window="closeChat()"
            class="gpt-ai-mobile-panel pointer-events-auto relative z-10 flex
                   h-[min(680px,calc(100dvh-110px))]
                   w-[min(410px,calc(100vw-32px))]
                   flex-col overflow-hidden rounded-[26px]
                   border border-slate-200 bg-white shadow-2xl"
            role="dialog"
            aria-modal="true"
            aria-label="GPT Group AI Assistant"
        >
            {{-- Header --}}
            <header
                class="relative shrink-0 overflow-hidden bg-slate-950
                       px-4 py-3.5 text-white sm:px-5 sm:py-4"
            >
                <div
                    class="pointer-events-none absolute -right-10 -top-14
                           h-32 w-32 rounded-full bg-cyan-500/20 blur-2xl"
                ></div>

                <div class="relative flex items-center justify-between gap-3">
                    <div class="flex min-w-0 items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center
                                   rounded-2xl bg-cyan-500 text-sm font-black
                                   text-white shadow-lg shadow-cyan-950/30
                                   sm:h-11 sm:w-11 sm:text-base"
                        >
                            AI
                        </div>

                        <div class="min-w-0">
                            <div class="flex min-w-0 items-center gap-2">
                                <h3
                                    class="truncate text-sm font-bold
                                           sm:text-base"
                                >
                                    GPT Group AI Assistant
                                </h3>

                                <span
                                    class="inline-flex h-2 w-2 shrink-0
                                           rounded-full bg-emerald-400"
                                    title="Online"
                                ></span>
                            </div>

                            <p
                                class="mt-0.5 truncate text-[11px]
                                       text-slate-300 sm:mt-1 sm:text-xs"
                            >
                                Products, services, network and partnerships
                            </p>
                        </div>
                    </div>

                    <div class="flex shrink-0 items-center gap-1.5">
                        <button
                            type="button"
                            @click="startNewConversation()"
                            :disabled="loading"
                            class="flex h-9 w-9 items-center justify-center
                                   rounded-full bg-white/10 text-white transition
                                   hover:bg-white/20 disabled:cursor-not-allowed
                                   disabled:opacity-50"
                            aria-label="Start new conversation"
                            title="New conversation"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                class="h-4.5 w-4.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 5v14M5 12h14"
                                />
                            </svg>
                        </button>

                        <button
                            type="button"
                            @click="closeChat()"
                            class="flex h-9 w-9 items-center justify-center
                                   rounded-full bg-white/10 text-white transition
                                   hover:bg-white/20"
                            aria-label="Close AI Assistant"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.3"
                                class="h-5 w-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 6l12 12M18 6L6 18"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            {{-- Messages --}}
            <main
                x-ref="messages"
                class="gpt-ai-scrollbar min-h-0 flex-1 space-y-3
                       overflow-y-auto overscroll-contain bg-slate-50
                       px-3 py-4 sm:space-y-4 sm:px-4 sm:py-5"
            >
                <template
                    x-for="message in messages"
                    :key="message.id"
                >
                    <div
                        class="flex w-full"
                        :class="
                            message.role === 'user'
                                ? 'justify-end'
                                : 'justify-start'
                        "
                    >
                        <div
                            class="max-w-[88%] whitespace-pre-wrap break-words
                                   rounded-2xl px-3.5 py-2.5 text-[13px]
                                   leading-5 shadow-sm sm:px-4 sm:py-3
                                   sm:text-sm sm:leading-6"
                            :class="
                                message.role === 'user'
                                    ? 'rounded-br-md bg-cyan-600 text-white'
                                    : message.type === 'error'
                                        ? 'rounded-bl-md border border-red-200 bg-red-50 text-red-700'
                                        : 'rounded-bl-md border border-slate-200 bg-white text-slate-700'
                            "
                            x-text="message.content"
                        ></div>
                    </div>
                </template>

                {{-- Loading bubble --}}
                <div
                    x-show="loading"
                    class="flex justify-start"
                >
                    <div
                        class="flex items-center gap-3 rounded-2xl rounded-bl-md
                               border border-slate-200 bg-white px-4 py-3 shadow-sm"
                    >
                        <div class="flex items-center gap-1">
                            <span
                                class="gpt-ai-dot h-2 w-2 rounded-full bg-cyan-500"
                            ></span>

                            <span
                                class="gpt-ai-dot h-2 w-2 rounded-full bg-cyan-500"
                            ></span>

                            <span
                                class="gpt-ai-dot h-2 w-2 rounded-full bg-cyan-500"
                            ></span>
                        </div>

                        <span
                            class="text-[11px] font-medium text-slate-500
                                   sm:text-xs"
                        >
                            GPT Group AI is thinking...
                        </span>
                    </div>
                </div>
            </main>

            {{-- Suggestions --}}
            <div
                x-show="showSuggestions"
                class="shrink-0 border-t border-slate-100
                       bg-white px-3 py-2.5 sm:px-4 sm:py-3"
            >
                <p
                    class="mb-2 text-[10px] font-semibold uppercase
                           tracking-wide text-slate-400 sm:text-[11px]"
                >
                    Quick questions
                </p>

                <div
                    class="gpt-ai-scrollbar flex gap-2 overflow-x-auto
                           overscroll-x-contain pb-1"
                >
                    <template
                        x-for="suggestion in suggestions"
                        :key="suggestion"
                    >
                        <button
                            type="button"
                            @click="useSuggestion(suggestion)"
                            :disabled="loading"
                            class="shrink-0 rounded-full border border-slate-200
                                   bg-white px-3 py-2 text-[11px] font-semibold
                                   text-slate-700 transition hover:border-cyan-500
                                   hover:bg-cyan-50 hover:text-cyan-700
                                   disabled:cursor-not-allowed
                                   disabled:opacity-50 sm:text-xs"
                            x-text="suggestion"
                        ></button>
                    </template>
                </div>
            </div>

            {{-- Error area --}}
            <div
                x-show="error"
                x-transition
                class="gpt-ai-scrollbar max-h-36 shrink-0 overflow-y-auto
                       border-t border-red-100 bg-red-50 px-3 py-3 sm:px-4"
            >
                <div class="flex items-start justify-between gap-3">
                    <p
                        class="break-words text-[11px] leading-5
                               text-red-700 sm:text-xs"
                        x-text="error"
                    ></p>

                    <button
                        type="button"
                        @click="error = ''"
                        class="flex h-7 w-7 shrink-0 items-center justify-center
                               rounded-full text-red-500 transition
                               hover:bg-red-100 hover:text-red-700"
                        aria-label="Close error"
                    >
                        ✕
                    </button>
                </div>

                <div
                    x-show="canRetry && lastMessage"
                    class="mt-2 flex flex-wrap gap-2"
                >
                    <button
                        type="button"
                        @click="retryLastMessage()"
                        :disabled="loading"
                        class="rounded-lg bg-red-600 px-3 py-1.5
                               text-[11px] font-semibold text-white
                               transition hover:bg-red-700
                               disabled:cursor-not-allowed
                               disabled:opacity-50 sm:text-xs"
                    >
                        Try Again
                    </button>

                    <button
                        x-show="shouldStartFresh"
                        type="button"
                        @click="retryWithNewConversation()"
                        :disabled="loading"
                        class="rounded-lg border border-red-200 bg-white
                               px-3 py-1.5 text-[11px] font-semibold
                               text-red-700 transition hover:bg-red-100
                               disabled:cursor-not-allowed
                               disabled:opacity-50 sm:text-xs"
                    >
                        Start New Chat
                    </button>
                </div>
            </div>

            {{-- Input area --}}
            <form
                @submit.prevent="sendMessage()"
                class="gpt-ai-safe-bottom shrink-0 border-t
                       border-slate-200 bg-white px-3 pt-3 sm:px-4 sm:pt-4"
            >
                <div class="flex items-end gap-2">
                    <textarea
                        x-ref="input"
                        x-model="input"
                        @focus="handleInputFocus()"
                        @input="resizeTextarea($event)"
                        @keydown.enter="
                            if (
                                !$event.shiftKey &&
                                !isMobileDevice()
                            ) {
                                $event.preventDefault();
                                sendMessage();
                            }
                        "
                        rows="1"
                        maxlength="5000"
                        placeholder="Ask GPT Group..."
                        class="gpt-ai-scrollbar max-h-28 min-h-[46px]
                               min-w-0 flex-1 resize-none overflow-y-auto
                               rounded-2xl border border-slate-300 bg-white
                               px-3.5 py-3 text-sm text-slate-800
                               outline-none transition placeholder:text-slate-400
                               focus:border-cyan-500 focus:ring-2
                               focus:ring-cyan-100 disabled:cursor-not-allowed
                               disabled:bg-slate-100 sm:min-h-[48px] sm:px-4"
                        :disabled="loading"
                    ></textarea>

                    <button
                        type="submit"
                        :disabled="loading || !input.trim()"
                        class="flex h-[46px] w-[46px] shrink-0
                               items-center justify-center rounded-2xl
                               bg-cyan-600 text-white shadow-md transition
                               hover:bg-cyan-700 disabled:cursor-not-allowed
                               disabled:bg-cyan-300 sm:h-12 sm:w-12"
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
                                    d="M4 12a8 8 0 0 1 8-8V0C5.373
                                       0 0 5.373 0 12h4Zm2 5.291A7.962
                                       7.962 0 0 1 4 12H0c0 3.042
                                       1.135 5.824 3 7.938l3-2.647Z"
                                ></path>
                            </svg>
                        </template>
                    </button>
                </div>

                <div
                    class="mt-1.5 flex items-center justify-between
                           gap-2 px-1 pb-1"
                >
                    <p
                        class="hidden truncate text-[10px]
                               text-slate-400 sm:block"
                    >
                        Enter to send • Shift + Enter for new line
                    </p>

                    <p
                        class="text-[9px] text-slate-400 sm:hidden"
                    >
                        Tap send to submit
                    </p>

                    <p
                        class="shrink-0 text-[9px] text-slate-400
                               sm:text-[10px]"
                        x-text="input.length + '/5000'"
                    ></p>
                </div>
            </form>
        </section>
    </div>

    {{-- Floating button --}}
    <button
        x-show="!open"
        x-transition
        type="button"
        @click="openChat()"
        class="pointer-events-auto fixed bottom-4 right-4 z-20
               flex h-14 w-14 items-center justify-center rounded-full
               bg-cyan-600 text-white shadow-xl shadow-cyan-900/25
               transition duration-200 hover:scale-105
               hover:bg-cyan-700 sm:static sm:ml-auto sm:h-16 sm:w-16"
        aria-label="Open GPT Group AI Assistant"
    >
        <div class="relative">
            <span class="text-xl sm:text-2xl">✦</span>

            <span
                class="absolute -right-2 -top-2 h-3 w-3 rounded-full
                       border-2 border-cyan-600 bg-emerald-400"
            ></span>
        </div>
    </button>
</div>

<script>
    function gptGroupAiChat() {
        const storageKey =
            'gpt_group_ai_conversation_id_v2';

        return {
            open: false,
            loading: false,
            historyLoaded: false,
            input: '',
            error: '',
            canRetry: false,
            shouldStartFresh: false,
            lastMessage: '',
            requestController: null,
            resizeHandler: null,

            conversationId:
                localStorage.getItem(storageKey),

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
                /*
                |--------------------------------------------------------------------------
                | Remove old broken conversation key
                |--------------------------------------------------------------------------
                */

                localStorage.removeItem(
                    'gpt_group_ai_conversation_id'
                );

                this.updateViewportHeight();

                this.resizeHandler = () => {
                    this.updateViewportHeight();

                    if (this.open) {
                        this.scrollToBottom();
                    }
                };

                window.addEventListener(
                    'resize',
                    this.resizeHandler
                );

                window.visualViewport?.addEventListener(
                    'resize',
                    this.resizeHandler
                );

                window.visualViewport?.addEventListener(
                    'scroll',
                    this.resizeHandler
                );

                this.$watch('open', async (isOpen) => {
                    document.documentElement
                        .classList.toggle(
                            'gpt-ai-chat-open',
                            isOpen
                        );

                    document.body.classList.toggle(
                        'gpt-ai-chat-open',
                        isOpen
                    );

                    if (!isOpen) {
                        return;
                    }

                    this.updateViewportHeight();

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

            updateViewportHeight() {
                const height =
                    window.visualViewport?.height
                    || window.innerHeight;

                document.documentElement.style.setProperty(
                    '--gpt-ai-viewport-height',
                    `${height}px`
                );
            },

            isMobileDevice() {
                return window.matchMedia(
                    '(max-width: 639px)'
                ).matches;
            },

            openChat() {
                this.open = true;
            },

            closeChat() {
                this.open = false;

                this.$refs.input?.blur();
            },

            toggleChat() {
                this.open
                    ? this.closeChat()
                    : this.openChat();
            },

            handleInputFocus() {
                setTimeout(() => {
                    this.updateViewportHeight();
                    this.scrollToBottom();
                }, 250);
            },

            focusInput() {
                if (this.isMobileDevice()) {
                    return;
                }

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

                this.scrollToBottom();
            },

            resetTextarea() {
                this.$nextTick(() => {
                    if (this.$refs.input) {
                        this.$refs.input.style.height =
                            this.isMobileDevice()
                                ? '46px'
                                : '48px';
                    }
                });
            },

            createApiError(
                message,
                status = null,
                code = null
            ) {
                const error = new Error(message);

                error.status = status;
                error.code = code;

                return error;
            },

            clearConversation() {
                localStorage.removeItem(storageKey);

                this.conversationId = null;
                this.historyLoaded = true;
            },

            startNewConversation() {
                if (this.loading) {
                    return;
                }

                this.clearConversation();

                this.messages = [
                    {
                        id: crypto.randomUUID(),
                        role: 'assistant',
                        type: 'normal',
                        content:
                            'A new conversation has started. How may I assist you?'
                    }
                ];

                this.input = '';
                this.error = '';
                this.canRetry = false;
                this.shouldStartFresh = false;
                this.lastMessage = '';

                this.resetTextarea();
                this.scrollToBottom();
                this.focusInput();
            },

            async retryWithNewConversation() {
                if (
                    !this.lastMessage ||
                    this.loading
                ) {
                    return;
                }

                const message = this.lastMessage;

                this.clearConversation();

                this.error = '';
                this.canRetry = false;
                this.shouldStartFresh = false;
                this.input = message;

                await this.sendMessage({
                    addUserMessage: false
                });
            },

            async parseJsonResponse(response) {
                const rawResponse =
                    await response.text();

                if (!rawResponse.trim()) {
                    throw this.createApiError(
                        'Server returned an empty response.',
                        response.status || 500,
                        'EMPTY_SERVER_RESPONSE'
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
                        rawResponse.includes(
                            'Page Expired'
                        )
                    ) {
                        throw this.createApiError(
                            'Your session has expired. Please refresh the page and try again.',
                            419,
                            'SESSION_EXPIRED'
                        );
                    }

                    if (response.status === 403) {
                        throw this.createApiError(
                            'You are not allowed to access this conversation.',
                            403,
                            'CONVERSATION_FORBIDDEN'
                        );
                    }

                    if (response.status === 404) {
                        throw this.createApiError(
                            'AI chat route was not found.',
                            404,
                            'AI_ROUTE_NOT_FOUND'
                        );
                    }

                    if (response.status === 422) {
                        throw this.createApiError(
                            'Please check your message and try again.',
                            422,
                            'VALIDATION_ERROR'
                        );
                    }

                    if (response.status === 429) {
                        throw this.createApiError(
                            'Too many requests. Please wait and try again.',
                            429,
                            'AI_RATE_LIMITED'
                        );
                    }

                    if (response.status === 503) {
                        throw this.createApiError(
                            'The AI service is temporarily unavailable.',
                            503,
                            'AI_PROVIDER_OVERLOADED'
                        );
                    }

                    throw this.createApiError(
                        'Server returned an invalid response. Please try again.',
                        response.status || 500,
                        'INVALID_JSON_RESPONSE'
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
                        @json(
                            url(
                                '/gpt-group-ai/conversations'
                            )
                        )
                        + '/'
                        + encodeURIComponent(
                            this.conversationId
                        )
                        + '/messages';

                    const response = await fetch(
                        url,
                        {
                            method: 'GET',
                            credentials: 'same-origin',

                            headers: {
                                'Accept':
                                    'application/json',

                                'X-Requested-With':
                                    'XMLHttpRequest'
                            }
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
                        throw this.createApiError(
                            result.message ||
                            'Unable to load conversation history.',
                            response.status,
                            result.error_code || null
                        );
                    }

                    if (
                        Array.isArray(result.data) &&
                        result.data.length
                    ) {
                        const historyMessages =
                            result.data
                                .filter(message =>
                                    [
                                        'user',
                                        'assistant'
                                    ].includes(
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
                                }))
                                .filter(message =>
                                    message.content.trim()
                                    !== ''
                                );

                        if (
                            historyMessages.length
                        ) {
                            this.messages =
                                historyMessages;
                        }
                    }
                } catch (error) {
                    console.error(
                        'AI history error:',
                        error
                    );

                    this.clearConversation();
                } finally {
                    this.historyLoaded = true;
                    this.scrollToBottom();
                }
            },

            extractMessageContent(content) {
                if (typeof content === 'string') {
                    return content.trim();
                }

                if (
                    content &&
                    typeof content === 'object'
                ) {
                    if (
                        typeof content.text === 'string'
                    ) {
                        return content.text.trim();
                    }

                    if (Array.isArray(content)) {
                        return content
                            .map(item => {
                                if (
                                    typeof item === 'string'
                                ) {
                                    return item;
                                }

                                if (
                                    item &&
                                    typeof item.text ===
                                    'string'
                                ) {
                                    return item.text;
                                }

                                if (
                                    item &&
                                    typeof item.content ===
                                    'string'
                                ) {
                                    return item.content;
                                }

                                return '';
                            })
                            .filter(Boolean)
                            .join('\n')
                            .trim();
                    }

                    if (
                        typeof content.content ===
                        'string'
                    ) {
                        return content.content.trim();
                    }

                    try {
                        return JSON.stringify(content);
                    } catch (error) {
                        return '';
                    }
                }

                return String(content ?? '').trim();
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
                this.shouldStartFresh = false;
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
                        'CSRF token is missing. Please refresh the page.';

                    this.canRetry = false;
                    return;
                }

                this.lastMessage = message;
                this.input = '';
                this.error = '';
                this.canRetry = false;
                this.shouldStartFresh = false;

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

                const timeoutId = setTimeout(
                    () => {
                        this.requestController
                            ?.abort();
                    },
                    130000
                );

                try {
                    const response = await fetch(
                        @json(
                            route(
                                'gpt-group-ai.chat'
                            )
                        ),
                        {
                            method: 'POST',
                            credentials: 'same-origin',

                            signal:
                                this.requestController
                                    .signal,

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
                        throw this.createApiError(
                            result.message ||
                            this.getStatusMessage(
                                response.status
                            ),
                            response.status,
                            result.error_code || null
                        );
                    }

                    if (
                        !result.data ||
                        typeof result.data !==
                        'object'
                    ) {
                        throw this.createApiError(
                            'The AI response data is missing.',
                            503,
                            'AI_RESPONSE_DATA_MISSING'
                        );
                    }

                    const aiMessage =
                        this.extractMessageContent(
                            result.data.message
                        );

                    if (!aiMessage) {
                        throw this.createApiError(
                            'The AI did not return an answer. Please try again.',
                            503,
                            'AI_EMPTY_RESPONSE'
                        );
                    }

                    this.conversationId =
                        result.data.conversation_id
                        || this.conversationId;

                    if (this.conversationId) {
                        localStorage.setItem(
                            storageKey,
                            this.conversationId
                        );
                    }

                    this.messages.push({
                        id: crypto.randomUUID(),
                        role: 'assistant',
                        type: 'normal',
                        content: aiMessage
                    });

                    this.lastMessage = '';
                    this.canRetry = false;
                    this.shouldStartFresh = false;
                    this.error = '';
                } catch (error) {
                    console.error(
                        'GPT Group AI error:',
                        error
                    );

                    const errorMessage = String(
                        error.message || ''
                    );

                    const brokenToolConversation =
                        errorMessage.includes(
                            'No tool output found for function call'
                        )
                        || errorMessage.includes(
                            'function_call_output'
                        )
                        || error.code ===
                            'BROKEN_TOOL_CONVERSATION';

                    if (brokenToolConversation) {
                        this.clearConversation();

                        this.error =
                            'The previous conversation could not be continued. Start a new chat and try again.';

                        this.canRetry = true;
                        this.shouldStartFresh = true;
                    } else if (
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
                        error.code ===
                        'AI_EMPTY_RESPONSE'
                    ) {
                        this.error =
                            'The AI did not return an answer. Please try again.';

                        this.canRetry = true;
                    } else if (
                        error.code ===
                        'AI_RESPONSE_DATA_MISSING'
                    ) {
                        this.error =
                            'The AI response could not be read. Please try again.';

                        this.canRetry = true;
                    } else if (
                        error.code ===
                        'AI_DAILY_LIMIT_REACHED'
                    ) {
                        this.error =
                            'Your daily AI chat limit has been reached. Please try again tomorrow.';

                        this.canRetry = false;
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
                            error.message ||
                            'Too many AI requests. Please wait and try again later.';

                        this.canRetry = true;
                    } else if (
                        error.status === 419 ||
                        error.code ===
                            'SESSION_EXPIRED'
                    ) {
                        this.error =
                            'Your session has expired. Please refresh the page and try again.';

                        this.canRetry = false;
                    } else if (
                        error.status === 403
                    ) {
                        this.clearConversation();

                        this.error =
                            'This conversation is no longer available. Start a new conversation and try again.';

                        this.canRetry = true;
                        this.shouldStartFresh = true;
                    } else if (
                        error.status === 422
                    ) {
                        this.error =
                            error.message ||
                            'Please check your message and try again.';

                        this.canRetry = false;
                    } else if (
                        error.status === 404
                    ) {
                        this.error =
                            'AI chat route was not found.';

                        this.canRetry = false;
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
                    401: 'The AI provider authentication failed.',
                    403: 'You are not allowed to access this conversation.',
                    404: 'The AI endpoint was not found.',
                    419: 'Your session has expired. Please refresh the page.',
                    422: 'Please check your message and try again.',
                    429: 'Too many requests. Please wait and try again.',
                    500: 'The server could not complete the AI request.',
                    502: 'The AI provider returned an invalid response.',
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