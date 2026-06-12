@extends('front_pages.front_components.main')

@section('content')

{{-- HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Retail Outlets"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                Retail Outlets
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Retail Presence
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Across Oman
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                GPT Group supports authorized mobile retail stores, showrooms, service centres and partner outlets with brand visibility, supply-chain execution and customer-focused retail operations.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#outlets" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    View Outlets
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Partner Enquiry
                </a>
            </div>
        </div>
    </div>
</section>


{{-- QUICK FACTS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Retail</p>
                <p class="mt-2 font-bold text-slate-700">Showrooms</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Official retail presence for customer engagement.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Oman</p>
                <p class="mt-2 font-bold text-slate-700">Market Locations</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Muscat, Ruwi, Salalah, Sur and Sohar coverage.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">B2B</p>
                <p class="mt-2 font-bold text-slate-700">Partner Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Authorized store setup and business support.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Care</p>
                <p class="mt-2 font-bold text-slate-700">Customer Service</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Product support, service and customer satisfaction.</p>
            </div>
        </div>
    </div>
</section>


{{-- CUSTOMER SATISFACTION --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Customer Satisfaction</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    We aim for professional telecom retail execution.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s vision is to become one of the most professional and respected telecom distributors in Oman and the UAE, creating value for partners and retail customers.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    The company supports retail growth through automated distribution processes, demand generation activities, product knowledge and training, efficient supply-chain management and customer service.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                        <h3 class="mt-5 text-xl font-black">Demand Generation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Promotional campaigns and market visibility for partner stores.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                        <h3 class="mt-5 text-xl font-black">Product Training</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Product knowledge and support for sales teams and retail counters.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img
                        class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail outlet"
                    >
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                        alt="Technology retail"
                    >
                    <div class="rounded-[2rem] bg-slate-950 p-7 text-white shadow-xl">
                        <p class="text-4xl font-black">GPT</p>
                        <p class="mt-3 text-lg font-bold">Retail Support</p>
                        <p class="mt-3 text-sm leading-6 text-slate-300">Store setup, visibility and market execution.</p>
                    </div>
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="Supply chain"
                    >
                </div>
            </div>
        </div>
    </div>
</section>


{{-- CHANNEL SUPPORT --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Retail Channels</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Complete channel support.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT Group works with retail showrooms, wholesale partners, service centres, key dealer retailers and B2B customers.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">R</div>
                <h3 class="mt-6 text-2xl font-black">Retail IRs</h3>
                <p class="mt-3 leading-7 text-slate-600">Customer-facing retail counters for direct product availability and customer reach.</p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">W</div>
                <h3 class="mt-6 text-2xl font-black">Wholesale</h3>
                <p class="mt-3 leading-7 text-slate-300">Bulk distribution, stock movement and regional partner fulfilment support.</p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">K</div>
                <h3 class="mt-6 text-2xl font-black">KDR Network</h3>
                <p class="mt-3 leading-7 text-slate-600">Key dealer retailers for premium product categories and market visibility.</p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">B</div>
                <h3 class="mt-6 text-2xl font-black">B2B Sales</h3>
                <p class="mt-3 leading-7 text-slate-600">Corporate, institutional and business product supply requirements.</p>
            </div>
        </div>
    </div>
</section>


{{-- OUTLETS LIST --}}
<section id="outlets" class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Our Outlets</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Retail & Service Locations
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Official showrooms and partner outlets listed for customer convenience and business visibility.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Open Partner Outlet
            </a>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- Outlet 1 --}}
            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-56">
                    <img
                        src="https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Samsung Lounge"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">Official Showroom</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">GPT Samsung Lounge</h3>
                    <p class="mt-2 font-bold text-blue-700">Showroom @ Ruwi, Muscat</p>

                    <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600">
                        <p><b>Company:</b> Global Phone Technology</p>
                        <p><b>Brands:</b> Samsung, Honor, Apple</p>
                        <p><b>Contact Person:</b> Mr. Shafi</p>
                        <p><b>Contact No:</b> +968 7258 8851</p>
                    </div>

                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Contact Outlet
                    </a>
                </div>
            </div>

            {{-- Outlet 2 --}}
            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-56">
                    <img
                        src="https://images.unsplash.com/photo-1556741533-6e6a62bd8b49?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Hikvision Salalah"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">Showroom</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">GPT Hikvision Salalah</h3>
                    <p class="mt-2 font-bold text-blue-700">Showroom @ Salalah</p>

                    <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600">
                        <p><b>Outlet:</b> Globtech Mobile Showroom</p>
                        <p><b>Location:</b> Ruwi Heights, Muscat, Oman</p>
                        <p><b>Brands:</b> Samsung, Honor, Apple</p>
                        <p><b>Contact:</b> Mr. Sudhanshu Mishra | +968 9810 0827</p>
                    </div>

                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Contact Outlet
                    </a>
                </div>
            </div>

            {{-- Outlet 3 --}}
            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-56">
                    <img
                        src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Service Centre"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-slate-950 px-4 py-2 text-xs font-black text-white">Service Centre</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">GPT Service Centre</h3>
                    <p class="mt-2 font-bold text-blue-700">Service Centre @ Sur, Muscat</p>

                    <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600">
                        <p><b>Outlet:</b> Globtech Mobile Showroom</p>
                        <p><b>Address:</b> ONTC Bus Stop, Sur, Oman</p>
                        <p><b>Brands:</b> Samsung, Honor, Apple</p>
                        <p><b>Service:</b> Customer support and product assistance</p>
                    </div>

                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Contact Outlet
                    </a>
                </div>
            </div>

            {{-- Outlet 4 --}}
            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-56">
                    <img
                        src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?auto=format&fit=crop&w=900&q=80"
                        alt="Honor Phone Outlet"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">Official Showroom</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Honor Phone Outlet</h3>
                    <p class="mt-2 font-bold text-blue-700">Showroom @ Sohar</p>

                    <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600">
                        <p><b>Location:</b> Al Hambar, Sohar, Oman</p>
                        <p><b>Brands:</b> Samsung, Honor, Apple</p>
                        <p><b>Contact Person:</b> Mr. Sudhanshu Mishra</p>
                        <p><b>Contact No:</b> +968 9810 0827</p>
                    </div>

                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Contact Outlet
                    </a>
                </div>
            </div>

            {{-- Outlet 5 --}}
            <div class="group overflow-hidden rounded-[2rem] bg-white shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-56">
                    <img
                        src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=80"
                        alt="GPT Samsung Lounge Salalah"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">Showroom</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">GPT Samsung Lounge</h3>
                    <p class="mt-2 font-bold text-blue-700">Showroom @ Salalah</p>

                    <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600">
                        <p><b>Outlet:</b> Honor Phone Outlet</p>
                        <p><b>Location:</b> Salalah, Oman</p>
                        <p><b>Brands:</b> Samsung, Honor, Apple</p>
                        <p><b>Contact:</b> Mr. Sudhanshu Mishra | +968 9810 0827</p>
                    </div>

                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Contact Outlet
                    </a>
                </div>
            </div>

            {{-- Partner CTA Card --}}
            <div class="rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.25em] text-blue-100">Partner Outlet</p>
                <h3 class="mt-4 text-3xl font-black leading-tight">Want to open an authorized mobile store?</h3>
                <p class="mt-4 leading-7 text-blue-50">
                    GPT Group supports businesses and entrepreneurs with authorized mobile store setup, brand standards, retail guidance and market execution.
                </p>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950">
                    Start Enquiry
                </a>
            </div>

        </div>
    </div>
</section>


{{-- STORE SETUP SUPPORT --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img
                    class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                    src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=80"
                    alt="Retail store support"
                >

                <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl">
                    <p class="text-3xl font-black">Authorized store support</p>
                    <p class="mt-2 text-slate-300">From setup planning to retail customer experience.</p>
                </div>
            </div>

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Store Setup</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Empowering businesses to operate successful mobile stores.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group supports businesses and entrepreneurs in opening authorized mobile store outlets by leveraging industry expertise and partnerships with leading technology brands.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    With understanding of local and regional markets in Oman and the GCC, GPT Group provides end-to-end solutions that simplify the store setup process and help maintain brand standards.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Brand Standards</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Consistent showroom look, product display and customer experience.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Retail Planning</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Product range, stock planning and launch campaign support.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Supply Chain</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Efficient product movement and availability management.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Customer Experience</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Retail service approach for customer satisfaction and repeat business.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- MAP / LOCATION CTA --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-white/10 p-8 sm:p-10 border border-white/10">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Location Enquiry</p>
                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Find the right outlet or start a new partnership.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-300">
                    For showroom details, retail support, service centre enquiry or authorized store partnership, contact GPT Group.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Helpline</h3>
                        <p class="mt-2 text-sm text-slate-300">+968 2450-1533</p>
                    </div>
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <p class="mt-2 text-sm text-slate-300">info@gptgroups.com</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-white p-8 sm:p-10 text-slate-950 shadow-2xl">
                <form action="#" method="POST" class="grid gap-4">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                                placeholder="Enter full name"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone / Email</label>
                            <input
                                type="text"
                                name="contact"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                                placeholder="Enter contact detail"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Enquiry Type</label>
                        <select
                            name="enquiry_type"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                        >
                            <option>Retail Outlet Information</option>
                            <option>Open Authorized Store</option>
                            <option>Service Centre Enquiry</option>
                            <option>B2B / Wholesale Enquiry</option>
                            <option>Brand Partnership</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Preferred Location</label>
                        <input
                            type="text"
                            name="location"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            placeholder="Example: Muscat, Salalah, Sur, Sohar"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea
                            name="message"
                            rows="4"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            placeholder="Write your enquiry"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-2 inline-flex justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-8 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition"
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
                    Retail outlet questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful information for customers, retailers, dealers and entrepreneurs interested in GPT Group outlets.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">Which brands are available at GPT outlets?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Listed outlets mention Samsung, Honor and Apple availability. Product availability can vary by outlet and stock.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Can I open an authorized mobile store with GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group supports businesses and entrepreneurs with authorized mobile store setup, brand standards and retail execution.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Does GPT Group support wholesale and B2B supply?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group works with retail, wholesale, key dealer retailers and B2B customers for product supply and partner support.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">How can I contact GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can contact via helpline +968 2450-1533 or email info@gptgroups.com.
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
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Retail Partnership</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Get the competitive advantage with GPT Group.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Build authorized mobile retail stores with brand support, product supply, market expertise and customer-focused execution.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection