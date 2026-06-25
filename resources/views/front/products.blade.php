@extends('front_pages.front_components.main')

@section('content')

<style>
    .products-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .products-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .products-blob {
        filter: blur(10px);
        opacity: .45;
        animation: productsBlob 7s ease-in-out infinite alternate;
    }

    @keyframes productsBlob {
        from { transform: translateY(0) scale(1); }
        to { transform: translateY(18px) scale(1.06); }
    }

    .products-card-hover {
        transition: all .35s ease;
    }

    .products-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .products-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .products-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }
</style>

{{-- PRODUCTS HERO --}}
<section class="relative overflow-hidden products-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 products-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 products-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    GPT Product Portfolio
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Explore All
                    <span class="mt-2 block products-gradient-text">Products</span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    Browse latest, upcoming and regular products across GPT Group's brand ecosystem for retail, dealer, B2B and customer channels.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#product-list" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        View Products
                    </a>

                    <a href="{{ route('brands') }}" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Browse Brands
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black products-gradient-text">Latest</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">New Launches</p>
                    </div>
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black products-gradient-text">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Supply</p>
                    </div>
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black products-gradient-text">Retail</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Ready</p>
                    </div>
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black products-gradient-text">GPT</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Support</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                         src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=85"
                         alt="GPT Products">

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            Products for modern distribution
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Smartphones, tablets, accessories, gadgets and technology products for growing markets.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- QUICK HIGHLIGHTS --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Market Demand</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">High-demand products for retail counters and mobile buyers.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Partner Support</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Promotional material, product visibility and sales support.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">03</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Supply Chain</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Stock planning, warehouse support and order coordination.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">04</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">B2B Ready</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Dealer, wholesale and business supply enquiry support.</p>
            </div>
        </div>
    </div>
</section>

{{-- PRODUCT LIST --}}
<section id="product-list" class="products-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Products</p>
                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    All Products
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Explore complete product range with brand, category and product details.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                Product Enquiry
            </a>
        </div>

        @if($products->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($products as $product)
                    <a href="{{ route('product.detail', $product->slug) }}"
                       class="group products-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">

                        <div class="relative h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if($product->badge)
                                <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white shadow-lg shadow-blue-500/20">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if($product->product_type)
                                <span class="absolute right-5 top-5 rounded-full bg-white px-4 py-2 text-xs font-black text-blue-700 shadow ring-1 ring-slate-100">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            @endif

                            @if($product->image)
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

                                    @if($product->brand)
                                        <p class="mt-2 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                            {{ $product->brand->name }}
                                        </p>
                                    @endif

                                    @if($product->short_description)
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
                                @if($product->category)
                                    <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-black text-cyan-700">
                                        {{ $product->category->name }}
                                    </span>
                                @endif
                                @if($product->brand)
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-700">
                                        {{ $product->brand->name }}
                                    </span>
                                @endif
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
                <h2 class="text-2xl font-black text-slate-950">No products found.</h2>
                <p class="mt-3 text-slate-600">Please add active products from admin panel.</p>
            </div>
        @endif

    </div>
</section>

{{-- PRODUCT SUPPORT --}}
<section class="products-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Distribution Ready</p>
                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Products built for retail sell-through.
                </h2>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group supports products with retail partner visibility, stock coordination, market support and B2B enquiry handling.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="flex gap-4 rounded-[1.5rem] border border-slate-100 bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 font-black text-blue-700">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">Model-wise listing</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Show actual models, SKU codes and stock status.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-[1.5rem] border border-slate-100 bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 font-black text-blue-700">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">Retail partner banner area</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Show offers, partner benefits and launch promotions.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-[1.5rem] border border-slate-100 bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 font-black text-blue-700">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">B2B enquiry CTA</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Collect wholesale, dealer and business supply enquiries.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>
                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                         src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=85"
                         alt="Product Distribution">
                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">Stock and partner support</p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">Product movement, dealer supply and market execution under one system.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STOCK ENQUIRY --}}
<section id="stock-enquiry" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">Stock Enquiry</p>
                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Need product distribution support?
                </h2>
                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect with GPT Group for stock availability, bulk supply, launch support, dealer requirements and retail partner programs.
                </p>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-slate-50 p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Quick Enquiry</p>
                <h3 class="mt-4 text-3xl font-black text-slate-950">Ask for product availability</h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2">
                        <input type="text" name="name" class="rounded-2xl border border-slate-200 bg-white px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-500" placeholder="Full Name">
                        <input type="text" name="company" class="rounded-2xl border border-slate-200 bg-white px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-500" placeholder="Company / Store">
                    </div>

                    <input type="text" name="contact" class="rounded-2xl border border-slate-200 bg-white px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-500" placeholder="Phone / Email">

                    <textarea name="message" rows="4" class="rounded-2xl border border-slate-200 bg-white px-5 py-4 text-slate-950 placeholder:text-slate-400 outline-none focus:border-blue-500" placeholder="Required quantity / models / message"></textarea>

                    <button type="submit" class="inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="products-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">FAQs</p>
                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Product enquiry questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful answers for retailers, dealers, wholesale partners and B2B buyers.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6" open>
                    <summary class="cursor-pointer text-lg font-black">Can this page show actual SKUs?</summary>
                    <p class="mt-3 leading-7 text-slate-600">Yes. You can connect this layout with backend inventory and show product models, SKU codes, stock status and pricing.</p>
                </details>
                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                    <summary class="cursor-pointer text-lg font-black">Can dealers ask for bulk quantity?</summary>
                    <p class="mt-3 leading-7 text-slate-600">Yes. The enquiry form is suitable for dealer, wholesale and B2B bulk requirements.</p>
                </details>
                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                    <summary class="cursor-pointer text-lg font-black">Can offers and banners be added?</summary>
                    <p class="mt-3 leading-7 text-slate-600">Yes. Add promotional banners, retail partner offers and launch support sections according to active campaigns.</p>
                </details>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="products-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Product Distribution</p>
                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Build stronger product sales with GPT Group.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Contact GPT Group for stock, partner programs, B2B supply and retail launch support.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#stock-enquiry" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Ask For Stock
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
