<x-layouts::app :title="__('What We Do Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    What We Do Section Details
                </h1>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('what-we-do-sections.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700">
                    Back
                </a>

                <a href="{{ route('what-we-do-sections.edit', $whatWeDoSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                @if($whatWeDoSection->image)
                    <img src="{{ asset('storage/' . $whatWeDoSection->image) }}"
                         class="h-[480px] w-full rounded-2xl object-cover"
                         alt="{{ $whatWeDoSection->title }}">
                @else
                    <div class="flex h-[480px] items-center justify-center rounded-2xl bg-neutral-100 text-neutral-400 dark:bg-neutral-800">
                        No Image
                    </div>
                @endif
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $whatWeDoSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-neutral-950 dark:text-white">
                    {{ $whatWeDoSection->title }}
                </h2>

                <p class="mt-6 text-neutral-600 dark:text-neutral-300">
                    {{ $whatWeDoSection->description }}
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @for($i = 1; $i <= 4; $i++)
                        @if($whatWeDoSection->{'card_'.$i.'_title'} || $whatWeDoSection->{'card_'.$i.'_description'})
                            <div class="rounded-2xl bg-neutral-50 p-5 dark:bg-neutral-800">
                                <h3 class="font-black text-neutral-950 dark:text-white">
                                    {{ $whatWeDoSection->{'card_'.$i.'_title'} }}
                                </h3>
                                <p class="mt-2 text-sm text-neutral-500 dark:text-neutral-300">
                                    {{ $whatWeDoSection->{'card_'.$i.'_description'} }}
                                </p>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

    </div>

</x-layouts::app>