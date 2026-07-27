@extends('front_pages.front_components.main')

@section('content')
    {{-- Hero --}}
    <section
        class="relative flex min-h-[340px] items-center overflow-hidden bg-gradient-to-br from-white via-slate-50 to-blue-50 py-8 sm:min-h-[360px] sm:py-9 lg:min-h-[390px] lg:py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[1.08fr_.92fr]">
                <div>
                    <p
                        class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        GPT Group of Companies
                    </p>

                    <h1 class="mt-4 max-w-4xl text-3xl font-black leading-[1.08] text-slate-950 sm:text-4xl lg:text-5xl">
                        A diversified group built around
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">technology,
                            trade and modern business.</span>
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                        GPT Group brings together companies operating across technology distribution,
                        digital commerce, retail, lifestyle solutions and architectural hardware.
                        Each business supports the Group’s wider vision of connecting global products
                        and services with customers and partners across Oman and the GCC.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="#group-companies"
                            class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-0.5">
                            Explore Group Companies
                        </a>

                        <a href="{{ route('contact') }}"
                            class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-sm transition hover:-translate-y-0.5">
                            Partner With Us
                        </a>
                    </div>

                    <div class="mt-6 grid max-w-xl grid-cols-3 gap-3">
                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                            <p class="text-2xl font-black text-blue-700">Growing</p>
                            <p class="mt-1 text-xs font-bold text-slate-600">Business Portfolio</p>
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                            <p class="text-2xl font-black text-blue-700">Oman</p>
                            <p class="mt-1 text-xs font-bold text-slate-600">Headquartered</p>
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                            <p class="text-2xl font-black text-blue-700">GCC</p>
                            <p class="mt-1 text-xs font-bold text-slate-600">Regional Vision</p>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                    <img src="{{ asset('assets/under.png') }}"
                        alt="GPT Group business companies"
                        class="h-[240px] w-full rounded-xl object-cover sm:h-[270px] lg:h-[300px]" loading="eager"
                        fetchpriority="high">

                    <div
                        class="absolute bottom-3 left-3 right-3 rounded-xl border border-white/60 bg-white/95 p-3 shadow-lg sm:left-5 sm:right-auto sm:max-w-xs">
                        <p class="text-xs font-black uppercase tracking-[.18em] text-blue-700">
                            One Group, Multiple Capabilities
                        </p>

                        <p class="mt-2 text-sm font-bold leading-6 text-slate-700">
                            Distribution, digital commerce, retail solutions,
                            technology services and architectural hardware.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Intro --}}
    <section class="bg-white py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-9 lg:grid-cols-2 lg:gap-12">
                <div>
                    <p
                        class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Our Business House
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Creating value through
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">focused
                            businesses and shared expertise.</span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        GPT Group’s journey is rooted in technology distribution and market development.
                        Over time, the Group expanded its capabilities to serve a wider mix of consumer,
                        business and project requirements.
                    </p>

                    <p class="mt-4 text-base leading-8 text-slate-600">
                        The companies work independently within their specialist markets while benefiting
                        from shared relationships, operational experience, regional knowledge and a
                        customer-first business culture.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">01</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">Technology Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Mobile devices, electronics, smart security and connected technology.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">02</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">International Trade</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Regional sourcing, cross-market partnerships and business expansion.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">03</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">Digital & Retail</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Digital commerce, modern retail experiences and consumer-focused services.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">04</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">Project Solutions</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Architectural hardware, security, connectivity and technical solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- =========================================================
        SWASTIKA TELECOM — STRATEGIC VENDOR PARTNER
    ========================================================= --}}
    <section class="relative overflow-hidden bg-white py-12 sm:py-14 lg:py-16">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -left-24 top-12 h-72 w-72 rounded-full bg-blue-100/70 blur-3xl"></div>
            <div class="absolute -right-24 bottom-0 h-72 w-72 rounded-full bg-cyan-100/70 blur-3xl"></div>
            <div class="absolute inset-0 opacity-[0.025]"
                style="background-image:radial-gradient(#0f172a 1px,transparent 1px);background-size:28px 28px;">
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-4 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-blue-700 shadow-sm sm:text-[11px]">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-500 opacity-40"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-blue-600"></span>
                    </span>
                    Strategic Vendor Partnership
                </span>

                <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Global capability.
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        Stronger local reach.
                    </span>
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                    GPT Group and Swastika Telecom combine global sourcing, distribution expertise
                    and local market intelligence to build dependable technology channels across Africa.
                </p>
            </div>

            <div
                class="mt-9 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-[0_25px_80px_rgba(15,23,42,0.12)] lg:mt-11">
                <div class="grid lg:grid-cols-[.9fr_1.1fr]">
                    {{-- Visual Panel --}}
                    <div class="relative min-h-[380px] overflow-hidden bg-slate-950 sm:min-h-[440px] lg:min-h-[650px]">
                        <img
                            src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1500&q=85"
                            alt="GPT Group and Swastika Telecom technology distribution partnership"
                            class="absolute inset-0 h-full w-full object-cover"
                            loading="lazy">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-blue-950/10"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/35 to-transparent"></div>

                        <div class="absolute left-5 right-5 top-5 sm:left-7 sm:right-7 sm:top-7">
                            <div class="flex flex-wrap items-center justify-between gap-3">
                                <span
                                    class="rounded-full border border-white/20 bg-slate-950/45 px-4 py-2 text-[10px] font-black uppercase tracking-[0.18em] text-white backdrop-blur-md">
                                    GPT Group × Swastika Telecom
                                </span>

                                <span
                                    class="inline-flex items-center gap-2 rounded-full border border-emerald-300/30 bg-emerald-400/15 px-3 py-2 text-[10px] font-black uppercase tracking-[0.14em] text-emerald-100 backdrop-blur-md">
                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                    Growing Together
                                </span>
                            </div>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 p-5 sm:p-7">
                            <div class="rounded-2xl border border-white/15 bg-slate-950/65 p-5 text-white shadow-2xl backdrop-blur-md sm:p-6">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-cyan-300">
                                    Shared Regional Vision
                                </p>

                                <h3 class="mt-3 text-2xl font-black leading-tight sm:text-3xl">
                                    Building a stronger technology distribution network across Africa.
                                </h3>

                                <p class="mt-3 text-sm leading-7 text-slate-200">
                                    Connecting reliable international supply with local dealer relationships,
                                    market knowledge and scalable operational support.
                                </p>

                                <div class="mt-5 grid grid-cols-3 gap-2">
                                    <div class="rounded-xl border border-white/10 bg-white/10 p-3">
                                        <p class="text-lg font-black">2+</p>
                                        <p class="mt-1 text-[9px] font-bold uppercase tracking-wide text-slate-300">Core Markets</p>
                                    </div>
                                    <div class="rounded-xl border border-white/10 bg-white/10 p-3">
                                        <p class="text-lg font-black">B2B</p>
                                        <p class="mt-1 text-[9px] font-bold uppercase tracking-wide text-slate-300">Channel Focus</p>
                                    </div>
                                    <div class="rounded-xl border border-white/10 bg-white/10 p-3">
                                        <p class="text-lg font-black">360°</p>
                                        <p class="mt-1 text-[9px] font-bold uppercase tracking-wide text-slate-300">Support Model</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Content Panel --}}
                    <div class="relative flex flex-col justify-center px-5 py-8 sm:px-8 sm:py-10 lg:px-10 xl:px-12">
                        <div class="pointer-events-none absolute right-0 top-0 h-44 w-44 rounded-bl-[7rem] bg-gradient-to-br from-blue-50 to-cyan-50"></div>

                        <div class="relative">
                            <div
                                class="inline-flex min-h-[92px] w-full max-w-[390px] items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-5 shadow-sm">
                                <img
                                    src="https://swastikatelecom.com/wp-content/uploads/2026/03/Logo-Final-350x97-1.png"
                                    alt="Swastika Telecom logo"
                                    class="h-auto w-[280px] max-w-full object-contain"
                                    loading="lazy">
                            </div>

                            <p class="mt-6 text-[10px] font-black uppercase tracking-[0.2em] text-blue-700">
                                Premium Vendor Partner
                            </p>

                            <h3 class="mt-2 text-2xl font-black leading-tight text-slate-950 sm:text-3xl">
                                One partnership designed for reliable supply, wider reach and long-term growth.
                            </h3>

                            <div class="mt-5 h-1 w-20 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500"></div>

                            <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-[15px]">
                                GPT Group supports the partnership through international supplier relationships,
                                strategic product sourcing, brand experience and operational planning. Swastika
                                Telecom adds strong local knowledge, dealer connections and retail reach across
                                Uganda and the Democratic Republic of the Congo.
                            </p>

                            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                                @foreach ([
                                    ['Global Sourcing', 'Reliable product access and supplier coordination.'],
                                    ['Channel Development', 'Dealer, reseller and retail network expansion.'],
                                    ['Operational Support', 'Planning, fulfilment, training and after-sales coordination.'],
                                    ['Market Expansion', 'New categories, territories and growth opportunities.'],
                                ] as [$title, $description])
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4 transition hover:-translate-y-0.5 hover:border-blue-200 hover:bg-blue-50/60">
                                        <span class="grid h-9 w-9 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>
                                        <h4 class="mt-3 text-sm font-black text-slate-950">{{ $title }}</h4>
                                        <p class="mt-1.5 text-xs leading-5 text-slate-600">{{ $description }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-6 rounded-2xl border border-blue-100 bg-gradient-to-r from-blue-50 via-white to-cyan-50 p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.18em] text-blue-700">
                                    Future Growth
                                </p>
                                <p class="mt-2 text-sm leading-7 text-slate-700">
                                    The collaboration can grow through wider product portfolios, stronger retail
                                    coverage, new brand partnerships, digital ordering systems and dedicated
                                    regional service networks.
                                </p>
                            </div>

                            <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                                <a href="https://swastikatelecom.com/" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-6 py-3 text-xs font-black text-white shadow-lg shadow-blue-700/20 transition hover:-translate-y-0.5 sm:text-sm">
                                    Visit Swastika Telecom
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14 3h7m0 0v7m0-7L10 14M5 5h5M5 5v14h14v-5" />
                                    </svg>
                                </a>

                                <a href="{{ route('contact') }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 text-xs font-black text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:text-blue-700 sm:text-sm">
                                    Partnership Enquiry
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   {{-- =========================================================
    GROUP COMPANIES - VERTICAL ALTERNATING DESIGN
========================================================= --}}


<section id="group-companies" class="relative overflow-hidden bg-slate-50 py-10 sm:py-12 lg:py-14">

    {{-- Decorative Background --}}
    <div
        class="pointer-events-none absolute -left-24 top-20 h-72 w-72 rounded-full bg-blue-100/60 blur-3xl">
    </div>

    <div
        class="pointer-events-none absolute -right-24 bottom-20 h-72 w-72 rounded-full bg-cyan-100/50 blur-3xl">
    </div>

    <div
        class="pointer-events-none absolute inset-0 opacity-[0.025]"
        style="
            background-image: radial-gradient(#0f172a 1px, transparent 1px);
            background-size: 26px 26px;
        ">
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Heading --}}
        <div class="mx-auto max-w-3xl text-center">

            <p
                class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.2em] text-blue-700">

                <span
                    class="h-0.5 w-8 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500">
                </span>

                Our Companies

                <span
                    class="h-0.5 w-8 rounded-full bg-gradient-to-r from-cyan-500 to-blue-700">
                </span>
            </p>

            <h2
                class="mt-4 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">

                A growing portfolio.
                <span
                    class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    One shared vision.
                </span>
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                Discover the growing network of businesses shaping GPT Group across technology,
                international trade, digital commerce, retail and project solutions.
                Our portfolio continues to evolve as new opportunities and companies join the Group.
            </p>
        </div>

        @php
            $companies = [
                [
                    'number' => '01',
                    'name' => 'Global Phone Technology',
                    'short_name' => 'GPT',
                    'logo' => null, //asset('assets/logo/GPT-Group-Logo.webp'),
                    'category' => 'Technology Distribution',
                    'image' =>asset('assets/frnt.png'),
                        // 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1400&q=80',
                    'description' =>
                        'Global Phone Technology is the core technology distribution company of GPT Group. It serves Oman’s consumer and business markets with mobile devices, smartphones, accessories, smart security products, professional displays and connected technology solutions.',
                    'tags' => ['Mobility', 'Smart Security', 'Distribution', 'B2B Supply'],
                    'website' => 'https://gptgroups.com/',
                ],
                [
                    'number' => '02',
                    'name' => 'Global Phone Technology International',
                    'short_name' => 'GPT International',
                    'logo' => null,
                    'category' => 'International Business',
                    'image' =>
                        'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1400&q=80',
                    'description' =>
                        'Global Phone Technology International supports the Group’s wider regional and international business activities. Its role is aligned with cross-border sourcing, strategic partnerships, market expansion and the development of new distribution opportunities.',
                    'tags' => ['International Trade', 'Market Expansion', 'Partnerships', 'Sourcing'],
                    'website' => null,
                ],
                [
                    'number' => '03',
                    'name' => 'Global Digital Company',
                    'short_name' => 'GDC',
                    'logo' => null,
                    'category' => 'Digital Commerce',
                    'image' =>
                        'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1400&q=80',
                    'description' =>
                        'Global Digital Company focuses on digital-first business opportunities, online commerce and technology-enabled customer experiences. It supports the Group’s transition toward scalable digital platforms, modern communication and connected business operations.',
                    'tags' => ['E-Commerce', 'Digital Platforms', 'Online Services', 'Technology'],
                    'website' => null,
                ],
                [
                    'number' => '04',
                    'name' => 'Mosaic',
                    'short_name' => 'Mosaic',
                    'logo' => null,
                    'category' => 'Lifestyle & Retail',
                    'image' => asset('assets/mosa.png'),
                        // 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1400&q=80',
                    'description' =>
                        'Mosaic represents the Group’s lifestyle and consumer-facing retail interests. The business is positioned around curated products, modern presentation and customer-focused retail experiences designed for evolving market preferences.',
                    'tags' => ['Retail', 'Lifestyle', 'Consumer Products', 'Customer Experience'],
                    'website' => null,
                ],
                [
                    'number' => '05',
                    'name' => 'Smart Concept Solutions',
                    'short_name' => 'SCS',
                    'logo' => asset('assets/logo brands/life smart.png'),
                    'category' => 'Technology Solutions',
                    'image' =>
                        'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1400&q=80',
                    'description' =>
                        'Smart Concept Solutions supports technology-led business requirements through practical, integrated and customer-focused solutions. Its capabilities are aligned with digital systems, smart technologies, connectivity and modern business infrastructure.',
                    'tags' => ['Smart Technology', 'IT Solutions', 'Connectivity', 'Business Systems'],
                    'website' => null,
                ],
                [
                    'number' => '06',
                    'name' => 'Global Spec',
                    'short_name' => 'Global Spec',
                    'logo' => null, //asset('assets/logo brands/gsp.jpeg'),
                    'category' => 'Architectural Hardware',
                    'image' =>asset('assets/globle.png'),
                        // 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1400&q=80',
                    'description' =>
                        'Global Spec Middle East is a specialist division of GPT Group serving architectural and project requirements. Its portfolio includes architectural hardware, decorative hardware, life-safety products, electronic access control, hotel locking systems and door solutions.',
                    'tags' => ['Architectural Hardware', 'Access Control', 'Door Solutions', 'Project Supply'],
                    'website' => 'https://globalspecworld.com/',
                ],
                // [
                //     'number' => '07',
                //     'name' => 'Merit',
                //     'short_name' => 'Merit',
                //     'logo' => asset('assets/logo brands/merit.jpeg'),
                //     'category' => 'Emerging Group Business',
                //     'image' =>
                //         'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1400&q=80',
                //     'description' =>
                //         'Merit is part of GPT Group’s expanding business portfolio, created to pursue new market opportunities with the same commitment to quality, customer value and sustainable growth that guides the wider Group.',
                //     'tags' => ['Business Growth', 'New Opportunities', 'Customer Value', 'GPT Group'],
                //     'website' => null,
                // ],
            ];
        @endphp

        {{-- Companies Vertical List --}}
        <div class="mt-9 space-y-6 sm:mt-10 lg:space-y-8">

            @foreach ($companies as $index => $company)
                @php
                    $imageOnLeft = $index % 2 === 0;
                @endphp

                <article
                    class="group relative overflow-hidden rounded-[1.6rem] border border-slate-200 bg-white shadow-[0_14px_40px_rgba(15,23,42,0.07)] transition duration-300 hover:border-blue-200 hover:shadow-[0_20px_55px_rgba(15,23,42,0.11)]">

                    <div class="grid items-stretch lg:grid-cols-2">

                        {{-- Company Image --}}
                        <div
                            class="relative min-h-[250px] overflow-hidden bg-slate-200 sm:min-h-[300px] lg:min-h-[350px]
                            {{ $imageOnLeft ? 'lg:order-1' : 'lg:order-2' }}">

                            <img
                                src="{{ $company['image'] }}"
                                alt="{{ $company['name'] }}"
                                class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]"
                                loading="lazy">

                            {{-- Image Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/15 to-transparent">
                            </div>

                            {{-- Category Badge --}}
                            <div class="absolute left-4 top-4 sm:left-5 sm:top-5">
                                <span
                                    class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-slate-950/55 px-3 py-1.5 text-[9px] font-black uppercase tracking-[0.16em] text-white shadow-md backdrop-blur-md sm:text-[10px]">

                                    <span class="h-1.5 w-1.5 rounded-full bg-cyan-400"></span>

                                    {{ $company['category'] }}
                                </span>
                            </div>

                            {{-- Company Number --}}
                            <div class="absolute right-4 top-4 sm:right-5 sm:top-5">
                                <span
                                    class="grid h-11 w-11 place-items-center rounded-xl border border-white/30 bg-white/90 text-xs font-black text-blue-700 shadow-lg backdrop-blur-md sm:h-12 sm:w-12">

                                    {{ $company['number'] }}
                                </span>
                            </div>

                            @if (filled($company['logo']))
                                <div class="absolute left-5 bottom-24 rounded-2xl border border-white/30 bg-white/95 px-5 py-4 shadow-xl backdrop-blur-md sm:left-6">
                                    <img src="{{ $company['logo'] }}"
                                        alt="{{ $company['name'] }} logo"
                                        class="max-h-14 w-auto max-w-[210px] object-contain"
                                        loading="lazy"
                                        onerror="this.closest('div').style.display='none'">
                                </div>
                            @endif

                            {{-- Image Bottom Title --}}
                            <div class="absolute inset-x-0 bottom-0 p-5 sm:p-6">

                                <p
                                    class="text-[10px] font-black uppercase tracking-[0.18em] text-cyan-300 sm:text-xs">
                                    GPT Group Company
                                </p>

                                <p class="mt-1 text-2xl font-black text-white sm:text-3xl">
                                    {{ $company['short_name'] }}
                                </p>
                            </div>
                        </div>

                        {{-- Company Content --}}
                        <div
                            class="relative flex flex-col justify-center px-5 py-7 sm:px-7 sm:py-8 lg:px-9 lg:py-9 xl:px-11
                            {{ $imageOnLeft ? 'lg:order-2' : 'lg:order-1' }}">

                            {{-- Decorative Number --}}
                            <span
                                class="pointer-events-none absolute right-5 top-2 text-[5rem] font-black leading-none text-slate-100 sm:text-[6rem]">
                                {{ $company['number'] }}
                            </span>

                            <div class="relative">

                                {{-- Small Label --}}
                                <div
                                    class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5">

                                    <span class="h-2 w-2 rounded-full bg-blue-600"></span>

                                    <span
                                        class="text-[9px] font-black uppercase tracking-[0.17em] text-blue-700 sm:text-[10px]">
                                        {{ $company['category'] }}
                                    </span>
                                </div>

                                {{-- Company Name --}}
                                <h3
                                    class="mt-4 max-w-xl text-2xl font-black leading-tight tracking-tight text-slate-950 sm:text-3xl lg:text-[2rem]">

                                    {{ $company['name'] }}
                                </h3>

                                {{-- Divider --}}
                                <div class="mt-4 flex items-center gap-2">

                                    <span
                                        class="h-1 w-12 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500">
                                    </span>

                                    <span class="h-1 w-2 rounded-full bg-blue-200"></span>

                                    <span class="h-1 w-2 rounded-full bg-cyan-200"></span>
                                </div>

                                {{-- Description --}}
                                <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-[15px]">
                                    {{ $company['description'] }}
                                </p>

                                {{-- Tags --}}
                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach ($company['tags'] as $tag)
                                        <span
                                            class="rounded-full border border-blue-100 bg-blue-50/80 px-3 py-1.5 text-[10px] font-black text-blue-700 transition group-hover:border-blue-200 group-hover:bg-blue-100/70 sm:text-[11px]">

                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>

                                {{-- Website Button --}}
                                @if (filled($company['website']))
                                    <div class="mt-6">
                                        <a
                                            href="{{ $company['website'] }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-5 py-2.5 text-xs font-black text-white shadow-md shadow-blue-700/15 transition duration-300 hover:-translate-y-0.5 hover:shadow-lg">

                                            Visit Company Website

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2.4">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14 3h7m0 0v7m0-7L10 14M5 5h5M5 5v14h14v-5" />
                                            </svg>
                                        </a>
                                    </div>
                                @else
                                    <div class="mt-6">
                                        <span
                                            class="inline-flex items-center gap-2 text-xs font-black text-blue-700">

                                            Part of GPT Group

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2.4">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>




 {{-- CONTINUOUS BRAND SLIDER --}}


   @php
        $partners = [
            [
                'name' => 'Samsung',
                'logo' => asset('assets/logo brands/sumsung.png'),
                'description' => 'Smartphones, tablets, wearables and connected consumer technology.',
                'initials' => 'SA',
            ],
            [
                'name' => 'Lava',
                'logo' => asset('assets/logo brands/lava.png'),
                'description' => 'Smartphones, feature phones and mobility products.',
                'initials' => 'LA',
            ],
            [
                'name' => 'Nothing',
                'logo' => asset('assets/logo brands/nothing.png'),
                'description' => 'Design-led smartphones, audio products and connected devices.',
                'initials' => 'NO',
            ],
            [
                'name' => 'Hikvision',
                'logo' => asset('assets/logo brands/hikvision.png'),
                'description' => 'Video surveillance, access control, intercom and security technologies.',
                'initials' => 'HK',
            ],
            [
                'name' => 'EZVIZ',
                'logo' => asset('assets/logo brands/ezviz.png'),
                'description' => 'Smart cameras, doorbells and connected home security products.',
                'initials' => 'EZ',
            ],
            [
                'name' => 'LifeSmart',
                'logo' => asset('assets/logo brands/life smart.png'),
                'description' => 'Smart-home automation, sensors, lighting and intelligent controls.',
                'initials' => 'LS',
            ],
            [
                'name' => 'Mobile Accessories',
                'logo' => asset('assets/logo brands/mobile-accessories.png'),
                'description' => 'Chargers, cables, audio products, power solutions and mobility accessories.',
                'initials' => 'MA',
            ],
            [
                'name' => 'Fibrain',
                'logo' => asset('assets/logo brands/fibrain.png'),
                'description' => 'Fiber-optic, FTTH and structured cabling solutions.',
                'initials' => 'FB',
            ],
            [
                'name' => 'Avlon',
                'logo' => asset('assets/logo brands/Avlon.png'),
                'description' => 'Structured cabling and network infrastructure products.',
                'initials' => 'AV',
            ],
            [
                'name' => 'Vivo',
                'logo' => asset('assets/logo brands/vivo.png'),
                'description' => 'Smartphones focused on design, camera and performance.',
                'initials' => 'VI',
            ],
            // [
            //     'name' => 'Honor',
            //     'logo' => asset('assets/logo brands/honor_huawei_together.jpg'),
            //     'description' => 'Smartphones, tablets, laptops, wearables and connected devices.',
            //     'initials' => 'HO',
            // ],
        ];

        $supportAreas = [
            [
                'title' => 'Market Development',
                'description' => 'Structured support for partner visibility, market expansion and channel growth.',
            ],
            [
                'title' => 'Channel Distribution',
                'description' => 'Product supply and coordination across dealers, resellers and retail networks.',
            ],
            [
                'title' => 'Project Support',
                'description' => 'Commercial and technical support for enterprise and project requirements.',
            ],
            [
                'title' => 'After-Sales Coordination',
                'description' => 'Warranty, product support and service coordination through the GPT ecosystem.',
            ],
        ];
    @endphp

      <style>
        .brand-slider {
            width: 100%;
            overflow: hidden;
            position: relative;
            padding: 8px 0 16px;
        }

        .brand-slider::before,
        .brand-slider::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: 70px;
            z-index: 5;
            pointer-events: none;
        }

        .brand-slider::before {
            left: 0;
            background: linear-gradient(to right, rgb(248 250 252), transparent);
        }

        .brand-slider::after {
            right: 0;
            background: linear-gradient(to left, rgb(248 250 252), transparent);
        }

        .brand-slider-track {
            display: flex;
            width: max-content;
            gap: 18px;
            animation: brandMarquee 68s linear infinite;
            will-change: transform;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
        }

        .brand-slider-track,
        .brand-card {
            -webkit-font-smoothing: antialiased;
        }

        .brand-slider:hover .brand-slider-track {
            animation-play-state: paused;
        }

        .brand-card {
            width: 300px;
            min-width: 300px;
        }

        @keyframes brandMarquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(calc(-50% - 9px));
            }
        }

        @media (max-width: 767px) {
            .brand-card {
                width: 260px;
                min-width: 260px;
            }

            .brand-slider-track {
                animation-duration: 52s;
            }

            .brand-slider::before,
            .brand-slider::after {
                width: 28px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .brand-slider-track {
                animation: brandMarquee 68s linear infinite !important;
            }
        }
    </style>
 
        <section id="partners" class="bg-slate-50 py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p
                        class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Complete Brand Portfolio
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Explore all technology brands.
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                        Browse the wider GPT Group brand ecosystem across mobile, security,
                        smart technology, networking and accessories.
                    </p>
                </div>
            </div>

            <div class="brand-slider mt-10">
                <div class="brand-slider-track">

                    {{-- First set --}}
                    @foreach ($partners as $partner)
                        <article
                            class="brand-card flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                            <div
                                class="relative grid h-32 place-items-center overflow-hidden rounded-xl border border-slate-100 bg-slate-50 p-5">
                                <span
                                    class="absolute grid h-14 w-14 place-items-center rounded-xl bg-blue-50 text-sm font-black text-blue-700">
                                    {{ $partner['initials'] }}
                                </span>

                                <img src="{{ $partner['logo'] }}" alt="{{ $partner['name'] }} logo"
                                    class="relative z-10 max-h-20 w-full object-contain" loading="lazy"
                                    onerror="this.style.display='none'">
                            </div>

                            <div class="flex flex-1 flex-col px-1 pb-1 pt-4">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $partner['name'] }}
                                </h3>

                                <p class="mt-2 flex-1 text-sm leading-7 text-slate-600">
                                    {{ $partner['description'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach

                    {{-- Duplicate set required for seamless infinite movement --}}
                    @foreach ($partners as $partner)
                        <article
                            class="brand-card flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg"
                            aria-hidden="true">

                            <div
                                class="relative grid h-32 place-items-center overflow-hidden rounded-xl border border-slate-100 bg-slate-50 p-5">
                                <span
                                    class="absolute grid h-14 w-14 place-items-center rounded-xl bg-blue-50 text-sm font-black text-blue-700">
                                    {{ $partner['initials'] }}
                                </span>

                                <img src="{{ $partner['logo'] }}" alt=""
                                    class="relative z-10 max-h-20 w-full object-contain" loading="lazy"
                                    onerror="this.style.display='none'">
                            </div>

                            <div class="flex flex-1 flex-col px-1 pb-1 pt-4">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $partner['name'] }}
                                </h3>

                                <p class="mt-2 flex-1 text-sm leading-7 text-slate-600">
                                    {{ $partner['description'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </section>


    {{-- Group Model --}}
    <section class="bg-white py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-[.95fr_1.05fr] lg:gap-14">
                <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                    <img src="{{asset('assets/office img.png') }}"
                        alt="GPT Group shared business model" class="h-[300px] w-full rounded-xl object-cover sm:h-[360px]"
                        loading="lazy">
                </div>

                <div>
                    <p
                        class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        How We Work
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Independent companies supported by
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">shared group
                            strength.</span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        Each company maintains its own specialist focus while drawing value from
                        GPT Group’s market experience, partner relationships, operational knowledge
                        and regional business network.
                    </p>

                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Shared Market Knowledge</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                Strong understanding of Oman and GCC customer and channel requirements.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Partner Relationships</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                Long-term cooperation with brands, suppliers, dealers and project partners.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Operational Support</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                Shared experience in sourcing, distribution, marketing and customer service.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Growth Orientation</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                A business culture focused on innovation, expansion and sustainable relationships.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-slate-50 py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-xl sm:p-10 lg:p-12">
                <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-200">
                            Work With GPT Group
                        </p>

                        <h2 class="mt-4 max-w-3xl text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                            Build new opportunities with a diversified business group.
                        </h2>

                        <p class="mt-4 max-w-2xl text-base leading-8 text-blue-50">
                            Connect with GPT Group for distribution, technology, digital,
                            retail or project partnership opportunities in Oman and the GCC.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="inline-flex min-w-44 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-0.5">
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection