<x-layouts::app :title="__('Company Overviews')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Company Overviews
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage company overview heading, description, feature cards and section images.
                </p>
            </div>

            <a href="{{ route('company-overviews.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                + Create Company Overview
            </a>
        </div>

        {{-- Success --}}
        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Total Sections</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\CompanyOverview::count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Active</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\CompanyOverview::where('status', 1)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Inactive</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\CompanyOverview::where('status', 0)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Latest</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ optional(\App\Models\CompanyOverview::latest()->first())->id ?? 0 }}
                </div>
            </div>
        </div>

        {{-- Search --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('company-overviews.index') }}" method="GET" class="flex flex-col gap-3 md:flex-row md:items-center">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by title, label, description or cards..."
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <button type="submit"
                        class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Search
                </button>

                @if(request('search'))
                    <a href="{{ route('company-overviews.index') }}"
                       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="relative h-full flex-1 overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                    <thead class="bg-neutral-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">#</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Overview</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Cards</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Images</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($companyOverviews as $companyOverview)
                            <tr class="transition hover:bg-neutral-50 dark:hover:bg-neutral-800/60">
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                    {{ $companyOverview->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-semibold text-neutral-900 dark:text-white">
                                            {{ $companyOverview->title }}
                                        </div>

                                        <div class="mt-1 text-xs text-blue-600 dark:text-blue-300">
                                            {{ $companyOverview->label ?: 'No Label' }}
                                        </div>

                                        <div class="mt-1 max-w-md truncate text-xs text-neutral-400">
                                            {{ $companyOverview->description }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @if($companyOverview->card_1_title)
                                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                                {{ $companyOverview->card_1_title }}
                                            </span>
                                        @endif

                                        @if($companyOverview->card_2_title)
                                            <span class="rounded-full bg-cyan-100 px-3 py-1 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                                                {{ $companyOverview->card_2_title }}
                                            </span>
                                        @endif

                                        @if(!$companyOverview->card_1_title && !$companyOverview->card_2_title)
                                            <span class="text-sm text-neutral-400">No Cards</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex -space-x-3">
                                        @foreach(['image_1', 'image_2', 'image_3', 'image_4'] as $imageField)
                                            @if($companyOverview->{$imageField})
                                                <img src="{{ asset('storage/' . $companyOverview->{$imageField}) }}"
                                                     class="h-12 w-12 rounded-xl border-2 border-white object-cover shadow-sm dark:border-neutral-900"
                                                     alt="Image">
                                            @endif
                                        @endforeach

                                        @if(!$companyOverview->image_1 && !$companyOverview->image_2 && !$companyOverview->image_3 && !$companyOverview->image_4)
                                            <span class="text-sm text-neutral-400">No Images</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    {{ $companyOverview->sort_order }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($companyOverview->status)
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
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('company-overviews.show', $companyOverview) }}"
                                           class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-100 dark:border-blue-800 dark:bg-blue-900/20 dark:text-blue-300">
                                            View
                                        </a>

                                        <a href="{{ route('company-overviews.edit', $companyOverview) }}"
                                           class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm font-medium text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300">
                                            Edit
                                        </a>

                                        <form action="{{ route('company-overviews.destroy', $companyOverview) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this company overview?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
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
                                        No Company Overview Found
                                    </h3>

                                    <p class="mt-1 text-sm text-neutral-500">
                                        Create your first company overview section.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($companyOverviews, 'links'))
                <div class="border-t border-neutral-200 px-6 py-4 dark:border-neutral-700">
                    {{ $companyOverviews->links() }}
                </div>
            @endif
        </div>
    </div>

</x-layouts::app>