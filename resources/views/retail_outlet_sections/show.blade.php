<x-layouts::app :title="__('Retail Outlet Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Retail Outlet Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View retail outlet section details.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('retail-outlet-sections.edit', $retailOutletSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit
                </a>

                <a href="{{ route('retail-outlet-sections.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">
                        {{ $retailOutletSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 dark:text-white md:text-6xl">
                        {{ $retailOutletSection->title }}
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600 dark:text-neutral-300">
                        {{ $retailOutletSection->description }}
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        @foreach([1, 2, 3, 4] as $i)
                            @php
                                $titleField = 'card_' . $i . '_title';
                                $descriptionField = 'card_' . $i . '_description';
                            @endphp

                            @if($retailOutletSection->{$titleField} || $retailOutletSection->{$descriptionField})
                                <div class="rounded-3xl border border-neutral-200 p-6 dark:border-neutral-700">
                                    <h3 class="font-black text-slate-950 dark:text-white">
                                        {{ $retailOutletSection->{$titleField} }}
                                    </h3>

                                    <p class="mt-2 text-slate-600 dark:text-neutral-300">
                                        {{ $retailOutletSection->{$descriptionField} }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @if($retailOutletSection->button_text)
                        <a href="{{ $retailOutletSection->button_link ?: '#' }}"
                           class="mt-8 inline-flex rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white">
                            {{ $retailOutletSection->button_text }}
                        </a>
                    @endif

                    <div class="mt-6 flex items-center gap-4">
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $retailOutletSection->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $retailOutletSection->status ? 'Active' : 'Inactive' }}
                        </span>

                        <span class="text-sm text-neutral-500">
                            Sort Order: {{ $retailOutletSection->sort_order }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    @foreach(['image_1', 'image_2', 'image_3', 'image_4'] as $index => $imageField)
                        @php
                            $altField = $imageField . '_alt';
                        @endphp

                        @if($retailOutletSection->{$imageField})
                            <img class="{{ in_array($index, [1, 3]) ? 'mt-10' : '' }} h-64 w-full rounded-[32px] object-cover shadow-xl sm:h-72"
                                 src="{{ asset('storage/' . $retailOutletSection->{$imageField}) }}"
                                 alt="{{ $retailOutletSection->{$altField} }}">
                        @else
                            <div class="{{ in_array($index, [1, 3]) ? 'mt-10' : '' }} flex h-64 items-center justify-center rounded-[32px] bg-neutral-100 text-sm text-neutral-400 shadow-xl dark:bg-neutral-800 sm:h-72">
                                No Image
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</x-layouts::app>