@extends('front_pages.front_components.main')

@section('content')

<style>
    .service-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .service-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .service-blob {
        filter: blur(10px);
        opacity: .45;
        animation: serviceBlob 7s ease-in-out infinite alternate;
    }

    @keyframes serviceBlob {
        from { transform: translateY(0) scale(1); }
        to { transform: translateY(18px) scale(1.06); }
    }

    .service-card-hover {
        transition: all .35s ease;
    }

    .service-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .service-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .service-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .service-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .service-input::placeholder {
        color: #94a3b8;
    }

    .service-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- SERVICES HERO --}}
<section class="relative overflow-hidden service-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 service-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 service-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    GPT Group Services
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Smart Services For
                    <span class="mt-2 block service-gradient-text">
                        Customers & Businesses
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    GPT Group provides reliable mobile repair support through GPT Care and business-focused distribution solutions through GPT B2B Programs.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#gpt-care"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        GPT Care
                    </a>

                    <a href="#b2b-program"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        B2B Programs
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black service-gradient-text">Care</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Repair</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black service-gradient-text">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Program</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black service-gradient-text">Oman</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Support</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black service-gradient-text">Fast</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Service</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group Services"
                        class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            Repair + Business Support
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            GPT Care for customers and GPT B2B Programs for business partners.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- SERVICE QUICK CARDS --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 md:grid-cols-2">
            <a href="#gpt-care" class="group service-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">01</div>
                <h3 class="mt-6 text-3xl font-black text-slate-950">GPT Care</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Professional mobile repair services across Oman for screens, batteries, software issues, water damage and more.
                </p>
                <span class="mt-6 inline-flex text-sm font-black text-blue-700">Explore Service →</span>
            </a>

            <a href="#b2b-program" class="group service-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">02</div>
                <h3 class="mt-6 text-3xl font-black text-slate-950">GPT B2B Programs</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Business-to-business programs for mobile devices, smartphones, tablets, accessories and operational support.
                </p>
                <span class="mt-6 inline-flex text-sm font-black text-cyan-700">Explore Program →</span>
            </a>
        </div>
    </div>
</section>


{{-- GPT CARE --}}
<section id="gpt-care" class="service-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    GPT Care
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Professional mobile repair service centres.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Care understands how important your mobile device is for daily communication, work and entertainment. The service provides professional, reliable and efficient mobile repairs at repair centres across Oman.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    From minor glitches to major repairs, GPT Care handles a wide range of issues for major smartphone brands with trained technicians, genuine parts and customer-focused service.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">✓</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Expert Technicians</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Trained repair specialists for major mobile brands and models.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">✓</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Genuine Parts</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Brand-approved parts to maintain device performance and durability.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img
                        class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT Care Mobile Repair"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            Mobile Repair in Oman
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Screen, battery, software, water damage and more.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- GPT CARE PROCESS --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                Repair Options
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                Get your device fixed easily.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                Customers can choose from service centre visit, support call, online booking or pickup and delivery.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">1</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">At Our Centres</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Drop by conveniently located GPT Care repair centres across Oman.
                </p>
            </div>

            <div class="service-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">2</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Reach Out</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Contact the support team for repair advice or to schedule an appointment.
                </p>
            </div>

            <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">3</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Online Booking</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Book a repair service online in just a few clicks.
                </p>
            </div>

            <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">4</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Pickup & Delivery</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Customers can opt for pickup and delivery when visiting a centre is not possible.
                </p>
            </div>
        </div>

    </div>
</section>


{{-- REPAIR SERVICES --}}
<section class="service-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Mobile Repair Services
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Common repair solutions.
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    GPT Care handles day-to-day smartphone issues with professional diagnostics and repair support.
                </p>
            </div>

            <a href="#service-form"
                class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                Book Repair
            </a>
        </div>

        @php
            $repairServices = [
                [
                    'title' => 'Screen Replacement',
                    'image' => 'https://images.unsplash.com/photo-1616348436168-de43ad0db179?auto=format&fit=crop&w=900&q=80',
                    'desc' => 'Cracked or shattered screen replacement with standard warranty.',
                ],
                [
                    'title' => 'Battery Issues',
                    'image' => 'https://images.unsplash.com/photo-1603539444875-76e7684265f6?auto=format&fit=crop&w=900&q=80',
                    'desc' => 'Battery health diagnosis and replacement for fast draining devices.',
                ],
                [
                    'title' => 'Software & Performance',
                    'image' => 'https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=900&q=80',
                    'desc' => 'Slow performance, startup issues, freezing and OS support.',
                ],
                [
                    'title' => 'Water Damage',
                    'image' => 'https://images.unsplash.com/photo-1620331311520-246422fd82f9?auto=format&fit=crop&w=900&q=80',
                    'desc' => 'Moisture damage cleaning, testing and component-level diagnostics.',
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($repairServices as $service)
                <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-sm">
                    <img
                        class="h-44 w-full rounded-[1.5rem] object-cover"
                        src="{{ $service['image'] }}"
                        alt="{{ $service['title'] }}"
                    >
                    <h3 class="mt-6 text-2xl font-black text-slate-950">{{ $service['title'] }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        {{ $service['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>


{{-- B2B PROGRAM --}}
<section id="b2b-program" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div class="relative order-2 lg:order-1">
                <div class="absolute -inset-5 rounded-full bg-blue-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img
                        class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT B2B Program"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            B2B Growth Support
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Distribution, operational efficiency and long-term partnership.
                        </p>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    GPT B2B Programs
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Business-to-business distribution programs.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s B2B programs are designed to empower organizations with top-tier service, innovative solutions and seamless distribution of mobile devices, smartphones, tablets and accessories.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    The program is built on integrity, transparency and speed of execution, helping partners improve operational efficiency and achieve business goals.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Seamless Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Mobile devices, smartphones, tablets and accessories for business needs.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <h3 class="text-xl font-black text-slate-950">Tailor-Made Strategies</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Client-specific plans to maximize operational efficiency.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- B2B BENEFITS --}}
<section class="service-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                B2B Program Benefits
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                Built for reliable business partnerships.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                GPT B2B helps organizations navigate market complexity with support, speed and transparent processes.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">I</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Integrity</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Transparent and productive business interactions for long-term trust.
                </p>
            </div>

            <div class="service-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">S</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Speed</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Fast execution for distribution, supply and partner support.
                </p>
            </div>

            <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">T</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Training</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Product knowledge, partner enablement and market guidance.
                </p>
            </div>

            <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-slate-50 p-8">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">G</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Growth</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Support for business goals, operational efficiency and long-term scale.
                </p>
            </div>
        </div>

    </div>
</section>


{{-- SERVICE FORM --}}
<section id="service-form" class="service-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Service Enquiry
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Need repair or B2B support?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Use this form for GPT Care mobile repair enquiry or GPT B2B Program partnership enquiry.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Phone</h3>
                        <a href="tel:+96824501533" class="mt-2 block text-sm text-blue-50">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block break-words text-sm text-blue-50">info@gptgroups.com</a>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 text-slate-950 shadow-xl sm:p-10">
                <form action="#" method="POST" class="grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input type="text" name="name" class="service-input" placeholder="Enter full name">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone / Email</label>
                            <input type="text" name="contact" class="service-input" placeholder="Enter contact detail">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Service Type</label>
                        <select name="service_type" class="service-input">
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
                        <input type="text" name="device_or_company" class="service-input" placeholder="Example: Samsung S24 / ABC Trading LLC">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea name="message" rows="5" class="service-input resize-none" placeholder="Describe your repair issue or B2B requirement"></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-2 inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500"
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

        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    FAQs
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Service questions.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Quick answers for mobile repair customers and B2B partners.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-sm" open>
                    <summary class="cursor-pointer text-lg font-black text-slate-950">What does GPT Care repair?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Care handles cracked screens, battery drain issues, software/startup problems, slow performance, water damage and other mobile issues.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Does GPT Care use genuine parts?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Care mentions use of genuine / brand-approved components to maintain device performance and durability.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">What is GPT B2B Program?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT B2B Program supports organizations with distribution of mobile devices, smartphones, tablets and accessories, plus operational efficiency support.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">How can I contact GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can contact GPT Group at +968 2450-1533 or info@gptgroups.com.
                    </p>
                </details>
            </div>
        </div>

    </div>
</section>


{{-- CTA --}}
<section class="service-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        GPT Group Services
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Get reliable repair and B2B support.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Choose GPT Care for mobile repair or GPT B2B Program for business distribution and operational support.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#service-form"
                        class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
