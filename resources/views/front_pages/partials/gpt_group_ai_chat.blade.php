<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div
    x-data="gptGroupAiChat()"
    x-cloak
    class="fixed bottom-5 right-5 z-[9999]"
>
    <div
        x-show="open"
        x-transition
        class="mb-4 flex h-[min(650px,calc(100vh-110px))]
               w-[min(400px,calc(100vw-32px))]
               flex-col overflow-hidden rounded-3xl
               border border-slate-200 bg-white shadow-2xl"
    >
        <div class="bg-slate-950 px-5 py-4 text-white">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="font-bold">
                        GPT Group AI Assistant
                    </h3>

                    <p class="mt-1 text-xs text-slate-300">
                        Products, services, network and partnerships
                    </p>
                </div>

                <button
                    type="button"
                    @click="open = false"
                    class="flex h-9 w-9 items-center
                           justify-center rounded-full
                           bg-white/10 hover:bg-white/20"
                >
                    ✕
                </button>
            </div>
        </div>

        <div
            x-ref="messages"
            class="flex-1 space-y-4 overflow-y-auto
                   bg-slate-50 p-4"
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
                        class="max-w-[88%] whitespace-pre-wrap
                               rounded-2xl px-4 py-3 text-sm
                               leading-6"
                        :class="message.role === 'user'
                            ? 'rounded-br-md bg-cyan-600 text-white'
                            : 'rounded-bl-md border border-slate-200 bg-white text-slate-700'"
                        x-text="message.content"
                    ></div>
                </div>
            </template>

            <div
                x-show="loading"
                class="flex justify-start"
            >
                <div
                    class="rounded-2xl rounded-bl-md
                           border border-slate-200 bg-white
                           px-4 py-3 text-sm text-slate-500"
                >
                    GPT Group AI is typing...
                </div>
            </div>
        </div>

        <div
            x-show="messages.length === 1"
            class="flex gap-2 overflow-x-auto border-t
                   border-slate-100 bg-white px-4 py-3"
        >
            <template
                x-for="suggestion in suggestions"
                :key="suggestion"
            >
                <button
                    type="button"
                    @click="useSuggestion(suggestion)"
                    class="shrink-0 rounded-full border
                           border-slate-200 px-3 py-2
                           text-xs font-semibold text-slate-700
                           hover:border-cyan-500
                           hover:text-cyan-700"
                    x-text="suggestion"
                ></button>
            </template>
        </div>

        <form
            @submit.prevent="sendMessage()"
            class="border-t border-slate-200 bg-white p-4"
        >
            <div class="flex items-end gap-2">
                <textarea
                    x-model="input"
                    @keydown.enter.prevent="
                        if (!$event.shiftKey) {
                            sendMessage();
                        }
                    "
                    rows="1"
                    maxlength="5000"
                    placeholder="Ask GPT Group..."
                    class="max-h-28 min-h-[48px] flex-1
                           resize-none rounded-2xl border
                           border-slate-300 px-4 py-3
                           text-sm outline-none
                           focus:border-cyan-500
                           focus:ring-2 focus:ring-cyan-100"
                ></textarea>

                <button
                    type="submit"
                    :disabled="loading || !input.trim()"
                    class="flex h-12 w-12 shrink-0
                           items-center justify-center
                           rounded-2xl bg-cyan-600
                           font-bold text-white
                           hover:bg-cyan-700
                           disabled:cursor-not-allowed
                           disabled:opacity-50"
                >
                    ➤
                </button>
            </div>

            <p
                x-show="error"
                x-text="error"
                class="mt-2 text-xs text-red-600"
            ></p>
        </form>
    </div>

    <button
        type="button"
        @click="open = !open"
        class="ml-auto flex h-16 w-16 items-center
               justify-center rounded-full bg-cyan-600
               text-2xl text-white shadow-xl
               transition hover:scale-105
               hover:bg-cyan-700"
        aria-label="Open GPT Group AI Assistant"
    >
        <span x-show="!open">✦</span>
        <span x-show="open">✕</span>
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

            conversationId: localStorage.getItem(
                'gpt_group_ai_conversation_id'
            ),

            messages: [
                {
                    id: crypto.randomUUID(),
                    role: 'assistant',
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

            init() {
                this.$watch('open', async (isOpen) => {
                    if (
                        isOpen &&
                        this.conversationId &&
                        !this.historyLoaded
                    ) {
                        await this.loadHistory();
                    }
                });
            },

            async loadHistory() {
                try {
                    const url =
                        @json(url('/gpt-group-ai/conversations'))
                        + '/'
                        + encodeURIComponent(this.conversationId)
                        + '/messages';

                    const response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin'
                    });

                    if (!response.ok) {
                        localStorage.removeItem(
                            'gpt_group_ai_conversation_id'
                        );

                        this.conversationId = null;
                        return;
                    }

                    const result = await response.json();

                    if (
                        result.success &&
                        Array.isArray(result.data) &&
                        result.data.length
                    ) {
                        this.messages = result.data.map(
                            message => ({
                                id: message.id,
                                role: message.role,
                                content: message.content
                            })
                        );
                    }
                } catch (error) {
                    console.error(error);
                } finally {
                    this.historyLoaded = true;
                    this.scrollToBottom();
                }
            },

            async useSuggestion(suggestion) {
                this.input = suggestion;
                await this.sendMessage();
            },

            async sendMessage() {
                const message = this.input.trim();

                if (!message || this.loading) {
                    return;
                }

                this.input = '';
                this.error = '';

                this.messages.push({
                    id: crypto.randomUUID(),
                    role: 'user',
                    content: message
                });

                this.loading = true;
                this.scrollToBottom();

                try {
                    const response = await fetch(
                        @json(route('gpt-group-ai.chat')),
                        {
                            method: 'POST',
                            credentials: 'same-origin',

                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document
                                    .querySelector(
                                        'meta[name="csrf-token"]'
                                    )
                                    ?.getAttribute('content')
                            },

                            body: JSON.stringify({
                                message: message,

                                conversation_id:
                                    this.conversationId,

                                language:
                                    document.documentElement.lang
                                    || 'en',

                                page_url:
                                    window.location.href
                            })
                        }
                    );

                    const result = await response.json();

                    if (
                        !response.ok ||
                        !result.success
                    ) {
                        throw new Error(
                            result.message
                            || 'Unable to get a response.'
                        );
                    }

                    this.conversationId =
                        result.data.conversation_id;

                    localStorage.setItem(
                        'gpt_group_ai_conversation_id',
                        this.conversationId
                    );

                    this.messages.push({
                        id: crypto.randomUUID(),
                        role: 'assistant',
                        content: result.data.message
                    });
                } catch (error) {
                    this.error = error.message;

                    this.messages.push({
                        id: crypto.randomUUID(),
                        role: 'assistant',
                        content:
                            'Sorry, I could not complete your request. Please try again.'
                    });
                } finally {
                    this.loading = false;
                    this.scrollToBottom();
                }
            },

            scrollToBottom() {
                this.$nextTick(() => {
                    const container = this.$refs.messages;

                    if (container) {
                        container.scrollTop =
                            container.scrollHeight;
                    }
                });
            }
        };
    }
</script>