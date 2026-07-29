@extends('front_pages.front_components.main')

@section('content')

{{-- =========================================================
    HERO SECTION
========================================================= --}}
<section class="relative isolate overflow-hidden bg-slate-950">

    <img
        src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=2000&q=88"
        alt="GlobalSpec architectural solutions"
        class="absolute inset-0 -z-30 h-full w-full object-cover"
        loading="eager"
    >

    <div class="absolute inset-0 -z-20 bg-slate-950/75"></div>

    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950 via-slate-950/90 to-blue-950/45"></div>

    <div class="mx-auto grid min-h-[540px] max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.1fr_.9fr] lg:px-8">

        {{-- Hero Content --}}
        <div class="max-w-3xl">

            <div class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/10 px-4 py-2 backdrop-blur-md">
                <span class="h-2 w-2 rounded-full bg-cyan-400"></span>

                <span class="text-[10px] font-black uppercase tracking-[.2em] text-cyan-100">
                    GPT Group Architectural Solutions
                </span>
            </div>

            <h1 class="mt-6 text-4xl font-black leading-[1.08] text-white sm:text-5xl lg:text-6xl">
                Premium architectural
                <span class="block bg-gradient-to-r from-cyan-300 via-blue-300 to-cyan-200 bg-clip-text text-transparent">
                    hardware solutions.
                </span>
            </h1>

            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">
                GPT Group operates its architectural solutions business through
                GlobalSpec, delivering high-quality architectural hardware under
                its flagship premium brand, Merit.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                <a
                    href="#product-categories"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg shadow-blue-950/20 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl"
                >
                    Explore Products
                    <span aria-hidden="true">→</span>
                </a>

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center rounded-full border border-white/25 bg-white/10 px-7 py-3.5 text-sm font-black text-white backdrop-blur-md transition hover:bg-white hover:text-slate-950"
                >
                    Discuss Your Project
                </a>

            </div>

        </div>

        {{-- GlobalSpec Logo Card --}}
        <div class="hidden lg:block">

            <div class="relative overflow-hidden rounded-[2rem] border border-white/20 bg-white/10 p-5 shadow-2xl backdrop-blur-xl">

                <div class="absolute -right-20 -top-20 h-52 w-52 rounded-full bg-cyan-400/20 blur-3xl"></div>

                <div class="relative rounded-[1.5rem] bg-white p-8">

                    <p class="text-center text-[10px] font-black uppercase tracking-[.2em] text-blue-700">
                        Architectural Solutions Company
                    </p>

                    <img
                        src="{{ asset('assets/logo brands/GlobalSpec-gpt-logo-1.png') }}"
                        alt="GlobalSpec"
                        class="mx-auto mt-7 max-h-24 w-full max-w-[320px] object-contain"
                    >

                    <div class="my-7 flex items-center gap-4">
                        <span class="h-px flex-1 bg-slate-200"></span>

                        <span class="text-[10px] font-bold uppercase tracking-[.16em] text-slate-400">
                            Premium Brand
                        </span>

                        <span class="h-px flex-1 bg-slate-200"></span>
                    </div>

                    <img
                        src="{{ asset('assets/logo brands/merit.jpeg') }}"
                        alt="Merit architectural hardware"
                        class="mx-auto max-h-20 w-full max-w-[250px] object-contain"
                    >

                </div>

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    ABOUT DIVISION
========================================================= --}}
<section class="bg-white py-14 sm:py-16">

    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:px-8">

        {{-- Image --}}
        <div class="relative">

            <img
                src="{{ asset('assets/com/tr.png') }}"
                alt="Architectural hardware and project solutions"
                class="h-[360px] w-full rounded-[2rem] object-cover shadow-xl sm:h-[420px]"
            >

            <div class="absolute bottom-4 left-4 right-4 rounded-2xl border border-white/30 bg-slate-950/75 p-5 text-white backdrop-blur-lg">

                <p class="text-[10px] font-black uppercase tracking-[.18em] text-cyan-300">
                    About This Division
                </p>

                <p class="mt-2 text-sm leading-6 text-slate-200">
                    High-quality architectural products supported by reliable
                    sourcing and professional project assistance.
                </p>

            </div>

        </div>

        {{-- Content --}}
        <div>

            <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-700">
                Architectural Solutions Division
            </p>

            <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Built around quality,
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    reliability and design.
                </span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                Through GlobalSpec, GPT Group provides premium architectural
                hardware and building products for residential, commercial,
                hospitality and institutional projects.
            </p>

            <p class="mt-4 text-base leading-8 text-slate-600">
                Our team supports architects, consultants, contractors and
                developers with product selection, specifications, sourcing,
                supply coordination and after-sales assistance.
            </p>

            <div class="mt-7 grid grid-cols-2 gap-3 sm:grid-cols-4">

                @foreach ([
                    ['title' => 'Premium', 'text' => 'Products'],
                    ['title' => 'Modern', 'text' => 'Designs'],
                    ['title' => 'Reliable', 'text' => 'Sourcing'],
                    ['title' => 'Project', 'text' => 'Support'],
                ] as $item)

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-sm font-black text-slate-950">
                            {{ $item['title'] }}
                        </p>

                        <p class="mt-1 text-xs font-medium text-slate-500">
                            {{ $item['text'] }}
                        </p>
                    </div>

                @endforeach

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    GLOBALSPEC COMPANY SECTION
========================================================= --}}
<section class="bg-slate-50 py-14 sm:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm">

            <div class="grid lg:grid-cols-[380px_1fr]">

                {{-- Logo Side --}}
                <div class="relative flex min-h-[300px] items-center justify-center overflow-hidden bg-gradient-to-br from-slate-950 via-blue-950 to-blue-800 p-8">

                    <div class="absolute -left-16 -top-16 h-48 w-48 rounded-full bg-cyan-400/15 blur-3xl"></div>

                    <div class="relative w-full rounded-[1.5rem] bg-white p-8 shadow-2xl">

                        <p class="text-center text-[10px] font-black uppercase tracking-[.2em] text-blue-700">
                            Our Company
                        </p>

                        <img
                            src="{{ asset('assets/logo brands/GlobalSpec-gpt-logo-1.png') }}"
                            alt="GlobalSpec company logo"
                            class="mx-auto mt-6 max-h-24 w-full object-contain"
                        >

                        <a
                            href="https://globalspecworld.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-7 flex items-center justify-center gap-2 text-sm font-black text-blue-700 transition hover:text-blue-950"
                        >
                            Visit GlobalSpec
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>

                </div>

                {{-- Company Content --}}
                <div class="p-7 sm:p-10 lg:p-12">

                    <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-700">
                        GlobalSpec
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl">
                        The architectural solutions company within GPT Group.
                    </h2>

                    <p class="mt-5 max-w-3xl text-base leading-8 text-slate-600">
                        GlobalSpec specializes in supplying premium architectural
                        hardware and building products for residential, commercial,
                        hospitality and infrastructure projects.
                    </p>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                            <p class="text-xs font-black uppercase tracking-[.16em] text-blue-700">
                                Industries Served
                            </p>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                Residential, offices, hospitality, healthcare,
                                education, retail and infrastructure.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                            <p class="text-xs font-black uppercase tracking-[.16em] text-blue-700">
                                Project Support
                            </p>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                Product selection, technical coordination,
                                sourcing, supply and after-sales support.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    MERIT BRAND SECTION
========================================================= --}}
<section class="bg-white py-14 sm:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-10 lg:grid-cols-[.85fr_1.15fr]">

            {{-- Merit Logo --}}
            <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-8 sm:p-10">

                <p class="text-center text-[10px] font-black uppercase tracking-[.2em] text-blue-700">
                    Our Premium Brand
                </p>

                <div class="mt-6 flex min-h-[190px] items-center justify-center rounded-2xl bg-white p-8 shadow-sm">
                    <img
                        src="{{ asset('assets/logo brands/merit.jpeg') }}"
                        alt="Merit architectural hardware"
                        class="max-h-24 w-full max-w-[300px] object-contain"
                    >
                </div>

                <div class="mt-5 flex flex-wrap justify-center gap-2">

                    @foreach ([
                        'Durability',
                        'Functionality',
                        'Aesthetics'
                    ] as $tag)

                        <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                            {{ $tag }}
                        </span>

                    @endforeach

                </div>

            </div>

            {{-- Merit Content --}}
            <div>

                <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-700">
                    Merit Architectural Hardware
                </p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Designed for performance.
                    <span class="block bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        Selected for modern spaces.
                    </span>
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600">
                    Merit is GlobalSpec's premium architectural hardware brand,
                    offering a carefully selected portfolio of modern architectural
                    products designed to combine durability, functionality and aesthetics.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">

                    <div class="rounded-xl border border-slate-200 px-4 py-3">
                        <p class="text-sm font-black text-slate-950">
                            Premium Quality
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 px-4 py-3">
                        <p class="text-sm font-black text-slate-950">
                            Modern Finishes
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-200 px-4 py-3">
                        <p class="text-sm font-black text-slate-950">
                            Project Ready
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    PRODUCT CATEGORIES
========================================================= --}}
<section id="product-categories" class="bg-slate-950 py-14 sm:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            <p class="text-[11px] font-black uppercase tracking-[.2em] text-cyan-300">
                Product Portfolio
            </p>

            <h2 class="mt-4 text-3xl font-black text-white sm:text-4xl lg:text-5xl">
                Architectural hardware for
                <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">
                    complete project requirements.
                </span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-300">
                A focused portfolio of essential architectural products for
                residential, commercial and hospitality applications.
            </p>

        </div>

        @php
            $categories = [
                [
                    'number' => '01',
                    'title' => 'Door Hardware',
                    'text' => 'Essential hardware solutions for modern door systems.'
                ],
                [
                    'number' => '02',
                    'title' => 'Glass Hardware',
                    'text' => 'Functional fittings for contemporary glass applications.'
                ],
                [
                    'number' => '03',
                    'title' => 'Locks & Cylinders',
                    'text' => 'Reliable locking solutions for enhanced security.'
                ],
                [
                    'number' => '04',
                    'title' => 'Hinges',
                    'text' => 'Durable hinges designed for smooth everyday operation.'
                ],
                [
                    'number' => '05',
                    'title' => 'Door Closers',
                    'text' => 'Controlled and dependable door closing solutions.'
                ],
                [
                    'number' => '06',
                    'title' => 'Handles',
                    'text' => 'Modern handles combining comfort, strength and style.'
                ],
                [
                    'number' => '07',
                    'title' => 'Accessories',
                    'text' => 'Supporting accessories for complete door installations.'
                ],
                [
                    'number' => '08',
                    'title' => 'Architectural Fittings',
                    'text' => 'Versatile fittings for residential and commercial spaces.'
                ],
            ];
        @endphp

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ($categories as $category)

                <article class="group rounded-2xl border border-white/10 bg-white/[.06] p-5 backdrop-blur-sm transition duration-300 hover:-translate-y-1 hover:border-cyan-400/40 hover:bg-white/[.1]">

                    <div class="flex items-center justify-between">

                        <span class="grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 text-xs font-black text-white">
                            {{ $category['number'] }}
                        </span>

                        <span class="text-lg text-slate-500 transition group-hover:text-cyan-300">
                            ↗
                        </span>

                    </div>

                    <h3 class="mt-5 text-lg font-black text-white">
                        {{ $category['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        {{ $category['text'] }}
                    </p>

                </article>

            @endforeach

        </div>

    </div>
</section>


{{-- =========================================================
    WHY CHOOSE US
========================================================= --}}
{{-- <section class="bg-white py-14 sm:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-10 lg:grid-cols-[.85fr_1.15fr]">

            <div>

                <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-700">
                    Why Choose GlobalSpec & Merit
                </p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl">
                    Reliable solutions backed by
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        professional support.
                    </span>
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600">
                    From product selection to final supply, our focus is on
                    delivering dependable architectural solutions suited to
                    modern project requirements.
                </p>

            </div>

            <div class="grid gap-4 sm:grid-cols-2">

                @foreach ([
                    [
                        'no' => '01',
                        'title' => 'Premium Quality',
                        'text' => 'Carefully selected products for reliable performance.'
                    ],
                    [
                        'no' => '02',
                        'title' => 'Modern Designs',
                        'text' => 'Contemporary finishes suited to modern architecture.'
                    ],
                    [
                        'no' => '03',
                        'title' => 'Reliable Sourcing',
                        'text' => 'Consistent sourcing and coordinated product supply.'
                    ],
                    [
                        'no' => '04',
                        'title' => 'Project Support',
                        'text' => 'Professional assistance for residential and commercial projects.'
                    ],
                ] as $point)

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:border-blue-200 hover:bg-blue-50/40">

                        <span class="text-xs font-black text-blue-700">
                            {{ $point['no'] }}
                        </span>

                        <h3 class="mt-3 text-lg font-black text-slate-950">
                            {{ $point['title'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $point['text'] }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </div>
</section> --}}


{{-- =========================================================
    INDUSTRIES
========================================================= --}}
{{-- <section class="bg-slate-50 py-14 sm:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">

            <div class="max-w-3xl">

                <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-700">
                    Industries We Serve
                </p>

                <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl">
                    Solutions for diverse project environments.
                </h2>

            </div>

            <p class="max-w-md text-sm leading-7 text-slate-600">
                Architectural products selected to meet the functional and
                aesthetic needs of different sectors.
            </p>

        </div>

        @php
            $industries = [
                ['no' => '01', 'title' => 'Residential'],
                ['no' => '02', 'title' => 'Commercial Offices'],
                ['no' => '03', 'title' => 'Hotels & Hospitality'],
                ['no' => '04', 'title' => 'Healthcare'],
                ['no' => '05', 'title' => 'Educational Institutions'],
                ['no' => '06', 'title' => 'Retail Spaces'],
            ];
        @endphp

        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($industries as $industry)

                <div class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md">

                    <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white">
                        {{ $industry['no'] }}
                    </span>

                    <h3 class="text-base font-black text-slate-950">
                        {{ $industry['title'] }}
                    </h3>

                </div>

            @endforeach

        </div>

    </div>
</section> --}}


{{-- =========================================================
    PROCESS
========================================================= --}}
{{-- <section class="bg-white py-14 sm:py-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-2xl text-center">

            <p class="text-[11px] font-black uppercase tracking-[.2em] text-blue-700">
                How We Support Projects
            </p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl">
                A clear and practical project process.
            </h2>

        </div>

        <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ([
                [
                    'no' => '01',
                    'title' => 'Review',
                    'text' => 'Understand drawings and project requirements.'
                ],
                [
                    'no' => '02',
                    'title' => 'Recommend',
                    'text' => 'Identify suitable products, finishes and specifications.'
                ],
                [
                    'no' => '03',
                    'title' => 'Supply',
                    'text' => 'Coordinate sourcing and scheduled product delivery.'
                ],
                [
                    'no' => '04',
                    'title' => 'Support',
                    'text' => 'Provide project coordination and after-sales assistance.'
                ],
            ] as $step)

                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-slate-950 text-xs font-black text-white">
                        {{ $step['no'] }}
                    </span>

                    <h3 class="mt-4 text-lg font-black text-slate-950">
                        {{ $step['title'] }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $step['text'] }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>
</section> --}}


{{-- =========================================================
    CTA
========================================================= --}}
<section class="bg-white pb-14 sm:pb-16">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-950 via-blue-950 to-blue-700 p-7 text-white shadow-2xl sm:p-10 lg:p-12">

            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-cyan-400/20 blur-3xl"></div>

            <div class="absolute -bottom-24 left-1/3 h-60 w-60 rounded-full bg-blue-400/20 blur-3xl"></div>

            <div class="relative grid items-center gap-8 lg:grid-cols-[1fr_auto]">

                <div>

                    <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-200">
                        Start Your Project
                    </p>

                    <h2 class="mt-4 max-w-3xl text-3xl font-black leading-tight sm:text-4xl">
                        Need architectural hardware for your next project?
                    </h2>

                    <p class="mt-4 max-w-2xl text-base leading-8 text-blue-100">
                        Share your project requirements with our team and discover
                        suitable GlobalSpec and Merit architectural solutions.
                    </p>

                </div>

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex min-w-52 items-center justify-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 transition hover:-translate-y-0.5 hover:bg-cyan-50"
                >
                    Contact Our Team
                    <span aria-hidden="true">→</span>
                </a>

            </div>

        </div>

    </div>
</section>

@endsection