@extends('front_pages.front_components.main')

@section('content')

    {{-- =========================================================
        REAL ESTATE HERO SECTION
    ========================================================== --}}
    <section class="relative isolate overflow-hidden bg-slate-950">
        <img
            src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2000&q=88"
            alt="Premium real estate development"
            class="absolute inset-0 -z-20 h-full w-full object-cover"
            loading="eager"
            fetchpriority="high"
        >

        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950 via-slate-950/88 to-blue-950/45"></div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-slate-950/85 via-transparent to-slate-950/30"></div>

        <div class="pointer-events-none absolute -left-32 top-20 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-32 bottom-10 h-96 w-96 rounded-full bg-cyan-500/15 blur-3xl"></div>

        <div class="mx-auto grid min-h-[620px] max-w-7xl items-center gap-10 px-4 py-20 sm:px-6 lg:grid-cols-[1.08fr_.92fr] lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 backdrop-blur-md">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-cyan-400 opacity-50"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-cyan-200 sm:text-[11px]">
                        GPT Group Real Estate
                    </span>
                </div>

                <h1 class="mt-6 text-4xl font-black leading-[1.06] tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Building spaces that create
                    <span class="bg-gradient-to-r from-cyan-300 via-blue-300 to-white bg-clip-text text-transparent">
                        lasting value.
                    </span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">
                    GPT Group Real Estate brings together thoughtful planning, modern design,
                    strategic locations and long-term investment value. We develop and support
                    residential, commercial and mixed-use property opportunities designed for
                    modern living and sustainable business growth.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                    <a
                        href="#real-estate-projects"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-xl shadow-blue-950/30 transition duration-300 hover:-translate-y-0.5 hover:shadow-2xl"
                    >
                        Explore Opportunities

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-full border border-white/25 bg-white/10 px-7 py-3.5 text-sm font-black text-white backdrop-blur-md transition duration-300 hover:-translate-y-0.5 hover:bg-white hover:text-slate-950"
                    >
                        Speak With Our Team
                    </a>
                </div>

                <div class="mt-10 grid max-w-2xl grid-cols-2 gap-3 sm:grid-cols-4">
                    @foreach ([
                        ['value' => 'Prime', 'label' => 'Locations'],
                        ['value' => 'Modern', 'label' => 'Planning'],
                        ['value' => 'Flexible', 'label' => 'Solutions'],
                        ['value' => 'Long-Term', 'label' => 'Value'],
                    ] as $stat)
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-md">
                            <p class="text-lg font-black text-white">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-300">
                                {{ $stat['label'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative hidden lg:block">
                <div class="absolute -inset-5 rounded-[2rem] bg-gradient-to-br from-blue-500/25 to-cyan-400/15 blur-2xl"></div>

                <div class="relative overflow-hidden rounded-[2rem] border border-white/20 bg-white/10 p-3 shadow-2xl backdrop-blur-md">
                    <img
                        src="{{ asset('assets/gpt office.png') }}"
                        alt="Luxury residential interior"
                        class="h-[430px] w-full rounded-[1.4rem] object-cover"
                        loading="eager"
                    >

                    <div class="absolute bottom-6 left-6 right-6 rounded-2xl border border-white/20 bg-slate-950/72 p-5 text-white backdrop-blur-xl">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-cyan-300">
                            Designed For Tomorrow
                        </p>

                        <p class="mt-2 text-lg font-black leading-7">
                            Quality spaces for living, business and investment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- =========================================================
    ABOUT
========================================================= --}}
<section class="bg-white py-14 sm:py-16">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">

        <div class="overflow-hidden rounded-[2rem] bg-slate-100 p-3 shadow-xl">
            <img
                src="{{ asset('assets/ggggg.png') }}"
                alt="GPT Group office building in Ghala Heights"
                class="h-[350px] w-full rounded-[1.4rem] object-cover sm:h-[420px]"
                loading="lazy"
            >
        </div>

        <div>
            <p class="text-[11px] font-black uppercase tracking-[0.2em] text-blue-700">
                Our Real Estate Vision
            </p>

            <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl">
                Practical properties with
                <span class="text-blue-700">lasting value.</span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                Our approach combines suitable locations, thoughtful planning
                and functional design to create property opportunities for
                businesses, tenants and investors.
            </p>

            <div class="mt-6 grid grid-cols-2 gap-3">
                @foreach([
                    ['title' => 'Prime', 'text' => 'Locations'],
                    ['title' => 'Modern', 'text' => 'Planning'],
                    ['title' => 'Flexible', 'text' => 'Spaces'],
                    ['title' => 'Long-Term', 'text' => 'Value'],
                ] as $item)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-lg font-black text-slate-950">
                            {{ $item['title'] }}
                        </p>

                        <p class="mt-1 text-xs font-bold uppercase tracking-wide text-slate-500">
                            {{ $item['text'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    PROPERTY SOLUTIONS
========================================================= --}}
{{-- <section id="property-solutions" class="bg-slate-50 py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="text-[11px] font-black uppercase tracking-[0.2em] text-blue-700">
                Property Solutions
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl">
                Spaces for business, retail and investment
            </h2>

            <p class="mt-4 text-base leading-7 text-slate-600">
                Flexible real estate opportunities created around modern
                commercial and investment requirements.
            </p>
        </div>

        @php
            $properties = [
                [
                    'title' => 'Commercial Spaces',
                    'text' => 'Functional office and business spaces designed for accessibility, productivity and professional operations.',
               'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbQWweEZLrn7HgR-cseEJMitosoZFlsiLWXNeDlqd_O2KMZvOit4hCx7UI&s=10',

                ],
                [
                    'title' => 'Retail Properties',
                    'text' => 'Showrooms and retail spaces selected to provide visibility, customer access and brand presentation.',
                    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOzPmN8JjF58QGQc1VsxpCtN4FLtzrXOxMUE5rhpJspU9o1A70g2qo5hM&s=10',
                ],
                [
                    'title' => 'Investment Opportunities',
                    'text' => 'Property opportunities assessed around location potential, rental income and long-term value.',
                    'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=85',
                ],
            ];
        @endphp

        <div class="mt-9 grid gap-5 md:grid-cols-3">
            @foreach($properties as $property)
                <article class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="h-52 overflow-hidden bg-slate-100">
                        <img
                            src="{{ $property['image'] }}"
                            alt="{{ $property['title'] }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            loading="lazy"
                        >
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-black text-slate-950">
                            {{ $property['title'] }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $property['text'] }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section> --}}


{{-- =========================================================
    GPT TOWER
========================================================= --}}
<section class="bg-white py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2rem] bg-slate-950 shadow-2xl">
            <div class="grid lg:grid-cols-2">

                <div class="relative min-h-[350px] lg:min-h-[430px]">
                    <img
                        src="{{ asset('assets/gptofficennn.jpeg') }}"
                        alt="GPT Tower Building 752 Ghala Heights"
                        class="absolute inset-0 h-full w-full object-cover"
                        loading="lazy"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 to-transparent"></div>
                </div>

                <div class="flex items-center p-7 sm:p-10 lg:p-12">
                    <div>
                        <p class="text-[11px] font-black uppercase tracking-[0.2em] text-cyan-300">
                            GPT Group Headquarters
                        </p>

                        <h2 class="mt-4 text-3xl font-black text-white sm:text-4xl">
                            GPT Tower, Ghala Heights
                        </h2>

                        <p class="mt-5 text-base leading-8 text-slate-300">
                            GPT Group operates from its office at GPT Tower in
                            Ghala Heights, Muscat, supporting its distribution,
                            retail, security, technology and business activities.
                        </p>

                        <div class="mt-7 space-y-3">
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <p class="text-xs font-black uppercase tracking-wide text-cyan-300">
                                    Address
                                </p>

                                <p class="mt-2 text-sm leading-6 text-white">
                                    GPT Tower, Office 1, Building 752,
                                    Way 5007, Ghala Heights, Muscat, Oman
                                </p>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                <p class="text-xs font-black uppercase tracking-wide text-cyan-300">
                                    Business Focus
                                </p>

                                <p class="mt-2 text-sm leading-6 text-white">
                                    Technology distribution, retail, security,
                                    infrastructure and business development
                                </p>
                            </div>
                        </div>

                        <a
                            href="{{ route('contact') }}"
                            class="mt-7 inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 transition hover:-translate-y-1"
                        >
                            Contact GPT Group
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- =========================================================
    FINAL CTA
========================================================= --}}
<section class="bg-slate-50 py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-r from-blue-800 to-cyan-500 p-8 text-white shadow-2xl sm:p-10 lg:p-12">

            <div class="relative flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-cyan-100">
                        Property Opportunities
                    </p>

                    <h2 class="mt-3 max-w-3xl text-3xl font-black leading-tight sm:text-4xl">
                        Discuss your commercial or investment requirement.
                    </h2>

                    <p class="mt-3 max-w-2xl leading-7 text-blue-50">
                        Connect with GPT Group for property, business space
                        and real estate opportunities.
                    </p>
                </div>

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex shrink-0 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1"
                >
                    Speak With Our Team
                </a>
            </div>
        </div>
    </div>
</section>

@endsection