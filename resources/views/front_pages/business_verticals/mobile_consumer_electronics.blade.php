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
                <a href="{{ route('business.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-black text-blue-700">
                    ← Back to Business Verticals
                </a>

                <p class="section-label mt-6">Mobile & Consumer Electronics Division</p>

                <h1 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-7xl">
                    Smart devices and consumer technology <span class="block text-gradient">delivered at market speed.</span>
                </h1>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">
                    GPT Group specializes in the distribution and supply of smartphones, mobile devices and accessories across retail and wholesale channels.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}"
                       class="rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl transition hover:-translate-y-1">
                        Request a Consultation
                    </a>

                    <a href="#solutions"
                       class="rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1">
                        Explore Solutions
                    </a>
                </div>
            </div>

            <div class="hero-card overflow-hidden rounded-[2.5rem] p-4">
                <img
                    class="h-[360px] w-full rounded-[2rem] object-cover sm:h-[480px]"
                    src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1400&q=85"
                    alt="Mobile & Consumer Electronics Division"
                >
            </div>
        </div>
    </div>
</section>

<section id="solutions" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="section-label">Solutions & Services</p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                Complete capabilities for customers and partners.
            </h2>
        </div>

        @php
            $services = [
                [
                    'title' => 'Smartphone Distribution',
                    'items' => [
                        'Retail and wholesale supply',
                        'Launch planning',
                        'Channel availability',
                    ],
                ],
                [
                    'title' => 'Mobile Accessories Distribution',
                    'items' => [
                        'Chargers and cables',
                        'Audio products',
                        'Protection accessories',
                    ],
                ],
                [
                    'title' => 'Retail Network Support',
                    'items' => [
                        'Product placement',
                        'Retail activation',
                        'Sales support',
                    ],
                ],
                [
                    'title' => 'Wholesale Distribution',
                    'items' => [
                        'Bulk supply',
                        'Dealer pricing support',
                        'Inventory coordination',
                    ],
                ],
                [
                    'title' => 'Brand Management',
                    'items' => [
                        'Market development',
                        'Campaign support',
                        'Partner coordination',
                    ],
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
                <div class="soft-card rounded-[2rem] p-7">
                    <span class="number-box">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <h3 class="mt-5 text-2xl font-black text-slate-950">
                        {{ $service['title'] }}
                    </h3>

                    @if(!empty($service['items']))
                        <div class="mt-5 space-y-3">
                            @foreach($service['items'] as $item)
                                <div class="check-item">
                                    <span class="check-icon">✓</span>
                                    <p class="font-semibold text-slate-700">
                                        {{ $item }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="vertical-muted py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr]">
            <div>
                <p class="section-label">Technology Brands</p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
                    Brands associated with this division.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Brand availability and partnership scope may vary by market,
                    commercial agreement and product category.
                </p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                @php
                    $brands = ["Samsung", "Vivo", "Lava International", "Nothing Technology"];
                @endphp

                @foreach($brands as $brand)
                    <div class="soft-card rounded-[1.75rem] p-7">
                        <div class="grid h-20 place-items-center rounded-2xl bg-blue-50">
                            <p class="text-2xl font-black text-slate-950">
                                {{ $brand }}
                            </p>
                        </div>

                        <p class="mt-4 text-sm leading-6 text-slate-500">
                            Product distribution, channel support and market development through GPT Group.
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @php
            $strengths = [
                [
                    'title' => 'Our Distribution Strength',
                    'description' => 'Strong product sourcing, inventory planning, retail execution and partner support across Oman and regional markets.',
                ],
                [
                    'title' => 'Retail Partner Network',
                    'description' => 'Relationships with retailers, dealers and resellers help brands reach customers efficiently.',
                ],
                [
                    'title' => 'Market Reach',
                    'description' => 'Coverage through wholesale, retail, B2B and channel-led routes to market.',
                ],
            ];
        @endphp

        <div class="grid gap-6 lg:grid-cols-3">
            @foreach($strengths as $strength)
                <div class="soft-card rounded-[2rem] p-8">
                    <p class="text-gradient text-4xl font-black">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </p>

                    <h3 class="mt-5 text-2xl font-black text-slate-950">
                        {{ $strength['title'] }}
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        {{ $strength['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="vertical-muted py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid items-center gap-8 lg:grid-cols-2">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Start a Conversation
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                        Discuss your requirement with GPT Group.
                    </h2>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}"
                       class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection