@extends('front_pages.front_components.main')

@section('content')
    <style>
        .bannerSwiper .swiper-pagination-bullet,
        .productSwiper .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, .75);
            opacity: 1;
        }

        .bannerSwiper .swiper-pagination-bullet-active,
        .productSwiper .swiper-pagination-bullet-active {
            width: 34px;
            border-radius: 999px;
            background: #22d3ee;
        }

        .productSwiper .swiper-pagination-bullet {
            background: #cbd5e1;
        }

        .productSwiper .swiper-pagination-bullet-active {
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
            transform: scale(1.08);
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

        @media (max-width: 767px) {
            .banner-prev,
            .banner-next {
                display: none !important;
            }
        }
    </style>

    @php
    

        $products = [
            [
                'tag' => '5G',
                'name' => 'Premium Smartphones',
                'desc' => 'Latest 4G and 5G mobile range for retail and B2B supply.',
                'img' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=900&q=85',
                'labels' => ['5G', 'Retail', 'B2B'],
                'color' => 'bg-blue-600',
            ],
            [
                'tag' => 'Tablet',
                'name' => 'Business Tablets',
                'desc' => 'Tablets for education, office, business and entertainment use.',
                'img' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=85',
                'labels' => ['Business', 'Education'],
                'color' => 'bg-cyan-500',
            ],
            [
                'tag' => 'Watch',
                'name' => 'Smart Watches',
                'desc' => 'Modern wearable products for lifestyle and daily usage.',
                'img' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=85',
                'labels' => ['Wearable', 'Bluetooth'],
                'color' => 'bg-emerald-500',
            ],
            [
                'tag' => 'Audio',
                'name' => 'Earphones & Headphones',
                'desc' => 'Fast moving audio accessories for every mobile store.',
                'img' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=85',
                'labels' => ['Audio', 'Accessories'],
                'color' => 'bg-slate-950',
            ],
            [
                'tag' => 'Power',
                'name' => 'Chargers & Cables',
                'desc' => 'Essential mobile accessories with high retail demand.',
                'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4c59eaa6?auto=format&fit=crop&w=900&q=85',
                'labels' => ['Charger', 'Cable'],
                'color' => 'bg-orange-500',
            ],
        ];

       
    @endphp

@php
    $bannerThemeClasses = function ($theme) {
        return match ($theme) {
            'yellow' => [
                'badge' => 'bg-yellow-300 text-slate-950',
                'highlight' => 'text-yellow-300',
                'button' => 'bg-yellow-300 text-slate-950',
                'dot' => 'bg-yellow-300',
                'ring' => 'ring-yellow-300/30',
            ],
            'emerald' => [
                'badge' => 'bg-emerald-300 text-slate-950',
                'highlight' => 'text-emerald-300',
                'button' => 'bg-emerald-300 text-slate-950',
                'dot' => 'bg-emerald-300',
                'ring' => 'ring-emerald-300/30',
            ],
            default => [
                'badge' => 'bg-cyan-300 text-slate-950',
                'highlight' => 'text-cyan-300',
                'button' => 'bg-cyan-300 text-slate-950',
                'dot' => 'bg-cyan-300',
                'ring' => 'ring-cyan-300/30',
            ],
        };
    };
@endphp

@if($banners->count() > 0)
    {{-- PREMIUM BANNER SLIDER --}}
    <section class="relative overflow-hidden bg-slate-950">
        <div class="swiper bannerSwiper">
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
                        <div class="relative min-h-[760px] overflow-hidden sm:min-h-[820px] lg:min-h-[640px] xl:min-h-[680px]">

                            {{-- Background Image --}}
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ $mobileImage }}">
                                <img
                                    src="{{ $desktopImage }}"
                                    alt="{{ $banner->title }}"
                                    class="banner-bg absolute inset-0 h-full w-full object-cover"
                                >
                            </picture>

                            {{-- Overlay --}}
                            <div class="absolute inset-0 bg-slate-950/70"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/85 to-slate-950/35"></div>
                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_18%_18%,rgba(34,211,238,.18),transparent_34%),radial-gradient(circle_at_82%_38%,rgba(59,130,246,.14),transparent_35%)]"></div>

                            <div class="relative z-10 mx-auto flex min-h-[760px] max-w-7xl items-center px-4 py-10 sm:min-h-[820px] sm:px-6 lg:min-h-[640px] lg:px-8 xl:min-h-[680px]">
                                <div class="grid w-full gap-7 lg:grid-cols-[.95fr_1.05fr] lg:items-center">

                                    {{-- Mobile Top / Desktop Right Product Image --}}
                                    <a href="{{ $buttonLink }}"
                                        class="banner-product-card order-1 group relative mx-auto w-full max-w-[640px] overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-3 shadow-2xl backdrop-blur-xl ring-1 {{ $theme['ring'] }} transition hover:-translate-y-2 lg:order-2 lg:max-w-none">

                                        <div class="relative h-[260px] overflow-hidden rounded-[1.6rem] bg-white sm:h-[380px] lg:h-[450px] xl:h-[500px]">
                                            <img
                                                src="{{ $productImage }}"
                                                alt="{{ $banner->highlight ?: $banner->title }}"
                                                class="banner-product-img h-full w-full object-cover object-center"
                                            >
                                        </div>
                                    </a>

                                    {{-- Mobile Bottom / Desktop Left Content --}}
                                    <div class="order-2 max-w-xl text-white lg:order-1">
                                        @if($banner->badge)
                                            <div class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-black backdrop-blur sm:text-sm">
                                                <span class="h-2.5 w-2.5 rounded-full {{ $theme['dot'] }}"></span>
                                                {{ $banner->badge }}
                                            </div>
                                        @endif

                                        <h1 class="mt-5 text-3xl font-black leading-[1.08] tracking-tight sm:text-4xl lg:text-5xl xl:text-6xl">
                                            {{ $banner->title }}

                                            @if($banner->highlight)
                                                <span class="mt-2 block {{ $theme['highlight'] }}">
                                                    {{ $banner->highlight }}
                                                </span>
                                            @endif
                                        </h1>

                                        @if($banner->description)
                                            <p class="mt-5 max-w-lg text-sm leading-7 text-slate-200 sm:text-base lg:text-lg">
                                                {{ $banner->description }}
                                            </p>
                                        @endif

                                        <div class="mt-7 flex flex-wrap gap-4">
                                            @if($banner->button_text)
                                                <a href="{{ $buttonLink }}"
                                                    class="inline-flex items-center justify-center rounded-full {{ $theme['button'] }} px-6 py-3.5 text-sm font-black shadow-xl transition hover:-translate-y-1">
                                                    {{ $banner->button_text }}
                                                </a>
                                            @endif

                                            @if($banner->second_button_text)
                                                <a href="{{ $secondButtonLink }}"
                                                    class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/10 px-6 py-3.5 text-sm font-black text-white shadow-xl backdrop-blur transition hover:-translate-y-1 hover:bg-white/20">
                                                    {{ $banner->second_button_text }}
                                                </a>
                                            @endif
                                        </div>

                                        <div class="mt-8 grid max-w-lg grid-cols-3 gap-3">
                                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                                                <p class="text-xl font-black sm:text-2xl">2016</p>
                                                <p class="mt-1 text-xs text-slate-300">Founded</p>
                                            </div>

                                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                                                <p class="text-xl font-black sm:text-2xl">GCC</p>
                                                <p class="mt-1 text-xs text-slate-300">Market</p>
                                            </div>

                                            <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                                                <p class="text-xl font-black sm:text-2xl">B2B</p>
                                                <p class="mt-1 text-xs text-slate-300">Supply</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Arrows --}}
            <div class="banner-prev absolute left-4 top-1/2 z-20 grid h-11 w-11 -translate-y-1/2 cursor-pointer place-items-center rounded-full bg-white/90 text-2xl text-slate-950 shadow-xl md:left-6 md:h-12 md:w-12">
                ‹
            </div>

            <div class="banner-next absolute right-4 top-1/2 z-20 grid h-11 w-11 -translate-y-1/2 cursor-pointer place-items-center rounded-full bg-white/90 text-2xl text-slate-950 shadow-xl md:right-6 md:h-12 md:w-12">
                ›
            </div>

            <div class="banner-pagination absolute z-20 !bottom-6"></div>
        </div>
    </section>
@endif

    {{-- QUICK FEATURES --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="flex items-center gap-4 rounded-3xl border border-slate-100 bg-slate-50 p-5">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 font-black text-white">01</div>
                    <div>
                        <p class="font-black text-slate-950">Offer Banners</p>
                        <p class="text-sm text-slate-500">Upcoming schemes and dealer campaigns.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 rounded-3xl border border-slate-100 bg-slate-50 p-5">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 font-black text-white">02</div>
                    <div>
                        <p class="font-black text-slate-950">New Launches</p>
                        <p class="text-sm text-slate-500">Latest mobiles, tablets and accessories.</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 rounded-3xl border border-slate-100 bg-slate-50 p-5">
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-slate-950 font-black text-white">03</div>
                    <div>
                        <p class="font-black text-slate-950">Partner Support</p>
                        <p class="text-sm text-slate-500">Retail, wholesale and B2B supply.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LATEST PRODUCTS --}}
    <section class="bg-slate-100 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">New Launches</p>
                    <h2 class="mt-3 text-4xl font-black tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        Latest Products
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg leading-8 text-slate-600">
                        Smartphones, tablets, watches and accessories ko premium product cards me showcase karein.
                    </p>
                </div>

                <div class="flex gap-3">
                    <div class="product-prev grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-lg">
                        ‹
                    </div>
                    <div class="product-next grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-lg">
                        ›
                    </div>
                </div>
            </div>

            <div class="swiper productSwiper mt-12">
                <div class="swiper-wrapper pb-14">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <a href="{{ url('/brands') }}"
                                class="group block overflow-hidden rounded-[2rem] bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">

                                <div class="relative h-80 bg-gradient-to-br from-white to-slate-100 p-7">
                                    <span class="absolute left-5 top-5 rounded-full {{ $product['color'] }} px-4 py-2 text-xs font-black text-white">
                                        {{ $product['tag'] }}
                                    </span>

                                    <img
                                        class="h-full w-full object-contain transition duration-300 group-hover:scale-105"
                                        src="{{ $product['img'] }}"
                                        alt="{{ $product['name'] }}"
                                    >
                                </div>

                                <div class="p-6">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <h3 class="text-2xl font-black text-slate-950">{{ $product['name'] }}</h3>
                                            <p class="mt-2 text-sm leading-6 text-slate-500">{{ $product['desc'] }}</p>
                                        </div>

                                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                            →
                                        </span>
                                    </div>

                                    <div class="mt-5 flex flex-wrap gap-2">
                                        @foreach ($product['labels'] as $label)
                                            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                                                {{ $label }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="product-pagination"></div>
            </div>
        </div>
    </section>

    {{-- OFFER + CAMPAIGN --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-10 text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Campaigns & Offers</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Dealer Offers & Brand Launch Support
                </h2>
                <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-slate-600">
                    GPT Group partners ke liye premium product campaigns, dealer schemes, retail visibility aur B2B supply support.
                </p>
            </div>

            <div class="grid items-stretch gap-8 lg:grid-cols-2">

                <div class="group relative min-h-[520px] overflow-hidden rounded-[2.5rem] shadow-2xl">
                    <img
                        src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1400&q=85"
                        alt="Dealer Schemes"
                        class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-110"
                    >

                    <div class="absolute inset-0 bg-gradient-to-br from-blue-950/90 via-blue-800/75 to-cyan-500/60"></div>

                    <div class="relative z-10 flex h-full min-h-[520px] flex-col justify-between p-7 text-white sm:p-10">
                        <div>
                            <div class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/15 px-5 py-2 text-sm font-black backdrop-blur">
                                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                                Special Dealer Offer
                            </div>

                            <h2 class="mt-7 text-4xl font-black leading-tight sm:text-5xl">
                                Dealer Schemes &
                                <span class="block text-cyan-300">Product Campaigns</span>
                            </h2>

                            <p class="mt-5 max-w-xl text-lg leading-8 text-blue-50">
                                Monthly dealer scheme, festival campaign, new launch promotion aur bulk order support ko yaha highlight kar sakte hain.
                            </p>
                        </div>

                        <div>
                            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                                <div class="rounded-[1.5rem] border border-white/15 bg-white/15 p-5 backdrop-blur">
                                    <p class="text-3xl font-black">GCC</p>
                                    <p class="mt-1 text-sm text-blue-50">Market Reach</p>
                                </div>

                                <div class="rounded-[1.5rem] border border-white/15 bg-white/15 p-5 backdrop-blur">
                                    <p class="text-3xl font-black">5G</p>
                                    <p class="mt-1 text-sm text-blue-50">Devices</p>
                                </div>

                                <div class="rounded-[1.5rem] border border-white/15 bg-white/15 p-5 backdrop-blur">
                                    <p class="text-3xl font-black">B2B</p>
                                    <p class="mt-1 text-sm text-blue-50">Supply</p>
                                </div>
                            </div>

                            <a href="{{ url('/contact-us') }}"
                                class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                                Enquire Now →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative min-h-[520px] overflow-hidden rounded-[2.5rem] shadow-2xl">
                    <img
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1400&q=85"
                        alt="Brand Campaign"
                        class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-110"
                    >

                    <div class="absolute inset-0 bg-gradient-to-br from-slate-950/95 via-slate-900/85 to-slate-950/55"></div>

                    <div class="relative z-10 flex h-full min-h-[520px] flex-col justify-between p-7 text-white sm:p-10">
                        <div>
                            <div class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/15 px-5 py-2 text-sm font-black backdrop-blur">
                                <span class="h-2.5 w-2.5 rounded-full bg-yellow-300"></span>
                                Brand Campaign
                            </div>

                            <h2 class="mt-7 text-4xl font-black leading-tight sm:text-5xl">
                                Launch Your Product
                                <span class="block text-yellow-300">With GPT Group</span>
                            </h2>

                            <p class="mt-5 max-w-xl text-lg leading-8 text-slate-200">
                                Product launch, channel distribution, retail visibility, dealer activation aur partner support ke liye premium placement.
                            </p>
                        </div>

                        <div>
                            <div class="mt-8 grid grid-cols-2 gap-4">
                                <div class="rounded-[1.5rem] border border-white/15 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-2xl font-black">Retail</p>
                                    <p class="mt-2 text-sm text-slate-300">Store visibility</p>
                                </div>

                                <div class="rounded-[1.5rem] border border-white/15 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-2xl font-black">Dealer</p>
                                    <p class="mt-2 text-sm text-slate-300">Channel support</p>
                                </div>

                                <div class="rounded-[1.5rem] border border-white/15 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-2xl font-black">B2B</p>
                                    <p class="mt-2 text-sm text-slate-300">Bulk supply</p>
                                </div>

                                <div class="rounded-[1.5rem] border border-white/15 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-2xl font-black">GCC</p>
                                    <p class="mt-2 text-sm text-slate-300">Market reach</p>
                                </div>
                            </div>

                            <a href="{{ url('/contact-us') }}"
                                class="mt-8 inline-flex rounded-full bg-yellow-300 px-7 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                                Start Campaign →
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section class="bg-slate-100 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Services</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Customer & Business Support
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    GPT Group customers and partners ke liye repair, B2B supply, retail support and distribution solutions.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                <a href="{{ url('/services#gpt-care') }}"
                    class="group overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <img
                        class="h-72 w-full object-cover"
                        src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Care"
                    >

                    <div class="p-8">
                        <p class="font-black uppercase tracking-[.25em] text-blue-700">GPT Care</p>
                        <h3 class="mt-4 text-3xl font-black text-slate-950">Mobile Repair & Service</h3>
                        <p class="mt-3 leading-7 text-slate-600">
                            Screen, battery, software, water damage and mobile service enquiries ke liye professional support.
                        </p>
                    </div>
                </a>

                <a href="{{ url('/services#b2b-program') }}"
                    class="group overflow-hidden rounded-[2.5rem] bg-slate-950 text-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <img
                        class="h-72 w-full object-cover opacity-85"
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=85"
                        alt="B2B Program"
                    >

                    <div class="p-8">
                        <p class="font-black uppercase tracking-[.25em] text-cyan-300">B2B Program</p>
                        <h3 class="mt-4 text-3xl font-black">Business Distribution Support</h3>
                        <p class="mt-3 leading-7 text-slate-300">
                            Corporate supply, wholesale, dealer network and operational efficiency ke liye B2B support.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- PRODUCT CATEGORIES --}}
    <section class="bg-slate-950 py-16 text-white lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Categories</p>
                <h2 class="mt-4 text-4xl font-black sm:text-5xl lg:text-6xl">
                    Product Ecosystem
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-300">
                    GPT Group ke product categories ko clean and premium way me show karein.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <a href="{{ url('/brands') }}"
                    class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                    <img class="h-52 w-full rounded-[1.5rem] object-cover"
                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=900&q=85"
                        alt="Smartphones">
                    <h3 class="mt-6 text-2xl font-black">Smartphones</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-300">Latest 4G, 5G and premium mobile range.</p>
                </a>

                <a href="{{ url('/brands') }}"
                    class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                    <img class="h-52 w-full rounded-[1.5rem] object-cover"
                        src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=85"
                        alt="Tablets">
                    <h3 class="mt-6 text-2xl font-black">Tablets</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-300">Business, education and entertainment tablets.</p>
                </a>

                <a href="{{ url('/brands') }}"
                    class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                    <img class="h-52 w-full rounded-[1.5rem] object-cover"
                        src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=85"
                        alt="Smart Watches">
                    <h3 class="mt-6 text-2xl font-black">Smart Watches</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-300">Modern wearable and lifestyle products.</p>
                </a>

                <a href="{{ url('/brands') }}"
                    class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                    <img class="h-52 w-full rounded-[1.5rem] object-cover"
                        src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=85"
                        alt="Accessories">
                    <h3 class="mt-6 text-2xl font-black">Accessories</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-300">Chargers, earphones and mobile add-ons.</p>
                </a>
            </div>
        </div>
    </section>

    {{-- NETWORK SECTION --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Network</p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        Oman market coverage with retail and warehouse support.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group network retail, wholesale and B2B channels ko supply-chain execution ke saath support karta hai.
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-[1.75rem] bg-slate-50 p-6">
                            <h3 class="text-xl font-black">Sur & Salalah</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Regional market coverage.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-slate-50 p-6">
                            <h3 class="text-xl font-black">MCT-Ghala & Sohar</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Warehouse and stock support.</p>
                        </div>
                    </div>

                    <a href="{{ url('/network') }}"
                        class="mt-8 inline-flex rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl transition hover:-translate-y-1">
                        View Network
                    </a>
                </div>

                <div class="relative">
                    <img class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Network">

                    <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl">
                        <p class="text-3xl font-black">Retail + Warehouse</p>
                        <p class="mt-2 text-slate-300">Built for fast stock movement and partner success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ONLY ONE SCRIPT BLOCK --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper !== 'undefined') {
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



    <section class="section">
        <div class="containerx">
            <div class="grid md:grid-cols-4 gap-5">
                <div class="premium-card bg-white rounded-[28px] p-6">
                    <p class="text-4xl font-black text-gradient">20+</p>
                    <p class="mt-2 text-slate-600 font-semibold">Years leadership</p>
                </div>
                <div class="premium-card bg-white rounded-[28px] p-6">
                    <p class="text-4xl font-black text-gradient">2016</p>
                    <p class="mt-2 text-slate-600 font-semibold">GPT founded</p>
                </div>
                <div class="premium-card bg-white rounded-[28px] p-6">
                    <p class="text-4xl font-black text-gradient">300+</p>
                    <p class="mt-2 text-slate-600 font-semibold">Phones & devices</p>
                </div>
                <div class="premium-card bg-white rounded-[28px] p-6">
                    <p class="text-4xl font-black text-gradient">GCC</p>
                    <p class="mt-2 text-slate-600 font-semibold">Oman, UAE, Kuwait</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="containerx grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                    Company Overview
                </p>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">
                    Bringing latest tech to GCC markets.
                </h2>
                <p class="mt-6 text-slate-600 text-lg leading-8">
                    Through automated distribution, demand generation, product training,
                    supply-chain management and customer service, GPT Group supports
                    brands and retail partners with a scalable market expansion model.
                </p>
                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="p-6 rounded-3xl bg-slate-50">
                        <b>Distribution</b>
                        <p class="text-slate-600 mt-2">
                            Brand launches, channel supply and partner coverage.
                        </p>
                    </div>
                    <div class="p-6 rounded-3xl bg-slate-50">
                        <b>Marketing</b>
                        <p class="text-slate-600 mt-2">
                            Demand generation, campaigns and retail visibility.
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <img class="rounded-[32px] h-72 object-cover"
                    src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80" /><img
                    class="rounded-[32px] h-72 object-cover mt-12"
                    src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=80" /><img
                    class="rounded-[32px] h-72 object-cover"
                    src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=80" /><img
                    class="rounded-[32px] h-72 object-cover mt-12"
                    src="https://images.unsplash.com/photo-1494412519320-aa613dfb7738?auto=format&fit=crop&w=1200&q=80" />
            </div>
        </div>
    </section>

    <section class="section">
        <div class="containerx">
            <div class="text-center max-w-3xl mx-auto">
                <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                    Key Brands
                </p>
                <h2 class="mt-4 text-5xl font-black">
                    Samsung & LAVA Product Ecosystem
                </h2>
            </div>
            <div class="mt-12 grid md:grid-cols-4 gap-6">
                <a class="premium-card bg-white rounded-[34px] overflow-hidden" href="{{ route('products') }}"><img
                        class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Samsung Mobiles</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a><a class="premium-card bg-white rounded-[34px] overflow-hidden" href="{{ route('products') }}"><img
                        class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Samsung Tablets</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a><a class="premium-card bg-white rounded-[34px] overflow-hidden" href="{{ route('products') }}"><img
                        class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">LAVA Mobiles</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a><a class="premium-card bg-white rounded-[34px] overflow-hidden" href="{{ route('products') }}"><img
                        class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Accessories</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- <section class="section bg-slate-950 text-white">
        <div class="containerx grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <p class="text-cyan-300 font-black uppercase tracking-[.25em]">
                    Network
                </p>
                <h2 class="mt-4 text-5xl font-black">Oman market coverage.</h2>
                <p class="mt-5 text-slate-300">
                    Retail, wholesale, KDR and B2B support from warehouses and partner
                    channels.
                </p>
            </div>
            <div class="rounded-[34px] bg-white/10 p-8">
                <h3 class="text-2xl font-black">Sur & Salalah</h3>
                <p class="mt-3 text-slate-300">
                    City-wise distribution coverage for regional market growth.
                </p>
            </div>
            <div class="rounded-[34px] bg-white/10 p-8">
                <h3 class="text-2xl font-black">MCT-Ghala & Sohar</h3>
                <p class="mt-3 text-slate-300">
                    Warehouse support for faster dispatch and stock movement.
                </p>
            </div>
            <div class="rounded-[34px] bg-white/10 p-8">
                <h3 class="text-2xl font-black">Retail Partners</h3>
                <p class="mt-3 text-slate-300">
                    IRs, wholesale, KDR and corporate B2B network.
                </p>
            </div>
            <div class="rounded-[34px] bg-white/10 p-8">
                <h3 class="text-2xl font-black">Partner Assist</h3>
                <p class="mt-3 text-slate-300">
                    Store setup guidance, inventory planning and brand training.
                </p>
            </div>
        </div>
    </section> --}}

  
    <section class="section bg-white">
        <div class="containerx">
            <div
                class="rounded-[48px] bg-gradient-to-br from-blue-700 to-cyan-500 text-white p-10 md:p-16 grid lg:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-4xl md:text-6xl font-black">
                        Get the competitive advantage with GPT Group.
                    </h2>
                    <p class="mt-5 text-blue-50 text-lg">
                        Partner with a distribution network built for brand growth, retail
                        execution and scalable GCC expansion.
                    </p>
                </div>
                <div class="lg:text-right">
                    <a href="pages/contact.html" class="btn-light">Start Partnership</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Expanded Business Sections -->
    <section class="section bg-white">
        <div class="containerx">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                        What We Do
                    </p>
                    <h2 class="mt-4 text-4xl md:text-6xl font-black leading-tight">
                        Complete market execution for telecom and lifestyle brands.
                    </h2>
                    <p class="mt-6 text-slate-600 text-lg leading-8">
                        GPT Group supports global brands with distribution, retail
                        expansion, product launches, stock planning, partner onboarding,
                        sales training, after-sales coordination and market intelligence
                        across Oman and GCC.
                    </p>
                    <div class="mt-8 grid sm:grid-cols-2 gap-5">
                        <div class="rounded-3xl bg-slate-50 p-6">
                            <h3 class="font-black text-xl">Brand Distribution</h3>
                            <p class="mt-2 text-slate-600">
                                Channel-wise sales, stock flow and reseller support.
                            </p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-6">
                            <h3 class="font-black text-xl">Retail Visibility</h3>
                            <p class="mt-2 text-slate-600">
                                In-store display, offer banners and launch activation.
                            </p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-6">
                            <h3 class="font-black text-xl">B2B Supply</h3>
                            <p class="mt-2 text-slate-600">
                                Corporate, dealer, wholesale and KDR-focused fulfilment.
                            </p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-6">
                            <h3 class="font-black text-xl">Digital Growth</h3>
                            <p class="mt-2 text-slate-600">
                                E-commerce, IT solutions and customer communication.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img class="rounded-[44px] h-[560px] w-full object-cover shadow-2xl"
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1400&q=80"
                        alt="GPT Group team strategy" />
                    <div
                        class="absolute -bottom-8 -right-4 bg-slate-950 text-white rounded-[32px] p-7 shadow-2xl max-w-sm">
                        <p class="text-3xl font-black">End-to-end business support</p>
                        <p class="mt-2 text-slate-300">
                            From product arrival to retail sell-through.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="containerx">
            <div class="text-center max-w-3xl mx-auto">
                <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                    Strategies
                </p>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">
                    Growth strategy built around execution.
                </h2>
                <p class="mt-5 text-slate-600 text-lg">
                    A practical operating model for brand visibility, channel confidence
                    and consistent stock movement.
                </p>
            </div>
            <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="premium-card bg-white rounded-[34px] p-8">
                    <span class="text-4xl font-black text-gradient">01</span>
                    <h3 class="mt-5 text-2xl font-black">Market Mapping</h3>
                    <p class="mt-3 text-slate-600">
                        Identify high-potential cities, counters and B2B accounts.
                    </p>
                </div>
                <div class="premium-card bg-white rounded-[34px] p-8">
                    <span class="text-4xl font-black text-gradient">02</span>
                    <h3 class="mt-5 text-2xl font-black">Partner Enablement</h3>
                    <p class="mt-3 text-slate-600">
                        Train retailers with product knowledge, offers and sales tools.
                    </p>
                </div>
                <div class="premium-card bg-white rounded-[34px] p-8">
                    <span class="text-4xl font-black text-gradient">03</span>
                    <h3 class="mt-5 text-2xl font-black">Demand Creation</h3>
                    <p class="mt-3 text-slate-600">
                        Use campaigns, launch events and retail visibility to increase
                        enquiries.
                    </p>
                </div>
                <div class="premium-card bg-white rounded-[34px] p-8">
                    <span class="text-4xl font-black text-gradient">04</span>
                    <h3 class="mt-5 text-2xl font-black">Stock Rotation</h3>
                    <p class="mt-3 text-slate-600">
                        Improve availability, reduce dead stock and maintain partner
                        profitability.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="section bg-slate-950 text-white overflow-hidden">
        <div class="containerx grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-cyan-300 font-black uppercase tracking-[.25em]">
                    Retail Outlets
                </p>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">
                    Retail network designed for customer confidence.
                </h2>
                <p class="mt-6 text-slate-300 text-lg leading-8">
                    GPT Group works with retail IRs, wholesale partners, key dealer
                    retailers and B2B accounts to create strong last-mile availability
                    and consistent brand visibility.
                </p>
                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-3xl bg-white/10 p-6">
                        <b>Retail IRs</b>
                        <p class="mt-2 text-slate-300">
                            Customer-facing counters and city-level presence.
                        </p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-6">
                        <b>Wholesale</b>
                        <p class="mt-2 text-slate-300">
                            Bulk movement and regional distribution support.
                        </p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-6">
                        <b>KDR Network</b>
                        <p class="mt-2 text-slate-300">
                            Key dealer relationships for premium category growth.
                        </p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-6">
                        <b>B2B Accounts</b>
                        <p class="mt-2 text-slate-300">
                            Corporate and institutional supply opportunities.
                        </p>
                    </div>
                </div>
                <a class="btn-light mt-8" href="pages/retail-outlets.html">View Retail Outlet Page</a>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <img class="rounded-[32px] h-72 w-full object-cover"
                    src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=80"
                    alt="retail outlet" />
                <img class="rounded-[32px] h-72 w-full object-cover mt-12"
                    src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
                    alt="warehouse" />
                <img class="rounded-[32px] h-72 w-full object-cover"
                    src="https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=1200&q=80"
                    alt="partner support" />
                <img class="rounded-[32px] h-72 w-full object-cover mt-12"
                    src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1200&q=80"
                    alt="business partner" />
            </div>
        </div>
    </section>


    {{-- founder section --}}

   @if($founderSection)
    <section class="section bg-white">
        <div class="containerx">

            <div class="grid items-center gap-12 lg:grid-cols-2">

                {{-- Mobile Top / Desktop Right Image --}}
                <div class="order-1 lg:order-2">
                    @if($founderSection->image)
                        <img
                            class="h-[360px] w-full rounded-[32px] object-cover shadow-2xl sm:h-[460px] lg:h-[560px] lg:rounded-[44px]"
                            src="{{ asset('storage/' . $founderSection->image) }}"
                            alt="{{ $founderSection->title }}"
                        >
                    @else
                        <img
                            class="h-[360px] w-full rounded-[32px] object-cover shadow-2xl sm:h-[460px] lg:h-[560px] lg:rounded-[44px]"
                            src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}"
                            alt="{{ $founderSection->title }}"
                        >
                    @endif
                </div>

                {{-- Mobile Bottom / Desktop Left Content --}}
                <div class="order-2 lg:order-1">
                    @if($founderSection->label)
                        <p class="font-black uppercase tracking-[.25em] text-blue-700">
                            {{ $founderSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 md:text-5xl lg:text-6xl">
                        {{ $founderSection->title }}
                    </h2>

                    @if($founderSection->description)
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $founderSection->description }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">

                        @if($founderSection->stat_1_value || $founderSection->stat_1_label)
                            <div class="rounded-3xl bg-slate-50 p-5">
                                <p class="text-gradient text-3xl font-black">
                                    {{ $founderSection->stat_1_value }}
                                </p>
                                <p class="font-semibold text-slate-600">
                                    {{ $founderSection->stat_1_label }}
                                </p>
                            </div>
                        @endif

                        @if($founderSection->stat_2_value || $founderSection->stat_2_label)
                            <div class="rounded-3xl bg-slate-50 p-5">
                                <p class="text-gradient text-3xl font-black">
                                    {{ $founderSection->stat_2_value }}
                                </p>
                                <p class="font-semibold text-slate-600">
                                    {{ $founderSection->stat_2_label }}
                                </p>
                            </div>
                        @endif

                        @if($founderSection->stat_3_value || $founderSection->stat_3_label)
                            <div class="rounded-3xl bg-slate-50 p-5">
                                <p class="text-gradient text-3xl font-black">
                                    {{ $founderSection->stat_3_value }}
                                </p>
                                <p class="font-semibold text-slate-600">
                                    {{ $founderSection->stat_3_label }}
                                </p>
                            </div>
                        @endif

                    </div>

                    @if($founderSection->button_text)
                        <a
                            href="{{ $founderSection->button_link ?: '#' }}"
                            class="mt-8 inline-flex rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-1"
                        >
                            {{ $founderSection->button_text }}
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </section>
@endif


    <section class="section">
        <div class="containerx">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">
                <div>
                    <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                        Partner Logos
                    </p>
                    <h2 class="mt-4 text-4xl md:text-6xl font-black">
                        Trusted brand ecosystem.
                    </h2>
                </div>
                <p class="max-w-xl text-slate-600 text-lg">
                    Use this section for final authorised partner logos. Current cards
                    are editable placeholders.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Samsung
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    LAVA
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Apple
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Nokia
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Vivo
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Xiaomi
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Huawei
                </div>
                <div class="rounded-3xl bg-white premium-card p-6 text-center font-black text-slate-700">
                    Sony
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="containerx">
            <div class="text-center max-w-3xl mx-auto">
                <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                    Testimonials
                </p>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">
                    What partners say about GPT Group.
                </h2>
            </div>
            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <div class="premium-card rounded-[34px] bg-slate-50 p-8">
                    <p class="text-xl leading-8 text-slate-700">
                        “GPT Group brings speed, clarity and discipline to retail
                        distribution. Their team understands market requirements.”
                    </p>
                    <p class="mt-6 font-black">Retail Partner</p>
                    <p class="text-slate-500">Muscat</p>
                </div>
                <div class="premium-card rounded-[34px] bg-slate-50 p-8">
                    <p class="text-xl leading-8 text-slate-700">
                        “Strong warehouse support and reliable communication make them a
                        dependable partner for product movement.”
                    </p>
                    <p class="mt-6 font-black">Wholesale Partner</p>
                    <p class="text-slate-500">Oman</p>
                </div>
                <div class="premium-card rounded-[34px] bg-slate-50 p-8">
                    <p class="text-xl leading-8 text-slate-700">
                        “Their leadership team is proactive in launch planning, partner
                        training and customer support.”
                    </p>
                    <p class="mt-6 font-black">Brand Associate</p>
                    <p class="text-slate-500">GCC</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="containerx grid lg:grid-cols-2 gap-10">
            <div>
                <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                    FAQs
                </p>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">
                    Frequently asked questions.
                </h2>
                <p class="mt-5 text-slate-600 text-lg">
                    Useful for brands, dealers, retailers and B2B buyers exploring
                    partnership with GPT Group.
                </p>
                <a class="btn-primary mt-8" href="pages/contact.html">Ask More Questions</a>
            </div>
            <div class="grid gap-4">
                <details class="rounded-3xl bg-white p-6 premium-card" open>
                    <summary class="font-black cursor-pointer">
                        Which product categories does GPT Group handle?
                    </summary>
                    <p class="mt-3 text-slate-600">
                        Mobiles, tablets, watches, accessories and allied technology
                        products, along with diversified verticals such as e-commerce,
                        fashion, beauty and IT services.
                    </p>
                </details>
                <details class="rounded-3xl bg-white p-6 premium-card">
                    <summary class="font-black cursor-pointer">
                        Does GPT Group support retail partners?
                    </summary>
                    <p class="mt-3 text-slate-600">
                        Yes. The company supports retail IRs, wholesale partners, KDR
                        networks and B2B accounts with product availability and launch
                        coordination.
                    </p>
                </details>
                <details class="rounded-3xl bg-white p-6 premium-card">
                    <summary class="font-black cursor-pointer">
                        Can brands use GPT Group for Oman market expansion?
                    </summary>
                    <p class="mt-3 text-slate-600">
                        Yes. GPT Group provides market coverage support across key
                        locations including Muscat, Sur and Salalah.
                    </p>
                </details>
                <details class="rounded-3xl bg-white p-6 premium-card">
                    <summary class="font-black cursor-pointer">
                        Is the website ready for real enquiries?
                    </summary>
                    <p class="mt-3 text-slate-600">
                        The front-end form layout is ready. Connect it with backend
                        email/CRM logic when deploying.
                    </p>
                </details>
            </div>
        </div>
    </section>

    {{-- CTA + ENQUIRY SECTION --}}
    <section class="bg-white py-12 sm:py-16 lg:py-24 overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-6 lg:gap-10 items-stretch">

            {{-- CTA CARD --}}
            <div
                class="rounded-[2rem] sm:rounded-[2.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 text-white p-6 sm:p-8 md:p-10 lg:p-14 shadow-xl">
                <p class="font-black uppercase tracking-[.20em] sm:tracking-[.25em] text-blue-100 text-xs sm:text-sm">
                    Call To Action
                </p>

                <h2 class="mt-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-tight">
                    Ready to build your distribution advantage?
                </h2>

                <p class="mt-4 sm:mt-5 text-blue-50 text-base sm:text-lg leading-7 sm:leading-8">
                    Connect with GPT Group for brand partnership, product distribution, retail outlet support, B2B enquiries
                    and market expansion.
                </p>

                <div class="mt-7 sm:mt-8 grid sm:flex gap-3 sm:gap-4">
                    <a class="inline-flex justify-center rounded-full bg-white px-6 py-3.5 text-sm font-black text-slate-950 shadow-lg"
                        href="{{ url('/contact-us') }}">
                        Partner Enquiry
                    </a>

                    <a class="inline-flex justify-center rounded-full bg-slate-950 px-6 py-3.5 text-sm font-black text-white shadow-lg"
                        href="{{ url('/brands') }}">
                        Explore Products
                    </a>
                </div>
            </div>

            {{-- FORM CARD --}}
            <div
                class="rounded-[2rem] sm:rounded-[2.75rem] bg-slate-950 text-white p-6 sm:p-8 md:p-10 lg:p-14 shadow-xl min-w-0">
                <p class="text-cyan-300 font-black uppercase tracking-[.20em] sm:tracking-[.25em] text-xs sm:text-sm">
                    Enquiry
                </p>

                <h3 class="mt-4 text-2xl sm:text-3xl lg:text-4xl font-black leading-tight">
                    Quick Contact Form
                </h3>

                <form action="#" method="POST" class="mt-6 sm:mt-7 grid gap-3 sm:gap-4">
                    @csrf

                    <input type="text" name="name"
                        class="w-full rounded-2xl border border-white/10 bg-white/10 px-4 sm:px-5 py-3.5 sm:py-4 text-sm sm:text-base text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Full Name" />

                    <input type="text" name="company"
                        class="w-full rounded-2xl border border-white/10 bg-white/10 px-4 sm:px-5 py-3.5 sm:py-4 text-sm sm:text-base text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Company / Brand Name" />

                    <input type="text" name="contact"
                        class="w-full rounded-2xl border border-white/10 bg-white/10 px-4 sm:px-5 py-3.5 sm:py-4 text-sm sm:text-base text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Phone / Email" />

                    <select name="enquiry_type"
                        class="w-full rounded-2xl border border-white/10 bg-white/10 px-4 sm:px-5 py-3.5 sm:py-4 text-sm sm:text-base text-slate-300 outline-none focus:border-cyan-300">
                        <option class="text-slate-950">Distribution Partnership</option>
                        <option class="text-slate-950">Retail Outlet</option>
                        <option class="text-slate-950">B2B Supply</option>
                        <option class="text-slate-950">Career</option>
                    </select>

                    <textarea name="message"
                        class="w-full rounded-2xl border border-white/10 bg-white/10 px-4 sm:px-5 py-3.5 sm:py-4 h-28 text-sm sm:text-base text-white placeholder:text-slate-400 outline-none focus:border-cyan-300 resize-none"
                        placeholder="Message"></textarea>

                    <button type="submit"
                        class="mt-1 inline-flex w-full justify-center rounded-full bg-white px-6 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-0.5">
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
