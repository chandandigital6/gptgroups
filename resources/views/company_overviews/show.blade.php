<x-layouts::app :title="__('Company Overview Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Company Overview Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View company overview section details.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('company-overviews.edit', $companyOverview) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit
                </a>

                <a href="{{ route('company-overviews.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid gap-8 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">
                        {{ $companyOverview->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 dark:text-white">
                        {{ $companyOverview->title }}
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600 dark:text-neutral-300">
                        {{ $companyOverview->description }}
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-3xl border border-neutral-200 p-6 dark:border-neutral-700">
                            <h3 class="text-xl font-black text-slate-950 dark:text-white">
                                {{ $companyOverview->card_1_title }}
                            </h3>

                            <p class="mt-2 text-slate-600 dark:text-neutral-300">
                                {{ $companyOverview->card_1_description }}
                            </p>
                        </div>

                        <div class="rounded-3xl border border-neutral-200 p-6 dark:border-neutral-700">
                            <h3 class="text-xl font-black text-slate-950 dark:text-white">
                                {{ $companyOverview->card_2_title }}
                            </h3>

                            <p class="mt-2 text-slate-600 dark:text-neutral-300">
                                {{ $companyOverview->card_2_description }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-4">
                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $companyOverview->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $companyOverview->status ? 'Active' : 'Inactive' }}
                        </span>

                        <span class="text-sm text-neutral-500">
                            Sort Order: {{ $companyOverview->sort_order }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    @foreach(['image_1', 'image_2', 'image_3', 'image_4'] as $index => $imageField)
                        @php
                            $altField = $imageField . '_alt';
                        @endphp

                        @if($companyOverview->{$imageField})
                            <img class="{{ in_array($index, [1, 3]) ? 'mt-10' : '' }} h-64 w-full rounded-[32px] object-cover shadow-xl sm:h-72"
                                 src="{{ asset('storage/' . $companyOverview->{$imageField}) }}"
                                 alt="{{ $companyOverview->{$altField} }}">
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