@extends('front_pages.front_components.main')

@section('content')
    @php
        $capabilities = [
            ['01', 'Smartphone Distribution', 'Reliable supply of smartphones and mobility products across retail and wholesale channels.'],
            ['02', 'Retail Channel Support', 'Product availability, retail activation and market execution support.'],
            ['03', 'Wholesale Supply', 'Bulk supply and inventory coordination for dealers and resellers.'],
            ['04', 'Corporate Mobility', 'Device supply solutions for businesses, institutions and project requirements.'],
            ['05', 'Product Launch Support', 'Channel planning and execution support for new product introductions.'],
            ['06', 'Brand Development', 'Market expansion, visibility and partner coordination for mobility brands.'],
        ];

        $brands = [
            [
                'name' => 'Lava',
                'logo' => asset('assets/logo brands/lava.png'),
                'description' => 'Smartphones, feature phones and dependable mobility products for retail and channel markets.',
            ],
            [
                'name' => 'Nothing',
                'logo' => asset('assets/logo brands/nothing.png'),
                'description' => 'Design-led smartphones, audio products and connected lifestyle devices.',
            ],
            [
                'name' => 'EZVIZ',
                'logo' => asset('assets/logo brands/ezviz.png'),
                'description' => 'Smart security cameras, video doorbells and connected home monitoring solutions.',
            ],
            [
                'name' => 'LifeSmart',
                'logo' => asset('assets/logo brands/life smart.png'),
                'description' => 'Smart home automation, intelligent controls, sensors and connected living solutions.',
            ],
            [
                'name' => 'Hikvision',
                'logo' => asset('assets/logo brands/hikvision.png'),
                'description' => 'Video security, access control, intercom and intelligent surveillance technologies.',
            ],
            [
                'name' => 'Samsung',
                'logo' => asset('assets/logo brands/sumsung.png'),
                'description' => 'Smartphones, tablets, wearables and connected consumer technology.',
            ],
            [
                'name' => 'Mobile Accessories',
                'logo' => null,
                'description' => 'Chargers, cables, power banks, cases, screen protection, audio and essential mobile accessories.',
            ],
        ];

        $strengths = [
            ['01', 'Oman Market Experience', 'Strong understanding of local retail, dealer and corporate requirements.'],
            ['02', 'Multi-Channel Reach', 'Support across wholesale, retail, reseller and B2B channels.'],
            ['03', 'Reliable Supply Support', 'Focused product availability and inventory coordination.'],
        ];
    @endphp

    <main class="overflow-hidden bg-white text-slate-900">
        {{-- HERO --}}
        <section class="relative isolate overflow-hidden bg-slate-950">
            <img
                src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1800&q=78"
                alt="Mobility Solutions"
                class="absolute inset-0 -z-20 h-full w-full object-cover"
                fetchpriority="high"
            >

            <div class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/35"></div>
            <div class="absolute inset-0 -z-10 bg-gradient-to-br from-blue-700/20 via-transparent to-cyan-500/10"></div>

            <div class="mx-auto flex min-h-[360px] max-w-7xl items-center px-4 py-14 sm:min-h-[390px] sm:px-6 sm:py-16 lg:min-h-[420px] lg:px-8 lg:py-20">
                <div class="max-w-3xl">
                    <a
                        href="{{ route('business.index') }}"
                        class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-bold text-white transition hover:bg-white hover:text-slate-950"
                    >
                        <span aria-hidden="true">←</span>
                        All business
                    </a>

                    <p class="mt-5 text-xs font-black uppercase tracking-[0.2em] text-cyan-300">
                        Mobility Solutions
                    </p>

                    <h1 class="mt-4 max-w-3xl text-4xl font-black leading-[1.05] tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Smart mobility products with
                        <span class="text-cyan-300">strong market reach.</span>
                    </h1>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base sm:leading-8">
                        GPT Group supports Oman’s mobility market with smartphones, connected devices and
                        channel-focused distribution services for retailers, resellers, corporate buyers
                        and technology partners.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-blue-600 px-6 text-sm font-black text-white transition hover:bg-blue-700"
                        >
                            Request a Consultation
                        </a>

                        <a
                            href="#capabilities"
                            class="inline-flex min-h-11 items-center justify-center rounded-full border border-white/30 bg-white px-6 text-sm font-black text-slate-950 transition hover:bg-slate-100"
                        >
                            Explore Capabilities
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- CAPABILITIES --}}
        <section id="capabilities" class="py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-blue-700">
                        Solutions & Capabilities
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Complete mobility capabilities for
                        <span class="text-blue-700">modern requirements.</span>
                    </h2>
                </div>

                <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($capabilities as [$number, $title, $description])
                        <article class="rounded-2xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">
                            <span class="grid h-11 w-11 place-items-center rounded-xl bg-blue-600 text-xs font-black text-white">
                                {{ $number }}
                            </span>

                            <h3 class="mt-5 text-xl font-black text-slate-950">
                                {{ $title }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ $description }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- BRANDS --}}
        <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-blue-700">
                        Technology Brands
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Brands supporting this solution portfolio.
                    </h2>
                </div>

                <div class="mx-auto mt-10 grid max-w-6xl gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($brands as $brand)
                        <article class="flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-4 transition hover:-translate-y-1 hover:shadow-lg">
                            <div class="grid h-28 place-items-center rounded-xl border border-slate-100 bg-slate-50 p-4">
                                @if ($brand['logo'])
                                    <img
                                        src="{{ $brand['logo'] }}"
                                        alt="{{ $brand['name'] }} logo"
                                        class="max-h-16 w-full object-contain"
                                        loading="lazy"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
                                    >
                                    <div class="hidden h-16 w-16 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">
                                        {{ strtoupper(substr($brand['name'], 0, 2)) }}
                                    </div>
                                @else
                                    <div class="grid h-16 w-16 place-items-center rounded-2xl bg-blue-600 text-2xl text-white">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-8 w-8" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm3 17h4" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex flex-1 flex-col px-1 pb-1 pt-5">
                                <h3 class="text-lg font-black text-slate-950">
                                    {{ $brand['name'] }}
                                </h3>

                                <p class="mt-3 flex-1 text-sm leading-6 text-slate-600">
                                    {{ $brand['description'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- STRENGTHS --}}
        <section class="py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-5 md:grid-cols-3">
                    @foreach ($strengths as [$number, $title, $description])
                        <article class="rounded-2xl border border-slate-200 bg-white p-6">
                            <p class="text-4xl font-black text-blue-700">
                                {{ $number }}
                            </p>

                            <h3 class="mt-4 text-xl font-black text-slate-950">
                                {{ $title }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ $description }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white sm:p-10 lg:p-12">
                    <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.2em] text-cyan-200">
                                Start a Conversation
                            </p>

                            <h2 class="mt-4 max-w-4xl text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl">
                                Discuss mobility distribution, product supply or channel partnership opportunities with GPT Group.
                            </h2>
                        </div>

                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-white px-7 text-sm font-black text-slate-950 transition hover:bg-slate-100"
                        >
                            Send Enquiry
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection