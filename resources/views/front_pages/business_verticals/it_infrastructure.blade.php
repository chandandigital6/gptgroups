
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
            radial-gradient(
                circle at 88% 10%,
                rgba(103, 232, 249, 0.20),
                transparent 28%
            ),
            radial-gradient(
                circle at 8% 42%,
                rgba(147, 197, 253, 0.22),
                transparent 30%
            ),
            linear-gradient(
                135deg,
                #ffffff 0%,
                #f8fafc 46%,
                #eff6ff 100%
            );
    }

    .vertical-muted {
        background:
            radial-gradient(
                circle at top right,
                rgba(34, 211, 238, 0.06),
                transparent 28%
            ),
            linear-gradient(
                180deg,
                #ffffff 0%,
                #f8fafc 100%
            );
    }

    .text-gradient {
        background: linear-gradient(
            90deg,
            var(--gpt-blue),
            var(--gpt-cyan)
        );
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .section-label {
        color: #1d4ed8;
        font-size: 0.75rem;
        font-weight: 900;
        letter-spacing: 0.22em;
        text-transform: uppercase;
    }

    .soft-card {
        border: 1px solid rgba(226, 232, 240, 0.95);
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, 0.96);
        box-shadow: 0 12px 38px rgba(15, 23, 42, 0.06);
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .soft-card:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, 0.18);
        box-shadow: 0 20px 52px rgba(37, 99, 235, 0.11);
    }

    .hero-card {
        border: 1px solid rgba(226, 232, 240, 0.95);
        border-radius: 1.5rem;
        background: #ffffff;
        box-shadow: 0 16px 48px rgba(15, 23, 42, 0.09);
    }

    .number-box {
        display: grid;
        height: 2.5rem;
        width: 2.5rem;
        place-items: center;
        border-radius: 0.8rem;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 0.8rem;
        font-weight: 900;
    }

    .check-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        border: 1px solid #f1f5f9;
        border-radius: 0.9rem;
        background: #ffffff;
        padding: 0.75rem 0.85rem;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
    }

    .check-icon {
        margin-top: 0.1rem;
        display: grid;
        height: 1.45rem;
        width: 1.45rem;
        flex: 0 0 1.45rem;
        place-items: center;
        border-radius: 999px;
        background: linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );
        color: #ffffff;
        font-size: 0.62rem;
        font-weight: 900;
    }
</style>

<section class="vertical-soft-bg overflow-hidden py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-7 lg:grid-cols-[1.05fr_.95fr] lg:gap-10">

            <div>
                <a
                    href="{{ route('business.index') }}"
                    class="inline-flex items-center gap-2 text-xs font-black text-blue-700 sm:text-sm"
                >
                    ← Back to Business Verticals
                </a>

                <p class="section-label mt-4">
                    IT Infrastructure Solutions
                </p>

                <h1 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Reliable infrastructure for secure, scalable

                    <span class="block text-gradient">
                        and connected businesses.
                    </span>
                </h1>

                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    GPT Group delivers secure and scalable network
                    infrastructure solutions for modern businesses.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                    >
                        Request a Consultation
                    </a>

                    <a
                        href="#solutions"
                        class="rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1"
                    >
                        Explore Solutions
                    </a>

                </div>
            </div>

            <div class="hero-card overflow-hidden p-3">
                <img
                    src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1400&q=85"
                    alt="IT Infrastructure Solutions"
                    class="h-[260px] w-full rounded-[1.2rem] object-cover sm:h-[320px] lg:h-[360px]"
                    loading="lazy"
                >
            </div>

        </div>
    </div>
</section>

<section id="solutions" class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            <p class="section-label">
                Solutions & Services
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Complete capabilities for customers and partners.
            </h2>

        </div>

        @php
            $services = [
                [
                    'title' => 'Structured Cabling',
                    'items' => [
                        'Copper cabling',
                        'Fiber optic cabling',
                        'Network infrastructure',
                        'Testing and certification',
                    ],
                ],
                [
                    'title' => 'Network Infrastructure',
                    'items' => [
                        'Switches',
                        'Connectivity solutions',
                        'Rack solutions',
                    ],
                ],
                [
                    'title' => 'Surveillance Infrastructure',
                    'items' => [
                        'Network backbone',
                        'Video transmission',
                        'Security integration',
                    ],
                ],
            ];
        @endphp

        <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($services as $service)
                <div class="soft-card p-5">

                    <span class="number-box">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <h3 class="mt-4 text-xl font-black text-slate-950">
                        {{ $service['title'] }}
                    </h3>

                    <div class="mt-4 space-y-2.5">

                        @foreach ($service['items'] as $item)
                            <div class="check-item">

                                <span class="check-icon">
                                    ✓
                                </span>

                                <p class="text-sm font-semibold leading-5 text-slate-700">
                                    {{ $item }}
                                </p>

                            </div>
                        @endforeach

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- <section class="vertical-muted py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-7 lg:grid-cols-[.8fr_1.2fr] lg:gap-10">

            <div>
                <p class="section-label">
                    Technology Brands
                </p>

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Brands associated with this division.
                </h2>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    Brand availability and partnership scope may vary by
                    market and product category.
                </p>
            </div>

            @php
                $brands = [
                    'Prysmian Group',
                    'Fibrain',
                    // 'Avalon',
                ];
            @endphp

            <div class="grid gap-3 sm:grid-cols-2">

                @foreach ($brands as $brand)
                    <div class="soft-card p-4">

                        <div class="grid h-14 place-items-center rounded-xl bg-blue-50">
                            <p class="text-lg font-black text-slate-950">
                                {{ $brand }}
                            </p>
                        </div>

                        <p class="mt-3 text-xs leading-5 text-slate-500">
                            Distribution, channel support and market development
                            through GPT Group.
                        </p>

                    </div>
                @endforeach

            </div>

        </div>

    </div>
</section> --}}


<section class="vertical-muted py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-7 lg:grid-cols-[.8fr_1.2fr] lg:gap-10">

            {{-- Left Content --}}
            <div class="flex h-full flex-col items-center justify-center text-center lg:px-6">
                <p class="section-label">
                    Infrastructure Technology Brands
                </p>

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Brands associated with this division.
                </h2>

                <p class="mt-3 max-w-xl text-base leading-7 text-slate-600">
                    Explore trusted cable, fiber-optic and infrastructure technology
                    brands supported through GPT Group’s distribution and market network.
                </p>
            </div>

            @php
                $brands = [
                    [
                        'name' => 'Prysmian Group',
                        'logo_names' => ['prysmian', 'prysmian group'],
                        'website' => 'https://www.prysmian.com/en',
                        'description' => 'Energy cables, telecom cables, fiber solutions and infrastructure connectivity systems.',
                    ],
                    [
                        'name' => 'FIBRAIN',
                        'logo_names' => ['fibrain'],
                        'website' => 'https://fibrain.com/',
                        'description' => 'Fiber-optic cables, optical connectivity, structured cabling and communication infrastructure.',
                    ],
                ];
            @endphp

            {{-- Brand Cards --}}
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach ($brands as $brand)
                    @php
                        $logoCandidates = collect($brand['logo_names'])
                            ->flatMap(function ($name) {
                                return [
                                    asset('assets/logo brands/' . $name . '.png'),
                                    asset('assets/logo brands/' . $name . '.jpg'),
                                    asset('assets/logo brands/' . $name . '.jpeg'),
                                    asset('assets/logo brands/' . $name . '.webp'),
                                ];
                            })
                            ->values();
                    @endphp

                    <a
                        href="{{ $brand['website'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="soft-card group block overflow-hidden rounded-2xl border border-slate-100 bg-white p-4 transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl"
                    >
                        {{-- Brand Logo --}}
                        <div class="relative grid h-28 place-items-center overflow-hidden rounded-xl border border-slate-100 bg-white px-5">
                            <img
                                src="{{ $logoCandidates[0] }}"
                                alt="{{ $brand['name'] }} official logo"
                                class="brand-logo h-16 w-full object-contain transition duration-300 group-hover:scale-105"
                                data-candidates='@json($logoCandidates)'
                                data-index="0"
                                loading="lazy"
                            >

                            <span class="brand-logo-fallback hidden text-center text-xl font-black text-slate-800">
                                {{ $brand['name'] }}
                            </span>
                        </div>

                        {{-- Brand Details --}}
                        <div class="mt-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-lg font-black text-slate-950">
                                    {{ $brand['name'] }}
                                </h3>

                                <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-blue-50 text-sm font-black text-blue-700 transition group-hover:bg-blue-600 group-hover:text-white">
                                    ↗
                                </span>
                            </div>

                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $brand['description'] }}
                            </p>

                            <span class="mt-3 inline-flex text-xs font-black uppercase tracking-[.14em] text-blue-700">
                                Visit Official Website
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.brand-logo').forEach(function (image) {
            let candidates = [];

            try {
                candidates = JSON.parse(image.dataset.candidates || '[]');
            } catch (error) {
                candidates = [];
            }

            let index = Number(image.dataset.index || 0);

            image.addEventListener('error', function loadNextLogo() {
                index++;

                if (index < candidates.length) {
                    image.dataset.index = index;
                    image.src = candidates[index];
                    return;
                }

                image.classList.add('hidden');

                const fallback = image.parentElement.querySelector(
                    '.brand-logo-fallback'
                );

                if (fallback) {
                    fallback.classList.remove('hidden');
                }
            });
        });
    });
</script>

<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        @php
            $strengths = [
                [
                    'title' => 'Secure Network Design',
                    'description' => 'Infrastructure planned for continuity, scalability and performance.',
                ],
                [
                    'title' => 'Testing & Certification',
                    'description' => 'Validation of copper and fiber installations for dependable operations.',
                ],
                [
                    'title' => 'Cross-Division Integration',
                    'description' => 'Infrastructure connected with security and surveillance projects.',
                ],
            ];
        @endphp

        <div class="grid gap-4 lg:grid-cols-3">

            @foreach ($strengths as $strength)
                <div class="soft-card p-5">

                    <p class="text-gradient text-3xl font-black">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </p>

                    <h3 class="mt-3 text-xl font-black text-slate-950">
                        {{ $strength['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $strength['description'] }}
                    </p>

                </div>
            @endforeach

        </div>

    </div>
</section>

<section class="vertical-muted py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="rounded-[1.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">

            <div class="grid items-center gap-6 lg:grid-cols-2">

                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        Start a Conversation
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Discuss your requirement with GPT Group.
                    </h2>
                </div>

                <div class="lg:text-right">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                    >
                        Send Enquiry
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection

