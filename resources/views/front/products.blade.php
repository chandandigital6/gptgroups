@extends('front_pages.front_components.main')

@section('content')

@php
    $productFallbackImage = 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80';
    $supportFallbackImage = 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=85';
@endphp

<style>
    html {
        scroll-behavior: smooth;
    }

    .products-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .products-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .products-card-hover {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .products-card-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }
</style>

{{-- 01. PRODUCTS HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'products'])

{{-- 02. QUICK FACTS --}}
@include('front.sections.quick_facts', ['pageSlug' => 'products'])

{{-- 03. PRODUCT LIST --}}
<section id="product-list" class="products-section-light py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    Products
                </p>

                <h2 class="mt-3 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Explore all products.
                </h2>

                <p class="mt-3 max-w-2xl text-base leading-7 text-slate-600">
                    Browse available products with brand, category and product information.
                </p>
            </div>

            <a
                href="{{ route('contact') }}"
                class="inline-flex w-fit rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
            >
                Product Enquiry
            </a>
        </div>

        @if (isset($products) && $products->count())
            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <a
                        href="{{ route('product.detail', $product->slug) }}"
                        class="group products-card-hover overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm"
                    >
                        <div class="relative h-48 bg-gradient-to-br from-white to-blue-50 p-4">
                            @if ($product->badge)
                                <span class="absolute left-4 top-4 z-10 rounded-full bg-blue-600 px-3 py-1.5 text-[11px] font-black text-white shadow-md">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if ($product->product_type)
                                <span class="absolute right-4 top-4 z-10 rounded-full bg-white px-3 py-1.5 text-[11px] font-black text-blue-700 shadow-sm ring-1 ring-slate-100">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            @endif

                            <img
                                src="{{ !empty($product->image)
                                    ? asset('storage/' . ltrim($product->image, '/'))
                                    : $productFallbackImage }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-contain transition duration-500 group-hover:scale-105"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ $productFallbackImage }}';"
                            >
                        </div>

                        <div class="p-5">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h3 class="text-xl font-black leading-tight text-slate-950">
                                        {{ $product->name }}
                                    </h3>

                                    @if ($product->brand)
                                        <p class="mt-1.5 text-[11px] font-black uppercase tracking-[.16em] text-blue-700">
                                            {{ $product->brand->name }}
                                        </p>
                                    @endif
                                </div>

                                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-slate-100 text-lg text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">
                                {{ $product->short_description ?: 'View product details and enquiry information.' }}
                            </p>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @if ($product->category)
                                    <span class="rounded-full bg-cyan-50 px-3 py-1 text-[11px] font-black text-cyan-700">
                                        {{ $product->category->name }}
                                    </span>
                                @endif

                                @if ($product->brand)
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-[11px] font-black text-blue-700">
                                        {{ $product->brand->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if (method_exists($products, 'links'))
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        @else
            <div class="mt-8 rounded-2xl border border-slate-100 bg-slate-50 p-8 text-center shadow-sm">
                <h2 class="text-xl font-black text-slate-950">
                    No products found.
                </h2>

                <p class="mt-2 text-sm text-slate-600">
                    Please add active products from the admin panel.
                </p>
            </div>
        @endif

    </div>
</section>

{{-- 04. PRODUCT SUPPORT --}}
@if (isset($productSupportSection) && $productSupportSection)
    <section class="products-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

                <div>
                    @if ($productSupportSection->label)
                        <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                            {{ $productSupportSection->label }}
                        </p>
                    @endif

                    @if ($productSupportSection->title)
                        <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $productSupportSection->title }}
                        </h2>
                    @endif

                    @if ($productSupportSection->description_1)
                        <p class="mt-4 text-base leading-7 text-slate-600">
                            {{ $productSupportSection->description_1 }}
                        </p>
                    @endif

                    @if ($productSupportSection->description_2)
                        <p class="mt-3 text-base leading-7 text-slate-600">
                            {{ $productSupportSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-5 grid gap-3">
                        @foreach ([1, 2] as $i)
                            @php
                                $featureTitle = $productSupportSection->{'feature_' . $i . '_title'} ?? null;
                                $featureDescription = $productSupportSection->{'feature_' . $i . '_description'} ?? null;
                            @endphp

                            @if ($featureTitle || $featureDescription)
                                <div class="flex gap-3 rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                                    <div class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-blue-50 text-xs font-black text-blue-700">
                                        ✓
                                    </div>

                                    <div>
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
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <a
                        href="{{ route('contact') }}"
                        class="mt-5 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Ask About Stock
                    </a>
                </div>

                <div class="overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-3 shadow-xl">
                    <img
                        class="h-[280px] w-full rounded-[1.1rem] object-cover sm:h-[340px] lg:h-[390px]"
                        src="{{ !empty($productSupportSection->image)
                            ? asset('storage/' . ltrim($productSupportSection->image, '/'))
                            : $supportFallbackImage }}"
                        alt="{{ $productSupportSection->image_alt ?: ($productSupportSection->title ?? 'Product distribution') }}"
                        loading="lazy"
                        onerror="this.onerror=null;this.src='{{ $supportFallbackImage }}';"
                    >

                    @if ($productSupportSection->card_title || $productSupportSection->card_description)
                        <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-md">
                            @if ($productSupportSection->card_title)
                                <p class="text-lg font-black text-slate-950">
                                    {{ $productSupportSection->card_title }}
                                </p>
                            @endif

                            @if ($productSupportSection->card_description)
                                <p class="mt-1.5 text-sm font-semibold leading-6 text-slate-600">
                                    {{ $productSupportSection->card_description }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endif

{{-- 05. FAQ --}}
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