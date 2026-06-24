@extends('front_pages.front_components.main')

@section('content')

{{-- PRODUCT HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=1600&q=80"
            alt="Samsung Accessories"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                    Product Category
                </div>

                <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                    Samsung
                    <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                        Accessories
                    </span>
                </h1>

                <p class="mt-7 max-w-2xl text-lg sm:text-xl leading-8 text-slate-300">
                    Covers, chargers, audio accessories and essential mobile add-ons for retail stores, B2B buyers, dealers and partner channels.
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="#stock-enquiry" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Ask For Stock
                    </a>

                    <a href="{{ route('brands') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                        All Brands
                    </a>
                </div>

                <div class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="rounded-2xl bg-white/10 p-4 border border-white/10">
                        <p class="text-2xl font-black">B2B</p>
                        <p class="mt-1 text-xs text-slate-300">Supply Ready</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-4 border border-white/10">
                        <p class="text-2xl font-black">Retail</p>
                        <p class="mt-1 text-xs text-slate-300">Counter Friendly</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-4 border border-white/10">
                        <p class="text-2xl font-black">Fast</p>
                        <p class="mt-1 text-xs text-slate-300">Stock Movement</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-4 border border-white/10">
                        <p class="text-2xl font-black">GPT</p>
                        <p class="mt-1 text-xs text-slate-300">Partner Support</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative rounded-[2.5rem] bg-white/10 p-5 border border-white/10 shadow-2xl">
                    <img
                        class="h-[520px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=1200&q=80"
                        alt="Samsung Accessories"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-slate-950/90 p-6 text-white backdrop-blur">
                        <p class="text-3xl font-black">Retail-ready accessories</p>
                        <p class="mt-2 text-slate-300">Chargers, covers, audio and mobile essentials.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.22),transparent_35%),radial-gradient(circle_at_80%_25%,rgba(37,99,235,.22),transparent_35%)]"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <p class="font-black uppercase tracking-[.3em] text-cyan-300">Products</p>

        <h1 class="mt-5 text-5xl sm:text-6xl lg:text-7xl font-black leading-tight">
            All Products
        </h1>

        <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">
            Explore latest, upcoming and normal product range.
        </p>
    </div>
</section>

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        @if($products->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($products as $product)
                    <a href="{{ route('product.detail', $product->slug) }}"
                       class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">

                        <div class="relative h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if($product->badge)
                                <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="h-full w-full object-contain transition group-hover:scale-110">
                            @else
                                <div class="grid h-full w-full place-items-center text-slate-400">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-black text-slate-950">
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
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @else
            <div class="rounded-[2rem] bg-slate-50 p-10 text-center">
                <h2 class="text-2xl font-black text-slate-950">No products found.</h2>
            </div>
        @endif

    </div>
</section>







{{-- QUICK HIGHLIGHTS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Market Demand</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    High-demand products for retail counters and mobile buyers.
                </p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Partner Support</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Promotional material, product visibility and sales support.
                </p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">03</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Supply Chain</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Stock planning, warehouse support and order coordination.
                </p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-slate-950 text-xl font-black text-white">04</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">B2B Ready</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Dealer, wholesale and business supply enquiry support.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- PRODUCT OVERVIEW --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Product Overview</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Accessories designed for everyday customer needs.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Samsung Accessories category is suitable for retail counters, mobile shops, wholesale buyers and B2B customers looking for fast-moving mobile add-ons.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    This page can be used for product banners, SKU groups, stock enquiry, partner benefits, product gallery and promotional launch support.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black">Retail Sell-through</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Counter-ready products that help increase add-on sales.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black">Stock Enquiry</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Connect with GPT Group for availability and bulk supply.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <img
                    class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                    src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=1200&q=80"
                    alt="Samsung accessory overview"
                >

                <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl">
                    <p class="text-3xl font-black">Accessory range</p>
                    <p class="mt-2 text-slate-300">Audio, chargers, covers, cables and essential add-ons.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- CATEGORY PRODUCTS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Product Range</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Category-wise accessory lineup.
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Replace these cards with actual SKUs, product images, stock status and pricing when backend inventory is connected.
                </p>
            </div>

            <a href="#stock-enquiry" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Ask Availability
            </a>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80" alt="Audio Accessories">
                <div class="p-7">
                    <span class="rounded-full bg-blue-50 px-4 py-2 text-xs font-black text-blue-700">Audio</span>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Earphones & Buds</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Audio accessories for daily use, retail sales and customer add-ons.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1615526675159-e248c3021d3f?auto=format&fit=crop&w=900&q=80" alt="Chargers">
                <div class="p-7">
                    <span class="rounded-full bg-cyan-50 px-4 py-2 text-xs font-black text-cyan-700">Power</span>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Chargers & Cables</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Essential charging products for retail counters and B2B buyers.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?auto=format&fit=crop&w=900&q=80" alt="Mobile Covers">
                <div class="p-7">
                    <span class="rounded-full bg-blue-50 px-4 py-2 text-xs font-black text-blue-700">Protection</span>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Covers & Cases</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Mobile protection products for new phone buyers and retail bundles.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1603539444875-76e7684265f6?auto=format&fit=crop&w=900&q=80" alt="Power Accessories">
                <div class="p-7">
                    <span class="rounded-full bg-slate-200 px-4 py-2 text-xs font-black text-slate-700">Essential</span>
                    <h3 class="mt-5 text-2xl font-black text-slate-950">Power Add-ons</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Power banks, adapters and other essential mobile accessories.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- SPECIFICATIONS --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="grid grid-cols-2 gap-5">
                <img class="h-64 w-full rounded-[2rem] object-cover shadow-xl"
                    src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                    alt="Mobile products"
                >
                <img class="mt-10 h-64 w-full rounded-[2rem] object-cover shadow-xl"
                    src="https://images.unsplash.com/photo-1607082350899-7e105aa886ae?auto=format&fit=crop&w=900&q=80"
                    alt="Retail products"
                >
                <img class="h-64 w-full rounded-[2rem] object-cover shadow-xl"
                    src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                    alt="Warehouse support"
                >
                <img class="mt-10 h-64 w-full rounded-[2rem] object-cover shadow-xl"
                    src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=900&q=80"
                    alt="Partner events"
                >
            </div>

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Distribution Ready</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Designed for retail sell-through.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group supports product categories with retail partner visibility, stock coordination, market support and B2B enquiry handling.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="flex gap-4 rounded-[1.5rem] bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">Model-wise listing section</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Add actual product models, SKU codes and stock status.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-[1.5rem] bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">Retail partner banner area</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Show latest offers, partner benefits and launch promotions.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-[1.5rem] bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">B2B enquiry CTA</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Collect wholesale, dealer and business supply enquiries.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-[1.5rem] bg-white p-5 shadow-sm">
                        <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-blue-50 text-blue-700 font-black">✓</div>
                        <div>
                            <h3 class="font-black text-slate-950">Promotional launch support</h3>
                            <p class="mt-1 text-sm leading-6 text-slate-500">Support retail campaigns with banners and product highlights.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- PARTNER BENEFITS --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-cyan-300">Partner Benefits</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black">
                Built for dealers, retailers and B2B buyers.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-300">
                This product category can support retail counters, wholesale supply, B2B enquiries and market launch campaigns.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-white/10 p-8 border border-white/10 hover:-translate-y-2 transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">1</div>
                <h3 class="mt-6 text-2xl font-black">Stock Planning</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Manage product availability according to retail and B2B demand.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 text-slate-950 hover:-translate-y-2 transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">2</div>
                <h3 class="mt-6 text-2xl font-black">Launch Support</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Campaigns, product display and promotional launch support.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white/10 p-8 border border-white/10 hover:-translate-y-2 transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">3</div>
                <h3 class="mt-6 text-2xl font-black">Dealer Enquiry</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Capture dealer, wholesale and reseller requirements.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white/10 p-8 border border-white/10 hover:-translate-y-2 transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">4</div>
                <h3 class="mt-6 text-2xl font-black">Retail Visibility</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Better counter display, offer banners and partner confidence.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- STOCK ENQUIRY --}}
<section id="stock-enquiry" class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">Stock Enquiry</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Need Samsung Accessories distribution support?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect with GPT Group for stock availability, bulk supply, launch support, dealer requirements and retail partner programs.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Retail Stock</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Availability for counters and showrooms.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Bulk Supply</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Dealer, wholesale and B2B orders.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Quick Enquiry</p>
                <h3 class="mt-4 text-3xl font-black">Ask for product availability</h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-4">
                        <input
                            type="text"
                            name="name"
                            class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="company"
                            class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                            placeholder="Company / Store"
                        >
                    </div>

                    <input
                        type="text"
                        name="contact"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Phone / Email"
                    >

                    <select
                        name="product_type"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-slate-300 outline-none focus:border-cyan-300"
                    >
                        <option>Samsung Accessories</option>
                        <option>Chargers & Cables</option>
                        <option>Earphones & Buds</option>
                        <option>Covers & Cases</option>
                        <option>Power Add-ons</option>
                        <option>Bulk / B2B Requirement</option>
                    </select>

                    <textarea
                        name="message"
                        rows="4"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Required quantity / models / message"
                    ></textarea>

                    <button
                        type="submit"
                        class="inline-flex justify-center rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition"
                    >
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>


{{-- FAQ --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">FAQs</p>
                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight text-slate-950">
                    Product enquiry questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful answers for retailers, dealers, wholesale partners and B2B buyers.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">Can this page show actual SKUs later?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. You can connect this layout with backend inventory and show actual product models, SKU codes, stock status and pricing.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Can dealers ask for bulk quantity?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. The enquiry form is suitable for dealer, wholesale and B2B bulk requirements.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Can offers and banners be added?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. Add promotional banners, retail partner offers and launch support sections according to active campaigns.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">How do I connect the enquiry form?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Replace the form action with your Laravel route and save enquiries in database or send email to sales team.
                    </p>
                </details>
            </div>
        </div>
    </div>
</section>


{{-- CTA --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-12 lg:p-16 text-white shadow-2xl">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Product Distribution</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Build stronger accessory sales with GPT Group.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Contact GPT Group for Samsung Accessories stock, partner programs, B2B supply and retail launch support.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#stock-enquiry" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Ask For Stock
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection