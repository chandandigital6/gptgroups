@extends('front_pages.front_components.main')

@section('content')
    <style>
        :root {
            --gpt-blue: #2563eb;
            --gpt-cyan: #06b6d4;
            --gpt-slate: #0f172a;
        }

        .home-soft-bg {
            background:
                radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .32), transparent 28%),
                radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .34), transparent 30%),
                linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
        }

        .section-soft {
            background:
                radial-gradient(circle at 95% 12%, rgba(34, 211, 238, .13), transparent 25%),
                linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .section-muted {
            background:
                radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .08), transparent 28%),
                linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--gpt-blue), var(--gpt-cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .soft-card {
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 18px 50px rgba(15, 23, 42, .06);
            backdrop-filter: blur(14px);
        }

        .soft-card-hover {
            transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }

        .soft-card-hover:hover {
            transform: translateY(-8px);
            border-color: rgba(37, 99, 235, .18);
            box-shadow: 0 26px 70px rgba(15, 23, 42, .12);
        }

        .btn-blue {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: linear-gradient(90deg, #2563eb, #06b6d4);
            color: #ffffff;
            font-weight: 900;
            padding: 1rem 1.75rem;
            box-shadow: 0 16px 35px rgba(37, 99, 235, .22);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .btn-blue:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 45px rgba(37, 99, 235, .28);
        }

        .btn-white {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #0f172a;
            font-weight: 900;
            padding: 1rem 1.75rem;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .08);
            transition: transform .25s ease, background .25s ease;
        }

        .btn-white:hover {
            transform: translateY(-3px);
            background: #f8fafc;
        }

        .bannerSwiper .swiper-pagination-bullet,
        .productSwiper .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #cbd5e1;
            opacity: 1;
        }

        .bannerSwiper .swiper-pagination-bullet-active,
        .productSwiper .swiper-pagination-bullet-active {
            width: 34px;
            border-radius: 999px;
            background: #2563eb;
        }

        .banner-bg {
            transition: transform 7s ease;
        }

        .bannerSwiper .swiper-slide-active .banner-bg {
            transform: scale(1.08);
        }

        .banner-product-img {
            transition: transform .8s ease;
        }

        .banner-product-card:hover .banner-product-img {
            transform: scale(1.06);
        }

        .banner-prev,
        .banner-next,
        .product-prev,
        .product-next {
            transition: all .3s ease;
        }

        .banner-prev:hover,
        .banner-next:hover {
            transform: translateY(-50%) scale(1.08);
        }

        .product-prev:hover,
        .product-next:hover {
            transform: scale(1.08);
        }

        .home-blob {
            filter: blur(10px);
            opacity: .42;
            animation: homeBlob 7s ease-in-out infinite alternate;
        }

        @keyframes homeBlob {
            from {
                transform: translateY(0) scale(1);
            }

            to {
                transform: translateY(22px) scale(1.08);
            }
        }

        @media (max-width: 767px) {

            .banner-prev,
            .banner-next {
                display: none !important;
            }
        }
    </style>

    @php
        $bannerThemeClasses = function ($theme) {
            return match ($theme) {
                'yellow' => [
                    'badge' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                    'highlight' => 'text-gradient',
                    'button' => 'bg-yellow-400 text-slate-950 hover:bg-yellow-300',
                    'dot' => 'bg-yellow-400',
                    'ring' => 'ring-yellow-200',
                ],
                'emerald' => [
                    'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    'highlight' => 'text-gradient',
                    'button' => 'bg-emerald-500 text-white hover:bg-emerald-400',
                    'dot' => 'bg-emerald-500',
                    'ring' => 'ring-emerald-200',
                ],
                default => [
                    'badge' => 'bg-blue-50 text-blue-700 border-blue-100',
                    'highlight' => 'text-gradient',
                    'button' => 'bg-blue-600 text-white hover:bg-blue-500',
                    'dot' => 'bg-cyan-400',
                    'ring' => 'ring-cyan-100',
                ],
            };
        };
    @endphp

    {{-- 01. HERO / BANNER --}}
    {{-- 01. HERO / BANNER --}}
@if (isset($banners) && $banners->count() > 0)
    <section class="relative overflow-hidden home-soft-bg">

        {{-- Decorative Background --}}
        <div class="home-blob absolute -right-20 -top-24 h-96 w-96 rounded-full bg-cyan-300"></div>
        <div class="home-blob absolute -left-28 top-40 h-96 w-96 rounded-full bg-blue-300"></div>

        <div class="swiper bannerSwiper relative z-10">
            <div class="swiper-wrapper">

                @foreach ($banners as $banner)
                    @php
                        $theme = $bannerThemeClasses($banner->theme ?? 'cyan');

                        $desktopImage = $banner->desktop_image
                            ? asset('storage/' . $banner->desktop_image)
                            : 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1800&q=85';

                        $mobileImage = $banner->mobile_image
                            ? asset('storage/' . $banner->mobile_image)
                            : $desktopImage;

                        $productImage = $banner->product_image
                            ? asset('storage/' . $banner->product_image)
                            : $desktopImage;

                        $buttonLink = $banner->button_link ?: '#';
                        $secondButtonLink = $banner->second_button_link ?: '#';
                    @endphp

                    <div class="swiper-slide">
                        <div class="relative min-h-[720px] overflow-hidden sm:min-h-[760px] lg:min-h-[650px]">

                            {{-- Background Image --}}
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ $mobileImage }}">

                                <img
                                    src="{{ $desktopImage }}"
                                    alt="{{ $banner->title }}"
                                    class="banner-bg absolute inset-0 h-full w-full object-cover opacity-[0.05]"
                                >
                            </picture>

                            {{-- Background Overlays --}}
                            <div class="absolute inset-0 bg-white/85"></div>

                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-blue-50/75">
                            </div>

                            <div
                                class="absolute inset-0 bg-[radial-gradient(circle_at_18%_18%,rgba(34,211,238,.18),transparent_34%),radial-gradient(circle_at_82%_38%,rgba(59,130,246,.15),transparent_35%)]">
                            </div>

                            {{-- Main Content --}}
                            <div
                                class="relative z-10 mx-auto flex min-h-[720px] max-w-7xl items-center px-4 py-10 sm:min-h-[760px] sm:px-6 lg:min-h-[650px] lg:px-8">

                                <div
                                    class="grid w-full gap-8 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:gap-12">

                                    {{-- Text Content --}}
                                    <div class="order-2 max-w-[580px] text-slate-950 lg:order-1">

                                        @if ($banner->badge)
                                            <div
                                                class="inline-flex items-center gap-3 rounded-full border {{ $theme['badge'] }} px-5 py-2 text-xs font-black shadow-sm sm:text-sm">

                                                <span
                                                    class="h-2.5 w-2.5 rounded-full {{ $theme['dot'] }}">
                                                </span>

                                                {{ $banner->badge }}
                                            </div>
                                        @endif

                                        {{-- Title --}}
                                        <h1
                                            class="mt-5 text-[38px] font-black leading-[1.02] tracking-tight sm:text-[46px] lg:text-[46px] xl:text-[54px]">

                                            {{ $banner->title }}

                                            @if ($banner->highlight)
                                                <span
                                                    class="mt-2 block text-[34px] leading-[1.05] sm:text-[42px] lg:text-[42px] xl:text-[49px] {{ $theme['highlight'] }}">

                                                    {{ $banner->highlight }}
                                                </span>
                                            @endif
                                        </h1>

                                        {{-- Description --}}
                                        @if ($banner->description)
                                            <p
                                                class="mt-5 max-w-[540px] text-base leading-7 text-slate-600 sm:text-lg sm:leading-8 lg:text-[18px]">

                                                {{ $banner->description }}
                                            </p>
                                        @endif

                                        {{-- Buttons --}}
                                        <div class="mt-7 flex flex-wrap gap-4">

                                            @if ($banner->button_text)
                                                <a
                                                    href="{{ $buttonLink }}"
                                                    class="inline-flex items-center justify-center rounded-full {{ $theme['button'] }} px-7 py-3.5 text-sm font-black shadow-xl transition duration-300 hover:-translate-y-1">

                                                    {{ $banner->button_text }}
                                                </a>
                                            @endif

                                            @if ($banner->second_button_text)
                                                <a
                                                    href="{{ $secondButtonLink }}"
                                                    class="btn-white">

                                                    {{ $banner->second_button_text }}
                                                </a>
                                            @endif

                                        </div>
                                    </div>

                                    {{-- Product Image Card --}}
                                    <a
                                        href="{{ $buttonLink }}"
                                        class="banner-product-card group relative order-1 mx-auto block w-full max-w-[620px] overflow-hidden rounded-[2.4rem] border border-white bg-white/90 p-3 shadow-2xl backdrop-blur-xl ring-1 {{ $theme['ring'] }} transition duration-300 hover:-translate-y-2 lg:order-2">

                                        <div
                                            class="relative h-[270px] overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-50 via-white to-blue-50 sm:h-[360px] lg:h-[455px]">

                                            <img
                                                src="{{ $productImage }}"
                                                alt="{{ $banner->highlight ?: $banner->title }}"
                                                class="banner-product-img h-full w-full object-contain object-center p-4 sm:p-6 lg:p-7 transition duration-500 group-hover:scale-[1.03]"
                                            >

                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Previous Button --}}
            <div
                class="banner-prev absolute left-3 top-1/2 z-20 grid h-11 w-11 -translate-y-1/2 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-xl ring-1 ring-slate-100 transition hover:scale-105 md:left-6 md:h-12 md:w-12">

                ‹
            </div>

            {{-- Next Button --}}
            <div
                class="banner-next absolute right-3 top-1/2 z-20 grid h-11 w-11 -translate-y-1/2 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-xl ring-1 ring-slate-100 transition hover:scale-105 md:right-6 md:h-12 md:w-12">

                ›
            </div>

            {{-- Pagination --}}
            <div class="banner-pagination absolute z-20 !bottom-5"></div>
        </div>
    </section>
@else

    {{-- Default Banner --}}
    <section class="relative overflow-hidden home-soft-bg">

        <div class="home-blob absolute -right-20 -top-24 h-96 w-96 rounded-full bg-cyan-300"></div>
        <div class="home-blob absolute -left-28 top-40 h-96 w-96 rounded-full bg-blue-300"></div>

        <div
            class="relative z-10 mx-auto grid min-h-[650px] max-w-7xl items-center gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:px-8">

            {{-- Default Text --}}
            <div class="max-w-[580px]">

                <p
                    class="inline-flex rounded-full bg-blue-50 px-5 py-2 text-sm font-black text-blue-700">

                    Authorized Telecom Distribution • Oman & GCC
                </p>

                <h1
                    class="mt-6 text-[42px] font-black leading-[1.02] text-slate-950 sm:text-[52px] lg:text-[56px]">

                    Smart Technology

                    <span class="block text-gradient">
                        For Modern Business
                    </span>
                </h1>

                <p class="mt-6 max-w-[540px] text-lg leading-8 text-slate-600">
                    Smartphones, accessories, security products and business technology
                    solutions from trusted global brands.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a class="btn-blue" href="{{ url('/brands') }}">
                        Explore Brands
                    </a>

                    <a class="btn-white" href="{{ url('/contact-us') }}">
                        Partner Enquiry
                    </a>
                </div>
            </div>

            {{-- Default Image --}}
            <div
                class="overflow-hidden rounded-[2.4rem] border border-white bg-white/90 p-3 shadow-2xl">

                <div
                    class="h-[320px] overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-50 via-white to-blue-50 sm:h-[430px] lg:h-[480px]">

                    <img
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1400&q=80"
                        alt="GPT Group Technology"
                        class="h-full w-full object-cover object-center"
                    >
                </div>
            </div>

        </div>
    </section>
@endif

    {{-- 02. QUICK FEATURES --}}

    {{-- <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="soft-card soft-card-hover flex items-center gap-4 rounded-3xl p-5">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 font-black text-white">01</div>
                    <div>
                        <p class="font-black text-slate-950">Offer Banners</p>
                        <p class="text-sm text-slate-500">Upcoming schemes and dealer campaigns.</p>
                    </div>
                </div>

                <div class="soft-card soft-card-hover flex items-center gap-4 rounded-3xl p-5">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 font-black text-white">02</div>
                    <div>
                        <p class="font-black text-slate-950">New Launches</p>
                        <p class="text-sm text-slate-500">Latest mobiles, tablets and accessories.</p>
                    </div>
                </div>

                <div class="soft-card soft-card-hover flex items-center gap-4 rounded-3xl p-5">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-slate-950 font-black text-white">03</div>
                    <div>
                        <p class="font-black text-slate-950">Partner Support</p>
                        <p class="text-sm text-slate-500">Retail, wholesale and B2B supply.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- 03. STATS --}}
    <section class="section-muted py-14 lg:py-18">
        @include('front.sections.quick_facts', ['pageSlug' => 'home'])
        {{-- <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="soft-card soft-card-hover rounded-[28px] p-6">
                    <p class="text-gradient text-4xl font-black">20+</p>
                    <p class="mt-2 font-semibold text-slate-600">Years leadership</p>
                </div>
                <div class="soft-card soft-card-hover rounded-[28px] p-6">
                    <p class="text-gradient text-4xl font-black">2016</p>
                    <p class="mt-2 font-semibold text-slate-600">GPT founded</p>
                </div>
                <div class="soft-card soft-card-hover rounded-[28px] p-6">
                    <p class="text-gradient text-4xl font-black">300+</p>
                    <p class="mt-2 font-semibold text-slate-600">Phones & devices</p>
                </div>
                <div class="soft-card soft-card-hover rounded-[28px] p-6">
                    <p class="text-gradient text-4xl font-black">GCC</p>
                    <p class="mt-2 font-semibold text-slate-600">Oman, UAE, Kuwait</p>
                </div>
            </div>
        </div> --}}
    </section>

    {{-- 04. COMPANY OVERVIEW --}}

    @if ($companyOverview)
        <section class="section-soft py-16 lg:py-24">
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
                <div>
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">
                        {{ $companyOverview->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 md:text-6xl">
                        {{ $companyOverview->title }}
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        {{ $companyOverview->description }}
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        @if ($companyOverview->card_1_title || $companyOverview->card_1_description)
                            <div class="soft-card rounded-3xl p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $companyOverview->card_1_title }}
                                </h3>

                                <p class="mt-2 text-slate-600">
                                    {{ $companyOverview->card_1_description }}
                                </p>
                            </div>
                        @endif

                        @if ($companyOverview->card_2_title || $companyOverview->card_2_description)
                            <div class="soft-card rounded-3xl p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $companyOverview->card_2_title }}
                                </h3>

                                <p class="mt-2 text-slate-600">
                                    {{ $companyOverview->card_2_description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    @foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $index => $imageField)
                        @php
                            $altField = $imageField . '_alt';
                        @endphp

                        @if ($companyOverview->{$imageField})
                            <img class="{{ in_array($index, [1, 3]) ? 'mt-10' : '' }} h-64 w-full rounded-[32px] object-cover shadow-xl sm:h-72"
                                src="{{ asset('storage/' . $companyOverview->{$imageField}) }}"
                                alt="{{ $companyOverview->{$altField} ?: 'Company Overview Image' }}">
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 05. PRODUCT BRANDS --}}
   @if (isset($productBrands) && $productBrands->count() > 0)
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.25em] text-blue-700">
                    Key Brands
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                    Product Brand Ecosystem
                </h2>

                <p class="mt-5 text-lg text-slate-600">
                    Explore brand-wise products, categories and latest launches.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($productBrands as $brand)
                    <a href="{{ route('brands.show', $brand->slug) }}"
                        class="soft-card soft-card-hover group block overflow-hidden rounded-[34px]">

                        <div class="h-56 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if ($brand->logo)
                                <img
                                    class="h-full w-full object-contain transition duration-500 group-hover:scale-110"
                                    src="{{ asset('storage/' . $brand->logo) }}"
                                    alt="{{ $brand->name }}"
                                >
                            @elseif($brand->banner_image)
                                <img
                                    class="h-full w-full rounded-[24px] object-cover transition duration-500 group-hover:scale-110"
                                    src="{{ asset('storage/' . $brand->banner_image) }}"
                                    alt="{{ $brand->name }}"
                                >
                            @else
                                <div class="grid h-full w-full place-items-center rounded-[24px] bg-blue-50">
                                    <span class="text-5xl font-black text-blue-700">
                                        {{ strtoupper(substr($brand->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-7">
                            <div class="flex items-center justify-between gap-4">
                                <h3 class="text-2xl font-black text-slate-950">
                                    {{ $brand->name }}
                                </h3>

                                <span
                                    class="grid h-10 w-10 place-items-center rounded-full bg-slate-100 text-xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            @if ($brand->description)
                                <p class="mt-2 line-clamp-2 text-slate-600">
                                    {{ $brand->description }}
                                </p>
                            @endif

                            <p class="mt-4 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                {{ $brand->products_count }} Products
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- View All Brands Button --}}
            <div class="mt-12 text-center">
                <a href="{{ url('/brands') }}"
                    class="inline-flex items-center justify-center gap-3 rounded-full bg-blue-700 px-8 py-4 text-sm font-black uppercase tracking-[.15em] text-white shadow-lg shadow-blue-700/20 transition duration-300 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-xl">
                    View All Brands

                    <span class="text-xl leading-none">
                        →
                    </span>
                </a>
            </div>

        </div>
    </section>
@endif

    {{-- 06. PRODUCT CATEGORIES --}}
    @if (isset($productCategories) && $productCategories->count() > 0)
        <section class="section-muted py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Categories</p>
                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">Product Ecosystem</h2>
                    <p class="mt-5 text-lg leading-8 text-slate-600">GPT Group ke product categories ko clean and premium
                        way me show karein.</p>
                </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($productCategories as $category)
                        @if ($category->brand)
                            <a href="{{ route('brands.categories.show', [$category->brand->slug, $category->slug]) }}"
                                class="soft-card soft-card-hover group block rounded-[2rem] p-5">
                            @else
                                <div class="soft-card soft-card-hover group rounded-[2rem] p-5">
                        @endif

                        @if ($category->image)
                            <img class="h-52 w-full rounded-[1.5rem] object-cover transition duration-500 group-hover:scale-105"
                                src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                        @else
                            <div class="grid h-52 w-full place-items-center rounded-[1.5rem] bg-blue-50 text-slate-400">No
                                Image</div>
                        @endif

                        <div class="mt-6 flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-2xl font-black text-slate-950">{{ $category->name }}</h3>
                                @if ($category->brand)
                                    <p class="mt-1 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                        {{ $category->brand->name }}</p>
                                @endif
                            </div>
                            <span
                                class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-blue-600 text-xl text-white transition group-hover:bg-cyan-500">→</span>
                        </div>

                        @if ($category->description)
                            <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">{{ $category->description }}</p>
                        @endif

                        <p class="mt-4 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                            {{ $category->products_count }} Products</p>

                        @if ($category->brand)
                            </a>
                        @else
                </div>
    @endif
    @endforeach
    </div>
    </div>
    </section>
    @endif

    {{-- 07. LATEST PRODUCTS --}}
    @if (isset($latestProducts) && $latestProducts->count() > 0)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">New Launches</p>
                        <h2 class="mt-3 text-4xl font-black tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">Latest
                            Products</h2>
                        <p class="mt-4 max-w-2xl text-lg leading-8 text-slate-600">Smartphones, tablets, watches and
                            accessories ko premium product cards me showcase karein.</p>
                    </div>

                    <div class="flex gap-3">
                        <div
                            class="product-prev grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-lg ring-1 ring-slate-100">
                            ‹</div>
                        <div
                            class="product-next grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-lg ring-1 ring-slate-100">
                            ›</div>
                    </div>
                </div>

                <div class="swiper productSwiper mt-12">
                    <div class="swiper-wrapper pb-14">
                        @foreach ($latestProducts as $product)
                            <div class="swiper-slide">
                                <a href="{{ route('product.detail', $product->slug) }}"
                                    class="soft-card soft-card-hover group block overflow-hidden rounded-[2rem]">
                                    <div class="relative h-80 bg-gradient-to-br from-white to-blue-50 p-7">
                                        @if ($product->badge)
                                            <span
                                                class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">{{ $product->badge }}</span>
                                        @endif

                                        @if ($product->brand)
                                            <span
                                                class="absolute right-5 top-5 rounded-full bg-white px-4 py-2 text-xs font-black text-blue-700 shadow">{{ $product->brand->name }}</span>
                                        @endif

                                        @if ($product->image)
                                            <img class="h-full w-full object-contain transition duration-300 group-hover:scale-105"
                                                src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <div
                                                class="grid h-full w-full place-items-center rounded-[1.5rem] bg-white text-slate-400">
                                                No Image</div>
                                        @endif
                                    </div>

                                    <div class="p-6">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <h3 class="text-2xl font-black text-slate-950">{{ $product->name }}</h3>
                                                @if ($product->short_description)
                                                    <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-500">
                                                        {{ $product->short_description }}</p>
                                                @endif
                                            </div>
                                            <span
                                                class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">→</span>
                                        </div>

                                        @if (is_array($product->tags) && count($product->tags))
                                            <div class="mt-5 flex flex-wrap gap-2">
                                                @foreach ($product->tags as $tag)
                                                    <span
                                                        class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="product-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    {{-- 08. UPCOMING PRODUCTS --}}
    @if (isset($upcomingProducts) && $upcomingProducts->count() > 0)
        <section class="section-muted py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-12">
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Coming Soon</p>
                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">Upcoming Products</h2>
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">New product launches and upcoming devices
                        for dealers and partners.</p>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($upcomingProducts as $product)
                        <a href="{{ route('product.detail', $product->slug) }}"
                            class="soft-card soft-card-hover group overflow-hidden rounded-[2rem]">
                            <div class="relative h-72 bg-gradient-to-br from-white to-cyan-50 p-6">
                                <span
                                    class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">Upcoming</span>

                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="h-full w-full object-contain transition duration-500 group-hover:scale-110">
                                @else
                                    <div class="grid h-full w-full place-items-center rounded-2xl bg-white text-slate-400">
                                        No Image</div>
                                @endif
                            </div>

                            <div class="p-6">
                                <h3 class="text-2xl font-black text-slate-950">{{ $product->name }}</h3>

                                @if ($product->launch_date)
                                    <p class="mt-2 text-sm font-bold text-blue-700">Launch:
                                        {{ $product->launch_date->format('d M Y') }}</p>
                                @endif

                                @if ($product->short_description)
                                    <p class="mt-3 line-clamp-2 text-sm leading-6 text-slate-500">
                                        {{ $product->short_description }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 09. WHAT WE DO --}}
    @if (isset($whatWeDoSection) && $whatWeDoSection)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="order-1 lg:order-2">
                        @if ($whatWeDoSection->image)
                            <img class="h-[360px] w-full rounded-[2rem] object-cover shadow-2xl sm:h-[460px] lg:h-[560px] lg:rounded-[2.5rem]"
                                src="{{ asset('storage/' . $whatWeDoSection->image) }}"
                                alt="{{ $whatWeDoSection->title }}">
                        @else
                            <img class="h-[360px] w-full rounded-[2rem] object-cover shadow-2xl sm:h-[460px] lg:h-[560px] lg:rounded-[2.5rem]"
                                src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $whatWeDoSection->title }}">
                        @endif

                        @if ($whatWeDoSection->overlay_title || $whatWeDoSection->overlay_text)
                            <div class="soft-card relative -mt-20 mx-6 rounded-[2rem] p-7">
                                @if ($whatWeDoSection->overlay_title)
                                    <p class="text-3xl font-black text-slate-950">{{ $whatWeDoSection->overlay_title }}
                                    </p>
                                @endif
                                @if ($whatWeDoSection->overlay_text)
                                    <p class="mt-2 text-slate-600">{{ $whatWeDoSection->overlay_text }}</p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="order-2 lg:order-1">
                        @if ($whatWeDoSection->label)
                            <p class="font-black uppercase tracking-[.3em] text-blue-700">{{ $whatWeDoSection->label }}
                            </p>
                        @endif

                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $whatWeDoSection->title }}</h2>

                        @if ($whatWeDoSection->description)
                            <p class="mt-6 text-lg leading-8 text-slate-600">{{ $whatWeDoSection->description }}</p>
                        @endif

                        <div class="mt-8 grid gap-5 sm:grid-cols-2">
                            @foreach ([1, 2, 3, 4] as $i)
                                @php
                                    $cardTitle = $whatWeDoSection->{'card_' . $i . '_title'} ?? null;
                                    $cardDesc = $whatWeDoSection->{'card_' . $i . '_description'} ?? null;
                                @endphp

                                @if ($cardTitle || $cardDesc)
                                    <div class="soft-card soft-card-hover rounded-[1.75rem] p-6">
                                        @if ($cardTitle)
                                            <h3 class="text-xl font-black text-slate-950">{{ $cardTitle }}</h3>
                                        @endif
                                        @if ($cardDesc)
                                            <p class="mt-2 text-sm leading-6 text-slate-500">{{ $cardDesc }}</p>
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

    {{-- 10. SERVICES --}}
    
    @if($serviceSection && $serviceSection->activeItems->count())

    <section class="section-muted py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $serviceSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $serviceSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $serviceSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach($serviceSection->activeItems as $item)
                    <a href="{{ $item->button_link ?: '#' }}"
                       class="soft-card soft-card-hover group overflow-hidden rounded-[2.5rem]">
                        @if($item->image)
                            <img class="h-72 w-full object-cover transition duration-700 group-hover:scale-105"
                                 src="{{ asset('storage/' . $item->image) }}"
                                 alt="{{ $item->image_alt ?: $item->title }}">
                        @endif

                        <div class="p-8">
                            <p class="font-black uppercase tracking-[.25em] {{ $item->accent_color === 'cyan' ? 'text-cyan-600' : 'text-blue-700' }}">
                                {{ $item->label }}
                            </p>

                            <h3 class="mt-4 text-3xl font-black text-slate-950">
                                {{ $item->title }}
                            </h3>

                            <p class="mt-3 leading-7 text-slate-600">
                                {{ $item->description }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

    {{-- 11. NETWORK --}}

    @if ($networkSection)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $networkSection->label }}
                        </p>

                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $networkSection->title }}
                        </h2>

                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $networkSection->description }}
                        </p>

                        <div class="mt-8 grid gap-5 sm:grid-cols-2">
                            @if ($networkSection->card_1_title || $networkSection->card_1_description)
                                <div class="soft-card rounded-[1.75rem] p-6">
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $networkSection->card_1_title }}
                                    </h3>

                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $networkSection->card_1_description }}
                                    </p>
                                </div>
                            @endif

                            @if ($networkSection->card_2_title || $networkSection->card_2_description)
                                <div class="soft-card rounded-[1.75rem] p-6">
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $networkSection->card_2_title }}
                                    </h3>

                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $networkSection->card_2_description }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        @if ($networkSection->button_text)
                            <a href="{{ $networkSection->button_link ?: '#' }}" class="btn-blue mt-8">
                                {{ $networkSection->button_text }}
                            </a>
                        @endif
                    </div>

                    <div class="relative">
                        @if ($networkSection->image)
                            <img class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                                src="{{ asset('storage/' . $networkSection->image) }}"
                                alt="{{ $networkSection->image_alt ?: 'GPT Network' }}">
                        @endif

                        @if ($networkSection->overlay_title || $networkSection->overlay_description)
                            <div class="soft-card absolute -bottom-8 left-6 right-6 rounded-[2rem] p-7">
                                <p class="text-3xl font-black text-slate-950">
                                    {{ $networkSection->overlay_title }}
                                </p>

                                <p class="mt-2 text-slate-600">
                                    {{ $networkSection->overlay_description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif



    {{-- 13. STRATEGY --}}

    @if($strategySection)
  
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.25em] text-blue-700">
                    {{ $strategySection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                    {{ $strategySection->title }}
                </h2>

                <p class="mt-5 text-lg text-slate-600">
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

                    @if($strategySection->{$numberField} || $strategySection->{$titleField} || $strategySection->{$descriptionField})
                        <div class="soft-card soft-card-hover rounded-[34px] p-8">
                            <span class="text-gradient text-4xl font-black">
                                {{ $strategySection->{$numberField} }}
                            </span>

                            <h3 class="mt-5 text-2xl font-black text-slate-950">
                                {{ $strategySection->{$titleField} }}
                            </h3>

                            <p class="mt-3 text-slate-600">
                                {{ $strategySection->{$descriptionField} }}
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

    {{-- 14. RETAIL OUTLETS --}}

    @if ($retailOutletSection)
        <section class="section-muted overflow-hidden py-16 lg:py-24">
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
                <div>
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">
                        {{ $retailOutletSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                        {{ $retailOutletSection->title }}
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        {{ $retailOutletSection->description }}
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $titleField = 'card_' . $i . '_title';
                                $descriptionField = 'card_' . $i . '_description';
                            @endphp

                            @if ($retailOutletSection->{$titleField} || $retailOutletSection->{$descriptionField})
                                <div class="soft-card rounded-3xl p-6">
                                    <h3 class="font-black text-slate-950">
                                        {{ $retailOutletSection->{$titleField} }}
                                    </h3>

                                    <p class="mt-2 text-slate-600">
                                        {{ $retailOutletSection->{$descriptionField} }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @if ($retailOutletSection->button_text)
                        <a class="btn-blue mt-8" href="{{ $retailOutletSection->button_link ?: '#' }}">
                            {{ $retailOutletSection->button_text }}
                        </a>
                    @endif
                </div>

                <div class="grid grid-cols-2 gap-5">
                    @foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $index => $imageField)
                        @php
                            $altField = $imageField . '_alt';
                        @endphp

                        @if ($retailOutletSection->{$imageField})
                            <img class="{{ in_array($index, [1, 3]) ? 'mt-10' : '' }} h-64 w-full rounded-[32px] object-cover shadow-xl sm:h-72"
                                src="{{ asset('storage/' . $retailOutletSection->{$imageField}) }}"
                                alt="{{ $retailOutletSection->{$altField} ?: 'Retail Outlet Image' }}">
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    {{-- 15. FOUNDER --}}
    @if (isset($founderSection) && $founderSection)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="order-1 lg:order-2">
                        @if ($founderSection->image)
                            <img class="h-[360px] w-full rounded-[32px] object-cover shadow-2xl sm:h-[460px] lg:h-[560px] lg:rounded-[44px]"
                                src="{{ asset('storage/' . $founderSection->image) }}"
                                alt="{{ $founderSection->title }}">
                        @else
                            <img class="h-[360px] w-full rounded-[32px] object-cover shadow-2xl sm:h-[460px] lg:h-[560px] lg:rounded-[44px]"
                                src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}" alt="{{ $founderSection->title }}">
                        @endif
                    </div>

                    <div class="order-2 lg:order-1">
                        @if ($founderSection->label)
                            <p class="font-black uppercase tracking-[.25em] text-blue-700">{{ $founderSection->label }}
                            </p>
                        @endif

                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 md:text-5xl lg:text-6xl">
                            {{ $founderSection->title }}</h2>

                        @if ($founderSection->description)
                            <p class="mt-6 text-lg leading-8 text-slate-600">{{ $founderSection->description }}</p>
                        @endif

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            @foreach ([1, 2, 3] as $i)
                                @php
                                    $statValue = $founderSection->{'stat_' . $i . '_value'} ?? null;
                                    $statLabel = $founderSection->{'stat_' . $i . '_label'} ?? null;
                                @endphp

                                @if ($statValue || $statLabel)
                                    <div class="soft-card rounded-3xl p-5">
                                        <p class="text-gradient text-3xl font-black">{{ $statValue }}</p>
                                        <p class="font-semibold text-slate-600">{{ $statLabel }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @if ($founderSection->button_text)
                            <a href="{{ $founderSection->button_link ?: '#' }}" class="btn-blue mt-8">
                                {{ $founderSection->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- 16. PARTNER LOGOS --}}

   @if($partnerLogoSection && $partnerLogoSection->activeLogos->count())
    <section class="section-muted py-16 lg:py-24 overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">
                        {{ $partnerLogoSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                        {{ $partnerLogoSection->title }}
                    </h2>
                </div>

                @if($partnerLogoSection->description)
                    <p class="max-w-xl text-lg text-slate-600">
                        {{ $partnerLogoSection->description }}
                    </p>
                @endif
            </div>

            <div class="logo-marquee mt-10">
                <div class="logo-marquee-track">
                    @foreach($partnerLogoSection->activeLogos->concat($partnerLogoSection->activeLogos) as $logo)
                        <div class="logo-marquee-item soft-card soft-card-hover rounded-3xl p-6 text-center font-black text-slate-700">
                            @if($logo->logo)
                                <img src="{{ asset('storage/' . $logo->logo) }}"
                                     class="mx-auto h-14 w-full object-contain"
                                     alt="{{ $logo->name }}">
                            @else
                                {{ $logo->name }}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

    {{-- 17. TESTIMONIALS --}}
   
    @if($testimonialSection && $testimonialSection->activeTestimonials->count())
  
    <section class="bg-white py-16 lg:py-24 overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.25em] text-blue-700">
                    {{ $testimonialSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                    {{ $testimonialSection->title }}
                </h2>

                @if($testimonialSection->description)
                    <p class="mt-4 text-lg text-slate-600">
                        {{ $testimonialSection->description }}
                    </p>
                @endif
            </div>

            <div class="testimonial-marquee mt-12">
                <div class="testimonial-marquee-track">
                    @foreach($testimonialSection->activeTestimonials->concat($testimonialSection->activeTestimonials) as $testimonial)
                        <div class="testimonial-marquee-item soft-card soft-card-hover rounded-[34px] p-8">
                            <p class="text-xl leading-8 text-slate-700">
                                “{{ $testimonial->message }}”
                            </p>

                            <div class="mt-6 flex items-center gap-3">
                                @if($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                         class="h-12 w-12 rounded-full object-cover"
                                         alt="{{ $testimonial->name }}">
                                @else
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-sm font-black text-blue-700">
                                        {{ strtoupper(substr($testimonial->name ?? 'P', 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <p class="font-black text-slate-950">
                                        {{ $testimonial->name }}
                                    </p>

                                    <p class="text-slate-500">
                                        {{ $testimonial->location }}
                                    </p>
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

   @if($faqSection)
    <section class="section-muted py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="font-black uppercase tracking-[.25em] text-blue-700">
                    {{ $faqSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                    {{ $faqSection->title }}
                </h2>

                <p class="mt-5 text-lg text-slate-600">
                    {{ $faqSection->description }}
                </p>

                @if($faqSection->button_text)
                    <a class="btn-blue mt-8" href="{{ $faqSection->button_link ?: '#' }}">
                        {{ $faqSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="grid gap-4">
                @foreach($faqSection->activeItems as $faq)
                    <details class="soft-card rounded-3xl p-6" {{ $faq->is_open ? 'open' : '' }}>
                        <summary class="cursor-pointer font-black text-slate-950">
                            {{ $faq->question }}
                        </summary>

                        <p class="mt-3 text-slate-600">
                            {{ $faq->answer }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
@endif



    {{-- 19. CTA + ENQUIRY --}}

    <section class="overflow-hidden bg-white py-12 sm:py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-stretch gap-6 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">
            <div
                class="rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:rounded-[2.75rem] sm:p-8 md:p-10 lg:p-14">
                <p class="text-xs font-black uppercase tracking-[.20em] text-blue-100 sm:text-sm sm:tracking-[.25em]">Call
                    To Action</p>
                <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl md:text-5xl lg:text-6xl">Ready to build your
                    distribution advantage?</h2>
                <p class="mt-4 text-base leading-7 text-blue-50 sm:mt-5 sm:text-lg sm:leading-8">Connect with GPT Group for
                    brand partnership, product distribution, retail outlet support, B2B enquiries and market expansion.</p>

                <div class="mt-7 grid gap-3 sm:mt-8 sm:flex sm:gap-4">
                    <a class="inline-flex justify-center rounded-full bg-white px-6 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                        href="{{ url('/contact-us') }}">Partner Enquiry</a>
                    <a class="inline-flex justify-center rounded-full bg-slate-950 px-6 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                        href="{{ url('/brands') }}">Explore Products</a>
                </div>
            </div>

            <div class="soft-card min-w-0 rounded-[2rem] p-6 sm:rounded-[2.75rem] sm:p-8 md:p-10 lg:p-14">
                <p class="text-xs font-black uppercase tracking-[.20em] text-blue-700 sm:text-sm sm:tracking-[.25em]">
                    Enquiry</p>
                <h3 class="mt-4 text-2xl font-black leading-tight text-slate-950 sm:text-3xl lg:text-4xl">Quick Contact
                    Form</h3>

                <form action="#" method="POST" class="mt-6 grid gap-3 sm:mt-7 sm:gap-4">
                    @csrf

                    <input type="text" name="name"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500 sm:px-5 sm:py-4 sm:text-base"
                        placeholder="Full Name">

                    <input type="text" name="company"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500 sm:px-5 sm:py-4 sm:text-base"
                        placeholder="Company / Brand Name">

                    <input type="text" name="contact"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500 sm:px-5 sm:py-4 sm:text-base"
                        placeholder="Phone / Email">

                    <select name="enquiry_type"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-700 outline-none focus:border-blue-500 sm:px-5 sm:py-4 sm:text-base">
                        <option>Distribution Partnership</option>
                        <option>Retail Outlet</option>
                        <option>B2B Supply</option>
                        <option>Career</option>
                    </select>

                    <textarea name="message"
                        class="h-28 w-full resize-none rounded-2xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-950 outline-none placeholder:text-slate-400 focus:border-blue-500 sm:px-5 sm:py-4 sm:text-base"
                        placeholder="Message"></textarea>

                    <button type="submit" class="btn-blue mt-1 w-full">
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{-- SWIPER --}}
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

    <style>
    .logo-marquee,
    .testimonial-marquee {
        width: 100%;
        overflow: hidden;
        position: relative;
    }

    .logo-marquee-track {
        display: flex;
        width: max-content;
        gap: 1rem;
        animation: logoMarquee 35s linear infinite;
    }

    .logo-marquee:hover .logo-marquee-track {
        animation-play-state: paused;
    }

    .logo-marquee-item {
        flex: 0 0 180px;
        min-height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes logoMarquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .testimonial-marquee-track {
        display: flex;
        width: max-content;
        gap: 1.5rem;
        animation: testimonialMarquee 45s linear infinite;
    }

    .testimonial-marquee:hover .testimonial-marquee-track {
        animation-play-state: paused;
    }

    .testimonial-marquee-item {
        flex: 0 0 390px;
        max-width: 390px;
        min-height: 280px;
    }

    @keyframes testimonialMarquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    @media (max-width: 640px) {
        .logo-marquee-item {
            flex-basis: 150px;
        }

        .testimonial-marquee-item {
            flex-basis: 310px;
            max-width: 310px;
        }
    }
</style>
@endsection
