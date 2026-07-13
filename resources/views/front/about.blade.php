@extends('front_pages.front_components.main')

@section('content')
    <style>
        :root {
            --gpt-blue: #2563eb;
            --gpt-cyan: #06b6d4;
            --gpt-dark: #0f172a;
        }

        .about-section-soft {
            background:
                radial-gradient(circle at top right, rgba(34, 211, 238, .08), transparent 28%),
                linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--gpt-blue), var(--gpt-cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-label {
            color: #1d4ed8;
            font-size: .75rem;
            font-weight: 900;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .soft-card {
            border: 1px solid rgba(226, 232, 240, .95);
            border-radius: 1.25rem;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 12px 38px rgba(15, 23, 42, .06);
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .soft-card:hover {
            transform: translateY(-5px);
            border-color: rgba(37, 99, 235, .18);
            box-shadow: 0 20px 52px rgba(37, 99, 235, .11);
        }

        .soft-image-card {
            border: 1px solid rgba(226, 232, 240, .95);
            border-radius: 1.5rem;
            background: #ffffff;
            box-shadow: 0 16px 45px rgba(15, 23, 42, .08);
        }

        .timeline-line {
            position: relative;
        }

        .timeline-line::before {
            content: "";
            position: absolute;
            top: 1.25rem;
            bottom: 1.25rem;
            left: 1.15rem;
            width: 2px;
            background: linear-gradient(to bottom, #2563eb, #06b6d4);
        }

        .timeline-dot {
            position: relative;
            z-index: 2;
            display: grid;
            height: 2.4rem;
            width: 2.4rem;
            flex: 0 0 2.4rem;
            place-items: center;
            border-radius: 999px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            color: #ffffff;
            font-size: .62rem;
            font-weight: 900;
            box-shadow: 0 8px 22px rgba(37, 99, 235, .22);
        }

        .about-check {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            border-radius: .9rem;
            background: #ffffff;
            padding: .8rem .9rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, .05);
            border: 1px solid #f1f5f9;
        }

        .about-check-icon {
            margin-top: .1rem;
            display: grid;
            height: 1.45rem;
            width: 1.45rem;
            flex: 0 0 1.45rem;
            place-items: center;
            border-radius: 999px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            color: #ffffff;
            font-size: .65rem;
            font-weight: 900;
        }
    </style>

    {{-- 01. PAGE HERO --}}
    @include('front.sections.page_hero', ['pageSlug' => 'about'])

    {{-- 02. QUICK FACTS --}}
    @if (isset($quickFactSection) && $quickFactSection && $quickFactSection->activeItems->count())
        <section class="relative z-10 -mt-5 bg-transparent">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($quickFactSection->activeItems as $fact)
                        <div class="soft-card p-5">
                            <p class="text-gradient text-3xl font-black">{{ $fact->value }}</p>
                            <p class="mt-1 text-sm font-black text-slate-900">{{ $fact->title }}</p>

                            @if ($fact->description)
                                <p class="mt-1.5 text-xs leading-5 text-slate-500">
                                    {{ $fact->description }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



     {{-- 09. FOUNDER & LEADERSHIP --}}

    @if (isset($founderSection) && $founderSection)
        <section class="about-section-soft py-10 sm:py-12 lg:py-14">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">
                    <div class="soft-image-card p-3">
                        @if ($founderSection->image)
                            <img class="h-[300px] w-full rounded-[1.2rem] object-cover sm:h-[370px] lg:h-[420px]"
                                src="{{ asset('storage/' . $founderSection->image) }}" alt="{{ $founderSection->title }}"
                                loading="lazy">
                        @else
                            <img class="h-[300px] w-full rounded-[1.2rem] object-cover sm:h-[370px] lg:h-[420px]"
                                src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}" alt="{{ $founderSection->title }}"
                                loading="lazy">
                        @endif
                    </div>

                    <div>
                        <p class="section-label">{{ $founderSection->label ?: 'Founder & Leadership' }}</p>

                        <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $founderSection->title }}
                        </h2>

                        @if ($founderSection->description)
                            <p class="mt-4 text-base leading-7 text-slate-600">
                                {{ $founderSection->description }}
                            </p>
                        @endif

                        <div class="mt-5 grid gap-3 sm:grid-cols-3">
                            @foreach ([1, 2, 3] as $i)
                                @php
                                    $value = $founderSection->{'stat_' . $i . '_value'} ?? null;
                                    $label = $founderSection->{'stat_' . $i . '_label'} ?? null;
                                @endphp

                                @if ($value || $label)
                                    <div class="soft-card p-4">
                                        <p class="text-gradient text-2xl font-black">{{ $value }}</p>
                                        <p class="mt-1 text-xs font-semibold text-slate-600">{{ $label }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- @if ($founderSection->button_text)
                            <a href="{{ $founderSection->button_link ?: '#' }}"
                                class="mt-5 inline-flex rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1">
                                {{ $founderSection->button_text }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- 03. COMPANY HISTORY & OVERVIEW --}}
    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[1.05fr_.95fr] lg:gap-10">
                <div>
                    <p class="section-label">Company History & Vision</p>

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Global Phone Technology LLC
                        <span class="block text-gradient">built for innovation and growth.</span>
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600">
                        Founded with a vision for innovation and growth, GPT Group has emerged as a technology
                        distribution and solutions business serving Oman, the wider GCC and selected international markets.
                    </p>

                    <p class="mt-3 text-base leading-7 text-slate-600">
                        The Group supports mobile and consumer electronics, security solutions, IT infrastructure,
                        retail operations and trading through dependable execution and strong market relationships.
                    </p>

                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        <div class="soft-card p-5">
                            <p class="text-gradient text-2xl font-black">Oman</p>
                            <h3 class="mt-2 text-lg font-black text-slate-950">Strong Local Base</h3>
                            <p class="mt-1.5 text-sm leading-6 text-slate-500">
                                Retail support, B2B supply, distribution and customer service.
                            </p>
                        </div>

                        <div class="soft-card p-5">
                            <p class="text-gradient text-2xl font-black">GCC+</p>
                            <h3 class="mt-2 text-lg font-black text-slate-950">Regional Ambition</h3>
                            <p class="mt-1.5 text-sm leading-6 text-slate-500">
                                Partner-led growth across GCC and selected global markets.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <img class="h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Group distribution" loading="lazy">

                    <img class="mt-5 h-44 w-full rounded-2xl object-cover shadow-lg sm:mt-7 sm:h-52 lg:h-56"
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Group technology" loading="lazy">

                    <img class="h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Group team" loading="lazy">

                    <div
                        class="mt-5 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 p-5 text-white shadow-lg sm:mt-7">
                        <p class="text-3xl font-black">GPT</p>
                        <p class="mt-2 text-lg font-black">Technology. Distribution. Solutions.</p>
                        <p class="mt-2 text-xs leading-5 text-blue-50">
                            A unified business platform for brands, partners and enterprise customers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 04. GPT GROUP CONCEPTION --}}
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[.9fr_1.1fr] lg:gap-10">
                <div class="soft-image-card p-3">
                    <img class="h-[270px] w-full rounded-[1.2rem] object-cover sm:h-[330px] lg:h-[360px]"
                        src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1200&q=82"
                        alt="GPT Group conception" loading="lazy">
                </div>

                <div>
                    <p class="section-label">GPT Group Conception</p>

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Born from telecom experience and a clear regional opportunity.
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600">
                        GPT Group was conceived to bridge the gap between global technology brands and customers
                        seeking reliable products, distribution support and professional market execution in Oman.
                    </p>

                    <p class="mt-3 text-base leading-7 text-slate-600">
                        From its foundation, the Group focused on connecting innovative products with retailers,
                        businesses and end users while building long-term partnerships based on trust and responsiveness.
                    </p>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Brand-to-market connectivity</p>
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Reliable local execution</p>
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Customer-focused distribution</p>
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Long-term partnerships</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 05. EARLY DAYS / CURRENT STANDING / FUTURE VISION --}}
    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">Growth Story</p>
                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    From a focused beginning to an integrated technology group.
                </h2>
            </div>

            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">01</p>
                    <h3 class="mt-3 text-xl font-black text-slate-950">Early Days</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        GPT Group initially focused on establishing a strong base in Oman, building distribution
                        relationships with retailers, dealers and customers while understanding the region's market
                        dynamics.
                    </p>
                </div>

                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">02</p>
                    <h3 class="mt-3 text-xl font-black text-slate-950">Current Standing</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Today, the Group operates across technology distribution, retail, security, IT infrastructure
                        and trading with a growing network of partners and customers.
                    </p>
                </div>

                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">03</p>
                    <h3 class="mt-3 text-xl font-black text-slate-950">Future Vision</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        GPT Group aims to strengthen software, IT services, e-commerce, sustainable business practices
                        and job creation while supporting the economic vision of Oman.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 06. CUSTOMER SATISFACTION & MARKET PRESENCE --}}
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-end gap-5 lg:grid-cols-[.9fr_1.1fr]">
                <div>
                    <p class="section-label">Customer Satisfaction</p>
                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Professional service supported by a growing market presence.
                    </h2>
                </div>

                <p class="text-base leading-7 text-slate-600">
                    GPT Group aims to become a respected regional distributor through quality products,
                    customer-focused service, distinctive solutions and dependable after-sales support.
                </p>
            </div>

            @php
                $outlets = [
                    ['title' => 'GPT Samsung Lounge', 'location' => 'Boshar, Muscat'],
                    ['title' => 'GPT Hikvision Stall', 'location' => 'Boshar, Muscat'],
                    ['title' => 'GPT Service Centre', 'location' => 'Service & Support'],
                    ['title' => 'Honor Phones Outlet', 'location' => 'Retail Network'],
                    ['title' => 'GPT Samsung Lounge', 'location' => 'Additional Retail Presence'],
                ];
            @endphp

            <div class="mt-7 grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ($outlets as $outlet)
                    <div class="soft-card p-4">
                        <span
                            class="grid h-9 w-9 place-items-center rounded-xl bg-blue-50 text-xs font-black text-blue-700">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3 class="mt-3 text-base font-black leading-tight text-slate-950">
                            {{ $outlet['title'] }}
                        </h3>

                        <p class="mt-1.5 text-xs font-bold text-blue-700">
                            {{ $outlet['location'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 07. VISION, MISSION & AIM --}}
    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">Vision, Mission & Aim</p>
                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Guided by customer value, innovation and sustainable growth.
                </h2>
            </div>

            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                <div class="soft-card p-6">
                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-blue-600 text-lg font-black text-white">V
                    </div>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Our Vision</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        To become a respected and professional technology distribution and solutions group
                        serving Oman and the GCC with consistent quality and innovation.
                    </p>
                </div>

                <div class="rounded-[1.25rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-6 text-white shadow-lg">
                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-white text-lg font-black text-blue-700">M
                    </div>
                    <h3 class="mt-4 text-2xl font-black">Our Mission</h3>
                    <p class="mt-2 text-sm leading-6 text-blue-50">
                        To connect customers, retailers and enterprises with reliable technology products,
                        infrastructure and services through efficient distribution and strong partnerships.
                    </p>
                </div>

                <div class="soft-card p-6">
                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-cyan-500 text-lg font-black text-white">A
                    </div>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Our Aim</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        To achieve customer satisfaction through quality products, transparent business practices,
                        responsive service and long-term relationships.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 08. OMAN VISION 2040 --}}
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[.95fr_1.05fr] lg:gap-10">
                <div>
                    <p class="section-label">Oman Vision 2040</p>

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Aligning technology growth with national development.
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600">
                        GPT Group aligns its future direction with Oman Vision 2040 by supporting digital infrastructure,
                        economic diversification, knowledge-based growth and sustainable business practices.
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    @foreach ([['title' => 'Enhancing Technological Infrastructure', 'desc' => 'Supporting secure networks, digital systems and modern business infrastructure.'], ['title' => 'Bringing Top Brands to Oman', 'desc' => 'Connecting customers and businesses with trusted global technology brands.'], ['title' => 'Supporting E-Commerce & Online Services', 'desc' => 'Strengthening digital retail and customer-first online experiences.'], ['title' => 'Investing in Human Capital', 'desc' => 'Building skills, training teams and supporting employment opportunities.'], ['title' => 'Expanding Sustainable Practices', 'desc' => 'Encouraging responsible operations and long-term market development.']] as $vision)
                        <div class="soft-card p-4 {{ $loop->last ? 'sm:col-span-2' : '' }}">
                            <h3 class="text-base font-black text-slate-950">{{ $vision['title'] }}</h3>
                            <p class="mt-1.5 text-sm leading-6 text-slate-600">{{ $vision['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

   

    {{-- 10. OUR JOURNEY --}}

    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Section Heading --}}
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">
                    Our Journey
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Milestones that shaped
                    <span class="text-gradient">GPT Group.</span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    From telecom experience to a diversified technology,
                    security, infrastructure and distribution group.
                </p>
            </div>

            @php
                $journey = [
                    [
                        'year' => '2000',
                        'title' => 'Telecom Industry Foundation',
                        'desc' =>
                            'Leadership experience began in telecom, building strong product, channel and market expertise.',
                    ],
                    [
                        'year' => '2003',
                        'title' => 'Oman Market Experience',
                        'desc' =>
                            'Regional exposure strengthened understanding of GCC customers, retailers and distribution networks.',
                    ],
                    [
                        'year' => '2016',
                        'title' => 'GPT Group Established',
                        'desc' =>
                            'Global Phone Technology LLC was established to support modern technology distribution in Oman.',
                    ],
                    [
                        'year' => '2018',
                        'title' => 'Global Brand Partnerships',
                        'desc' =>
                            'The Group expanded relationships with mobile, electronics and international technology brands.',
                    ],
                    [
                        'year' => '2021',
                        'title' => 'IT Infrastructure Expansion',
                        'desc' =>
                            'Enterprise infrastructure, structured cabling and project-based technology solutions were added.',
                    ],
                    [
                        'year' => '2023',
                        'title' => 'Security Solutions Expansion',
                        'desc' =>
                            'Surveillance, access control, intercom and integrated security became a major business focus.',
                    ],
                    [
                        'year' => 'Today',
                        'title' => 'Integrated Technology Group',
                        'desc' =>
                            'GPT Group now operates across distribution, security, IT infrastructure and regional trading.',
                    ],
                ];
            @endphp

            <div class="relative mt-10">

                {{-- Desktop Center Line --}}
                <div
                    class="absolute bottom-0 left-1/2 top-0 hidden w-px -translate-x-1/2 bg-gradient-to-b from-blue-200 via-cyan-300 to-blue-200 lg:block">
                </div>

                <div class="space-y-5 lg:space-y-7">
                    @foreach ($journey as $item)
                        <div class="relative grid items-center gap-4 lg:grid-cols-[1fr_auto_1fr] lg:gap-6">

                            {{-- Left Card --}}
                            <div class="{{ $loop->iteration % 2 === 0 ? 'lg:col-start-3' : 'lg:col-start-1' }}">
                                <div
                                    class="soft-card group rounded-2xl p-5 transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">

                                    <div class="flex items-start gap-4">

                                        {{-- Mobile Year --}}
                                        <div
                                            class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 text-xs font-black text-white shadow-lg lg:hidden">
                                            {{ $item['year'] }}
                                        </div>

                                        <div>
                                            <p
                                                class="hidden text-xs font-black uppercase tracking-[.18em] text-blue-700 lg:block">
                                                {{ $item['year'] }}
                                            </p>

                                            <h3 class="mt-1 text-lg font-black text-slate-950 sm:text-xl">
                                                {{ $item['title'] }}
                                            </h3>

                                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                                {{ $item['desc'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Center Year Badge --}}
                            <div
                                class="relative z-10 hidden h-16 w-16 place-items-center rounded-full border-4 border-white bg-gradient-to-br from-blue-600 to-cyan-500 text-[11px] font-black text-white shadow-xl lg:grid lg:col-start-2 lg:row-start-1">
                                {{ $item['year'] }}
                            </div>

                            {{-- Empty Column for Alternating Layout --}}
                            @if ($loop->iteration % 2 === 0)
                                <div class="hidden lg:col-start-1 lg:row-start-1 lg:block"></div>
                            @else
                                <div class="hidden lg:col-start-3 lg:row-start-1 lg:block"></div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bottom Summary --}}
            <div
                class="mt-10 rounded-2xl bg-gradient-to-r from-blue-50 via-white to-cyan-50 p-5 text-center ring-1 ring-blue-100 sm:p-6">
                <p class="text-lg font-black text-slate-950 sm:text-xl">
                    Continuing the journey through innovation,
                    partnerships and sustainable growth.
                </p>

                <p class="mt-2 text-sm leading-6 text-slate-600">
                    GPT Group remains focused on creating long-term value for brands,
                    customers and business partners across Oman and the GCC.
                </p>
            </div>

        </div>
    </section>



    {{-- 11. LEADERSHIP TEAM --}}

@if (isset($teamMembers) && $teamMembers->count() > 0)
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Section Heading --}}
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">
                    Leadership Team
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Experienced people driving
                    <span class="text-gradient">GPT Group forward.</span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    Our leadership team combines regional market knowledge,
                    technology expertise and operational discipline.
                </p>
            </div>

            {{-- Team Grid --}}
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($teamMembers as $member)
                    <article
                        class="soft-card group overflow-hidden rounded-2xl"
                    >
                        {{-- Team Image --}}
                        <div class="relative h-64 overflow-hidden bg-gradient-to-br from-blue-50 to-cyan-50">
                            @if ($member->image)
                                <img
                                    src="{{ asset('storage/' . $member->image) }}"
                                    alt="{{ $member->name }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                >
                            @else
                                <div
                                    class="grid h-full w-full place-items-center bg-gradient-to-br from-blue-100 to-cyan-100"
                                >
                                    <span
                                        class="grid h-20 w-20 place-items-center rounded-full bg-white text-3xl font-black text-blue-700 shadow-lg"
                                    >
                                        {{ strtoupper(substr($member->name ?? 'T', 0, 1)) }}
                                    </span>
                                </div>
                            @endif

                            {{-- Designation Badge --}}
                            @if ($member->designation)
                                <div
                                    class="absolute bottom-4 left-4 rounded-full bg-white/90 px-4 py-2 text-xs font-black text-blue-700 shadow-lg backdrop-blur"
                                >
                                    {{ $member->designation }}
                                </div>
                            @endif
                        </div>

                        {{-- Team Content --}}
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $member->name }}
                                    </h3>

                                    @if ($member->designation)
                                        <p class="mt-1 text-sm font-bold text-blue-700">
                                            {{ $member->designation }}
                                        </p>
                                    @endif
                                </div>

                                <span
                                    class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-blue-50 text-lg text-blue-700 transition group-hover:bg-blue-600 group-hover:text-white"
                                >
                                    →
                                </span>
                            </div>

                            @if ($member->description)
                                <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">
                                    {{ $member->description }}
                                </p>
                            @endif

                            @if ($member->profile_link)
                                <a
                                    href="{{ $member->profile_link }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-4 inline-flex items-center gap-2 text-sm font-black text-blue-700"
                                >
                                    View Profile
                                    <span>→</span>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>
@endif

    {{-- 11. CTA --}}

    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">
                <div class="grid items-center gap-6 lg:grid-cols-2">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                            Partner With GPT Group
                        </p>

                        <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                            Build your market advantage with a trusted technology partner.
                        </h2>

                        <p class="mt-3 text-base leading-7 text-blue-50">
                            Connect for distribution partnerships, enterprise solutions, security projects,
                            IT infrastructure and market expansion.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3 lg:justify-end">
                        <a href="{{ route('contact') }}"
                            class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1">
                            Contact Us
                        </a>

                        <a href="{{ route('brands') }}"
                            class="inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1">
                            Explore Brands
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
