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
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .20), transparent 28%),
            radial-gradient(circle at 8% 42%, rgba(147, 197, 253, .22), transparent 30%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 46%, #eff6ff 100%);
    }

    .vertical-muted {
        background:
            radial-gradient(circle at top right, rgba(34, 211, 238, .06), transparent 28%),
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
        background: rgba(255, 255, 255, .96);
        box-shadow: 0 12px 38px rgba(15, 23, 42, .06);
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .soft-card:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 20px 52px rgba(37, 99, 235, .11);
    }

    .hero-card {
        border: 1px solid rgba(226, 232, 240, .95);
        border-radius: 1.5rem;
        background: #ffffff;
        box-shadow: 0 16px 48px rgba(15, 23, 42, .09);
    }

    .number-box {
        display: grid;
        height: 2.5rem;
        width: 2.5rem;
        place-items: center;
        border-radius: .8rem;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: .8rem;
        font-weight: 900;
    }

    .check-item {
        display: flex;
        align-items: flex-start;
        gap: .75rem;
        border: 1px solid #f1f5f9;
        border-radius: .9rem;
        background: #ffffff;
        padding: .75rem .85rem;
        box-shadow: 0 1px 3px rgba(15, 23, 42, .04);
    }

    .check-icon {
        margin-top: .1rem;
        display: grid;
        height: 1.45rem;
        width: 1.45rem;
        flex: 0 0 1.45rem;
        place-items: center;
        border-radius: 999px;
        background: linear-gradient(135deg, #2563eb, #06b6d4);
        color: #ffffff;
        font-size: .62rem;
        font-weight: 900;
    }
</style>


<section class="vertical-soft-bg overflow-hidden py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-[1.05fr_.95fr] lg:gap-10">
            <div>
                <p class="section-label">Our Business Verticals</p>

                <h1 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Integrated technology businesses
                    <span class="block text-gradient">built for modern markets.</span>
                </h1>

                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    GPT Group operates through four focused divisions covering mobile and consumer electronics,
                    integrated security, IT infrastructure and regional trading and distribution.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}"
                       class="rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1">
                        Partner With Us
                    </a>

                    <a href="#divisions"
                       class="rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1">
                        Explore Divisions
                    </a>
                </div>
            </div>

            <div class="hero-card overflow-hidden p-3">
                <img
                    class="h-[260px] w-full rounded-[1.2rem] object-cover sm:h-[320px] lg:h-[360px]"
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1400&q=85"
                    alt="GPT Group Business Verticals"
                    loading="lazy"
                >

                <div class="mt-3 grid grid-cols-2 gap-3">
                    <div class="rounded-xl bg-blue-50 p-4">
                        <p class="text-xl font-black text-blue-700">4</p>
                        <p class="text-xs font-bold text-slate-700">Focused Divisions</p>
                    </div>

                    <div class="rounded-xl bg-cyan-50 p-4">
                        <p class="text-xl font-black text-cyan-700">GCC</p>
                        <p class="text-xs font-bold text-slate-700">Regional Reach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="divisions" class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="section-label">Four Core Divisions</p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                One group. Multiple technology capabilities.
            </h2>

            <p class="mt-3 text-base leading-7 text-slate-600">
                Each division serves a focused market need while working together as one integrated platform.
            </p>
        </div>

        @php
            $divisions = [
                [
                    'route' => 'business.mobile',
                    'number' => '01',
                    'title' => 'Mobile & Consumer Electronics',
                    'description' => 'Smartphones, devices and accessories across retail and wholesale channels.',
                    'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1000&q=80',
                    'items' => ['Smartphones', 'Accessories', 'Retail Support', 'Brand Management'],
                ],
                [
                    'route' => 'business.security',
                    'number' => '02',
                    'title' => 'Security Solutions',
                    'description' => 'Surveillance, access control, intercom and parking management.',
                    'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1000&q=80',
                    'items' => ['CCTV', 'Intercom', 'Access Control', 'Parking'],
                ],
                [
                    'route' => 'business.infrastructure',
                    'number' => '03',
                    'title' => 'IT Infrastructure Solutions',
                    'description' => 'Cabling, connectivity, rack and scalable network infrastructure.',
                    'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1000&q=80',
                    'items' => ['Cabling', 'Fiber', 'Switching', 'Certification'],
                ],
                [
                    'route' => 'business.trading',
                    'number' => '04',
                    'title' => 'Trading & Distribution',
                    'description' => 'A trusted route-to-market partner for global technology brands.',
                    'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1000&q=80',
                    'items' => ['Import & Export', 'Supply Chain', 'Partners', 'Distribution'],
                ],
            ];
        @endphp

        <div class="mt-8 grid gap-4 lg:grid-cols-2">
            @foreach($divisions as $division)
                <a href="{{ route($division['route']) }}"
                   class="soft-card group overflow-hidden">
                    <div class="h-44 overflow-hidden sm:h-48">
                        <img
                            src="{{ $division['image'] }}"
                            alt="{{ $division['title'] }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            loading="lazy"
                        >
                    </div>

                    <div class="p-5">
                        <div class="flex items-start justify-between gap-4">
                            <span class="number-box">{{ $division['number'] }}</span>

                            <span class="grid h-9 w-9 place-items-center rounded-full bg-slate-100 text-lg text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                →
                            </span>
                        </div>

                        <h3 class="mt-4 text-xl font-black text-slate-950 sm:text-2xl">
                            {{ $division['title'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $division['description'] }}
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($division['items'] as $item)
                                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">
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

<section class="vertical-muted py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @php
            $strengths = [
                ['title' => 'Regional Experience', 'desc' => 'Strong understanding of Oman and GCC technology markets.'],
                ['title' => 'Multi-Channel Distribution', 'desc' => 'Retail, wholesale, B2B and project-based supply.'],
                ['title' => 'Technology Partnerships', 'desc' => 'Support for global brands and solution providers.'],
                ['title' => 'Customer-Focused Execution', 'desc' => 'Reliable service and long-term business relationships.'],
            ];
        @endphp

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach($strengths as $strength)
                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </p>

                    <h3 class="mt-3 text-lg font-black text-slate-950">
                        {{ $strength['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $strength['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[1.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">
            <div class="grid items-center gap-6 lg:grid-cols-2">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        Business Partnership
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Looking for a distribution or solutions partner?
                    </h2>

                    <p class="mt-3 text-base leading-7 text-blue-50">
                        Work with GPT Group for market entry, technology supply and regional expansion.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}"
                       class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1">
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
