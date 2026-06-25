@extends('front_pages.front_components.main')

@section('content')
    <style>
        .about-soft-bg {
            background:
                radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .32), transparent 28%),
                radial-gradient(circle at 8% 42%, rgba(147, 197, 253, .34), transparent 30%),
                linear-gradient(135deg, #ffffff 0%, #f8fafc 45%, #eff6ff 100%);
        }

        .about-section-soft {
            background:
                radial-gradient(circle at top right, rgba(34, 211, 238, .08), transparent 28%),
                linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .text-gradient {
            background: linear-gradient(90deg, #2563eb, #06b6d4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .soft-card {
            border: 1px solid rgba(226, 232, 240, .95);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 55px rgba(15, 23, 42, .07);
            transition: all .35s ease;
        }

        .soft-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 28px 75px rgba(37, 99, 235, .13);
        }

        .soft-image-card {
            border: 1px solid rgba(226, 232, 240, .95);
            background: #ffffff;
            box-shadow: 0 22px 70px rgba(15, 23, 42, .10);
        }

        .floating-blob {
            filter: blur(10px);
            opacity: .42;
            animation: floatingBlob 7s ease-in-out infinite alternate;
        }

        @keyframes floatingBlob {
            from { transform: translateY(0) scale(1); }
            to { transform: translateY(22px) scale(1.08); }
        }

        .about-pill {
            display: inline-flex;
            align-items: center;
            gap: .75rem;
            border-radius: 999px;
            border: 1px solid rgba(191, 219, 254, .9);
            background: rgba(239, 246, 255, .9);
            padding: .55rem 1rem;
            font-size: .78rem;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #1d4ed8;
        }

        .about-pill-dot {
            height: .6rem;
            width: .6rem;
            border-radius: 999px;
            background: #22d3ee;
            box-shadow: 0 0 0 6px rgba(34, 211, 238, .18);
        }

        .timeline-card {
            position: relative;
            overflow: hidden;
        }

        .timeline-card::after {
            content: '';
            position: absolute;
            inset: auto -40px -60px auto;
            width: 130px;
            height: 130px;
            border-radius: 999px;
            background: rgba(34, 211, 238, .12);
        }
    </style>

    {{-- ABOUT HERO --}}
    <section class="relative overflow-hidden about-soft-bg">
        <div class="absolute -top-24 -right-24 h-96 w-96 rounded-full bg-cyan-300 floating-blob"></div>
        <div class="absolute top-48 -left-28 h-96 w-96 rounded-full bg-blue-300 floating-blob"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="grid items-center gap-12 lg:grid-cols-[1fr_.95fr]">
                <div>
                    <div class="about-pill">
                        <span class="about-pill-dot"></span>
                        About GPT Group
                    </div>

                    <h1 class="mt-7 text-5xl font-black leading-[.96] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                        Building Oman’s
                        <span class="block text-gradient">Modern Tech Distribution</span>
                    </h1>

                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        Global Phone Technology LLC is a modern-age technology distributor focused on mobile devices,
                        smartphones, tablets, accessories and technology-led business growth across Oman and the GCC.
                    </p>

                    <div class="mt-9 flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                            Partner With Us
                        </a>
                        <a href="{{ route('brands') }}"
                           class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                            Explore Brands
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>
                    <div class="relative soft-image-card overflow-hidden rounded-[2.75rem] p-3">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1400&q=85"
                             alt="GPT Group About"
                             class="h-[360px] w-full rounded-[2.25rem] object-cover sm:h-[460px] lg:h-[540px]">

                        <div class="mt-4 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                            <p class="text-2xl font-black leading-tight text-slate-950">
                                Innovation. Growth. Local Execution.
                            </p>
                            <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                Technology distribution, retail support, online growth and service excellence for Oman and GCC.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK FACTS --}}
    <section class="relative z-10 -mt-8 bg-transparent">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-4xl font-black text-gradient">2016</p>
                    <p class="mt-2 font-bold text-slate-800">GPT Founded</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Started as a modern technology distributor in Oman.</p>
                </div>
                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-4xl font-black text-gradient">20+</p>
                    <p class="mt-2 font-bold text-slate-800">Years Leadership</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Founder’s Middle East telecom industry experience.</p>
                </div>
                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-4xl font-black text-gradient">GCC</p>
                    <p class="mt-2 font-bold text-slate-800">Market Coverage</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Oman, UAE, Kuwait and regional business exposure.</p>
                </div>
                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-4xl font-black text-gradient">B2B</p>
                    <p class="mt-2 font-bold text-slate-800">Retail Support</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Distribution, dealer support and business programs.</p>
                </div>
            </div>
        </div>
    </section>



      {{-- FOUNDER SECTION --}}
    @if($founderSection)
        <section class="about-section-soft py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="relative order-1 lg:order-1">
                        <div class="absolute -inset-6 rounded-full bg-blue-300/20 blur-3xl"></div>

                        <div class="relative soft-image-card overflow-hidden rounded-[2.5rem] p-4">
                            @if($founderSection->image)
                                <img class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[460px] lg:h-[520px]"
                                     src="{{ asset('storage/' . $founderSection->image) }}"
                                     alt="{{ $founderSection->title }}">
                            @else
                                <img class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[460px] lg:h-[520px]"
                                     src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}"
                                     alt="{{ $founderSection->title }}">
                            @endif

                            <div class="mt-4 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                <p class="text-2xl font-black leading-tight text-slate-950">
                                    {{ $founderSection->title }}
                                </p>

                                @if($founderSection->label)
                                    <p class="mt-2 text-base font-bold text-blue-700">
                                        {{ $founderSection->label }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="order-2 lg:order-2">
                        @if($founderSection->label)
                            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                                {{ $founderSection->label }}
                            </p>
                        @endif

                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $founderSection->title }}
                        </h2>

                        @if($founderSection->description)
                            <p class="mt-6 text-lg leading-8 text-slate-600">
                                {{ $founderSection->description }}
                            </p>
                        @endif

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            @if($founderSection->stat_1_value || $founderSection->stat_1_label)
                                <div class="soft-card rounded-[1.75rem] p-5">
                                    <p class="text-3xl font-black text-gradient">{{ $founderSection->stat_1_value }}</p>
                                    <p class="mt-1 text-sm font-semibold text-slate-600">{{ $founderSection->stat_1_label }}</p>
                                </div>
                            @endif

                            @if($founderSection->stat_2_value || $founderSection->stat_2_label)
                                <div class="soft-card rounded-[1.75rem] p-5">
                                    <p class="text-3xl font-black text-gradient">{{ $founderSection->stat_2_value }}</p>
                                    <p class="mt-1 text-sm font-semibold text-slate-600">{{ $founderSection->stat_2_label }}</p>
                                </div>
                            @endif

                            @if($founderSection->stat_3_value || $founderSection->stat_3_label)
                                <div class="soft-card rounded-[1.75rem] p-5">
                                    <p class="text-3xl font-black text-gradient">{{ $founderSection->stat_3_value }}</p>
                                    <p class="mt-1 text-sm font-semibold text-slate-600">{{ $founderSection->stat_3_label }}</p>
                                </div>
                            @endif
                        </div>

                        @if($founderSection->button_text)
                            <a href="{{ $founderSection->button_link ?: '#' }}"
                               class="mt-8 inline-flex rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-1">
                                {{ $founderSection->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- COMPANY INTRO + CONCEPTION --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Company Profile</p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        A business house built for technology, retail and growth.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group started with a vision to introduce innovation and quality in technology distribution
                        across Oman and the GCC region. The company began by focusing on mobile devices, smartphones,
                        tablets and accessories for B2B and B2C customers.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        Over time, GPT Group expanded beyond telecom into online retail, beauty care, fashion retail and
                        I.T. business, building a multi-vertical platform for modern consumers and partners.
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="soft-card rounded-[1.75rem] p-6">
                            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                            <h3 class="mt-5 text-xl font-black text-slate-950">Technology Distribution</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Mobiles, tablets, gadgets and accessories distribution.</p>
                        </div>

                        <div class="soft-card rounded-[1.75rem] p-6">
                            <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                            <h3 class="mt-5 text-xl font-black text-slate-950">Retail Expansion</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Store support, product placement and partner enablement.</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative grid grid-cols-2 gap-5">
                        <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                             src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                             alt="Technology business">
                        <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                             src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                             alt="Retail store">
                        <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                             src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                             alt="Warehouse">
                        <div class="mt-10 rounded-[2rem] bg-white p-7 text-slate-950 shadow-xl ring-1 ring-slate-100">
                            <p class="text-4xl font-black text-gradient">GPT</p>
                            <p class="mt-3 text-lg font-bold">Global Phone Technology</p>
                            <p class="mt-3 text-sm leading-6 text-slate-500">Modern technology distribution with local execution.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 rounded-[2.5rem] bg-white p-7 shadow-xl ring-1 ring-slate-100 sm:p-10 lg:p-12">
                <div class="grid gap-8 lg:grid-cols-[.85fr_1.15fr] lg:items-center">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">GPT Group Conception</p>
                        <h3 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl">
                            Born from deep telecom experience and a clear market need.
                        </h3>
                    </div>
                    <div class="space-y-4 text-lg leading-8 text-slate-600">
                        <p>
                            Inspired by Mr. Pradeep Tripathi’s experience in the telecom sector, GPT Group was conceptualized
                            to bridge the gap between modern technology brands and strong distribution support in Oman.
                        </p>
                        <p>
                            From the beginning, the focus remained simple: connect people with leading mobile devices,
                            smartphones, tablets and accessories while giving brands a reliable route to market.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- COMPANY HISTORY --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Company History</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    GPT Group Journey
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    From telecom distribution to a diversified business group, GPT Group’s journey is focused on innovation,
                    customer service and partner success.
                </p>
            </div>

            <div class="mt-14 grid gap-6 lg:grid-cols-4">
                <div class="timeline-card soft-card rounded-[2rem] p-7">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black text-blue-700">2000</p>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">Start</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black text-slate-950">Telecom Journey</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Mr. Pradeep Tripathi started his telecom career with HCL India in 2000.</p>
                </div>

                <div class="timeline-card soft-card rounded-[2rem] p-7">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black text-cyan-600">2002</p>
                        <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">GCC</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black text-slate-950">Dubai & Oman</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">He moved to Dubai in 2002 and later to the Sultanate of Oman in 2003, gaining strong regional market understanding.</p>
                </div>

                <div class="timeline-card soft-card rounded-[2rem] p-7">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black text-blue-700">2016</p>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">Founded</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black text-slate-950">GPT Founded</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">GPT Group was established as a modern-age technology distributor for Oman and GCC markets.</p>
                </div>

                <div class="timeline-card rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-7 text-white shadow-xl">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black">2019</p>
                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black text-white">Expansion</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black">New Verticals</h3>
                    <p class="mt-3 text-sm leading-7 text-blue-50">GPT expanded into online, beauty care, fashion retail and I.T. business verticals.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- EARLY DAYS / CURRENT / FUTURE --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mx-auto max-w-3xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Growth Story</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Foundation, current standing and future vision.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    GPT Group continues to combine strong local relationships, distribution discipline and diversified business growth.
                </p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <div class="soft-card rounded-[2rem] p-8">
                    <p class="text-4xl font-black text-gradient">01</p>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Early Days</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group focused on building a strong foundation within Oman, creating distribution support and building relationships with local businesses and customers.
                    </p>
                </div>

                <div class="soft-card rounded-[2rem] p-8">
                    <p class="text-4xl font-black text-gradient">02</p>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Current Standing</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        Today GPT Group works across technology distribution, online retail, fashion, beauty care and IT, with a focus on reliable service and market execution.
                    </p>
                </div>

                <div class="soft-card rounded-[2rem] p-8">
                    <p class="text-4xl font-black text-gradient">03</p>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Future Vision</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        The future goal is to support modern retail, strengthen software and service-driven growth, create job opportunities and contribute to Oman’s development.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CUSTOMER SATISFACTION / OUTLETS --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-end gap-8 lg:grid-cols-[.9fr_1.1fr]">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Customer Satisfaction</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        We aim for a trusted and professional customer experience.
                    </h2>
                </div>
                <p class="text-lg leading-8 text-slate-600">
                    GPT Group aims to become a respected telecom distributor by delivering innovation, service excellence,
                    unique value propositions and sustainable relationships with customers and partners.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
                @php
                    $customerOutlets = [
                        ['title' => 'GPT Samsung Lounge', 'location' => 'Boshar, Muscat', 'desc' => 'Premium retail and customer interaction point.'],
                        ['title' => 'GPT Hikvision Stall', 'location' => 'Boshar, Muscat', 'desc' => 'Technology product support and brand visibility.'],
                        ['title' => 'GPT Service Centre', 'location' => 'Service Support', 'desc' => 'Customer service and after-sales assistance.'],
                        ['title' => 'Honor Phones Outlet', 'location' => 'Retail Outlet', 'desc' => 'Smartphone retail and product availability.'],
                        ['title' => 'GPT Samsung Lounge', 'location' => 'Retail Presence', 'desc' => 'Brand experience and customer support.'],
                    ];
                @endphp

                @foreach ($customerOutlets as $outlet)
                    <div class="soft-card rounded-[2rem] p-6">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <h3 class="mt-5 text-xl font-black leading-tight text-slate-950">{{ $outlet['title'] }}</h3>
                        <p class="mt-2 text-sm font-bold text-blue-700">{{ $outlet['location'] }}</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">{{ $outlet['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- OMAN VISION 2040 --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-[.95fr_1.05fr]">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Oman Vision 2040</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        Aligning with Oman Vision 2040 for sustainable growth.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        With Oman’s transformative Vision 2040 as a guiding framework, GPT Group aligns with national
                        goals around economic diversification, innovation, job creation and sustainable development.
                    </p>
                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        As a technology, IT and retail business, GPT Group can support a prosperous, digitally enabled and
                        knowledge-based future through investment, training and modern distribution practices.
                    </p>
                </div>

                <div class="soft-image-card rounded-[2.5rem] p-4">
                    <img class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[460px]"
                         src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=85"
                         alt="Oman Vision 2040">
                    <div class="mt-4 rounded-[1.5rem] bg-blue-50 p-6">
                        <p class="text-2xl font-black text-slate-950">A shared vision for growth and prosperity.</p>
                        <p class="mt-2 leading-7 text-slate-600">National development, digital transformation, local talent and sustainable business practices.</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-3xl font-black text-gradient">01</p>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Enhancing Technological Infrastructure</h3>
                    <p class="mt-3 leading-7 text-slate-600">Supporting modern digital infrastructure, IT solutions and telecom-led technology access across the market.</p>
                </div>

                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-3xl font-black text-gradient">02</p>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Bringing Top Brands to Oman</h3>
                    <p class="mt-3 leading-7 text-slate-600">Connecting Omani customers and businesses with trusted global technology brands and reliable product availability.</p>
                </div>

                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-3xl font-black text-gradient">03</p>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Supporting E-Commerce & Online Services</h3>
                    <p class="mt-3 leading-7 text-slate-600">Expanding digital services, online retail models and customer-first commerce experiences.</p>
                </div>

                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-3xl font-black text-gradient">04</p>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Investing in Human Capital</h3>
                    <p class="mt-3 leading-7 text-slate-600">Building skills, training teams and supporting local job creation through operational growth.</p>
                </div>

                <div class="soft-card rounded-[2rem] p-7 lg:col-span-2">
                    <p class="text-3xl font-black text-gradient">05</p>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Expanding Sustainable Business Practices</h3>
                    <p class="mt-3 leading-7 text-slate-600">Encouraging efficient operations, sustainable expansion, long-term partnerships and responsible market development.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- VISION MISSION VALUES --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Vision, Mission & Values</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Built on trust, quality and local growth.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    GPT Group is aligned with Oman’s economic aspirations, supporting local development, job creation and sustainable growth.
                </p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <div class="soft-card rounded-[2rem] p-8">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">V</div>
                    <h3 class="mt-6 text-2xl font-black text-slate-950">Vision</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        To lead the way in distribution, service and innovation while supporting Oman Vision 2040 and sustainable regional growth.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-8 text-white shadow-xl">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-white text-2xl font-black text-blue-700">M</div>
                    <h3 class="mt-6 text-2xl font-black">Mission</h3>
                    <p class="mt-3 leading-7 text-blue-50">
                        To connect consumers and partners with leading technology brands through efficient distribution, retail support and customer-centric execution.
                    </p>
                </div>

                <div class="soft-card rounded-[2rem] p-8">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">G</div>
                    <h3 class="mt-6 text-2xl font-black text-slate-950">Growth Values</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        Integrity, resilience, creativity, operational excellence, partner confidence and continuous learning.
                    </p>
                </div>
            </div>
        </div>
    </section>

  

    {{-- WHAT WE DO --}}
    @if($whatWeDoSection)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="relative order-1 lg:order-2">
                        <div class="soft-image-card overflow-hidden rounded-[2.5rem] p-4">
                            @if($whatWeDoSection->image)
                                <img class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[460px] lg:h-[560px]"
                                     src="{{ asset('storage/' . $whatWeDoSection->image) }}"
                                     alt="{{ $whatWeDoSection->title }}">
                            @else
                                <img class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[460px] lg:h-[560px]"
                                     src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                                     alt="{{ $whatWeDoSection->title }}">
                            @endif

                            @if($whatWeDoSection->overlay_title || $whatWeDoSection->overlay_text)
                                <div class="mt-4 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                    @if($whatWeDoSection->overlay_title)
                                        <p class="text-2xl font-black leading-tight text-slate-950">
                                            {{ $whatWeDoSection->overlay_title }}
                                        </p>
                                    @endif

                                    @if($whatWeDoSection->overlay_text)
                                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                            {{ $whatWeDoSection->overlay_text }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="order-2 lg:order-1">
                        @if($whatWeDoSection->label)
                            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                                {{ $whatWeDoSection->label }}
                            </p>
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
                            @if($whatWeDoSection->card_1_title || $whatWeDoSection->card_1_description)
                                <div class="soft-card rounded-[1.75rem] p-6">
                                    @if($whatWeDoSection->card_1_title)
                                        <h3 class="text-xl font-black text-slate-950">{{ $whatWeDoSection->card_1_title }}</h3>
                                    @endif
                                    @if($whatWeDoSection->card_1_description)
                                        <p class="mt-2 text-sm leading-6 text-slate-500">{{ $whatWeDoSection->card_1_description }}</p>
                                    @endif
                                </div>
                            @endif

                            @if($whatWeDoSection->card_2_title || $whatWeDoSection->card_2_description)
                                <div class="soft-card rounded-[1.75rem] p-6">
                                    @if($whatWeDoSection->card_2_title)
                                        <h3 class="text-xl font-black text-slate-950">{{ $whatWeDoSection->card_2_title }}</h3>
                                    @endif
                                    @if($whatWeDoSection->card_2_description)
                                        <p class="mt-2 text-sm leading-6 text-slate-500">{{ $whatWeDoSection->card_2_description }}</p>
                                    @endif
                                </div>
                            @endif

                            @if($whatWeDoSection->card_3_title || $whatWeDoSection->card_3_description)
                                <div class="soft-card rounded-[1.75rem] p-6">
                                    @if($whatWeDoSection->card_3_title)
                                        <h3 class="text-xl font-black text-slate-950">{{ $whatWeDoSection->card_3_title }}</h3>
                                    @endif
                                    @if($whatWeDoSection->card_3_description)
                                        <p class="mt-2 text-sm leading-6 text-slate-500">{{ $whatWeDoSection->card_3_description }}</p>
                                    @endif
                                </div>
                            @endif

                            @if($whatWeDoSection->card_4_title || $whatWeDoSection->card_4_description)
                                <div class="soft-card rounded-[1.75rem] p-6">
                                    @if($whatWeDoSection->card_4_title)
                                        <h3 class="text-xl font-black text-slate-950">{{ $whatWeDoSection->card_4_title }}</h3>
                                    @endif
                                    @if($whatWeDoSection->card_4_description)
                                        <p class="mt-2 text-sm leading-6 text-slate-500">{{ $whatWeDoSection->card_4_description }}</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- TEAM SECTION --}}
    @if(isset($teamMembers) && $teamMembers->count() > 0)
        <section class="about-section-soft py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">Leadership Team</p>
                        <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">GPT Group Team</h2>
                        <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                            The Group’s leadership and operational teams bring integrity, resilience, creativity and commitment to excellence.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                       class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl transition hover:-translate-y-1 hover:bg-blue-500">
                        Contact Team
                    </a>
                </div>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($teamMembers as $member)
                        <div class="soft-card group overflow-hidden rounded-[2rem]">
                            <div class="h-72 bg-gradient-to-br from-blue-50 to-cyan-50 p-6">
                                @if($member->image)
                                    <img class="h-full w-full rounded-[1.5rem] object-cover"
                                         src="{{ asset('storage/' . $member->image) }}"
                                         alt="{{ $member->name }}">
                                @else
                                    <div class="flex h-full w-full items-center justify-center rounded-[1.5rem] bg-white text-slate-400">No Image</div>
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

                                @if($member->profile_link)
                                    <a href="{{ $member->profile_link }}" target="_blank"
                                       class="mt-5 inline-flex rounded-full bg-blue-600 px-5 py-3 text-xs font-black text-white transition hover:bg-blue-500">
                                        View Profile →
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- OPERATIONAL EXCELLENCE --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Operational Staff</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        Specialized staff driving daily excellence.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group’s operational staff supports seamless operations, quality standards and strong relationships
                        with clients and partners. The company focuses on continuous learning, attention to detail and adaptability.
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="soft-card rounded-[1.75rem] p-6">
                            <h3 class="text-xl font-black text-slate-950">Lean Operations</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Efficient process and quality-focused execution.</p>
                        </div>

                        <div class="soft-card rounded-[1.75rem] p-6">
                            <h3 class="text-xl font-black text-slate-950">Training Culture</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Ongoing learning and workforce development.</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                         src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80"
                         alt="Team Work">
                    <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                         src="https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=900&q=80"
                         alt="Operations">
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="about-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
                <div class="grid items-center gap-8 lg:grid-cols-2">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-100">Partner With GPT Group</p>
                        <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                            Get the competitive advantage with GPT Group.
                        </h2>
                        <p class="mt-5 text-lg leading-8 text-blue-50">
                            Connect with GPT Group for brand partnership, product distribution, retail outlet support, B2B enquiries and market expansion.
                        </p>
                    </div>

                    <div class="lg:text-right">
                        <a href="{{ route('contact') }}"
                           class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
