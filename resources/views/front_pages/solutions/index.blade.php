@extends('front_pages.front_components.main')

@section('content')
    @php
        $solutions = [
            [
                'number' => '01',
                'title' => 'Mobility Solutions',
                'description' => 'Smartphones, connected devices and mobility products for retail, wholesale and enterprise markets.',
                'route' => 'business.mobility',
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=76',
            ],
            [
                'number' => '02',
                'title' => 'Integrated Security & ELV Solutions',
                'description' => 'Surveillance, access control, video door phones, parking management and professional display systems.',
                'route' => 'business.security-elv',
                'image' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1200&q=76',
            ],
            [
                'number' => '03',
                'title' => 'Smart Home & IoT Solutions',
                'description' => 'Automation, smart lighting, locks, sensors, curtains, climate and energy management.',
                'route' => 'business.smart-home-iot',
                'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=76',
            ],
            [
                'number' => '04',
                'title' => 'Network Infrastructure & Structured Cabling Solutions',
                'description' => 'Fiber, FTTH, data center connectivity, cabinets, ODF and structured cabling systems.',
                'route' => 'business.network',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=76',
            ],
        ];
    @endphp

    <main class="overflow-hidden bg-white text-slate-900">

        {{-- HERO --}}
        <section
            class="relative flex min-h-[350px] items-center overflow-hidden bg-slate-950 bg-cover bg-center sm:min-h-[380px] lg:min-h-[410px]"
            style="background-image:
                linear-gradient(90deg, rgba(2,6,23,.96) 0%, rgba(2,6,23,.82) 55%, rgba(2,6,23,.38) 100%),
                url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=76');"
        >
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700/20 via-transparent to-cyan-500/15"></div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl py-14 sm:py-16 lg:py-20">
                    <p class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-cyan-300">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-400 to-cyan-300"></span>
                        GPT Group Solutions
                    </p>

                    <h1 class="mt-4 max-w-3xl text-4xl font-black leading-[1.08] tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Technology solutions that connect
                        <span class="bg-gradient-to-r from-blue-300 to-cyan-300 bg-clip-text text-transparent">
                            people, places and businesses.
                        </span>
                    </h1>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">
                        GPT Group brings mobility, integrated security, smart home automation and
                        network infrastructure solutions to customers, channel partners and projects across Oman.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        <a
                            href="#solutions"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-blue-600 px-6 text-sm font-bold text-white transition hover:bg-blue-700"
                        >
                            Explore Solutions
                        </a>

                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full border border-white/25 bg-white px-6 text-sm font-bold text-slate-950 transition hover:bg-slate-100"
                        >
                            Partner With Us
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- SOLUTIONS --}}
        <section id="solutions" class="py-14 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Our Solution Portfolio
                    </p>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Four focused solution areas.
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                            One integrated technology partner.
                        </span>
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                        Explore our core technology capabilities designed for retail, enterprise,
                        residential and infrastructure requirements.
                    </p>
                </div>

                <div class="mt-10 grid gap-5 md:grid-cols-2">
                    @foreach ($solutions as $solution)
                        <a
                            href="{{ route($solution['route']) }}"
                            class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl"
                        >
                            <div class="relative h-52 overflow-hidden sm:h-56">
                                <img
                                    src="{{ $solution['image'] }}"
                                    alt="{{ $solution['title'] }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                >

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>

                                <span class="absolute left-4 top-4 grid h-11 w-11 place-items-center rounded-xl bg-white/95 text-xs font-black text-blue-700 shadow-sm">
                                    {{ $solution['number'] }}
                                </span>
                            </div>

                            <div class="p-5 sm:p-6">
                                <h3 class="text-xl font-black leading-snug text-slate-950 sm:text-2xl">
                                    {{ $solution['title'] }}
                                </h3>

                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    {{ $solution['description'] }}
                                </p>

                                <span class="mt-5 inline-flex items-center gap-2 text-sm font-black text-blue-700">
                                    Explore Solution
                                    <span class="transition-transform group-hover:translate-x-1">→</span>
                                </span>
                            </div>
                        </a>
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
                                Looking for the right technology solution for your business or project?
                            </h2>
                        </div>

                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex min-h-11 items-center justify-center rounded-full bg-white px-7 text-sm font-black text-slate-950 transition hover:bg-slate-100"
                        >
                            Contact GPT Group
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection