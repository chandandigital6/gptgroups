<x-layouts::app :title="__('Banner Details')">

    @php
        $team = request()->route('current_team');

        $indexRoute = $team
            ? route('banners.index', $team)
            : route('banners.index');

        $editRoute = $team
            ? route('banners.edit', [$team, $banner])
            : route('banners.edit', $banner);
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Banner Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View banner content, images, links and status.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ $indexRoute }}"
                   class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>

                <a href="{{ $editRoute }}"
                   class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit Banner
                </a>
            </div>

        </div>

        {{-- Preview --}}
        <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="relative min-h-[360px] overflow-hidden">

                @if($banner->desktop_image)
                    <img src="{{ asset('storage/' . $banner->desktop_image) }}"
                         alt="{{ $banner->title }}"
                         class="absolute inset-0 h-full w-full object-cover">
                @else
                    <div class="absolute inset-0 bg-slate-950"></div>
                @endif

                <div class="absolute inset-0 bg-slate-950/70"></div>

                <div class="relative z-10 grid min-h-[360px] gap-6 p-6 lg:grid-cols-2 lg:items-center lg:p-10">

                    <div class="text-white">
                        <div class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-xs font-black backdrop-blur">
                            {{ $banner->badge ?: 'No Badge' }}
                        </div>

                        <h2 class="mt-5 text-4xl font-black">
                            {{ $banner->title }}
                        </h2>

                        <p class="mt-2 text-2xl font-black text-cyan-300">
                            {{ $banner->highlight }}
                        </p>

                        <p class="mt-5 max-w-xl leading-7 text-slate-200">
                            {{ $banner->description }}
                        </p>
                    </div>

                    <div>
                        @if($banner->product_image)
                            <img src="{{ asset('storage/' . $banner->product_image) }}"
                                 alt="{{ $banner->title }}"
                                 class="h-72 w-full rounded-2xl object-cover shadow-2xl">
                        @else
                            <div class="flex h-72 items-center justify-center rounded-2xl bg-white/10 text-white">
                                No Product Image
                            </div>
                        @endif
                    </div>

                </div>

            </div>

        </div>

        {{-- Details --}}
        <div class="grid gap-6 lg:grid-cols-2">

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
                    Banner Information
                </h3>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Title</span>
                        <span class="font-semibold text-neutral-900 dark:text-white">{{ $banner->title }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Highlight</span>
                        <span class="font-semibold text-neutral-900 dark:text-white">{{ $banner->highlight ?: '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Theme</span>
                        <span class="font-semibold text-neutral-900 dark:text-white">{{ ucfirst($banner->theme) }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Sort Order</span>
                        <span class="font-semibold text-neutral-900 dark:text-white">{{ $banner->sort_order }}</span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-neutral-500">Status</span>

                        @if($banner->status)
                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                Active
                            </span>
                        @else
                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-900/30 dark:text-red-300">
                                Inactive
                            </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
                    Links
                </h3>

                <div class="space-y-4 text-sm">

                    <div class="border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <div class="text-neutral-500">Primary Button</div>
                        <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                            {{ $banner->button_text ?: '-' }}
                        </div>
                        <div class="mt-1 text-neutral-500">
                            {{ $banner->button_link ?: '-' }}
                        </div>
                    </div>

                    <div>
                        <div class="text-neutral-500">Second Button</div>
                        <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                            {{ $banner->second_button_text ?: '-' }}
                        </div>
                        <div class="mt-1 text-neutral-500">
                            {{ $banner->second_button_link ?: '-' }}
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Images --}}
        <div class="grid gap-6 md:grid-cols-3">

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-3 font-bold text-neutral-900 dark:text-white">Desktop Image</h3>

                @if($banner->desktop_image)
                    <img src="{{ asset('storage/' . $banner->desktop_image) }}"
                         class="h-52 w-full rounded-xl object-cover">
                @else
                    <div class="flex h-52 items-center justify-center rounded-xl bg-neutral-100 text-neutral-400 dark:bg-neutral-800">
                        No Image
                    </div>
                @endif
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-3 font-bold text-neutral-900 dark:text-white">Mobile Image</h3>

                @if($banner->mobile_image)
                    <img src="{{ asset('storage/' . $banner->mobile_image) }}"
                         class="h-52 w-full rounded-xl object-cover">
                @else
                    <div class="flex h-52 items-center justify-center rounded-xl bg-neutral-100 text-neutral-400 dark:bg-neutral-800">
                        No Image
                    </div>
                @endif
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-3 font-bold text-neutral-900 dark:text-white">Product Image</h3>

                @if($banner->product_image)
                    <img src="{{ asset('storage/' . $banner->product_image) }}"
                         class="h-52 w-full rounded-xl object-cover">
                @else
                    <div class="flex h-52 items-center justify-center rounded-xl bg-neutral-100 text-neutral-400 dark:bg-neutral-800">
                        No Image
                    </div>
                @endif
            </div>

        </div>

    </div>

</x-layouts::app>