@extends('front_pages.front_components.main')

@section('content')

<style>
    .network-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .network-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .network-blob {
        filter: blur(10px);
        opacity: .45;
        animation: networkBlob 7s ease-in-out infinite alternate;
    }

    @keyframes networkBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .network-card-hover {
        transition: all .35s ease;
    }

    .network-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .network-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .network-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .network-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .network-input::placeholder {
        color: #94a3b8;
    }

    .network-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- NETWORK HERO --}}
<section class="relative overflow-hidden network-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 network-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 network-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    GPT Group Network
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Strong Oman
                    <span class="mt-2 block network-gradient-text">
                        Market Coverage
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    GPT Group supports distribution, warehousing, retail partners, wholesale channels, KDR networks and B2B customers across key Oman market locations.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#coverage"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        View Coverage
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Partner Enquiry
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black network-gradient-text">Sur</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Coverage</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black network-gradient-text">Salalah</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Market</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black network-gradient-text">Ghala</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Warehouse</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black network-gradient-text">Sohar</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Supply</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group Network"
                        class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            Retail + Warehouse Execution
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Built for fast stock movement, partner support and reliable market supply.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- QUICK NETWORK CARDS --}}

{{-- @include('front.sections.quick_facts', ['pageSlug' => 'services']) --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black network-gradient-text">Sur</p>
                <p class="mt-2 font-bold text-slate-700">Regional Coverage</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Retail and service support for Sur market.</p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black network-gradient-text">Salalah</p>
                <p class="mt-2 font-bold text-slate-700">Southern Market</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Retail and showroom network support.</p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black network-gradient-text">Ghala</p>
                <p class="mt-2 font-bold text-slate-700">MCT Warehouse</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Warehouse and stock movement support.</p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black network-gradient-text">Sohar</p>
                <p class="mt-2 font-bold text-slate-700">Warehouse Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Northern market supply and fulfilment.</p>
            </div>
        </div>
    </div>
</section>


{{-- NETWORK INTRO --}}
<section class="network-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Distribution Network
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Built for fast stock movement and partner success.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s market network is designed to support retail availability, wholesale movement, warehouse coordination, KDR partners and B2B supply requirements.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    The network connects product distribution with retail visibility, supply-chain planning, partner onboarding and customer service across key Oman locations.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">01</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Warehouse Execution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Product storage, dispatch planning and faster stock availability.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">02</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Retail Enablement</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
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

                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                        <p class="text-4xl font-black network-gradient-text">Oman</p>
                        <p class="mt-3 text-lg font-bold text-slate-950">Retail + Warehouse</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">
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

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                Coverage Points
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                Market coverage across key Oman locations.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group supports city-wise distribution, partner retail counters and warehouse-backed supply.
            </p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">S</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Sur Coverage</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Regional market support for retail customers, service requirements and product movement.
                </p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">SA</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Salalah Coverage</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Southern Oman retail support, showroom visibility and partner supply coordination.
                </p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">M</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">MCT-Ghala Warehouse</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Muscat-Ghala warehouse support for dispatch, availability and channel fulfilment.
                </p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">SO</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Sohar Warehouse</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Northern Oman supply support, stock planning and regional partner fulfilment.
                </p>
            </div>
        </div>

    </div>
</section>


{{-- CHANNELS --}}
<section class="network-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Channel Network
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Retail, wholesale, KDR and B2B channels.
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    GPT Group connects product availability with the right sales channels to support market growth.
                </p>
            </div>

            <a href="{{ route('contact') }}"
                class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                Become Partner
            </a>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">R</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Retail IRs</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Customer-facing counters for direct product availability and city-level reach.
                </p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">W</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Wholesale</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Bulk movement, dealer supply and regional stock distribution support.
                </p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">K</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">KDR Network</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Key dealer retailers for premium category growth and consistent availability.
                </p>
            </div>

            <div class="network-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">B</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">B2B Supply</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Corporate, institutional, wholesale and business product supply support.
                </p>
            </div>
        </div>

    </div>
</section>


{{-- OPERATING MODEL --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Operating Model
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    End-to-end network support from stock arrival to retail sell-through.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s network helps brands and partners manage product flow, launch execution, retail visibility and partner confidence.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Stock Planning</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Better availability through warehouse coordination and dispatch support.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Partner Onboarding</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Retailers, dealers and B2B partners supported with channel-ready execution.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Retail Visibility</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Campaigns, product display and in-store product availability.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Demand Generation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Promotions, launch support and partner communication.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-blue-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img
                        class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
                        alt="Warehouse operations"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">Fast. Reliable. Partner-focused.</p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Distribution and supply-chain support for growing markets.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- MAP STYLE SECTION --}}
<section class="network-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-8 lg:grid-cols-3 lg:items-stretch">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Network Map
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Key support points in Oman.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Use this section to show your exact map locations or Google Map embeds for warehouse and outlet points.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Muscat / Ghala</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Warehouse and main supply point.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Sohar / Sur / Salalah</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Regional market and partner support.</p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-3 shadow-xl lg:col-span-2">
                <iframe
                    class="h-[480px] w-full rounded-[2rem]"
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
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Network Partnership
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Want to join GPT Group’s distribution network?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect for retail partnership, wholesale supply, KDR network, B2B distribution and regional product availability.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
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

            <div class="rounded-[2.5rem] border border-slate-100 bg-slate-50 p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Quick Enquiry
                </p>

                <h3 class="mt-4 text-3xl font-black text-slate-950">
                    Submit network enquiry
                </h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <input
                            type="text"
                            name="name"
                            class="network-input"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="company"
                            class="network-input"
                            placeholder="Company / Brand"
                        >
                    </div>

                    <input
                        type="text"
                        name="contact"
                        class="network-input"
                        placeholder="Phone / Email"
                    >

                    <select
                        name="enquiry_type"
                        class="network-input"
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
                        class="network-input resize-none"
                        placeholder="Message"
                    ></textarea>

                    <button
                        type="submit"
                        class="inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Submit Enquiry
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>


{{-- FAQ --}}
<section class="network-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    FAQs
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Network questions.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful information for retailers, wholesale partners, KDR network and B2B buyers.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm" open>
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Which locations are shown in GPT network?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Sur, Salalah, MCT-Ghala Warehouse and Sohar Warehouse are shown as major coverage and support points.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Which business channels does GPT Group support?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group supports Retail IRs, wholesale, KDR network and B2B business channels.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Can I become a GPT Group retail partner?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. Use the enquiry form to contact GPT Group for retail partner, wholesale, KDR or B2B supply opportunities.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Does GPT Group provide B2B supply?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group supports business, corporate, institutional, wholesale and dealer supply needs.
                    </p>
                </details>
            </div>
        </div>

    </div>
</section>


{{-- CTA --}}
<section class="network-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Build With GPT Group
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Expand through a stronger distribution network.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Partner with GPT Group for retail coverage, warehouse-backed distribution, wholesale supply and B2B market growth.
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
