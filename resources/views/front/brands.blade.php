@extends('front_pages.front_components.main')

@section('content')
    <style>
        .brand-soft-bg {
            background:
                radial-gradient(circle at 88% 8%, rgba(103, 232, 249, .32), transparent 28%),
                radial-gradient(circle at 8% 42%, rgba(147, 197, 253, .30), transparent 30%),
                linear-gradient(135deg, #ffffff 0%, #f8fafc 46%, #eff6ff 100%);
        }

        .text-gradient {
            background: linear-gradient(90deg, #2563eb, #06b6d4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .soft-card {
            border: 1px solid rgba(226, 232, 240, .95);
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 18px 55px rgba(15, 23, 42, .08);
        }

        .soft-card:hover {
            box-shadow: 0 24px 70px rgba(37, 99, 235, .14);
        }

        .brand-logo-card img {
            filter: saturate(1.05);
        }
    </style>

    {{-- BRANDS HERO --}}
    <section class="relative overflow-hidden brand-soft-bg">
        <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300/50 blur-2xl"></div>
        <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300/40 blur-2xl"></div>

        <div class="relative mx-auto grid min-h-[620px] max-w-7xl items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-[.95fr_1.05fr] lg:px-8 lg:py-24">
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    GPT Group Brands
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Leading Tech
                    <span class="block text-gradient">Brands & Products</span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    GPT Group provides a strong product ecosystem covering smartphones, tablets, accessories, gadgets,
                    display products and security solutions for Oman and GCC markets.
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="#brand-portfolio"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        View Brands
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Partner Enquiry
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img class="h-64 w-full rounded-[2rem] object-cover shadow-xl sm:h-72"
                        src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                        alt="Smartphone brands">

                    <img class="mt-10 h-64 w-full rounded-[2rem] object-cover shadow-xl sm:h-72"
                        src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=80"
                        alt="Tablet brands">

                    <div class="rounded-[2rem] bg-white p-7 shadow-xl ring-1 ring-slate-100">
                        <p class="text-4xl font-black text-gradient">GPT</p>
                        <p class="mt-3 text-lg font-black text-slate-950">Brand Ecosystem</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            Mobiles, tablets, accessories, gadgets and security solutions.
                        </p>
                    </div>

                    <img class="mt-10 h-64 w-full rounded-[2rem] object-cover shadow-xl sm:h-72"
                        src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80"
                        alt="Accessories">
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK STATS --}}

    {{-- <section class="relative z-10 -mt-10"> --}}
    @include('front.sections.quick_facts', ['pageSlug' => 'brands'])

        
    {{-- </section> --}}

    

    {{-- BRAND INTRO --}}

@if($brandsPortfolio)

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">

                <div>
                    @if(!empty($brandsPortfolio->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $brandsPortfolio->label }}
                        </p>
                    @endif

                    @if(!empty($brandsPortfolio->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $brandsPortfolio->title }}
                        </h2>
                    @endif

                    @if(!empty($brandsPortfolio->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $brandsPortfolio->description_1 }}
                        </p>
                    @endif

                    @if(!empty($brandsPortfolio->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $brandsPortfolio->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($brandsPortfolio->feature_1_title))
                            <div class="rounded-[1.75rem] bg-slate-50 p-6 ring-1 ring-slate-100">
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">
                                    01
                                </div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
                                    {{ $brandsPortfolio->feature_1_title }}
                                </h3>

                                @if(!empty($brandsPortfolio->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $brandsPortfolio->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($brandsPortfolio->feature_2_title))
                            <div class="rounded-[1.75rem] bg-slate-50 p-6 ring-1 ring-slate-100">
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">
                                    02
                                </div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
                                    {{ $brandsPortfolio->feature_2_title }}
                                </h3>

                                @if(!empty($brandsPortfolio->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $brandsPortfolio->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-slate-50 p-5 shadow-xl ring-1 ring-slate-100">

                    @if(!empty($brandsPortfolio->image))
                        <img
                            class="h-[520px] w-full rounded-[2rem] object-cover"
                            src="{{ asset('storage/' . $brandsPortfolio->image) }}"
                            alt="{{ $brandsPortfolio->image_alt ?: $brandsPortfolio->title }}"
                        >
                    @else
                        <img
                            class="h-[520px] w-full rounded-[2rem] object-cover"
                            src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                            alt="{{ $brandsPortfolio->title ?? 'Brand partnership' }}"
                        >
                    @endif

                    @if(!empty($brandsPortfolio->card_title) || !empty($brandsPortfolio->card_description))
                        <div class="mt-5 rounded-[1.75rem] bg-white p-6 shadow-lg ring-1 ring-slate-100">

                            @if(!empty($brandsPortfolio->card_title))
                                <p class="text-2xl font-black text-slate-950">
                                    {{ $brandsPortfolio->card_title }}
                                </p>
                            @endif

                            @if(!empty($brandsPortfolio->card_description))
                                <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
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


    {{-- BRAND PORTFOLIO --}}
    <section id="brand-portfolio" class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Our Brands</p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Leading smartphone brands & providers.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    GPT Group supports a diverse brand ecosystem for retail, B2B, dealer and customer channels.
                </p>
            </div>

            @if (isset($brands) && $brands->count() > 0)
                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($brands as $brand)
                        <a href="{{ route('brands.show', $brand->slug) }}"
                            class="soft-card brand-logo-card group block overflow-hidden rounded-[2rem] transition hover:-translate-y-2">

                            <div class="relative h-56 overflow-hidden bg-gradient-to-br from-white to-blue-50 p-6">
                                @if ($brand->logo)
                                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                                        class="h-full w-full object-contain transition duration-500 group-hover:scale-110">
                                @elseif ($brand->banner_image)
                                    <img src="{{ asset('storage/' . $brand->banner_image) }}" alt="{{ $brand->name }}"
                                        class="h-full w-full rounded-[1.5rem] object-cover transition duration-500 group-hover:scale-110">
                                @else
                                    <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-white shadow-inner ring-1 ring-slate-100">
                                        <span class="text-6xl font-black text-gradient">
                                            {{ strtoupper(substr($brand->name, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif

                                <span class="absolute left-5 top-5 rounded-full bg-white/90 px-3 py-1 text-xs font-black text-blue-700 shadow-sm ring-1 ring-blue-100">
                                    {{ $brand->brand_type ?? 'Product Brand' }}
                                </span>
                            </div>

                            <div class="p-7">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h3 class="text-2xl font-black text-slate-950">{{ $brand->name }}</h3>

                                        @if ($brand->short_description)
                                            <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                                {{ $brand->short_description }}
                                            </p>
                                        @elseif ($brand->description)
                                            <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                                {{ $brand->description }}
                                            </p>
                                        @else
                                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                                Explore categories and products available under {{ $brand->name }}.
                                            </p>
                                        @endif
                                    </div>

                                    <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                        →
                                    </span>
                                </div>

                                <div class="mt-5 flex flex-wrap gap-2">
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                        {{ $brand->categories_count ?? 0 }} Categories
                                    </span>

                                    <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">
                                        {{ $brand->products_count ?? 0 }} Products
                                    </span>
                                </div>

                                <div class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white transition group-hover:bg-blue-700">
                                    View Categories
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $brands->links() }}
                </div>
            @else
                <div class="mt-12 rounded-[2rem] bg-white p-10 text-center shadow-sm ring-1 ring-slate-100">
                    <h2 class="text-2xl font-black text-slate-950">No brands found.</h2>
                    <p class="mt-2 text-slate-500">Please add active brands from admin panel.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- DYNAMIC PRODUCT CATEGORIES --}}
    @if (isset($productCategories) && $productCategories->count() > 0)
        <section class="bg-white py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">Product Categories</p>
                        <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                            Complete tech product range.
                        </h2>
                        <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                            GPT Group’s portfolio supports retail stores, B2B clients, dealers, corporate buyers and service channels.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        Start Enquiry
                    </a>
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($productCategories as $category)
                        @php
                            $categoryLink = $category->brand
                                ? route('brands.categories.show', [$category->brand->slug, $category->slug])
                                : '#';
                        @endphp

                        <a href="{{ $categoryLink }}"
                            class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm ring-1 ring-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                            <div class="h-56 bg-gradient-to-br from-blue-50 to-cyan-50 p-4">
                                @if ($category->image)
                                    <img class="h-full w-full rounded-[1.5rem] object-cover transition duration-500 group-hover:scale-105"
                                        src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                @else
                                    <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-white text-5xl font-black text-blue-700 shadow-inner">
                                        {{ strtoupper(substr($category->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>

                            <div class="p-7">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h3 class="text-2xl font-black text-slate-950">{{ $category->name }}</h3>

                                        @if ($category->brand)
                                            <p class="mt-1 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                                {{ $category->brand->name }}
                                            </p>
                                        @endif
                                    </div>

                                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-white text-xl text-slate-500 shadow-sm transition group-hover:bg-blue-600 group-hover:text-white">
                                        →
                                    </span>
                                </div>

                                @if ($category->description)
                                    <p class="mt-3 text-sm leading-7 text-slate-600 line-clamp-2">
                                        {{ $category->description }}
                                    </p>
                                @else
                                    <p class="mt-3 text-sm leading-7 text-slate-600">
                                        View products available in this category.
                                    </p>
                                @endif

                                <p class="mt-4 text-xs font-black uppercase tracking-[.2em] text-cyan-700">
                                    {{ $category->products_count ?? 0 }} Products
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- PARTNER SUPPORT --}}
   
    {{-- PARTNER SUPPORT --}}

@if($partnerSupportSection)

    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">

                <div>
                    @if(!empty($partnerSupportSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $partnerSupportSection->label }}
                        </p>
                    @endif

                    @if(!empty($partnerSupportSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $partnerSupportSection->title }}
                        </h2>
                    @endif

                    @if(!empty($partnerSupportSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $partnerSupportSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($partnerSupportSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $partnerSupportSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($partnerSupportSection->feature_1_title))
                            <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-slate-100">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $partnerSupportSection->feature_1_title }}
                                </h3>

                                @if(!empty($partnerSupportSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $partnerSupportSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($partnerSupportSection->feature_2_title))
                            <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-slate-100">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $partnerSupportSection->feature_2_title }}
                                </h3>

                                @if(!empty($partnerSupportSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $partnerSupportSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($partnerSupportSection->feature_3_title))
                            <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-slate-100">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $partnerSupportSection->feature_3_title }}
                                </h3>

                                @if(!empty($partnerSupportSection->feature_3_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $partnerSupportSection->feature_3_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($partnerSupportSection->feature_4_title))
                            <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-slate-100">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $partnerSupportSection->feature_4_title }}
                                </h3>

                                @if(!empty($partnerSupportSection->feature_4_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        {{ $partnerSupportSection->feature_4_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white p-5 shadow-xl ring-1 ring-slate-100">

                    @if(!empty($partnerSupportSection->image))
                        <img
                            class="h-[520px] w-full rounded-[2rem] object-cover"
                            src="{{ asset('storage/' . $partnerSupportSection->image) }}"
                            alt="{{ $partnerSupportSection->image_alt ?: $partnerSupportSection->title }}"
                        >
                    @else
                        <img
                            class="h-[520px] w-full rounded-[2rem] object-cover"
                            src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                            alt="{{ $partnerSupportSection->title ?? 'Partner support' }}"
                        >
                    @endif

                    @if(!empty($partnerSupportSection->card_title) || !empty($partnerSupportSection->card_description))
                        <div class="mt-5 rounded-[1.75rem] bg-slate-50 p-6 ring-1 ring-slate-100">

                            @if(!empty($partnerSupportSection->card_title))
                                <p class="text-3xl font-black text-slate-950">
                                    {{ $partnerSupportSection->card_title }}
                                </p>
                            @endif

                            @if(!empty($partnerSupportSection->card_description))
                                <p class="mt-2 text-slate-600">
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


    {{-- BRAND LOGOS --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Brand Ecosystem</p>
                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        Trusted technology names.
                    </h2>
                </div>

                <p class="max-w-xl text-lg leading-8 text-slate-600">
                    Replace these text cards with official brand logos when you have approved logo assets.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
                @foreach (['Samsung', 'LAVA', 'Apple', 'Honor', 'Nokia', 'Vivo', 'Xiaomi', 'Huawei', 'BlackBerry', 'Sony', 'Micromax', 'More'] as $logoName)
                    <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black {{ $logoName === 'More' ? 'bg-slate-950 text-white' : 'text-slate-800' }} shadow-sm ring-1 ring-slate-100">
                        {{ $logoName }}
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ENQUIRY --}}
    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-stretch gap-10 lg:grid-cols-2">
                <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Brand Partnership</p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                        Want to distribute or launch your brand?
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with GPT Group for product distribution, brand launch, retail visibility, B2B supply and authorized store support.
                    </p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-[1.75rem] bg-white/15 p-6">
                            <h3 class="text-xl font-black">Retail Network</h3>
                            <p class="mt-2 text-sm leading-6 text-blue-50">Showroom and partner outlet support.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white/15 p-6">
                            <h3 class="text-xl font-black">B2B Supply</h3>
                            <p class="mt-2 text-sm leading-6 text-blue-50">Corporate, dealer and wholesale supply.</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2.5rem] bg-white p-8 shadow-xl ring-1 ring-slate-100 sm:p-10">
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Quick Enquiry</p>
                    <h3 class="mt-4 text-3xl font-black text-slate-950">Submit brand / product enquiry</h3>

                    <form action="#" method="POST" class="mt-7 grid gap-4">
                        @csrf

                        <div class="grid gap-4 sm:grid-cols-2">
                            <input type="text" name="name"
                                class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-400 focus:bg-white"
                                placeholder="Full Name">

                            <input type="text" name="company"
                                class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-400 focus:bg-white"
                                placeholder="Company / Brand">
                        </div>

                        <input type="text" name="contact"
                            class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-400 focus:bg-white"
                            placeholder="Phone / Email">

                        <select name="enquiry_type"
                            class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-600 outline-none focus:border-blue-400 focus:bg-white">
                            <option>Distribution Partnership</option>
                            <option>Brand Launch</option>
                            <option>B2B Supply</option>
                            <option>Retail Outlet Support</option>
                            <option>Product Enquiry</option>
                        </select>

                        <textarea name="message" rows="4"
                            class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-400 focus:bg-white"
                            placeholder="Message"></textarea>

                        <button type="submit"
                            class="inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                            Submit Enquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}

@if($faqSection && $faqSection->activeItems->count())

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid gap-12 lg:grid-cols-2">

                <div>
                    @if(!empty($faqSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $faqSection->label }}
                        </p>
                    @endif

                    @if(!empty($faqSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                            {{ $faqSection->title }}
                        </h2>
                    @endif

                    @if(!empty($faqSection->description))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $faqSection->description }}
                        </p>
                    @endif

                    @if(!empty($faqSection->button_text))
                        <a href="{{ $faqSection->button_link ?: '#' }}"
                           class="mt-8 inline-flex rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                            {{ $faqSection->button_text }}
                        </a>
                    @endif
                </div>

                <div class="grid gap-4">
                    @foreach($faqSection->activeItems as $faq)
                        <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-sm"
                                 {{ $faq->is_open ? 'open' : '' }}>

                            <summary class="cursor-pointer text-lg font-black text-slate-950">
                                {{ $faq->question }}
                            </summary>

                            @if(!empty($faq->answer))
                                <p class="mt-3 leading-7 text-slate-600">
                                    {{ $faq->answer }}
                                </p>
                            @endif
                        </details>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

@endif

    {{-- CTA --}}
    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
                <div class="grid items-center gap-8 lg:grid-cols-2">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-100">Build With GPT Group</p>
                        <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                            Get the competitive advantage for your brand.
                        </h2>
                        <p class="mt-5 text-lg leading-8 text-blue-50">
                            Partner with GPT Group for distribution, retail visibility, product launch support and business growth across Oman and GCC.
                        </p>
                    </div>

                    <div class="lg:text-right">
                        <a href="{{ route('contact') }}"
                            class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                            Contact Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
