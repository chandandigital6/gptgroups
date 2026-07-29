@extends('front_pages.front_components.main')

@section('content')

<section class="relative isolate overflow-hidden bg-slate-950">
    <img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=2000&q=88"
        alt="Architectural solutions" class="absolute inset-0 -z-20 h-full w-full object-cover" loading="eager">
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950 via-slate-950/90 to-blue-950/50"></div>

    <div class="mx-auto grid min-h-[500px] max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <p class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-[10px] font-black uppercase tracking-[.2em] text-cyan-200 backdrop-blur-md">
                GPT Group Architectural Solutions
            </p>

            <h1 class="mt-6 text-4xl font-black leading-tight text-white sm:text-5xl lg:text-6xl">
                Architectural solutions for
                <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">
                    modern projects.
                </span>
            </h1>

            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-200">
                We provide architectural hardware, door solutions, access-control products
                and project support for residential, commercial and hospitality developments.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="#solutions"
                    class="rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-3.5 text-center text-sm font-black text-white">
                    Explore Solutions
                </a>
                <a href="{{ route('contact') }}"
                    class="rounded-full border border-white/25 bg-white/10 px-7 py-3.5 text-center text-sm font-black text-white backdrop-blur-md">
                    Discuss Your Project
                </a>
            </div>
        </div>

        <div class="hidden overflow-hidden rounded-[2rem] border border-white/20 bg-white/10 p-3 shadow-2xl backdrop-blur-md lg:block">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=86"
                alt="Premium architectural interior" class="h-[340px] w-full rounded-[1.4rem] object-cover">
        </div>
    </div>
</section>

<section class="bg-white py-14 sm:py-16">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:px-8">
        <img src="{{ asset('assets/com/tr.png') }}"
            alt="Architectural planning" class="h-[350px] w-full rounded-[1.8rem] object-cover shadow-xl">

        <div>
            <p class="text-[11px] font-black uppercase tracking-[.18em] text-blue-700">Project-Focused Expertise</p>
            <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Reliable products supported by
                <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                    practical technical guidance.
                </span>
            </h2>
            <p class="mt-5 text-base leading-8 text-slate-600">
                GPT Group works with architects, consultants, contractors and developers
                to support product selection, specifications, supply coordination and
                after-sales requirements.
            </p>
        </div>
    </div>
</section>

<section id="solutions" class="bg-slate-50 py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-[11px] font-black uppercase tracking-[.18em] text-blue-700">Our Solutions</p>
            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl">
                Complete architectural hardware solutions.
            </h2>
        </div>

        @php
            $solutions = [
                ['title' => 'Door Hardware', 'text' => 'Handles, locks, hinges, closers and complete door-control products.', 'image' => 'https://images.unsplash.com/photo-1506377295352-e3154d43ea9e?auto=format&fit=crop&w=900&q=82'],
                ['title' => 'Access Control', 'text' => 'Electronic access and smart entry solutions for secure buildings.', 'image' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=900&q=82'],
                ['title' => 'Hotel Locking Systems', 'text' => 'Guest-room locking and access management for hospitality projects.', 'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=900&q=82'],
                ['title' => 'Life-Safety Products', 'text' => 'Emergency-exit and safety-focused hardware for compliant buildings.', 'image' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=900&q=82'],
            ];
        @endphp

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($solutions as $solution)
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <img src="{{ $solution['image'] }}" alt="{{ $solution['title'] }}"
                        class="h-44 w-full object-cover" loading="lazy">
                    <div class="p-5">
                        <h3 class="text-lg font-black text-slate-950">{{ $solution['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $solution['text'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-10 sm:py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">
            <div class="grid items-center gap-0 md:grid-cols-[320px_1fr]">

                {{-- Logos --}}
                <div class="flex min-h-[220px] items-center justify-center border-b border-slate-200 bg-white p-7 md:border-b-0 md:border-r">
                    <div class="w-full max-w-[230px] text-center">

                        <img
                            src="{{ asset('assets/logo brands/merit.jpeg') }}"
                            alt="Merit"
                            class="mx-auto max-h-16 w-full object-contain"
                        >

                        <div class="my-5 flex items-center gap-3">
                            <span class="h-px flex-1 bg-slate-200"></span>
                            <span class="text-[10px] font-bold uppercase tracking-[.18em] text-slate-400">
                                Part of Merit
                            </span>
                            <span class="h-px flex-1 bg-slate-200"></span>
                        </div>

                        <img
                            src="{{ asset('assets/logo brands/GlobalSpec-gpt-logo-1.png') }}"
                            alt="Global Spec Middle East"
                            class="mx-auto max-h-16 w-full object-contain"
                        >

                    </div>
                </div>

                {{-- Content --}}
                <div class="p-7 sm:p-9 lg:p-10">
                    <p class="text-xs font-bold uppercase tracking-[.18em] text-blue-700">
                        Architectural Hardware
                    </p>

                    <h2 class="mt-3 text-2xl font-black text-slate-950 sm:text-3xl">
                        Merit & Global Spec Middle East
                    </h2>

                    <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-600">
                        Global Spec Middle East is a specialist part of Merit, providing
                        architectural hardware, access control, hotel locking systems
                        and complete door solutions for commercial and hospitality projects.
                    </p>

                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ([
                            'Architectural Hardware',
                            'Access Control',
                            'Hotel Locks',
                            'Door Solutions'
                        ] as $tag)
                            <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>

                    <a
                        href="https://globalspecworld.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-blue-700 transition hover:text-blue-900"
                    >
                        Visit Global Spec
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

<section class="bg-slate-50 py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['no' => '01', 'title' => 'Review', 'text' => 'Understand drawings and project requirements.'],
                ['no' => '02', 'title' => 'Recommend', 'text' => 'Select suitable products and finishes.'],
                ['no' => '03', 'title' => 'Supply', 'text' => 'Coordinate sourcing and delivery schedules.'],
                ['no' => '04', 'title' => 'Support', 'text' => 'Provide project and after-sales assistance.'],
            ] as $step)
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <span class="grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white">
                        {{ $step['no'] }}
                    </span>
                    <h3 class="mt-4 text-lg font-black text-slate-950">{{ $step['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
            <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-100">Start Your Project</p>
                    <h2 class="mt-4 text-3xl font-black sm:text-4xl">
                        Need architectural hardware for your next project?
                    </h2>
                    <p class="mt-4 max-w-2xl text-base leading-8 text-blue-50">
                        Share your requirement and our team will help identify suitable products and solutions.
                    </p>
                </div>

                <a href="{{ route('contact') }}"
                    class="inline-flex min-w-48 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950">
                    Contact Our Team
                </a>
            </div>
        </div>
    </div>
</section>

@endsection