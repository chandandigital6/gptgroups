@extends('front_pages.front_components.main')

@section('content')

<style>
    .category-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .category-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .category-blob {
        filter: blur(10px);
        opacity: .45;
        animation: categoryBlob 7s ease-in-out infinite alternate;
    }

    @keyframes categoryBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .category-card-hover {
        transition: all .35s ease;
    }

    .category-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .category-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .category-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }
</style>


{{-- CATEGORY HERO --}}
<section class="relative overflow-hidden category-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 category-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 category-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <a href="{{ route('brands.show', $brand->slug) }}"
                    class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black uppercase tracking-[.20em] text-blue-700 shadow-sm transition hover:-translate-y-1 hover:bg-white">
                    ← {{ $brand->name }} Categories
                </a>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    {{ $category->name }}
                    <span class="mt-2 block category-gradient-text">
                        Products
                    </span>
                </h1>

                @if ($category->description)
                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        {{ $category->description }}
                    </p>
                @else
                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        Explore {{ $category->name }} products from {{ $brand->name }} with GPT Group’s retail, dealer and B2B support.
                    </p>
                @endif

                <div class="mt-8 flex flex-wrap gap-3">
                    <span class="rounded-full border border-blue-100 bg-white px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                        {{ $brand->name }}
                    </span>

                    <span class="rounded-full bg-blue-600 px-5 py-2 text-sm font-black text-white shadow-lg shadow-blue-500/20">
                        {{ $products->total() }} Products
                    </span>

                    <span class="rounded-full border border-cyan-100 bg-cyan-50 px-5 py-2 text-sm font-black text-cyan-700">
                        GPT Distribution
                    </span>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-3">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-3xl font-black category-gradient-text">
                            {{ $products->total() }}
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-500">Products</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-3xl font-black category-gradient-text">
                            {{ $brand->name }}
                        </p>
                        <p class="mt-1 text-sm font-bold text-slate-500">Brand</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-3xl font-black category-gradient-text">B2B</p>
                        <p class="mt-1 text-sm font-bold text-slate-500">Support</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}"
                            alt="{{ $category->name }}"
                            class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]">
                    @else
                        <div class="grid h-[330px] place-items-center rounded-[2.2rem] bg-gradient-to-br from-blue-50 to-cyan-50 sm:h-[430px] lg:h-[500px]">
                            <span class="text-8xl font-black text-blue-700">
                                {{ strtoupper(substr($category->name, 0, 1)) }}
                            </span>
                        </div>
                    @endif

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            {{ $category->name }} Product Range
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Browse products, compare categories and connect for dealer or B2B enquiry.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- PRODUCTS --}}
<section class="category-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Products
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $category->name }} Products
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Active products listed under {{ $category->name }} from {{ $brand->name }}.
                </p>
            </div>

            <a href="{{ route('brands.show', $brand->slug) }}"
                class="inline-flex w-fit rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                More Categories
            </a>
        </div>

        @if ($products->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($products as $product)
                    <a href="{{ route('product.detail', $product->slug) }}"
                        class="group category-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">

                        <div class="relative h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if ($product->badge)
                                <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white shadow-lg shadow-blue-500/20">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if ($product->product_type)
                                <span class="absolute right-5 top-5 rounded-full bg-white px-4 py-2 text-xs font-black text-blue-700 shadow ring-1 ring-slate-100">
                                    {{ ucfirst($product->product_type) }}
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
                                    <h3 class="text-xl font-black leading-tight text-slate-950">
                                        {{ $product->name }}
                                    </h3>

                                    @if ($product->short_description)
                                        <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                            {{ $product->short_description }}
                                        </p>
                                    @else
                                        <p class="mt-2 text-sm leading-6 text-slate-600">
                                            View product details and enquiry information.
                                        </p>
                                    @endif
                                </div>

                                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-slate-100 text-xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            <div class="mt-5 flex flex-wrap gap-2">
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                    {{ $brand->name }}
                                </span>

                                <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">
                                    {{ $category->name }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @else
            <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center shadow-sm">
                <h2 class="text-2xl font-black text-slate-950">
                    No products found in this category.
                </h2>

                <p class="mt-3 text-slate-600">
                    Please add active products from admin panel.
                </p>
            </div>
        @endif

    </div>
</section>


{{-- OTHER CATEGORIES --}}
@if ($otherCategories->count())
    <section class="category-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        Other Categories
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        More from {{ $brand->name }}
                    </h2>

                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        Explore other categories available under {{ $brand->name }}.
                    </p>
                </div>

                <a href="{{ route('brands.show', $brand->slug) }}"
                    class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                    View All Categories
                </a>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($otherCategories as $item)
                    <a href="{{ route('brands.categories.show', [$brand->slug, $item->slug]) }}"
                        class="group category-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white p-6 shadow-sm">

                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-lg font-black text-blue-700">
                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                </div>

                                <h3 class="mt-5 text-2xl font-black text-slate-950">
                                    {{ $item->name }}
                                </h3>

                                @if ($item->description)
                                    <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                        {{ $item->description }}
                                    </p>
                                @else
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        Browse products available in this category.
                                    </p>
                                @endif
                            </div>

                            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                →
                            </span>
                        </div>

                        <div class="mt-5 flex flex-wrap gap-2">
                            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                {{ $item->products_count ?? 0 }} Products
                            </span>

                            <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">
                                {{ $brand->name }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif


{{-- CATEGORY SUPPORT --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Product Support
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Dealer and B2B support for {{ $category->name }}.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group supports category-wise product availability, retail visibility, stock movement and dealer supply.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-lg font-black text-white">
                            01
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Product Availability</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Category-wise products for dealer and retail channels.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-lg font-black text-white">
                            02
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Retail Movement</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Display support, product positioning and sales enablement.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-lg font-black text-white">
                            03
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Bulk Enquiry</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            B2B and wholesale supply support for selected products.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-lg font-black text-white">
                            04
                        </div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Channel Support</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Partner coordination, category planning and launch support.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=85"
                        alt="Product Support">

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            Category-wise growth support
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Products, dealers, retailers and B2B buyers connected through clean distribution execution.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- CTA --}}
<section class="category-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Product Enquiry
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Need {{ $category->name }} products?
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with GPT Group for category-wise product enquiry, dealer supply, retail outlet support and B2B partnership.
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