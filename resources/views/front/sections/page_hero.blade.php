<style>
    .service-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .28), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .28), transparent 28%),
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
        opacity: .38;
        animation: serviceBlob 7s ease-in-out infinite alternate;
    }

    @keyframes serviceBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(14px) scale(1.04);
        }
    }
</style>

@php
    $pageHero = \App\Models\PageHero::active()
        ->forPage($pageSlug)
        ->orderBy('sort_order')
        ->latest()
        ->first();
@endphp

@if ($pageHero)
    <section class="relative overflow-hidden service-soft-bg">
        <div class="service-blob absolute -right-20 -top-24 h-80 w-80 rounded-full bg-cyan-300"></div>
        <div class="service-blob absolute -left-24 top-36 h-80 w-80 rounded-full bg-blue-300"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div>
                    @if ($pageHero->badge_text)
                        <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-1.5 text-xs font-black text-blue-700 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                            {{ $pageHero->badge_text }}
                        </div>
                    @endif

                    <h1 class="mt-4 text-4xl font-black leading-[1] tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $pageHero->title_line_1 }}

                        @if ($pageHero->title_line_2)
                            <span class="mt-1 block service-gradient-text">
                                {{ $pageHero->title_line_2 }}
                            </span>
                        @endif
                    </h1>

                    @if ($pageHero->description)
                        <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                            {{ $pageHero->description }}
                        </p>
                    @endif

                    <div class="mt-5 flex flex-wrap gap-3">
                        @if ($pageHero->primary_button_text)
                            <a
                                href="{{ $pageHero->primary_button_link ?: '#' }}"
                                class="inline-flex items-center justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500"
                            >
                                {{ $pageHero->primary_button_text }}
                            </a>
                        @endif

                        @if ($pageHero->secondary_button_text)
                            <a
                                href="{{ $pageHero->secondary_button_link ?: '#' }}"
                                class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1 hover:bg-slate-50"
                            >
                                {{ $pageHero->secondary_button_text }}
                            </a>
                        @endif
                    </div>

                    <div class="mt-6 grid max-w-xl grid-cols-2 gap-3 sm:grid-cols-4">
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $valueField = 'stat_' . $i . '_value';
                                $labelField = 'stat_' . $i . '_label';
                            @endphp

                            @if ($pageHero->{$valueField} || $pageHero->{$labelField})
                                <div class="rounded-xl border border-slate-100 bg-white/85 p-3 shadow-sm backdrop-blur">
                                    <p class="text-xl font-black service-gradient-text">
                                        {{ $pageHero->{$valueField} }}
                                    </p>

                                    <p class="mt-1 text-[11px] font-bold text-slate-500">
                                        {{ $pageHero->{$labelField} }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if ($pageHero->image || $pageHero->card_title || $pageHero->card_description)
                    <div class="relative">
                        <div class="absolute -inset-5 rounded-full bg-cyan-300/18 blur-3xl"></div>

                        <div class="relative overflow-hidden rounded-[1.75rem] border border-white bg-white/88 p-3 shadow-xl ring-1 ring-cyan-100 backdrop-blur-xl">
                            {{-- @if ($pageHero->image)
                                <img
                                    src="{{ asset('storage/' . $pageHero->image) }}"
                                    alt="{{ $pageHero->image_alt ?: $pageHero->title_line_1 }}"
                                    class="h-[250px] w-full rounded-[1.35rem] object-cover sm:h-[310px] lg:h-[350px]"
                                    loading="lazy"
                                >
                            @endif --}}
                            @if($pageHero->image)
    @php
        $mediaExtension = strtolower(
            pathinfo(
                $pageHero->image,
                PATHINFO_EXTENSION
            )
        );

        $isVideo = in_array(
            $mediaExtension,
            ['mp4', 'webm', 'mov']
        );
    @endphp

    @if($isVideo)
        <div class="relative h-full w-full">
            <video
                src="{{ asset('storage/' . $pageHero->image) }}"
                class="h-full w-full object-cover"
                muted
                loop
                playsinline
                preload="metadata"
                onmouseenter="this.play()"
                onmouseleave="this.pause(); this.currentTime = 0;"
            ></video>

            <div class="pointer-events-none absolute inset-0 flex items-center justify-center bg-black/15">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-black/60 text-xs text-white">
                    ▶
                </span>
            </div>
        </div>
    @else
        <img
            src="{{ asset('storage/' . $pageHero->image) }}"
            class="h-full w-full object-cover"
            alt="{{ $pageHero->image_alt ?? $pageHero->title_line_1 }}"
        >
    @endif
@else
    <div class="flex h-full w-full items-center justify-center text-xs text-neutral-400">
        No Media
    </div>
@endif

                            @if ($pageHero->card_title || $pageHero->card_description)
                                <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-md">
                                    @if ($pageHero->card_title)
                                        <p class="text-lg font-black leading-tight text-slate-950">
                                            {{ $pageHero->card_title }}
                                        </p>
                                    @endif

                                    @if ($pageHero->card_description)
                                        <p class="mt-1.5 text-sm font-semibold leading-6 text-slate-600">
                                            {{ $pageHero->card_description }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endif
