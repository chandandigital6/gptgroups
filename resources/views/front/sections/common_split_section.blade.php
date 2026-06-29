@php
    $commonSplitSection = \App\Models\CommonSplitSection::with('activeItems')
        ->active()
        ->forPage($pageSlug ?? 'home')
        ->when(!empty($sectionKey), function ($q) use ($sectionKey) {
            $q->forKey($sectionKey);
        })
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();
@endphp

@if($commonSplitSection)
    <section class="outlet-section-light py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>
                    @if($commonSplitSection->label)
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $commonSplitSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $commonSplitSection->title }}
                    </h2>

                    @if($commonSplitSection->description_1)
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $commonSplitSection->description_1 }}
                        </p>
                    @endif

                    @if($commonSplitSection->description_2)
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $commonSplitSection->description_2 }}
                        </p>
                    @endif

                    @if($commonSplitSection->activeItems->count())
                        <div class="mt-8 grid gap-5 sm:grid-cols-2">
                            @foreach($commonSplitSection->activeItems as $item)
                                @php
                                    $iconClass = match($item->theme) {
                                        'cyan' => 'bg-cyan-500',
                                        'slate' => 'bg-slate-800',
                                        'pink' => 'bg-pink-500',
                                        default => 'bg-blue-600',
                                    };
                                @endphp

                                <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                    @if($item->icon_text)
                                        <div class="grid h-12 w-12 place-items-center rounded-2xl {{ $iconClass }} text-xl font-black text-white">
                                            {{ $item->icon_text }}
                                        </div>
                                    @endif

                                    <h3 class="mt-5 text-xl font-black text-slate-950">
                                        {{ $item->title }}
                                    </h3>

                                    @if($item->description)
                                        <p class="mt-2 text-sm leading-6 text-slate-600">
                                            {{ $item->description }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative grid grid-cols-2 gap-5">
                        @if($commonSplitSection->image_1)
                            <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                                 src="{{ asset('storage/' . $commonSplitSection->image_1) }}"
                                 alt="{{ $commonSplitSection->image_1_alt ?: $commonSplitSection->title }}">
                        @endif

                        @if($commonSplitSection->image_2)
                            <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                                 src="{{ asset('storage/' . $commonSplitSection->image_2) }}"
                                 alt="{{ $commonSplitSection->image_2_alt ?: $commonSplitSection->title }}">
                        @endif

                        @if($commonSplitSection->card_value || $commonSplitSection->card_title || $commonSplitSection->card_description)
                            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                                @if($commonSplitSection->card_value)
                                    <p class="text-4xl font-black outlet-gradient-text">
                                        {{ $commonSplitSection->card_value }}
                                    </p>
                                @endif

                                @if($commonSplitSection->card_title)
                                    <p class="mt-3 text-lg font-bold text-slate-950">
                                        {{ $commonSplitSection->card_title }}
                                    </p>
                                @endif

                                @if($commonSplitSection->card_description)
                                    <p class="mt-3 text-sm leading-6 text-slate-600">
                                        {{ $commonSplitSection->card_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if($commonSplitSection->image_3)
                            <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                                 src="{{ asset('storage/' . $commonSplitSection->image_3) }}"
                                 alt="{{ $commonSplitSection->image_3_alt ?: $commonSplitSection->title }}">
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif