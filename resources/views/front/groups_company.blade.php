@extends('front_pages.front_components.main')

@section('content')

{{-- GROUP COMPANIES HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Group Companies"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                Group Companies
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Diversified
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Business Verticals
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                GPT Group has grown from a modern technology distributor into a diversified business house with interests across telecom, online services, fashion retail, beauty care, hospitality and I.T. solutions.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#companies" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    Explore Verticals
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Business Enquiry
                </a>
            </div>
        </div>
    </div>
</section>


{{-- QUICK VERTICALS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">2016</p>
                <p class="mt-2 font-bold text-slate-700">Founded</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Started as a modern-age technology distributor.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">GCC</p>
                <p class="mt-2 font-bold text-slate-700">Market Focus</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Oman and GCC region business presence.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">B2B</p>
                <p class="mt-2 font-bold text-slate-700">Business Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Distribution, supply, retail and partner programs.</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">Multi</p>
                <p class="mt-2 font-bold text-slate-700">Business Verticals</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Telecom, online, fashion, beauty, hospitality and I.T.</p>
            </div>
        </div>
    </div>
</section>


{{-- INTRO --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">GPT Group Business House</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    One group, multiple growth-focused companies.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group began with telecom and technology distribution, specializing in mobile devices, smartphones, tablets and accessories for B2B and B2C segments.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Over time, the group expanded into online retail, fashion retail, beauty care, hospitality and I.T. services, creating a diversified platform for customers, partners and businesses.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                        <h3 class="mt-5 text-xl font-black">Technology Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Mobile devices, tablets, accessories, gadgets and business supply.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                        <h3 class="mt-5 text-xl font-black">Diversified Expansion</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Online, fashion, beauty, hospitality and I.T. verticals.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img
                        class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                        alt="Technology business"
                    >
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail business"
                    >
                    <div class="rounded-[2rem] bg-slate-950 p-7 text-white shadow-xl">
                        <p class="text-4xl font-black">GPT</p>
                        <p class="mt-3 text-lg font-bold">Business Group</p>
                        <p class="mt-3 text-sm leading-6 text-slate-300">
                            Distribution, retail, online, beauty, hospitality and I.T.
                        </p>
                    </div>
                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80"
                        alt="Business team"
                    >
                </div>
            </div>
        </div>
    </div>
</section>


{{-- COMPANIES / VERTICALS --}}
<section id="companies" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Business Verticals</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                GPT Group companies and focus areas.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                A modern business portfolio built around distribution, customer service, retail experience and digital growth.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- Telecom Distribution --}}
            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                        alt="Telecom Distribution"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">Core Vertical</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Telecom Distribution</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        GPT Group’s foundation is telecom distribution, covering mobile devices, smartphones, tablets, accessories and partner supply for B2B and B2C channels.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Mobiles</span>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Tablets</span>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Accessories</span>
                    </div>
                </div>
            </div>

            {{-- Online Services --}}
            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=80"
                        alt="Online Services"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">Digital</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Online Services & E-Commerce</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Online services and retail channels help GPT Group reach digital customers, manage product visibility and support modern buying experiences.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-bold text-cyan-700">Online Retail</span>
                        <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-bold text-cyan-700">Digital Sales</span>
                    </div>
                </div>
            </div>

            {{-- Beauty Care --}}
            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=900&q=80"
                        alt="Beauty Care"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-pink-500 px-4 py-2 text-xs font-black text-white">Lifestyle</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Beauty Care</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Beauty care is part of GPT Group’s lifestyle expansion, supporting personal care, customer experience and modern retail opportunities.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <span class="rounded-full bg-pink-50 px-3 py-1 text-xs font-bold text-pink-700">Beauty</span>
                        <span class="rounded-full bg-pink-50 px-3 py-1 text-xs font-bold text-pink-700">Personal Care</span>
                    </div>
                </div>
            </div>

            {{-- Fashion Retail --}}
            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=900&q=80"
                        alt="Fashion Retail"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-slate-950 px-4 py-2 text-xs font-black text-white">Retail</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Fashion Retail</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Fashion retail strengthens the group’s lifestyle portfolio with consumer-focused products, retail merchandising and market-facing customer experience.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700">Fashion</span>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700">Retail</span>
                    </div>
                </div>
            </div>

            {{-- IT Solutions --}}
            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80"
                        alt="IT Solutions"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">Technology</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">I.T. Solutions</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        I.T. services support the group’s digital operations, business solutions, automation and technology-led service delivery.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">IT</span>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">Automation</span>
                    </div>
                </div>
            </div>

            {{-- Hospitality --}}
            <div class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=900&q=80"
                        alt="Hospitality"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">Service</span>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-black text-slate-950">Hospitality</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Hospitality reflects GPT Group’s service-led expansion, focusing on customer experience, operations and quality-driven business standards.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-bold text-cyan-700">Hospitality</span>
                        <span class="rounded-full bg-cyan-50 px-3 py-1 text-xs font-bold text-cyan-700">Service</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- BUSINESS MODEL --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img
                    class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                    src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                    alt="GPT Group Business Model"
                >

                <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl">
                    <p class="text-3xl font-black">Built for scalable growth</p>
                    <p class="mt-2 text-slate-300">Distribution, service, retail and digital expansion.</p>
                </div>
            </div>

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Operating Strength</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    A diversified model powered by distribution excellence.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s core strength lies in market understanding, distribution capability, retail execution, product knowledge and customer-centric operations.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6">
                        <h3 class="text-xl font-black">Supply Chain</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Efficient product movement and availability support.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6">
                        <h3 class="text-xl font-black">Partner Network</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Retailers, dealers, B2B clients and business partners.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6">
                        <h3 class="text-xl font-black">Digital Capability</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Online services and technology-led operations.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6">
                        <h3 class="text-xl font-black">Customer Experience</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Service standards across retail, beauty, hospitality and tech.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- PRINCIPLES --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Group Principles</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                    Quality, trust and future-ready business growth.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-300">
                    GPT Group is aligned with innovation, quality, sustainable growth and a customer-centric approach across all verticals.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Innovation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Bringing modern solutions to telecom, online, retail and I.T. operations.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Service Excellence</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Customer-focused execution across every group vertical.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Local Growth</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Supporting Oman and GCC business ecosystem development.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Partnership</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Long-term relationships with brands, retailers and customers.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-blue-500/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white/10 p-5 border border-white/10 shadow-2xl">
                    <img
                        class="h-[560px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80"
                        alt="Group Principles"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-white/90 p-6 text-slate-950 backdrop-blur">
                        <p class="text-3xl font-black">Future-ready group</p>
                        <p class="mt-2 text-slate-600">Diversified verticals with one growth vision.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ENQUIRY --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">Group Enquiry</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Want to collaborate with GPT Group?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect with GPT Group for telecom distribution, online services, fashion retail, beauty care, hospitality, I.T. solutions or business partnership.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Business Partnership</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Brand, retail, B2B and group-level collaboration.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Vertical Expansion</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Explore new opportunities with GPT Group companies.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Quick Enquiry</p>
                <h3 class="mt-4 text-3xl font-black">Submit business enquiry</h3>

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
                        name="vertical"
                        class="rounded-2xl border border-white/10 bg-white/10 px-5 py-4 text-slate-300 outline-none focus:border-cyan-300"
                    >
                        <option>Telecom Distribution</option>
                        <option>Online Services / E-Commerce</option>
                        <option>Beauty Care</option>
                        <option>Fashion Retail</option>
                        <option>I.T. Solutions</option>
                        <option>Hospitality</option>
                        <option>General Business Partnership</option>
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
                    Group company questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful answers for business partners, investors, brands and customers.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">Which sectors does GPT Group operate in?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group operates across telecom, online services / online retail, fashion retail, beauty care, hospitality and I.T. solutions.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">What was GPT Group’s starting business?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group began as a modern-age technology distributor specializing in mobile devices, smartphones, tablets and accessories.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Does GPT Group support B2B and B2C customers?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group’s telecom and distribution business supports both B2B and B2C segments.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">How can I contact GPT Group for business collaboration?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Use the enquiry form or contact GPT Group through the Contact page for partnership and group-level collaboration.
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
                        Partner with a diversified business house.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Work with GPT Group across technology distribution, online services, fashion retail, beauty care, hospitality and I.T. growth opportunities.
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