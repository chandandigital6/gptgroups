<x-layouts::app :title="__('Strategy Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Strategy Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View strategy section details.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('strategy-sections.edit', $strategySection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit
                </a>

                <a href="{{ route('strategy-sections.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.25em] text-blue-700">
                    {{ $strategySection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 dark:text-white md:text-6xl">
                    {{ $strategySection->title }}
                </h2>

                <p class="mt-5 text-lg text-slate-600 dark:text-neutral-300">
                    {{ $strategySection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach([1, 2, 3, 4] as $i)
                    @php
                        $numberField = 'strategy_' . $i . '_number';
                        $titleField = 'strategy_' . $i . '_title';
                        $descriptionField = 'strategy_' . $i . '_description';
                    @endphp

                    @if($strategySection->{$titleField} || $strategySection->{$descriptionField})
                        <div class="rounded-[34px] border border-neutral-200 p-8 shadow-sm dark:border-neutral-700">
                            <span class="text-4xl font-black text-blue-600">
                                {{ $strategySection->{$numberField} }}
                            </span>

                            <h3 class="mt-5 text-2xl font-black text-slate-950 dark:text-white">
                                {{ $strategySection->{$titleField} }}
                            </h3>

                            <p class="mt-3 text-slate-600 dark:text-neutral-300">
                                {{ $strategySection->{$descriptionField} }}
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-8 flex justify-center gap-4">
                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $strategySection->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $strategySection->status ? 'Active' : 'Inactive' }}
                </span>

                <span class="text-sm text-neutral-500">
                    Sort Order: {{ $strategySection->sort_order }}
                </span>
            </div>
        </div>

    </div>

</x-layouts::app>