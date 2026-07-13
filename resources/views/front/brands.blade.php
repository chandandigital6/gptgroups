@extends('front_pages.front_components.main')

@section('content')

@php
    $brandFallbackImage = 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=80';
    $categoryFallbackImage = 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=1000&q=80';
@endphp

<style>
    html {
        scroll-behavior: smooth;
    }

    .brand-soft-bg {
        background:
            radial-gradient(circle at 88% 8%, rgba(103, 232, 249, .22), transparent 28%),
            radial-gradient(circle at 8% 42%, rgba(147, 197, 253, .20), transparent 30%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 46%, #eff6ff 100%);
    }

    .brand-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .text-gradient {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .brand-card {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .brand-card:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }
</style>

{{-- 01. BRANDS HERO --}}
<section class="brand-soft-bg py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-1.5 text-xs font-black text-blue-700">
                    <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                    GPT Group Brands
                </div>

                <h1 class="mt-4 text-4xl font-black leading-tight tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Leading technology
                    <span class="block text-gradient">brands and products.</span>
                </h1>

                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    Explore smartphones, tablets, accessories, gadgets, display products and
                    security solutions available through GPT Group.
                </p>

                <div class="mt-5 flex flex-wrap gap-3">
                    <a
                        href="#brand-portfolio"
                        class="inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        View Brands
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1 hover:bg-slate-50"
                    >
                        Partner Enquiry
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                <img
                    class="h-44 w-full rounded-2xl object-cover shadow-lg sm:h-52 lg:h-56"
                    src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                    alt="Smartphone brands"
                    loading="lazy"
                >

                <img
                    class="mt-5 h-44 w-full rounded-2xl object-cover shadow-lg sm:mt-7 sm:h-52 lg:h-56"
                    src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=80"
                    alt="Tablet brands"
                    loading="lazy"
                >

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-lg">
                    <p class="text-gradient text-3xl font-black">GPT</p>
                    <p class="mt-2 text-lg font-black text-slate-950">Brand Ecosystem</p>
                    <p class="mt-2 text-xs leading-5 text-slate-600">
                        Mobiles, tablets, accessories, gadgets and security solutions.
                    </p>
                </div>

                <img
                    class="mt-5 h-44 w-full rounded-2xl object-cover shadow-lg sm:mt-7 sm:h-52 lg:h-56"
                    src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80"
                    alt="Technology accessories"
                    loading="lazy"
                >
            </div>

        </div>
    </div>
</section>

{{-- 02. QUICK FACTS --}}
@include('front.sections.quick_facts', ['pageSlug' => 'brands'])

{{-- 03. BRAND INTRO --}}
@if (isset($brandsPortfolio) && $brandsPortfolio)
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div>
                    @if ($brandsPortfolio->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $brandsPortfolio->label }}
                        </p>
                    @endif

                    @if ($brandsPortfolio->title)
                        <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $brandsPortfolio->title }}
                        </h2>
                    @endif

                    @if ($brandsPortfolio->description_1)
                        <p class="mt-4 text-base leading-7 text-slate-600">
                            {{ $brandsPortfolio->description_1 }}
                        </p>
                    @endif

                    @if ($brandsPortfolio->description_2)
                        <p class="mt-3 text-base leading-7 text-slate-600">
                            {{ $brandsPortfolio->description_2 }}
                        </p>
                    @endif

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach ([1, 2] as $i)
                            @php
                                $featureTitle = $brandsPortfolio->{'feature_' . $i . '_title'} ?? null;
                                $featureDescription = $brandsPortfolio->{'feature_' . $i . '_description'} ?? null;
                            @endphp

                            @if ($featureTitle || $featureDescription)
                                <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                    <div class="grid h-9 w-9 place-items-center rounded-xl {{ $i === 1 ? 'bg-blue-50 text-blue-700' : 'bg-cyan-50 text-cyan-700' }} text-xs font-black">
                                        0{{ $i }}
                                    </div>

                                    @if ($featureTitle)
                                        <h3 class="mt-3 text-lg font-black text-slate-950">
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

                <div class="overflow-hidden rounded-[1.5rem] border border-slate-100 bg-slate-50 p-3 shadow-xl">
                    <img
                        class="h-[280px] w-full rounded-[1.1rem] object-cover sm:h-[340px] lg:h-[390px]"
                        src="{{ !empty($brandsPortfolio->image)
                            ? asset('storage/' . ltrim($brandsPortfolio->image, '/'))
                            : $brandFallbackImage }}"
                        alt="{{ $brandsPortfolio->image_alt ?: ($brandsPortfolio->title ?? 'Brand partnership') }}"
                        loading="lazy"
                        onerror="this.onerror=null;this.src='{{ $brandFallbackImage }}';"
                    >

                    @if ($brandsPortfolio->card_title || $brandsPortfolio->card_description)
                        <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-md">
                            @if ($brandsPortfolio->card_title)
                                <p class="text-lg font-black text-slate-950">
                                    {{ $brandsPortfolio->card_title }}
                                </p>
                            @endif

                            @if ($brandsPortfolio->card_description)
                                <p class="mt-1.5 text-sm font-semibold leading-6 text-slate-600">
                                    {{ $brandsPortfolio->card_description }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endif

{{-- 04. BRAND PORTFOLIO --}}
<section id="brand-portfolio" class="brand-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                Our Brands
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Leading brands and providers.
            </h2>

            <p class="mt-3 text-base leading-7 text-slate-600">
                Explore active brands available for retail, B2B, dealer and customer channels.
            </p>
        </div>

        @if (isset($brands) && $brands->count())
            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($brands as $brand)
                    <a
                        href="{{ route('brands.show', $brand->slug) }}"
                        class="brand-card group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm"
                    >
                        <div class="relative h-40 overflow-hidden bg-gradient-to-br from-white to-blue-50 p-4">
                            @if ($brand->logo)
                                <img
                                    src="{{ asset('storage/' . ltrim($brand->logo, '/')) }}"
                                    alt="{{ $brand->name }}"
                                    class="h-full w-full object-contain transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                >
                            @elseif ($brand->banner_image)
                                <img
                                    src="{{ asset('storage/' . ltrim($brand->banner_image, '/')) }}"
                                    alt="{{ $brand->name }}"
                                    class="h-full w-full rounded-xl object-cover transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                >
                            @else
                                <div class="grid h-full w-full place-items-center rounded-xl bg-white shadow-inner">
                                    <span class="text-gradient text-5xl font-black">
                                        {{ strtoupper(substr($brand->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif

                            <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-[11px] font-black text-blue-700 shadow-sm">
                                {{ $brand->brand_type ?? 'Product Brand' }}
                            </span>
                        </div>

                        <div class="p-5">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $brand->name }}
                                    </h3>

                                    <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">
                                        {{ $brand->short_description ?: ($brand->description ?: 'Explore products and categories available under ' . $brand->name . '.') }}
                                    </p>
                                </div>

                                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-slate-100 text-lg text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-[11px] font-black text-blue-700">
                                    {{ $brand->categories_count ?? 0 }} Categories
                                </span>

                                <span class="rounded-full bg-cyan-50 px-3 py-1 text-[11px] font-black text-cyan-700">
                                    {{ $brand->products_count ?? 0 }} Products
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if (method_exists($brands, 'links'))
                <div class="mt-8">
                    {{ $brands->links() }}
                </div>
            @endif
        @else
            <div class="mt-8 rounded-2xl border border-slate-100 bg-white p-8 text-center shadow-sm">
                <h2 class="text-xl font-black text-slate-950">No brands found.</h2>
                <p class="mt-2 text-sm text-slate-500">Please add active brands from the admin panel.</p>
            </div>
        @endif

    </div>
</section>

{{-- 05. PRODUCT CATEGORIES --}}
@if (isset($productCategories) && $productCategories->count())
    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                        Product Categories
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                        Complete technology product range.
                    </h2>

                    <p class="mt-3 max-w-2xl text-base leading-7 text-slate-600">
                        Browse categories available for retail stores, B2B clients, dealers and corporate buyers.
                    </p>
                </div>

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex w-fit rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                >
                    Start Enquiry
                </a>
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($productCategories as $category)
                    @php
                        $categoryLink = $category->brand
                            ? route('brands.categories.show', [$category->brand->slug, $category->slug])
                            : '#';
                    @endphp

                    <a
                        href="{{ $categoryLink }}"
                        class="brand-card group overflow-hidden rounded-2xl border border-slate-100 bg-slate-50 shadow-sm"
                    >
                        <div class="h-40 bg-gradient-to-br from-blue-50 to-cyan-50 p-3">
                            <img
                                src="{{ !empty($category->image)
                                    ? asset('storage/' . ltrim($category->image, '/'))
                                    : $categoryFallbackImage }}"
                                alt="{{ $category->name }}"
                                class="h-full w-full rounded-xl object-cover transition duration-500 group-hover:scale-105"
                                loading="lazy"
                                onerror="this.onerror=null;this.style.display='none';this.nextElementSibling.classList.remove('hidden');"
                            >

                            <div class="hidden h-full w-full place-items-center rounded-xl bg-white text-4xl font-black text-blue-700">
                                {{ strtoupper(substr($category->name, 0, 1)) }}
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $category->name }}
                                    </h3>

                                    @if ($category->brand)
                                        <p class="mt-1 text-[11px] font-black uppercase tracking-[.16em] text-blue-700">
                                            {{ $category->brand->name }}
                                        </p>
                                    @endif
                                </div>

                                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-white text-lg text-slate-500 shadow-sm transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">
                                {{ $category->description ?: 'View products available in this category.' }}
                            </p>

                            <p class="mt-3 text-[11px] font-black uppercase tracking-[.16em] text-cyan-700">
                                {{ $category->products_count ?? 0 }} Products
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
@endif

{{-- 06. PARTNER SUPPORT --}}
@if (isset($partnerSupportSection) && $partnerSupportSection)
    <section class="brand-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div>
                    @if ($partnerSupportSection->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $partnerSupportSection->label }}
                        </p>
                    @endif

                    @if ($partnerSupportSection->title)
                        <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $partnerSupportSection->title }}
                        </h2>
                    @endif

                    @if ($partnerSupportSection->description_1)
                        <p class="mt-4 text-base leading-7 text-slate-600">
                            {{ $partnerSupportSection->description_1 }}
                        </p>
                    @endif

                    @if ($partnerSupportSection->description_2)
                        <p class="mt-3 text-base leading-7 text-slate-600">
                            {{ $partnerSupportSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $featureTitle = $partnerSupportSection->{'feature_' . $i . '_title'} ?? null;
                                $featureDescription = $partnerSupportSection->{'feature_' . $i . '_description'} ?? null;
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

                <div class="overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-3 shadow-xl">
                    <img
                        class="h-[280px] w-full rounded-[1.1rem] object-cover sm:h-[340px] lg:h-[390px]"
                        src="{{ !empty($partnerSupportSection->image)
                            ? asset('storage/' . ltrim($partnerSupportSection->image, '/'))
                            : $brandFallbackImage }}"
                        alt="{{ $partnerSupportSection->image_alt ?: ($partnerSupportSection->title ?? 'Partner support') }}"
                        loading="lazy"
                        onerror="this.onerror=null;this.src='{{ $brandFallbackImage }}';"
                    >

                    @if ($partnerSupportSection->card_title || $partnerSupportSection->card_description)
                        <div class="mt-3 rounded-xl border border-slate-100 bg-slate-50 p-4">
                            @if ($partnerSupportSection->card_title)
                                <p class="text-lg font-black text-slate-950">
                                    {{ $partnerSupportSection->card_title }}
                                </p>
                            @endif

                            @if ($partnerSupportSection->card_description)
                                <p class="mt-1.5 text-sm leading-6 text-slate-600">
                                    {{ $partnerSupportSection->card_description }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endif

{{-- 07. FAQ --}}
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

@endsection