@php
    $quickFactSection = \App\Models\QuickFactSection::with('activeItems')
        ->active()
        ->forPage($pageSlug ?? 'home')
        ->orderBy('sort_order')
        ->latest()
        ->first();
@endphp

@if($quickFactSection && $quickFactSection->activeItems->count())
    {{-- QUICK FACTS --}}
    <section class="relative z-10 -mt-8 bg-transparent">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if($quickFactSection->label || $quickFactSection->title || $quickFactSection->description)
                <div class="mb-10 max-w-3xl">
                    @if($quickFactSection->label)
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $quickFactSection->label }}
                        </p>
                    @endif

                    @if($quickFactSection->title)
                        <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
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
                @foreach($quickFactSection->activeItems as $fact)
                    <div class="soft-card rounded-[2rem] p-7">
                        <p class="text-4xl font-black text-gradient">
                            {{ $fact->value }}
                        </p>

                        <p class="mt-2 font-bold text-slate-800">
                            {{ $fact->title }}
                        </p>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            {{ $fact->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif