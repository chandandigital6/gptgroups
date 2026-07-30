@extends('front_pages.front_components.main')

@section('content')

<style>
    /*
    |--------------------------------------------------------------------------
    | GPT Clean Split Banner
    |--------------------------------------------------------------------------
    */

    :root {
        --gpt-blue: #1268dc;
        --gpt-blue-dark: #063b87;
        --gpt-cyan: #08b8d8;
        --gpt-navy: #071d3a;
        --gpt-text: #0f2747;
        --gpt-white: #ffffff;
    }

    .gpt-hero-section {
        position: relative;
        width: 100%;
        padding: 18px 18px 24px;
        overflow: hidden;
        background:
            radial-gradient(
                circle at 8% 20%,
                rgba(18, 104, 220, .08),
                transparent 30%
            ),
            radial-gradient(
                circle at 92% 80%,
                rgba(8, 184, 216, .10),
                transparent 28%
            ),
            #f7fbff;
    }

    .gpt-hero-container {
        width: min(1320px, 100%);
        margin: 0 auto;
    }

    .gpt-hero-swiper {
        position: relative;
        width: 100%;
        overflow: hidden;
        border: 1px solid rgba(18, 104, 220, .10);
        border-radius: 26px;
        background: #ffffff;
        box-shadow:
            0 22px 60px rgba(15, 39, 71, .10),
            0 4px 16px rgba(15, 39, 71, .05);
    }

    .gpt-hero-slide {
        position: relative;
        display: grid;
        grid-template-columns: minmax(420px, .92fr) minmax(0, 1.45fr);
        min-height: 430px;
        overflow: hidden;
        background: #ffffff;
    }

    /*
    |--------------------------------------------------------------------------
    | Left Content Panel
    |--------------------------------------------------------------------------
    */

    .gpt-hero-content-panel {
        position: relative;
        z-index: 5;
        display: flex;
        align-items: center;
        padding: 45px 48px 54px;
        overflow: hidden;
        background:
            linear-gradient(
                140deg,
                #071d3a 0%,
                #0b438e 55%,
                #1268dc 100%
            );
    }

    .gpt-hero-content-panel::before {
        position: absolute;
        top: -110px;
        right: -90px;
        width: 260px;
        height: 260px;
        content: "";
        border: 1px solid rgba(255, 255, 255, .13);
        border-radius: 50%;
    }

    .gpt-hero-content-panel::after {
        position: absolute;
        right: -35px;
        bottom: -110px;
        width: 230px;
        height: 230px;
        content: "";
        border-radius: 50%;
        background: rgba(8, 184, 216, .18);
        filter: blur(2px);
    }

    .gpt-hero-content {
        position: relative;
        z-index: 3;
        width: 100%;
        max-width: 500px;
    }

    .gpt-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 18px;
        padding: 8px 13px;
        border: 1px solid rgba(255, 255, 255, .20);
        border-radius: 999px;
        background: rgba(255, 255, 255, .08);
        color: rgba(255, 255, 255, .94);
        font-size: 10px;
        font-weight: 800;
        line-height: 1;
        letter-spacing: .11em;
        text-transform: uppercase;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .gpt-hero-badge-dot {
        width: 7px;
        height: 7px;
        flex-shrink: 0;
        border-radius: 50%;
        background: var(--banner-secondary, #08b8d8);
        box-shadow: 0 0 0 5px rgba(8, 184, 216, .13);
    }

    .gpt-hero-title {
        max-width: 510px;
        margin: 0;
        color: #ffffff;
        font-size: clamp(34px, 3.4vw, 55px);
        font-weight: 900;
        line-height: 1.02;
        letter-spacing: -.045em;
    }

    .gpt-hero-highlight {
        display: block;
        margin-top: 5px;
        color: #6ee7f5;
    }

    .gpt-hero-description {
        max-width: 460px;
        margin: 18px 0 0;
        color: rgba(255, 255, 255, .78);
        font-size: 14px;
        font-weight: 500;
        line-height: 1.7;
    }

    /*
    |--------------------------------------------------------------------------
    | Buttons
    |--------------------------------------------------------------------------
    */

    .gpt-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 11px;
        margin-top: 26px;
    }

    .gpt-hero-button {
        display: inline-flex;
        min-height: 44px;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 11px 18px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 800;
        line-height: 1;
        text-decoration: none;
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background .25s ease,
            border-color .25s ease;
    }

    .gpt-hero-button:hover {
        transform: translateY(-2px);
    }

    .gpt-hero-button-primary {
        border: 1px solid #ffffff;
        background: #ffffff;
        color: #0b438e;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .14);
    }

    .gpt-hero-button-primary:hover {
        background: #f3fbff;
        box-shadow: 0 14px 28px rgba(0, 0, 0, .18);
    }

    .gpt-hero-button-secondary {
        border: 1px solid rgba(255, 255, 255, .30);
        background: rgba(255, 255, 255, .08);
        color: #ffffff;
    }

    .gpt-hero-button-secondary:hover {
        border-color: rgba(255, 255, 255, .55);
        background: rgba(255, 255, 255, .14);
    }

    .gpt-hero-button-arrow {
        font-size: 17px;
        line-height: 1;
    }

    /*
    |--------------------------------------------------------------------------
    | Right Image Panel
    |--------------------------------------------------------------------------
    */

    .gpt-hero-image-panel {
        position: relative;
        min-width: 0;
        overflow: hidden;
        background: #dceeff;
    }

    .gpt-hero-picture {
        position: absolute;
        inset: 0;
        display: block;
        width: 100%;
        height: 100%;
    }

    .gpt-hero-image {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transform: scale(1.01);
        transition: transform 7s ease;
    }

    .gpt-hero-swiper .swiper-slide-active .gpt-hero-image {
        transform: scale(1.055);
    }

    .gpt-hero-image-panel::before {
        position: absolute;
        inset: 0;
        z-index: 2;
        content: "";
        pointer-events: none;
        background:
            linear-gradient(
                90deg,
                rgba(7, 29, 58, .22) 0%,
                rgba(7, 29, 58, .04) 22%,
                transparent 55%
            );
    }

    .gpt-hero-image-panel::after {
        position: absolute;
        top: 50%;
        left: -1px;
        z-index: 3;
        width: 58px;
        height: 150%;
        content: "";
        pointer-events: none;
        background: #0d4f9f;
        transform: translateY(-50%) skewX(-7deg);
        transform-origin: center;
        opacity: .96;
    }

    /*
    |--------------------------------------------------------------------------
    | Slider Navigation
    |--------------------------------------------------------------------------
    */

    .gpt-hero-slider-controls {
        position: absolute;
        right: 24px;
        bottom: 22px;
        z-index: 20;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .gpt-hero-prev,
    .gpt-hero-next {
        display: grid;
        width: 42px;
        height: 42px;
        cursor: pointer;
        place-items: center;
        border: 1px solid rgba(255, 255, 255, .65);
        border-radius: 12px;
        background: rgba(7, 29, 58, .65);
        color: #ffffff;
        font-size: 24px;
        line-height: 1;
        box-shadow: 0 8px 22px rgba(7, 29, 58, .20);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        transition:
            background .25s ease,
            transform .25s ease;
    }

    .gpt-hero-prev:hover,
    .gpt-hero-next:hover {
        background: #1268dc;
        transform: translateY(-2px);
    }

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */

    .gpt-hero-bottom-info {
        position: absolute;
        left: 48px;
        bottom: 20px;
        z-index: 15;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .gpt-hero-slide-number {
        min-width: 24px;
        color: rgba(255, 255, 255, .86);
        font-size: 13px;
        font-weight: 800;
        line-height: 1;
    }

    .gpt-hero-pagination {
        position: static !important;
        display: flex;
        width: auto !important;
        align-items: center;
        gap: 6px;
    }

    .gpt-hero-swiper .swiper-pagination-bullet {
        width: 7px;
        height: 7px;
        margin: 0 !important;
        border-radius: 999px;
        background: rgba(255, 255, 255, .42);
        opacity: 1;
        transition:
            width .25s ease,
            background .25s ease;
    }

    .gpt-hero-swiper .swiper-pagination-bullet-active {
        width: 28px;
        background: #6ee7f5;
    }

    /*
    |--------------------------------------------------------------------------
    | Decorative Label
    |--------------------------------------------------------------------------
    */

    .gpt-image-label {
        position: absolute;
        top: 22px;
        right: 22px;
        z-index: 10;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border: 1px solid rgba(255, 255, 255, .55);
        border-radius: 999px;
        background: rgba(7, 29, 58, .54);
        color: #ffffff;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
        backdrop-filter: blur(9px);
        -webkit-backdrop-filter: blur(9px);
    }

    .gpt-image-label-icon {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6ee7f5;
    }

    /*
    |--------------------------------------------------------------------------
    | Laptop
    |--------------------------------------------------------------------------
    */

    @media (max-width: 1100px) {
        .gpt-hero-slide {
            grid-template-columns: minmax(390px, .95fr) minmax(0, 1.2fr);
            min-height: 420px;
        }

        .gpt-hero-content-panel {
            padding: 40px 38px 52px;
        }

        .gpt-hero-title {
            font-size: clamp(32px, 4vw, 47px);
        }

        .gpt-hero-bottom-info {
            left: 38px;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Tablet
    |--------------------------------------------------------------------------
    */

    @media (max-width: 850px) {
        .gpt-hero-section {
            padding: 12px 12px 20px;
        }

        .gpt-hero-swiper {
            border-radius: 22px;
        }

        .gpt-hero-slide {
            grid-template-columns: 1fr;
            min-height: 620px;
        }

        .gpt-hero-content-panel {
            min-height: 340px;
            padding: 35px 34px 50px;
        }

        .gpt-hero-image-panel {
            min-height: 280px;
        }

        .gpt-hero-image-panel::after {
            top: -28px;
            left: 50%;
            width: 140%;
            height: 55px;
            transform: translateX(-50%) skewY(-4deg);
        }

        .gpt-hero-image-panel::before {
            background:
                linear-gradient(
                    180deg,
                    rgba(7, 29, 58, .20),
                    transparent 35%
                );
        }

        .gpt-hero-title {
            max-width: 590px;
            font-size: clamp(32px, 6vw, 46px);
        }

        .gpt-hero-description {
            max-width: 580px;
        }

        .gpt-hero-slider-controls {
            right: 18px;
            bottom: 18px;
        }

        .gpt-image-label {
            top: 20px;
            right: 18px;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------------------
    */

    @media (max-width: 600px) {
        .gpt-hero-section {
            padding: 8px 8px 16px;
        }

        .gpt-hero-swiper {
            border-radius: 18px;
        }

        .gpt-hero-slide {
            min-height: 535px;
        }

        .gpt-hero-content-panel {
            min-height: 315px;
            align-items: flex-start;
            padding: 28px 22px 48px;
        }

        .gpt-hero-image-panel {
            min-height: 220px;
        }

        .gpt-hero-badge {
            margin-bottom: 14px;
            padding: 7px 10px;
            font-size: 8px;
        }

        .gpt-hero-title {
            font-size: clamp(28px, 9.5vw, 38px);
            line-height: 1.03;
        }

        .gpt-hero-description {
            margin-top: 13px;
            font-size: 12px;
            line-height: 1.55;
        }

        .gpt-hero-actions {
            gap: 8px;
            margin-top: 18px;
        }

        .gpt-hero-button {
            min-height: 40px;
            padding: 10px 13px;
            border-radius: 9px;
            font-size: 10px;
        }

        .gpt-hero-bottom-info {
            left: 22px;
            bottom: 17px;
        }

        .gpt-hero-slide-number {
            font-size: 11px;
        }

        .gpt-hero-prev,
        .gpt-hero-next {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            font-size: 21px;
        }

        .gpt-image-label {
            top: 16px;
            right: 14px;
            padding: 7px 10px;
            font-size: 8px;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Small Mobile
    |--------------------------------------------------------------------------
    */

    @media (max-width: 390px) {
        .gpt-hero-slide {
            min-height: 520px;
        }

        .gpt-hero-content-panel {
            min-height: 315px;
            padding-right: 18px;
            padding-left: 18px;
        }

        .gpt-hero-title {
            font-size: 29px;
        }

        .gpt-hero-description {
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }

        .gpt-hero-bottom-info {
            left: 18px;
        }
    }
</style>

@php
    $themeMap = [
        'cyan' => [
            'primary' => '#1268dc',
            'secondary' => '#08b8d8',
        ],

        'yellow' => [
            'primary' => '#1268dc',
            'secondary' => '#facc15',
        ],

        'emerald' => [
            'primary' => '#1268dc',
            'secondary' => '#10b981',
        ],
    ];
@endphp

@if (isset($banners) && $banners->count() > 0)

    <section class="gpt-hero-section">

        <div class="gpt-hero-container">

            <div class="swiper gpt-hero-swiper">

                <div class="swiper-wrapper">

                    @foreach ($banners as $banner)

                        @php
                            $desktopImage = $banner->desktop_image
                                ? asset('storage/' . $banner->desktop_image)
                                : 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=88';

                            $mobileImage = $banner->mobile_image
                                ? asset('storage/' . $banner->mobile_image)
                                : $desktopImage;

                            $primaryLink = $banner->button_link
                                ?: route('business.index');

                            $secondaryLink = $banner->second_button_link
                                ?: route('contact');

                            $primaryTitle = $banner->button_text
                                ?: 'Explore Solutions';

                            $secondaryTitle = $banner->second_button_text
                                ?: 'Contact Us';

                            $activeTheme = $themeMap[$banner->theme]
                                ?? $themeMap['cyan'];
                        @endphp

                        <div class="swiper-slide">

                            <article
                                class="gpt-hero-slide"
                                style="
                                    --banner-primary: {{ $activeTheme['primary'] }};
                                    --banner-secondary: {{ $activeTheme['secondary'] }};
                                "
                            >

                                {{-- Left Content --}}
                                <div class="gpt-hero-content-panel">

                                    <div class="gpt-hero-content">

                                        @if ($banner->badge)
                                            <div class="gpt-hero-badge">
                                                <span class="gpt-hero-badge-dot"></span>

                                                <span>{{ $banner->badge }}</span>
                                            </div>
                                        @endif

                                        @if ($banner->title)
                                            <h1 class="gpt-hero-title">
                                                {{ $banner->title }}

                                                @if ($banner->highlight)
                                                    <span class="gpt-hero-highlight">
                                                        {{ $banner->highlight }}
                                                    </span>
                                                @endif
                                            </h1>
                                        @endif

                                        @if ($banner->description)
                                            <p class="gpt-hero-description">
                                                {{ $banner->description }}
                                            </p>
                                        @endif

                                        @if (
                                            $banner->button_text ||
                                            $banner->second_button_text
                                        )
                                            <div class="gpt-hero-actions">

                                                @if ($banner->button_text)
                                                    <a
                                                        href="{{ $primaryLink }}"
                                                        class="gpt-hero-button gpt-hero-button-primary"
                                                    >
                                                        <span>{{ $primaryTitle }}</span>

                                                        <span class="gpt-hero-button-arrow">
                                                            →
                                                        </span>
                                                    </a>
                                                @endif

                                                @if ($banner->second_button_text)
                                                    <a
                                                        href="{{ $secondaryLink }}"
                                                        class="gpt-hero-button gpt-hero-button-secondary"
                                                    >
                                                        <span>{{ $secondaryTitle }}</span>

                                                        <span class="gpt-hero-button-arrow">
                                                            ↗
                                                        </span>
                                                    </a>
                                                @endif

                                            </div>
                                        @endif

                                    </div>

                                    @if ($banners->count() > 1)
                                        <div class="gpt-hero-bottom-info">

                                            <span
                                                id="gptCurrentSlide"
                                                class="gpt-hero-slide-number"
                                            >
                                                01
                                            </span>

                                            <div class="gpt-hero-pagination"></div>

                                        </div>
                                    @endif

                                </div>

                                {{-- Right Image --}}
                                <div class="gpt-hero-image-panel">

                                    <picture class="gpt-hero-picture">

                                        <source
                                            media="(max-width: 767px)"
                                            srcset="{{ $mobileImage }}"
                                        >

                                        <img
                                            src="{{ $desktopImage }}"
                                            alt="{{ $banner->image_alt ?: ($banner->title ?: 'GPT Group Banner') }}"
                                            class="gpt-hero-image"
                                            loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                                            fetchpriority="{{ $loop->first ? 'high' : 'auto' }}"
                                        >

                                    </picture>

                                    <div class="gpt-image-label">
                                        <span class="gpt-image-label-icon"></span>
                                        GPT Group Oman
                                    </div>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>

                @if ($banners->count() > 1)

                    <div class="gpt-hero-slider-controls">

                        <button
                            type="button"
                            class="gpt-hero-prev"
                            aria-label="Previous banner"
                        >
                            ‹
                        </button>

                        <button
                            type="button"
                            class="gpt-hero-next"
                            aria-label="Next banner"
                        >
                            ›
                        </button>

                    </div>

                @endif

            </div>

        </div>

    </section>

@else

    {{-- Default Banner --}}

    <section class="gpt-hero-section">

        <div class="gpt-hero-container">

            <div class="gpt-hero-swiper">

                <article class="gpt-hero-slide">

                    <div class="gpt-hero-content-panel">

                        <div class="gpt-hero-content">

                            <div class="gpt-hero-badge">
                                <span class="gpt-hero-badge-dot"></span>

                                Technology Distribution & Solutions
                            </div>

                            <h1 class="gpt-hero-title">
                                Technology solutions

                                <span class="gpt-hero-highlight">
                                    built for progress.
                                </span>
                            </h1>

                            <p class="gpt-hero-description">
                                Mobile distribution, security systems, IT
                                infrastructure and trading expertise across
                                Oman and the GCC.
                            </p>

                            <div class="gpt-hero-actions">

                                <a
                                    href="{{ route('business.index') }}"
                                    class="gpt-hero-button gpt-hero-button-primary"
                                >
                                    <span>Explore Solutions</span>
                                    <span class="gpt-hero-button-arrow">→</span>
                                </a>

                                <a
                                    href="{{ route('contact') }}"
                                    class="gpt-hero-button gpt-hero-button-secondary"
                                >
                                    <span>Contact Us</span>
                                    <span class="gpt-hero-button-arrow">↗</span>
                                </a>

                            </div>

                        </div>

                    </div>

                    <div class="gpt-hero-image-panel">

                        <picture class="gpt-hero-picture">

                            <img
                                src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=88"
                                alt="GPT Group Technology Distribution and Solutions"
                                class="gpt-hero-image"
                                loading="eager"
                                fetchpriority="high"
                            >

                        </picture>

                        <div class="gpt-image-label">
                            <span class="gpt-image-label-icon"></span>
                            GPT Group Oman
                        </div>

                    </div>

                </article>

            </div>

        </div>

    </section>

@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bannerElement = document.querySelector('.gpt-hero-swiper');
        const currentSlideElement = document.getElementById('gptCurrentSlide');

        if (
            typeof Swiper === 'undefined' ||
            !bannerElement ||
            !bannerElement.querySelector('.swiper-wrapper')
        ) {
            return;
        }

        new Swiper('.gpt-hero-swiper', {
            loop: true,
            speed: 850,
            effect: 'fade',

            fadeEffect: {
                crossFade: true,
            },

            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            navigation: {
                nextEl: '.gpt-hero-next',
                prevEl: '.gpt-hero-prev',
            },

            pagination: {
                el: '.gpt-hero-pagination',
                clickable: true,
            },

            on: {
                init: function () {
                    updateSlideNumber(this);
                },

                slideChange: function () {
                    updateSlideNumber(this);
                },
            },
        });

        function updateSlideNumber(swiper) {
            if (!currentSlideElement) {
                return;
            }

            const slideNumber = swiper.realIndex + 1;

            currentSlideElement.textContent = String(
                slideNumber
            ).padStart(2, '0');
        }
    });
</script>

    {{-- 03. STATS --}}
    <section class="section-muted py-14 lg:py-18">
        @include('front.sections.quick_facts', ['pageSlug' => 'home'])

    </section>





    @php
    $showHomeAdvertisement = true;

    $homeAdvertisement = [
        'image' => asset('assets/advertisements/fold.jpg'),
        'link' => '#',

        'brand' => 'Samsung Galaxy',
        'title' => 'Galaxy Z Fold8 Ultra',
        'subtitle' => 'Galaxy AI',
        'description' => 'Discover powerful performance, an immersive foldable display and next-generation mobile innovation.',

        'launch_text' => 'Coming Soon',
        'launch_note' => 'Coming soon through GPT Group Oman',
    ];
@endphp

@if ($showHomeAdvertisement)

    <section
        id="gptCompactAdvertisement"
        class="bg-white py-6 sm:py-8 lg:py-9"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Advertisement Label --}}
            <div class="mb-3 flex items-center justify-between">

                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-blue-600"></span>

                    <p
                        class="text-[10px] font-black uppercase
                               tracking-[0.18em] text-slate-500 sm:text-xs"
                    >
                        Featured Advertisement
                    </p>
                </div>

                <button
                    type="button"
                    id="closeGptCompactAdvertisement"
                    class="inline-flex h-8 w-8 items-center justify-center
                           rounded-lg border border-slate-200 bg-white
                           text-lg leading-none text-slate-400
                           transition hover:border-red-200
                           hover:bg-red-50 hover:text-red-500"
                    aria-label="Close advertisement"
                >
                    ×
                </button>

            </div>

            {{-- Compact Card --}}
            <article
                class="group relative overflow-hidden rounded-2xl
                       border border-slate-200 bg-[#f7f8fa]
                       shadow-[0_14px_40px_-24px_rgba(15,23,42,0.45)]
                       sm:rounded-3xl"
            >
                {{-- Top Border --}}
                <div
                    class="absolute inset-x-0 top-0 z-20 h-1
                           bg-gradient-to-r from-blue-700
                           via-cyan-500 to-blue-700"
                ></div>

                <div
                    class="grid min-h-[300px]
                           md:grid-cols-[0.82fr_1.18fr]
                           lg:min-h-[340px]"
                >
                    {{-- Left Content --}}
                    <div
                        class="relative flex flex-col justify-center
                               overflow-hidden bg-slate-950
                               px-6 py-8 text-white
                               sm:px-8 md:px-9 md:py-8
                               lg:px-11"
                    >
                        {{-- Decoration --}}
                        <div
                            class="pointer-events-none absolute
                                   -right-16 -top-16 h-44 w-44
                                   rounded-full bg-blue-500/20 blur-3xl"
                        ></div>

                        <div
                            class="pointer-events-none absolute
                                   -bottom-16 -left-16 h-44 w-44
                                   rounded-full bg-cyan-500/10 blur-3xl"
                        ></div>

                        <div class="relative">

                            {{-- Launch Badge --}}
                            <div
                                class="inline-flex items-center gap-2
                                       rounded-full border border-emerald-400/30
                                       bg-emerald-400/10 px-3 py-1.5
                                       text-[10px] font-black uppercase
                                       tracking-[0.15em] text-emerald-300"
                            >
                                <span class="relative flex h-2 w-2">
                                    <span
                                        class="absolute inline-flex h-full w-full
                                               animate-ping rounded-full
                                               bg-emerald-400 opacity-70"
                                    ></span>

                                    <span
                                        class="relative inline-flex h-2 w-2
                                               rounded-full bg-emerald-400"
                                    ></span>
                                </span>

                                {{ $homeAdvertisement['launch_text'] }}
                            </div>

                            {{-- Brand --}}
                            <p
                                class="mt-4 text-[11px] font-bold uppercase
                                       tracking-[0.18em] text-cyan-300"
                            >
                                {{ $homeAdvertisement['brand'] }}
                            </p>

                            {{-- Title --}}
                            <h2
                                class="mt-2 max-w-md text-2xl font-black
                                       leading-tight tracking-tight
                                       text-white sm:text-3xl lg:text-4xl"
                            >
                                {{ $homeAdvertisement['title'] }}
                            </h2>

                            {{-- Subtitle --}}
                            <p
                                class="mt-2 text-base font-bold
                                       text-cyan-300 sm:text-lg"
                            >
                                {{ $homeAdvertisement['subtitle'] }}
                            </p>

                            {{-- Description --}}
                            <p
                                class="mt-3 max-w-lg text-sm leading-6
                                       text-slate-300"
                            >
                                {{ $homeAdvertisement['description'] }}
                            </p>

                            {{-- Launch Information --}}
                            <div
                                class="mt-5 flex items-center gap-3
                                       border-t border-white/10 pt-4"
                            >
                                <span
                                    class="inline-flex h-9 w-9 shrink-0
                                           items-center justify-center
                                           rounded-full bg-blue-600/20
                                           text-lg text-blue-300"
                                >
                                    ✦
                                </span>

                                <div>
                                    <p
                                        class="text-xs font-black uppercase
                                               tracking-[0.12em] text-white"
                                    >
                                        Newly Introduced
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $homeAdvertisement['launch_note'] }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Right Product Image --}}
                    <a
                        href="{{ $homeAdvertisement['link'] }}"
                        class="relative flex min-h-[300px]
                               items-center justify-center
                               overflow-hidden bg-white
                               md:min-h-0"
                        aria-label="{{ $homeAdvertisement['title'] }}"
                    >
                        <div
                            class="pointer-events-none absolute inset-0
                                   bg-[radial-gradient(circle_at_center,rgba(37,99,235,0.07),transparent_60%)]"
                        ></div>

                        <img
                            src="{{ $homeAdvertisement['image'] }}"
                            alt="{{ $homeAdvertisement['title'] }}"
                            class="relative z-10 h-full max-h-[330px]
                                   w-full object-contain p-3
                                   transition duration-500
                                   group-hover:scale-[1.015]
                                   sm:p-4 lg:max-h-[350px]"
                            loading="lazy"
                        >

                        {{-- Image Launch Badge --}}
                        <span
                            class="absolute right-3 top-3 z-20
                                   inline-flex items-center gap-2
                                   rounded-full border border-emerald-200
                                   bg-emerald-50/95 px-3 py-1.5
                                   text-[9px] font-black uppercase
                                   tracking-[0.14em] text-emerald-700
                                   shadow-sm backdrop-blur"
                        >
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                            Just Launched
                        </span>

                    </a>

                </div>
            </article>

        </div>
    </section>

@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const advertisement = document.getElementById(
            'gptCompactAdvertisement'
        );

        const closeButton = document.getElementById(
            'closeGptCompactAdvertisement'
        );

        if (!advertisement || !closeButton) {
            return;
        }

        closeButton.addEventListener('click', function () {
            advertisement.style.transition =
                'opacity 250ms ease, transform 250ms ease';

            advertisement.style.opacity = '0';
            advertisement.style.transform = 'translateY(-8px)';

            window.setTimeout(function () {
                advertisement.remove();
            }, 260);
        });
    });
</script>

    
   

{{-- 06. COMPANY OVERVIEW --}}
@if ($companyOverview)
    <section class="section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto grid max-w-7xl items-center gap-7 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">
            <div>
                @if ($companyOverview->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $companyOverview->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $companyOverview->title }}
                </h2>

                @if ($companyOverview->description)
                    <p class="mt-4 max-w-2xl text-base leading-7 text-slate-600 lg:text-[17px]">
                        {{ $companyOverview->description }}
                    </p>
                @endif

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @if ($companyOverview->card_1_title || $companyOverview->card_1_description)
                        <div class="soft-card rounded-2xl p-5">
                            @if ($companyOverview->card_1_title)
                                <h3 class="text-lg font-black text-slate-950">
                                    {{ $companyOverview->card_1_title }}
                                </h3>
                            @endif

                            @if ($companyOverview->card_1_description)
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $companyOverview->card_1_description }}
                                </p>
                            @endif
                        </div>
                    @endif

                    @if ($companyOverview->card_2_title || $companyOverview->card_2_description)
                        <div class="soft-card rounded-2xl p-5">
                            @if ($companyOverview->card_2_title)
                                <h3 class="text-lg font-black text-slate-950">
                                    {{ $companyOverview->card_2_title }}
                                </h3>
                            @endif

                            @if ($companyOverview->card_2_description)
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $companyOverview->card_2_description }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                @foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $index => $imageField)
                    @php
                        $altField = $imageField . '_alt';
                    @endphp

                    @if ($companyOverview->{$imageField})
                        <img
                            class="{{ in_array($index, [1, 3]) ? 'mt-5 sm:mt-7' : '' }} h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                            src="{{ asset('storage/' . $companyOverview->{$imageField}) }}"
                            alt="{{ $companyOverview->{$altField} ?: 'Company Overview Image' }}"
                            loading="lazy"
                        >
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- 07. ABOUT GPT GROUP --}}
<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto grid max-w-7xl items-center gap-7 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:gap-10 lg:px-8">
        <div>
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                About GPT Group
            </p>

            <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Technology distribution and solutions built for modern markets.
            </h2>

            <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                GPT Group is a diversified technology distribution and solutions company serving businesses,
                channel partners and consumers across Oman and the GCC. Our strength combines trusted brands,
                market execution, technical capability and reliable after-sales support.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('about') }}" class="btn-blue px-6 py-3 text-sm">
                    Discover GPT Group
                </a>

                <a href="{{ route('contact') }}" class="btn-white px-6 py-3 text-sm">
                    Talk to Our Team
                </a>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div class="soft-card soft-card-hover rounded-2xl p-5">
                <p class="text-gradient text-3xl font-black">01</p>
                <h3 class="mt-3 text-xl font-black text-slate-950">
                    Distribution Strength
                </h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Strong retail, wholesale and B2B execution across key technology categories.
                </p>
            </div>

            <div class="soft-card soft-card-hover rounded-2xl p-5 sm:mt-5">
                <p class="text-gradient text-3xl font-black">02</p>
                <h3 class="mt-3 text-xl font-black text-slate-950">
                    Solution Expertise
                </h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Integrated security, infrastructure and enterprise technology solutions.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- 08. OUR BUSINESS VERTICALS --}}
{{-- 08. OUR BUSINESS VERTICALS --}}
<section class="section-muted py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Heading --}}
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Our Business Verticals
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Five pillars. One integrated business ecosystem.
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600 lg:text-[17px]">
                We connect technology, infrastructure, smart solutions and
                real estate opportunities through a complete business and
                execution platform.
            </p>
        </div>

        @php
            $businessVerticals = [
                [
                    'number' => '01',
                    'title' => 'Mobility Solutions',
                    'description' => 'Smartphones, tablets, wearables, accessories and mobility products from trusted global technology brands.',
                    'route' => 'business.mobility',
                ],
                [
                    'number' => '02',
                    'title' => 'Integrated Security & ELV Solutions',
                    'description' => 'CCTV, access control, video surveillance, fire alarm and integrated low-voltage security systems.',
                    'route' => 'business.security-elv',
                ],
                [
                    'number' => '03',
                    'title' => 'Smart Home & IoT Solutions',
                    'description' => 'Connected automation, intelligent devices and smart technology solutions for homes and businesses.',
                    'route' => 'business.smart-home-iot',
                ],
                [
                    'number' => '04',
                    'title' => 'Network Infrastructure & Structured Cabling',
                    'description' => 'Reliable networking, structured cabling and scalable infrastructure solutions for modern organisations.',
                    'route' => 'business.network',
                ],
                [
                    'number' => '05',
                    'title' => 'Real Estate',
                    'description' => 'Strategic real estate development, commercial opportunities, investments and long-term property partnerships.',
                    'route' => 'business.real-estate',
                ],
            ];
        @endphp

        {{-- Business Cards --}}
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
            @foreach ($businessVerticals as $vertical)
                <a
                    href="{{ route($vertical['route']) }}"
                    class="soft-card soft-card-hover group flex h-full flex-col rounded-2xl p-5"
                >
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-gradient text-3xl font-black">
                            {{ $vertical['number'] }}
                        </span>

                        <span
                            class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-blue-50 text-lg text-blue-700 transition duration-200 group-hover:bg-blue-600 group-hover:text-white"
                        >
                            →
                        </span>
                    </div>

                    <h3 class="mt-4 text-xl font-black leading-tight text-slate-950">
                        {{ $vertical['title'] }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        {{ $vertical['description'] }}
                    </p>

                    <span class="mt-auto pt-5 text-sm font-black text-blue-700">
                        Explore Solution
                    </span>
                </a>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="mt-8 text-center">
            <a
                href="{{ route('business.index') }}"
                class="btn-blue inline-flex items-center justify-center gap-2 px-6 py-3 text-sm"
            >
                View All Business Verticals
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>

{{-- 09. OUR MARKET PRESENCE --}}
<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">
            <div>
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    Our Market Presence
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Connected across Oman. Ready for GCC growth.
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600 lg:text-[17px]">
                    GPT Group supports retailers, resellers, enterprises and technology partners through
                    a growing distribution and service network.
                </p>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="soft-card rounded-2xl p-5">
                        <p class="text-gradient text-2xl font-black">Oman</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Muscat, Sohar, Sur, Salalah and growing regional coverage.
                        </p>
                    </div>

                    <div class="soft-card rounded-2xl p-5">
                        <p class="text-gradient text-2xl font-black">GCC</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Strategic expansion and cross-market distribution capability.
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-7 lg:p-8">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                    Channel Network
                </p>

                <div class="mt-5 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl bg-white/12 p-5 backdrop-blur">
                        <p class="text-2xl font-black">B2B</p>
                        <p class="mt-1 text-sm leading-6 text-blue-50">
                            Enterprise and institutional supply
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/12 p-5 backdrop-blur">
                        <p class="text-2xl font-black">Retail</p>
                        <p class="mt-1 text-sm leading-6 text-blue-50">
                            Consumer-facing product availability
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/12 p-5 backdrop-blur">
                        <p class="text-2xl font-black">Wholesale</p>
                        <p class="mt-1 text-sm leading-6 text-blue-50">
                            Dealer and reseller distribution
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/12 p-5 backdrop-blur">
                        <p class="text-2xl font-black">Support</p>
                        <p class="mt-1 text-sm leading-6 text-blue-50">
                            Service and partner enablement
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 10. WHY CHOOSE GPT GROUP --}}
<section class="section-muted py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Why Choose GPT Group
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                A reliable partner from market entry to customer delivery.
            </h2>
        </div>

        @php
            $whyChooseUs = [
                [
                    'title' => 'Trusted Brand Partnerships',
                    'text' => 'Access to established technology brands and dependable product portfolios.',
                ],
                [
                    'title' => 'Strong Market Execution',
                    'text' => 'Retail, wholesale and enterprise channels managed through local expertise.',
                ],
                [
                    'title' => 'Technical Solution Capability',
                    'text' => 'Support for security, infrastructure and integrated technology projects.',
                ],
                [
                    'title' => 'Reliable After-Sales Support',
                    'text' => 'Responsive service, partner assistance and long-term relationship management.',
                ],
            ];
        @endphp

        <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($whyChooseUs as $index => $item)
                <div class="soft-card soft-card-hover rounded-2xl p-5">
                    <span class="grid h-10 w-10 place-items-center rounded-xl bg-blue-600 text-sm font-black text-white">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <h3 class="mt-4 text-xl font-black text-slate-950">
                        {{ $item['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $item['text'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

  


{{-- =========================================================
    05. GPT GROUP FEATURED BRANDS
========================================================= --}}

@php
    /*
    |--------------------------------------------------------------------------
    | Homepage Featured Brands
    |--------------------------------------------------------------------------
    | Samsung and Hikvision are primary brands.
    | Remaining important brands are shown after them.
    */

    $featuredProductBrands = [
         [
            'name' => 'Hikvision',
            'logo_names' => ['hikvision'],
            'website' => 'https://www.hikvision.com/en/',
            'category' => 'Security & Surveillance',
            'description' => 'Professional CCTV, video surveillance, access control, intercom and security solutions.',
            'priority' => true,
            'priority_text' => 'Primary Brand',
        ],
        [
            'name' => 'Samsung',
            'logo_names' => ['sumsung', 'samsung'],
            'website' => 'https://www.samsung.com/',
            'category' => 'Mobile & Consumer Electronics',
            'description' => 'Smartphones, tablets, displays, wearables and connected consumer technology.',
            'priority' => true,
            'priority_text' => 'Primary Brand',
        ],
       
        [
            'name' => 'Vivo',
            'logo_names' => ['vivo'],
            'website' => 'https://www.vivo.com/en/',
            'category' => 'Smartphones',
            'description' => 'Modern smartphones focused on design, camera performance and user experience.',
            'priority' => false,
        ],
        [
            'name' => 'Nothing',
            'logo_names' => ['nothing'],
            'website' => 'https://nothing.tech/',
            'category' => 'Smartphones & Audio',
            'description' => 'Design-led smartphones, wireless audio products and connected devices.',
            'priority' => false,
        ],
        // [
        //     'name' => 'Xiaomi',
        //     'logo_names' => ['mi', 'xiaomi'],
        //     'website' => 'https://www.mi.com/global/',
        //     'category' => 'Mobile & Smart Devices',
        //     'description' => 'Smartphones, smart-home products and connected consumer electronics.',
        //     'priority' => false,
        // ],
        // [
        //     'name' => 'EZVIZ',
        //     'logo_names' => ['New Project (7)', 'ezviz'],
        //     'website' => 'https://www.ezviz.com/',
        //     'category' => 'Smart Security',
        //     'description' => 'Smart cameras, home security and connected monitoring solutions.',
        //     'priority' => false,
        // ],
        // [
        //     'name' => 'Anker',
        //     'logo_names' => ['anker'],
        //     'website' => 'https://www.anker.com/',
        //     'category' => 'Power & Accessories',
        //     'description' => 'Charging products, power banks and premium mobile accessories.',
        //     'priority' => false,
        // ],
        // [
        //     'name' => 'SanDisk',
        //     'logo_names' => ['sandisk'],
        //     'website' => 'https://www.sandisk.com/',
        //     'category' => 'Storage Solutions',
        //     'description' => 'Memory cards, flash drives and portable digital storage products.',
        //     'priority' => false,
        // ],
    ];
@endphp

<section class="relative overflow-hidden bg-white py-10 sm:py-12 lg:py-16">

    {{-- Background decoration --}}
    <div class="pointer-events-none absolute right-0 top-0 h-72 w-72 rounded-full bg-cyan-100/40 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 left-0 h-72 w-72 rounded-full bg-blue-100/40 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-[11px] font-black uppercase tracking-[.18em] text-blue-700">
                    <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
                    GPT Group Featured Brands
                </div>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Trusted global technology brands,
                    <span class="block bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        supported by GPT Group in Oman.
                    </span>
                </h2>

                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    GPT Group brings together established brands across mobile devices,
                    consumer electronics, professional security, smart-home technology,
                    digital storage and mobile accessories.
                </p>

                <p class="mt-3 max-w-3xl text-sm font-semibold leading-6 text-slate-500">
                    Samsung and Hikvision are central to our technology portfolio,
                    supported by selected brands that serve retail, dealer, corporate
                    and project-based requirements across Oman.
                </p>
            </div>

            <a
                href="{{ url('/brands') }}"
                class="inline-flex w-fit items-center justify-center gap-2 rounded-full bg-blue-700 px-6 py-3 text-xs font-black uppercase tracking-[.14em] text-white shadow-lg shadow-blue-700/20 transition hover:-translate-y-1 hover:bg-blue-800"
            >
                Explore All Brands
                <span class="text-lg leading-none">→</span>
            </a>
        </div>


        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ($featuredProductBrands as $brand)
                @php
                    $firstLogo = asset(
                        'assets/logo brands/' .
                        $brand['logo_names'][0] .
                        '.png'
                    );

                    $candidatePaths = collect($brand['logo_names'])
                        ->flatMap(function ($name) {
                            return [
                                asset('assets/logo brands/' . $name . '.png'),
                                asset('assets/logo brands/' . $name . '.jpg'),
                                asset('assets/logo brands/' . $name . '.jpeg'),
                                asset('assets/logo brands/' . $name . '.webp'),
                            ];
                        })
                        ->values()
                        ->toJson();
                @endphp

                <a
                    href="{{ $brand['website'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Visit {{ $brand['name'] }} official website"
                    class="group relative block overflow-hidden rounded-2xl border bg-white shadow-sm transition duration-300 hover:-translate-y-1.5 hover:shadow-xl
                        {{ $brand['priority'] ? 'border-blue-300 ring-2 ring-blue-100' : 'border-slate-100' }}"
                >

                    @if ($brand['priority'])
                        <span class="absolute right-3 top-3 z-10 rounded-full bg-blue-700 px-3 py-1 text-[9px] font-black uppercase tracking-[.14em] text-white shadow-lg">
                            {{ $brand['priority_text'] }}
                        </span>
                    @endif

                    <div class="relative grid h-40 place-items-center overflow-hidden bg-gradient-to-br from-white via-slate-50 to-blue-50 p-5">

                        <img
                            src="{{ $firstLogo }}"
                            alt="{{ $brand['name'] }} logo"
                            class="featured-brand-logo h-full w-full object-contain transition duration-500 group-hover:scale-105"
                            data-candidates='{{ $candidatePaths }}'
                            data-index="0"
                            loading="lazy"
                        >

                        <div class="featured-brand-fallback absolute inset-0 hidden h-full w-full place-items-center bg-gradient-to-br from-blue-50 to-cyan-50">
                            <span class="px-4 text-center text-2xl font-black text-blue-700">
                                {{ $brand['name'] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5">

                        <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-[10px] font-black uppercase tracking-[.12em] text-blue-700">
                            {{ $brand['category'] }}
                        </span>

                        <div class="mt-3 flex items-start justify-between gap-3">
                            <h3 class="text-xl font-black text-slate-950">
                                {{ $brand['name'] }}
                            </h3>

                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-slate-100 text-lg text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                ↗
                            </span>
                        </div>

                        <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">
                            {{ $brand['description'] }}
                        </p>

                        <p class="mt-4 text-[10px] font-black uppercase tracking-[.16em] text-blue-700">
                            Official Brand Website
                        </p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>


{{-- =========================================================
    06. GPT GROUP MAIN PRODUCT CATEGORIES
========================================================= --}}

@php
    $gptProductCategories = [
        [
            'number' => '01',
            'name' => 'Mobile & Consumer Electronics',
            'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&w=1400&q=85',
            'description' => 'Smartphones, feature phones, tablets, displays, wearables and connected consumer electronic products for modern customers.',
            'brands' => 'Samsung, Vivo, Nothing, Xiaomi, Redmi, Nokia, LAVA and LG',
            'link' => 'https://www.samsung.com/',
            'label' => 'Core Segment',
        ],
        [
            'number' => '02',
            'name' => 'Security & Surveillance Solutions',
            'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1400&q=85',
            'description' => 'CCTV cameras, IP surveillance, DVR, NVR, access control, video intercom and centralized security solutions.',
            'brands' => 'Hikvision and EZVIZ',
            'link' => 'https://www.hikvision.com/en/',
            'label' => 'Core Segment',
        ],
        [
            'number' => '03',
            'name' => 'Smart Home & Automation',
            'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1400&q=85',
            'description' => 'Smart cameras, intelligent lighting, voice-enabled products, automation controls and connected living solutions.',
            'brands' => 'LifeSmart, Yasmina, EZVIZ and Xiaomi',
            'link' => 'https://iot.ilifesmart.com/',
            'label' => 'Smart Technology',
        ],
        [
            'number' => '04',
            'name' => 'IT, Storage & Mobile Accessories',
            'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=1400&q=85',
            'description' => 'Storage devices, keyboards, mice, webcams, chargers, power banks, cables, adapters and digital accessories.',
            'brands' => 'Logitech, SanDisk, UGREEN, Anker and Romoss',
            'link' => 'https://www.logitech.com/',
            'label' => 'Business & Consumer',
        ],
    ];
@endphp

<section class="relative overflow-hidden bg-slate-50 py-10 sm:py-12 lg:py-16">

    <div class="pointer-events-none absolute left-1/2 top-0 h-96 w-96 -translate-x-1/2 rounded-full bg-blue-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center">

            <div class="inline-flex items-center gap-2 rounded-full border border-cyan-100 bg-cyan-50 px-4 py-2 text-[11px] font-black uppercase tracking-[.18em] text-cyan-700">
                GPT Group Product Portfolio
            </div>

            <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Technology solutions designed for
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    customers and businesses across Oman.
                </span>
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600 lg:text-[17px]">
                GPT Group supports a broad technology ecosystem covering mobile
                innovation, consumer electronics, professional security,
                smart-home products and essential digital accessories.
            </p>

            <p class="mt-3 text-sm font-semibold leading-6 text-slate-500">
                Our focused category structure helps retail customers, dealers,
                corporate buyers and project teams identify suitable products
                and technology solutions from trusted international brands.
            </p>
        </div>


        <div class="mt-9 grid gap-5 md:grid-cols-2">

            @foreach ($gptProductCategories as $category)
                <a
                    href="{{ $category['link'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Explore {{ $category['name'] }}"
                    class="group overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1.5 hover:shadow-xl"
                >

                    <div class="relative h-64 overflow-hidden sm:h-72">

                        <img
                            src="{{ $category['image'] }}"
                            alt="{{ $category['name'] }}"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                            loading="lazy"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/35 to-transparent"></div>

                        <div class="absolute left-5 top-5 flex items-center gap-2">
                            <span class="grid h-11 w-11 place-items-center rounded-full bg-white text-sm font-black text-blue-700 shadow-lg">
                                {{ $category['number'] }}
                            </span>

                            <span class="rounded-full border border-white/20 bg-slate-950/40 px-3 py-1.5 text-[10px] font-black uppercase tracking-[.14em] text-white backdrop-blur">
                                {{ $category['label'] }}
                            </span>
                        </div>

                        <div class="absolute bottom-5 left-5 right-5">
                            <h3 class="text-2xl font-black leading-tight text-white sm:text-3xl">
                                {{ $category['name'] }}
                            </h3>

                            <p class="mt-2 text-xs font-bold uppercase tracking-[.12em] text-cyan-200">
                                GPT Group Technology Segment
                            </p>
                        </div>
                    </div>


                    <div class="p-5 sm:p-6">

                        <p class="text-sm leading-6 text-slate-600">
                            {{ $category['description'] }}
                        </p>

                        <div class="mt-4 rounded-xl border border-blue-100 bg-blue-50 p-4">
                            <p class="text-[10px] font-black uppercase tracking-[.17em] text-slate-400">
                                Associated Brands
                            </p>

                            <p class="mt-1.5 text-xs font-bold leading-5 text-blue-700">
                                {{ $category['brands'] }}
                            </p>
                        </div>

                        <div class="mt-5 flex items-center justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-[.15em] text-slate-400">
                                    Available Through
                                </p>

                                <p class="mt-1 text-sm font-black text-slate-950">
                                    GPT Group Oman
                                </p>
                            </div>

                            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-blue-700 text-lg text-white transition group-hover:bg-cyan-500">
                                ↗
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>


     
    </div>
</section>


{{-- =========================================================
    FEATURED BRAND LOGO FALLBACK
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.featured-brand-logo').forEach(function (image) {
            let candidates = [];

            try {
                candidates = JSON.parse(image.dataset.candidates || '[]');
            } catch (error) {
                candidates = [];
            }

            let index = Number(image.dataset.index || 0);

            image.addEventListener('error', function handleLogoError() {
                index += 1;

                if (index < candidates.length) {
                    image.dataset.index = index;
                    image.src = candidates[index];
                    return;
                }

                image.classList.add('hidden');

                const parent = image.parentElement;

                if (!parent) {
                    return;
                }

                const fallback = parent.querySelector(
                    '.featured-brand-fallback'
                );

                if (fallback) {
                    fallback.classList.remove('hidden');
                    fallback.classList.add('grid');
                }
            });
        });

    });
</script>






{{-- 09. WHAT WE DO --}}
@if (isset($whatWeDoSection) && $whatWeDoSection)
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div class="order-1 lg:order-2">
                    @if ($whatWeDoSection->image)
                        <img
                            class="h-[280px] w-full rounded-2xl object-cover shadow-xl sm:h-[340px] lg:h-[410px]"
                            src="{{ asset('storage/' . $whatWeDoSection->image) }}"
                            alt="{{ $whatWeDoSection->title }}"
                            loading="lazy"
                        >
                    @else
                        <img
                            class="h-[280px] w-full rounded-2xl object-cover shadow-xl sm:h-[340px] lg:h-[410px]"
                            src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                            alt="{{ $whatWeDoSection->title }}"
                            loading="lazy"
                        >
                    @endif

                    @if ($whatWeDoSection->overlay_title || $whatWeDoSection->overlay_text)
                        <div class="soft-card relative -mt-12 mx-4 rounded-2xl p-5 sm:mx-6">
                            @if ($whatWeDoSection->overlay_title)
                                <p class="text-xl font-black text-slate-950 sm:text-2xl">
                                    {{ $whatWeDoSection->overlay_title }}
                                </p>
                            @endif

                            @if ($whatWeDoSection->overlay_text)
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $whatWeDoSection->overlay_text }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="order-2 lg:order-1">
                    @if ($whatWeDoSection->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $whatWeDoSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $whatWeDoSection->title }}
                    </h2>

                    @if ($whatWeDoSection->description)
                        <p class="mt-4 text-base leading-7 text-slate-600 lg:text-[17px]">
                            {{ $whatWeDoSection->description }}
                        </p>
                    @endif

                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $cardTitle = $whatWeDoSection->{'card_' . $i . '_title'} ?? null;
                                $cardDesc = $whatWeDoSection->{'card_' . $i . '_description'} ?? null;
                            @endphp

                            @if ($cardTitle || $cardDesc)
                                <div class="soft-card soft-card-hover rounded-2xl p-5">
                                    @if ($cardTitle)
                                        <h3 class="text-lg font-black text-slate-950">
                                            {{ $cardTitle }}
                                        </h3>
                                    @endif

                                    @if ($cardDesc)
                                        <p class="mt-2 text-sm leading-6 text-slate-500">
                                            {{ $cardDesc }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

{{-- 11. NETWORK --}}
@if ($networkSection)
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div>
                    @if ($networkSection->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $networkSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $networkSection->title }}
                    </h2>

                    @if ($networkSection->description)
                        <p class="mt-4 text-base leading-7 text-slate-600 lg:text-[17px]">
                            {{ $networkSection->description }}
                        </p>
                    @endif

                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        @if ($networkSection->card_1_title || $networkSection->card_1_description)
                            <div class="soft-card rounded-2xl p-5">
                                @if ($networkSection->card_1_title)
                                    <h3 class="text-lg font-black text-slate-950">
                                        {{ $networkSection->card_1_title }}
                                    </h3>
                                @endif

                                @if ($networkSection->card_1_description)
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $networkSection->card_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if ($networkSection->card_2_title || $networkSection->card_2_description)
                            <div class="soft-card rounded-2xl p-5">
                                @if ($networkSection->card_2_title)
                                    <h3 class="text-lg font-black text-slate-950">
                                        {{ $networkSection->card_2_title }}
                                    </h3>
                                @endif

                                @if ($networkSection->card_2_description)
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $networkSection->card_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    @if ($networkSection->button_text)
                        <a
                            href="{{ $networkSection->button_link ?: '#' }}"
                            class="btn-blue mt-6 px-6 py-3 text-sm"
                        >
                            {{ $networkSection->button_text }}
                        </a>
                    @endif
                </div>

                <div class="relative pb-8">
                    @if ($networkSection->image)
                        <img
                            class="h-[300px] w-full rounded-2xl object-cover shadow-xl sm:h-[360px] lg:h-[420px]"
                            src="{{ asset('storage/' . $networkSection->image) }}"
                            alt="{{ $networkSection->image_alt ?: 'GPT Network' }}"
                            loading="lazy"
                        >
                    @endif

                    @if ($networkSection->overlay_title || $networkSection->overlay_description)
                        <div class="soft-card absolute bottom-0 left-4 right-4 rounded-2xl p-5 sm:left-6 sm:right-6">
                            @if ($networkSection->overlay_title)
                                <p class="text-xl font-black text-slate-950 sm:text-2xl">
                                    {{ $networkSection->overlay_title }}
                                </p>
                            @endif

                            @if ($networkSection->overlay_description)
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $networkSection->overlay_description }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif

{{-- 13. STRATEGY --}}
@if ($strategySection)
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                @if ($strategySection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $strategySection->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $strategySection->title }}
                </h2>

                @if ($strategySection->description)
                    <p class="mt-3 text-base leading-7 text-slate-600 lg:text-[17px]">
                        {{ $strategySection->description }}
                    </p>
                @endif
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([1, 2, 3, 4] as $i)
                    @php
                        $numberField = 'strategy_' . $i . '_number';
                        $titleField = 'strategy_' . $i . '_title';
                        $descriptionField = 'strategy_' . $i . '_description';
                    @endphp

                    @if (
                        $strategySection->{$numberField}
                        || $strategySection->{$titleField}
                        || $strategySection->{$descriptionField}
                    )
                        <div class="soft-card soft-card-hover rounded-2xl p-5">
                            <span class="text-gradient text-3xl font-black">
                                {{ $strategySection->{$numberField} }}
                            </span>

                            @if ($strategySection->{$titleField})
                                <h3 class="mt-4 text-xl font-black text-slate-950">
                                    {{ $strategySection->{$titleField} }}
                                </h3>
                            @endif

                            @if ($strategySection->{$descriptionField})
                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $strategySection->{$descriptionField} }}
                                </p>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- 14. RETAIL OUTLETS --}}
@if ($retailOutletSection)
    <section class="section-muted overflow-hidden py-10 sm:py-12 lg:py-14">
        <div class="mx-auto grid max-w-7xl items-center gap-7 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">

            <div>
                @if ($retailOutletSection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $retailOutletSection->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $retailOutletSection->title }}
                </h2>

                @if ($retailOutletSection->description)
                    <p class="mt-4 text-base leading-7 text-slate-600 lg:text-[17px]">
                        {{ $retailOutletSection->description }}
                    </p>
                @endif

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach ([1, 2, 3, 4] as $i)
                        @php
                            $titleField = 'card_' . $i . '_title';
                            $descriptionField = 'card_' . $i . '_description';
                        @endphp

                        @if (
                            $retailOutletSection->{$titleField}
                            || $retailOutletSection->{$descriptionField}
                        )
                            <div class="soft-card rounded-2xl p-5">
                                @if ($retailOutletSection->{$titleField})
                                    <h3 class="text-lg font-black text-slate-950">
                                        {{ $retailOutletSection->{$titleField} }}
                                    </h3>
                                @endif

                                @if ($retailOutletSection->{$descriptionField})
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $retailOutletSection->{$descriptionField} }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

                @if ($retailOutletSection->button_text)
                    <a
                        class="btn-blue mt-6 px-6 py-3 text-sm"
                        href="{{ $retailOutletSection->button_link ?: '#' }}"
                    >
                        {{ $retailOutletSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                @foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $index => $imageField)
                    @php
                        $altField = $imageField . '_alt';
                    @endphp

                    @if ($retailOutletSection->{$imageField})
                        <img
                            class="{{ in_array($index, [1, 3]) ? 'mt-5 sm:mt-7' : '' }} h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                            src="{{ asset('storage/' . $retailOutletSection->{$imageField}) }}"
                            alt="{{ $retailOutletSection->{$altField} ?: 'Retail Outlet Image' }}"
                            loading="lazy"
                        >
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

  
{{-- 16. PARTNER LOGOS --}}
@if ($partnerLogoSection && $partnerLogoSection->activeLogos->count())
    <section class="section-muted overflow-hidden py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-2xl">
                    @if ($partnerLogoSection->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $partnerLogoSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $partnerLogoSection->title }}
                    </h2>
                </div>

                @if ($partnerLogoSection->description)
                    <p class="max-w-xl text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $partnerLogoSection->description }}
                    </p>
                @endif
            </div>

            <div class="relative mt-7 pb-3">
                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-10 bg-gradient-to-r from-slate-50 to-transparent sm:w-16"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-10 bg-gradient-to-l from-slate-50 to-transparent sm:w-16"></div>

                <div class="logo-marquee py-1">
                    <div class="logo-marquee-track">
                        @foreach ($partnerLogoSection->activeLogos->concat($partnerLogoSection->activeLogos) as $logo)
                            <div class="logo-marquee-item soft-card soft-card-hover flex h-24 items-center justify-center rounded-2xl border border-slate-200/70 bg-white px-5 py-4 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                                @if ($logo->logo)
                                    <img
                                        src="{{ asset('storage/' . $logo->logo) }}"
                                        class="h-10 w-full max-w-[125px] object-contain"
                                        alt="{{ $logo->name }}"
                                        loading="lazy"
                                    >
                                @else
                                    <span class="text-center text-base font-black text-slate-700">
                                        {{ $logo->name }}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@endif

{{-- 17. TESTIMONIALS --}}
@if ($testimonialSection && $testimonialSection->activeTestimonials->count())
    <section class="overflow-hidden bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                @if ($testimonialSection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $testimonialSection->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $testimonialSection->title }}
                </h2>

                @if ($testimonialSection->description)
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        {{ $testimonialSection->description }}
                    </p>
                @endif
            </div>

            <div class="testimonial-marquee mt-7 pb-2">
                <div class="testimonial-marquee-track">
                    @foreach ($testimonialSection->activeTestimonials->concat($testimonialSection->activeTestimonials) as $testimonial)
                        <div class="testimonial-marquee-item soft-card soft-card-hover rounded-2xl p-5">

                            <p class="text-base leading-7 text-slate-700">
                                “{{ $testimonial->message }}”
                            </p>

                            <div class="mt-4 flex items-center gap-3">
                                @if ($testimonial->image)
                                    <img
                                        src="{{ asset('storage/' . $testimonial->image) }}"
                                        class="h-10 w-10 rounded-full object-cover"
                                        alt="{{ $testimonial->name }}"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-xs font-black text-blue-700">
                                        {{ strtoupper(substr($testimonial->name ?? 'P', 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <p class="text-sm font-black text-slate-950">
                                        {{ $testimonial->name }}
                                    </p>

                                    @if ($testimonial->location)
                                        <p class="text-xs text-slate-500">
                                            {{ $testimonial->location }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endif

{{-- 18. FAQ --}}
@if ($faqSection)
    <section class="section-muted py-10 sm:py-12 lg:py-14">
        <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">

            <div>
                @if ($faqSection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $faqSection->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $faqSection->title }}
                </h2>

                @if ($faqSection->description)
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        {{ $faqSection->description }}
                    </p>
                @endif

                @if ($faqSection->button_text)
                    <a
                        class="btn-blue mt-6 px-6 py-3 text-sm"
                        href="{{ $faqSection->button_link ?: '#' }}"
                    >
                        {{ $faqSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="grid gap-3">
                @foreach ($faqSection->activeItems as $faq)
                    <details class="soft-card rounded-2xl p-5" {{ $faq->is_open ? 'open' : '' }}>
                        <summary class="cursor-pointer text-sm font-black text-slate-950 sm:text-base">
                            {{ $faq->question }}
                        </summary>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            {{ $faq->answer }}
                        </p>
                    </details>
                @endforeach
            </div>

        </div>
    </section>
@endif



{{-- 22. CTA + ENQUIRY --}}
<section class="overflow-hidden bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto grid max-w-7xl items-stretch gap-5 px-4 sm:px-6 lg:grid-cols-2 lg:gap-7 lg:px-8">

        <div class="rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-7 lg:p-9">
            <p class="text-xs font-black uppercase tracking-[.20em] text-blue-100">
                Call To Action
            </p>

            <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                Ready to build your distribution advantage?
            </h2>

            <p class="mt-4 text-base leading-7 text-blue-50">
                Connect with GPT Group for brand partnership, product distribution,
                retail outlet support, B2B enquiries and market expansion.
            </p>

            <div class="mt-6 grid gap-3 sm:flex">
                <a
                    class="inline-flex justify-center rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                    href="{{ route('contact') }}"
                >
                    Partner Enquiry
                </a>

                <a
                    class="inline-flex justify-center rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                    href="{{ route('brands') }}"
                >
                    Explore Products
                </a>
            </div>
        </div>

        <div class="soft-card min-w-0 rounded-[2rem] p-6 sm:p-7 lg:p-9">
            <p class="text-xs font-black uppercase tracking-[.20em] text-blue-700">
                Enquiry
            </p>

            <h3 class="mt-3 text-2xl font-black leading-tight text-slate-950 sm:text-3xl">
                Quick Contact Form
            </h3>

            <form action="#" method="POST" class="mt-5 grid gap-3">
                @csrf

                <input
                    type="text"
                    name="name"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500"
                    placeholder="Full Name"
                >

                <input
                    type="text"
                    name="company"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500"
                    placeholder="Company / Brand Name"
                >

                <input
                    type="text"
                    name="contact"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500"
                    placeholder="Phone / Email"
                >

                <select
                    name="enquiry_type"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500"
                >
                    <option>Distribution Partnership</option>
                    <option>Retail Outlet</option>
                    <option>B2B Supply</option>
                    <option>Career</option>
                </select>

                <textarea
                    name="message"
                    class="h-24 w-full resize-none rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500"
                    placeholder="Message"
                ></textarea>

                <button type="submit" class="btn-blue mt-1 w-full py-3 text-sm">
                    Submit Enquiry
                </button>
            </form>
        </div>

    </div>
</section>

{{-- COMPACT MARQUEE CSS --}}
<style>
    .logo-marquee,
    .testimonial-marquee {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .logo-marquee-track {
        display: flex;
        width: max-content;
        gap: .9rem;
        padding-block: .25rem;
        animation: logoMarquee 32s linear infinite;
    }

    .logo-marquee:hover .logo-marquee-track {
        animation-play-state: paused;
    }

    .logo-marquee-item {
        flex: 0 0 170px;
        min-width: 170px;
    }

    .testimonial-marquee-track {
        display: flex;
        width: max-content;
        gap: 1rem;
        padding-block: .25rem;
        animation: testimonialMarquee 42s linear infinite;
    }

    .testimonial-marquee:hover .testimonial-marquee-track {
        animation-play-state: paused;
    }

    .testimonial-marquee-item {
        flex: 0 0 320px;
        width: 320px;
        min-height: 205px;
    }

    @keyframes logoMarquee {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @keyframes testimonialMarquee {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @media (max-width: 640px) {
        .logo-marquee-item {
            flex-basis: 140px;
            min-width: 140px;
        }

        .testimonial-marquee-item {
            flex-basis: 280px;
            width: 280px;
            min-height: 190px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .logo-marquee-track,
        .testimonial-marquee-track {
            animation: none;
        }
    }
</style>
  

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper === 'undefined') {
                return;
            }

            if (document.querySelector('.bannerSwiper')) {
                new Swiper('.bannerSwiper', {
                    loop: true,
                    speed: 950,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true,
                    },
                    autoplay: {
                        delay: 4200,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    pagination: {
                        el: '.banner-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.banner-next',
                        prevEl: '.banner-prev',
                    },
                });
            }

            if (document.querySelector('.brandSwiper')) {
                new Swiper('.brandSwiper', {
                    loop: {{ isset($productBrands) && $productBrands->count() > 4 ? 'true' : 'false' }},
                    speed: 700,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2600,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    navigation: {
                        nextEl: '.brand-next',
                        prevEl: '.brand-prev',
                    },
                    pagination: {
                        el: '.brand-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1.08
                        },
                        640: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 3
                        },
                        1280: {
                            slidesPerView: 4
                        }
                    }
                });
            }

            if (document.querySelector('.productSwiper')) {
                new Swiper('.productSwiper', {
                    loop: true,
                    speed: 700,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2800,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    navigation: {
                        nextEl: '.product-next',
                        prevEl: '.product-prev',
                    },
                    pagination: {
                        el: '.product-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1.08,
                        },
                        640: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                        1280: {
                            slidesPerView: 4,
                        }
                    }
                });
            }
        });
    </script>

   

@endsection
