<x-layouts::app :title="__('AI Chat Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <a
                    href="{{ route('admin.ai-chats.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold
                           text-neutral-600 transition hover:text-black
                           dark:text-neutral-400 dark:hover:text-white"
                >
                    <span>←</span>
                    Back to AI Chats
                </a>

                <h1 class="mt-2 text-2xl font-bold text-neutral-900 dark:text-white">
                    Conversation Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Visitor details, enquiries aur complete AI chat history dekhein.
                </p>
            </div>

            <form
                method="POST"
                action="{{ route(
                    'admin.ai-chats.destroy',
                    $conversation->id
                ) }}"
                onsubmit="return confirm(
                    'Are you sure you want to delete this conversation?'
                )"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-xl
                           border border-red-200 bg-red-50 px-5 py-3
                           text-sm font-semibold text-red-600 transition
                           hover:bg-red-100 dark:border-red-800
                           dark:bg-red-900/20 dark:text-red-300"
                >
                    Delete Conversation
                </button>
            </form>
        </div>

        {{-- Main Content --}}
        <div class="grid min-h-[calc(100vh-190px)] gap-6
                    xl:grid-cols-[340px_minmax(0,1fr)]">

            {{-- Sidebar --}}
            <aside class="space-y-6">

                {{-- Visitor Details --}}
                <div class="rounded-2xl border border-neutral-200 bg-white p-5
                            shadow-sm dark:border-neutral-700
                            dark:bg-neutral-900">

                    <div class="flex items-center gap-3">
                        <div class="flex h-14 w-14 shrink-0 items-center
                                    justify-center rounded-2xl bg-neutral-100
                                    text-xl font-bold text-neutral-700
                                    dark:bg-neutral-800
                                    dark:text-neutral-200">
                            {{ strtoupper(
                                mb_substr(
                                    $visitor?->name ?: 'V',
                                    0,
                                    1
                                )
                            ) }}
                        </div>

                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-bold
                                       text-neutral-900 dark:text-white">
                                {{ $visitor?->name ?: 'Anonymous Visitor' }}
                            </h2>

                            <p class="mt-1 text-xs text-neutral-500
                                      dark:text-neutral-400">
                                AI Website Visitor
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-5">

                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wider text-neutral-400">
                                Email
                            </p>

                            <p class="mt-1 break-all text-sm font-medium
                                      text-neutral-700 dark:text-neutral-300">
                                {{ $visitor?->email ?: 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wider text-neutral-400">
                                Phone
                            </p>

                            <p class="mt-1 text-sm font-medium
                                      text-neutral-700 dark:text-neutral-300">
                                {{ $visitor?->phone ?: 'Not provided' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wider text-neutral-400">
                                Language
                            </p>

                            <span class="mt-2 inline-flex rounded-full
                                         bg-purple-100 px-3 py-1 text-xs
                                         font-semibold text-purple-700
                                         dark:bg-purple-900/30
                                         dark:text-purple-300">
                                {{ strtoupper($visitor?->language ?: 'EN') }}
                            </span>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wider text-neutral-400">
                                IP Address
                            </p>

                            <p class="mt-1 text-sm font-medium
                                      text-neutral-700 dark:text-neutral-300">
                                {{ $visitor?->ip_address ?: 'Not available' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase
                                      tracking-wider text-neutral-400">
                                Last Seen
                            </p>

                            <p class="mt-1 text-sm font-medium
                                      text-neutral-700 dark:text-neutral-300">
                                {{ $visitor?->last_seen_at
                                    ? \Carbon\Carbon::parse(
                                        $visitor->last_seen_at
                                    )->format('d M Y, h:i A')
                                    : 'Not available' }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- Conversation Statistics --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-2xl border border-neutral-200
                                bg-white p-4 shadow-sm
                                dark:border-neutral-700
                                dark:bg-neutral-900">
                        <p class="text-xs text-neutral-500
                                  dark:text-neutral-400">
                            User Messages
                        </p>

                        <p class="mt-2 text-2xl font-bold text-black
                                  dark:text-white">
                            {{ number_format($userMessagesCount ?? 0) }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-neutral-200
                                bg-white p-4 shadow-sm
                                dark:border-neutral-700
                                dark:bg-neutral-900">
                        <p class="text-xs text-neutral-500
                                  dark:text-neutral-400">
                            AI Replies
                        </p>

                        <p class="mt-2 text-2xl font-bold text-black
                                  dark:text-white">
                            {{ number_format($assistantMessagesCount ?? 0) }}
                        </p>
                    </div>
                </div>

                {{-- Enquiries --}}
                <div class="rounded-2xl border border-neutral-200 bg-white p-5
                            shadow-sm dark:border-neutral-700
                            dark:bg-neutral-900">

                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <h3 class="font-bold text-neutral-900 dark:text-white">
                                Enquiries
                            </h3>

                            <p class="mt-1 text-xs text-neutral-500
                                      dark:text-neutral-400">
                                Visitor ki submitted requirements.
                            </p>
                        </div>

                        <span class="rounded-full bg-green-100 px-3 py-1
                                     text-xs font-semibold text-green-700
                                     dark:bg-green-900/30
                                     dark:text-green-300">
                            {{ $leads->count() }}
                        </span>
                    </div>

                    <div class="mt-5 space-y-3">
                        @forelse($leads as $lead)
                            <div class="rounded-xl border border-neutral-200
                                        bg-neutral-50 p-4
                                        dark:border-neutral-700
                                        dark:bg-neutral-950">

                                <div class="flex items-start
                                            justify-between gap-3">
                                    <span class="rounded-full bg-blue-100
                                                 px-3 py-1 text-[11px]
                                                 font-semibold uppercase
                                                 text-blue-700
                                                 dark:bg-blue-900/30
                                                 dark:text-blue-300">
                                        {{ $lead->lead_type ?: 'Enquiry' }}
                                    </span>

                                    <span class="shrink-0 text-[11px]
                                                 text-neutral-400">
                                        {{ $lead->created_at
                                            ? $lead->created_at->format('d M Y')
                                            : '' }}
                                    </span>
                                </div>

                                <p class="mt-3 whitespace-pre-wrap break-words
                                          text-sm leading-6 text-neutral-600
                                          dark:text-neutral-300">
                                    {{ $lead->requirement
                                        ?: 'No requirement details available.' }}
                                </p>
                            </div>
                        @empty
                            <div class="rounded-xl bg-neutral-50 p-4
                                        text-sm text-neutral-500
                                        dark:bg-neutral-950
                                        dark:text-neutral-400">
                                No enquiry submitted by this visitor.
                            </div>
                        @endforelse
                    </div>
                </div>
            </aside>

            {{-- Chat Panel --}}
            <section class="flex min-h-[620px] flex-col overflow-hidden
                            rounded-2xl border border-neutral-200 bg-white
                            shadow-sm dark:border-neutral-700
                            dark:bg-neutral-900">

                {{-- Chat Header --}}
                <div class="flex items-center justify-between gap-4
                            border-b border-neutral-200 bg-neutral-100
                            px-5 py-4 dark:border-neutral-700
                            dark:bg-neutral-800">

                    <div>
                        <h2 class="font-bold text-neutral-900 dark:text-white">
                            Chat Messages
                        </h2>

                        <p class="mt-1 text-xs text-neutral-500
                                  dark:text-neutral-400">
                            {{ number_format($userMessagesCount ?? 0) }}
                            user messages ·
                            {{ number_format($assistantMessagesCount ?? 0) }}
                            AI replies
                        </p>
                    </div>

                    <span class="rounded-full bg-green-100 px-3 py-1
                                 text-xs font-semibold text-green-700
                                 dark:bg-green-900/30
                                 dark:text-green-300">
                        {{ $messages->count() }} Total
                    </span>
                </div>

                {{-- Messages --}}
                <div
                    id="adminAiMessages"
                    class="flex-1 space-y-5 overflow-y-auto bg-neutral-50
                           px-4 py-6 dark:bg-neutral-950 sm:px-6"
                >
                    @forelse($messages as $message)
                        @if(in_array($message->role, ['user', 'assistant']))
                            @php
                                $isUser = $message->role === 'user';
                            @endphp

                            <div class="flex {{ $isUser
                                ? 'justify-end'
                                : 'justify-start' }}">

                                <div class="max-w-[92%] sm:max-w-[80%]">

                                    <div class="mb-1 flex items-center gap-2
                                                {{ $isUser
                                                    ? 'justify-end'
                                                    : 'justify-start' }}">
                                        <span class="text-[10px] font-semibold
                                                     uppercase tracking-wider
                                                     text-neutral-400">
                                            {{ $isUser
                                                ? 'Visitor'
                                                : 'AI Assistant' }}
                                        </span>
                                    </div>

                                    <div class="whitespace-pre-wrap break-words
                                                rounded-2xl px-4 py-3 text-sm
                                                leading-6 shadow-sm
                                                {{ $isUser
                                                    ? 'rounded-br-md bg-black text-white dark:bg-white dark:text-black'
                                                    : 'rounded-bl-md border border-neutral-200 bg-white text-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-200' }}"
                                    >{{ $message->display_content }}</div>

                                    <p class="mt-1 text-[10px] text-neutral-400
                                              {{ $isUser
                                                  ? 'text-right'
                                                  : 'text-left' }}">
                                        {{ $message->created_at
                                            ? \Carbon\Carbon::parse(
                                                $message->created_at
                                            )->format('d M Y, h:i A')
                                            : '' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="flex h-full min-h-[400px]
                                    items-center justify-center text-center">
                            <div>
                                <h3 class="text-lg font-semibold
                                           text-neutral-800 dark:text-white">
                                    No Messages Available
                                </h3>

                                <p class="mt-1 text-sm text-neutral-500
                                          dark:text-neutral-400">
                                    Is conversation mein abhi koi message nahi hai.
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>

            </section>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const messagesContainer = document.getElementById(
                'adminAiMessages'
            );

            if (messagesContainer) {
                messagesContainer.scrollTop =
                    messagesContainer.scrollHeight;
            }
        });
    </script>

</x-layouts::app>