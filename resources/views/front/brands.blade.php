@extends('front_pages.front_components.main')

@section('content')

{{-- BRANDS HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Group Brands"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                GPT Group Brands
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Leading Tech
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Brands & Products
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                GPT Group provides a strong product ecosystem covering smartphones, tablets, accessories, gadgets, display products and security solutions for Oman and GCC markets.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#brand-portfolio" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    View Brands
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Partner Enquiry
                </a>
            </div>
        </div>
    </div>
</section>


{{-- QUICK STATS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Android</p>
                <p class="mt-2 font-bold text-slate-700">Brand Ecosystem</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Samsung, Nokia, Vivo, Xiaomi, Huawei and more.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Apple</p>
                <p class="mt-2 font-bold text-slate-700">Premium Devices</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">iPhone, iPad and MacBook product categories.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">B2B</p>
                <p class="mt-2 font-bold text-slate-700">Distribution</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Business supply, dealer network and retail support.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">GCC</p>
                <p class="mt-2 font-bold text-slate-700">Market Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Oman, UAE, Kuwait and regional execution.</p>
            </div>
        </div>
    </div>
</section>


{{-- BRAND INTRO --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Brand Portfolio</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    One destination for modern technology products.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group is a dynamic distribution company providing diverse technology products for the digital age. The portfolio includes mobile devices, security solutions, display products, gadgets and mobile accessories.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    The group works with leading smartphone brands and supports authorized store setup, retail visibility, product distribution and after-sales service across Oman and GCC markets.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                        <h3 class="mt-5 text-xl font-black">Brand Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Channel-wise product supply, stock movement and reseller support.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                        <h3 class="mt-5 text-xl font-black">Retail Visibility</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Launch campaigns, product display and customer-facing brand presence.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img
                        class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                        alt="Smartphone brands"
                    >
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=80"
                        alt="Tablet brands"
                    >
                    <div class="rounded-[2rem] bg-slate-950 p-7 text-white shadow-xl">
                        <p class="text-4xl font-black">GPT</p>
                        <p class="mt-3 text-lg font-bold">Brand Ecosystem</p>
                        <p class="mt-3 text-sm leading-6 text-slate-300">Mobiles, tablets, accessories, gadgets and security solutions.</p>
                    </div>
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80"
                        alt="Accessories"
                    >
                </div>
            </div>
        </div>
    </div>
</section>


{{-- BRAND PORTFOLIO --}}
<section id="brand-portfolio" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Our Brands</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Leading smartphone brands & providers.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group supports a diverse brand ecosystem for retail, B2B, dealer and customer channels.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-slate-950 to-blue-700 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-cyan-300">Android Brand</p>
                    <h3 class="mt-5 text-4xl font-black">Samsung</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-200">Mobiles, tablets, watches and accessories.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Premium smartphones, Galaxy tablets, wearable products and mobile accessories for retail and business customers.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-red-600 to-orange-500 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-red-100">Mobile Brand</p>
                    <h3 class="mt-5 text-4xl font-black">LAVA</h3>
                    <p class="mt-3 text-sm leading-6 text-red-50">Affordable smartphones and mobile products.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Value-focused mobile devices for daily use, retail counters and emerging customer segments.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-slate-900 to-slate-600 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-slate-300">Apple Ecosystem</p>
                    <h3 class="mt-5 text-4xl font-black">Apple</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-200">iPhone, iPad and MacBook categories.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Premium Apple ecosystem products for customers, professionals and business requirements.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-cyan-600 to-blue-600 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-cyan-100">Smart Brand</p>
                    <h3 class="mt-5 text-4xl font-black">Honor</h3>
                    <p class="mt-3 text-sm leading-6 text-cyan-50">Smartphones and retail outlet products.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Smart mobile product range available through selected retail and partner outlets.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-blue-700 to-indigo-700 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-blue-100">Android Brand</p>
                    <h3 class="mt-5 text-4xl font-black">Nokia</h3>
                    <p class="mt-3 text-sm leading-6 text-blue-50">Reliable mobile devices.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Trusted mobile products for customers looking for reliable daily-use technology.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-violet-700 to-fuchsia-600 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-violet-100">Android Brand</p>
                    <h3 class="mt-5 text-4xl font-black">Vivo</h3>
                    <p class="mt-3 text-sm leading-6 text-violet-50">Smartphones for modern users.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Smartphone range with focus on design, camera experience and performance.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-orange-500 to-yellow-400 p-7 text-slate-950">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-orange-900">Android Brand</p>
                    <h3 class="mt-5 text-4xl font-black">Xiaomi</h3>
                    <p class="mt-3 text-sm leading-6 text-orange-950">Smart devices and gadgets.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Smart products, mobile devices and gadget ecosystem for retail and B2B supply.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="h-56 bg-gradient-to-br from-red-700 to-slate-900 p-7 text-white">
                    <p class="text-sm font-black uppercase tracking-[.25em] text-red-100">Android Brand</p>
                    <h3 class="mt-5 text-4xl font-black">Huawei</h3>
                    <p class="mt-3 text-sm leading-6 text-red-50">Mobile and smart technology products.</p>
                </div>
                <div class="p-7">
                    <p class="text-sm leading-7 text-slate-600">
                        Technology products and smart devices for customer and business segments.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Enquire</a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- PRODUCT CATEGORIES --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Product Categories</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Complete tech product range.
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    GPT Group’s portfolio supports retail stores, B2B clients, dealers, corporate buyers and service channels.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Start Enquiry
            </a>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80" alt="Mobiles">
                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Mobile Devices</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Smartphones and mobile devices for retail, business and customer channels.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=80" alt="Tablets">
                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Tablets & iPads</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Tablets and iPads for education, business, entertainment and professional use.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=80" alt="Watches">
                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Smart Watches</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Wearables and lifestyle tech products for modern customers.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80" alt="Accessories">
                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Mobile Accessories</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Chargers, headphones, cables, cases, power accessories and mobile add-ons.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=900&q=80" alt="Security Solutions">
                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Security Solutions</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Security technology, surveillance-related products and business solutions.
                    </p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=900&q=80" alt="Gadgets">
                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Gadgets & Displays</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Digital gadgets, smart display products and modern technology accessories.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- PARTNER SUPPORT --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Partner Assist Programmes</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                    Helping brands and retailers grow faster.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-300">
                    GPT Group assists individuals and businesses to set up authorized store outlets in Oman, Kuwait and UAE by supporting brand standards, store setup formalities and retail execution.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Store Setup Assistance</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Authorized reseller program for brand outlet setup and requirements.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Servicing & Marketing</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Brand-based and multi-brand repair outlet network with customer support.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Demand Generation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Campaigns, promotions and product launch visibility.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Supply Chain Support</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Stock planning, distribution and partner availability support.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-blue-500/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white/10 p-5 border border-white/10 shadow-2xl">
                    <img
                        class="h-[560px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                        alt="Partner support"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-white/90 p-6 text-slate-950 backdrop-blur">
                        <p class="text-3xl font-black">Brand Growth Support</p>
                        <p class="mt-2 text-slate-600">Distribution, training, service and retail execution.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- BRAND LOGOS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Brand Ecosystem</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Trusted technology names.
                </h2>
            </div>

            <p class="max-w-xl text-lg leading-8 text-slate-600">
                Replace these text cards with official brand logos when you have approved logo assets.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Samsung</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">LAVA</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Apple</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Honor</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Nokia</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Vivo</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Xiaomi</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Huawei</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">BlackBerry</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Sony</div>
            <div class="rounded-[1.75rem] bg-slate-50 p-6 text-center text-xl font-black text-slate-800 shadow-sm">Micromax</div>
            <div class="rounded-[1.75rem] bg-slate-950 p-6 text-center text-xl font-black text-white shadow-sm">More</div>
        </div>
    </div>
</section>


{{-- ENQUIRY --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">Brand Partnership</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Want to distribute or launch your brand?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect with GPT Group for product distribution, brand launch, retail visibility, B2B supply and authorized store support.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
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

            <div class="rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Quick Enquiry</p>
                <h3 class="mt-4 text-3xl font-black">Submit brand / product enquiry</h3>

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
                            placeholder="Company / Brand"
                        >
                    </div>

                    <input
                        type="text"
                        name="contact"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Phone / Email"
                    >

                    <select
                        name="enquiry_type"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-slate-300 outline-none focus:border-cyan-300"
                    >
                        <option>Distribution Partnership</option>
                        <option>Brand Launch</option>
                        <option>B2B Supply</option>
                        <option>Retail Outlet Support</option>
                        <option>Product Enquiry</option>
                    </select>

                    <textarea
                        name="message"
                        rows="4"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-white placeholder:text-slate-400 outline-none focus:border-cyan-300"
                        placeholder="Message"
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
                    Brand questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Quick answers for retailers, dealers, B2B buyers and brand partners.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">Which brand categories does GPT Group handle?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group handles mobile devices, smartphones, tablets, accessories, gadgets, display products and security solutions.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Which smartphone brands are mentioned in GPT Group ecosystem?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Samsung, Nokia, Vivo, Xiaomi, Huawei, BlackBerry, Sony, Micromax and Apple ecosystem products are mentioned in GPT Group’s public brand content.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Does GPT Group support authorized store setup?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group assists businesses and individuals with authorized store outlet setup in Oman, Kuwait and UAE.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">How can a brand contact GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Use the enquiry form or contact GPT Group through the Contact page for distribution, retail and B2B partnership.
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
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Build With GPT Group</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Get the competitive advantage for your brand.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Partner with GPT Group for distribution, retail visibility, product launch support and business growth across Oman and GCC.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Contact Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection