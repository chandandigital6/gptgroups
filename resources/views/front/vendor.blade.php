@extends('front_pages.front_components.main')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Vendor Brands
    |--------------------------------------------------------------------------
    | Logos folder:
    | public/assets/logo brands/
    |
    | Windows me extension hidden ho sakta hai. Neeche JavaScript automatically
    | .png, .jpg, .jpeg aur .webp try karega.
    */
    $vendors = [
        [
            'name' => 'LAVA',
            'slug' => 'lava',
            'website' => 'https://www.lavamobiles.com/',
            'logo_names' => ['lava'],
            'category' => 'Mobile Devices',
            'description' => 'A mobile device brand offering practical smartphones and feature phones for value-focused customers.',
        ],
        [
            'name' => 'Nothing',
            'slug' => 'nothing',
            'website' => 'https://nothing.tech/',
            'logo_names' => ['nothing'],
            'category' => 'Mobile Devices',
            'description' => 'A technology brand known for modern design, distinctive user experience and connected consumer devices.',
        ],
        [
            'name' => 'EZVIZ',
            'slug' => 'ezviz',
            'website' => 'https://www.ezviz.com/',
            'logo_names' => ['New Project (7)', 'ezviz'],
            'category' => 'Security & Smart Home',
            'description' => 'Smart home and video security solutions designed for homes, shops and small business environments.',
        ],
        [
            'name' => 'LifeSmart',
            'slug' => 'lifesmart',
            'website' => 'https://iot.ilifesmart.com/',
            'logo_names' => ['life smart', 'lifesmart'],
            'category' => 'Security & Smart Home',
            'description' => 'Smart automation products that help users control lighting, security and connected spaces.',
        ],
        [
            'name' => 'Hikvision',
            'slug' => 'hikvision',
            'website' => 'https://www.hikvision.com/en/',
            'logo_names' => ['hikvision'],
            'category' => 'Security & Surveillance',
            'description' => 'Video surveillance, access control, intercom and security management solutions for multiple industries.',
        ],
        [
            'name' => 'Hikvision Software',
            'slug' => 'hikvision-software',
            'website' => 'https://www.hikvision.com/en/products/software/',
            'logo_names' => ['hikvision'],
            'category' => 'Security Software',
            'description' => 'Software platforms for monitoring, device management, video review and centralized security operations.',
        ],
        [
            'name' => 'Samsung',
            'slug' => 'samsung',
            'website' => 'https://www.samsung.com/',
            'logo_names' => ['sumsung', 'samsung'],
            'category' => 'Mobile & Electronics',
            'description' => 'Consumer electronics, smartphones, tablets and connected technology for personal and business use.',
        ],
        [
            'name' => 'SanDisk',
            'slug' => 'sandisk',
            'website' => 'https://www.sandisk.com/',
            'logo_names' => ['sandisk'],
            'category' => 'Storage',
            'description' => 'Storage products including memory cards, flash drives and portable data storage solutions.',
        ],
        [
            'name' => 'UGREEN',
            'slug' => 'ugreen',
            'website' => 'https://www.ugreen.com/en-ae/',
            'logo_names' => ['ugreen'],
            'category' => 'Accessories',
            'description' => 'Connectivity and charging accessories including hubs, cables, chargers and workstation products.',
        ],
        [
            'name' => 'Vivo',
            'slug' => 'vivo',
            'website' => 'https://www.vivo.com/en/',
            'logo_names' => ['vivo'],
            'category' => 'Mobile Devices',
            'description' => 'Smartphones and mobile technology focused on design, camera experience and everyday performance.',
        ],
        [
            'name' => 'Yasmina',
            'slug' => 'yasmina',
            'website' => 'https://yasmina.yango.com/',
            'logo_names' => ['yasmina'],
            'category' => 'Smart Technology',
            'description' => 'Smart technology products designed to support connected living and convenient digital experiences.',
        ],
        [
            'name' => 'Anker',
            'slug' => 'anker',
            'website' => 'https://www.anker.com/',
            'logo_names' => ['anker'],
            'category' => 'Power & Accessories',
            'description' => 'Charging, power and mobile accessory solutions for home, travel and professional use.',
        ],
        [
            'name' => 'Logitech',
            'slug' => 'logitech',
            'website' => 'https://www.logitech.com/',
            'logo_names' => ['logitech'],
            'category' => 'IT Accessories',
            'description' => 'Computer peripherals and collaboration tools including keyboards, mice, webcams and meeting products.',
        ],
        [
            'name' => 'Redmi',
            'slug' => 'redmi',
            'website' => 'https://www.mi.com/global/redmi/',
            'logo_names' => ['mi', 'redmi', 'xiaomi'],
            'category' => 'Mobile Devices',
            'description' => 'Smartphones and connected devices designed to deliver modern features at competitive price points.',
        ],
        [
            'name' => 'Xiaomi',
            'slug' => 'xiaomi',
            'website' => 'https://www.mi.com/global/',
            'logo_names' => ['mi', 'xiaomi'],
            'category' => 'Mobile & Smart Devices',
            'description' => 'Smartphones, smart home products and connected consumer electronics across multiple categories.',
        ],
        [
            'name' => 'Nokia',
            'slug' => 'nokia',
            'website' => 'https://www.hmd.com/en_int/nokia-phones',
            'logo_names' => ['nokia'],
            'category' => 'Mobile Devices',
            'description' => 'Mobile communication devices known for practical design, reliability and familiar user experience.',
        ],
        [
            'name' => 'Romoss',
            'slug' => 'romoss',
            'website' => 'https://www.romoss.com/',
            'logo_names' => ['romoss'],
            'category' => 'Power & Accessories',
            'description' => 'Portable power and charging products including power banks and mobile energy accessories.',
        ],
        [
            'name' => 'LG',
            'slug' => 'lg',
            'website' => 'https://www.lg.com/',
            'logo_names' => ['lg'],
            'category' => 'Consumer Electronics',
            'description' => 'Consumer electronics and display products for homes, offices and commercial environments.',
        ],
        [
            'name' => 'TP-Link',
            'slug' => 'tp-link',
            'website' => 'https://www.tp-link.com/',
            'logo_names' => ['tplink', 'tp-link'],
            'category' => 'Networking',
            'description' => 'Networking products including routers, switches, wireless solutions and connected infrastructure.',
        ],
    ];

    $categories = collect($vendors)
        ->pluck('category')
        ->unique()
        ->sort()
        ->values();
@endphp

<style>
    html {
        scroll-behavior: smooth;
    }

    .vendor-soft-bg {
        background:
            radial-gradient(circle at 88% 12%, rgba(34, 211, 238, .18), transparent 28%),
            radial-gradient(circle at 8% 40%, rgba(59, 130, 246, .14), transparent 30%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 48%, #eff6ff 100%);
    }

    .vendor-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .vendor-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .vendor-card {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .vendor-card:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .2);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }

    .vendor-logo-box {
        min-height: 108px;
        display: grid;
        place-items: center;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background:
            linear-gradient(135deg, rgba(248,250,252,.96), rgba(255,255,255,1));
        overflow: hidden;
    }

    .vendor-logo-box img {
        display: block;
        width: 100%;
        height: 72px;
        object-fit: contain;
        padding: .5rem 1rem;
    }

    .vendor-filter.active {
        background: #2563eb;
        color: #ffffff;
        box-shadow: 0 8px 24px rgba(37, 99, 235, .20);
    }
</style>

{{-- 01. HERO --}}
<section class="vendor-soft-bg py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-8 lg:grid-cols-[1.05fr_.95fr] lg:gap-12">

            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-1.5 text-xs font-black text-blue-700">
                    <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                    GPT Group Vendor Network
                </div>

                <h1 class="mt-4 text-4xl font-black leading-tight tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Trusted technology
                    <span class="block vendor-gradient-text">brands and vendors.</span>
                </h1>

                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    Explore GPT Group’s vendor and brand portfolio across mobile devices,
                    security, smart home, networking, storage, accessories and consumer electronics.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a
                        href="#vendor-brands"
                        class="inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        View All Brands
                    </a>

                    <a
                        href="#hikvision"
                        class="inline-flex rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1 hover:bg-slate-50"
                    >
                        Explore Hikvision
                    </a>
                </div>

                <div class="mt-6 grid max-w-2xl grid-cols-2 gap-3 sm:grid-cols-4">
                    <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black vendor-gradient-text">{{ count($vendors) }}+</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Vendor Brands</p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black vendor-gradient-text">{{ $categories->count() }}</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Categories</p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black vendor-gradient-text">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Partner Supply</p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                        <p class="text-2xl font-black vendor-gradient-text">Oman</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Market Support</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-white bg-white/90 p-5 shadow-xl ring-1 ring-cyan-100">
                <div class="grid grid-cols-3 gap-3">
                    @foreach (array_slice($vendors, 0, 9) as $vendor)
                        @php
                            $firstLogoName = $vendor['logo_names'][0];
                            $firstLogo = asset('assets/logo brands/' . $firstLogoName . '.png');
                            $candidatePaths = collect($vendor['logo_names'])
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
                            href="{{ $vendor['website'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Visit {{ $vendor['name'] }} official website"
                            class="vendor-logo-box transition hover:border-blue-200 hover:shadow-md"
                        >
                            <img
                                src="{{ $firstLogo }}"
                                alt="{{ $vendor['name'] }} logo"
                                class="vendor-logo"
                                data-candidates='{{ $candidatePaths }}'
                                data-index="0"
                                loading="lazy"
                            >

                            <span class="vendor-logo-fallback hidden px-2 text-center text-xs font-black text-slate-700">
                                {{ $vendor['name'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

{{-- 02. HIKVISION FEATURED SECTION --}}
<section id="hikvision" class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

            <div class="order-2 lg:order-1">
                @php
                    $hikvisionCandidates = collect(['hikvision'])
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

                <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-xl sm:p-8">
                    <div class="vendor-logo-box min-h-[150px] bg-white">
                        <img
                            src="{{ asset('assets/logo brands/hikvision.png') }}"
                            alt="Hikvision logo"
                            class="vendor-logo !h-[110px]"
                            data-candidates='{{ $hikvisionCandidates }}'
                            data-index="0"
                            loading="lazy"
                        >

                        <span class="vendor-logo-fallback hidden text-3xl font-black text-slate-800">
                            HIKVISION
                        </span>
                    </div>

                    <div class="mt-4 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-xl border border-blue-100 bg-blue-50 p-4">
                            <p class="text-xs font-black uppercase tracking-[.18em] text-blue-700">Core Solutions</p>
                            <p class="mt-2 text-sm font-bold leading-6 text-slate-700">
                                CCTV, network cameras, NVR/DVR, access control and intercom systems.
                            </p>
                        </div>

                        <div class="rounded-xl border border-cyan-100 bg-cyan-50 p-4">
                            <p class="text-xs font-black uppercase tracking-[.18em] text-cyan-700">Software</p>
                            <p class="mt-2 text-sm font-bold leading-6 text-slate-700">
                                Central monitoring, video management, device control and security operations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    Featured Security Vendor
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Hikvision security and
                    <span class="vendor-gradient-text">surveillance solutions.</span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    Hikvision solutions support security monitoring across homes, retail stores,
                    offices, warehouses, institutions and commercial locations. The portfolio can
                    include video surveillance, recording systems, access control, video intercom,
                    alarm integration and centralized management software.
                </p>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    GPT Group can support businesses with product selection, distribution,
                    project supply and coordinated security requirements based on site size,
                    monitoring needs and operational goals.
                </p>

                <a
                    href="https://www.hikvision.com/en/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-5 inline-flex items-center gap-2 rounded-full bg-blue-600 px-5 py-2.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                >
                    Visit Hikvision Official Website
                    <span aria-hidden="true">↗</span>
                </a>

                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    @foreach ([
                        ['title' => 'Video Surveillance', 'text' => 'Indoor, outdoor and network camera solutions for continuous monitoring.'],
                        ['title' => 'Recording & Storage', 'text' => 'DVR, NVR and storage options for organized video recording and playback.'],
                        ['title' => 'Access Control', 'text' => 'Entry management and identity-based access for offices and facilities.'],
                        ['title' => 'Management Software', 'text' => 'Centralized tools for monitoring devices, video and security events.'],
                    ] as $feature)
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                            <h3 class="text-base font-black text-slate-950">
                                {{ $feature['title'] }}
                            </h3>

                            <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                {{ $feature['text'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

{{-- 03. VENDOR FILTER + GRID --}}
<section id="vendor-brands" class="vendor-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Vendor Portfolio
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Explore all vendor brands.
            </h2>

            <p class="mt-3 text-base leading-7 text-slate-600">
                Browse brands by category and view the product areas each vendor supports.
            </p>
        </div>

        <div class="mt-6 flex flex-wrap justify-center gap-2">
            <button
                type="button"
                class="vendor-filter active rounded-full bg-slate-100 px-4 py-2 text-xs font-black text-slate-700 transition"
                data-filter="all"
            >
                All Brands
            </button>

            @foreach ($categories as $category)
                <button
                    type="button"
                    class="vendor-filter rounded-full bg-slate-100 px-4 py-2 text-xs font-black text-slate-700 transition hover:bg-slate-200"
                    data-filter="{{ \Illuminate\Support\Str::slug($category) }}"
                >
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($vendors as $vendor)
                @php
                    $firstLogoName = $vendor['logo_names'][0];
                    $firstLogo = asset('assets/logo brands/' . $firstLogoName . '.png');

                    $candidatePaths = collect($vendor['logo_names'])
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
                    class="vendor-card vendor-item rounded-2xl border border-slate-100 bg-white p-5 shadow-sm"
                    data-category="{{ \Illuminate\Support\Str::slug($vendor['category']) }}"
                >
                    <a
                        href="{{ $vendor['website'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Visit {{ $vendor['name'] }} official website"
                        class="block"
                    >
                    <div class="vendor-logo-box">
                        <img
                            src="{{ $firstLogo }}"
                            alt="{{ $vendor['name'] }} logo"
                            class="vendor-logo"
                            data-candidates='{{ $candidatePaths }}'
                            data-index="0"
                            loading="lazy"
                        >

                        <span class="vendor-logo-fallback hidden px-3 text-center text-xl font-black text-slate-700">
                            {{ $vendor['name'] }}
                        </span>
                    </div>

                    <div class="mt-4">
                        <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-[11px] font-black text-blue-700">
                            {{ $vendor['category'] }}
                        </span>

                        <h3 class="mt-3 text-xl font-black text-slate-950">
                            {{ $vendor['name'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $vendor['description'] }}
                        </p>

                        <div class="mt-4 flex items-center justify-between gap-3">
                            <span class="text-xs font-black uppercase tracking-[.12em] text-blue-700">
                                Visit Official Website
                            </span>

                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-blue-50 text-sm font-black text-blue-700 transition group-hover:bg-blue-600 group-hover:text-white">
                                ↗
                            </span>
                        </div>
                    </div>
                    </a>

                    @if ($vendor['slug'] === 'hikvision')
                        <a
                            href="#hikvision"
                            class="mt-3 inline-flex text-sm font-black text-blue-700"
                        >
                            View Detailed Section →
                        </a>
                    @endif
                </article>
            @endforeach
        </div>

        <div id="vendor-empty" class="mt-8 hidden rounded-2xl border border-slate-100 bg-white p-8 text-center">
            <h3 class="text-xl font-black text-slate-950">No brand found</h3>
            <p class="mt-2 text-sm text-slate-600">Please select another category.</p>
        </div>

    </div>
</section>

{{-- 04. PARTNERSHIP CTA --}}
<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">
            <div class="grid items-center gap-6 lg:grid-cols-2">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        Brand & Vendor Partnership
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Build your market presence with GPT Group.
                    </h2>

                    <p class="mt-3 text-base leading-7 text-blue-50">
                        Connect with GPT Group for distribution, B2B supply, retail execution,
                        security projects and brand partnership opportunities.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                    >
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /*
        |--------------------------------------------------------------------------
        | Safe logo loader
        |--------------------------------------------------------------------------
        | Har logo ke liye multiple filename/extension candidates try karta hai.
        */
        document.querySelectorAll('.vendor-logo').forEach(function (image) {
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

                const fallback = image.parentElement.querySelector('.vendor-logo-fallback');

                if (fallback) {
                    fallback.classList.remove('hidden');
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Vendor category filter
        |--------------------------------------------------------------------------
        */
        const buttons = document.querySelectorAll('.vendor-filter');
        const items = document.querySelectorAll('.vendor-item');
        const emptyState = document.getElementById('vendor-empty');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                const filter = button.dataset.filter;
                let visibleCount = 0;

                buttons.forEach(function (item) {
                    item.classList.remove('active');
                });

                button.classList.add('active');

                items.forEach(function (item) {
                    const shouldShow = filter === 'all' || item.dataset.category === filter;

                    item.classList.toggle('hidden', !shouldShow);

                    if (shouldShow) {
                        visibleCount += 1;
                    }
                });

                if (emptyState) {
                    emptyState.classList.toggle('hidden', visibleCount !== 0);
                }
            });
        });
    });
</script>

@endsection