
<style>
    .service-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .service-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .service-blob {
        filter: blur(10px);
        opacity: .45;
        animation: serviceBlob 7s ease-in-out infinite alternate;
    }

    @keyframes serviceBlob {
        from { transform: translateY(0) scale(1); }
        to { transform: translateY(18px) scale(1.06); }
    }

    .service-card-hover {
        transition: all .35s ease;
    }

    .service-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .service-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .service-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .service-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .service-input::placeholder {
        color: #94a3b8;
    }

    .service-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>



@php
    $pageHero = \App\Models\PageHero::active()
        ->forPage($pageSlug)
        ->orderBy('sort_order')
        ->latest()
        ->first();
@endphp

@if($pageHero)
    {{-- COMMON PAGE HERO --}}
    <section class="relative overflow-hidden service-soft-bg">
        <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 service-blob"></div>
        <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 service-blob"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>
                    @if($pageHero->badge_text)
                        <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                            <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                            {{ $pageHero->badge_text }}
                        </div>
                    @endif

                    <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                        {{ $pageHero->title_line_1 }}

                        @if($pageHero->title_line_2)
                            <span class="mt-2 block service-gradient-text">
                                {{ $pageHero->title_line_2 }}
                            </span>
                        @endif
                    </h1>

                    @if($pageHero->description)
                        <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                            {{ $pageHero->description }}
                        </p>
                    @endif

                    <div class="mt-8 flex flex-wrap gap-4">
                        @if($pageHero->primary_button_text)
                            <a href="{{ $pageHero->primary_button_link ?: '#' }}"
                               class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                                {{ $pageHero->primary_button_text }}
                            </a>
                        @endif

                        @if($pageHero->secondary_button_text)
                            <a href="{{ $pageHero->secondary_button_link ?: '#' }}"
                               class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                                {{ $pageHero->secondary_button_text }}
                            </a>
                        @endif
                    </div>

                    <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                        @foreach([1, 2, 3, 4] as $i)
                            @php
                                $valueField = 'stat_' . $i . '_value';
                                $labelField = 'stat_' . $i . '_label';
                            @endphp

                            @if($pageHero->{$valueField} || $pageHero->{$labelField})
                                <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                                    <p class="text-2xl font-black service-gradient-text">
                                        {{ $pageHero->{$valueField} }}
                                    </p>

                                    <p class="mt-1 text-xs font-bold text-slate-500">
                                        {{ $pageHero->{$labelField} }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                        @if($pageHero->image)
                            <img src="{{ asset('storage/' . $pageHero->image) }}"
                                 alt="{{ $pageHero->image_alt ?: $pageHero->title_line_1 }}"
                                 class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]">
                        @endif

                        @if($pageHero->card_title || $pageHero->card_description)
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                <p class="text-2xl font-black leading-tight text-slate-950">
                                    {{ $pageHero->card_title }}
                                </p>

                                <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                    {{ $pageHero->card_description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif