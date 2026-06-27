<x-layouts::app :title="__('Quick Fact Sections')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

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

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500">Total Sections</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\QuickFactSection::count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500">Active</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\QuickFactSection::where('status', 1)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500">Fact Items</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\QuickFactItem::count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500">Pages</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\QuickFactSection::distinct('page_slug')->count('page_slug') }}
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('quick-fact-sections.index') }}" method="GET" class="grid gap-3 md:grid-cols-4">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search..."
                       class="md:col-span-2 w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">

                <select name="page_slug"
                        class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                    <option value="">All Pages</option>
                    @foreach(['home', 'about', 'services', 'brands', 'network', 'retail-outlets', 'careers', 'contact'] as $page)
                        <option value="{{ $page }}" @selected(request('page_slug') === $page)>
                            {{ ucfirst(str_replace('-', ' ', $page)) }}
                        </option>
                    @endforeach
                </select>

                <div class="flex gap-3">
                    <button type="submit"
                            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
                        Search
                    </button>

                    @if(request('search') || request('page_slug'))
                        <a href="{{ route('quick-fact-sections.index') }}"
                           class="rounded-xl border px-6 py-3 text-sm font-semibold">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="relative h-full flex-1 overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200">
                    <thead class="bg-neutral-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">#</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Section</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Page</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Items</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200">
                        @forelse($quickFactSections as $section)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $section->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-neutral-900 dark:text-white">
                                        {{ $section->title ?: 'Quick Facts' }}
                                    </div>

                                    <div class="mt-1 text-xs text-blue-600">
                                        {{ $section->label ?: 'No Label' }}
                                    </div>

                                    <div class="mt-1 max-w-md truncate text-xs text-neutral-400">
                                        {{ $section->description }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">
                                        {{ $section->page_slug }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 font-semibold">
                                    {{ $section->items_count }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $section->sort_order }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($section->status)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                            Active
                                        </span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('quick-fact-sections.show', $section) }}"
                                           class="rounded-xl bg-blue-50 px-4 py-2 text-sm text-blue-600">
                                            View
                                        </a>

                                        <a href="{{ route('quick-fact-sections.edit', $section) }}"
                                           class="rounded-xl bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                            Edit
                                        </a>

                                        <form action="{{ route('quick-fact-sections.destroy', $section) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this quick fact section?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-xl bg-red-50 px-4 py-2 text-sm text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    No Quick Fact Section Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-neutral-200 px-6 py-4">
                {{ $quickFactSections->links() }}
            </div>
        </div>
    </div>

</x-layouts::app>