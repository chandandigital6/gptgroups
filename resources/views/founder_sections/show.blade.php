<x-layouts::app :title="__('Founder Section Details')">

    @php
        $team = request()->route('current_team');

        $indexRoute = $team
            ? route('founder-sections.index', $team)
            : route('founder-sections.index');

        $editRoute = $team
            ? route('founder-sections.edit', [$team, $founderSection])
            : route('founder-sections.edit', $founderSection);
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Founder Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View founder section preview, content and settings.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ $indexRoute }}"
                   class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>

                <a href="{{ $editRoute }}"
                   class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit Section
                </a>
            </div>
        </div>

        {{-- Preview --}}
        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid items-center gap-10 lg:grid-cols-2">

                <div class="overflow-hidden rounded-[2rem] bg-neutral-100 dark:bg-neutral-800">
                    @if($founderSection->image)
                        <img src="{{ asset('storage/' . $founderSection->image) }}"
                             alt="{{ $founderSection->title }}"
                             class="h-[360px] w-full object-cover lg:h-[460px]">
                    @else
                        <div class="flex h-[360px] items-center justify-center text-neutral-400 lg:h-[460px]">
                            No Image
                        </div>
                    @endif
                </div>

                <div>
                    @if($founderSection->label)
                        <p class="font-black uppercase tracking-[.35em] text-blue-700">
                            {{ $founderSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-4 text-4xl font-black leading-tight text-neutral-950 dark:text-white lg:text-5xl">
                        {{ $founderSection->title }}
                    </h2>

                    @if($founderSection->description)
                        <p class="mt-6 text-lg leading-8 text-neutral-600 dark:text-neutral-300">
                            {{ $founderSection->description }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        @if($founderSection->stat_1_value || $founderSection->stat_1_label)
                            <div class="rounded-3xl bg-neutral-50 p-5 dark:bg-neutral-800">
                                <p class="text-3xl font-black text-blue-700">{{ $founderSection->stat_1_value }}</p>
                                <p class="mt-1 text-sm font-semibold text-neutral-600 dark:text-neutral-300">{{ $founderSection->stat_1_label }}</p>
                            </div>
                        @endif

                        @if($founderSection->stat_2_value || $founderSection->stat_2_label)
                            <div class="rounded-3xl bg-neutral-50 p-5 dark:bg-neutral-800">
                                <p class="text-3xl font-black text-blue-700">{{ $founderSection->stat_2_value }}</p>
                                <p class="mt-1 text-sm font-semibold text-neutral-600 dark:text-neutral-300">{{ $founderSection->stat_2_label }}</p>
                            </div>
                        @endif

                        @if($founderSection->stat_3_value || $founderSection->stat_3_label)
                            <div class="rounded-3xl bg-neutral-50 p-5 dark:bg-neutral-800">
                                <p class="text-3xl font-black text-blue-700">{{ $founderSection->stat_3_value }}</p>
                                <p class="mt-1 text-sm font-semibold text-neutral-600 dark:text-neutral-300">{{ $founderSection->stat_3_label }}</p>
                            </div>
                        @endif
                    </div>

                    @if($founderSection->button_text)
                        <a href="{{ $founderSection->button_link ?: '#' }}"
                           class="mt-8 inline-flex rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-1">
                            {{ $founderSection->button_text }}
                        </a>
                    @endif
                </div>

            </div>
        </div>

        {{-- Details --}}
        <div class="grid gap-6 lg:grid-cols-2">

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
                    Section Information
                </h3>

                <div class="space-y-4 text-sm">
                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Label</span>
                        <span class="font-semibold text-neutral-900 dark:text-white">{{ $founderSection->label ?: '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Title</span>
                        <span class="font-semibold text-neutral-900 dark:text-white text-right">{{ $founderSection->title }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <span class="text-neutral-500">Sort Order</span>
                        <span class="font-semibold text-neutral-900 dark:text-white">{{ $founderSection->sort_order }}</span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-neutral-500">Status</span>

                        @if($founderSection->status)
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
                    Button & Dates
                </h3>

                <div class="space-y-4 text-sm">
                    <div class="border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <div class="text-neutral-500">Button Text</div>
                        <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                            {{ $founderSection->button_text ?: '-' }}
                        </div>
                    </div>

                    <div class="border-b border-neutral-100 pb-3 dark:border-neutral-800">
                        <div class="text-neutral-500">Button Link</div>
                        <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                            {{ $founderSection->button_link ?: '-' }}
                        </div>
                    </div>

                    <div>
                        <div class="text-neutral-500">Created At</div>
                        <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                            {{ $founderSection->created_at?->format('d M Y, h:i A') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-layouts::app>