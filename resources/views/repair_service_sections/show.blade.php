<x-layouts::app :title="__('Repair Service Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold">
                    Repair Service Section Details
                </h1>

                <p class="text-sm text-neutral-500">
                    View repair service section and cards.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('repair-service-sections.edit', $repairServiceSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('repair-service-sections.index') }}"
                   class="rounded-xl border px-5 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $repairServiceSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $repairServiceSection->title }}
                    </h2>

                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        {{ $repairServiceSection->description }}
                    </p>
                </div>

                @if($repairServiceSection->button_text)
                    <a href="{{ $repairServiceSection->button_link ?: '#' }}"
                       class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white">
                        {{ $repairServiceSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($repairServiceSection->items as $item)
                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-sm">
                        @if($item->image)
                            <img class="h-44 w-full rounded-[1.5rem] object-cover"
                                 src="{{ asset('storage/' . $item->image) }}"
                                 alt="{{ $item->image_alt ?: $item->title }}">
                        @endif

                        <h3 class="mt-6 text-2xl font-black text-slate-950">
                            {{ $item->title }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>