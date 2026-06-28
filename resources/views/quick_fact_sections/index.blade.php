<x-layouts::app :title="__('Quick Fact Sections')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Quick Fact Sections
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage page-wise quick facts for all website pages.
                </p>
            </div>

            <a href="{{ route('quick-fact-sections.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                + Create Quick Facts
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats --}}
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:16px;">
            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Total Sections
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['total'] ?? 0 }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Active
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['active'] ?? 0 }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Fact Items
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['items'] ?? 0 }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Pages
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['pages'] ?? 0 }}
                </div>
            </div>
        </div>

        {{-- Search --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('quick-fact-sections.index') }}"
                  method="GET"
                  class="grid gap-3 md:grid-cols-4">

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search..."
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black md:col-span-2 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <select name="page_slug"
                        class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    <option value="">All Pages</option>

                    @foreach(['home', 'about', 'services', 'brands', 'network', 'retail-outlets', 'careers', 'contact'] as $page)
                        <option value="{{ $page }}" @selected(request('page_slug') === $page)>
                            {{ ucfirst(str_replace('-', ' ', $page)) }}
                        </option>
                    @endforeach
                </select>

                <div class="flex gap-3">
                    <button type="submit"
                            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                        Search
                    </button>

                    @if(request('search') || request('page_slug'))
                        <a href="{{ route('quick-fact-sections.index') }}"
                           class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="relative h-full flex-1 overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">

                    <thead class="bg-neutral-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Section
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Page
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Items
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Order
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">

                        @forelse($quickFactSections as $section)
                            <tr class="transition hover:bg-neutral-50 dark:hover:bg-neutral-800/60">

                                <td class="px-6 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                    {{ $section->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="min-w-0">
                                        <div class="font-semibold text-neutral-900 dark:text-white">
                                            {{ $section->title ?: 'Quick Facts' }}
                                        </div>

                                        <div class="mt-1 text-xs font-medium text-blue-600 dark:text-blue-300">
                                            {{ $section->label ?: 'No Label' }}
                                        </div>

                                        @if(!empty($section->description))
                                            <div class="mt-1 max-w-md truncate text-xs text-neutral-400">
                                                {{ $section->description }}
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700 dark:bg-purple-900/30 dark:text-purple-300">
                                        {{ $section->page_slug }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    {{ $section->items_count ?? 0 }}
                                </td>

                                <td class="px-6 py-4 text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    {{ $section->sort_order ?? 0 }}
                                </td>

                                <td class="px-6 py-4">
                                    @if((int) $section->status === 1)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                            Active
                                        </span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-900/30 dark:text-red-300">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">

                                        <a href="{{ route('quick-fact-sections.show', $section->id) }}"
                                           class="inline-flex items-center justify-center rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-100 dark:border-blue-800 dark:bg-blue-900/20 dark:text-blue-300">
                                            View
                                        </a>

                                        <a href="{{ route('quick-fact-sections.edit', $section->id) }}"
                                           class="inline-flex items-center justify-center rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm font-medium text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300">
                                            Edit
                                        </a>

                                        <form action="{{ route('quick-fact-sections.destroy', $section->id) }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this quick fact section?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center justify-center rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    <h3 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                        No Quick Fact Section Found
                                    </h3>

                                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                        Create your first quick fact section.
                                    </p>

                                    <a href="{{ route('quick-fact-sections.create') }}"
                                       class="mt-5 inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                                        + Create Quick Facts
                                    </a>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</x-layouts::app>