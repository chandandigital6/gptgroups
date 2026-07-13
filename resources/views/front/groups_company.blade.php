@extends('front_pages.front_components.main')

@section('content')

@php
    $groupFallbackImage = 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80';
    $companyFallbackImage = 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1000&q=80';
@endphp

<style>
    .group-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .group-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .group-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .group-card-hover {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .group-card-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }
</style>

{{-- 01. PAGE HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'group-companies'])

{{-- 02. QUICK FACTS --}}
@include('front.sections.quick_facts', ['pageSlug' => 'group-companies'])

{{-- 03. INTRO --}}
<section class="group-section-light py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

            <div>
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    GPT Group Business House
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    One group, multiple
                    <span class="group-gradient-text">growth-focused companies.</span>
                </h2>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    GPT Group began with telecom and technology distribution, supporting mobile devices,
                    smartphones, tablets and accessories across B2B and B2C markets.
                </p>

                <p class="mt-3 text-base leading-7 text-slate-600">
                    The Group later expanded into online retail, fashion, beauty care, hospitality and I.T. services,
                    creating a diversified business platform for customers and partners.
                </p>

                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <div class="grid h-9 w-9 place-items-center rounded-xl bg-blue-600 text-xs font-black text-white">
                            01
                        </div>

                        <h3 class="mt-3 text-lg font-black text-slate-950">
                            Technology Distribution
                        </h3>

                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                            Mobile devices, accessories, gadgets and business supply.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <div class="grid h-9 w-9 place-items-center rounded-xl bg-cyan-500 text-xs font-black text-white">
                            02
                        </div>

                        <h3 class="mt-3 text-lg font-black text-slate-950">
                            Diversified Expansion
                        </h3>

                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                            Online, fashion, beauty, hospitality and I.T. verticals.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                <img
                    class="h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                    alt="Technology business"
                    loading="lazy"
                >

                <img
                    class="mt-5 h-44 w-full rounded-2xl object-cover shadow-lg sm:mt-7 sm:h-52 lg:h-56"
                    src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                    alt="Retail business"
                    loading="lazy"
                >

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-lg">
                    <p class="group-gradient-text text-3xl font-black">GPT</p>
                    <p class="mt-2 text-lg font-black text-slate-950">Business Group</p>
                    <p class="mt-2 text-xs leading-5 text-slate-600">
                        Distribution, retail, online, beauty, hospitality and I.T.
                    </p>
                </div>

                <img
                    class="mt-5 h-44 w-full rounded-2xl object-cover shadow-lg sm:mt-7 sm:h-52 lg:h-56"
                    src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80"
                    alt="Business team"
                    loading="lazy"
                >
            </div>

        </div>
    </div>
</section>

{{-- 04. GROUP COMPANIES --}}
@if (isset($businessVerticalSection) && $businessVerticalSection && $businessVerticalSection->activeItems->count())
    <section
        id="{{ $businessVerticalSection->section_id ?: 'companies' }}"
        class="bg-white py-10 sm:py-12 lg:py-14"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                @if ($businessVerticalSection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $businessVerticalSection->label }}
                    </p>
                @endif

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $businessVerticalSection->title }}
                </h2>

                @if ($businessVerticalSection->description)
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        {{ $businessVerticalSection->description }}
                    </p>
                @endif
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($businessVerticalSection->activeItems as $item)
                    @php
                        $badgeClass = match ($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'pink' => 'bg-pink-500',
                            'slate' => 'bg-slate-800',
                            default => 'bg-blue-600',
                        };

                        $tagClass = match ($item->theme) {
                            'cyan' => 'bg-cyan-50 text-cyan-700',
                            'pink' => 'bg-pink-50 text-pink-700',
                            'slate' => 'bg-slate-100 text-slate-700',
                            default => 'bg-blue-50 text-blue-700',
                        };
                    @endphp

                    <article class="group group-card-hover overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
                        <div class="relative h-44 overflow-hidden sm:h-48">
                            <img
                                src="{{ !empty($item->image)
                                    ? asset('storage/' . ltrim($item->image, '/'))
                                    : $companyFallbackImage }}"
                                alt="{{ $item->image_alt ?: $item->title }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ $companyFallbackImage }}';"
                            >

                            @if ($item->badge_text)
                                <span class="absolute left-4 top-4 rounded-full {{ $badgeClass }} px-3 py-1.5 text-[11px] font-black text-white">
                                    {{ $item->badge_text }}
                                </span>
                            @endif
                        </div>

                        <div class="p-5">
                            <h3 class="text-xl font-black text-slate-950">
                                {{ $item->title }}
                            </h3>

                            @if ($item->description)
                                <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">
                                    {{ $item->description }}
                                </p>
                            @endif

                            @if ($item->tags)
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach ($item->tagList() as $tag)
                                        <span class="rounded-full {{ $tagClass }} px-3 py-1 text-[11px] font-bold">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- 05. BUSINESS MODEL --}}
@if (isset($businessModelSection) && $businessModelSection)
    <section class="group-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div class="relative order-2 lg:order-1">
                    <div class="relative overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-3 shadow-xl">
                        <img
                            class="h-[280px] w-full rounded-[1.1rem] object-cover sm:h-[340px] lg:h-[390px]"
                            src="{{ !empty($businessModelSection->image)
                                ? asset('storage/' . ltrim($businessModelSection->image, '/'))
                                : $groupFallbackImage }}"
                            alt="{{ $businessModelSection->image_alt ?: ($businessModelSection->title ?? 'GPT Group business model') }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='{{ $groupFallbackImage }}';"
                        >

                        @if ($businessModelSection->card_title || $businessModelSection->card_description)
                            <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-md">
                                @if ($businessModelSection->card_title)
                                    <p class="text-lg font-black text-slate-950">
                                        {{ $businessModelSection->card_title }}
                                    </p>
                                @endif

                                @if ($businessModelSection->card_description)
                                    <p class="mt-1.5 text-sm font-semibold leading-6 text-slate-600">
                                        {{ $businessModelSection->card_description }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    @if ($businessModelSection->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $businessModelSection->label }}
                        </p>
                    @endif

                    @if ($businessModelSection->title)
                        <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $businessModelSection->title }}
                        </h2>
                    @endif

                    @if ($businessModelSection->description_1)
                        <p class="mt-4 text-base leading-7 text-slate-600">
                            {{ $businessModelSection->description_1 }}
                        </p>
                    @endif

                    @if ($businessModelSection->description_2)
                        <p class="mt-3 text-base leading-7 text-slate-600">
                            {{ $businessModelSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $featureTitle = $businessModelSection->{'feature_' . $i . '_title'} ?? null;
                                $featureDescription = $businessModelSection->{'feature_' . $i . '_description'} ?? null;
                            @endphp

                            @if ($featureTitle || $featureDescription)
                                <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                                    @if ($featureTitle)
                                        <h3 class="text-base font-black text-slate-950">
                                            {{ $featureTitle }}
                                        </h3>
                                    @endif

                                    @if ($featureDescription)
                                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                            {{ $featureDescription }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif

{{-- 06. FAQ --}}
@if (isset($faqSection) && $faqSection && $faqSection->activeItems->count())
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">

            <div>
                @if ($faqSection->label)
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        {{ $faqSection->label }}
                    </p>
                @endif

                @if ($faqSection->title)
                    <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $faqSection->title }}
                    </h2>
                @endif

                @if ($faqSection->description)
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        {{ $faqSection->description }}
                    </p>
                @endif

                @if ($faqSection->button_text)
                    <a
                        href="{{ $faqSection->button_link ?: '#' }}"
                        class="mt-5 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        {{ $faqSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="grid gap-3">
                @foreach ($faqSection->activeItems as $faq)
                    <details
                        class="rounded-xl border border-slate-100 bg-slate-50 p-4 shadow-sm"
                        {{ $faq->is_open ? 'open' : '' }}
                    >
                        <summary class="cursor-pointer text-sm font-black text-slate-950 sm:text-base">
                            {{ $faq->question }}
                        </summary>

                        @if ($faq->answer)
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $faq->answer }}
                            </p>
                        @endif
                    </details>
                @endforeach
            </div>

        </div>
    </section>
@endif

{{-- 07. CTA --}}
<section class="group-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-8 lg:p-10">
            <div class="grid items-center gap-6 lg:grid-cols-2">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100">
                        Build With GPT Group
                    </p>

                    <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Partner with a diversified business house.
                    </h2>

                    <p class="mt-3 text-base leading-7 text-blue-50">
                        Explore partnerships across technology distribution, online services,
                        retail, beauty care, hospitality and I.T.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                    >
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection