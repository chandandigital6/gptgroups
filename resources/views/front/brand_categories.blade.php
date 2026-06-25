@extends('front_pages.front_components.main')

@section('content')

<style>
    .brand-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .brand-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .brand-blob {
        filter: blur(10px);
        opacity: .45;
        animation: brandBlob 7s ease-in-out infinite alternate;
    }

    @keyframes brandBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .brand-card {
        border: 1px solid rgba(226, 232, 240, .9);
        background: rgba(255, 255, 255, .86);
        box-shadow: 0 22px 55px rgba(15, 23, 42, .08);
        backdrop-filter: blur(16px);
    }

    .brand-card-hover {
        transition: all .35s ease;
    }

    .brand-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .brand-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .brand-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }
</style>


{{-- BRAND DETAIL HERO --}}
<section class="relative overflow-hidden brand-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 brand-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 brand-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <a href="{{ route('brands') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black uppercase tracking-[.20em] text-blue-700 shadow-sm transition hover:-translate-y-1 hover:bg-white">
                    ← All Brands
                </a>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    {{ $brand->name }}
                    <span class="mt-2 block brand-gradient-text">
                        Brand Categories
                    </span>
                </h1>

                @if ($brand->description)
                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        {{ $brand->description }}
                    </p>
                @else
                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        Explore {{ $brand->name }} categories, latest products and complete product range available with GPT Group.
                    </p>
                @endif

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#brand-categories"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        View Categories
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Partner Enquiry
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-3">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-3xl font-black brand-gradient-text">
                            {{ $categories->total() ?? $categories->count() }}
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-500">Categories</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-3xl font-black brand-gradient-text">
                            {{ $latestProducts->count() }}
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-500">Latest Products</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-3xl font-black brand-gradient-text">GPT</p>
                        <p class="mt-1 text-sm font-bold text-slate-500">Distribution</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    @if ($brand->banner_image)
                        <img src="{{ asset('storage/' . $brand->banner_image) }}"
                            alt="{{ $brand->name }}"
                            class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]">
                    @elseif ($brand->logo)
                        <div class="grid h-[330px] place-items-center rounded-[2.2rem] bg-gradient-to-br from-white to-blue-50 p-10 sm:h-[430px] lg:h-[500px]">
                            <img src="{{ asset('storage/' . $brand->logo) }}"
                                alt="{{ $brand->name }}"
                                class="max-h-full w-full object-contain">
                        </div>
                    @else
                        <div class="grid h-[330px] place-items-center rounded-[2.2rem] bg-gradient-to-br from-blue-50 to-cyan-50 sm:h-[430px] lg:h-[500px]">
                            <span class="text-8xl font-black text-blue-700">
                                {{ strtoupper(substr($brand->name, 0, 1)) }}
                            </span>
                        </div>
                    @endif

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            {{ $brand->name }} Product Ecosystem
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Categories, products, retail support and B2B distribution under one brand portfolio.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- BRAND CATEGORIES --}}
<section id="brand-categories" class="brand-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Categories
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $brand->name }} Categories
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Browse all active categories under {{ $brand->name }} and explore products by category.
                </p>
            </div>

            <a href="{{ route('brands') }}"
                class="inline-flex w-fit rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                Browse More Brands
            </a>
        </div>

        @if ($categories->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($categories as $category)
                    <a href="{{ route('brands.categories.show', [$brand->slug, $category->slug]) }}"
                        class="group brand-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">

                        <div class="h-56 bg-gradient-to-br from-white to-blue-50 p-5">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}"
                                    alt="{{ $category->name }}"
                                    class="h-full w-full rounded-[1.5rem] object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-gradient-to-br from-blue-50 to-cyan-50">
                                    <span class="text-5xl font-black text-blue-700">
                                        {{ strtoupper(substr($category->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-7">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-2xl font-black text-slate-950">
                                        {{ $category->name }}
                                    </h3>

                                    @if ($category->description)
                                        <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                            {{ $category->description }}
                                        </p>
                                    @else
                                        <p class="mt-2 text-sm leading-6 text-slate-600">
                                            View all products available in this category.
                                        </p>
                                    @endif
                                </div>

                                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            <div class="mt-5 flex flex-wrap gap-2">
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                    {{ $category->products_count ?? 0 }} Products
                                </span>

                                <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">
                                    {{ $brand->name }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $categories->links() }}
            </div>
        @else
            <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center shadow-sm">
                <h2 class="text-2xl font-black text-slate-950">
                    No categories found for this brand.
                </h2>
                <p class="mt-3 text-slate-600">
                    Please add active categories from admin panel.
                </p>
            </div>
        @endif

    </div>
</section>


{{-- LATEST PRODUCTS --}}
@if ($latestProducts->count())
    <section class="brand-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        Products
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        Latest {{ $brand->name }} Products
                    </h2>

                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        Latest products from {{ $brand->name }} for dealers, retailers and customer channels.
                    </p>
                </div>

                <a href="{{ route('contact') }}"
                    class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                    Product Enquiry
                </a>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($latestProducts as $product)
                    <a href="{{ route('product.detail', $product->slug) }}"
                        class="group brand-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">

                        <div class="relative h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if ($product->badge)
                                <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="h-full w-full object-contain transition duration-500 group-hover:scale-110">
                            @else
                                <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-white text-slate-400">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-xl font-black text-slate-950">
                                        {{ $product->name }}
                                    </h3>

                                    @if ($product->category)
                                        <p class="mt-2 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                            {{ $product->category->name }}
                                        </p>
                                    @endif

                                    @if ($product->short_description)
                                        <p class="mt-3 text-sm leading-6 text-slate-500 line-clamp-2">
                                            {{ $product->short_description }}
                                        </p>
                                    @endif
                                </div>

                                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-slate-100 text-xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
@endif


{{-- BRAND SUPPORT --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Brand Support
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Retail, dealer and B2B support for {{ $brand->name }}.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group supports product availability, retail visibility, category movement and partner growth through a structured distribution model.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-lg font-black text-white">
                            01
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Category Planning</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Brand-wise categories and product positioning for retail channels.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-lg font-black text-white">
                            02
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Partner Supply</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Dealer, wholesale and B2B supply support for active products.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-lg font-black text-white">
                            03
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Launch Visibility</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            New launch placement, product campaigns and customer-facing visibility.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-lg font-black text-white">
                            04
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Service Support</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Customer support, product information and channel coordination.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-blue-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=85"
                        alt="Brand Support">

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            Clear product movement
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            From category planning to dealer support, every step is built for better execution.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- CTA --}}
<section class="brand-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Partner With GPT Group
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Need {{ $brand->name }} products or partnership support?
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with GPT Group for product distribution, dealer supply, retail outlet support and B2B enquiries.
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