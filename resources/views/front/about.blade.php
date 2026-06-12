@extends('front_pages.front_components.main')

@section('content')
    {{-- ABOUT HERO --}}
    <section class="relative overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=80"
                alt="GPT Group About" class="h-full w-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_80%_10%,rgba(37,99,235,.25),transparent_30%)]">
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
            <div class="max-w-4xl">
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                    About GPT Group
                </div>

                <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                    Building Oman’s
                    <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                        Modern Tech Distribution
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                    Global Phone Technology LLC is a modern-age technology distributor focused on mobile devices,
                    smartphones, tablets, accessories and technology-led business growth across Oman and the GCC.
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Partner With Us
                    </a>
                    <a href="{{ route('brands') }}"
                        class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                        Explore Brands
                    </a>
                </div>
            </div>
        </div>
    </section>


    {{-- QUICK FACTS --}}
    <section class="bg-white -mt-10 relative z-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="rounded-[2rem] bg-white p-7 shadow-xl border border-slate-100">
                    <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        2016</p>
                    <p class="mt-2 font-bold text-slate-700">GPT Founded</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Started as a modern technology distributor in Oman.</p>
                </div>

                <div class="rounded-[2rem] bg-white p-7 shadow-xl border border-slate-100">
                    <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        20+</p>
                    <p class="mt-2 font-bold text-slate-700">Years Leadership</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Founder’s Middle East telecom industry experience.</p>
                </div>

                <div class="rounded-[2rem] bg-white p-7 shadow-xl border border-slate-100">
                    <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        GCC</p>
                    <p class="mt-2 font-bold text-slate-700">Market Coverage</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Oman, UAE, Kuwait and regional business exposure.</p>
                </div>

                <div class="rounded-[2rem] bg-white p-7 shadow-xl border border-slate-100">
                    <p class="text-4xl font-black bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">
                        B2B</p>
                    <p class="mt-2 font-bold text-slate-700">Retail Support</p>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Distribution, dealer support and business programs.</p>
                </div>
            </div>
        </div>
    </section>


    {{-- COMPANY INTRO --}}
    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Company Profile</p>

                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                        A business house built for technology, retail and growth.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group started with a vision to introduce innovation and quality in technology distribution
                        across Oman and the GCC region. The company began by focusing on mobile devices, smartphones,
                        tablets and accessories for B2B and B2C customers.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        Over time, GPT Group expanded beyond telecom into online retail, beauty care, fashion retail and
                        I.T. business, building a multi-vertical platform for modern consumers and partners.
                    </p>

                    <div class="mt-8 grid sm:grid-cols-2 gap-5">
                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                            <div
                                class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">
                                01</div>
                            <h3 class="mt-5 text-xl font-black">Technology Distribution</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Mobiles, tablets, gadgets and accessories
                                distribution.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                            <div
                                class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">
                                02</div>
                            <h3 class="mt-5 text-xl font-black">Retail Expansion</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Store support, product placement and partner
                                enablement.</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative grid grid-cols-2 gap-5">
                        <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                            src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                            alt="Technology business">
                        <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                            src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                            alt="Retail store">
                        <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                            src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                            alt="Warehouse">
                        <div class="mt-10 rounded-[2rem] bg-slate-950 p-7 text-white shadow-xl">
                            <p class="text-4xl font-black">GPT</p>
                            <p class="mt-3 text-lg font-bold">Global Phone Technology</p>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Modern technology distribution with local
                                execution.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- HISTORY TIMELINE --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Company History</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    GPT Group Journey
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    From telecom distribution to a diversified business group, GPT Group’s journey is focused on innovation,
                    customer service and partner success.
                </p>
            </div>

            <div class="mt-14 grid lg:grid-cols-4 gap-6">
                <div class="rounded-[2rem] bg-slate-50 p-7 border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black text-blue-700">2000</p>
                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-black text-blue-700">Start</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black">Telecom Journey</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Mr. Pradeep Tripathi started his telecom career with HCL India in 2000.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-slate-950 p-7 text-white">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black text-cyan-300">2002</p>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-black text-cyan-200">GCC</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black">Dubai & Oman</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        He moved to Dubai in 2002 and later to Sultanate of Oman in 2003, gaining strong regional market
                        understanding.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-slate-50 p-7 border border-slate-100">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black text-blue-700">2016</p>
                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-black text-blue-700">Founded</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black">GPT Founded</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        GPT Group was established as a modern-age technology distributor for Oman and GCC markets.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-7 text-white">
                    <div class="flex items-center justify-between">
                        <p class="text-4xl font-black">2019</p>
                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-black text-white">Expansion</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-black">New Verticals</h3>
                    <p class="mt-3 text-sm leading-7 text-blue-50">
                        GPT expanded into online, beauty care, fashion retail and I.T. business verticals.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- FOUNDER SECTION --}}
    <section class="bg-slate-950 py-16 lg:py-24 text-white overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute -inset-6 rounded-full bg-blue-500/20 blur-3xl"></div>

                    <div
                        class="relative overflow-hidden rounded-[2.5rem] bg-white/10 p-5 backdrop-blur border border-white/10">
                        <img class="h-[520px] w-full rounded-[2rem] object-cover"
                            src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}" alt="Founder GPT Group">
                        <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-slate-950/90 p-6 backdrop-blur">
                            <p class="text-2xl font-black">Mr. Pradeep Tripathi</p>
                            <p class="mt-1 text-cyan-300 font-bold">Founder | Chairman</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="font-black uppercase tracking-[.3em] text-cyan-300">Founder & Leadership</p>

                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Visionary telecom distribution leader.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-300">
                        Mr. Pradeep Tripathi is a young, dynamic and enterprising technocrat entrepreneur with 20+ years of
                        telecom experience in the Middle East. His journey started with HCL India in 2000, followed by Dubai
                        in 2002 and Oman in 2003.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-slate-300">
                        He has been instrumental in setting up distribution and retail for major brands including Samsung,
                        Apple, Nokia, Vivo, Xiaomi, Huawei, BlackBerry, Sony and Micromax across Oman, UAE and Kuwait.
                    </p>

                    <div class="mt-8 grid sm:grid-cols-3 gap-4">
                        <div class="rounded-[1.75rem] bg-white/10 p-5">
                            <p class="text-3xl font-black text-cyan-300">20+</p>
                            <p class="mt-1 text-sm text-slate-300">Years Experience</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white/10 p-5">
                            <p class="text-3xl font-black text-cyan-300">2016</p>
                            <p class="mt-1 text-sm text-slate-300">GPT Founded</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white/10 p-5">
                            <p class="text-3xl font-black text-cyan-300">GCC</p>
                            <p class="mt-1 text-sm text-slate-300">Market Reach</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- VISION MISSION VALUES --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Vision, Mission & Values</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Built on trust, quality and local growth.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    GPT Group is aligned with Oman’s economic aspirations, supporting local development, job creation and
                    sustainable growth.
                </p>
            </div>

            <div class="mt-12 grid lg:grid-cols-3 gap-6">
                <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">V
                    </div>
                    <h3 class="mt-6 text-2xl font-black">Vision</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        To lead the way in distribution, service and innovation while supporting Oman Vision 2040 and
                        sustainable regional growth.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-slate-950 p-8 text-white">
                    <div
                        class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">
                        M</div>
                    <h3 class="mt-6 text-2xl font-black">Mission</h3>
                    <p class="mt-3 leading-7 text-slate-300">
                        To connect consumers and partners with leading technology brands through efficient distribution,
                        retail support and customer-centric execution.
                    </p>
                </div>

                <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100">
                    <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">G
                    </div>
                    <h3 class="mt-6 text-2xl font-black">Growth Values</h3>
                    <p class="mt-3 leading-7 text-slate-600">
                        Integrity, resilience, creativity, operational excellence, partner confidence and continuous
                        learning.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- WHAT WE DO --}}
    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">What We Do</p>

                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                        Complete market execution for telecom and lifestyle brands.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        GPT Group supports brands with distribution, retail expansion, product launches, stock planning,
                        partner onboarding, sales training, after-sales coordination and market intelligence.
                    </p>

                    <div class="mt-8 grid sm:grid-cols-2 gap-5">
                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                            <h3 class="text-xl font-black">Brand Distribution</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Channel-wise sales, stock flow and reseller
                                support.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                            <h3 class="text-xl font-black">Retail Visibility</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">In-store display, offer banners and launch
                                activation.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                            <h3 class="text-xl font-black">B2B Supply</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Corporate, dealer, wholesale and KDR-focused
                                fulfilment.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                            <h3 class="text-xl font-black">Digital Growth</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500">E-commerce, I.T. solutions and customer
                                communication.</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <img class="h-[560px] w-full rounded-[2.5rem] object-cover shadow-2xl"
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT Group Strategy">

                    <div class="absolute -bottom-8 left-6 right-6 rounded-[2rem] bg-slate-950 p-7 text-white shadow-2xl">
                        <p class="text-3xl font-black">End-to-end support</p>
                        <p class="mt-2 text-slate-300">From product arrival to retail sell-through.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- TEAM SECTION --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">Leadership Team</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                        GPT Group Team
                    </h2>
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        The Group’s leadership and operational teams bring integrity, resilience, creativity and commitment
                        to excellence.
                    </p>
                </div>

                <a href="{{ route('contact') }}"
                    class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Contact Team
                </a>
            </div>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="h-72 bg-gradient-to-br from-blue-100 to-cyan-100 p-6">
                        <img class="h-full w-full rounded-[1.5rem] object-cover"
                            src="{{ asset('assets/img/Mr.-Tripathi.jpg') }}"
                            alt="Pradeep Tripathi">
                    </div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Pradeep Tripathi</h3>
                        <p class="mt-1 font-bold text-blue-700">Founder | Chairman</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">20+ years telecom experience in the Middle East.
                        </p>
                    </div>
                </div>

                <div
                    class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="h-72 bg-gradient-to-br from-slate-100 to-blue-100 p-6">
                        <img class="h-full w-full rounded-[1.5rem] object-cover"
                            src="{{ asset('assets/img/Mr-Adam.jpeg') }}"
                            alt="Adam Al Balshi">
                    </div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Adam Al Balshi</h3>
                        <p class="mt-1 font-bold text-blue-700">General Group Manager</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">Leadership and group operations support.</p>
                    </div>
                </div>

                <div
                    class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="h-72 bg-gradient-to-br from-cyan-100 to-slate-100 p-6">
                                        <img class="h-full w-full rounded-[1.5rem] object-cover"
                                            src="{{ asset('assets/img/Mr-Omkumar.jpeg') }}"
                            alt="OmKumar Tolani">
                    </div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black">OmKumar Tolani</h3>
                        <p class="mt-1 font-bold text-blue-700">General Manager</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">Business and operational management.</p>
                    </div>
                </div>

                <div
                    class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="h-72 bg-gradient-to-br from-blue-100 to-slate-100 p-6">
                        <img class="h-full w-full rounded-[1.5rem] object-cover"
                            src="{{ asset('assets/img/Mr-Faizan.jpeg') }}"
                            alt="Syed Irfan">
                    </div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Syed Irfan</h3>
                        <p class="mt-1 font-bold text-blue-700">General Manager</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">Retail, sales and market execution support.</p>
                    </div>
                </div>

                <div
                    class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="h-72 bg-gradient-to-br from-slate-100 to-cyan-100 p-6">
                        <img class="h-full w-full rounded-[1.5rem] object-cover"
                            src="{{ asset('assets/img/Mr-George.jpeg') }}"
                            alt="George">
                    </div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black">George</h3>
                        <p class="mt-1 font-bold text-blue-700">General Manager</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">Team coordination and business operations.</p>
                    </div>
                </div>

                <div
                    class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="h-72 bg-gradient-to-br from-cyan-100 to-blue-100 p-6">
                        <img class="h-full w-full rounded-[1.5rem] object-cover"
                            src="{{ asset('assets/img/WhatsApp-Image-2026-05-25-at-2.18.09-PM-1-e1779701452750.jpeg') }}"
                            alt="Devesh">
                    </div>
                    <div class="p-7">
                        <h3 class="text-2xl font-black">Devesh</h3>
                        <p class="mt-1 font-bold text-blue-700">General Manager</p>
                        <p class="mt-3 text-sm leading-6 text-slate-500">Operational excellence and business support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- OPERATIONAL EXCELLENCE --}}
    <section class="bg-slate-950 py-16 lg:py-24 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-cyan-300">Operational Staff</p>

                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Specialized staff driving daily excellence.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-300">
                        GPT Group’s operational staff supports seamless operations, quality standards and strong
                        relationships with clients and partners. The company focuses on continuous learning, attention to
                        detail and adaptability in a fast-changing market.
                    </p>

                    <div class="mt-8 grid sm:grid-cols-2 gap-5">
                        <div class="rounded-[1.75rem] bg-white/10 p-6">
                            <h3 class="text-xl font-black">Lean Operations</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-300">Efficient process and quality-focused
                                execution.</p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white/10 p-6">
                            <h3 class="text-xl font-black">Training Culture</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-300">Ongoing learning and workforce development.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <img class="h-72 w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80"
                        alt="Team Work">
                    <img class="mt-10 h-72 w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=900&q=80"
                        alt="Operations">
                </div>
            </div>
        </div>
    </section>


    {{-- CTA --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 sm:p-12 lg:p-16 text-white shadow-2xl">
                <div class="grid lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="font-black uppercase tracking-[.3em] text-blue-100">Partner With GPT Group</p>
                        <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                            Get the competitive advantage with GPT Group.
                        </h2>
                        <p class="mt-5 text-lg leading-8 text-blue-50">
                            Connect with GPT Group for brand partnership, product distribution, retail outlet support, B2B
                            enquiries and market expansion.
                        </p>
                    </div>

                    <div class="lg:text-right">
                        <a href="{{ route('contact') }}"
                            class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
