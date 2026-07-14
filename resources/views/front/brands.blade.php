@extends('front_pages.front_components.main')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Highlighted Brands
    |--------------------------------------------------------------------------
    | Samsung and Hikvision are the primary focus brands.
    | Vivo and Nothing are secondary highlighted brands.
    */

    $highlightedBrands = [
        [
            'name' => 'Samsung',
            'tag' => 'Primary Mobile & Electronics Brand',
            'website' => 'https://www.samsung.com/',
            'logo_names' => ['sumsung', 'samsung'],
            'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&w=1400&q=85',
            'description' => 'Samsung is a key brand within GPT Group’s mobile and consumer electronics portfolio, supporting modern smartphones, tablets, displays and connected-device requirements across retail and business channels.',
            'products' => [
                'Galaxy smartphones and tablets',
                'Mobile accessories and wearables',
                'Display and consumer electronics',
                'Connected technology products',
            ],
        ],
        [
            'name' => 'Hikvision',
            'tag' => 'Primary Security Solutions Brand',
            'website' => 'https://www.hikvision.com/en/',
            'logo_names' => ['hikvision'],
            'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1400&q=85',
            'description' => 'Hikvision forms a major part of GPT Group’s security solutions portfolio, covering video surveillance, recording systems, access control, video intercom and centralized security management requirements.',
            'products' => [
                'IP and analog surveillance cameras',
                'DVR, NVR and recording solutions',
                'Access control and video intercom',
                'Security management software',
            ],
        ],
        [
            'name' => 'Vivo',
            'tag' => 'Featured Smartphone Brand',
            'website' => 'https://www.vivo.com/en/',
            'logo_names' => ['vivo'],
            'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=1200&q=85',
            'description' => 'Vivo supports GPT Group’s smartphone portfolio with modern mobile devices focused on design, photography, display quality and everyday performance.',
            'products' => [
                'Smartphones',
                'Mobile accessories',
                'Camera-focused devices',
                'Connected mobile experiences',
            ],
        ],
        [
            'name' => 'Nothing',
            'tag' => 'Featured Technology Brand',
            'website' => 'https://nothing.tech/',
            'logo_names' => ['nothing'],
            'image' => 'https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?auto=format&fit=crop&w=1200&q=85',
            'description' => 'Nothing adds distinctive design-led smartphones, audio devices and connected consumer technology to GPT Group’s evolving brand ecosystem.',
            'products' => [
                'Nothing smartphones',
                'Wireless audio products',
                'Mobile accessories',
                'Connected consumer devices',
            ],
        ],
    ];


    /*
    |--------------------------------------------------------------------------
    | Complete Brand Portfolio
    |--------------------------------------------------------------------------
    */

    $allBrands = [
        [
            'name' => 'Samsung',
            'category' => 'Mobile & Consumer Electronics',
            'website' => 'https://www.samsung.com/',
            'logo_names' => ['sumsung', 'samsung'],
            'description' => 'Smartphones, tablets, displays, wearables and connected consumer electronics.',
            'priority' => true,
        ],
        [
            'name' => 'Hikvision',
            'category' => 'Security & Surveillance',
            'website' => 'https://www.hikvision.com/en/',
            'logo_names' => ['hikvision'],
            'description' => 'Video surveillance, recording, access control, intercom and security management solutions.',
            'priority' => true,
        ],
        [
            'name' => 'Vivo',
            'category' => 'Mobile Devices',
            'website' => 'https://www.vivo.com/en/',
            'logo_names' => ['vivo'],
            'description' => 'Smartphones focused on camera technology, design and everyday mobile performance.',
            'priority' => false,
        ],
        [
            'name' => 'Nothing',
            'category' => 'Mobile & Smart Devices',
            'website' => 'https://nothing.tech/',
            'logo_names' => ['nothing'],
            'description' => 'Design-focused smartphones, audio products and connected technology devices.',
            'priority' => false,
        ],
        [
            'name' => 'Xiaomi',
            'category' => 'Mobile & Smart Devices',
            'website' => 'https://www.mi.com/global/',
            'logo_names' => ['mi', 'xiaomi'],
            'description' => 'Smartphones, smart-home products and connected consumer technology.',
            'priority' => false,
        ],
        [
            'name' => 'Redmi',
            'category' => 'Mobile Devices',
            'website' => 'https://www.mi.com/global/redmi/',
            'logo_names' => ['redmi', 'mi', 'xiaomi'],
            'description' => 'Feature-rich smartphones and connected devices at competitive price points.',
            'priority' => false,
        ],
        [
            'name' => 'LG',
            'category' => 'Consumer Electronics',
            'website' => 'https://www.lg.com/',
            'logo_names' => ['lg'],
            'description' => 'Displays, consumer electronics and technology for homes and business environments.',
            'priority' => false,
        ],
        [
            'name' => 'Nokia',
            'category' => 'Mobile Devices',
            'website' => 'https://www.hmd.com/en_int/nokia-phones',
            'logo_names' => ['nokia'],
            'description' => 'Practical mobile communication devices known for familiar and reliable experiences.',
            'priority' => false,
        ],
        [
            'name' => 'LAVA',
            'category' => 'Mobile Devices',
            'website' => 'https://www.lavamobiles.com/',
            'logo_names' => ['lava'],
            'description' => 'Smartphones and feature phones developed for practical customer requirements.',
            'priority' => false,
        ],
        [
            'name' => 'EZVIZ',
            'category' => 'Security & Smart Home',
            'website' => 'https://www.ezviz.com/',
            'logo_names' => ['New Project (7)', 'ezviz'],
            'description' => 'Smart cameras, video security and connected smart-home technology.',
            'priority' => false,
        ],
        [
            'name' => 'LifeSmart',
            'category' => 'Smart Home & Automation',
            'website' => 'https://iot.ilifesmart.com/',
            'logo_names' => ['life smart', 'lifesmart', 'lifes smart'],
            'description' => 'Smart automation, intelligent lighting, security and connected-space solutions.',
            'priority' => false,
        ],
        [
            'name' => 'Yasmina',
            'category' => 'Smart Technology',
            'website' => 'https://yasmina.yango.com/',
            'logo_names' => ['yasmina'],
            'description' => 'AI-enabled smart technology created for connected living environments.',
            'priority' => false,
        ],
        [
            'name' => 'Logitech',
            'category' => 'IT & Computer Accessories',
            'website' => 'https://www.logitech.com/',
            'logo_names' => ['logitech'],
            'description' => 'Keyboards, mice, webcams and professional collaboration products.',
            'priority' => false,
        ],
        [
            'name' => 'SanDisk',
            'category' => 'Storage Solutions',
            'website' => 'https://www.sandisk.com/',
            'logo_names' => ['sandisk'],
            'description' => 'Memory cards, flash drives and portable data-storage products.',
            'priority' => false,
        ],
        [
            'name' => 'UGREEN',
            'category' => 'Connectivity & Accessories',
            'website' => 'https://www.ugreen.com/en-ae/',
            'logo_names' => ['ugreen'],
            'description' => 'Charging, connectivity, cables, adapters, hubs and workstation accessories.',
            'priority' => false,
        ],
        [
            'name' => 'Anker',
            'category' => 'Power & Accessories',
            'website' => 'https://www.anker.com/',
            'logo_names' => ['anker'],
            'description' => 'Charging products, power banks and mobile technology accessories.',
            'priority' => false,
        ],
        [
            'name' => 'Romoss',
            'category' => 'Power & Accessories',
            'website' => 'https://www.romoss.com/',
            'logo_names' => ['romoss'],
            'description' => 'Portable charging, power-bank and mobile-energy products.',
            'priority' => false,
        ],
    ];


    /*
    |--------------------------------------------------------------------------
    | Four Main Business Categories
    |--------------------------------------------------------------------------
    */

    $mainCategories = [
        [
            'number' => '01',
            'name' => 'Mobile & Consumer Electronics',
            'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=85',
            'description' => 'Smartphones, feature phones, tablets, displays, wearables and connected consumer technology for retail, dealer and corporate supply requirements.',
            'brands' => 'Samsung, Vivo, Nothing, Xiaomi, Redmi, Nokia, LAVA and LG',
            'website' => 'https://www.samsung.com/',
        ],
        [
            'number' => '02',
            'name' => 'Security & Surveillance Solutions',
            'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1200&q=85',
            'description' => 'Video surveillance, CCTV, NVR, DVR, access control, intercom and monitoring solutions for homes, retail, offices and commercial sites.',
            'brands' => 'Hikvision and EZVIZ',
            'website' => 'https://www.hikvision.com/en/',
        ],
        [
            'number' => '03',
            'name' => 'Smart Home & Automation',
            'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=85',
            'description' => 'Connected cameras, intelligent lighting, automation controls, voice-enabled products and smart-space technology.',
            'brands' => 'LifeSmart, Yasmina, EZVIZ and Xiaomi',
            'website' => 'https://iot.ilifesmart.com/',
        ],
        [
            'number' => '04',
            'name' => 'IT, Storage & Mobile Accessories',
            'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=1200&q=85',
            'description' => 'Storage devices, keyboards, mice, webcams, charging products, cables, hubs, adapters and mobile accessories.',
            'brands' => 'Logitech, SanDisk, UGREEN, Anker and Romoss',
            'website' => 'https://www.logitech.com/',
        ],
    ];
@endphp


<style>
    html {
        scroll-behavior: smooth;
    }

    .brand-page-soft {
        background:
            radial-gradient(circle at 86% 10%, rgba(34, 211, 238, .18), transparent 28%),
            radial-gradient(circle at 8% 42%, rgba(59, 130, 246, .15), transparent 30%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 46%, #eff6ff 100%);
    }

    .brand-page-muted {
        background:
            radial-gradient(circle at 90% 10%, rgba(34, 211, 238, .08), transparent 28%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .brand-gradient-text {
        background: linear-gradient(90deg, #1d4ed8, #0891b2);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .brand-card {
        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .brand-card:hover {
        transform: translateY(-6px);
        border-color: rgba(37, 99, 235, .22);
        box-shadow: 0 20px 50px rgba(15, 23, 42, .11);
    }

    .priority-brand-card {
        position: relative;
        overflow: hidden;
    }

    .priority-brand-card::before {
        position: absolute;
        inset: 0;
        z-index: 0;
        content: "";
        background:
            linear-gradient(
                120deg,
                rgba(15, 23, 42, .95),
                rgba(30, 64, 175, .79),
                rgba(8, 145, 178, .48)
            );
    }

    .brand-logo-box {
        display: grid;
        min-height: 120px;
        place-items: center;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        background: linear-gradient(135deg, #ffffff, #f8fafc);
    }

    .brand-logo-box img {
        width: 100%;
        height: 82px;
        padding: .65rem 1rem;
        object-fit: contain;
    }

    .brand-filter.active {
        color: #ffffff;
        background: #2563eb;
        box-shadow: 0 8px 22px rgba(37, 99, 235, .2);
    }
</style>


{{-- =========================================================
    01. HERO
========================================================= --}}

<section class="brand-page-soft py-10 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-9 lg:grid-cols-[1.03fr_.97fr] lg:gap-12">

            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-1.5 text-xs font-black text-blue-700">
                    <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                    GPT Group Brand Portfolio
                </div>

                <h1 class="mt-5 text-4xl font-black leading-[1.08] tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Technology brands built for
                    <span class="block brand-gradient-text">
                        modern Oman.
                    </span>
                </h1>

                <p class="mt-5 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    GPT Group supports customers, retailers, dealers and business
                    buyers through a diverse portfolio of mobile devices, consumer
                    electronics, security systems, smart technology, storage and
                    digital accessories.
                </p>

                <p class="mt-3 max-w-3xl text-base leading-7 text-slate-600">
                    Samsung and Hikvision form two major pillars of our technology
                    portfolio, supported by leading smartphone, smart-home,
                    storage, power and accessory brands.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a
                        href="#primary-brands"
                        class="inline-flex rounded-full bg-blue-700 px-6 py-3 text-sm font-black text-white shadow-lg shadow-blue-700/20 transition hover:-translate-y-1 hover:bg-blue-800"
                    >
                        Explore Primary Brands
                    </a>

                    <a
                        href="#all-brands"
                        class="inline-flex rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1 hover:bg-slate-50"
                    >
                        View Complete Portfolio
                    </a>
                </div>

                <div class="mt-7 grid max-w-3xl grid-cols-2 gap-3 sm:grid-cols-4">
                    <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black brand-gradient-text">
                            {{ count($allBrands) }}+
                        </p>
                        <p class="mt-1 text-xs font-bold text-slate-500">
                            Technology Brands
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black brand-gradient-text">04</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">
                            Main Segments
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black brand-gradient-text">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">
                            Business Supply
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black brand-gradient-text">Oman</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">
                            Market Support
                        </p>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-2 gap-3 sm:gap-4">

                <div class="col-span-2 overflow-hidden rounded-[1.7rem] border border-white bg-white p-3 shadow-xl">
                    <img
                        src="https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&w=1400&q=85"
                        alt="Smartphones and consumer electronics"
                        class="h-64 w-full rounded-[1.25rem] object-cover sm:h-72"
                    >
                </div>

                <div class="overflow-hidden rounded-2xl border border-white bg-white p-2 shadow-lg">
                    <img
                        src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=800&q=85"
                        alt="Security surveillance camera solutions"
                        class="h-44 w-full rounded-xl object-cover sm:h-48"
                        loading="lazy"
                    >
                </div>

                <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 p-5 text-white shadow-lg">
                    <p class="text-xs font-black uppercase tracking-[.2em] text-blue-100">
                        Core Focus
                    </p>

                    <p class="mt-3 text-2xl font-black">
                        Samsung & Hikvision
                    </p>

                    <p class="mt-2 text-sm leading-6 text-blue-50">
                        Mobile innovation and professional security solutions.
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>


{{-- =========================================================
    02. QUICK FACTS
========================================================= --}}

@include('front.sections.quick_facts', ['pageSlug' => 'brands'])


{{-- =========================================================
    03. PRIMARY BRANDS — SAMSUNG AND HIKVISION
========================================================= --}}

<section id="primary-brands" class="bg-white py-10 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Primary Brand Partnerships
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Our leading technology brands.
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                Samsung leads our mobile and consumer electronics portfolio,
                while Hikvision supports comprehensive surveillance and security requirements.
            </p>
        </div>


        <div class="mt-9 grid gap-6 lg:grid-cols-2">

            @foreach (array_slice($highlightedBrands, 0, 2) as $index => $brand)
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

                <article
                    class="priority-brand-card min-h-[570px] rounded-[1.75rem] bg-slate-950 shadow-2xl"
                >
                    <img
                        src="{{ $brand['image'] }}"
                        alt="{{ $brand['name'] }} products"
                        class="absolute inset-0 h-full w-full object-cover"
                        loading="lazy"
                    >

                    <div class="relative z-10 flex min-h-[570px] flex-col justify-between p-6 sm:p-8">

                        <div class="flex items-start justify-between gap-4">
                            <span class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-[11px] font-black uppercase tracking-[.16em] text-white backdrop-blur">
                                {{ $brand['tag'] }}
                            </span>

                            <span class="grid h-11 w-11 place-items-center rounded-full bg-white text-lg font-black text-blue-700 shadow-lg">
                                0{{ $index + 1 }}
                            </span>
                        </div>


                        <div>
                            <div class="mb-5 inline-flex min-w-[180px] rounded-2xl bg-white p-4 shadow-xl">
                                <div class="relative grid h-16 w-full place-items-center">
                                    <img
                                        src="{{ $firstLogo }}"
                                        alt="{{ $brand['name'] }} logo"
                                        class="static-brand-logo h-14 w-full object-contain"
                                        data-candidates='{{ $candidatePaths }}'
                                        data-index="0"
                                        loading="lazy"
                                    >

                                    <span class="static-brand-fallback hidden text-2xl font-black text-blue-700">
                                        {{ $brand['name'] }}
                                    </span>
                                </div>
                            </div>

                            <h3 class="text-4xl font-black text-white sm:text-5xl">
                                {{ $brand['name'] }}
                            </h3>

                            <p class="mt-4 max-w-xl text-base leading-7 text-slate-100">
                                {{ $brand['description'] }}
                            </p>

                            <div class="mt-5 grid gap-2 sm:grid-cols-2">
                                @foreach ($brand['products'] as $product)
                                    <div class="flex items-start gap-2 rounded-xl border border-white/15 bg-white/10 px-3 py-2.5 text-sm font-bold text-white backdrop-blur">
                                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-cyan-300"></span>
                                        {{ $product }}
                                    </div>
                                @endforeach
                            </div>

                            <a
                                href="{{ $brand['website'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-5 py-3 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1"
                            >
                                Visit {{ $brand['name'] }} Website
                                <span>↗</span>
                            </a>
                        </div>

                    </div>
                </article>
            @endforeach

        </div>
    </div>
</section>


{{-- =========================================================
    04. SECONDARY HIGHLIGHTED BRANDS — VIVO AND NOTHING
========================================================= --}}

<section class="brand-page-muted py-10 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-3xl">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    Featured Mobile Brands
                </p>

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Contemporary mobile innovation.
                </h2>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    Vivo and Nothing complement GPT Group’s smartphone range with
                    camera-focused technology, modern interfaces and distinctive product design.
                </p>
            </div>
        </div>


        <div class="mt-8 grid gap-5 lg:grid-cols-2">

            @foreach (array_slice($highlightedBrands, 2, 2) as $brand)
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
                    class="brand-card group grid overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white shadow-sm sm:grid-cols-[.9fr_1.1fr]"
                >
                    <div class="relative min-h-[260px] overflow-hidden">
                        <img
                            src="{{ $brand['image'] }}"
                            alt="{{ $brand['name'] }} technology products"
                            class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            loading="lazy"
                        >

                        <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1.5 text-[10px] font-black uppercase tracking-[.13em] text-blue-700 shadow-md backdrop-blur">
                            {{ $brand['tag'] }}
                        </span>
                    </div>

                    <div class="flex flex-col justify-center p-6">

                        <div class="brand-logo-box max-w-[210px] !min-h-[85px]">
                            <img
                                src="{{ $firstLogo }}"
                                alt="{{ $brand['name'] }} logo"
                                class="static-brand-logo !h-16"
                                data-candidates='{{ $candidatePaths }}'
                                data-index="0"
                                loading="lazy"
                            >

                            <span class="static-brand-fallback hidden text-xl font-black text-blue-700">
                                {{ $brand['name'] }}
                            </span>
                        </div>

                        <h3 class="mt-5 text-3xl font-black text-slate-950">
                            {{ $brand['name'] }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            {{ $brand['description'] }}
                        </p>

                        <span class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-[.15em] text-blue-700">
                            Visit Official Website
                            <span class="text-lg">↗</span>
                        </span>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>


{{-- =========================================================
    05. FOUR MAIN CATEGORIES
========================================================= --}}

<section class="bg-white py-10 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Main Product Segments
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Four core technology categories.
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                A focused portfolio designed to serve consumer retail,
                dealers, corporate buyers and project-based technology requirements.
            </p>
        </div>


        <div class="mt-9 grid gap-5 md:grid-cols-2">

            @foreach ($mainCategories as $category)
                <a
                    href="{{ $category['website'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="brand-card group overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white shadow-sm"
                >
                    <div class="relative h-64 overflow-hidden">
                        <img
                            src="{{ $category['image'] }}"
                            alt="{{ $category['name'] }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            loading="lazy"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></div>

                        <span class="absolute left-5 top-5 grid h-11 w-11 place-items-center rounded-full bg-white text-sm font-black text-blue-700 shadow-lg">
                            {{ $category['number'] }}
                        </span>

                        <h3 class="absolute bottom-5 left-5 right-5 text-2xl font-black text-white sm:text-3xl">
                            {{ $category['name'] }}
                        </h3>
                    </div>

                    <div class="p-5 sm:p-6">

                        <p class="text-sm leading-6 text-slate-600">
                            {{ $category['description'] }}
                        </p>

                        <div class="mt-4 rounded-xl bg-blue-50 p-4">
                            <p class="text-[10px] font-black uppercase tracking-[.17em] text-slate-400">
                                Key Associated Brands
                            </p>

                            <p class="mt-1.5 text-xs font-bold leading-5 text-blue-700">
                                {{ $category['brands'] }}
                            </p>
                        </div>

                        <div class="mt-5 flex items-center justify-between gap-4">
                            <span class="text-xs font-black uppercase tracking-[.15em] text-blue-700">
                                Explore Solutions
                            </span>

                            <span class="grid h-10 w-10 place-items-center rounded-full bg-blue-600 text-lg text-white transition group-hover:bg-cyan-500">
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
    06. COMPLETE BRAND PORTFOLIO
========================================================= --}}

<section id="all-brands" class="brand-page-muted py-10 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Complete Brand Portfolio
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Explore all technology brands.
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                Browse the wider GPT Group brand ecosystem across mobile,
                security, smart technology, storage, charging and digital accessories.
            </p>
        </div>


        <div class="mt-8 flex flex-wrap justify-center gap-2">
            <button
                type="button"
                class="brand-filter active rounded-full bg-slate-100 px-4 py-2 text-xs font-black text-slate-700 transition"
                data-filter="all"
            >
                All Brands
            </button>

            @foreach (collect($allBrands)->pluck('category')->unique()->values() as $category)
                <button
                    type="button"
                    class="brand-filter rounded-full bg-slate-100 px-4 py-2 text-xs font-black text-slate-700 transition hover:bg-slate-200"
                    data-filter="{{ \Illuminate\Support\Str::slug($category) }}"
                >
                    {{ $category }}
                </button>
            @endforeach
        </div>


        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach ($allBrands as $brand)
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
                    class="brand-card brand-item group overflow-hidden rounded-2xl border bg-white p-5 shadow-sm {{ $brand['priority'] ? 'border-blue-300 ring-2 ring-blue-100' : 'border-slate-100' }}"
                    data-category="{{ \Illuminate\Support\Str::slug($brand['category']) }}"
                >
                    <div class="relative">

                        @if ($brand['priority'])
                            <span class="absolute -right-1 -top-1 z-10 rounded-full bg-blue-700 px-3 py-1 text-[9px] font-black uppercase tracking-[.14em] text-white shadow">
                                Priority Brand
                            </span>
                        @endif

                        <div class="brand-logo-box">
                            <img
                                src="{{ $firstLogo }}"
                                alt="{{ $brand['name'] }} logo"
                                class="static-brand-logo transition duration-500 group-hover:scale-105"
                                data-candidates='{{ $candidatePaths }}'
                                data-index="0"
                                loading="lazy"
                            >

                            <span class="static-brand-fallback hidden px-3 text-center text-xl font-black text-blue-700">
                                {{ $brand['name'] }}
                            </span>
                        </div>
                    </div>


                    <div class="mt-4">
                        <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-[10px] font-black text-blue-700">
                            {{ $brand['category'] }}
                        </span>

                        <div class="mt-3 flex items-start justify-between gap-3">
                            <h3 class="text-xl font-black text-slate-950">
                                {{ $brand['name'] }}
                            </h3>

                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-slate-100 text-sm text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
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


        <div id="brand-empty" class="mt-8 hidden rounded-2xl border border-slate-100 bg-white p-8 text-center shadow-sm">
            <h3 class="text-xl font-black text-slate-950">
                No brand found
            </h3>

            <p class="mt-2 text-sm text-slate-600">
                Please choose another category.
            </p>
        </div>

    </div>
</section>


{{-- =========================================================
    07. BUSINESS SUPPORT
========================================================= --}}

<section class="bg-white py-10 sm:py-12 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-6 text-white shadow-2xl sm:p-8 lg:p-10">

            <div class="grid items-center gap-8 lg:grid-cols-[1.25fr_.75fr]">

                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        Retail, Dealer & Business Support
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Build your technology requirements with GPT Group.
                    </h2>

                    <p class="mt-4 max-w-3xl text-base leading-7 text-blue-50">
                        Connect with our team for mobile and electronics supply,
                        security-project requirements, smart technology,
                        accessories, dealer enquiries and business partnerships in Oman.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ([
                            'Retail Supply',
                            'Dealer Support',
                            'Corporate Requirements',
                            'Security Projects',
                            'Brand Partnerships',
                        ] as $support)
                            <span class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-bold backdrop-blur">
                                {{ $support }}
                            </span>
                        @endforeach
                    </div>
                </div>


                <div class="lg:text-right">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1"
                    >
                        Contact GPT Group
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    JAVASCRIPT
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        /*
        |--------------------------------------------------------------------------
        | Safe logo loader
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.static-brand-logo').forEach(function (image) {
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
                    '.static-brand-fallback'
                );

                if (fallback) {
                    fallback.classList.remove('hidden');
                }
            });
        });


        /*
        |--------------------------------------------------------------------------
        | Brand category filter
        |--------------------------------------------------------------------------
        */

        const buttons = document.querySelectorAll('.brand-filter');
        const items = document.querySelectorAll('.brand-item');
        const emptyState = document.getElementById('brand-empty');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                const filter = button.dataset.filter;
                let visibleCount = 0;

                buttons.forEach(function (item) {
                    item.classList.remove('active');
                });

                button.classList.add('active');

                items.forEach(function (item) {
                    const shouldShow =
                        filter === 'all' ||
                        item.dataset.category === filter;

                    item.classList.toggle('hidden', !shouldShow);

                    if (shouldShow) {
                        visibleCount += 1;
                    }
                });

                if (emptyState) {
                    emptyState.classList.toggle(
                        'hidden',
                        visibleCount !== 0
                    );
                }
            });
        });

    });
</script>

@endsection