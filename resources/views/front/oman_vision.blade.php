@extends('front_pages.front_components.main')

@section('content')



{{-- =========================================================
    01. COMPACT HERO
========================================================= --}}

<section
    class="relative overflow-hidden bg-slate-950 bg-cover bg-center py-10 text-white sm:py-12 lg:py-14"
    style="background-image:
        linear-gradient(110deg, rgba(15,23,42,.96), rgba(30,64,175,.88), rgba(8,145,178,.72)),
        url({{ asset('assets/mus.jpg') }});"
>

    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/70 via-slate-950/45 to-transparent"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-8 lg:grid-cols-[1.05fr_.95fr] lg:gap-10">

            {{-- Left Content --}}
            <div class="max-w-3xl">

                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1.5 text-[10px] font-black uppercase tracking-[.16em] text-white sm:text-xs">
                    <span class="h-2 w-2 rounded-full bg-cyan-300"></span>
                    GPT Group & Oman Vision 2040
                </div>

                <h1 class="mt-4 text-3xl font-black leading-[1.1] tracking-tight sm:text-4xl lg:text-5xl">
                    Building a safer, smarter and
                    <span class="block text-cyan-300">
                        digitally connected Oman.
                    </span>
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-6 text-blue-50 sm:text-base sm:leading-7">
                    GPT Group supports Oman Vision 2040 through technology
                    distribution, smart security, digital infrastructure,
                    local capability development and long-term partnerships.
                </p>

                <p class="mt-2.5 max-w-2xl text-sm leading-6 text-blue-100">
                    Together with trusted global brands such as Hikvision,
                    GPT Group aims to help businesses and communities improve
                    safety, efficiency, connectivity and sustainable growth.
                </p>

                <div class="mt-5 flex flex-wrap gap-3">

                    <a
                        href="#gpt-contribution"
                        class="inline-flex rounded-full bg-white px-5 py-2.5 text-xs font-black text-slate-950 shadow-lg transition hover:-translate-y-0.5 sm:text-sm"
                    >
                        Explore Our Contribution
                    </a>

                    <a
                        href="#hikvision-role"
                        class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-2.5 text-xs font-black text-white transition hover:-translate-y-0.5 hover:bg-white/20 sm:text-sm"
                    >
                        Hikvision Technology Role
                    </a>

                </div>

                <div class="mt-6 grid max-w-2xl grid-cols-2 gap-3 sm:grid-cols-4">

                    @foreach ([
                        [
                            'value' => '2040',
                            'label' => 'National Vision',
                        ],
                        [
                            'value' => 'Digital',
                            'label' => 'Transformation',
                        ],
                        [
                            'value' => 'Secure',
                            'label' => 'Infrastructure',
                        ],
                        [
                            'value' => 'Local',
                            'label' => 'Capability Growth',
                        ],
                    ] as $fact)

                        <div class="rounded-xl border border-white/15 bg-white/10 p-3">

                            <p class="text-lg font-black text-cyan-300 sm:text-xl">
                                {{ $fact['value'] }}
                            </p>

                            <p class="mt-1 text-[10px] font-bold leading-4 text-blue-50 sm:text-xs">
                                {{ $fact['label'] }}
                            </p>

                        </div>

                    @endforeach
                </div>
            </div>


            {{-- Right Image Area --}}
            <div class="relative">

                <div class="overflow-hidden rounded-2xl border border-white/20 bg-white/10 p-3 shadow-xl">

                    <img
                        src="{{ asset('assets/mus.jpg') }}"
                        alt="Oman modern city and development"
                        class="h-[280px] w-full rounded-xl object-cover sm:h-[340px] lg:h-[380px]"
                        loading="eager"
                        fetchpriority="high"
                    >

                </div>


                {{-- Floating Hikvision Card --}}
                <div class="absolute -bottom-5 left-4 right-4 rounded-2xl border border-white/20 bg-white p-4 text-slate-950 shadow-xl sm:left-6 sm:right-auto sm:w-[290px]">

                    <p class="text-[10px] font-black uppercase tracking-[.16em] text-blue-700">
                        Technology Partner Focus
                    </p>

                    <div class="mt-2 flex items-center justify-between gap-4">

                        <div>
                            <h3 class="text-lg font-black">
                                Hikvision Solutions
                            </h3>

                            <p class="mt-1 text-xs leading-5 text-slate-600">
                                Video security, access control, intercom and AIoT.
                            </p>
                        </div>

                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-blue-700 text-white">
                            ↗
                        </span>

                    </div>
                </div>


                {{-- Small GPT Badge --}}
                <div class="absolute right-4 top-4 rounded-xl border border-white/20 bg-slate-950/70 px-4 py-3 text-white shadow-lg">

                    <p class="text-[10px] font-black uppercase tracking-[.15em] text-cyan-300">
                        GPT Group
                    </p>

                    <p class="mt-1 text-sm font-black">
                        Technology for Oman
                    </p>

                </div>

            </div>

        </div>
    </div>
</section>



{{-- =========================================================
    02. INTRODUCTION
========================================================= --}}

<section class="bg-white py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-8 lg:grid-cols-[1.05fr_.95fr] lg:gap-12">

            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                    National Direction
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Technology, knowledge and innovation for
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        sustainable national growth.
                    </span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    Oman Vision 2040 provides the national direction for economic
                    and social development. Its priorities include a diversified
                    economy, private-sector participation, innovation, capable
                    national talent, effective institutions and sustainable use
                    of resources.
                </p>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    GPT Group’s proposed contribution is centered on areas where
                    technology can create measurable value: secure facilities,
                    connected infrastructure, efficient operations, modern retail,
                    digital services and professional technology support.
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">

                    <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3">
                        <span class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3-icon">✓</span>

                        <p class="text-sm font-semibold leading-6 text-slate-700">
                            Secure digital and physical infrastructure
                        </p>
                    </div>

                    <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3">
                        <span class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3-icon">✓</span>

                        <p class="text-sm font-semibold leading-6 text-slate-700">
                            Knowledge transfer and technical training
                        </p>
                    </div>

                    <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3">
                        <span class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3-icon">✓</span>

                        <p class="text-sm font-semibold leading-6 text-slate-700">
                            Private-sector and SME enablement
                        </p>
                    </div>

                    <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3">
                        <span class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3-icon">✓</span>

                        <p class="text-sm font-semibold leading-6 text-slate-700">
                            Responsible and sustainable business growth
                        </p>
                    </div>

                </div>
            </div>


            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg p-3">

                <img
                    src="{{ asset('assets/oman2040.jpg') }}"
                    alt="Modern infrastructure supporting Oman Vision 2040"
                    class="h-[330px] w-full rounded-[1.15rem] object-cover sm:h-[400px] lg:h-[460px]"
                    loading="lazy"
                >

                <div class="mt-3 rounded-xl bg-gradient-to-r from-blue-700 to-cyan-500 p-5 text-white">

                    <p class="text-xs font-black uppercase tracking-[.18em] text-blue-100">
                        GPT Group Direction
                    </p>

                    <p class="mt-2 text-xl font-black">
                        Global technology with strong local execution.
                    </p>

                    <p class="mt-2 text-sm leading-6 text-blue-50">
                        Connecting international innovation with the real needs
                        of customers, businesses and development projects in Oman.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    03. VISION PILLARS
========================================================= --}}

@php
    $visionPillars = [
        [
            'number' => '01',
            'title' => 'Digital Economy',
            'description' =>
                'Supporting the adoption of connected systems, modern technology products and digitally enabled services that improve productivity and customer experience.',
        ],
        [
            'number' => '02',
            'title' => 'Economic Diversification',
            'description' =>
                'Expanding technology distribution, security solutions, smart infrastructure, IT services and project-based business opportunities.',
        ],
        [
            'number' => '03',
            'title' => 'Private-Sector Growth',
            'description' =>
                'Creating opportunities for dealers, installers, service partners, SMEs and enterprise solution providers across Oman.',
        ],
        [
            'number' => '04',
            'title' => 'Human Capital',
            'description' =>
                'Developing local technical knowledge through product training, installation support, certification pathways and practical experience.',
        ],
        [
            'number' => '05',
            'title' => 'Safe Communities',
            'description' =>
                'Helping organizations strengthen monitoring, access management, emergency awareness and operational security.',
        ],
        [
            'number' => '06',
            'title' => 'Sustainable Development',
            'description' =>
                'Promoting efficient systems, responsible technology use, longer product life cycles and maintainable infrastructure.',
        ],
    ];
@endphp

<section class="bg-slate-50 py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                Strategic Alignment
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Areas where GPT Group can support
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    Oman Vision 2040.
                </span>
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                GPT Group’s role can extend beyond product supply by building a
                technology ecosystem involving global brands, local businesses,
                technical teams, dealers and end users.
            </p>

        </div>


        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($visionPillars as $pillar)

                <article class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg p-5 sm:p-6">

                    <div class="flex items-start justify-between gap-4">

                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 text-xs font-black text-white shadow-lg">
                            {{ $pillar['number'] }}
                        </span>

                        <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>

                    </div>

                    <h3 class="mt-5 text-xl font-black text-slate-950">
                        {{ $pillar['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $pillar['description'] }}
                    </p>

                </article>

            @endforeach
        </div>
    </div>
</section>


{{-- =========================================================
    04. GPT GROUP CONTRIBUTION
========================================================= --}}

@php
    $gptContributions = [
        [
            'title' => 'Technology Distribution',
            'description' =>
                'Bringing trusted international technology products to Oman through structured retail, dealer, business and project channels.',
        ],
        [
            'title' => 'Solution Design',
            'description' =>
                'Helping customers identify suitable security, mobile, connectivity and infrastructure solutions based on operational requirements.',
        ],
        [
            'title' => 'Project Coordination',
            'description' =>
                'Supporting planning, product selection, deployment coordination, documentation and post-installation service requirements.',
        ],
        [
            'title' => 'Local Partner Network',
            'description' =>
                'Developing relationships with contractors, installers, dealers, service providers, SMEs and technology professionals.',
        ],
        [
            'title' => 'Training & Enablement',
            'description' =>
                'Providing product orientation, technical demonstrations and practical guidance to improve local product and solution capabilities.',
        ],
        [
            'title' => 'After-Sales Support',
            'description' =>
                'Strengthening customer confidence through responsive service, warranty coordination, troubleshooting and lifecycle support.',
        ],
    ];
@endphp

<section id="gpt-contribution" class="bg-white py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-8 lg:grid-cols-[.9fr_1.1fr] lg:gap-12">

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg p-3">

                <img
                    src="{{ asset('assets/bu hnd 2.jpg') }}"
                    alt="GPT Group business and technology collaboration"
                    class="h-[340px] w-full rounded-[1.15rem] object-cover sm:h-[410px] lg:h-[520px]"
                    loading="lazy"
                >

            </div>


            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                    GPT Group Contribution
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Turning technology partnerships into
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        practical national value.
                    </span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    GPT Group can contribute by creating a complete route from
                    technology brands to real-world adoption. This includes
                    product availability, market education, solution support,
                    partner development and reliable after-sales coordination.
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">

                    @foreach ($gptContributions as $item)

                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg p-4">

                            <h3 class="text-base font-black text-slate-950">
                                {{ $item['title'] }}
                            </h3>

                            <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                {{ $item['description'] }}
                            </p>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    05. HIKVISION ROLE
========================================================= --}}

@php
    $hikvisionSolutions = [
        [
            'title' => 'Video Security',
            'description' =>
                'Network and conventional camera systems can strengthen awareness, incident review and monitoring across public and private facilities.',
        ],
        [
            'title' => 'Access Control',
            'description' =>
                'Controlled entry systems can help organizations manage employee, visitor and restricted-area access more effectively.',
        ],
        [
            'title' => 'Video Intercom',
            'description' =>
                'Integrated door communication can improve convenience and security in residential, commercial and institutional environments.',
        ],
        [
            'title' => 'Alarm Integration',
            'description' =>
                'Connected alarm systems can support faster notification and coordinated response for security-related events.',
        ],
        [
            'title' => 'Central Management',
            'description' =>
                'Centralized platforms can help operators manage multiple devices, locations, alerts and video resources from a unified environment.',
        ],
        [
            'title' => 'AIoT Capability',
            'description' =>
                'AI-enabled connected systems can support smarter event detection, operational insights and automation when deployed responsibly.',
        ],
    ];
@endphp

<section id="hikvision-role" class="relative overflow-hidden bg-slate-950 py-10 text-white sm:py-12 lg:py-16">

    <div class="pointer-events-none absolute right-0 top-0 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 left-0 h-96 w-96 rounded-full bg-cyan-500/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-8 lg:grid-cols-[1.05fr_.95fr] lg:gap-12">

            <div>

                <div class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[.18em] text-cyan-300">
                    Hikvision Technology Ecosystem
                </div>

                <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                    Smart security infrastructure for a
                    <span class="block text-cyan-300">
                        safer and more efficient Oman.
                    </span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-300">
                    Hikvision offers video security and AIoT capabilities,
                    together with access control, video intercom, alarm and
                    management solutions. Through suitable planning and
                    responsible implementation, these systems can support safer
                    facilities and more informed operations.
                </p>

                <p class="mt-3 text-base leading-7 text-slate-300">
                    GPT Group’s role is to connect such global technology with
                    Oman’s local requirements through product availability,
                    solution consultation, project coordination, partner support
                    and after-sales services.
                </p>

                <a
                    href="https://www.hikvision.com/en/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-0.5"
                >
                    Visit Hikvision Official Website
                    <span>↗</span>
                </a>

            </div>


            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg border-white/10 bg-white/5 p-3">

                <img
                    src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1200&q=76"
                    alt="Smart video security and surveillance solutions"
                    class="h-[330px] w-full rounded-[1.15rem] object-cover sm:h-[400px] lg:h-[450px]"
                    loading="lazy"
                >

                <div class="mt-3 grid grid-cols-2 gap-3">

                    <div class="rounded-xl border border-white/10 bg-white/10 p-4">

                        <p class="text-xl font-black text-cyan-300">
                            AIoT
                        </p>

                        <p class="mt-1 text-xs font-semibold leading-5 text-slate-200">
                            Connected intelligence for monitoring and automation.
                        </p>

                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/10 p-4">

                        <p class="text-xl font-black text-cyan-300">
                            Integrated
                        </p>

                        <p class="mt-1 text-xs font-semibold leading-5 text-slate-200">
                            Video, access, intercom and alarm capabilities.
                        </p>

                    </div>

                </div>
            </div>
        </div>


        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($hikvisionSolutions as $solution)

                <article class="rounded-2xl border border-white/10 bg-white/5 p-5 transition hover:-translate-y-0.5 hover:bg-white/10">

                    <div class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 text-sm font-black text-white">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <h3 class="mt-4 text-xl font-black text-white">
                        {{ $solution['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-300">
                        {{ $solution['description'] }}
                    </p>

                </article>

            @endforeach
        </div>
    </div>
</section>


{{-- =========================================================
    06. SECTOR BENEFITS
========================================================= --}}

@php
    $sectorBenefits = [
        [
            'name' => 'Government & Public Services',
            'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1000&q=76',
            'description' =>
                'Secure facilities, controlled entry, centralized monitoring and improved situational awareness.',
        ],
        [
            'name' => 'Logistics & Warehousing',
            'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1000&q=76',
            'description' =>
                'Asset visibility, perimeter monitoring, controlled zones and more efficient site supervision.',
        ],
        [
            'name' => 'Retail & Commercial',
            'image' => asset('assets/com/c1.jpg'),
            'description' =>
                'Safer stores, operational visibility, loss prevention support and better customer-area management.',
        ],
        [
            'name' => 'Education & Training',
            'image' => 'https://img.magnific.com/free-photo/learning-education-ideas-insight-intelligence-study-concept_53876-120116.jpg?semt=ais_hybrid&w=740&q=76',
            'description' =>
                'Improved campus awareness, managed access and safer learning environments.',
        ],
        [
            'name' => 'Hospitality & Tourism',
            'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1000&q=76',
            'description' =>
                'Guest-area security, restricted-zone management and reliable site monitoring.',
        ],
        [
            'name' => 'Residential Communities',
            'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1000&q=76',
            'description' =>
                'Video intercom, managed entry, smart alerts and connected security for modern living.',
        ],
    ];
@endphp

<section class="bg-slate-50 py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                Sector-Level Impact
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Practical technology benefits across
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    Oman’s growing sectors.
                </span>
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                The value of technology is created when it solves real operational
                needs. GPT Group can support different sectors with appropriately
                selected and professionally coordinated solutions.
            </p>

        </div>


        <div class="mt-9 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($sectorBenefits as $sector)

                <article class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg group overflow-hidden">

                    <div class="h-48 overflow-hidden">

                        <img
                            src="{{ $sector['image'] }}"
                            alt="{{ $sector['name'] }}"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                            loading="lazy"
                        >

                    </div>

                    <div class="p-5">

                        <h3 class="text-xl font-black text-slate-950">
                            {{ $sector['name'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $sector['description'] }}
                        </p>

                    </div>
                </article>

            @endforeach
        </div>
    </div>
</section>


{{-- =========================================================
    07. NATIONAL TALENT & EMPLOYMENT
========================================================= --}}

<section class="bg-white py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-12">

            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                    Human Capital Development
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Developing local skills for a
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        technology-driven economy.
                    </span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    Sustainable technology growth requires more than importing
                    products. It requires trained people who can advise, install,
                    configure, maintain and support modern systems.
                </p>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    GPT Group can contribute by creating practical learning and
                    employment pathways for Omani professionals, technicians,
                    sales teams, project coordinators and service specialists.
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">

                    @foreach ([
                        'Technical product training',
                        'Installation and configuration guidance',
                        'Sales and solution-consulting skills',
                        'Project and after-sales experience',
                        'Dealer and SME enablement',
                        'Internship and career pathways',
                    ] as $skill)

                        <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3">

                            <span class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3-icon">✓</span>

                            <p class="text-sm font-semibold leading-6 text-slate-700">
                                {{ $skill }}
                            </p>

                        </div>

                    @endforeach

                </div>
            </div>


            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg p-3">

                <img
                    src="{{ asset('assets/com/tr.png') }}"
                    alt="Technical training and local talent development"
                    class="h-[340px] w-full rounded-[1.15rem] object-cover sm:h-[410px] lg:h-[480px]"
                    loading="lazy"
                >

                <div class="mt-3 rounded-xl border border-blue-100 bg-blue-50 p-5">

                    <p class="text-xs font-black uppercase tracking-[.18em] text-blue-700">
                        Long-Term Value
                    </p>

                    <p class="mt-2 text-xl font-black text-slate-950">
                        Technology capability retained within Oman.
                    </p>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Stronger local skills can improve service quality,
                        create employment and reduce dependency on external
                        technical support.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    08. SUSTAINABILITY
========================================================= --}}

<section class="bg-slate-50 py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-8 lg:grid-cols-[.9fr_1.1fr] lg:gap-12">

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg p-3">

                <img
                    src="https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?auto=format&fit=crop&w=1200&q=76"
                    alt="Sustainable technology and infrastructure"
                    class="h-[330px] w-full rounded-[1.15rem] object-cover sm:h-[400px] lg:h-[460px]"
                    loading="lazy"
                >

            </div>


            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                    Responsible Growth
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Sustainable technology built around
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        efficiency and long-term value.
                    </span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    GPT Group can support sustainable development by promoting
                    correctly sized systems, reliable products, planned
                    maintenance and responsible technology lifecycle management.
                </p>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">

                    @foreach ([
                        [
                            'title' => 'Efficient System Design',
                            'description' =>
                                'Selecting suitable technology according to actual site and operational needs.',
                        ],
                        [
                            'title' => 'Longer Product Lifecycle',
                            'description' =>
                                'Supporting maintainable products through service, warranty and replacement planning.',
                        ],
                        [
                            'title' => 'Reduced Operational Waste',
                            'description' =>
                                'Using centralized and connected systems to improve resource and process efficiency.',
                        ],
                        [
                            'title' => 'Responsible Partnerships',
                            'description' =>
                                'Working with established brands and capable local delivery partners.',
                        ],
                    ] as $item)

                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg p-5">

                            <h3 class="text-lg font-black text-slate-950">
                                {{ $item['title'] }}
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $item['description'] }}
                            </p>

                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    09. ROADMAP
========================================================= --}}

@php
    $roadmap = [
        [
            'phase' => 'Phase 01',
            'title' => 'Foundation & Market Alignment',
            'description' =>
                'Identify priority sectors, strengthen product availability, develop local partnerships and understand project requirements.',
        ],
        [
            'phase' => 'Phase 02',
            'title' => 'Capability & Partner Development',
            'description' =>
                'Conduct product demonstrations, technical training, installer enablement and dealer-support activities.',
        ],
        [
            'phase' => 'Phase 03',
            'title' => 'Smart Solution Deployment',
            'description' =>
                'Support integrated security, access, intercom, monitoring and connected infrastructure projects.',
        ],
        [
            'phase' => 'Phase 04',
            'title' => 'Service & Lifecycle Support',
            'description' =>
                'Strengthen maintenance coordination, customer service, warranty processes and technical troubleshooting.',
        ],
        [
            'phase' => 'Phase 05',
            'title' => 'Innovation & Sustainable Expansion',
            'description' =>
                'Expand intelligent solutions, support SMEs and create scalable technology services aligned with Oman’s long-term development.',
        ],
    ];
@endphp

<section class="bg-white py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-700">
                Contribution Roadmap
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                A practical path from technology supply to
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    long-term impact.
                </span>
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                GPT Group’s proposed roadmap focuses on building capability,
                supporting responsible deployments and creating lasting value
                for customers, partners and the local technology ecosystem.
            </p>

        </div>


        <div class="relative mx-auto mt-10 max-w-4xl space-y-5">
            <div class="absolute bottom-5 left-5 top-5 w-0.5 bg-gradient-to-b from-blue-600 via-cyan-500 to-emerald-500"></div>

            @foreach ($roadmap as $item)

                <div class="flex items-start gap-4">

                    <div class="relative z-10 grid h-10 w-10 shrink-0 place-items-center rounded-full bg-gradient-to-br from-blue-700 to-cyan-500 text-[11px] font-black text-white shadow-sm">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg flex-1 p-5 sm:p-6">

                        <p class="text-[11px] font-black uppercase tracking-[.18em] text-blue-700">
                            {{ $item['phase'] }}
                        </p>

                        <h3 class="mt-2 text-xl font-black text-slate-950">
                            {{ $item['title'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $item['description'] }}
                        </p>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>


{{-- =========================================================
    10. SHARED VISION
========================================================= --}}

<section class="bg-slate-50 py-10 sm:py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">

            <div class="grid items-center gap-8 lg:grid-cols-[1.2fr_.8fr]">

                <div>

                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        GPT Group Shared Vision
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Growing together with Oman through technology,
                        skills and trusted partnerships.
                    </h2>

                    <p class="mt-4 max-w-4xl text-base leading-7 text-blue-50">
                        GPT Group’s ambition is to participate responsibly in
                        Oman’s development journey by connecting global
                        innovation with local opportunity. Alongside technology
                        partners such as Hikvision, the Group can support safer
                        infrastructure, stronger businesses, capable national
                        talent and a more connected digital economy.
                    </p>

                    <p class="mt-3 max-w-4xl text-sm leading-6 text-blue-100">
                        This page describes GPT Group’s intended contribution and
                        strategic alignment. It does not claim to represent an
                        official government programme or formal Oman Vision 2040
                        endorsement.
                    </p>

                </div>


                <div class="flex flex-wrap gap-3 lg:justify-end">

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-0.5"
                    >
                        Partner With GPT Group
                    </a>

                    <a
                        href="https://www.oman2040.om/?lang=en"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex rounded-full bg-slate-950 px-7 py-3.5 text-sm font-black text-white shadow-xl transition hover:-translate-y-0.5"
                    >
                        Visit Oman Vision 2040
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection