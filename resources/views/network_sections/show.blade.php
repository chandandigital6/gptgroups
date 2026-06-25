<x-layouts::app :title="__('Network Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Network Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View network section details.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('network-sections.edit', $networkSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit
                </a>

                <a href="{{ route('network-sections.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $networkSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 dark:text-white sm:text-5xl lg:text-6xl">
                        {{ $networkSection->title }}
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600 dark:text-neutral-300">
                        {{ $networkSection->description }}
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-[1.75rem] border border-neutral-200 p-6 dark:border-neutral-700">
                            <h3 class="text-xl font-black text-slate-950 dark:text-white">
                                {{ $networkSection->card_1_title }}
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-neutral-300">
                                {{ $networkSection->card_1_description }}
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] border border-neutral-200 p-6 dark:border-neutral-700">
                            <h3 class="text-xl font-black text-slate-950 dark:text-white">
                                {{ $networkSection->card_2_title }}
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-neutral-300">
                                {{ $networkSection->card_2_description }}
                            </p>
                        </div>
                    </div>

                    @if($networkSection->button_text)
                        <a href="{{ $networkSection->button_link ?: '#' }}"
                           class="mt-8 inline-flex rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white">
                            {{ $networkSection->button_text }}
                        </a>
                    @endif

                    <div class="mt-6 flex items-center gap-4">
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $networkSection->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $networkSection->status ? 'Active' : 'Inactive' }}
                        </span>

                        <span class="text-sm text-neutral-500">
                            Sort Order: {{ $networkSection->sort_order }}
                        </span>
                    </div>
                </div>

                <div class="relative">
                    @if($networkSection->image)
                        <img class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                             src="{{ asset('storage/' . $networkSection->image) }}"
                             alt="{{ $networkSection->image_alt }}">
                    @else
                        <div class="flex h-[560px] w-full items-center justify-center rounded-[2.5rem] bg-neutral-100 text-neutral-400 shadow-2xl dark:bg-neutral-800">
                            No Image
                        </div>
                    @endif

                    <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] border border-neutral-200 bg-white p-7 shadow-xl dark:border-neutral-700 dark:bg-neutral-900">
                        <p class="text-3xl font-black text-slate-950 dark:text-white">
                            {{ $networkSection->overlay_title }}
                        </p>

                        <p class="mt-2 text-slate-600 dark:text-neutral-300">
                            {{ $networkSection->overlay_description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layouts::app>