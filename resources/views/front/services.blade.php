@extends('front_pages.front_components.main')

@section('content')

{{-- SERVICES HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Group Services"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                GPT Group Services
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Smart Services For
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Customers & Businesses
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                GPT Group provides reliable mobile repair support through GPT Care and business-focused distribution solutions through GPT B2B Programs.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#gpt-care" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    GPT Care
                </a>
                <a href="#b2b-program" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    B2B Programs
                </a>
            </div>
        </div>
    </div>
</section>


{{-- SERVICE QUICK CARDS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-5">
            <a href="#gpt-care" class="group rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-2xl font-black text-blue-700">01</div>
                <h3 class="mt-6 text-3xl font-black text-slate-950">GPT Care</h3>
                <p class="mt-3 text-slate-600 leading-7">
                    Professional mobile repair services across Oman for screens, batteries, software issues, water damage and more.
                </p>
                <span class="mt-6 inline-flex text-sm font-black text-blue-700">Explore Service →</span>
            </a>

            <a href="#b2b-program" class="group rounded-[2rem] border border-slate-100 bg-slate-950 p-7 text-white shadow-xl transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-2xl font-black text-slate-950">02</div>
                <h3 class="mt-6 text-3xl font-black">GPT B2B Programs</h3>
                <p class="mt-3 text-slate-300 leading-7">
                    Business-to-business programs for mobile devices, smartphones, tablets, accessories and operational support.
                </p>
                <span class="mt-6 inline-flex text-sm font-black text-cyan-300">Explore Program →</span>
            </a>
        </div>
    </div>
</section>


{{-- GPT CARE --}}
<section id="gpt-care" class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">GPT Care</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    Professional mobile repair service centres.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Care understands how important your mobile device is for daily communication, work and entertainment. The service provides professional, reliable and efficient mobile repairs at repair centres across Oman.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    From minor glitches to major repairs, GPT Care handles a wide range of issues for major smartphone brands with trained technicians, genuine parts and customer-focused service.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">✓</div>
                        <h3 class="mt-5 text-xl font-black">Expert Technicians</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Trained repair specialists for major mobile brands and models.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">✓</div>
                        <h3 class="mt-5 text-xl font-black">Genuine Parts</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Brand-approved parts to maintain device performance and durability.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white p-5 shadow-2xl">
                    <img
                        class="h-[520px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT Care Mobile Repair"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-slate-950/90 p-6 text-white backdrop-blur">
                        <p class="text-3xl font-black">Mobile Repair in Oman</p>
                        <p class="mt-2 text-slate-300">Screen, battery, software, water damage and more.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- GPT CARE PROCESS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Repair Options</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Get your device fixed easily.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                Customers can choose from service centre visit, support call, online booking or pickup and delivery.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">1</div>
                <h3 class="mt-6 text-2xl font-black">At Our Centres</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Drop by conveniently located GPT Care repair centres across Oman.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">2</div>
                <h3 class="mt-6 text-2xl font-black">Reach Out</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Contact the support team for repair advice or to schedule an appointment.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">3</div>
                <h3 class="mt-6 text-2xl font-black">Online Booking</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Book a repair service online in just a few clicks.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">4</div>
                <h3 class="mt-6 text-2xl font-black">Pickup & Delivery</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Customers can opt for pickup and delivery when visiting a centre is not possible.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- REPAIR SERVICES --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Mobile Repair Services</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    Common repair solutions.
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    GPT Care handles day-to-day smartphone issues with professional diagnostics and repair support.
                </p>
            </div>

            <a href="#service-form" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Book Repair
            </a>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100">
                <img class="h-44 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1616348436168-de43ad0db179?auto=format&fit=crop&w=900&q=80" alt="Screen Repair">
                <h3 class="mt-6 text-2xl font-black">Screen Replacement</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Cracked or shattered screen replacement with standard warranty.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100">
                <img class="h-44 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1603539444875-76e7684265f6?auto=format&fit=crop&w=900&q=80" alt="Battery Repair">
                <h3 class="mt-6 text-2xl font-black">Battery Issues</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Battery health diagnosis and replacement for fast draining devices.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100">
                <img class="h-44 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=900&q=80" alt="Software Repair">
                <h3 class="mt-6 text-2xl font-black">Software & Performance</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Slow performance, startup issues, freezing and OS support.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-7 shadow-sm border border-slate-100">
                <img class="h-44 w-full rounded-[1.5rem] object-cover" src="https://images.unsplash.com/photo-1620331311520-246422fd82f9?auto=format&fit=crop&w=900&q=80" alt="Water Damage">
                <h3 class="mt-6 text-2xl font-black">Water Damage</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Moisture damage cleaning, testing and component-level diagnostics.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- B2B PROGRAM --}}
<section id="b2b-program" class="bg-slate-950 py-16 lg:py-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative order-2 lg:order-1">
                <div class="absolute -inset-5 rounded-full bg-blue-500/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white/10 p-5 shadow-2xl border border-white/10">
                    <img
                        class="h-[520px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT B2B Program"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-white/90 p-6 text-slate-950 backdrop-blur">
                        <p class="text-3xl font-black">B2B Growth Support</p>
                        <p class="mt-2 text-slate-600">Distribution, operational efficiency and long-term partnership.</p>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">GPT B2B Programs</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                    Business-to-business distribution programs.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-300">
                    GPT Group’s B2B programs are designed to empower organizations with top-tier service, innovative solutions and seamless distribution of mobile devices, smartphones, tablets and accessories.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-300">
                    The program is built on integrity, transparency and speed of execution, helping partners improve operational efficiency and achieve business goals.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Seamless Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Mobile devices, smartphones, tablets and accessories for business needs.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Tailor-Made Strategies</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Client-specific plans to maximize operational efficiency.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- B2B BENEFITS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">B2B Program Benefits</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Built for reliable business partnerships.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT B2B helps organizations navigate market complexity with support, speed and transparent processes.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">I</div>
                <h3 class="mt-6 text-2xl font-black">Integrity</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Transparent and productive business interactions for long-term trust.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">S</div>
                <h3 class="mt-6 text-2xl font-black">Speed</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    Fast execution for distribution, supply and partner support.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">T</div>
                <h3 class="mt-6 text-2xl font-black">Training</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Product knowledge, partner enablement and market guidance.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-50 p-8 border border-slate-100 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">G</div>
                <h3 class="mt-6 text-2xl font-black">Growth</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Support for business goals, operational efficiency and long-term scale.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- SERVICE FORM --}}
<section id="service-form" class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Service Enquiry</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Need repair or B2B support?
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-300">
                    Use this form for GPT Care mobile repair enquiry or GPT B2B Program partnership enquiry.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6 border border-white/10">
                        <h3 class="text-xl font-black">Phone</h3>
                        <a href="tel:+96824501533" class="mt-2 block text-sm text-slate-300">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6 border border-white/10">
                        <h3 class="text-xl font-black">Email</h3>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block text-sm text-slate-300">info@gptgroups.com</a>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-white p-8 sm:p-10 text-slate-950 shadow-xl border border-slate-100">
                <form action="#" method="POST" class="grid gap-4">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                                placeholder="Enter full name"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone / Email</label>
                            <input
                                type="text"
                                name="contact"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                                placeholder="Enter contact detail"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Service Type</label>
                        <select
                            name="service_type"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                        >
                            <option>GPT Care - Mobile Repair</option>
                            <option>GPT B2B Program</option>
                            <option>Screen Replacement</option>
                            <option>Battery Issue</option>
                            <option>Software / Startup Issue</option>
                            <option>Water Damage</option>
                            <option>Corporate / B2B Supply</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Mobile Series / Company Name</label>
                        <input
                            type="text"
                            name="device_or_company"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                            placeholder="Example: Samsung S24 / ABC Trading LLC"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea
                            name="message"
                            rows="5"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                            placeholder="Describe your repair issue or B2B requirement"
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
                    Service questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Quick answers for mobile repair customers and B2B partners.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">What does GPT Care repair?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Care handles cracked screens, battery drain issues, software/startup problems, slow performance, water damage and other mobile issues.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Does GPT Care use genuine parts?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Care mentions use of genuine / brand-approved components to maintain device performance and durability.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">What is GPT B2B Program?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT B2B Program supports organizations with distribution of mobile devices, smartphones, tablets and accessories, plus operational efficiency support.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">How can I contact GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can contact GPT Group at +968 2450-1533 or info@gptgroups.com.
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
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">GPT Group Services</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Get reliable repair and B2B support.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Choose GPT Care for mobile repair or GPT B2B Program for business distribution and operational support.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#service-form" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection