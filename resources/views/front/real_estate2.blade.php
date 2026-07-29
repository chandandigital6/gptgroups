@extends('front_pages.front_components.main')

@section('content')

    {{-- =========================================================
        REAL ESTATE HERO SECTION
    ========================================================== --}}
    <section class="relative isolate overflow-hidden bg-slate-950">
        <img
            src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2000&q=88"
            alt="Premium real estate development"
            class="absolute inset-0 -z-20 h-full w-full object-cover"
            loading="eager"
            fetchpriority="high"
        >

        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950 via-slate-950/88 to-blue-950/45"></div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-slate-950/85 via-transparent to-slate-950/30"></div>

        <div class="pointer-events-none absolute -left-32 top-20 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-32 bottom-10 h-96 w-96 rounded-full bg-cyan-500/15 blur-3xl"></div>

        <div class="mx-auto grid min-h-[620px] max-w-7xl items-center gap-10 px-4 py-20 sm:px-6 lg:grid-cols-[1.08fr_.92fr] lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 backdrop-blur-md">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-cyan-400 opacity-50"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-cyan-200 sm:text-[11px]">
                        GPT Group Real Estate
                    </span>
                </div>

                <h1 class="mt-6 text-4xl font-black leading-[1.06] tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Building spaces that create
                    <span class="bg-gradient-to-r from-cyan-300 via-blue-300 to-white bg-clip-text text-transparent">
                        lasting value.
                    </span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">
                    GPT Group Real Estate brings together thoughtful planning, modern design,
                    strategic locations and long-term investment value. We develop and support
                    residential, commercial and mixed-use property opportunities designed for
                    modern living and sustainable business growth.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                    <a
                        href="#real-estate-projects"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-xl shadow-blue-950/30 transition duration-300 hover:-translate-y-0.5 hover:shadow-2xl"
                    >
                        Explore Opportunities

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-full border border-white/25 bg-white/10 px-7 py-3.5 text-sm font-black text-white backdrop-blur-md transition duration-300 hover:-translate-y-0.5 hover:bg-white hover:text-slate-950"
                    >
                        Speak With Our Team
                    </a>
                </div>

                <div class="mt-10 grid max-w-2xl grid-cols-2 gap-3 sm:grid-cols-4">
                    @foreach ([
                        ['value' => 'Prime', 'label' => 'Locations'],
                        ['value' => 'Modern', 'label' => 'Planning'],
                        ['value' => 'Flexible', 'label' => 'Solutions'],
                        ['value' => 'Long-Term', 'label' => 'Value'],
                    ] as $stat)
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-md">
                            <p class="text-lg font-black text-white">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-300">
                                {{ $stat['label'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative hidden lg:block">
                <div class="absolute -inset-5 rounded-[2rem] bg-gradient-to-br from-blue-500/25 to-cyan-400/15 blur-2xl"></div>

                <div class="relative overflow-hidden rounded-[2rem] border border-white/20 bg-white/10 p-3 shadow-2xl backdrop-blur-md">
                    <img
                        src="{{ asset('assets/gpt office.png') }}"
                        alt="Luxury residential interior"
                        class="h-[430px] w-full rounded-[1.4rem] object-cover"
                        loading="eager"
                    >

                    <div class="absolute bottom-6 left-6 right-6 rounded-2xl border border-white/20 bg-slate-950/72 p-5 text-white backdrop-blur-xl">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-cyan-300">
                            Designed For Tomorrow
                        </p>

                        <p class="mt-2 text-lg font-black leading-7">
                            Quality spaces for living, business and investment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        INTRODUCTION SECTION
    ========================================================== --}}
    <section class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-[.92fr_1.08fr] lg:gap-16">
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <img
                            src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=82"
                            alt="Modern residential property"
                            class="h-[360px] w-full rounded-[1.6rem] object-cover shadow-lg"
                            loading="lazy"
                        >

                        <div class="space-y-4 pt-10">
                            <img
                                src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=82"
                                alt="Commercial property"
                                class="h-[170px] w-full rounded-[1.6rem] object-cover shadow-lg"
                                loading="lazy"
                            >

                            <div class="rounded-[1.6rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-5 text-white shadow-lg">
                                <p class="text-3xl font-black">360°</p>
                                <p class="mt-2 text-sm font-bold leading-6 text-blue-50">
                                    Property planning, development and investment support.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-8 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Our Real Estate Vision
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Thoughtfully developed properties for
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                            people, businesses and investors.
                        </span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        Our real estate approach is focused on identifying strong locations,
                        understanding market requirements and creating spaces that remain useful,
                        attractive and commercially relevant over time.
                    </p>

                    <p class="mt-4 text-base leading-8 text-slate-600">
                        From residential communities and commercial spaces to retail environments
                        and mixed-use opportunities, GPT Group aims to combine functionality,
                        design quality and responsible development in every project.
                    </p>

                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        @foreach ([
                            ['title' => 'Market-Led Planning', 'text' => 'Projects shaped around real customer, tenant and investor demand.'],
                            ['title' => 'Quality Development', 'text' => 'Strong attention to materials, functionality and long-term performance.'],
                            ['title' => 'Strategic Locations', 'text' => 'Properties selected for accessibility, growth potential and convenience.'],
                            ['title' => 'Investment Focus', 'text' => 'Opportunities designed to support rental income and capital appreciation.'],
                        ] as $item)
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                                <h3 class="text-base font-black text-slate-950">{{ $item['title'] }}</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $item['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        PROPERTY CATEGORIES
    ========================================================== --}}
    <section id="real-estate-projects" class="relative overflow-hidden bg-slate-50 py-14 sm:py-16 lg:py-20">
        <div class="pointer-events-none absolute -left-28 top-20 h-80 w-80 rounded-full bg-blue-100 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-28 bottom-10 h-80 w-80 rounded-full bg-cyan-100 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                    <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                    Property Portfolio
                </p>

                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Real estate solutions across
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        multiple asset classes.
                    </span>
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                    Our growing portfolio is designed to address changing requirements
                    across residential living, business operations, retail and investment.
                </p>
            </div>

            @php
                $propertyTypes = [
                    [
                        'title' => 'Residential Properties',
                        'subtitle' => 'Homes designed around comfort and lifestyle',
                        'description' => 'Well-planned apartments, villas and residential communities developed with attention to layout, natural light, privacy, amenities and everyday convenience.',
                        'image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=84',
                        'features' => ['Apartments', 'Villas', 'Communities'],
                    ],
                    [
                        'title' => 'Commercial Spaces',
                        'subtitle' => 'Flexible environments for modern businesses',
                        'description' => 'Office and commercial spaces planned to support productivity, professional presentation, accessibility and scalable business operations.',
                        'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1200&q=84',
                        'features' => ['Offices', 'Business Centres', 'Corporate Spaces'],
                    ],
                    [
                        'title' => 'Retail Properties',
                        'subtitle' => 'Customer-focused spaces in strategic locations',
                        'description' => 'Retail units and destination spaces designed to improve visibility, customer access, brand presentation and sustainable commercial performance.',
                        'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=84',
                        'features' => ['Showrooms', 'Retail Units', 'High-Street Spaces'],
                    ],
                    [
                        'title' => 'Mixed-Use Developments',
                        'subtitle' => 'Integrated destinations for work and lifestyle',
                        'description' => 'Carefully planned developments bringing residential, retail, hospitality and commercial functions together within one connected environment.',
                        'image' => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?auto=format&fit=crop&w=1200&q=84',
                        'features' => ['Live', 'Work', 'Shop'],
                    ],
                ];
            @endphp

            <div class="mt-10 grid gap-6 md:grid-cols-2">
                @foreach ($propertyTypes as $property)
                    <article class="group overflow-hidden rounded-[1.7rem] border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative h-64 overflow-hidden">
                            <img
                                src="{{ $property['image'] }}"
                                alt="{{ $property['title'] }}"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                                loading="lazy"
                            >

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/10 to-transparent"></div>

                            <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                                <p class="text-[10px] font-black uppercase tracking-[0.18em] text-cyan-300">
                                    {{ $property['subtitle'] }}
                                </p>

                                <h3 class="mt-2 text-2xl font-black">{{ $property['title'] }}</h3>
                            </div>
                        </div>

                        <div class="p-6">
                            <p class="text-sm leading-7 text-slate-600">
                                {{ $property['description'] }}
                            </p>

                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach ($property['features'] as $feature)
                                    <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[10px] font-black text-blue-700 sm:text-[11px]">
                                        {{ $feature }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- =========================================================
        FEATURED DEVELOPMENT
    ========================================================== --}}
    <section class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] bg-slate-950 shadow-2xl">
                <div class="grid lg:grid-cols-[1.05fr_.95fr]">
                    <div class="relative min-h-[390px] overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=86"
                            alt="Premium mixed-use development"
                            class="absolute inset-0 h-full w-full object-cover"
                            loading="lazy"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="inline-flex rounded-full border border-white/20 bg-slate-950/60 px-4 py-2 text-[10px] font-black uppercase tracking-[0.18em] text-cyan-300 backdrop-blur-md">
                                Future-Ready Development
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col justify-center p-7 sm:p-10 lg:p-12">
                        <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-blue-600/20 blur-3xl"></div>

                        <div class="relative">
                            <p class="text-[11px] font-black uppercase tracking-[0.2em] text-cyan-300">
                                Integrated Property Development
                            </p>

                            <h2 class="mt-4 text-3xl font-black leading-tight text-white sm:text-4xl">
                                Designed around connectivity, convenience and future growth.
                            </h2>

                            <p class="mt-5 text-sm leading-7 text-slate-300 sm:text-base">
                                Our development vision goes beyond constructing buildings.
                                We focus on creating complete environments where thoughtful
                                layouts, quality infrastructure, lifestyle convenience and
                                commercial viability work together.
                            </p>

                            <div class="mt-7 grid grid-cols-2 gap-3">
                                @foreach ([
                                    ['title' => 'Smart Planning', 'text' => 'Efficient use of space'],
                                    ['title' => 'Quality Build', 'text' => 'Reliable materials'],
                                    ['title' => 'Strong Access', 'text' => 'Connected locations'],
                                    ['title' => 'Future Value', 'text' => 'Long-term potential'],
                                ] as $point)
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                        <p class="text-sm font-black text-white">{{ $point['title'] }}</p>
                                        <p class="mt-1 text-xs text-slate-400">{{ $point['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <a
                                href="{{ route('contact') }}"
                                class="mt-8 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 transition hover:-translate-y-0.5"
                            >
                                Discuss a Property Opportunity

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        REAL ESTATE SERVICES
    ========================================================== --}}
    <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.82fr_1.18fr] lg:gap-14">
                <div>
                    <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Our Capabilities
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Support across the
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                            property lifecycle.
                        </span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        Our approach connects market understanding, property planning,
                        development coordination and commercial strategy to create stronger
                        real estate outcomes.
                    </p>

                    <img
                        src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1000&q=82"
                        alt="Real estate consultation"
                        class="mt-7 h-[270px] w-full rounded-[1.6rem] object-cover shadow-lg"
                        loading="lazy"
                    >
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    @php
                        $services = [
                            [
                                'number' => '01',
                                'title' => 'Site Identification',
                                'description' => 'Assessment of location potential, surrounding development, accessibility and future market demand.',
                            ],
                            [
                                'number' => '02',
                                'title' => 'Development Planning',
                                'description' => 'Project concepts aligned with asset type, customer requirements, feasibility and long-term positioning.',
                            ],
                            [
                                'number' => '03',
                                'title' => 'Project Coordination',
                                'description' => 'Structured coordination across design, construction, vendors, timelines and quality expectations.',
                            ],
                            [
                                'number' => '04',
                                'title' => 'Sales & Leasing Support',
                                'description' => 'Commercial positioning, lead support and property presentation for buyers, tenants and investors.',
                            ],
                            [
                                'number' => '05',
                                'title' => 'Investment Advisory',
                                'description' => 'Opportunity assessment focused on rental potential, market movement, risk and capital appreciation.',
                            ],
                            [
                                'number' => '06',
                                'title' => 'Asset Enhancement',
                                'description' => 'Improving property presentation, functionality and commercial performance through focused upgrades.',
                            ],
                        ];
                    @endphp

                    @foreach ($services as $service)
                        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">
                            <div class="flex items-center justify-between gap-4">
                                <span class="grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-md">
                                    {{ $service['number'] }}
                                </span>

                                <span class="h-px flex-1 bg-gradient-to-r from-blue-100 to-transparent"></span>
                            </div>

                            <h3 class="mt-5 text-lg font-black text-slate-950">{{ $service['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $service['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        WHY INVEST
    ========================================================== --}}
    <section class="relative overflow-hidden bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                    <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                    Why Real Estate
                </p>

                <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Property opportunities built around
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        practical investment fundamentals.
                    </span>
                </h2>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Tangible Asset', 'text' => 'A physical asset with long-term utility and value potential.'],
                    ['title' => 'Rental Potential', 'text' => 'Opportunity to generate recurring income through leasing.'],
                    ['title' => 'Capital Growth', 'text' => 'Strong locations may appreciate as surrounding markets develop.'],
                    ['title' => 'Portfolio Balance', 'text' => 'Real estate can add stability and diversification to investments.'],
                ] as $reason)
                    <article class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-6">
                        <div class="h-1 w-14 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500"></div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">{{ $reason['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-600">{{ $reason['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>


    {{-- =========================================================
        PROCESS SECTION
    ========================================================== --}}
    <section class="bg-slate-950 py-14 text-white sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:gap-14">
                <div>
                    <p class="text-[11px] font-black uppercase tracking-[0.2em] text-cyan-300">
                        Our Development Approach
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        From opportunity to completed property.
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-300">
                        Every opportunity is evaluated through a structured process designed
                        to balance market demand, project quality, risk and long-term value.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ([
                        ['step' => '01', 'title' => 'Identify', 'text' => 'Study locations, demand, access and development potential.'],
                        ['step' => '02', 'title' => 'Plan', 'text' => 'Define the project concept, layout, positioning and commercial model.'],
                        ['step' => '03', 'title' => 'Develop', 'text' => 'Coordinate design, execution, quality and milestone delivery.'],
                        ['step' => '04', 'title' => 'Create Value', 'text' => 'Support occupancy, leasing, sales and long-term asset performance.'],
                    ] as $process)
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <span class="text-xs font-black text-cyan-300">{{ $process['step'] }}</span>
                            <h3 class="mt-3 text-xl font-black">{{ $process['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-400">{{ $process['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        TESTIMONIAL / TRUST SECTION
    ========================================================== --}}
    <section class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr] lg:gap-14">
                <div>
                    <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Built On Trust
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Clear communication.
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                            Responsible development.
                        </span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        Real estate decisions require confidence. Our aim is to maintain clear
                        communication, realistic expectations and responsible project planning
                        throughout every stage of an opportunity.
                    </p>

                    <div class="mt-7 space-y-3">
                        @foreach ([
                            'Transparent opportunity evaluation',
                            'Clear project and commercial communication',
                            'Strong focus on quality and usability',
                            'Long-term relationships with partners and investors',
                        ] as $point)
                            <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <span class="mt-0.5 grid h-6 w-6 shrink-0 place-items-center rounded-full bg-blue-700 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>

                                <p class="text-sm font-bold leading-6 text-slate-700">{{ $point }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-[2rem]">
                    <img
                        src="https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?auto=format&fit=crop&w=1100&q=84"
                        alt="Real estate partnership meeting"
                        class="h-[440px] w-full object-cover"
                        loading="lazy"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <p class="text-[10px] font-black uppercase tracking-[0.18em] text-cyan-300">
                            GPT Group Real Estate
                        </p>

                        <p class="mt-2 text-xl font-black leading-8">
                            Creating property opportunities through experience,
                            collaboration and market understanding.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        FINAL CTA
    ========================================================== --}}
    <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
                <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full border-[40px] border-white/10"></div>
                <div class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>

                <div class="relative grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-cyan-100">
                            Real Estate Opportunities
                        </p>

                        <h2 class="mt-4 max-w-3xl text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                            Looking for a property, development or investment opportunity?
                        </h2>

                        <p class="mt-4 max-w-2xl text-base leading-8 text-blue-50">
                            Connect with GPT Group to discuss residential, commercial,
                            retail or mixed-use property opportunities.
                        </p>
                    </div>

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex min-w-52 items-center justify-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-xl transition duration-300 hover:-translate-y-0.5"
                    >
                        Contact Real Estate Team

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection











@php
    $journey = [
        [
            'year' => '2000',
            'title' => 'Telecom Industry Foundation',
            'desc' => 'Leadership experience began in the telecom sector, creating strong knowledge of products, customers, sales channels and market operations.',
            'image' => 'https://images.unsplash.com/photo-1523966211575-eb4a01e7dd51?auto=format&fit=crop&w=600&q=80',
            'gradient' => 'from-blue-600 to-indigo-500',
            'soft_bg' => 'from-blue-50 to-indigo-50',
            'text_color' => 'text-blue-700',
            'ring_color' => 'ring-blue-100',
        ],
        [
            'year' => '2003',
            'title' => 'Oman Market Experience',
            'desc' => 'Regional market experience strengthened the understanding of Omani customers, IMEA retailers, dealers and technology distribution networks.',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQodLlcnJ1DX1PlG65zJyAGUZTbvv5k4X6zPVnr6ahRAw&s=10',
            'gradient' => 'from-cyan-500 to-blue-500',
            'soft_bg' => 'from-cyan-50 to-blue-50',
            'text_color' => 'text-cyan-700',
            'ring_color' => 'ring-cyan-100',
        ],
        [
            'year' => '2016',
            'title' => 'GPT Group Established',
            'desc' => 'Global Phone Technology LLC was established in Oman to connect international technology brands with local customers and business partners.',
            'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=600&q=80',
            'gradient' => 'from-violet-600 to-purple-500',
            'soft_bg' => 'from-violet-50 to-purple-50',
            'text_color' => 'text-violet-700',
            'ring_color' => 'ring-violet-100',
        ],
        [
            'year' => '2018',
            'title' => 'Global Brand Partnerships',
            'desc' => 'GPT Group expanded its relationships with international mobile, electronics, accessories and technology brands.',
            'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=600&q=80',
            'gradient' => 'from-orange-500 to-amber-400',
            'soft_bg' => 'from-orange-50 to-amber-50',
            'text_color' => 'text-orange-700',
            'ring_color' => 'ring-orange-100',
        ],
        [
            'year' => '2021',
            'title' => 'IT Infrastructure Expansion',
            'desc' => 'Enterprise infrastructure, networking, structured cabling and project-based technology solutions became part of the growing portfolio.',
            'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80',
            'gradient' => 'from-emerald-500 to-teal-500',
            'soft_bg' => 'from-emerald-50 to-teal-50',
            'text_color' => 'text-emerald-700',
            'ring_color' => 'ring-emerald-100',
        ],
        [
            'year' => '2023',
            'title' => 'Security Solutions Expansion',
            'desc' => 'Video surveillance, access control, intercom, smart monitoring and integrated security solutions became a major business focus.',
            'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=600&q=80',
            'gradient' => 'from-rose-500 to-red-500',
            'soft_bg' => 'from-rose-50 to-red-50',
            'text_color' => 'text-rose-700',
            'ring_color' => 'ring-rose-100',
        ],
        [
            'year' => 'Today',
            'title' => 'Integrated Technology Group',
            'desc' => 'Today, GPT Group operates across technology distribution, retail, security solutions, IT infrastructure and regional trading.',
            'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80',
            'gradient' => 'from-blue-700 to-cyan-500',
            'soft_bg' => 'from-blue-50 to-cyan-50',
            'text_color' => 'text-blue-700',
            'ring_color' => 'ring-blue-100',
        ],
    ];
@endphp

<section class="relative overflow-hidden bg-gradient-to-b from-white via-slate-50 to-blue-50 py-10 sm:py-12 lg:py-16">

  
    <div class="pointer-events-none absolute -left-32 top-32 h-80 w-80 rounded-full bg-blue-200/30 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-32 bottom-20 h-80 w-80 rounded-full bg-cyan-200/30 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        
        <div class="mx-auto max-w-4xl text-center">

            <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-[11px] font-black uppercase tracking-[.2em] text-blue-700 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400"></span>
                GPT Group Growth Journey
            </div>

            <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Milestones that shaped
                <span class="bg-gradient-to-r from-blue-700 via-violet-600 to-cyan-500 bg-clip-text text-transparent">
                    GPT Group.
                </span>
            </h2>

            <p class="mx-auto mt-4 max-w-3xl text-base leading-7 text-slate-600">
                From telecom experience and local market knowledge to an integrated
                technology, security, infrastructure and distribution group serving Oman.
            </p>
        </div>


      
        <div class="relative mt-10 sm:mt-12">

           
            <div class="absolute bottom-10 left-1/2 top-10 hidden w-[3px] -translate-x-1/2 rounded-full bg-gradient-to-b from-blue-300 via-violet-300 to-cyan-300 lg:block"></div>

          
            <div class="absolute bottom-6 left-[22px] top-6 w-[3px] rounded-full bg-gradient-to-b from-blue-300 via-violet-300 to-cyan-300 lg:hidden"></div>

            <div class="space-y-6 lg:space-y-8">

                @foreach ($journey as $item)

                    <article class="relative grid items-center gap-5 lg:grid-cols-[1fr_80px_1fr] lg:gap-7">

                        {{-- Timeline card --}}
                        <div class="pl-14 lg:pl-0 {{ $loop->iteration % 2 === 0 ? 'lg:col-start-3' : 'lg:col-start-1' }}">

                            <div class="group overflow-hidden rounded-[1.4rem] bg-gradient-to-br {{ $item['soft_bg'] }} p-[1px] shadow-lg transition duration-300 hover:-translate-y-1.5 hover:shadow-2xl">

                                <div class="overflow-hidden rounded-[1.35rem] bg-white">

                                    <div class="grid sm:grid-cols-[145px_1fr]">

                                        {{-- Small image --}}
                                        <div class="relative h-44 overflow-hidden sm:h-full sm:min-h-[190px]">

                                            <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['title'] }}"
                                                class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                                                loading="lazy"
                                            >

                                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-transparent to-transparent"></div>

                                            <span class="absolute bottom-3 left-3 rounded-full bg-white/95 px-3 py-1.5 text-[10px] font-black uppercase tracking-[.14em] {{ $item['text_color'] }} shadow-lg backdrop-blur">
                                                {{ $item['year'] }}
                                            </span>
                                        </div>


                                        {{-- Content --}}
                                        <div class="flex flex-col justify-center p-5 sm:p-6">

                                            <div class="flex items-center gap-3">

                                                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-gradient-to-br {{ $item['gradient'] }} text-xs font-black text-white shadow-lg">
                                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                                </span>

                                                <p class="text-[10px] font-black uppercase tracking-[.18em] {{ $item['text_color'] }}">
                                                    GPT Group Milestone
                                                </p>

                                            </div>

                                            <h3 class="mt-4 text-xl font-black leading-tight text-slate-950 sm:text-2xl">
                                                {{ $item['title'] }}
                                            </h3>

                                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                                {{ $item['desc'] }}
                                            </p>

                                            <div class="mt-4 flex items-center gap-2">
                                                <span class="h-1.5 w-10 rounded-full bg-gradient-to-r {{ $item['gradient'] }}"></span>
                                                <span class="h-1.5 w-3 rounded-full bg-slate-200"></span>
                                                <span class="h-1.5 w-2 rounded-full bg-slate-100"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Desktop center year --}}
                        <div class="relative z-10 hidden lg:col-start-2 lg:row-start-1 lg:grid lg:place-items-center">

                            <div class="grid h-[72px] w-[72px] place-items-center rounded-full border-[5px] border-white bg-gradient-to-br {{ $item['gradient'] }} text-center text-[11px] font-black text-white shadow-xl ring-4 {{ $item['ring_color'] }}">
                                {{ $item['year'] }}
                            </div>

                        </div>


                        {{-- Mobile timeline dot --}}
                        <div class="absolute left-0 top-5 z-10 grid h-11 w-11 place-items-center rounded-full border-4 border-white bg-gradient-to-br {{ $item['gradient'] }} text-[9px] font-black text-white shadow-lg lg:hidden">
                            {{ $item['year'] }}
                        </div>


                        {{-- Empty alternating desktop column --}}
                        @if ($loop->iteration % 2 === 0)
                            <div class="hidden lg:col-start-1 lg:row-start-1 lg:block"></div>
                        @else
                            <div class="hidden lg:col-start-3 lg:row-start-1 lg:block"></div>
                        @endif

                    </article>

                @endforeach

            </div>
        </div>


       
        <div class="relative mt-10 overflow-hidden rounded-[1.6rem] bg-gradient-to-r from-blue-800 via-violet-700 to-cyan-500 p-6 text-white shadow-2xl sm:p-8">

            <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-20 left-1/3 h-48 w-48 rounded-full bg-cyan-300/20 blur-3xl"></div>

            <div class="relative grid items-center gap-6 lg:grid-cols-[1.2fr_.8fr]">

                <div>

                    <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-100">
                        Continuing Our Journey
                    </p>

                    <h3 class="mt-3 text-2xl font-black leading-tight sm:text-3xl">
                        Innovation, partnerships and sustainable growth for Oman.
                    </h3>

                    <p class="mt-3 max-w-3xl text-sm leading-6 text-blue-50 sm:text-base">
                        GPT Group remains focused on creating long-term value for
                        international brands, customers, dealers and business partners
                        through dependable technology and strong local execution.
                    </p>

                </div>


                <div class="grid grid-cols-3 gap-3 lg:justify-self-end">

                    <div class="rounded-xl border border-white/15 bg-white/10 p-3 text-center backdrop-blur">
                        <p class="text-xl font-black text-cyan-200">20+</p>
                        <p class="mt-1 text-[9px] font-bold uppercase tracking-wide text-blue-100">
                            Years Experience
                        </p>
                    </div>

                    <div class="rounded-xl border border-white/15 bg-white/10 p-3 text-center backdrop-blur">
                        <p class="text-xl font-black text-cyan-200"></p>
                        <p class="mt-1 text-[9px] font-bold uppercase tracking-wide text-blue-100">
                            Core Market
                        </p>
                    </div>

                    <div class="rounded-xl border border-white/15 bg-white/10 p-3 text-center backdrop-blur">
                        <p class="text-xl font-black text-cyan-200">IMEA+</p>
                        <p class="mt-1 text-[9px] font-bold uppercase tracking-wide text-blue-100">
                            Growth Vision
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>