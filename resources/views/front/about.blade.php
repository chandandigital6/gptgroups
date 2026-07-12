@extends('front_pages.front_components.main')

@section('content')
    <style>
        :root {
            --gpt-blue: #2563eb;
            --gpt-cyan: #06b6d4;
            --gpt-dark: #0f172a;
        }

        .about-soft-bg {
            background:
                radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .28), transparent 28%),
                radial-gradient(circle at 8% 42%, rgba(147, 197, 253, .30), transparent 30%),
                linear-gradient(135deg, #ffffff 0%, #f8fafc 45%, #eff6ff 100%);
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

        .soft-card {
            border: 1px solid rgba(226, 232, 240, .95);
            background: rgba(255, 255, 255, .94);
            box-shadow: 0 18px 55px rgba(15, 23, 42, .07);
            transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }

        .soft-card:hover {
            transform: translateY(-7px);
            border-color: rgba(37, 99, 235, .18);
            box-shadow: 0 28px 75px rgba(37, 99, 235, .13);
        }

        .soft-image-card {
            border: 1px solid rgba(226, 232, 240, .95);
            background: #ffffff;
            box-shadow: 0 22px 70px rgba(15, 23, 42, .10);
        }

        .section-label {
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .28em;
            color: #1d4ed8;
        }

        .timeline-line {
            position: relative;
        }

        .timeline-line::before {
            content: "";
            position: absolute;
            top: 1.5rem;
            bottom: 1.5rem;
            left: 1.45rem;
            width: 2px;
            background: linear-gradient(to bottom, #2563eb, #06b6d4);
        }

        .timeline-dot {
            position: relative;
            z-index: 2;
            display: grid;
            height: 3rem;
            width: 3rem;
            place-items: center;
            flex-shrink: 0;
            border-radius: 999px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            color: #ffffff;
            font-size: .75rem;
            font-weight: 900;
            box-shadow: 0 10px 30px rgba(37, 99, 235, .25);
        }

        .partner-chip {
            border: 1px solid #dbeafe;
            background: linear-gradient(135deg, #ffffff, #eff6ff);
        }
    </style>

    {{-- 01. PAGE HERO --}}
    @include('front.sections.page_hero', ['pageSlug' => 'about'])

    {{-- 02. QUICK FACTS --}}
    @if(isset($quickFactSection) && $quickFactSection && $quickFactSection->activeItems->count())
        <section class="relative z-10 -mt-8 bg-transparent">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($quickFactSection->activeItems as $fact)
                        <div class="soft-card rounded-[2rem] p-7">
                            <p class="text-gradient text-4xl font-black">{{ $fact->value }}</p>
                            <p class="mt-2 font-black text-slate-900">{{ $fact->title }}</p>
                            @if($fact->description)
                                <p class="mt-2 text-sm leading-6 text-slate-500">{{ $fact->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 03. COMPANY OVERVIEW --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-[1.05fr_.95fr]">
                <div>
                    <p class="section-label">Company Overview</p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        Global Phone Technology LLC
                        <span class="block text-gradient">Powering technology-led growth.</span>
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        Global Phone Technology LLC, operating under GPT Group, is a technology distribution
                        and solutions company serving businesses, channel partners and customers across Oman,
                        the GCC and selected international markets.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        The Group combines strong market knowledge, dependable distribution, brand partnerships
                        and solution delivery across mobile and consumer electronics, security systems,
                        IT infrastructure and general trading.
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="soft-card rounded-[1.75rem] p-6">
                            <p class="text-gradient text-3xl font-black">Oman</p>
                            <h3 class="mt-3 text-xl font-black text-slate-950">Strong Local Operations</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Market coverage, retail support, B2B supply and after-sales coordination.
                            </p>
                        </div>

                        <div class="soft-card rounded-[1.75rem] p-6">
                            <p class="text-gradient text-3xl font-black">GCC+</p>
                            <h3 class="mt-3 text-xl font-black text-slate-950">Regional Reach</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Partner-led expansion across GCC and other growth-focused markets.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative grid grid-cols-2 gap-5">
                        <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                             src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                             alt="GPT Group Distribution">

                        <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                             src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                             alt="GPT Group Technology">

                        <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                             src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80"
                             alt="GPT Group Team">

                        <div class="mt-10 rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-7 text-white shadow-xl">
                            <p class="text-4xl font-black">GPT</p>
                            <p class="mt-3 text-xl font-black">Technology. Distribution. Solutions.</p>
                            <p class="mt-3 text-sm leading-6 text-blue-50">
                                A unified business platform built for brands, partners and enterprise customers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 04. OPERATIONS & MARKET PRESENCE --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">Operations & Market Presence</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Local strength with regional capability.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    GPT Group supports products and solutions from market entry to final customer delivery.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @php
                    $markets = [
                        ['no' => '01', 'title' => 'Oman Operations', 'desc' => 'Core business operations, warehousing, retail support, B2B supply and customer service.'],
                        ['no' => '02', 'title' => 'GCC Markets', 'desc' => 'Regional relationships and partner-led distribution across key Gulf markets.'],
                        ['no' => '03', 'title' => 'Channel Network', 'desc' => 'Dealers, retailers, resellers, integrators and enterprise procurement partners.'],
                        ['no' => '04', 'title' => 'Market Expansion', 'desc' => 'Scalable support for brands entering Oman, GCC and selected international markets.'],
                    ];
                @endphp

                @foreach($markets as $market)
                    <div class="soft-card rounded-[2rem] p-7">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 font-black text-blue-700">
                            {{ $market['no'] }}
                        </span>
                        <h3 class="mt-5 text-2xl font-black text-slate-950">{{ $market['title'] }}</h3>
                        <p class="mt-3 leading-7 text-slate-600">{{ $market['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 05. DISTRIBUTION NETWORK --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="soft-image-card overflow-hidden rounded-[2.5rem] p-4">
                    <img class="h-[380px] w-full rounded-[2rem] object-cover sm:h-[480px]"
                         src="https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=1200&q=85"
                         alt="GPT Distribution Network">

                    <div class="mt-4 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-blue-50 p-5">
                            <p class="text-2xl font-black text-blue-700">B2B</p>
                            <p class="mt-1 text-sm font-semibold text-slate-600">Enterprise Supply</p>
                        </div>
                        <div class="rounded-2xl bg-cyan-50 p-5">
                            <p class="text-2xl font-black text-cyan-700">Retail</p>
                            <p class="mt-1 text-sm font-semibold text-slate-600">Store Network</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-5">
                            <p class="text-2xl font-black text-slate-800">Channel</p>
                            <p class="mt-1 text-sm font-semibold text-slate-600">Dealer Support</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="section-label">Distribution Network</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        End-to-end distribution built for dependable execution.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group supports the complete distribution lifecycle—from product planning and
                        import coordination to warehousing, channel supply, retail activation and after-sales support.
                    </p>

                    <div class="mt-8 space-y-4">
                        @foreach([
                            'Product sourcing and brand onboarding',
                            'Warehousing and inventory coordination',
                            'Dealer, reseller and retail distribution',
                            'Enterprise and project-based supply',
                            'Marketing, merchandising and launch support',
                            'Service coordination and customer assistance'
                        ] as $item)
                            <div class="flex items-start gap-4 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-100">
                                <span class="mt-1 grid h-7 w-7 shrink-0 place-items-center rounded-full bg-blue-600 text-xs font-black text-white">✓</span>
                                <p class="font-semibold leading-7 text-slate-700">{{ $item }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 06. TECHNOLOGY PARTNERSHIPS --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="max-w-3xl">
                    <p class="section-label">Technology Partnerships</p>
                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        Connecting global brands with local opportunities.
                    </h2>
                </div>

                <p class="max-w-xl text-lg leading-8 text-slate-600">
                    GPT Group works with technology manufacturers and solution providers to build sustainable
                    market presence, reliable distribution and long-term channel growth.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['title' => 'Brand Representation', 'desc' => 'Local market support, brand positioning and commercial coordination.'],
                    ['title' => 'Market Development', 'desc' => 'Retail placement, channel activation and demand generation.'],
                    ['title' => 'Solution Integration', 'desc' => 'Combining products, infrastructure and services for customer needs.'],
                    ['title' => 'Long-Term Growth', 'desc' => 'Transparent relationships focused on sustainable business outcomes.']
                ] as $partner)
                    <div class="partner-chip rounded-[2rem] p-7">
                        <h3 class="text-2xl font-black text-slate-950">{{ $partner['title'] }}</h3>
                        <p class="mt-3 leading-7 text-slate-600">{{ $partner['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 07. VISION, MISSION & CORE VALUES --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">Our Direction</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Vision, mission and values that guide our growth.
                </h2>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <div class="soft-card rounded-[2rem] p-8">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">V</div>
                    <h3 class="mt-6 text-3xl font-black text-slate-950">Our Vision</h3>
                    <p class="mt-4 leading-8 text-slate-600">
                        To become a trusted regional technology distribution and solutions group,
                        known for innovation, execution excellence and long-term partner value.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-8 text-white shadow-xl">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-white text-2xl font-black text-blue-700">M</div>
                    <h3 class="mt-6 text-3xl font-black">Our Mission</h3>
                    <p class="mt-4 leading-8 text-blue-50">
                        To connect customers and businesses with reliable technology products,
                        infrastructure and solutions through strong partnerships and efficient distribution.
                    </p>
                </div>

                <div class="soft-card rounded-[2rem] p-8">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">C</div>
                    <h3 class="mt-6 text-3xl font-black text-slate-950">Core Values</h3>
                    <p class="mt-4 leading-8 text-slate-600">
                        Integrity, customer focus, accountability, innovation, quality,
                        collaboration and sustainable growth.
                    </p>
                </div>
            </div>

            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['title' => 'Integrity', 'desc' => 'Transparent and ethical business practices.'],
                    ['title' => 'Customer Focus', 'desc' => 'Solutions built around real customer needs.'],
                    ['title' => 'Execution Excellence', 'desc' => 'Reliable delivery with attention to detail.'],
                    ['title' => 'Continuous Innovation', 'desc' => 'Adapting to technology and market change.']
                ] as $value)
                    <div class="soft-card rounded-[1.75rem] p-6">
                        <h3 class="text-xl font-black text-slate-950">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 08. FOUNDER & LEADERSHIP --}}
    @if(isset($founderSection) && $founderSection)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="relative">
                        <div class="absolute -inset-6 rounded-full bg-blue-300/20 blur-3xl"></div>

                        <div class="relative soft-image-card overflow-hidden rounded-[2.5rem] p-4">
                            @if($founderSection->image)
                                <img class="h-[380px] w-full rounded-[2rem] object-cover sm:h-[480px] lg:h-[540px]"
                                     src="{{ asset('storage/' . $founderSection->image) }}"
                                     alt="{{ $founderSection->title }}">
                            @else
                                <img class="h-[380px] w-full rounded-[2rem] object-cover sm:h-[480px] lg:h-[540px]"
                                     src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}"
                                     alt="{{ $founderSection->title }}">
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="section-label">{{ $founderSection->label ?: 'Founder & Leadership' }}</p>

                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $founderSection->title }}
                        </h2>

                        @if($founderSection->description)
                            <p class="mt-6 text-lg leading-8 text-slate-600">
                                {{ $founderSection->description }}
                            </p>
                        @endif

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            @foreach([1, 2, 3] as $i)
                                @php
                                    $value = $founderSection->{'stat_' . $i . '_value'} ?? null;
                                    $label = $founderSection->{'stat_' . $i . '_label'} ?? null;
                                @endphp

                                @if($value || $label)
                                    <div class="soft-card rounded-[1.75rem] p-5">
                                        <p class="text-gradient text-3xl font-black">{{ $value }}</p>
                                        <p class="mt-1 text-sm font-semibold text-slate-600">{{ $label }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @if($founderSection->button_text)
                            <a href="{{ $founderSection->button_link ?: '#' }}"
                               class="mt-8 inline-flex rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-lg transition hover:-translate-y-1">
                                {{ $founderSection->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- 09. LEADERSHIP TEAM --}}
    @if(isset($teamMembers) && $teamMembers->count() > 0)
        <section class="about-section-soft py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="section-label">Leadership Team</p>
                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        Experienced leadership. Strong execution.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        Our leadership team combines regional experience, technology understanding and operational discipline.
                    </p>
                </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($teamMembers as $member)
                        <div class="soft-card overflow-hidden rounded-[2rem]">
                            <div class="h-72 bg-gradient-to-br from-blue-50 to-cyan-50 p-5">
                                @if($member->image)
                                    <img class="h-full w-full rounded-[1.5rem] object-cover"
                                         src="{{ asset('storage/' . $member->image) }}"
                                         alt="{{ $member->name }}">
                                @else
                                    <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-white text-slate-400">
                                        No Image
                                    </div>
                                @endif
                            </div>

                            <div class="p-7">
                                <h3 class="text-2xl font-black text-slate-950">{{ $member->name }}</h3>

                                @if($member->designation)
                                    <p class="mt-1 font-bold text-blue-700">{{ $member->designation }}</p>
                                @endif

                                @if($member->description)
                                    <p class="mt-3 text-sm leading-6 text-slate-500">{{ $member->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 10. OUR JOURNEY --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr]">
                <div>
                    <p class="section-label">Our Journey</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        A journey of growth, partnerships and diversification.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group has steadily evolved from telecom experience into a diversified
                        technology distribution and solutions business.
                    </p>
                </div>

                <div class="timeline-line space-y-6">
                    @php
                        $journey = [
                            ['year' => '2000', 'title' => 'Telecom Industry Foundation', 'desc' => 'Leadership experience began in the telecom sector, building product, channel and market expertise.'],
                            ['year' => '2003', 'title' => 'Regional Market Experience', 'desc' => 'Expansion into Oman strengthened knowledge of GCC customers, retail channels and distribution requirements.'],
                            ['year' => '2016', 'title' => 'GPT Group Established', 'desc' => 'Global Phone Technology LLC was established to support modern technology distribution in Oman and the GCC.'],
                            ['year' => '2018', 'title' => 'Brand Partnerships', 'desc' => 'The company expanded its portfolio through relationships with global mobile, electronics and technology brands.'],
                            ['year' => '2021', 'title' => 'IT Infrastructure Expansion', 'desc' => 'GPT Group expanded into enterprise IT infrastructure, business technology and project-based solutions.'],
                            ['year' => '2023', 'title' => 'Security Solutions Expansion', 'desc' => 'The Group strengthened its portfolio with surveillance, access control and integrated security solutions.'],
                            ['year' => 'Today', 'title' => 'Integrated Technology Group', 'desc' => 'GPT Group operates across distribution, security, IT infrastructure and trading with a broader regional vision.'],
                        ];
                    @endphp

                    @foreach($journey as $item)
                        <div class="relative flex gap-5 pl-0">
                            <div class="timeline-dot">{{ $item['year'] }}</div>

                            <div class="soft-card flex-1 rounded-[1.75rem] p-6">
                                <h3 class="text-2xl font-black text-slate-950">{{ $item['title'] }}</h3>
                                <p class="mt-2 leading-7 text-slate-600">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 11. WHAT WE DO --}}
    @if(isset($whatWeDoSection) && $whatWeDoSection)
        <section class="about-section-soft py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div>
                        @if($whatWeDoSection->label)
                            <p class="section-label">{{ $whatWeDoSection->label }}</p>
                        @endif

                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $whatWeDoSection->title }}
                        </h2>

                        @if($whatWeDoSection->description)
                            <p class="mt-6 text-lg leading-8 text-slate-600">
                                {{ $whatWeDoSection->description }}
                            </p>
                        @endif

                        <div class="mt-8 grid gap-5 sm:grid-cols-2">
                            @foreach([1, 2, 3, 4] as $i)
                                @php
                                    $title = $whatWeDoSection->{'card_' . $i . '_title'} ?? null;
                                    $description = $whatWeDoSection->{'card_' . $i . '_description'} ?? null;
                                @endphp

                                @if($title || $description)
                                    <div class="soft-card rounded-[1.75rem] p-6">
                                        @if($title)
                                            <h3 class="text-xl font-black text-slate-950">{{ $title }}</h3>
                                        @endif
                                        @if($description)
                                            <p class="mt-2 text-sm leading-6 text-slate-500">{{ $description }}</p>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="soft-image-card overflow-hidden rounded-[2.5rem] p-4">
                        @if($whatWeDoSection->image)
                            <img class="h-[380px] w-full rounded-[2rem] object-cover sm:h-[500px]"
                                 src="{{ asset('storage/' . $whatWeDoSection->image) }}"
                                 alt="{{ $whatWeDoSection->title }}">
                        @else
                            <img class="h-[380px] w-full rounded-[2rem] object-cover sm:h-[500px]"
                                 src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                                 alt="{{ $whatWeDoSection->title }}">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- 12. CTA --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
                <div class="grid items-center gap-8 lg:grid-cols-2">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-100">Partner With GPT Group</p>
                        <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                            Build your market advantage with a trusted technology partner.
                        </h2>
                        <p class="mt-5 text-lg leading-8 text-blue-50">
                            Connect with GPT Group for distribution partnerships, enterprise solutions,
                            security projects, IT infrastructure and market expansion.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 lg:justify-end">
                        <a href="{{ route('contact') }}"
                           class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                            Contact Us
                        </a>

                        <a href="{{ url('/brands') }}"
                           class="inline-flex rounded-full bg-slate-950 px-8 py-4 text-sm font-black text-white shadow-xl transition hover:-translate-y-1">
                            Explore Brands
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
