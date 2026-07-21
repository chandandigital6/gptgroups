@extends('front_pages.front_components.main')

@section('content')
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
            [
                'name' => 'Honor',
                'logo' => asset('assets/logo brands/honor_huawei_together.jpg'),
                'description' => 'Smartphones, tablets, laptops, wearables and connected devices.',
                'initials' => 'HO',
            ],
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

    <main class="overflow-hidden bg-white text-slate-900">

        {{-- HERO --}}
        <section
            class="relative flex min-h-[350px] items-center overflow-hidden bg-slate-950 bg-cover bg-center sm:min-h-[380px] lg:min-h-[410px]"
            style="background-image:
                linear-gradient(90deg, rgba(2,6,23,.96) 0%, rgba(2,6,23,.84) 56%, rgba(2,6,23,.42) 100%),
                url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=76');">

            <div class="absolute inset-0 bg-gradient-to-br from-blue-700/20 via-transparent to-cyan-500/15"></div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl py-14 sm:py-16 lg:py-20">
                    <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-cyan-300">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-400 to-cyan-300"></span>
                        Our Partners
                    </p>

                    <h1 class="mt-4 max-w-3xl text-4xl font-black leading-[1.08] tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Trusted technology partnerships powering
                        <span class="bg-gradient-to-r from-blue-300 to-cyan-300 bg-clip-text text-transparent">
                            stronger market solutions.
                        </span>
                    </h1>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">
                        GPT Group works with established technology partners to deliver mobility,
                        security, smart-home, networking and accessory solutions across Oman.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a href="#partners"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-blue-600 px-6 text-sm font-bold text-white transition hover:bg-blue-700">
                            Explore Our Partners
                        </a>

                        <a href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full border border-white/25 bg-white px-6 text-sm font-bold text-slate-950 transition hover:bg-slate-100">
                            Partnership Enquiry
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- CONTINUOUS BRAND SLIDER --}}
        <section id="partners" class="bg-slate-50 py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
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

                            <div class="relative grid h-32 place-items-center overflow-hidden rounded-xl border border-slate-100 bg-slate-50 p-5">
                                <span class="absolute grid h-14 w-14 place-items-center rounded-xl bg-blue-50 text-sm font-black text-blue-700">
                                    {{ $partner['initials'] }}
                                </span>

                                <img
                                    src="{{ $partner['logo'] }}"
                                    alt="{{ $partner['name'] }} logo"
                                    class="relative z-10 max-h-20 w-full object-contain"
                                    loading="lazy"
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

                            <div class="relative grid h-32 place-items-center overflow-hidden rounded-xl border border-slate-100 bg-slate-50 p-5">
                                <span class="absolute grid h-14 w-14 place-items-center rounded-xl bg-blue-50 text-sm font-black text-blue-700">
                                    {{ $partner['initials'] }}
                                </span>

                                <img
                                    src="{{ $partner['logo'] }}"
                                    alt=""
                                    class="relative z-10 max-h-20 w-full object-contain"
                                    loading="lazy"
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


        {{-- GPT GROUP OVERVIEW --}}
        <section class="bg-white py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr]">
                    <div>
                        <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                            <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                            About GPT Group
                        </p>

                        <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            Connecting global technology brands with the growing Oman market.
                        </h2>

                        <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                            GPT Group is a technology distribution and solutions company supporting brands,
                            channel partners, retailers and enterprise customers through structured market
                            development, dependable supply and professional project coordination.
                        </p>

                        <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                            Our portfolio spans mobility, security, smart-home technology, network
                            infrastructure, accessories and connected consumer solutions.
                        </p>

                        <div class="mt-7 flex flex-wrap gap-3">
                            <span class="rounded-full bg-blue-50 px-4 py-2 text-xs font-black text-blue-700">
                                Technology Distribution
                            </span>
                            <span class="rounded-full bg-cyan-50 px-4 py-2 text-xs font-black text-cyan-700">
                                Channel Development
                            </span>
                            <span class="rounded-full bg-slate-100 px-4 py-2 text-xs font-black text-slate-700">
                                Project Solutions
                            </span>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <article class="rounded-3xl bg-slate-950 p-6 text-white shadow-xl sm:col-span-2">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-cyan-300">
                                Our Purpose
                            </p>
                            <h3 class="mt-3 text-2xl font-black">
                                Creating reliable connections between technology, partners and customers.
                            </h3>
                            <p class="mt-3 text-sm leading-7 text-slate-300">
                                We help technology brands build visibility, availability and long-term
                                channel value across Oman.
                            </p>
                        </article>

                        <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                            <div class="text-3xl font-black text-blue-700">B2B</div>
                            <h3 class="mt-2 text-lg font-black text-slate-950">Project Sales</h3>
                            <p class="mt-2 text-sm leading-7 text-slate-600">
                                Technical and commercial support for business and project requirements.
                            </p>
                        </article>

                        <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                            <div class="text-3xl font-black text-cyan-600">B2C</div>
                            <h3 class="mt-2 text-lg font-black text-slate-950">Retail Network</h3>
                            <p class="mt-2 text-sm leading-7 text-slate-600">
                                Product reach through dealers, resellers and retail channel partners.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        {{-- WHY PARTNER WITH GPT GROUP --}}
        <section class="bg-slate-950 py-14 text-white sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-[11px] font-black uppercase tracking-[0.2em] text-cyan-300">
                        Why GPT Group
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl">
                        A complete support ecosystem for technology brands and channel partners.
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-slate-300 sm:text-base">
                        From market entry to distribution and after-sales coordination, GPT Group
                        supports every stage of the partner journey.
                    </p>
                </div>

                <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        [
                            'number' => '01',
                            'title' => 'Local Market Knowledge',
                            'text' => 'Understanding of customer demand, channel structure and business opportunities in Oman.',
                        ],
                        [
                            'number' => '02',
                            'title' => 'Strong Channel Reach',
                            'text' => 'Dealer, reseller, retail and enterprise relationships supporting wider product availability.',
                        ],
                        [
                            'number' => '03',
                            'title' => 'Technical Capability',
                            'text' => 'Pre-sales, solution design, product guidance and project coordination for complex requirements.',
                        ],
                        [
                            'number' => '04',
                            'title' => 'Long-Term Partnership',
                            'text' => 'A partnership model focused on sustainable brand growth and reliable customer support.',
                        ],
                    ] as $benefit)
                        <article class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-sm">
                            <span class="text-sm font-black text-cyan-300">
                                {{ $benefit['number'] }}
                            </span>

                            <h3 class="mt-5 text-xl font-black">
                                {{ $benefit['title'] }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-300">
                                {{ $benefit['text'] }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- BUSINESS COVERAGE --}}
        <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr]">
                    <div>
                        <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                            <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                            Business Coverage
                        </p>

                        <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                            Technology solutions across multiple business segments.
                        </h2>

                        <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                            GPT Group combines a diverse brand portfolio with sales, distribution,
                            engineering and support capabilities.
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ([
                            [
                                'title' => 'Mobility Solutions',
                                'text' => 'Smartphones, tablets, wearables and mobile devices for consumer and business markets.',
                            ],
                            [
                                'title' => 'Security & ELV',
                                'text' => 'Video surveillance, access control, intercom and intelligent security systems.',
                            ],
                            [
                                'title' => 'Smart Home & IoT',
                                'text' => 'Automation, sensors, smart lighting and connected lifestyle technologies.',
                            ],
                            [
                                'title' => 'Network Infrastructure',
                                'text' => 'Fiber, structured cabling, connectivity and supporting network accessories.',
                            ],
                        ] as $segment)
                            <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                <div class="h-1.5 w-12 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500"></div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
                                    {{ $segment['title'] }}
                                </h3>

                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    {{ $segment['text'] }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- PARTNER SUPPORT --}}
        <section class="py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-10 lg:grid-cols-[.9fr_1.1fr]">
                    <div>
                        <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                            <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                            Partner Support
                        </p>

                        <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            Building long-term value with every technology partner.
                        </h2>

                        <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                            GPT Group supports its partners through market development, distribution,
                            project coordination and after-sales assistance.
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ($supportAreas as $index => $area)
                            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                                <span class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <h3 class="mt-4 text-lg font-black text-slate-950">
                                    {{ $area['title'] }}
                                </h3>

                                <p class="mt-2 text-sm leading-7 text-slate-600">
                                    {{ $area['description'] }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-xl sm:p-9 lg:p-10">
                    <div class="grid items-center gap-7 lg:grid-cols-[1fr_auto]">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.2em] text-cyan-200">
                                Partner With GPT Group
                            </p>

                            <h2 class="mt-3 max-w-3xl text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl">
                                Looking to expand your technology brand or distribution network in Oman?
                            </h2>
                        </div>

                        <a href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-white px-7 text-sm font-black text-slate-950 transition hover:bg-slate-100">
                            Contact Our Team
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection