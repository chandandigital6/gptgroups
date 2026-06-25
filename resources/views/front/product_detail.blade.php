@extends('front_pages.front_components.main')

@section('content')

<style>
    .product-detail-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .product-detail-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .product-detail-blob {
        filter: blur(10px);
        opacity: .45;
        animation: productDetailBlob 7s ease-in-out infinite alternate;
    }

    @keyframes productDetailBlob {
        from { transform: translateY(0) scale(1); }
        to { transform: translateY(18px) scale(1.06); }
    }

    .product-detail-card-hover {
        transition: all .35s ease;
    }

    .product-detail-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .product-detail-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .product-detail-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }
</style>

{{-- PRODUCT HERO --}}
<section class="relative overflow-hidden product-detail-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 product-detail-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 product-detail-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid items-center gap-12 lg:grid-cols-2">

            {{-- Content --}}
            <div>
                <a href="{{ route('products') }}" class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black uppercase tracking-[.20em] text-blue-700 shadow-sm transition hover:-translate-y-1 hover:bg-white">
                    ← All Products
                </a>

                <div class="mt-6 flex flex-wrap gap-3">
                    @if($product->brand)
                        <span class="rounded-full border border-blue-100 bg-white px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                            {{ $product->brand->name }}
                        </span>
                    @endif

                    @if($product->category)
                        <span class="rounded-full border border-cyan-100 bg-cyan-50 px-5 py-2 text-sm font-black text-cyan-700">
                            {{ $product->category->name }}
                        </span>
                    @endif

                    @if($product->badge)
                        <span class="rounded-full bg-blue-600 px-5 py-2 text-sm font-black text-white shadow-lg shadow-blue-500/20">
                            {{ $product->badge }}
                        </span>
                    @endif
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    {{ $product->name }}
                    <span class="mt-2 block product-detail-gradient-text">
                        Product Details
                    </span>
                </h1>

                @if($product->short_description)
                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        {{ $product->short_description }}
                    </p>
                @else
                    <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                        View full product details, brand information, category, specifications and enquiry support.
                    </p>
                @endif

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        Enquire Now
                    </a>

                    @if($product->brand)
                        <a href="{{ route('brands.show', $product->brand->slug) }}" class="inline-flex rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                            View Brand
                        </a>
                    @else
                        <a href="{{ route('home') }}" class="inline-flex rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                            Back Home
                        </a>
                    @endif
                </div>
            </div>

            {{-- Main Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <div class="grid h-[330px] place-items-center rounded-[2.2rem] bg-gradient-to-br from-white to-blue-50 p-8 sm:h-[430px] lg:h-[500px]">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="max-h-full w-full object-contain">
                        @else
                            <span class="text-slate-400">No Image</span>
                        @endif
                    </div>

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            {{ $product->name }}
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            @if($product->brand)
                                {{ $product->brand->name }}
                            @else
                                GPT Group
                            @endif
                            @if($product->category)
                                • {{ $product->category->name }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- DETAILS --}}
<section class="product-detail-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-10 lg:grid-cols-[1fr_.8fr]">

            {{-- Description + Gallery --}}
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Product Details</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
                    Complete Information
                </h2>

                @if($product->description)
                    <div class="mt-6 rounded-[2rem] border border-slate-100 bg-white p-7 text-lg leading-8 text-slate-600 shadow-sm">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                @else
                    <div class="mt-6 rounded-[2rem] border border-slate-100 bg-slate-50 p-7 text-lg leading-8 text-slate-600 shadow-sm">
                        Product description is not available yet. Add full details from the admin panel.
                    </div>
                @endif

                @if(is_array($product->gallery) && count($product->gallery))
                    <div class="mt-10">
                        <h3 class="text-3xl font-black text-slate-950">
                            Product Gallery
                        </h3>

                        <div class="mt-6 grid gap-5 sm:grid-cols-2">
                            @foreach($product->gallery as $galleryImage)
                                <div class="rounded-[2rem] border border-slate-100 bg-white p-5 shadow-sm">
                                    <img src="{{ asset('storage/' . $galleryImage) }}"
                                        alt="{{ $product->name }}"
                                        class="h-72 w-full object-contain">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Info Box --}}
            <aside class="h-fit rounded-[2.5rem] border border-slate-100 bg-slate-50 p-7 shadow-sm">
                <h3 class="text-2xl font-black text-slate-950">
                    Product Information
                </h3>

                <div class="mt-6 grid gap-3">
                    @if($product->brand)
                        <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                            <span class="font-bold text-slate-500">Brand</span>
                            <span class="text-right font-black text-slate-950">{{ $product->brand->name }}</span>
                        </div>
                    @endif

                    @if($product->category)
                        <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                            <span class="font-bold text-slate-500">Category</span>
                            <span class="text-right font-black text-slate-950">{{ $product->category->name }}</span>
                        </div>
                    @endif

                    @if($product->product_type)
                        <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                            <span class="font-bold text-slate-500">Type</span>
                            <span class="text-right font-black text-slate-950">{{ ucfirst($product->product_type) }}</span>
                        </div>
                    @endif

                    @if($product->model_no)
                        <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                            <span class="font-bold text-slate-500">Model No</span>
                            <span class="text-right font-black text-slate-950">{{ $product->model_no }}</span>
                        </div>
                    @endif

                    @if($product->sku)
                        <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                            <span class="font-bold text-slate-500">SKU</span>
                            <span class="text-right font-black text-slate-950">{{ $product->sku }}</span>
                        </div>
                    @endif

                    @if($product->launch_date)
                        <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                            <span class="font-bold text-slate-500">Launch Date</span>
                            <span class="text-right font-black text-slate-950">{{ $product->launch_date->format('d M Y') }}</span>
                        </div>
                    @endif
                </div>

                @if(is_array($product->tags) && count($product->tags))
                    <div class="mt-7">
                        <h4 class="font-black text-slate-950">Tags</h4>
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach($product->tags as $tag)
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(is_array($product->specifications) && count($product->specifications))
                    <div class="mt-8">
                        <h4 class="font-black text-slate-950">Specifications</h4>

                        <div class="mt-4 grid gap-3">
                            @foreach($product->specifications as $key => $value)
                                @if($value !== null && $value !== '')
                                    <div class="flex justify-between gap-4 rounded-2xl bg-white p-4 shadow-sm">
                                        <span class="font-bold text-slate-500">{{ $key }}</span>
                                        <span class="text-right font-black text-slate-950">{{ $value }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </aside>

        </div>
    </div>
</section>

{{-- PRODUCT SUPPORT --}}
<section class="product-detail-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Distribution Support</p>
                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Retail and B2B support for this product.
                </h2>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group supports product availability, dealer supply, launch visibility and product movement through its distribution model.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-lg font-black text-white">01</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Stock Enquiry</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Ask for availability, quantity and model-wise supply.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-lg font-black text-white">02</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Dealer Supply</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Retail, wholesale and B2B supply channel support.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>
                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[520px]"
                         src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=85"
                         alt="Product Support">
                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">Clear product movement</p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">From enquiry to dealer supply, this product can be positioned for fast retail movement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- RELATED PRODUCTS --}}
@if($relatedProducts->count() > 0)
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Related</p>
                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        Related Products
                    </h2>
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        Products from the same brand or category.
                    </p>
                </div>

                <a href="{{ route('products') }}" class="inline-flex w-fit rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                    View All Products
                </a>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($relatedProducts as $item)
                    <a href="{{ route('product.detail', $item->slug) }}"
                       class="group product-detail-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">

                        <div class="relative h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                    class="h-full w-full object-contain transition duration-500 group-hover:scale-110">
                            @else
                                <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-white text-slate-400">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-black leading-tight text-slate-950">
                                {{ $item->name }}
                            </h3>

                            @if($item->short_description)
                                <p class="mt-2 text-sm leading-6 text-slate-500 line-clamp-2">
                                    {{ $item->short_description }}
                                </p>
                            @endif

                            <div class="mt-5 flex flex-wrap gap-2">
                                @if($item->brand)
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                        {{ $item->brand->name }}
                                    </span>
                                @endif

                                @if($item->category)
                                    <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">
                                        {{ $item->category->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- CTA --}}
<section class="product-detail-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Product Enquiry</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Need {{ $product->name }}?
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with GPT Group for product distribution, stock availability, dealer supply and B2B enquiries.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Contact Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
