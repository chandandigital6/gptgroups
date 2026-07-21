@extends('front_pages.front_components.main')

@section('content')


{{-- 01. HERO --}}
<section
    class="relative flex min-h-[340px] items-center overflow-hidden bg-gradient-to-br from-white via-slate-50 to-blue-50 py-8 sm:min-h-[360px] sm:py-9 lg:min-h-[390px] lg:py-10"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-[1.08fr_.92fr]">
            <div>
                <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                GPT Group Business Ecosystem
            </p>

                <h1 class="mt-4 max-w-4xl text-3xl font-black leading-[1.08] text-slate-950 sm:text-4xl lg:text-5xl">
                    One technology group.
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Three powerful business models.</span>
                </h1>

                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                    GPT Group connects global manufacturer partners with businesses,
                    projects and direct customers through an integrated model covering
                    distribution, technology solutions, retail and after-sales support.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a
                        href="#business-models"
                        class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-0.5"
                    >
                        Explore Our Business Models
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-sm transition hover:-translate-y-0.5"
                    >
                        Partner With GPT Group
                    </a>
                </div>

                <div class="mt-6 grid max-w-xl grid-cols-3 gap-3">
                    <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                        <p class="text-2xl font-black text-blue-700">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Project & Channel Sales</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                        <p class="text-2xl font-black text-blue-700">Tech</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Integrated Solutions</p>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                        <p class="text-2xl font-black text-blue-700">Retail</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Direct Customer Reach</p>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                <img
                    src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1400&q=76"
                    alt="GPT Group complete technology ecosystem"
                    class="h-[240px] w-full rounded-xl object-cover sm:h-[270px] lg:h-[300px]"
                    loading="eager"
                    fetchpriority="high"
                >

                <div class="absolute bottom-3 left-3 right-3 rounded-xl border border-white/60 bg-white/95 p-3 shadow-lg sm:left-5 sm:right-auto sm:max-w-xs">
                    <p class="text-xs font-black uppercase tracking-[.18em] text-blue-700">
                        Complete Technology Ecosystem
                    </p>

                    <p class="mt-2 text-sm font-bold leading-6 text-slate-700">
                        Manufacturer Partners → Distribution → Projects →
                        Retail → After-Sales Support
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 02. BUSINESS MODELS --}}
<section id="business-models" class="bg-white py-12 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                Our Business Models
            </p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Three connected pillars.
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">One unified market strategy.</span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                Each business model serves a different stage of the technology value chain,
                creating stronger coverage from brand representation to final customer support.
            </p>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            {{-- Model 01 --}}
            <article class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-6 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">01</span>
                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-blue-50 text-xl font-black text-blue-700">↔</span>
                </div>

                <p class="mt-5 text-xs font-black uppercase tracking-[.16em] text-blue-700">
                    Distribution & B2B
                </p>

                <h3 class="mt-3 text-2xl font-black text-slate-950">
                    Project Sales + Channel Sales
                </h3>

                <p class="mt-4 text-sm leading-7 text-slate-600">
                    GPT Group supplies technology products and solutions through project-based
                    business sales and a strong dealer, reseller and channel partner network.
                </p>

                <div class="mt-5 grid gap-3">
                    @foreach ([
                        'Project consultation and BOQ support',
                        'Commercial and enterprise supply',
                        'Dealer and reseller distribution',
                        'Stock availability and competitive pricing',
                        'Tender and technical proposal support',
                        'Channel marketing and partner enablement',
                    ] as $item)
                        <div class="flex items-start gap-3 rounded-xl bg-slate-50 p-3">
                            <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-blue-600 text-[10px] font-black text-white">
                                ✓
                            </span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">
                                {{ $item }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Projects</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Dealers</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Resellers</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Enterprise</span>
                </div>
            </article>

            {{-- Model 02 --}}
            <article class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-6 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">02</span>
                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-blue-50 text-xl font-black text-blue-700">⚙</span>
                </div>

                <p class="mt-5 text-xs font-black uppercase tracking-[.16em] text-blue-700">
                    Technology Solutions
                </p>

                <h3 class="mt-3 text-2xl font-black text-slate-950">
                    Integrated Products & Solutions
                </h3>

                <p class="mt-4 text-sm leading-7 text-slate-600">
                    GPT Group combines products from leading technology brands to create
                    complete solutions for mobility, security, smart living and infrastructure.
                </p>

                <div class="mt-5 grid gap-3">
                    @foreach ([
                        'Mobility and consumer electronics',
                        'Integrated security and ELV solutions',
                        'Smart home and IoT automation',
                        'Network infrastructure and structured cabling',
                        'Product consultation and solution design',
                        'Technical and pre-sales support',
                    ] as $item)
                        <div class="flex items-start gap-3 rounded-xl bg-slate-50 p-3">
                            <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-cyan-500 text-[10px] font-black text-white">
                                ✓
                            </span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">
                                {{ $item }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Hikvision</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Samsung</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Fibrain</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">LifeSmart</span>
                </div>
            </article>

            {{-- Model 03 --}}
            <article class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-6 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">03</span>
                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-blue-50 text-xl font-black text-blue-700">◆</span>
                </div>

                <p class="mt-5 text-xs font-black uppercase tracking-[.16em] text-blue-700">
                    Retail Network
                </p>

                <h3 class="mt-3 text-2xl font-black text-slate-950">
                    Direct Customer Sales Through GPT Outlets
                </h3>

                <p class="mt-4 text-sm leading-7 text-slate-600">
                    GPT Group’s retail network brings products, demonstrations,
                    customer service and trusted buying experiences directly to end customers.
                </p>

                <div class="mt-5 grid gap-3">
                    @foreach ([
                        'Direct access to technology products',
                        'Live product demonstration and guidance',
                        'Official product availability',
                        'Customer-focused retail experience',
                        'Local market presence and brand visibility',
                        'Service and after-sales coordination',
                    ] as $item)
                        <div class="flex items-start gap-3 rounded-xl bg-slate-50 p-3">
                            <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-blue-600 text-[10px] font-black text-white">
                                ✓
                            </span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">
                                {{ $item }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Outlets</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Customers</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Product Experience</span>
                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">Support</span>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- 03. ECOSYSTEM FLOW --}}
<section class="bg-slate-50 py-12 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                How The Ecosystem Works
            </p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                From global brands to
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">customer satisfaction.</span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                GPT Group connects every stage of the technology journey through one
                coordinated business platform.
            </p>
        </div>

        @php
            $ecosystemFlow = [
                [
                    'number' => '01',
                    'title' => 'Manufacturer Partners',
                    'description' => 'Trusted global brands provide innovative products and technologies.',
                    'icon' => '◉',
                ],
                [
                    'number' => '02',
                    'title' => 'Distribution',
                    'description' => 'GPT Group manages sourcing, supply, inventory and market availability.',
                    'icon' => '⇄',
                ],
                [
                    'number' => '03',
                    'title' => 'Projects',
                    'description' => 'Products are converted into complete B2B and project solutions.',
                    'icon' => '▦',
                ],
                [
                    'number' => '04',
                    'title' => 'Retail Network',
                    'description' => 'GPT outlets connect technology directly with end customers.',
                    'icon' => '◆',
                ],
                [
                    'number' => '05',
                    'title' => 'After-Sales Support',
                    'description' => 'Service, repair, warranty and technical support complete the customer journey.',
                    'icon' => '✓',
                ],
            ];
        @endphp

        <div class="mt-10 grid gap-5 lg:grid-cols-5">
            @foreach ($ecosystemFlow as $step)
                <article class="relative rounded-2xl border border-slate-200 bg-white p-5 text-center shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg">
                    <div class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xl font-black text-white shadow-lg">
                        {{ $step['icon'] }}
                    </div>

                    <p class="mt-4 text-xs font-black uppercase tracking-[.15em] text-blue-700">
                        Step {{ $step['number'] }}
                    </p>

                    <h3 class="mt-2 text-lg font-black text-slate-950">
                        {{ $step['title'] }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-600">
                        {{ $step['description'] }}
                    </p>
                </article>

                @if (!$loop->last)
                    <div class="hidden lg:absolute lg:right-[-18px] lg:top-1/2 lg:block lg:h-0.5 lg:w-9 lg:-translate-y-1/2 lg:bg-gradient-to-r lg:from-blue-300 lg:to-cyan-300"></div>
                @endif
            @endforeach
        </div>
    </div>
</section>

{{-- 04. RETAIL NETWORK FOCUS --}}
<section class="bg-white py-12 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[.95fr_1.05fr] lg:gap-14">
            <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                <img
                    src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=76"
                    alt="GPT Group Retail Network"
                    class="h-[340px] w-full rounded-xl object-cover sm:h-[420px]"
                    loading="lazy"
                >
            </div>

            <div>
                <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                Why Retail Network
            </p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    A stronger name for
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">direct customer engagement.</span>
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600">
                    “Retail Network” communicates more than physical outlets. It represents
                    GPT Group’s complete direct-to-customer capability — product availability,
                    brand experience, live demonstrations, sales support and customer care.
                </p>

                <p class="mt-4 text-base leading-8 text-slate-600">
                    This positioning fits naturally with GPT Group’s corporate identity because
                    it shows how distribution and technology solutions ultimately reach the final customer.
                </p>

                <div class="mt-7 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Corporate Alignment
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Clearly connects the retail business with the wider GPT Group identity.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Customer Visibility
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Shows where customers directly experience and purchase GPT products.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Brand Experience
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Supports product launches, demonstrations and professional retail presentation.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            After-Sales Connection
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Creates a natural link between product sales, service and customer retention.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 05. AFTER SALES SUPPORT --}}
<section class="bg-slate-50 py-12 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-7 lg:grid-cols-[.75fr_1.25fr] lg:items-center">
            <div>
                <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                GPT Care
            </p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    The ecosystem continues
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">after the sale.</span>
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600">
                    GPT Group strengthens customer confidence through coordinated
                    after-sales service, warranty support, product configuration,
                    repair assistance and technical guidance.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Warranty Support', 'Support for eligible product warranty and service requirements.'],
                    ['Technical Assistance', 'Help with product setup, configuration and troubleshooting.'],
                    ['Repair Coordination', 'Service and repair support through GPT Care operations.'],
                    ['Customer Guidance', 'Product assistance before, during and after purchase.'],
                    ['Partner Support', 'Technical and service coordination for dealers and resellers.'],
                    ['Long-Term Relationships', 'Customer satisfaction and continued business engagement.'],
                ] as $support)
                    <article class="rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg rounded-2xl p-5">
                        <span class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3 class="mt-4 text-lg font-black text-slate-950">
                            {{ $support[0] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $support[1] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- 06. SUMMARY --}}
<section class="bg-white py-12 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-3xl bg-slate-950 p-7 text-white shadow-xl sm:p-10 lg:p-12">
            <div class="grid items-center gap-10 lg:grid-cols-[1fr_.85fr]">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-300">
                        GPT Group Positioning
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        A complete technology ecosystem built for brands,
                        partners, projects and customers.
                    </h2>

                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300">
                        GPT Group’s integrated model creates a clear and powerful market image:
                        global technology partnerships supported by distribution strength,
                        project expertise, retail reach and after-sales care.
                    </p>
                </div>

                <div class="grid gap-3">
                    @foreach ([
                        'Manufacturer Partners',
                        'Distribution & B2B',
                        'Technology Solutions',
                        'Retail Network',
                        'After-Sales Support',
                    ] as $item)
                        <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/10 p-4">
                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-cyan-400 text-xs font-black text-slate-950">
                                ✓
                            </span>
                            <p class="text-sm font-black text-white">
                                {{ $item }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 07. CTA --}}
<section class="bg-slate-50 py-12 sm:py-14 lg:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-xl sm:p-10 lg:p-12">
            <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-200">
                        Partner With GPT Group
                    </p>

                    <h2 class="mt-4 max-w-3xl text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Connect your brand, project or retail opportunity
                        with our complete technology ecosystem.
                    </h2>
                </div>

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex min-w-44 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-0.5"
                >
                    Contact GPT Group
                </a>
            </div>
        </div>
    </div>
</section>

@endsection