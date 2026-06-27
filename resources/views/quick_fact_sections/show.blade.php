<x-layouts::app :title="__('Quick Fact Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold">
                    Quick Fact Section Details
                </h1>

                <p class="text-sm text-neutral-500">
                    View page-wise quick facts.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('quick-fact-sections.edit', $quickFactSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('quick-fact-sections.index') }}"
                   class="rounded-xl border px-5 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            @if($quickFactSection->label || $quickFactSection->title || $quickFactSection->description)
                <div class="mb-10 max-w-3xl">
                    @if($quickFactSection->label)
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $quickFactSection->label }}
                        </p>
                    @endif

                    @if($quickFactSection->title)
                        <h2 class="mt-4 text-4xl font-black text-slate-950">
                            {{ $quickFactSection->title }}
                        </h2>
                    @endif

                    @if($quickFactSection->description)
                        <p class="mt-4 text-lg leading-8 text-slate-600">
                            {{ $quickFactSection->description }}
                        </p>
                    @endif
                </div>
            @endif

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($quickFactSection->items as $item)
                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-sm">
                        <p class="text-4xl font-black text-gradient">
                            {{ $item->value }}
                        </p>

                        <p class="mt-2 font-bold text-slate-800">
                            {{ $item->title }}
                        </p>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>