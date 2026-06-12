@extends('front_pages.front_components.main')

@section('content')

{{-- NETWORK HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Group Network"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                GPT Group Network
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Strong Oman
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Market Coverage
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                GPT Group supports distribution, warehousing, retail partners, wholesale channels, KDR networks and B2B customers across key Oman market locations.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#coverage" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    View Coverage
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Partner Enquiry
                </a>
            </div>
        </div>
    </div>
</section>


{{-- QUICK NETWORK CARDS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Sur</p>
                <p class="mt-2 font-bold text-slate-700">Regional Coverage</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Retail and service support for Sur market.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Salalah</p>
                <p class="mt-2 font-bold text-slate-700">Southern Market</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Retail and showroom network support.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Ghala</p>
                <p class="mt-2 font-bold text-slate-700">MCT Warehouse</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Warehouse and stock movement support.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Sohar</p>
                <p class="mt-2 font-bold text-slate-700">Warehouse Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Northern market supply and fulfilment.</p>
            </div>
        </div>
    </div>
</section>


{{-- NETWORK INTRO --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Distribution Network</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Built for fast stock movement and partner success.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s market network is designed to support retail availability, wholesale movement, warehouse coordination, KDR partners and B2B supply requirements.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    The network connects product distribution with retail visibility, supply-chain planning, partner onboarding and customer service across key Oman locations.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                        <h3 class="mt-5 text-xl font-black">Warehouse Execution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Product storage, dispatch planning and faster stock availability.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                        <h3 class="mt-5 text-xl font-black">Retail Enablement</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Product knowledge, retail display and partner support.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img
                        class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="Warehouse network"
                    >
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail network"
                    >
                    <div class="rounded-[2rem] bg-slate-950 p-7 text-white shadow-xl">
                        <p class="text-4xl font-black">Oman</p>
                        <p class="mt-3 text-lg font-bold">Retail + Warehouse</p>
                        <p class="mt-3 text-sm leading-6 text-slate-300">
                            Coverage across Sur, Salalah, Muscat-Ghala and Sohar.
                        </p>
                    </div>
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=900&q=80"
                        alt="Partner support"
                    >
                </div>
            </div>
        </div>
    </div>
</section>


{{-- COVERAGE LOCATIONS --}}
<section id="coverage" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Coverage Points</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Market coverage across key Oman locations.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group supports city-wise distribution, partner retail counters and warehouse-backed supply.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="group rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">S</div>
                <h3 class="mt-6 text-2xl font-black">Sur Coverage</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Regional market support for retail customers, service requirements and product movement.
                </p>
            </div>

            <div class="group rounded-[2rem] bg-slate-950 p-8 text-white hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">SA</div>
                <h3 class="mt-6 text-2xl font-black">Salalah Coverage</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Southern Oman retail support, showroom visibility and partner supply coordination.
                </p>
            </div>

            <div class="group rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">M</div>
                <h3 class="mt-6 text-2xl font-black">MCT-Ghala Warehouse</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Muscat-Ghala warehouse support for dispatch, availability and channel fulfilment.
                </p>
            </div>

            <div class="group rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">SO</div>
                <h3 class="mt-6 text-2xl font-black">Sohar Warehouse</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Northern Oman supply support, stock planning and regional partner fulfilment.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- CHANNELS --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Channel Network</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Retail, wholesale, KDR and B2B channels.
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    GPT Group connects product availability with the right sales channels to support market growth.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Become Partner
            </a>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">R</div>
                <h3 class="mt-6 text-2xl font-black">Retail IRs</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Customer-facing counters for direct product availability and city-level reach.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">W</div>
                <h3 class="mt-6 text-2xl font-black">Wholesale</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Bulk movement, dealer supply and regional stock distribution support.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">K</div>
                <h3 class="mt-6 text-2xl font-black">KDR Network</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Key dealer retailers for premium category growth and consistent availability.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">B</div>
                <h3 class="mt-6 text-2xl font-black">B2B Supply</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Corporate, institutional, wholesale and business product supply support.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- OPERATING MODEL --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Operating Model</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                    End-to-end network support from stock arrival to retail sell-through.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-300">
                    GPT Group’s network helps brands and partners manage product flow, launch execution, retail visibility and partner confidence.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Stock Planning</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Better availability through warehouse coordination and dispatch support.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Partner Onboarding</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Retailers, dealers and B2B partners supported with channel-ready execution.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Retail Visibility</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Campaigns, product display and in-store product availability.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Demand Generation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Promotions, launch support and partner communication.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-blue-500/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white/10 p-5 border border-white/10 shadow-2xl">
                    <img
                        class="h-[560px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
                        alt="Warehouse operations"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-white/90 p-6 text-slate-950 backdrop-blur">
                        <p class="text-3xl font-black">Fast. Reliable. Partner-focused.</p>
                        <p class="mt-2 text-slate-600">Distribution and supply-chain support for growing markets.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- MAP STYLE SECTION --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 items-stretch">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Network Map</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight text-slate-950">
                    Key support points in Oman.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Use this section to show your exact map locations or Google Map embeds for warehouse and outlet points.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Muscat / Ghala</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Warehouse and main supply point.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Sohar / Sur / Salalah</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Regional market and partner support.</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 overflow-hidden rounded-[2.5rem] bg-slate-100 shadow-xl border border-slate-100">
                <iframe
                    class="h-[480px] w-full"
                    src="https://www.google.com/maps?q=Oman&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>


{{-- NETWORK ENQUIRY --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">Network Partnership</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Want to join GPT Group’s distribution network?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect for retail partnership, wholesale supply, KDR network, B2B distribution and regional product availability.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Retail Partners</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Customer-facing sales and product visibility.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">B2B Supply</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Corporate, institutional and bulk product needs.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Quick Enquiry</p>
                <h3 class="mt-4 text-3xl font-black">Submit network enquiry</h3>

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
                        <option>Retail Partner</option>
                        <option>Wholesale</option>
                        <option>KDR Network</option>
                        <option>B2B Supply</option>
                        <option>Warehouse / Logistics</option>
                        <option>Brand Distribution</option>
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
                    Network questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful information for retailers, wholesale partners, KDR network and B2B buyers.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">Which locations are shown in GPT network?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Sur, Salalah, MCT-Ghala Warehouse and Sohar Warehouse are shown as major coverage and support points.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Which business channels does GPT Group support?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group supports Retail IRs, wholesale, KDR network and B2B business channels.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Can I become a GPT Group retail partner?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. Use the enquiry form to contact GPT Group for retail partner, wholesale, KDR or B2B supply opportunities.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Does GPT Group provide B2B supply?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group supports business, corporate, institutional, wholesale and dealer supply needs.
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
                        Expand through a stronger distribution network.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Partner with GPT Group for retail coverage, warehouse-backed distribution, wholesale supply and B2B market growth.
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