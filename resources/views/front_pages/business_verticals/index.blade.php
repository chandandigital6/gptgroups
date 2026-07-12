@extends('front_pages.front_components.main')

@section('content')

<style>
    :root {
        --gpt-blue: #2563eb;
        --gpt-cyan: #06b6d4;
        --gpt-dark: #0f172a;
    }

    .vertical-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .25), transparent 28%),
            radial-gradient(circle at 8% 42%, rgba(147, 197, 253, .28), transparent 30%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 45%, #eff6ff 100%);
    }

    .vertical-muted {
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
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .28em;
        color: #1d4ed8;
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

    .hero-card {
        border: 1px solid rgba(226, 232, 240, .95);
        background: #ffffff;
        box-shadow: 0 24px 80px rgba(15, 23, 42, .12);
    }

    .number-box {
        display: grid;
        height: 3rem;
        width: 3rem;
        place-items: center;
        border-radius: 1rem;
        background: #eff6ff;
        color: #1d4ed8;
        font-weight: 900;
    }

    .check-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        border-radius: 1rem;
        background: #ffffff;
        padding: 1rem;
        box-shadow: 0 1px 3px rgba(15, 23, 42, .06);
        border: 1px solid #f1f5f9;
    }

    .check-icon {
        margin-top: .15rem;
        display: grid;
        height: 1.75rem;
        width: 1.75rem;
        flex-shrink: 0;
        place-items: center;
        border-radius: 999px;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        color: #ffffff;
        font-size: .75rem;
        font-weight: 900;
    }
</style>


<section class="vertical-soft-bg overflow-hidden py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-[1.05fr_.95fr]">
            <div>
                <p class="section-label">Our Business Verticals</p>

                <h1 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-7xl">
                    Integrated technology businesses
                    <span class="block text-gradient">built for modern markets.</span>
                </h1>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">
                    GPT Group operates through four focused divisions covering mobile and consumer electronics,
                    integrated security solutions, enterprise IT infrastructure and regional trading and distribution.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}"
                       class="rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl transition hover:-translate-y-1">
                        Partner With Us
                    </a>

                    <a href="#divisions"
                       class="rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1">
                        Explore Divisions
                    </a>
                </div>
            </div>

            <div class="hero-card overflow-hidden rounded-[2.5rem] p-4">
                <img
                    class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[480px]"
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1400&q=85"
                    alt="GPT Group Business Verticals"
                >

                <div class="mt-4 grid grid-cols-2 gap-4">
                    <div class="rounded-2xl bg-blue-50 p-5">
                        <p class="text-2xl font-black text-blue-700">4</p>
                        <p class="font-bold text-slate-700">Focused Divisions</p>
                    </div>

                    <div class="rounded-2xl bg-cyan-50 p-5">
                        <p class="text-2xl font-black text-cyan-700">GCC</p>
                        <p class="font-bold text-slate-700">Regional Reach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="divisions" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="section-label">Four Core Divisions</p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                One group. Multiple technology capabilities.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                Each division is designed to serve a specific market requirement while working together
                as one integrated business platform.
            </p>
        </div>

        @php
            $divisions = [
                [
                    'route' => 'business.mobile',
                    'number' => '01',
                    'title' => 'Mobile & Consumer Electronics',
                    'description' => 'Smartphones, mobile devices and accessories distributed through retail and wholesale channels.',
                    'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1000&q=80',
                    'items' => [
                        'Smartphone Distribution',
                        'Accessories',
                        'Retail Support',
                        'Brand Management',
                    ],
                ],
                [
                    'route' => 'business.security',
                    'number' => '02',
                    'title' => 'Security Solutions',
                    'description' => 'Integrated surveillance, access control, intercom and parking management solutions.',
                    'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1000&q=80',
                    'items' => [
                        'CCTV Surveillance',
                        'Video Intercom',
                        'Access Control',
                        'Parking Automation',
                    ],
                ],
                [
                    'route' => 'business.infrastructure',
                    'number' => '03',
                    'title' => 'IT Infrastructure Solutions',
                    'description' => 'Secure and scalable cabling, connectivity, racks and network infrastructure.',
                    'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1000&q=80',
                    'items' => [
                        'Structured Cabling',
                        'Fiber Networks',
                        'Switching',
                        'Testing & Certification',
                    ],
                ],
                [
                    'route' => 'business.trading',
                    'number' => '04',
                    'title' => 'Trading & Distribution',
                    'description' => 'A trusted route-to-market partner connecting global brands with regional customers.',
                    'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1000&q=80',
                    'items' => [
                        'Import & Export',
                        'Supply Chain',
                        'Partner Network',
                        'Market Distribution',
                    ],
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-6 lg:grid-cols-2">
            @foreach($divisions as $division)
                <a href="{{ route($division['route']) }}"
                   class="soft-card group overflow-hidden rounded-[2.25rem]">

                    <div class="h-64 overflow-hidden">
                        <img
                            src="{{ $division['image'] }}"
                            alt="{{ $division['title'] }}"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                        >
                    </div>

                    <div class="p-8">
                        <div class="flex items-start justify-between gap-5">
                            <span class="number-box">{{ $division['number'] }}</span>

                            <span class="grid h-12 w-12 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                →
                            </span>
                        </div>

                        <h3 class="mt-6 text-3xl font-black text-slate-950">
                            {{ $division['title'] }}
                        </h3>

                        <p class="mt-3 text-lg leading-8 text-slate-600">
                            {{ $division['description'] }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            @foreach($division['items'] as $item)
                                <span class="rounded-full bg-blue-50 px-4 py-2 text-xs font-black text-blue-700">
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="vertical-muted py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @php
                $strengths = [
                    ['title' => 'Regional Experience', 'desc' => 'Strong understanding of Oman and GCC technology markets.'],
                    ['title' => 'Multi-Channel Distribution', 'desc' => 'Retail, wholesale, B2B and project-based supply capabilities.'],
                    ['title' => 'Technology Partnerships', 'desc' => 'Support for global brands and solution providers.'],
                    ['title' => 'Customer-Focused Execution', 'desc' => 'Reliable service, responsive coordination and long-term relationships.'],
                ];
            @endphp

            @foreach($strengths as $strength)
                <div class="soft-card rounded-[2rem] p-7">
                    <p class="text-gradient text-4xl font-black">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </p>

                    <h3 class="mt-5 text-2xl font-black text-slate-950">
                        {{ $strength['title'] }}
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        {{ $strength['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid items-center gap-8 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Business Partnership
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                        Looking for a distribution or solutions partner?
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Work with GPT Group for market entry, technology supply, enterprise projects
                        and regional expansion.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}"
                       class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
