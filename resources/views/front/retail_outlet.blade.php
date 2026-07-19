@extends('front_pages.front_components.main')

@section('content')

<style>
    :root {
        --eco-blue: #1d4ed8;
        --eco-cyan: #06b6d4;
        --eco-dark: #071a35;
        --eco-muted: #64748b;
    }

    .ecosystem-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background:
            radial-gradient(circle at 88% 12%, rgba(6, 182, 212, .20), transparent 29%),
            radial-gradient(circle at 7% 74%, rgba(37, 99, 235, .14), transparent 32%),
            linear-gradient(135deg, #f7fbff 0%, #ffffff 48%, #edf7ff 100%);
    }

    .ecosystem-hero::before {
        position: absolute;
        inset: 0;
        z-index: -1;
        content: "";
        opacity: .5;
        background-image:
            linear-gradient(rgba(37, 99, 235, .045) 1px, transparent 1px),
            linear-gradient(90deg, rgba(37, 99, 235, .045) 1px, transparent 1px);
        background-size: 42px 42px;
        mask-image: linear-gradient(to bottom, #000, transparent 96%);
    }

    .eco-label {
        display: inline-flex;
        align-items: center;
        gap: .65rem;
        color: var(--eco-blue);
        font-size: .72rem;
        font-weight: 900;
        letter-spacing: .2em;
        text-transform: uppercase;
    }

    .eco-label::before {
        width: 2rem;
        height: 2px;
        content: "";
        background: linear-gradient(90deg, var(--eco-blue), var(--eco-cyan));
    }

    .eco-gradient {
        background: linear-gradient(90deg, var(--eco-blue), var(--eco-cyan));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .eco-image-shell {
        position: relative;
        border: 1px solid rgba(203, 213, 225, .85);
        border-radius: 1.8rem;
        background: rgba(255, 255, 255, .88);
        padding: .7rem;
        box-shadow: 0 30px 80px rgba(15, 46, 82, .16);
    }

    .model-card,
    .flow-card,
    .support-card {
        border: 1px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 12px 38px rgba(15, 23, 42, .06);
        transition:
            transform .32s ease,
            box-shadow .32s ease,
            border-color .32s ease;
    }

    .model-card:hover,
    .flow-card:hover,
    .support-card:hover {
        transform: translateY(-7px);
        border-color: rgba(37, 99, 235, .25);
        box-shadow: 0 24px 60px rgba(37, 99, 235, .13);
    }

    .model-number {
        display: grid;
        width: 3rem;
        height: 3rem;
        place-items: center;
        border-radius: 1rem;
        background: linear-gradient(135deg, var(--eco-blue), var(--eco-cyan));
        color: #ffffff;
        font-size: .8rem;
        font-weight: 900;
        box-shadow: 0 12px 25px rgba(37, 99, 235, .22);
    }

    .model-icon {
        display: grid;
        width: 3.4rem;
        height: 3.4rem;
        place-items: center;
        border-radius: 1.1rem;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 1.45rem;
        font-weight: 900;
    }

    .eco-pill {
        border-radius: 999px;
        background: #eff6ff;
        padding: .45rem .8rem;
        color: #1d4ed8;
        font-size: .69rem;
        font-weight: 900;
    }

    .soft-section {
        background:
            radial-gradient(circle at 90% 10%, rgba(6, 182, 212, .07), transparent 28%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .flow-line {
        position: relative;
    }

    .flow-line::after {
        position: absolute;
        top: 50%;
        right: -1rem;
        width: 2rem;
        height: 2px;
        content: "";
        background: linear-gradient(90deg, #93c5fd, #22d3ee);
    }

    @media (max-width: 1023px) {
        .flow-line::after {
            display: none;
        }
    }
</style>

{{-- 01. HERO --}}
<section class="ecosystem-hero py-12 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr]">
            <div>
                <p class="eco-label">GPT Group Business Ecosystem</p>

                <h1 class="mt-5 max-w-4xl text-4xl font-black leading-[1.08] text-slate-950 sm:text-5xl lg:text-6xl">
                    One technology group.
                    <span class="eco-gradient">Three powerful business models.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                    GPT Group connects global manufacturer partners with businesses,
                    projects and direct customers through an integrated model covering
                    distribution, technology solutions, retail and after-sales support.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a
                        href="#business-models"
                        class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                    >
                        Explore Our Business Models
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-sm transition hover:-translate-y-1"
                    >
                        Partner With GPT Group
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-3 gap-3">
                    <div class="support-card rounded-2xl p-4">
                        <p class="text-2xl font-black text-blue-700">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Project & Channel Sales</p>
                    </div>

                    <div class="support-card rounded-2xl p-4">
                        <p class="text-2xl font-black text-blue-700">Tech</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Integrated Solutions</p>
                    </div>

                    <div class="support-card rounded-2xl p-4">
                        <p class="text-2xl font-black text-blue-700">Retail</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Direct Customer Reach</p>
                    </div>
                </div>
            </div>

            <div class="eco-image-shell">
                <img
                    src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1600&q=88"
                    alt="GPT Group complete technology ecosystem"
                    class="h-[350px] w-full rounded-[1.35rem] object-cover sm:h-[440px] lg:h-[500px]"
                >

                <div class="absolute -bottom-5 left-6 right-6 rounded-2xl border border-white/60 bg-white/95 p-4 shadow-xl backdrop-blur sm:left-10 sm:right-auto sm:max-w-sm">
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
<section id="business-models" class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="eco-label justify-center">Our Business Models</p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Three connected pillars.
                <span class="eco-gradient">One unified market strategy.</span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                Each business model serves a different stage of the technology value chain,
                creating stronger coverage from brand representation to final customer support.
            </p>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            {{-- Model 01 --}}
            <article class="model-card rounded-[1.5rem] p-6 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <span class="model-number">01</span>
                    <span class="model-icon">↔</span>
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
                    <span class="eco-pill">Projects</span>
                    <span class="eco-pill">Dealers</span>
                    <span class="eco-pill">Resellers</span>
                    <span class="eco-pill">Enterprise</span>
                </div>
            </article>

            {{-- Model 02 --}}
            <article class="model-card rounded-[1.5rem] p-6 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <span class="model-number">02</span>
                    <span class="model-icon">⚙</span>
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
                    <span class="eco-pill">Hikvision</span>
                    <span class="eco-pill">Samsung</span>
                    <span class="eco-pill">Fibrain</span>
                    <span class="eco-pill">LifeSmart</span>
                </div>
            </article>

            {{-- Model 03 --}}
            <article class="model-card rounded-[1.5rem] p-6 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <span class="model-number">03</span>
                    <span class="model-icon">◆</span>
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
                    <span class="eco-pill">Outlets</span>
                    <span class="eco-pill">Customers</span>
                    <span class="eco-pill">Product Experience</span>
                    <span class="eco-pill">Support</span>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- 03. ECOSYSTEM FLOW --}}
<section class="soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="eco-label justify-center">How The Ecosystem Works</p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                From global brands to
                <span class="eco-gradient">customer satisfaction.</span>
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
                <article class="flow-card flow-line rounded-[1.35rem] p-5 text-center">
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
            @endforeach
        </div>
    </div>
</section>

{{-- 04. RETAIL NETWORK FOCUS --}}
<section class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[.95fr_1.05fr] lg:gap-14">
            <div class="eco-image-shell">
                <img
                    src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1500&q=88"
                    alt="GPT Group Retail Network"
                    class="h-[340px] w-full rounded-[1.35rem] object-cover sm:h-[420px]"
                    loading="lazy"
                >
            </div>

            <div>
                <p class="eco-label">Why Retail Network</p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    A stronger name for
                    <span class="eco-gradient">direct customer engagement.</span>
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
                    <div class="support-card rounded-[1.25rem] p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Corporate Alignment
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Clearly connects the retail business with the wider GPT Group identity.
                        </p>
                    </div>

                    <div class="support-card rounded-[1.25rem] p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Customer Visibility
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Shows where customers directly experience and purchase GPT products.
                        </p>
                    </div>

                    <div class="support-card rounded-[1.25rem] p-5">
                        <h3 class="text-lg font-black text-slate-950">
                            Brand Experience
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Supports product launches, demonstrations and professional retail presentation.
                        </p>
                    </div>

                    <div class="support-card rounded-[1.25rem] p-5">
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
<section class="soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-7 lg:grid-cols-[.75fr_1.25fr] lg:items-center">
            <div>
                <p class="eco-label">GPT Care</p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    The ecosystem continues
                    <span class="eco-gradient">after the sale.</span>
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
                    <article class="support-card rounded-[1.25rem] p-5">
                        <span class="model-number">
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
<section class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
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
<section class="soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
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
                    class="inline-flex min-w-44 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                >
                    Contact GPT Group
                </a>
            </div>
        </div>
    </div>
</section>

@endsection