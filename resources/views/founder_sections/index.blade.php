<x-layouts::app :title="__('Founder Sections')">

    @php
        $team = request()->route('current_team');

        $createRoute = $team
            ? route('founder-sections.create', $team)
            : route('founder-sections.create');

        $indexRoute = $team
            ? route('founder-sections.index', $team)
            : route('founder-sections.index');
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Founder Sections
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage founder/CEO section content, image, stats and button.
                </p>
            </div>

            <a href="{{ $createRoute }}"
               class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                + Create Founder Section
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
                    {{ \App\Models\FounderSection::count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Active</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\FounderSection::where('status', 1)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Inactive</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\FounderSection::where('status', 0)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">Latest</div>
                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ optional(\App\Models\FounderSection::latest()->first())->id ?? 0 }}
                </div>
            </div>
        </div>

        {{-- Search --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ $indexRoute }}" method="GET" class="flex flex-col gap-3 md:flex-row md:items-center">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by title, label or description..."
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <button type="submit"
                        class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Search
                </button>

                @if(request('search'))
                    <a href="{{ $indexRoute }}"
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
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Founder Section</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Stats</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($founderSections as $founderSection)

                            @php
                                $showRoute = $team
                                    ? route('founder-sections.show', [$team, $founderSection])
                                    : route('founder-sections.show', $founderSection);

                                $editRoute = $team
                                    ? route('founder-sections.edit', [$team, $founderSection])
                                    : route('founder-sections.edit', $founderSection);

                                $deleteRoute = $team
                                    ? route('founder-sections.destroy', [$team, $founderSection])
                                    : route('founder-sections.destroy', $founderSection);
                            @endphp

                            <tr class="transition hover:bg-neutral-50 dark:hover:bg-neutral-800/60">
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                    {{ $founderSection->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-16 w-24 overflow-hidden rounded-xl bg-neutral-100 dark:bg-neutral-800">
                                            @if($founderSection->image)
                                                <img src="{{ asset('storage/' . $founderSection->image) }}"
                                                     alt="{{ $founderSection->title }}"
                                                     class="h-full w-full object-cover">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center text-xs text-neutral-400">
                                                    No Image
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <div class="font-semibold text-neutral-900 dark:text-white">
                                                {{ $founderSection->title }}
                                            </div>

                                            <div class="mt-1 text-xs text-neutral-500">
                                                {{ $founderSection->label ?: 'No Label' }}
                                            </div>

                                            <div class="mt-1 max-w-md truncate text-xs text-neutral-400">
                                                {{ $founderSection->description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @if($founderSection->stat_1_value)
                                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                                {{ $founderSection->stat_1_value }} {{ $founderSection->stat_1_label }}
                                            </span>
                                        @endif

                                        @if($founderSection->stat_2_value)
                                            <span class="rounded-full bg-cyan-100 px-3 py-1 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                                                {{ $founderSection->stat_2_value }} {{ $founderSection->stat_2_label }}
                                            </span>
                                        @endif

                                        @if($founderSection->stat_3_value)
                                            <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-700 dark:bg-purple-900/30 dark:text-purple-300">
                                                {{ $founderSection->stat_3_value }} {{ $founderSection->stat_3_label }}
                                            </span>
                                        @endif

                                        @if(!$founderSection->stat_1_value && !$founderSection->stat_2_value && !$founderSection->stat_3_value)
                                            <span class="text-sm text-neutral-400">No Stats</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    {{ $founderSection->sort_order }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($founderSection->status)
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
                                        <a href="{{ $showRoute }}"
                                           class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-100 dark:border-blue-800 dark:bg-blue-900/20 dark:text-blue-300">
                                            View
                                        </a>

                                        <a href="{{ $editRoute }}"
                                           class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm font-medium text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300">
                                            Edit
                                        </a>

                                        <form action="{{ $deleteRoute }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this founder section?')">
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
                                <td colspan="6" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-neutral-100 dark:bg-neutral-800">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-10 w-10 text-neutral-400"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.5"
                                                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0" />
                                            </svg>
                                        </div>

                                        <h3 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                            No Founder Section Found
                                        </h3>

                                        <p class="mt-1 text-sm text-neutral-500">
                                            Create your first founder section.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($founderSections, 'links'))
                <div class="border-t border-neutral-200 px-6 py-4 dark:border-neutral-700">
                    {{ $founderSections->links() }}
                </div>
            @endif
        </div>
    </div>

</x-layouts::app>