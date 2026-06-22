<x-layouts::app :title="__('Banners Management')">

    @php
        $team = request()->route('current_team');

        $createRoute = $team
            ? route('banners.create', $team)
            : route('banners.create');

        $indexRoute = $team
            ? route('banners.index', $team)
            : route('banners.index');
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Banners Management
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage homepage banners, images, links and display order.
                </p>
            </div>

            <a href="{{ $createRoute }}"
               class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                + Create Banner
            </a>

        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Total Banners
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\Banner::count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Active Banners
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\Banner::where('status', 1)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Inactive Banners
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ \App\Models\Banner::where('status', 0)->count() }}
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Themes
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    3
                </div>
            </div>

        </div>

        {{-- Search --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ $indexRoute }}" method="GET" class="flex flex-col gap-3 md:flex-row md:items-center">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by title, highlight or badge..."
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
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Banner
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Images
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Theme / Order
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

                        @forelse($banners as $banner)

                            @php
                                $showRoute = $team
                                    ? route('banners.show', [$team, $banner])
                                    : route('banners.show', $banner);

                                $editRoute = $team
                                    ? route('banners.edit', [$team, $banner])
                                    : route('banners.edit', $banner);

                                $deleteRoute = $team
                                    ? route('banners.destroy', [$team, $banner])
                                    : route('banners.destroy', $banner);
                            @endphp

                            <tr class="transition hover:bg-neutral-50 dark:hover:bg-neutral-800/60">

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                    {{ $banner->id }}
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="h-14 w-20 overflow-hidden rounded-xl bg-neutral-100 dark:bg-neutral-800">
                                            @if($banner->desktop_image)
                                                <img src="{{ asset('storage/' . $banner->desktop_image) }}"
                                                     alt="{{ $banner->title }}"
                                                     class="h-full w-full object-cover">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center text-xs text-neutral-400">
                                                    No Image
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <div class="font-semibold text-neutral-900 dark:text-white">
                                                {{ $banner->title }}
                                            </div>

                                            <div class="mt-1 text-xs text-neutral-500">
                                                {{ $banner->badge ?: 'No Badge' }}
                                            </div>

                                            <div class="mt-1 max-w-md truncate text-xs text-neutral-400">
                                                {{ $banner->highlight }}
                                            </div>
                                        </div>

                                    </div>

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        @if($banner->desktop_image)
                                            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                                Desktop
                                            </span>
                                        @endif

                                        @if($banner->mobile_image)
                                            <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-700 dark:bg-purple-900/30 dark:text-purple-300">
                                                Mobile
                                            </span>
                                        @endif

                                        @if($banner->product_image)
                                            <span class="rounded-full bg-cyan-100 px-3 py-1 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                                                Product
                                            </span>
                                        @endif

                                        @if(!$banner->desktop_image && !$banner->mobile_image && !$banner->product_image)
                                            <span class="text-sm text-neutral-400">
                                                No Images
                                            </span>
                                        @endif

                                    </div>

                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                            {{ ucfirst($banner->theme) }}
                                        </span>

                                        <span class="text-xs text-neutral-500">
                                            Sort: {{ $banner->sort_order }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    @if($banner->status)
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
                                              onsubmit="return confirm('Delete this banner?')">

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
                                                      d="M4 16l4-4a3 3 0 014 0l4 4m-2-2l1-1a3 3 0 014 0l1 1M4 6h16M4 6v12h16V6M8 10h.01" />
                                            </svg>
                                        </div>

                                        <h3 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                            No Banners Found
                                        </h3>

                                        <p class="mt-1 text-sm text-neutral-500">
                                            Create your first banner to show it on homepage.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            @if(method_exists($banners, 'links'))
                <div class="border-t border-neutral-200 px-6 py-4 dark:border-neutral-700">
                    {{ $banners->links() }}
                </div>
            @endif

        </div>

    </div>

</x-layouts::app>