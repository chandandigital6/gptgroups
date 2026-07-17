
    <x-layouts::app :title="__('AI Chats')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    AI Chat Conversations
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Visitors ke messages, AI replies aur enquiry details manage karein.
                </p>
            </div>

            <a
                href="{{ route('admin.ai-chats.index') }}"
                class="inline-flex items-center justify-center rounded-xl
                       bg-black px-5 py-3 text-sm font-semibold text-white
                       transition hover:bg-neutral-800
                       dark:bg-white dark:text-black dark:hover:bg-neutral-200"
            >
                Refresh
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50
                        px-5 py-4 text-sm font-semibold text-green-700
                        dark:border-green-800 dark:bg-green-900/20
                        dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Statistics --}}
        <div class="grid auto-rows-min gap-4 sm:grid-cols-2 xl:grid-cols-4">

            <div class="rounded-2xl border border-neutral-200 bg-white p-5
                        shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Conversations
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ number_format($totalConversations ?? 0) }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5
                        shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Messages
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ number_format($totalMessages ?? 0) }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5
                        shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Visitors
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ number_format($totalVisitors ?? 0) }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5
                        shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Enquiries
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ number_format($totalLeads ?? 0) }}
                </div>
            </div>

        </div>

        {{-- Search --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-5
                    shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <form
                action="{{ route('admin.ai-chats.index') }}"
                method="GET"
                class="flex flex-col gap-3 md:flex-row md:items-center"
            >
                <div class="relative min-w-0 flex-1">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        class="pointer-events-none absolute left-4 top-1/2
                               h-5 w-5 -translate-y-1/2 text-neutral-400"
                    >
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? request('search') }}"
                        placeholder="Search name, email, phone or message..."
                        class="w-full rounded-xl border border-neutral-200
                               bg-white py-3 pl-12 pr-4 text-sm text-neutral-900
                               outline-none transition focus:border-black
                               focus:ring-2 focus:ring-neutral-100
                               dark:border-neutral-700 dark:bg-neutral-950
                               dark:text-white dark:focus:border-white
                               dark:focus:ring-neutral-800"
                    >
                </div>

                <button
                    type="submit"
                    class="rounded-xl bg-black px-6 py-3 text-sm font-semibold
                           text-white transition hover:bg-neutral-800
                           dark:bg-white dark:text-black dark:hover:bg-neutral-200"
                >
                    Search
                </button>

                @if(($search ?? request('search')) !== null && ($search ?? request('search')) !== '')
                    <a
                        href="{{ route('admin.ai-chats.index') }}"
                        class="rounded-xl border border-neutral-200 px-6 py-3
                               text-center text-sm font-semibold text-neutral-700
                               transition hover:bg-neutral-100
                               dark:border-neutral-700 dark:text-neutral-300
                               dark:hover:bg-neutral-800"
                    >
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Desktop Table --}}
        <div class="relative hidden h-full flex-1 overflow-hidden rounded-2xl
                    border border-neutral-200 bg-white shadow-sm
                    dark:border-neutral-700 dark:bg-neutral-900 lg:block">

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200
                              dark:divide-neutral-700">

                    <thead class="bg-neutral-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-neutral-600
                                       dark:text-neutral-300">
                                Visitor
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-neutral-600
                                       dark:text-neutral-300">
                                Last Message
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-neutral-600
                                       dark:text-neutral-300">
                                Messages
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold
                                       uppercase tracking-wider text-neutral-600
                                       dark:text-neutral-300">
                                Last Activity
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold
                                       uppercase tracking-wider text-neutral-600
                                       dark:text-neutral-300">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200
                                  dark:divide-neutral-700">

                        @forelse($conversations as $conversation)
                            @php
                                $visitorName = $conversation->visitor_name
                                    ?: 'Anonymous Visitor';

                                $visitorContact = $conversation->visitor_email
                                    ?: (
                                        $conversation->visitor_phone
                                        ?: 'No contact details'
                                    );

                                $lastActivity = $conversation->last_message_at
                                    ?: $conversation->updated_at
                                    ?: $conversation->created_at;
                            @endphp

                            <tr class="transition hover:bg-neutral-50
                                       dark:hover:bg-neutral-800/60">

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-12 w-12 shrink-0
                                                    items-center justify-center
                                                    rounded-xl bg-neutral-100
                                                    text-base font-bold
                                                    text-neutral-700
                                                    dark:bg-neutral-800
                                                    dark:text-neutral-200">
                                            {{ strtoupper(mb_substr($visitorName, 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">
                                            <div class="truncate font-semibold
                                                        text-neutral-900
                                                        dark:text-white">
                                                {{ $visitorName }}
                                            </div>

                                            <div class="mt-1 max-w-[260px] truncate
                                                        text-xs text-neutral-500
                                                        dark:text-neutral-400">
                                                {{ $visitorContact }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="max-w-md px-6 py-4">
                                    <p class="line-clamp-2 text-sm leading-6
                                              text-neutral-600
                                              dark:text-neutral-300">
                                        {{ $conversation->last_user_message
                                            ?: 'No user message available' }}
                                    </p>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="rounded-full bg-purple-100
                                                 px-3 py-1 text-xs font-semibold
                                                 text-purple-700
                                                 dark:bg-purple-900/30
                                                 dark:text-purple-300">
                                        {{ $conversation->messages_count ?? 0 }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4
                                           text-sm text-neutral-700
                                           dark:text-neutral-300">
                                    {{ $lastActivity
                                        ? \Carbon\Carbon::parse($lastActivity)
                                            ->format('d M Y, h:i A')
                                        : 'Not available' }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <a
                                        href="{{ route(
                                            'admin.ai-chats.show',
                                            $conversation->id
                                        ) }}"
                                        class="inline-flex items-center
                                               justify-center rounded-xl border
                                               border-blue-200 bg-blue-50
                                               px-4 py-2 text-sm font-medium
                                               text-blue-600 transition
                                               hover:bg-blue-100
                                               dark:border-blue-800
                                               dark:bg-blue-900/20
                                               dark:text-blue-300"
                                    >
                                        View Chat
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <h3 class="text-lg font-semibold
                                               text-neutral-800 dark:text-white">
                                        No AI Conversation Found
                                    </h3>

                                    <p class="mt-1 text-sm text-neutral-500
                                              dark:text-neutral-400">
                                        Visitor conversations yahan dikhengi.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            @if(
                $conversations instanceof \Illuminate\Pagination\AbstractPaginator
                && $conversations->hasPages()
            )
                <div class="border-t border-neutral-200 px-6 py-4
                            dark:border-neutral-700">
                    {{ $conversations->withQueryString()->links() }}
                </div>
            @endif
        </div>

        {{-- Mobile Cards --}}
        <div class="space-y-4 lg:hidden">
            @forelse($conversations as $conversation)
                @php
                    $visitorName = $conversation->visitor_name
                        ?: 'Anonymous Visitor';

                    $visitorContact = $conversation->visitor_email
                        ?: (
                            $conversation->visitor_phone
                            ?: 'No contact details'
                        );

                    $lastActivity = $conversation->last_message_at
                        ?: $conversation->updated_at
                        ?: $conversation->created_at;
                @endphp

                <div class="rounded-2xl border border-neutral-200 bg-white p-5
                            shadow-sm dark:border-neutral-700
                            dark:bg-neutral-900">

                    <div class="flex items-start gap-3">
                        <div class="flex h-12 w-12 shrink-0 items-center
                                    justify-center rounded-xl bg-neutral-100
                                    text-base font-bold text-neutral-700
                                    dark:bg-neutral-800
                                    dark:text-neutral-200">
                            {{ strtoupper(mb_substr($visitorName, 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="truncate font-semibold
                                               text-neutral-900 dark:text-white">
                                        {{ $visitorName }}
                                    </h3>

                                    <p class="mt-1 truncate text-xs
                                              text-neutral-500
                                              dark:text-neutral-400">
                                        {{ $visitorContact }}
                                    </p>
                                </div>

                                <span class="shrink-0 rounded-full bg-purple-100
                                             px-3 py-1 text-xs font-semibold
                                             text-purple-700
                                             dark:bg-purple-900/30
                                             dark:text-purple-300">
                                    {{ $conversation->messages_count ?? 0 }}
                                </span>
                            </div>

                            <p class="mt-4 line-clamp-2 text-sm leading-6
                                      text-neutral-600 dark:text-neutral-300">
                                {{ $conversation->last_user_message
                                    ?: 'No user message available' }}
                            </p>

                            <div class="mt-4 flex flex-col gap-3
                                        sm:flex-row sm:items-center
                                        sm:justify-between">
                                <p class="text-xs text-neutral-400">
                                    {{ $lastActivity
                                        ? \Carbon\Carbon::parse($lastActivity)
                                            ->format('d M Y, h:i A')
                                        : 'Not available' }}
                                </p>

                                <a
                                    href="{{ route(
                                        'admin.ai-chats.show',
                                        $conversation->id
                                    ) }}"
                                    class="inline-flex items-center justify-center
                                           rounded-xl border border-blue-200
                                           bg-blue-50 px-4 py-2 text-sm
                                           font-medium text-blue-600 transition
                                           hover:bg-blue-100
                                           dark:border-blue-800
                                           dark:bg-blue-900/20
                                           dark:text-blue-300"
                                >
                                    View Chat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-neutral-200 bg-white
                            px-5 py-16 text-center shadow-sm
                            dark:border-neutral-700 dark:bg-neutral-900">
                    <h3 class="text-lg font-semibold text-neutral-800
                               dark:text-white">
                        No AI Conversation Found
                    </h3>

                    <p class="mt-1 text-sm text-neutral-500
                              dark:text-neutral-400">
                        Visitor conversations yahan dikhengi.
                    </p>
                </div>
            @endforelse

            @if(
                $conversations instanceof \Illuminate\Pagination\AbstractPaginator
                && $conversations->hasPages()
            )
                <div class="rounded-2xl border border-neutral-200 bg-white
                            px-4 py-4 dark:border-neutral-700
                            dark:bg-neutral-900">
                    {{ $conversations->withQueryString()->links() }}
                </div>
            @endif
        </div>

    </div>

</x-layouts::app>