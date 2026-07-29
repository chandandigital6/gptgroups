@extends('front_pages.front_components.main')

@section('content')
    <style>
        :root {
            --gpt-blue: #2563eb;
            --gpt-cyan: #06b6d4;
            --gpt-dark: #0f172a;
        }

        .about-section-soft {
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
            color: #1d4ed8;
            font-size: .75rem;
            font-weight: 900;
            letter-spacing: .22em;
            text-transform: uppercase;
        }

        .soft-card {
            border: 1px solid rgba(226, 232, 240, .95);
            border-radius: 1.25rem;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 12px 38px rgba(15, 23, 42, .06);
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .soft-card:hover {
            transform: translateY(-5px);
            border-color: rgba(37, 99, 235, .18);
            box-shadow: 0 20px 52px rgba(37, 99, 235, .11);
        }

        .soft-image-card {
            border: 1px solid rgba(226, 232, 240, .95);
            border-radius: 1.5rem;
            background: #ffffff;
            box-shadow: 0 16px 45px rgba(15, 23, 42, .08);
        }

        .timeline-line {
            position: relative;
        }

        .timeline-line::before {
            content: "";
            position: absolute;
            top: 1.25rem;
            bottom: 1.25rem;
            left: 1.15rem;
            width: 2px;
            background: linear-gradient(to bottom, #2563eb, #06b6d4);
        }

        .timeline-dot {
            position: relative;
            z-index: 2;
            display: grid;
            height: 2.4rem;
            width: 2.4rem;
            flex: 0 0 2.4rem;
            place-items: center;
            border-radius: 999px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            color: #ffffff;
            font-size: .62rem;
            font-weight: 900;
            box-shadow: 0 8px 22px rgba(37, 99, 235, .22);
        }

        .about-check {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            border-radius: .9rem;
            background: #ffffff;
            padding: .8rem .9rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, .05);
            border: 1px solid #f1f5f9;
        }

        .about-check-icon {
            margin-top: .1rem;
            display: grid;
            height: 1.45rem;
            width: 1.45rem;
            flex: 0 0 1.45rem;
            place-items: center;
            border-radius: 999px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            color: #ffffff;
            font-size: .65rem;
            font-weight: 900;
        }
    </style>

    {{-- 01. PAGE HERO --}}
    @include('front.sections.page_hero', ['pageSlug' => 'about'])

    {{-- 02. QUICK FACTS --}}
    @if (isset($quickFactSection) && $quickFactSection && $quickFactSection->activeItems->count())
        <section class="relative z-10 -mt-5 bg-transparent">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($quickFactSection->activeItems as $fact)
                        <div class="soft-card p-5">
                            <p class="text-gradient text-3xl font-black">{{ $fact->value }}</p>
                            <p class="mt-1 text-sm font-black text-slate-900">{{ $fact->title }}</p>

                            @if ($fact->description)
                                <p class="mt-1.5 text-xs leading-5 text-slate-500">
                                    {{ $fact->description }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



    {{-- =========================================================
    09. FOUNDER & LEADERSHIP - COMPACT DESIGN
========================================================= --}}
{{-- 09. FOUNDER & LEADERSHIP --}}
@if (isset($founderSection) && $founderSection)
    <section class="relative overflow-hidden bg-white py-12 sm:py-16 lg:py-20">

        {{-- Background Decoration --}}
        <div
            class="pointer-events-none absolute -left-24 top-10 h-72 w-72 rounded-full bg-blue-100/70 blur-3xl">
        </div>

        <div
            class="pointer-events-none absolute -right-24 bottom-0 h-80 w-80 rounded-full bg-cyan-100/60 blur-3xl">
        </div>

        <div
            class="pointer-events-none absolute inset-0 opacity-[0.035]"
            style="background-image: radial-gradient(#0f172a 1px, transparent 1px);
                   background-size: 28px 28px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Main Leadership Card --}}
            <div
                class="overflow-hidden rounded-[2rem] border border-slate-200/80 bg-gradient-to-br from-white via-white to-blue-50/70 shadow-[0_30px_80px_rgba(15,23,42,0.10)]">

                <div class="grid items-stretch lg:grid-cols-[0.95fr_1.05fr]">

                    {{-- Founder Image --}}
                    <div class="relative p-4 sm:p-6 lg:p-7">

                        <div
                            class="group relative h-full min-h-[340px] overflow-hidden rounded-[1.6rem] bg-slate-200 shadow-[0_20px_45px_rgba(15,23,42,0.18)] sm:min-h-[420px] lg:min-h-[500px]">

                            @if ($founderSection->image)
                                <img
        src="{{ asset('storage/' . $founderSection->image) }}"
        alt="{{ $founderSection->title }}"
        class="absolute inset-0 h-full w-full object-contain object-center transition duration-700 group-hover:scale-[1.03]"
        loading="lazy">
                            @else
                                <img
                                    src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}"
                                    alt="{{ $founderSection->title }}"
                                    class="absolute inset-0 h-full w-full object-cover object-center transition duration-700 group-hover:scale-[1.03]"
                                    loading="lazy">
                            @endif

                            {{-- Image Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/5 to-transparent">
                            </div>

                            {{-- Top Badge --}}
                            <div class="absolute left-5 top-5 sm:left-6 sm:top-6">
                                <div
                                    class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/90 px-4 py-2 shadow-lg backdrop-blur-md">

                                    <span class="relative flex h-2.5 w-2.5">
                                        <span
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-500 opacity-60">
                                        </span>

                                        <span
                                            class="relative inline-flex h-2.5 w-2.5 rounded-full bg-blue-600">
                                        </span>
                                    </span>

                                    <span
                                        class="text-[11px] font-black uppercase tracking-[0.18em] text-slate-900">
                                        Founder & Chairman
                                    </span>
                                </div>
                            </div>

                            {{-- Image Bottom Details --}}
                            <div class="absolute inset-x-0 bottom-0 p-5 sm:p-7">

                                <p class="text-2xl font-black text-white sm:text-3xl">
                                    {{ $founderSection->title }}
                                </p>

                                <div class="mt-3 flex items-center gap-3">
                                    <span
                                        class="h-[2px] w-10 rounded-full bg-blue-400">
                                    </span>

                                    <p class="text-sm font-bold text-blue-100">
                                        Founder & CEO, GPT Group
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Founder Content --}}
                    <div
                        class="relative flex flex-col justify-center px-6 pb-9 pt-3 sm:px-8 lg:px-10 lg:py-12 xl:px-14">

                        {{-- Section Label --}}
                        <div
                            class="inline-flex w-fit items-center gap-3 rounded-full border border-blue-200 bg-blue-50 px-4 py-2">

                            <span
                                class="flex h-7 w-7 items-center justify-center rounded-full bg-blue-600 text-white shadow-md shadow-blue-600/20">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2.2">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5A4.5 4.5 0 003 9.5c0 2.486 2.014 4.5 4.5 4.5 1.746 0 3.332-.477 4.5-1.253m0-6.494C13.168 5.477 14.754 5 16.5 5A4.5 4.5 0 0121 9.5c0 2.486-2.014 4.5-4.5 4.5-1.746 0-3.332-.477-4.5-1.253" />
                                </svg>
                            </span>

                            <span
                                class="text-xs font-black uppercase tracking-[0.2em] text-blue-700">
                                {{ $founderSection->label ?: 'Founder & Leadership' }}
                            </span>
                        </div>

                        {{-- Heading --}}
                        <h2
                            class="mt-5 text-3xl font-black leading-[1.08] tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">

                            {{ $founderSection->title }}
                        </h2>

                        {{-- Position --}}
                        <p class="mt-3 text-lg font-extrabold text-blue-600 sm:text-xl">
                            Founder & CEO, GPT Group
                        </p>

                        {{-- Decorative Divider --}}
                        <div class="mt-5 flex items-center gap-2">
                            <span
                                class="h-1 w-14 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400">
                            </span>

                            <span
                                class="h-1 w-3 rounded-full bg-blue-200">
                            </span>

                            <span
                                class="h-1 w-3 rounded-full bg-cyan-200">
                            </span>
                        </div>

                        {{-- Description --}}
                        @if ($founderSection->description)
                            <div
                                class="relative mt-6 rounded-2xl border border-slate-200 bg-white/80 p-5 shadow-sm backdrop-blur-sm sm:p-6">

                                <span
                                    class="absolute left-0 top-6 h-12 w-1 rounded-r-full bg-gradient-to-b from-blue-600 to-cyan-400">
                                </span>

                                <p class="text-base leading-8 text-slate-600">
                                    {{ $founderSection->description }}
                                </p>
                            </div>
                        @endif

                        {{-- Statistics --}}
                        <div class="mt-6 grid gap-3 sm:grid-cols-3">

                            @foreach ([1, 2, 3] as $i)
                                @php
                                    $value = $founderSection->{'stat_' . $i . '_value'} ?? null;
                                    $label = $founderSection->{'stat_' . $i . '_label'} ?? null;
                                @endphp

                                @if ($value || $label)
                                    <div
                                        class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">

                                        <div
                                            class="absolute -right-5 -top-5 h-20 w-20 rounded-full bg-blue-50 transition duration-300 group-hover:scale-125">
                                        </div>

                                        <div class="relative">
                                            <p
                                                class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-2xl font-black text-transparent sm:text-3xl">
                                                {{ $value }}
                                            </p>

                                            <p
                                                class="mt-1 text-xs font-bold uppercase tracking-wide text-slate-500">
                                                {{ $label }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        {{-- Leadership Highlights --}}
                        <div
                            class="mt-6 grid gap-3 rounded-2xl border border-blue-100 bg-gradient-to-r from-blue-50/80 to-cyan-50/70 p-4 sm:grid-cols-3">

                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-blue-600 shadow-sm">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-black text-slate-900">
                                        Vision
                                    </p>

                                    <p class="text-[11px] text-slate-500">
                                        Future-focused leadership
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-cyan-600 shadow-sm">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m6-4a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-black text-slate-900">
                                        People
                                    </p>

                                    <p class="text-[11px] text-slate-500">
                                        Strong team culture
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-indigo-600 shadow-sm">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3 17l6-6 4 4 8-8M14 7h7v7" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-black text-slate-900">
                                        Growth
                                    </p>

                                    <p class="text-[11px] text-slate-500">
                                        Scalable business strategy
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Optional Button --}}
                        @if ($founderSection->button_text)
                            <div class="mt-7">
                                <a
                                    href="{{ $founderSection->button_link ?: '#' }}"
                                    class="group inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-6 py-3.5 text-sm font-black text-white shadow-lg shadow-blue-600/20 transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                                    <span>
                                        {{ $founderSection->button_text }}
                                    </span>

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 transition duration-300 group-hover:translate-x-1"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2.5">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


{{-- =========================================================
    10. GROUP GENERAL MANAGER - COMPACT DESIGN
    IMAGE ALWAYS ON LEFT SIDE
========================================================= --}}
<section class="relative overflow-hidden bg-slate-50 py-8 sm:py-10 lg:py-12">

    {{-- Soft Background --}}
    <div
        class="pointer-events-none absolute -right-20 top-0 h-56 w-56 rounded-full bg-blue-100/60 blur-3xl">
    </div>

    <div
        class="pointer-events-none absolute -left-20 bottom-0 h-56 w-56 rounded-full bg-cyan-100/50 blur-3xl">
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div
            class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-[0_18px_50px_rgba(15,23,42,0.08)]">

            <div class="grid items-center lg:grid-cols-[0.8fr_1.2fr]">

                {{-- General Manager Image - Left Side --}}
                <div class="order-1 p-3 sm:p-4 lg:p-5">
                    <div
                        class="group relative h-[290px] overflow-hidden rounded-[1.35rem] bg-slate-200 shadow-lg sm:h-[330px] lg:h-[350px]">

                        <img
                            src="{{ asset('assets/img/adam-al-bulushi.jpeg') }}"
                            alt="Adam Al Bulushi - Group General Manager"
                            class="h-full w-full object-cover object-top transition duration-700 group-hover:scale-[1.03]"
                            loading="lazy"
                            onerror="this.onerror=null; this.src='{{ asset('assets/img/default-leader.jpg') }}';">

                        {{-- Overlay --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        </div>

                        {{-- Top Badge --}}
                        <div class="absolute left-4 top-4">
                            <div
                                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/90 px-3 py-1.5 shadow-md backdrop-blur">

                                <span class="h-2 w-2 rounded-full bg-cyan-500"></span>

                                <span
                                    class="text-[10px] font-black uppercase tracking-[0.15em] text-slate-900">
                                    Executive Leadership
                                </span>
                            </div>
                        </div>

                        {{-- Image Caption --}}
                        <div class="absolute inset-x-0 bottom-0 p-4 sm:p-5">
                            <p class="text-xl font-black text-white sm:text-2xl">
                                Adam Al Bulushi
                            </p>

                            <p class="mt-1 text-xs font-bold text-blue-100 sm:text-sm">
                                Group General Manager
                            </p>
                        </div>
                    </div>
                </div>

                {{-- General Manager Content --}}
                <div class="order-2 px-5 pb-7 pt-2 sm:px-7 lg:px-9 lg:py-7 xl:px-10">

                    {{-- Label --}}
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3 py-1.5">

                        <span
                            class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 text-white">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m6-4a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>

                        <span
                            class="text-[10px] font-black uppercase tracking-[0.18em] text-blue-700">
                            Executive Leadership
                        </span>
                    </div>

                    {{-- Heading --}}
                    <h2
                        class="mt-4 text-2xl font-black leading-tight tracking-tight text-slate-950 sm:text-3xl lg:text-4xl">

                        Adam Al Bulushi
                    </h2>

                    <p class="mt-1.5 text-base font-bold text-blue-600">
                        Group General Manager
                    </p>

                    {{-- Divider --}}
                    <div class="mt-4 flex items-center gap-2">
                        <span
                            class="h-1 w-12 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400">
                        </span>

                        <span class="h-1 w-2 rounded-full bg-blue-200"></span>
                    </div>

                    {{-- Description --}}
                    <p class="mt-4 text-sm leading-6 text-slate-600 sm:text-[15px]">
                        Adam Al Bulushi serves as the Group General Manager of
                        <strong class="font-bold text-slate-900">
                            Global Phone Technology LLC
                        </strong>.
                        He plays a key role in managing business operations,
                        strengthening organisational performance and supporting
                        the group’s continued growth.
                    </p>

                    <p class="mt-3 text-sm leading-6 text-slate-600 sm:text-[15px]">
                        With strong leadership and market knowledge, he works closely
                        with the management team to improve operational efficiency,
                        develop valuable partnerships and execute the group’s
                        long-term vision.
                    </p>

                    {{-- Compact Highlights --}}
                    <div class="mt-4 grid grid-cols-1 gap-2.5 sm:grid-cols-3">

                        <div
                            class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4.5 w-4.5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m6-4a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs font-black text-slate-900">
                                    Leadership
                                </p>

                                <p class="text-[10px] leading-4 text-slate-500">
                                    Guiding teams
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4.5 w-4.5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 17l6-6 4 4 8-8M14 7h7v7" />
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs font-black text-slate-900">
                                    Growth
                                </p>

                                <p class="text-[10px] leading-4 text-slate-500">
                                    Market expansion
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4.5 w-4.5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs font-black text-slate-900">
                                    Operations
                                </p>

                                <p class="text-[10px] leading-4 text-slate-500">
                                    Better execution
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Organisation --}}
                    <div
                        class="mt-4 flex items-center gap-3 rounded-xl border border-blue-100 bg-blue-50/70 p-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-600 text-xs font-black text-white shadow-md">
                            GPT
                        </div>

                        <div>
                            <p
                                class="text-[9px] font-bold uppercase tracking-[0.15em] text-slate-500">
                                Organisation
                            </p>

                            <p class="mt-0.5 text-xs font-black text-slate-900 sm:text-sm">
                                Global Phone Technology LLC
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




    {{-- 03. COMPANY HISTORY & OVERVIEW --}}
    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[1.05fr_.95fr] lg:gap-10">
                <div>
                    <p class="section-label">Company History & Vision</p>

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Global Phone Technology LLC
                        <span class="block text-gradient">built for innovation and growth.</span>
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600">
                        Founded with a vision for innovation and growth, GPT Group has emerged as a technology
                        distribution and solutions business serving Oman, the wider IMEA and selected international markets.
                    </p>

                    <p class="mt-3 text-base leading-7 text-slate-600">
                        The Group supports mobile and consumer electronics, security solutions, IT infrastructure,
                        retail operations and trading through dependable execution and strong market relationships.
                    </p>

                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        <div class="soft-card p-5">
                            <p class="text-gradient text-2xl font-black">Oman</p>
                            <h3 class="mt-2 text-lg font-black text-slate-950">Strong Local Base</h3>
                            <p class="mt-1.5 text-sm leading-6 text-slate-500">
                                Retail support, B2B supply, distribution and customer service.
                            </p>
                        </div>

                        <div class="soft-card p-5">
                            <p class="text-gradient text-2xl font-black">IMEA+</p>
                            <h3 class="mt-2 text-lg font-black text-slate-950">Regional Ambition</h3>
                            <p class="mt-1.5 text-sm leading-6 text-slate-500">
                                Partner-led growth across IMEA and selected global markets.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <img class="h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Group distribution" loading="lazy">

                    <img class="mt-5 h-44 w-full rounded-2xl object-cover shadow-lg sm:mt-7 sm:h-52 lg:h-56"
                        src="{{ asset('assets/hand.jpg') }}"
                        alt="GPT Group technology" loading="lazy">

                    <img class="h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                        src="{{ asset('assets/b1.jpg') }}"
                        alt="GPT Group team" loading="lazy">

                    <div
                        class="mt-5 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 p-5 text-white shadow-lg sm:mt-7">
                        <p class="text-3xl font-black">GPT</p>
                        <p class="mt-2 text-lg font-black">Technology. Distribution. Solutions.</p>
                        <p class="mt-2 text-xs leading-5 text-blue-50">
                            A unified business platform for brands, partners and enterprise customers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 04. GPT GROUP CONCEPTION --}}
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[.9fr_1.1fr] lg:gap-10">
                <div class="soft-image-card p-3">
                    <img class="h-[270px] w-full rounded-[1.2rem] object-cover sm:h-[330px] lg:h-[360px]"
                        src="{{ asset('assets/b2.jpg') }}"
                        alt="GPT Group conception" loading="lazy">
                </div>

                <div>
                    <p class="section-label">GPT Group Conception</p>

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Born from telecom experience and a clear regional opportunity.
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600">
                        GPT Group was conceived to bridge the gap between global technology brands and customers
                        seeking reliable products, distribution support and professional market execution in Oman.
                    </p>

                    <p class="mt-3 text-base leading-7 text-slate-600">
                        From its foundation, the Group focused on connecting innovative products with retailers,
                        businesses and end users while building long-term partnerships based on trust and responsiveness.
                    </p>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Brand-to-market connectivity</p>
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Reliable local execution</p>
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Customer-focused distribution</p>
                        </div>

                        <div class="about-check">
                            <span class="about-check-icon">✓</span>
                            <p class="text-sm font-semibold leading-6 text-slate-700">Long-term partnerships</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 05. EARLY DAYS / CURRENT STANDING / FUTURE VISION --}}
    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">Growth Story</p>
                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    From a focused beginning to an integrated technology group.
                </h2>
            </div>

            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">01</p>
                    <h3 class="mt-3 text-xl font-black text-slate-950">Early Days</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        GPT Group initially focused on establishing a strong base in Oman, building distribution
                        relationships with retailers, dealers and customers while understanding the region's market
                        dynamics.
                    </p>
                </div>

                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">02</p>
                    <h3 class="mt-3 text-xl font-black text-slate-950">Current Standing</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Today, the Group operates across technology distribution, retail, security, IT infrastructure
                        and trading with a growing network of partners and customers.
                    </p>
                </div>

                <div class="soft-card p-5">
                    <p class="text-gradient text-3xl font-black">03</p>
                    <h3 class="mt-3 text-xl font-black text-slate-950">Future Vision</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        GPT Group aims to strengthen software, IT services, e-commerce, sustainable business practices
                        and job creation while supporting the economic vision of Oman.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 06. CUSTOMER SATISFACTION & MARKET PRESENCE --}}

    {{-- <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-end gap-5 lg:grid-cols-[.9fr_1.1fr]">
                <div>
                    <p class="section-label">Customer Satisfaction</p>
                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Professional service supported by a growing market presence.
                    </h2>
                </div>

                <p class="text-base leading-7 text-slate-600">
                    GPT Group aims to become a respected regional distributor through quality products,
                    customer-focused service, distinctive solutions and dependable after-sales support.
                </p>
            </div>

            @php
                $outlets = [
                    ['title' => 'GPT Samsung Lounge', 'location' => 'Boshar, Muscat'],
                    ['title' => 'GPT Hikvision Stall', 'location' => 'Boshar, Muscat'],
                    ['title' => 'GPT Service Centre', 'location' => 'Service & Support'],
                    // ['title' => 'Honor Phones Outlet', 'location' => 'Retail Network'],
                    ['title' => 'GPT Samsung Lounge', 'location' => 'Additional Retail Presence'],
                ];
            @endphp

            <div class="mt-7 grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ($outlets as $outlet)
                    <div class="soft-card p-4">
                        <span
                            class="grid h-9 w-9 place-items-center rounded-xl bg-blue-50 text-xs font-black text-blue-700">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3 class="mt-3 text-base font-black leading-tight text-slate-950">
                            {{ $outlet['title'] }}
                        </h3>

                        <p class="mt-1.5 text-xs font-bold text-blue-700">
                            {{ $outlet['location'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- 07. VISION, MISSION & AIM --}}
    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">Vision, Mission & Aim</p>
                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Guided by customer value, innovation and sustainable growth.
                </h2>
            </div>

            <div class="mt-8 grid gap-4 lg:grid-cols-3">
                <div class="soft-card p-6">
                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-blue-600 text-lg font-black text-white">V
                    </div>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Our Vision</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        To become a respected and professional technology distribution and solutions group
                        serving IMEA with consistent quality and innovation.
                    </p>
                </div>

                <div class="rounded-[1.25rem] bg-gradient-to-br from-blue-600 to-cyan-500 p-6 text-white shadow-lg">
                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-white text-lg font-black text-blue-700">M
                    </div>
                    <h3 class="mt-4 text-2xl font-black">Our Mission</h3>
                    <p class="mt-2 text-sm leading-6 text-blue-50">
                        To connect customers, retailers and enterprises with reliable technology products,
                        infrastructure and services through efficient distribution and strong partnerships.
                    </p>
                </div>

                <div class="soft-card p-6">
                    <div class="grid h-11 w-11 place-items-center rounded-xl bg-cyan-500 text-lg font-black text-white">A
                    </div>
                    <h3 class="mt-4 text-2xl font-black text-slate-950">Our Aim</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        To achieve customer satisfaction through quality products, transparent business practices,
                        responsive service and long-term relationships.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 08. OMAN VISION 2040 --}}
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[.95fr_1.05fr] lg:gap-10">
                <div>
                    <p class="section-label">Oman Vision 2040</p>

                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Aligning technology growth with national development.
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600">
                        GPT Group aligns its future direction with Oman Vision 2040 by supporting digital infrastructure,
                        economic diversification, knowledge-based growth and sustainable business practices.
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    @foreach ([['title' => 'Enhancing Technological Infrastructure', 'desc' => 'Supporting secure networks, digital systems and modern business infrastructure.'], ['title' => 'Bringing Top Brands to Oman', 'desc' => 'Connecting customers and businesses with trusted global technology brands.'], ['title' => 'Supporting E-Commerce & Online Services', 'desc' => 'Strengthening digital retail and customer-first online experiences.'], ['title' => 'Investing in Human Capital', 'desc' => 'Building skills, training teams and supporting employment opportunities.'], ['title' => 'Expanding Sustainable Practices', 'desc' => 'Encouraging responsible operations and long-term market development.']] as $vision)
                        <div class="soft-card p-4 {{ $loop->last ? 'sm:col-span-2' : '' }}">
                            <h3 class="text-base font-black text-slate-950">{{ $vision['title'] }}</h3>
                            <p class="mt-1.5 text-sm leading-6 text-slate-600">{{ $vision['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

   

    {{-- 10. OUR JOURNEY --}}

  {{-- =========================================================
    10. OUR JOURNEY — COLORFUL TIMELINE
========================================================= --}}



    {{-- 11. LEADERSHIP TEAM --}}

@if (isset($teamMembers) && $teamMembers->count() > 0)
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Section Heading --}}
            <div class="mx-auto max-w-3xl text-center">
                <p class="section-label">
                    Leadership Team
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Experienced people driving
                    <span class="text-gradient">GPT Group forward.</span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    Our leadership team combines regional market knowledge,
                    technology expertise and operational discipline.
                </p>
            </div>

            {{-- Team Grid --}}
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($teamMembers as $member)
                    <article
                        class="soft-card group overflow-hidden rounded-2xl"
                    >
                        {{-- Team Image --}}
                        <div class="relative h-64 overflow-hidden bg-gradient-to-br from-blue-50 to-cyan-50">
                            @if ($member->image)
                                <img
                                    src="{{ asset('storage/' . $member->image) }}"
                                    alt="{{ $member->name }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                >
                            @else
                                <div
                                    class="grid h-full w-full place-items-center bg-gradient-to-br from-blue-100 to-cyan-100"
                                >
                                    <span
                                        class="grid h-20 w-20 place-items-center rounded-full bg-white text-3xl font-black text-blue-700 shadow-lg"
                                    >
                                        {{ strtoupper(substr($member->name ?? 'T', 0, 1)) }}
                                    </span>
                                </div>
                            @endif

                            {{-- Designation Badge --}}
                            @if ($member->designation)
                                <div
                                    class="absolute bottom-4 left-4 rounded-full bg-white/90 px-4 py-2 text-xs font-black text-blue-700 shadow-lg backdrop-blur"
                                >
                                    {{ $member->designation }}
                                </div>
                            @endif
                        </div>

                        {{-- Team Content --}}
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $member->name }}
                                    </h3>

                                    @if ($member->designation)
                                        <p class="mt-1 text-sm font-bold text-blue-700">
                                            {{ $member->designation }}
                                        </p>
                                    @endif
                                </div>

                                <span
                                    class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-blue-50 text-lg text-blue-700 transition group-hover:bg-blue-600 group-hover:text-white"
                                >
                                    →
                                </span>
                            </div>

                            @if ($member->description)
                                <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-600">
                                    {{ $member->description }}
                                </p>
                            @endif

                            @if ($member->profile_link)
                                <a
                                    href="{{ $member->profile_link }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-4 inline-flex items-center gap-2 text-sm font-black text-blue-700"
                                >
                                    View Profile
                                    <span>→</span>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>
@endif

    {{-- 11. CTA --}}

    <section class="about-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">
                <div class="grid items-center gap-6 lg:grid-cols-2">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                            Partner With GPT Group
                        </p>

                        <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                            Build your market advantage with a trusted technology partner.
                        </h2>

                        <p class="mt-3 text-base leading-7 text-blue-50">
                            Connect for distribution partnerships, enterprise solutions, security projects,
                            IT infrastructure and market expansion.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3 lg:justify-end">
                        <a href="{{ route('contact') }}"
                            class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1">
                            Contact Us
                        </a>

                        <a href="{{ route('brands') }}"
                            class="inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1">
                            Explore Brands
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
