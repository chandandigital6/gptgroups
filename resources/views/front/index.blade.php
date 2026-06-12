@extends('front_pages.front_components.main')
@section('content')


   

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: rgba(255,255,255,.75);
        opacity: 1;
    }

    .swiper-pagination-bullet-active {
        width: 34px;
        border-radius: 999px;
        background: #22d3ee;
    }

    .product-pagination .swiper-pagination-bullet {
        background: #94a3b8;
    }

    .product-pagination .swiper-pagination-bullet-active {
        background: #2563eb;
    }
</style>

{{-- HERO SLIDER --}}
<section class="relative overflow-hidden bg-slate-950">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_10%_10%,rgba(14,165,233,.30),transparent_35%),radial-gradient(circle_at_80%_20%,rgba(37,99,235,.30),transparent_35%),linear-gradient(135deg,#071226,#020617)]"></div>

    <div class="relative">
        <div class="swiper heroOfferSwiper">
            <div class="swiper-wrapper">

                {{-- SLIDE 1 --}}
                <div class="swiper-slide">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 min-h-[660px] lg:min-h-[760px] grid lg:grid-cols-2 gap-12 items-center py-16">
                        <div class="text-white">
                            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                                Authorized Telecom Distribution
                            </div>

                            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                                Tech Distributor
                                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                                    For Modern GCC
                                </span>
                            </h1>

                            <p class="mt-6 max-w-xl text-lg lg:text-xl leading-8 text-slate-300">
                                GPT Group supports brands with telecom distribution, retail partner growth, product launches, B2B supply and market execution across Oman and GCC.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="{{ url('/brands') }}" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                                    Explore Brands
                                </a>

                                <a href="{{ url('/contact-us') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                                    Partner Enquiry
                                </a>
                            </div>

                            <div class="mt-10 grid grid-cols-3 max-w-xl gap-4">
                                <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-3xl font-black">2016</p>
                                    <p class="mt-1 text-sm text-slate-300">Founded</p>
                                </div>
                                <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-3xl font-black">GCC</p>
                                    <p class="mt-1 text-sm text-slate-300">Market</p>
                                </div>
                                <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                                    <p class="text-3xl font-black">B2B</p>
                                    <p class="mt-1 text-sm text-slate-300">Supply</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute -inset-6 rounded-full bg-cyan-400/20 blur-3xl"></div>

                            <div class="relative rounded-[2.5rem] border border-white/10 bg-white/10 p-4 sm:p-6 shadow-2xl backdrop-blur">
                                <div class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-900 to-slate-800 p-6 sm:p-10">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-[.35em] text-cyan-300">New Launch</p>
                                            <h2 class="mt-3 text-4xl sm:text-5xl lg:text-6xl font-black text-white">Smartphones</h2>
                                            <p class="mt-3 text-slate-300">Premium performance. Retail ready.</p>
                                        </div>

                                        <span class="rounded-full bg-yellow-300 px-5 py-3 text-sm font-black text-slate-950">
                                            Offer Soon
                                        </span>
                                    </div>

                                    <div class="mt-10 grid sm:grid-cols-2 gap-6 items-end">
                                        <div class="rounded-[2rem] bg-white p-6 shadow-2xl">
                                            <img
                                                class="h-[320px] w-full object-contain"
                                                src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=900&q=80"
                                                alt="Smartphone"
                                            >
                                        </div>

                                        <div class="space-y-5">
                                            <div class="rounded-[2rem] bg-white p-6">
                                                <p class="text-sm text-slate-500">Starting From</p>
                                                <p class="mt-1 text-4xl font-black text-slate-950">OMR 49*</p>
                                            </div>

                                            <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 text-white">
                                                <p class="text-xl font-black">Launch Campaign</p>
                                                <p class="mt-2 text-sm leading-6 text-slate-300">
                                                    Offer image, discount, launch date aur product highlight yaha add kar sakte ho.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="swiper-slide">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 min-h-[660px] lg:min-h-[760px] grid lg:grid-cols-2 gap-12 items-center py-16">
                        <div class="text-white">
                            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                                <span class="h-2.5 w-2.5 rounded-full bg-yellow-300"></span>
                                Dealer Special Offer
                            </div>

                            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                                Premium Deals
                                <span class="block bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">
                                    For Partners
                                </span>
                            </h1>

                            <p class="mt-6 max-w-xl text-lg lg:text-xl leading-8 text-slate-300">
                                Retailers aur dealers ke liye mobile launch offers, bundle schemes, stock availability aur B2B distribution support.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="{{ url('/contact-us') }}" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                                    Become Partner
                                </a>

                                <a href="{{ url('/network') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-orange-500 to-yellow-400 px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                                    View Network
                                </a>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute -inset-6 rounded-full bg-yellow-400/20 blur-3xl"></div>

                            <div class="relative rounded-[2.5rem] border border-white/10 bg-white/10 p-4 sm:p-6 shadow-2xl backdrop-blur">
                                <div class="rounded-[2rem] bg-gradient-to-br from-yellow-300 to-orange-500 p-8 sm:p-10">
                                    <p class="text-sm font-black uppercase tracking-[.35em] text-slate-950">Limited Period</p>
                                    <h2 class="mt-4 text-5xl sm:text-6xl font-black text-slate-950">Mega Offer</h2>
                                    <p class="mt-4 text-xl font-bold text-slate-800">Smartphones • Tablets • Accessories</p>

                                    <div class="mt-10 rounded-[2rem] bg-white/80 p-6 backdrop-blur">
                                        <img
                                            class="h-[350px] w-full object-contain"
                                            src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                                            alt="Offer Phone"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 3 --}}
                <div class="swiper-slide">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 min-h-[660px] lg:min-h-[760px] grid lg:grid-cols-2 gap-12 items-center py-16">
                        <div class="text-white">
                            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span>
                                New Product Arrival
                            </div>

                            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                                Accessories
                                <span class="block bg-gradient-to-r from-emerald-300 to-cyan-300 bg-clip-text text-transparent">
                                    Now Available
                                </span>
                            </h1>

                            <p class="mt-6 max-w-xl text-lg lg:text-xl leading-8 text-slate-300">
                                Chargers, earphones, smart watches aur mobile accessories ko premium product showcase me display karo.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="{{ url('/brands') }}" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                                    Explore Accessories
                                </a>

                                <a href="{{ url('/services') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-emerald-500 to-cyan-400 px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                                    GPT Services
                                </a>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute -inset-6 rounded-full bg-emerald-400/20 blur-3xl"></div>

                            <div class="relative rounded-[2.5rem] border border-white/10 bg-white/10 p-4 sm:p-6 shadow-2xl backdrop-blur">
                                <div class="rounded-[2rem] bg-gradient-to-br from-emerald-500 to-cyan-500 p-8 sm:p-10">
                                    <h2 class="text-5xl sm:text-6xl font-black text-white">Smart Add-ons</h2>
                                    <p class="mt-4 text-lg font-semibold text-emerald-50">High demand accessories for every store.</p>

                                    <div class="mt-10 grid grid-cols-2 gap-5">
                                        <div class="rounded-[2rem] bg-white p-5">
                                            <img
                                                class="h-52 w-full object-contain"
                                                src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80"
                                                alt="Headphone"
                                            >
                                        </div>

                                        <div class="rounded-[2rem] bg-white p-5">
                                            <img
                                                class="h-52 w-full object-contain"
                                                src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=80"
                                                alt="Watch"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="hero-prev absolute left-4 lg:left-8 top-1/2 z-20 grid h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-xl cursor-pointer">‹</div>
            <div class="hero-next absolute right-4 lg:right-8 top-1/2 z-20 grid h-12 w-12 -translate-y-1/2 place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-xl cursor-pointer">›</div>
            <div class="hero-pagination absolute z-20 !bottom-6"></div>
        </div>
    </div>
</section>


{{-- QUICK FEATURES --}}
<section class="bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid md:grid-cols-3 gap-4">
            <div class="rounded-3xl bg-slate-50 p-5 flex items-center gap-4 border border-slate-100">
                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-white font-black">01</div>
                <div>
                    <p class="font-black">Offer Banners</p>
                    <p class="text-sm text-slate-500">Upcoming schemes aur dealer campaigns.</p>
                </div>
            </div>

            <div class="rounded-3xl bg-slate-50 p-5 flex items-center gap-4 border border-slate-100">
                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-white font-black">02</div>
                <div>
                    <p class="font-black">New Launches</p>
                    <p class="text-sm text-slate-500">Latest mobiles aur accessories.</p>
                </div>
            </div>

            <div class="rounded-3xl bg-slate-50 p-5 flex items-center gap-4 border border-slate-100">
                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-slate-950 text-white font-black">03</div>
                <div>
                    <p class="font-black">Partner Support</p>
                    <p class="text-sm text-slate-500">Retail, wholesale aur B2B supply.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- LATEST PRODUCTS --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">New Launches</p>
                <h2 class="mt-3 text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-slate-950">
                    Latest Products
                </h2>
                <p class="mt-4 max-w-2xl text-lg leading-8 text-slate-600">
                    Upcoming mobiles, tablets, watches aur accessories ko premium product cards me showcase karein.
                </p>
            </div>

            <div class="flex gap-3">
                <div class="product-prev grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-lg">‹</div>
                <div class="product-next grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-white text-2xl text-slate-950 shadow-lg">›</div>
            </div>
        </div>

        <div class="swiper productSwiper mt-12">
            <div class="swiper-wrapper pb-14">

                @php
                    $products = [
                        [
                            'tag' => 'New',
                            'name' => 'AGNI 4',
                            'desc' => 'Premium flagship design with powerful performance.',
                            'img' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=700&q=80',
                            'labels' => ['5G', '128GB', 'AMOLED'],
                            'color' => 'bg-red-500',
                        ],
                        [
                            'tag' => '5G',
                            'name' => 'Play Max',
                            'desc' => 'Fast processor, premium display and long battery.',
                            'img' => 'https://images.unsplash.com/photo-1580910051074-3eb694886505?auto=format&fit=crop&w=700&q=80',
                            'labels' => ['Gaming', '8GB RAM'],
                            'color' => 'bg-blue-600',
                        ],
                        [
                            'tag' => 'Duo',
                            'name' => 'Blaze Duo 3',
                            'desc' => 'Stylish dual screen design with AMOLED display.',
                            'img' => 'https://images.unsplash.com/photo-1605236453806-6ff36851218e?auto=format&fit=crop&w=700&q=80',
                            'labels' => ['AMOLED', 'Dual Display'],
                            'color' => 'bg-cyan-500',
                        ],
                        [
                            'tag' => 'Budget',
                            'name' => 'Star 3',
                            'desc' => 'Smooth daily performance with clean design.',
                            'img' => 'https://images.unsplash.com/photo-1616348436168-de43ad0db179?auto=format&fit=crop&w=700&q=80',
                            'labels' => ['4GB RAM', '64GB'],
                            'color' => 'bg-slate-950',
                        ],
                        [
                            'tag' => 'Watch',
                            'name' => 'Smart Watch',
                            'desc' => 'Premium wearable for daily lifestyle use.',
                            'img' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=700&q=80',
                            'labels' => ['Wearable', 'Bluetooth'],
                            'color' => 'bg-emerald-500',
                        ],
                    ];
                @endphp

                @foreach ($products as $product)
                    <div class="swiper-slide">
                        <a href="{{ url('/brands') }}" class="group block overflow-hidden rounded-[2rem] bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
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

                                    <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 group-hover:bg-blue-600 group-hover:text-white transition">
                                        →
                                    </span>
                                </div>

                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach ($product['labels'] as $label)
                                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">{{ $label }}</span>
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
        <div class="grid lg:grid-cols-2 gap-8 items-stretch">
            <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-10 text-white shadow-2xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">Special Offer</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Add Any Upcoming Offer Here
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Monthly offer, dealer scheme, festival offer ya new launch campaign banner yaha add kar sakte hain.
                </p>

                <div class="mt-8 rounded-[2rem] bg-white/15 p-6 backdrop-blur">
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div>
                            <p class="text-3xl font-black">30%</p>
                            <p class="text-sm text-blue-50">Offer Tag</p>
                        </div>

                        <div>
                            <p class="text-3xl font-black">5G</p>
                            <p class="text-sm text-blue-50">Devices</p>
                        </div>

                        <div>
                            <p class="text-3xl font-black">B2B</p>
                            <p class="text-sm text-blue-50">Supply</p>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/contact-us') }}" class="mt-8 inline-flex rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl">
                    Enquire Now
                </a>
            </div>

            <div class="overflow-hidden rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-2xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Brand Campaign</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Launch Your Product With GPT Group
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-300">
                    Product launch, channel distribution, retail visibility aur partner support ke liye premium placement.
                </p>

                <div class="mt-8 grid grid-cols-2 gap-5">
                    <div class="rounded-[2rem] bg-white/10 p-5">
                        <p class="text-2xl font-black">Retail</p>
                        <p class="mt-2 text-sm text-slate-300">Store visibility</p>
                    </div>

                    <div class="rounded-[2rem] bg-white/10 p-5">
                        <p class="text-2xl font-black">Dealer</p>
                        <p class="mt-2 text-sm text-slate-300">Channel support</p>
                    </div>

                    <div class="rounded-[2rem] bg-white/10 p-5">
                        <p class="text-2xl font-black">B2B</p>
                        <p class="mt-2 text-sm text-slate-300">Bulk supply</p>
                    </div>

                    <div class="rounded-[2rem] bg-white/10 p-5">
                        <p class="text-2xl font-black">GCC</p>
                        <p class="mt-2 text-sm text-slate-300">Market reach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- SERVICES --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Services</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Customer & Business Support
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group customers aur partners ke liye repair, B2B supply, retail support aur distribution solutions.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-2 gap-6">
            <a href="{{ url('/services#gpt-care') }}" class="group overflow-hidden rounded-[2.5rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img
                    class="h-72 w-full object-cover"
                    src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=1200&q=80"
                    alt="GPT Care"
                >

                <div class="p-8">
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">GPT Care</p>
                    <h3 class="mt-4 text-3xl font-black text-slate-950">Mobile Repair & Service</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        Screen, battery, software, water damage aur mobile service enquiries ke liye professional support.
                    </p>
                </div>
            </a>

            <a href="{{ url('/services#b2b-program') }}" class="group overflow-hidden rounded-[2.5rem] bg-slate-950 text-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                <img
                    class="h-72 w-full object-cover opacity-85"
                    src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                    alt="B2B Program"
                >

                <div class="p-8">
                    <p class="font-black uppercase tracking-[.25em] text-cyan-300">B2B Program</p>
                    <h3 class="mt-4 text-3xl font-black">Business Distribution Support</h3>
                    <p class="mt-3 leading-7 text-slate-300">
                        Corporate supply, wholesale, dealer network aur operational efficiency ke liye B2B support.
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>


{{-- PRODUCT CATEGORIES --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-cyan-300">Categories</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black">
                Product Ecosystem
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-300">
                GPT Group ke product categories ko clean aur premium way me show karein.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="{{ url('/brands') }}" class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                <img class="h-52 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=900&q=80" alt="Mobiles">
                <h3 class="mt-6 text-2xl font-black">Smartphones</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Latest 4G, 5G aur premium mobile range.</p>
            </a>

            <a href="{{ url('/brands') }}" class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                <img class="h-52 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=80" alt="Tablets">
                <h3 class="mt-6 text-2xl font-black">Tablets</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Business, education aur entertainment tablets.</p>
            </a>

            <a href="{{ url('/brands') }}" class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                <img class="h-52 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=80" alt="Watches">
                <h3 class="mt-6 text-2xl font-black">Smart Watches</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Modern wearable and lifestyle products.</p>
            </a>

            <a href="{{ url('/brands') }}" class="group rounded-[2rem] bg-white/10 p-5 backdrop-blur transition hover:-translate-y-2 hover:bg-white/15">
                <img class="h-52 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80" alt="Accessories">
                <h3 class="mt-6 text-2xl font-black">Accessories</h3>
                <p class="mt-2 text-sm leading-6 text-slate-300">Chargers, earphones aur mobile add-ons.</p>
            </a>
        </div>
    </div>
</section>


{{-- NETWORK SECTION --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Network</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Oman market coverage with retail and warehouse support.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group network retail IRs, wholesale, KDR aur B2B channels ko supply-chain execution ke saath support karta hai.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Sur & Salalah</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Regional market coverage.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">MCT-Ghala & Sohar</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Warehouse and stock support.</p>
                    </div>
                </div>

                <a href="{{ url('/network') }}" class="mt-8 inline-flex rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    View Network
                </a>
            </div>

            <div class="relative">
                <img
                    class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                    src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
                    alt="GPT Network"
                >

                <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl">
                    <p class="text-3xl font-black">Retail + Warehouse</p>
                    <p class="mt-2 text-slate-300">Built for fast stock movement and partner success.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- CTA --}}

{{-- <section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-12 lg:p-16 text-white shadow-2xl">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Partner With GPT Group</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Get the competitive advantage with GPT Group.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Product distribution, retail visibility, B2B supply, launch support aur market expansion ke liye GPT Group se connect karein.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ url('/contact-us') }}" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Start Partnership
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> --}}


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.heroOfferSwiper', {
                loop: true,
                speed: 900,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                },
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.hero-next',
                    prevEl: '.hero-prev',
                },
                pagination: {
                    el: '.hero-pagination',
                    clickable: true,
                },
            });

            new Swiper('.productSwiper', {
                loop: true,
                speed: 700,
                spaceBetween: 24,
                autoplay: {
                    delay: 2800,
                    disableOnInteraction: false,
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

  







    {{-- <section class="relative overflow-hidden hero-grid">
        <div class="absolute -top-24 -right-20 w-96 h-96 bg-cyan-300 rounded-full blob"></div>
        <div class="absolute top-40 -left-28 w-96 h-96 bg-blue-300 rounded-full blob"></div>
        <div class="containerx grid lg:grid-cols-2 gap-14 items-center min-h-[720px] py-16">
            <div>
                <p class="inline-flex rounded-full bg-blue-50 text-blue-700 font-black px-5 py-2">
                    Authorized Telecom Distribution • Oman & GCC
                </p>
                <h1 class="mt-8 text-5xl md:text-7xl font-black leading-[.95]">
                    Tech Distributor For The
                    <span class="text-gradient">Modern Age</span>
                </h1>
                <p class="mt-7 text-xl text-slate-600 leading-8">
                    GPT Group is a dynamic business house focused on telecom
                    distribution, retail partner growth, supply-chain execution, brand
                    programs, e-commerce, beauty, fashion retail and IT solutions.
                </p>
                <div class="mt-9 flex flex-wrap gap-4">
                    <a class="btn-primary" href="pages/brands.html">Explore Brands</a><a class="btn-light"
                        href="pages/network.html">View Network</a>
                </div>
            </div>
            <div class="relative">
                <img class="rounded-[44px] shadow-2xl w-full h-[560px] object-cover"
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1400&q=80" />
                <div class="absolute -bottom-8 -left-8 bg-white rounded-[32px] p-6 shadow-xl max-w-xs">
                    <p class="font-black text-2xl">Global Brands. Local Execution.</p>
                    <p class="text-slate-500 mt-2">
                        Distribution, servicing, marketing and reseller support.
                    </p>
                </div>
            </div>
        </div>
    </section> --}}



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
                <a class="premium-card bg-white rounded-[34px] overflow-hidden" href="products/samsung-mobiles.html"><img
                        class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Samsung Mobiles</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a><a class="premium-card bg-white rounded-[34px] overflow-hidden"
                    href="products/samsung-tablets.html"><img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Samsung Tablets</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a><a class="premium-card bg-white rounded-[34px] overflow-hidden" href="products/lava-mobiles.html"><img
                        class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80" />
                    <div class="p-7">
                        <h3 class="text-2xl font-black">LAVA Mobiles</h3>
                        <p class="text-slate-600 mt-2">
                            Dedicated product category page with premium display sections.
                        </p>
                    </div>
                </a><a class="premium-card bg-white rounded-[34px] overflow-hidden"
                    href="products/samsung-accessories.html"><img class="h-56 w-full object-cover"
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

    <section class="section">
        <div class="containerx grid lg:grid-cols-2 gap-12 items-center">
            <img class="rounded-[44px] h-[520px] w-full object-cover shadow-2xl"
                src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80" />
            <div>
                <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                    Founder & CEO
                </p>
                <h2 class="mt-4 text-5xl font-black">
                    Visionary telecom distribution leader.
                </h2>
                <p class="mt-6 text-slate-600 leading-8 text-lg">
                    Mr. Tripathi brings 20+ years of Middle East telecom experience and
                    has helped build distribution ecosystems for global brands including
                    Samsung, Apple, Nokia and Vivo across Oman, UAE and Kuwait.
                </p>
                <a class="btn-primary mt-8" href="pages/about.html">Read Journey</a>
            </div>
        </div>
    </section>

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

    <section class="section bg-white">
        <div class="containerx">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <img class="rounded-[44px] h-[560px] w-full object-cover shadow-2xl"
                    src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}"
                    alt="Founder leadership" />
                <div>
                    <p class="text-blue-700 font-black uppercase tracking-[.25em]">
                        Founder Section
                    </p>
                    <h2 class="mt-4 text-4xl md:text-6xl font-black">
                        Mr. Tripathi — Founder & CEO, GPT Group.
                    </h2>
                    <p class="mt-6 text-slate-600 text-lg leading-8">
                        With over two decades of experience in the Middle East telecom
                        industry, Mr. Tripathi has built scalable distribution and retail
                        ecosystems for global technology brands. His leadership combines
                        market insight, hands-on execution and long-term partner
                        commitment.
                    </p>
                    <div class="mt-8 grid sm:grid-cols-3 gap-4">
                        <div class="rounded-3xl bg-slate-50 p-5">
                            <p class="text-3xl font-black text-gradient">20+</p>
                            <p class="text-slate-600 font-semibold">Years</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-5">
                            <p class="text-3xl font-black text-gradient">2016</p>
                            <p class="text-slate-600 font-semibold">GPT Founded</p>
                        </div>
                        <div class="rounded-3xl bg-slate-50 p-5">
                            <p class="text-3xl font-black text-gradient">GCC</p>
                            <p class="text-slate-600 font-semibold">Market Vision</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="section bg-white">
        <div class="containerx grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[44px] bg-gradient-to-br from-blue-700 to-cyan-500 text-white p-10 md:p-14">
                <p class="font-black uppercase tracking-[.25em] text-blue-100">
                    Call To Action
                </p>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">
                    Ready to build your distribution advantage?
                </h2>
                <p class="mt-5 text-blue-50 text-lg leading-8">
                    Connect with GPT Group for brand partnership, product distribution,
                    retail outlet support, B2B enquiries and market expansion.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a class="btn-light" href="pages/contact.html">Partner Enquiry</a><a class="btn-primary bg-slate-950"
                        href="pages/brands.html">Explore Products</a>
                </div>
            </div>
            <div class="rounded-[44px] bg-slate-950 text-white p-10 md:p-14">
                <p class="text-cyan-300 font-black uppercase tracking-[.25em]">
                    Enquiry
                </p>
                <h3 class="mt-4 text-3xl font-black">Quick Contact Form</h3>
                <form class="mt-7 grid gap-4">
                    <input
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400"
                        placeholder="Full Name" />
                    <input
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400"
                        placeholder="Company / Brand Name" />
                    <input
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400"
                        placeholder="Phone / Email" />
                    <select class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-slate-300">
                        <option>Distribution Partnership</option>
                        <option>Retail Outlet</option>
                        <option>B2B Supply</option>
                        <option>Career</option>
                    </select>
                    <textarea class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 h-28 text-white placeholder:text-slate-400"
                        placeholder="Message"></textarea>
                    <button type="button" class="btn-light justify-center">
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
