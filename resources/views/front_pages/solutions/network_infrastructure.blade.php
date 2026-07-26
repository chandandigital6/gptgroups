@extends('front_pages.front_components.main')

@section('content')
    @php
        $capabilities = [
            [
                'title' => 'Fiber Optic Cabling',
                'description' => 'High-speed fiber infrastructure for enterprise, telecom and building networks.',
            ],
            [
                'title' => 'Structured Cabling Systems',
                'description' => 'Organized copper and fiber systems for dependable voice and data connectivity.',
            ],
            [
                'title' => 'FTTH Solutions',
                'description' => 'Fiber-to-the-home products supporting high-speed residential connectivity.',
            ],
            [
                'title' => 'Data Center Connectivity',
                'description' => 'Fiber and copper connectivity for high-density data center environments.',
            ],
            [
                'title' => 'Network Cabinets & Accessories',
                'description' => 'Racks, cabinets and accessories for protected network organization.',
            ],
            [
                'title' => 'Optical Distribution Frames',
                'description' => 'Fiber termination, management and distribution systems.',
            ],
            [
                'title' => 'Patch Panels & Connectivity',
                'description' => 'Patch panels and connectivity products for structured deployment.',
            ],
        ];

        $brands = [
            [
                'name' => 'Fibrain',
                'logo' => asset('assets/logo brands/fibrain.png'),
                'description' => 'Fiber-optic cables, optical connectivity, FTTH and structured cabling systems.',
                'initials' => 'FB',
            ],
            [
                'name' => 'Avlon',
                'logo' => asset('assets/logo brands/Avlon.png'),
                'description' => 'Structured cabling, network connectivity and infrastructure products.',
                'initials' => 'AV',
            ],
        ];

        $strengths = [
            [
                'title' => 'Reliable Connectivity',
                'description' => 'Products designed to support consistent data transmission and performance.',
            ],
            [
                'title' => 'Scalable Infrastructure',
                'description' => 'Solutions suitable for growing networks and complex project environments.',
            ],
            [
                'title' => 'Project-Focused Supply',
                'description' => 'Support for consultants, contractors, integrators and enterprise projects.',
            ],
        ];
    @endphp

    <main class="overflow-hidden bg-white text-slate-900">

        {{-- HERO --}}
        <section
            class="relative flex min-h-[360px] items-center overflow-hidden bg-slate-950 bg-cover bg-center sm:min-h-[390px] lg:min-h-[420px]"
            style="background-image:
                linear-gradient(90deg, rgba(2,6,23,.96) 0%, rgba(2,6,23,.82) 55%, rgba(2,6,23,.38) 100%),
                url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1600&q=76');"
        >
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700/20 via-transparent to-cyan-500/15"></div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl py-14 sm:py-16 lg:py-20">
                    <a
                        href="{{ route('business.index') }}"
                        class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-bold text-white transition hover:bg-white hover:text-slate-950"
                    >
                        ← All Business
                    </a>

                    <p class="mt-5 inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-cyan-300">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-400 to-cyan-300"></span>
                        Network Infrastructure & Structured Cabling
                    </p>

                    <h1 class="mt-4 max-w-3xl text-4xl font-black leading-[1.08] tracking-tight text-white sm:text-5xl lg:text-6xl">
                        High-performance connectivity for
                        <span class="bg-gradient-to-r from-blue-300 to-cyan-300 bg-clip-text text-transparent">
                            modern infrastructure.
                        </span>
                    </h1>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">
                        GPT Group supplies fiber-optic, structured cabling and network connectivity
                        products for enterprise, telecom, data center and building infrastructure projects in Oman.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-blue-600 px-6 text-sm font-bold text-white transition hover:bg-blue-700"
                        >
                            Request a Consultation
                        </a>

                        <a
                            href="#capabilities"
                            class="inline-flex min-h-11 items-center justify-center rounded-full border border-white/25 bg-white px-6 text-sm font-bold text-slate-950 transition hover:bg-slate-100"
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
                    <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Solutions & Capabilities
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Complete connectivity capabilities for
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                            modern infrastructure.
                        </span>
                    </h2>
                </div>

                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($capabilities as $index => $capability)
                        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">
                            <span class="grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <h3 class="mt-4 text-lg font-black text-slate-950">
                                {{ $capability['title'] }}
                            </h3>

                            <p class="mt-2 text-sm leading-7 text-slate-600">
                                {{ $capability['description'] }}
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
                    <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Technology Brands
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Brands supporting this solution portfolio.
                    </h2>
                </div>

                <div class="mx-auto mt-10 grid max-w-4xl gap-5 sm:grid-cols-2">
                    @foreach ($brands as $brand)
                        <article class="flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                            <div class="relative grid h-28 place-items-center overflow-hidden rounded-xl border border-slate-100 bg-slate-50 p-5">
                                <span class="absolute grid h-14 w-14 place-items-center rounded-xl bg-blue-50 text-sm font-black text-blue-700">
                                    {{ $brand['initials'] }}
                                </span>

                                <img
                                    src="{{ $brand['logo'] }}"
                                    alt="{{ $brand['name'] }} logo"
                                    class="relative z-10 max-h-16 w-full object-contain"
                                    loading="lazy"
                                    onerror="this.style.display='none'"
                                >
                            </div>

                            <div class="flex flex-1 flex-col px-1 pb-1 pt-4">
                                <h3 class="text-lg font-black text-slate-950">
                                    {{ $brand['name'] }}
                                </h3>

                                <p class="mt-2 flex-1 text-sm leading-7 text-slate-600">
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
                <div class="grid gap-4 md:grid-cols-3">
                    @foreach ($strengths as $index => $strength)
                        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-3xl font-black text-transparent">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </p>

                            <h3 class="mt-3 text-lg font-black text-slate-950">
                                {{ $strength['title'] }}
                            </h3>

                            <p class="mt-2 text-sm leading-7 text-slate-600">
                                {{ $strength['description'] }}
                            </p>
                        </article>
                    @endforeach
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
                                Start a Conversation
                            </p>

                            <h2 class="mt-3 max-w-3xl text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl">
                                Discuss your network infrastructure or structured cabling requirement with GPT Group.
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