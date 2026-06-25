@extends('front_pages.front_components.main')

@section('content')

<style>
    .group-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .group-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .group-blob {
        filter: blur(10px);
        opacity: .45;
        animation: groupBlob 7s ease-in-out infinite alternate;
    }

    @keyframes groupBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .group-card-hover {
        transition: all .35s ease;
    }

    .group-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .group-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .group-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .group-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .group-input::placeholder {
        color: #94a3b8;
    }

    .group-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- GROUP COMPANIES HERO --}}
<section class="relative overflow-hidden group-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 group-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 group-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    Group Companies
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Diversified
                    <span class="mt-2 block group-gradient-text">
                        Business Verticals
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    GPT Group has grown from a modern technology distributor into a diversified business house with interests across telecom, online services, fashion retail, beauty care, hospitality and I.T. solutions.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#companies"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        Explore Verticals
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Business Enquiry
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black group-gradient-text">2016</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Founded</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black group-gradient-text">GCC</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Market</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black group-gradient-text">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Support</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black group-gradient-text">Multi</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Verticals</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group Companies"
                        class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            One Group, Multiple Growth Areas
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Telecom, online, fashion, beauty, hospitality and I.T. under a focused business vision.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- QUICK VERTICALS --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="group-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black group-gradient-text">2016</p>
                <p class="mt-2 font-bold text-slate-700">Founded</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Started as a modern-age technology distributor.</p>
            </div>

            <div class="group-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black group-gradient-text">GCC</p>
                <p class="mt-2 font-bold text-slate-700">Market Focus</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Oman and GCC region business presence.</p>
            </div>

            <div class="group-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black group-gradient-text">B2B</p>
                <p class="mt-2 font-bold text-slate-700">Business Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Distribution, supply, retail and partner programs.</p>
            </div>

            <div class="group-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black group-gradient-text">Multi</p>
                <p class="mt-2 font-bold text-slate-700">Business Verticals</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Telecom, online, fashion, beauty, hospitality and I.T.</p>
            </div>
        </div>
    </div>
</section>


{{-- INTRO --}}
<section class="group-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    GPT Group Business House
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    One group, multiple growth-focused companies.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group began with telecom and technology distribution, specializing in mobile devices, smartphones, tablets and accessories for B2B and B2C segments.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Over time, the group expanded into online retail, fashion retail, beauty care, hospitality and I.T. services, creating a diversified platform for customers, partners and businesses.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">01</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Technology Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Mobile devices, tablets, accessories, gadgets and business supply.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">02</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Diversified Expansion</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
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

                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                        <p class="text-4xl font-black group-gradient-text">GPT</p>
                        <p class="mt-3 text-lg font-bold text-slate-950">Business Group</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">
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

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                Business Verticals
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                GPT Group companies and focus areas.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                A modern business portfolio built around distribution, customer service, retail experience and digital growth.
            </p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">

            <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                        alt="Telecom Distribution"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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

            <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=80"
                        alt="Online Services"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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

            <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=900&q=80"
                        alt="Beauty Care"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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

            <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=900&q=80"
                        alt="Fashion Retail"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-slate-800 px-4 py-2 text-xs font-black text-white">Retail</span>
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

            <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=900&q=80"
                        alt="IT Solutions"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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

            <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=900&q=80"
                        alt="Hospitality"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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
<section class="group-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div class="relative order-2 lg:order-1">
                <div class="absolute -inset-5 rounded-full bg-blue-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img
                        class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT Group Business Model"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            Built for scalable growth
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Distribution, service, retail and digital expansion.
                        </p>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Operating Strength
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    A diversified model powered by distribution excellence.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s core strength lies in market understanding, distribution capability, retail execution, product knowledge and customer-centric operations.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Supply Chain</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Efficient product movement and availability support.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Partner Network</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Retailers, dealers, B2B clients and business partners.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Digital Capability</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Online services and technology-led operations.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Customer Experience</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Service standards across retail, beauty, hospitality and tech.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- PRINCIPLES --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Group Principles
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Quality, trust and future-ready business growth.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group is aligned with innovation, quality, sustainable growth and a customer-centric approach across all verticals.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Innovation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Bringing modern solutions to telecom, online, retail and I.T. operations.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Service Excellence</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Customer-focused execution across every group vertical.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Local Growth</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Supporting Oman and GCC business ecosystem development.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Partnership</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Long-term relationships with brands, retailers and customers.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img
                        class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80"
                        alt="Group Principles"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            Future-ready group
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Diversified verticals with one growth vision.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ENQUIRY --}}
<section class="group-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Group Enquiry
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Want to collaborate with GPT Group?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect with GPT Group for telecom distribution, online services, fashion retail, beauty care, hospitality, I.T. solutions or business partnership.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
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

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Quick Enquiry
                </p>

                <h3 class="mt-4 text-3xl font-black text-slate-950">
                    Submit business enquiry
                </h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <input
                            type="text"
                            name="name"
                            class="group-input"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="company"
                            class="group-input"
                            placeholder="Company / Brand"
                        >
                    </div>

                    <input
                        type="text"
                        name="contact"
                        class="group-input"
                        placeholder="Phone / Email"
                    >

                    <select
                        name="vertical"
                        class="group-input"
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
                        class="group-input resize-none"
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
<section class="group-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    FAQs
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Group company questions.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful answers for business partners, investors, brands and customers.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm" open>
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Which sectors does GPT Group operate in?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group operates across telecom, online services / online retail, fashion retail, beauty care, hospitality and I.T. solutions.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">What was GPT Group’s starting business?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group began as a modern-age technology distributor specializing in mobile devices, smartphones, tablets and accessories.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Does GPT Group support B2B and B2C customers?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group’s telecom and distribution business supports both B2B and B2C segments.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">How can I contact GPT Group for business collaboration?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Use the enquiry form or contact GPT Group through the Contact page for partnership and group-level collaboration.
                    </p>
                </details>
            </div>
        </div>

    </div>
</section>


{{-- CTA --}}
<section class="group-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Build With GPT Group
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Partner with a diversified business house.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Work with GPT Group across technology distribution, online services, fashion retail, beauty care, hospitality and I.T. growth opportunities.
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
