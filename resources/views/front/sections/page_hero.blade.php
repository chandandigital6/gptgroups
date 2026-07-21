@php
    $pageHero = \App\Models\PageHero::query()
        ->active()
        ->forPage($pageSlug)
        ->orderBy('sort_order')
        ->latest()
        ->first();

    $stats = [];

    if ($pageHero) {
        foreach ([1, 2, 3, 4] as $index) {
            $value = $pageHero->{'stat_' . $index . '_value'} ?? null;
            $label = $pageHero->{'stat_' . $index . '_label'} ?? null;

            if ($value || $label) {
                $stats[] = [
                    'value' => $value,
                    'label' => $label,
                ];
            }
        }

        $mediaExtension = $pageHero->image
            ? strtolower(pathinfo($pageHero->image, PATHINFO_EXTENSION))
            : null;

        $isVideo = in_array($mediaExtension, ['mp4', 'webm', 'mov'], true);
    }
@endphp

@if ($pageHero)
    <section class="relative overflow-hidden bg-gradient-to-br from-white via-slate-50 to-blue-50">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-cyan-200/30 blur-3xl"></div>
            <div class="absolute -left-24 bottom-0 h-72 w-72 rounded-full bg-blue-200/30 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8 lg:py-14">
            <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-10">

                {{-- CONTENT --}}
                <div>
                    @if ($pageHero->badge_text)
                        <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-black text-blue-700">
                            <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                            {{ $pageHero->badge_text }}
                        </div>
                    @endif

                    <h1 class="mt-4 text-4xl font-black leading-[1.05] tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $pageHero->title_line_1 }}

                        @if ($pageHero->title_line_2)
                            <span class="mt-1 block bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                                {{ $pageHero->title_line_2 }}
                            </span>
                        @endif
                    </h1>

                    @if ($pageHero->description)
                        <p class="mt-4 max-w-2xl text-base leading-7 text-slate-600 lg:text-[17px]">
                            {{ $pageHero->description }}
                        </p>
                    @endif

                    @if ($pageHero->primary_button_text || $pageHero->secondary_button_text)
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                            @if ($pageHero->primary_button_text)
                                <a
                                    href="{{ $pageHero->primary_button_link ?: '#' }}"
                                    class="inline-flex min-h-11 items-center justify-center rounded-full bg-blue-600 px-6 text-sm font-black text-white transition hover:bg-blue-700"
                                >
                                    {{ $pageHero->primary_button_text }}
                                </a>
                            @endif

                            @if ($pageHero->secondary_button_text)
                                <a
                                    href="{{ $pageHero->secondary_button_link ?: '#' }}"
                                    class="inline-flex min-h-11 items-center justify-center rounded-full border border-slate-200 bg-white px-6 text-sm font-black text-slate-950 transition hover:border-blue-200 hover:bg-slate-50"
                                >
                                    {{ $pageHero->secondary_button_text }}
                                </a>
                            @endif
                        </div>
                    @endif

                    @if (count($stats))
                        <div class="mt-6 grid max-w-xl grid-cols-2 gap-3 sm:grid-cols-4">
                            @foreach ($stats as $stat)
                                <article class="rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                                    <p class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-xl font-black text-transparent">
                                        {{ $stat['value'] }}
                                    </p>

                                    <p class="mt-1 text-[11px] font-bold leading-4 text-slate-500">
                                        {{ $stat['label'] }}
                                    </p>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- MEDIA --}}
                @if ($pageHero->image || $pageHero->card_title || $pageHero->card_description)
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                        @if ($pageHero->image)
                            <div class="relative h-[250px] overflow-hidden rounded-xl bg-slate-100 sm:h-[310px] lg:h-[350px]">
                                @if ($isVideo)
                                    <video
                                        class="h-full w-full object-cover"
                                        muted
                                        loop
                                        playsinline
                                        preload="metadata"
                                        poster="{{ $pageHero->video_poster ? asset('storage/' . $pageHero->video_poster) : '' }}"
                                        onmouseenter="this.play()"
                                        onmouseleave="this.pause(); this.currentTime = 0;"
                                        onfocus="this.play()"
                                        onblur="this.pause(); this.currentTime = 0;"
                                    >
                                        <source
                                            src="{{ asset('storage/' . $pageHero->image) }}"
                                            type="video/{{ $mediaExtension === 'mov' ? 'quicktime' : $mediaExtension }}"
                                        >
                                    </video>

                                    <div class="pointer-events-none absolute inset-0 grid place-items-center bg-slate-950/10">
                                        <span class="grid h-10 w-10 place-items-center rounded-full bg-slate-950/65 text-sm text-white">
                                            ▶
                                        </span>
                                    </div>
                                @else
                                    <img
                                        src="{{ asset('storage/' . $pageHero->image) }}"
                                        alt="{{ $pageHero->image_alt ?: $pageHero->title_line_1 }}"
                                        class="h-full w-full object-cover"
                                        loading="eager"
                                        fetchpriority="high"
                                    >
                                @endif
                            </div>
                        @endif

                        @if ($pageHero->card_title || $pageHero->card_description)
                            <div class="{{ $pageHero->image ? 'mt-3' : '' }} rounded-xl border border-slate-100 bg-slate-50 p-4">
                                @if ($pageHero->card_title)
                                    <h2 class="text-lg font-black leading-tight text-slate-950">
                                        {{ $pageHero->card_title }}
                                    </h2>
                                @endif

                                @if ($pageHero->card_description)
                                    <p class="mt-1.5 text-sm font-semibold leading-6 text-slate-600">
                                        {{ $pageHero->card_description }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif