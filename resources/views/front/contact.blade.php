@extends('front_pages.front_components.main')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Static Contact Information
    |--------------------------------------------------------------------------
    | Replace only the values below after confirming exact office addresses,
    | phone numbers and map links. The complete page design will remain unchanged.
    */
    $contactEmail = 'info@gptgroups.com';
    $primaryPhone = '+968 2450 1533';

    $offices = [
        [
            'number' => '01',
            'country' => 'Oman',
            'title' => 'Oman Head Office',
            'city' => 'Muscat, Sultanate of Oman',
            'address' => 'Muscat, Sultanate of Oman',
            'phone' => '+968 2450 1533',
            'phone_link' => '+96824501533',
            'email' => 'info@gptgroups.com',
            'map_link' => 'https://www.google.com/maps/search/?api=1&query=Muscat+Oman',
            'map_embed' => 'https://www.google.com/maps?q=Muscat%20Oman&output=embed',
            'image' => 'https://images.unsplash.com/photo-1539650116574-75c0c6d73f6e?auto=format&fit=crop&w=1200&q=85',
            'description' => 'The central office for GPT Group’s Oman operations, business partnerships, distribution activities and customer support.',
        ],
        // [
        //     'number' => '02',
        //     'country' => 'UAE',
        //     'title' => 'Dubai Office',
        //     'city' => 'Dubai, United Arab Emirates',
        //     'address' => 'Dubai, United Arab Emirates',
        //     'phone' => 'Contact our central office',
        //     'phone_link' => '+96824501533',
        //     'email' => 'info@gptgroups.com',
        //     'map_link' => 'https://www.google.com/maps/search/?api=1&query=Dubai+UAE',
        //     'map_embed' => 'https://www.google.com/maps?q=Dubai%20UAE&output=embed',
        //     'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1200&q=85',
        //     'description' => 'Supporting regional relationships, international trade, market development and business coordination across the UAE and GCC.',
        // ],
        // [
        //     'number' => '03',
        //     'country' => 'India',
        //     'title' => 'India Office',
        //     'city' => 'India',
        //     'address' => 'India Office',
        //     'phone' => 'Contact our central office',
        //     'phone_link' => '+96824501533',
        //     'email' => 'info@gptgroups.com',
        //     'map_link' => 'https://www.google.com/maps/search/?api=1&query=India',
        //     'map_embed' => 'https://www.google.com/maps?q=India&output=embed',
        //     'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&w=1200&q=85',
        //     'description' => 'Supporting sourcing, technology services, business coordination and operational requirements for the Group’s wider network.',
        // ],
    ];
@endphp

<style>
    html {
        scroll-behavior: smooth;
    }

    :root {
        --contact-blue: #1d4ed8;
        --contact-cyan: #06b6d4;
        --contact-ink: #071a35;
        --contact-muted: #64748b;
    }

    .contact-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background:
            radial-gradient(circle at 88% 12%, rgba(6, 182, 212, .20), transparent 29%),
            radial-gradient(circle at 7% 74%, rgba(37, 99, 235, .14), transparent 32%),
            linear-gradient(135deg, #f7fbff 0%, #ffffff 48%, #edf7ff 100%);
    }

    .contact-hero::before {
        position: absolute;
        inset: 0;
        z-index: -1;
        content: "";
        opacity: .50;
        background-image:
            linear-gradient(rgba(37, 99, 235, .045) 1px, transparent 1px),
            linear-gradient(90deg, rgba(37, 99, 235, .045) 1px, transparent 1px);
        background-size: 42px 42px;
        mask-image: linear-gradient(to bottom, #000, transparent 96%);
    }

    .contact-label {
        display: inline-flex;
        align-items: center;
        gap: .65rem;
        color: var(--contact-blue);
        font-size: .72rem;
        font-weight: 900;
        letter-spacing: .20em;
        text-transform: uppercase;
    }

    .contact-label::before {
        width: 2rem;
        height: 2px;
        content: "";
        background: linear-gradient(90deg, var(--contact-blue), var(--contact-cyan));
    }

    .contact-gradient {
        background: linear-gradient(90deg, var(--contact-blue), var(--contact-cyan));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .contact-image-shell {
        position: relative;
        border: 1px solid rgba(203, 213, 225, .85);
        border-radius: 1.8rem;
        background: rgba(255, 255, 255, .88);
        padding: .7rem;
        box-shadow: 0 30px 80px rgba(15, 46, 82, .16);
    }

    .quick-contact-card,
    .office-card,
    .info-card {
        border: 1px solid #e2e8f0;
        background: #ffffff;
        box-shadow: 0 12px 38px rgba(15, 23, 42, .06);
        transition:
            transform .32s ease,
            box-shadow .32s ease,
            border-color .32s ease;
    }

    .quick-contact-card:hover,
    .office-card:hover,
    .info-card:hover {
        transform: translateY(-6px);
        border-color: rgba(37, 99, 235, .25);
        box-shadow: 0 24px 60px rgba(37, 99, 235, .13);
    }

    .office-card {
        display: flex;
        min-height: 100%;
        flex-direction: column;
        overflow: hidden;
        border-radius: 1.5rem;
    }

    .office-image {
        position: relative;
        height: 14rem;
        overflow: hidden;
    }

    .office-image::after {
        position: absolute;
        inset: 0;
        content: "";
        background: linear-gradient(to top, rgba(7, 26, 53, .82), transparent 62%);
    }

    .office-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .65s ease;
    }

    .office-card:hover .office-image img {
        transform: scale(1.06);
    }

    .office-number,
    .contact-icon {
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, var(--contact-blue), var(--contact-cyan));
        color: #ffffff;
        font-weight: 900;
        box-shadow: 0 12px 25px rgba(37, 99, 235, .22);
    }

    .office-number {
        width: 3rem;
        height: 3rem;
        border-radius: 1rem;
        font-size: .8rem;
    }

    .contact-icon {
        width: 3.1rem;
        height: 3.1rem;
        border-radius: 1rem;
        font-size: 1.05rem;
    }

    .contact-input {
        width: 100%;
        border: 1px solid #dce5ef;
        border-radius: .9rem;
        background: #ffffff;
        padding: .85rem 1rem;
        color: #0f172a;
        font-size: .9rem;
        outline: none;
        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .contact-input::placeholder {
        color: #94a3b8;
    }

    .contact-input:focus {
        border-color: #38bdf8;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .13);
    }

    .contact-soft-section {
        background:
            radial-gradient(circle at 90% 10%, rgba(6, 182, 212, .07), transparent 28%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .office-detail-row {
        display: flex;
        align-items: flex-start;
        gap: .75rem;
        border-radius: .9rem;
        background: #f8fafc;
        padding: .8rem;
    }

    .office-detail-dot {
        margin-top: .2rem;
        width: .55rem;
        height: .55rem;
        flex: 0 0 .55rem;
        border-radius: 999px;
        background: linear-gradient(135deg, var(--contact-blue), var(--contact-cyan));
    }
</style>

{{-- 01. Hero --}}
<section class="contact-hero py-12 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr]">
            <div>
                <p class="contact-label">Contact GPT Group</p>

                <h1 class="mt-5 max-w-4xl text-4xl font-black leading-[1.08] text-slate-950 sm:text-5xl lg:text-6xl">
                    Let’s create new
                    <span class="contact-gradient">business opportunities together.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                    Connect with GPT Group for product distribution, brand partnerships,
                    project solutions, B2B supply, retail support, careers or customer service
                    across Oman, Dubai and India.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a
                        href="#contact-form"
                        class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                    >
                        Send an Enquiry
                    </a>

                    <a
                        href="tel:{{ preg_replace('/\s+/', '', $primaryPhone) }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-sm transition hover:-translate-y-1 hover:border-blue-300"
                    >
                        Call {{ $primaryPhone }}
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-3 sm:grid-cols-3">
                    <div class="info-card rounded-2xl p-4">
                        <p class="text-2xl font-black text-blue-700">03</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Office Locations</p>
                    </div>

                    <div class="info-card rounded-2xl p-4">
                        <p class="text-2xl font-black text-blue-700">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Business Support</p>
                    </div>

                    <div class="info-card col-span-2 rounded-2xl p-4 sm:col-span-1">
                        <p class="text-2xl font-black text-blue-700">GCC</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Regional Reach</p>
                    </div>
                </div>
            </div>

            <div class="contact-image-shell">
                <img
                    src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1600&q=88"
                    alt="Contact GPT Group offices"
                    class="h-[350px] w-full rounded-[1.35rem] object-cover sm:h-[440px] lg:h-[500px]"
                >

                <div class="absolute -bottom-5 left-6 right-6 rounded-2xl border border-white/60 bg-white/95 p-4 shadow-xl backdrop-blur sm:left-10 sm:right-auto sm:max-w-sm">
                    <p class="text-xs font-black uppercase tracking-[.18em] text-blue-700">
                        Business & Customer Support
                    </p>

                    <p class="mt-2 text-sm font-bold leading-6 text-slate-700">
                        Distribution, solutions, partnerships, product supply,
                        customer support and career enquiries.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 02. Quick Contact --}}
<section class="relative z-10 -mt-2 bg-white py-12 sm:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-3">
            <a
                href="tel:{{ preg_replace('/\s+/', '', $primaryPhone) }}"
                class="quick-contact-card rounded-[1.35rem] p-5"
            >
                <span class="contact-icon">☎</span>
                <p class="mt-4 text-xs font-black uppercase tracking-[.16em] text-blue-700">
                    Phone
                </p>
                <h2 class="mt-2 text-xl font-black text-slate-950">
                    {{ $primaryPhone }}
                </h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Speak directly with our central business support team.
                </p>
            </a>

            <a
                href="mailto:{{ $contactEmail }}"
                class="quick-contact-card rounded-[1.35rem] p-5"
            >
                <span class="contact-icon">✉</span>
                <p class="mt-4 text-xs font-black uppercase tracking-[.16em] text-blue-700">
                    Email
                </p>
                <h2 class="mt-2 break-words text-xl font-black text-slate-950">
                    {{ $contactEmail }}
                </h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Send your business, product, service or partnership enquiry.
                </p>
            </a>

            <a
                href="#office-locations"
                class="quick-contact-card rounded-[1.35rem] p-5"
            >
                <span class="contact-icon">⌖</span>
                <p class="mt-4 text-xs font-black uppercase tracking-[.16em] text-blue-700">
                    Offices
                </p>
                <h2 class="mt-2 text-xl font-black text-slate-950">
                    Oman · Dubai · India
                </h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Explore our office locations and regional business presence.
                </p>
            </a>
        </div>
    </div>
</section>

{{-- 03. Office Locations --}}
<section id="office-locations" class="contact-soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="contact-label justify-center">Our Offices</p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Connect with our teams across
                <span class="contact-gradient">three strategic markets.</span>
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                Our regional presence supports customers, brands, business partners
                and project requirements across Oman, the UAE and India.
            </p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($offices as $office)
                <article class="office-card group">
                    <div class="office-image">
                        <img
                            src="{{ $office['image'] }}"
                            alt="{{ $office['title'] }}"
                            loading="lazy"
                        >

                        <span class="absolute left-5 top-5 z-10 rounded-full border border-white/30 bg-slate-950/55 px-3 py-1.5 text-[10px] font-black uppercase tracking-[.16em] text-white backdrop-blur">
                            {{ $office['country'] }}
                        </span>

                        <div class="absolute bottom-5 left-5 z-10">
                            <p class="text-xs font-black uppercase tracking-[.15em] text-cyan-300">
                                GPT Group Office
                            </p>
                            <p class="mt-1 text-xl font-black text-white">
                                {{ $office['city'] }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-6">
                        <span class="office-number">
                            {{ $office['number'] }}
                        </span>

                        <h3 class="mt-5 text-2xl font-black text-slate-950">
                            {{ $office['title'] }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $office['description'] }}
                        </p>

                        <div class="mt-5 grid gap-3">
                            <div class="office-detail-row">
                                <span class="office-detail-dot"></span>
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[.12em] text-slate-500">
                                        Address
                                    </p>
                                    <p class="mt-1 text-sm font-bold leading-6 text-slate-800">
                                        {{ $office['address'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="office-detail-row">
                                <span class="office-detail-dot"></span>
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[.12em] text-slate-500">
                                        Phone
                                    </p>
                                    <a
                                        href="tel:{{ $office['phone_link'] }}"
                                        class="mt-1 block text-sm font-bold text-blue-700"
                                    >
                                        {{ $office['phone'] }}
                                    </a>
                                </div>
                            </div>

                            <div class="office-detail-row">
                                <span class="office-detail-dot"></span>
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[.12em] text-slate-500">
                                        Email
                                    </p>
                                    <a
                                        href="mailto:{{ $office['email'] }}"
                                        class="mt-1 block break-words text-sm font-bold text-blue-700"
                                    >
                                        {{ $office['email'] }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a
                            href="{{ $office['map_link'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-6 inline-flex items-center gap-2 text-sm font-black text-blue-700"
                        >
                            Open in Google Maps
                            <span aria-hidden="true">↗</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 04. Contact Form --}}
<section id="contact-form" class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-stretch gap-7 lg:grid-cols-[1.08fr_.92fr]">
            <div class="rounded-[1.7rem] border border-slate-200 bg-white p-6 shadow-xl sm:p-8">
                <p class="contact-label">Send an Enquiry</p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Tell us how
                    <span class="contact-gradient">we can help.</span>
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-600">
                    Complete the form and select the office or enquiry category
                    most relevant to your requirement.
                </p>

                @if (session('success'))
                    <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-bold text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-black">Please correct the following:</p>
                        <ul class="mt-2 list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ url('/contact') }}"
                    method="POST"
                    class="mt-7 grid gap-4"
                >
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-2 block text-sm font-black text-slate-700">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="contact-input"
                                placeholder="Enter your full name"
                                required
                            >
                        </div>

                        <div>
                            <label for="phone" class="mb-2 block text-sm font-black text-slate-700">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="phone"
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="contact-input"
                                placeholder="Enter phone number"
                                required
                            >
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="email" class="mb-2 block text-sm font-black text-slate-700">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="contact-input"
                                placeholder="Enter email address"
                                required
                            >
                        </div>

                        <div>
                            <label for="company" class="mb-2 block text-sm font-black text-slate-700">
                                Company / Organisation
                            </label>
                            <input
                                id="company"
                                type="text"
                                name="company"
                                value="{{ old('company') }}"
                                class="contact-input"
                                placeholder="Enter company name"
                            >
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="office" class="mb-2 block text-sm font-black text-slate-700">
                                Preferred Office
                            </label>
                            <select id="office" name="office" class="contact-input">
                                <option value="">Select office</option>
                                <option value="Oman Office" @selected(old('office') === 'Oman Office')>
                                    Oman Office
                                </option>
                                <option value="Dubai Office" @selected(old('office') === 'Dubai Office')>
                                    Dubai Office
                                </option>
                                <option value="India Office" @selected(old('office') === 'India Office')>
                                    India Office
                                </option>
                            </select>
                        </div>

                        <div>
                            <label for="enquiry_type" class="mb-2 block text-sm font-black text-slate-700">
                                Enquiry Type <span class="text-red-500">*</span>
                            </label>
                            <select id="enquiry_type" name="enquiry_type" class="contact-input" required>
                                <option value="">Select enquiry type</option>
                                @foreach ([
                                    'Distribution Partnership',
                                    'Brand Partnership',
                                    'B2B / Wholesale Supply',
                                    'Security & ELV Solutions',
                                    'Smart Home & IoT Solutions',
                                    'Network Infrastructure',
                                    'Retail Partnership',
                                    'Customer Support',
                                    'Career Enquiry',
                                    'Other',
                                ] as $type)
                                    <option value="{{ $type }}" @selected(old('enquiry_type') === $type)>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="mb-2 block text-sm font-black text-slate-700">
                            Subject
                        </label>
                        <input
                            id="subject"
                            type="text"
                            name="subject"
                            value="{{ old('subject') }}"
                            class="contact-input"
                            placeholder="Enter enquiry subject"
                        >
                    </div>

                    <div>
                        <label for="message" class="mb-2 block text-sm font-black text-slate-700">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            class="contact-input resize-none"
                            placeholder="Tell us about your requirement"
                            required
                        >{{ old('message') }}</textarea>
                    </div>

                    <label class="flex items-start gap-3 rounded-xl bg-slate-50 p-4">
                        <input
                            type="checkbox"
                            name="consent"
                            value="1"
                            class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600"
                            required
                        >
                        <span class="text-xs font-semibold leading-5 text-slate-600">
                            I agree that GPT Group may use the information provided
                            to respond to this enquiry.
                        </span>
                    </label>

                    <button
                        type="submit"
                        class="mt-1 inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                    >
                        Submit Enquiry
                    </button>
                </form>
            </div>

            <div class="overflow-hidden rounded-[1.7rem] bg-slate-950 p-6 text-white shadow-2xl sm:p-8">
                <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-300">
                    Direct Contact
                </p>

                <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">
                    Need a faster response?
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-300">
                    Reach our central team directly for urgent business,
                    project or customer-support requirements.
                </p>

                <div class="mt-7 grid gap-4">
                    <a
                        href="tel:{{ preg_replace('/\s+/', '', $primaryPhone) }}"
                        class="rounded-2xl border border-white/10 bg-white/10 p-5 transition hover:bg-white/15"
                    >
                        <p class="text-xs font-black uppercase tracking-[.15em] text-cyan-300">
                            Call Us
                        </p>
                        <p class="mt-2 text-xl font-black text-white">
                            {{ $primaryPhone }}
                        </p>
                    </a>

                    <a
                        href="mailto:{{ $contactEmail }}"
                        class="rounded-2xl border border-white/10 bg-white/10 p-5 transition hover:bg-white/15"
                    >
                        <p class="text-xs font-black uppercase tracking-[.15em] text-cyan-300">
                            Email Us
                        </p>
                        <p class="mt-2 break-words text-xl font-black text-white">
                            {{ $contactEmail }}
                        </p>
                    </a>

                    <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                        <p class="text-xs font-black uppercase tracking-[.15em] text-cyan-300">
                            Office Network
                        </p>
                        <p class="mt-2 text-xl font-black text-white">
                            Oman · Dubai · India
                        </p>
                    </div>
                </div>

                <div class="mt-7 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 p-5">
                    <p class="text-xs font-black uppercase tracking-[.15em] text-blue-100">
                        Business Enquiries
                    </p>

                    <p class="mt-3 text-sm font-semibold leading-7 text-white">
                        Distribution, brand representation, project supply,
                        smart technology, security, structured cabling,
                        retail partnerships and regional expansion.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 05. Office Maps --}}
<section class="contact-soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="contact-label justify-center">Office Locations</p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Find our
                <span class="contact-gradient">regional presence.</span>
            </h2>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            @foreach ($offices as $office)
                <div class="overflow-hidden rounded-[1.4rem] border border-slate-200 bg-white p-3 shadow-xl">
                    <iframe
                        src="{{ $office['map_embed'] }}"
                        title="{{ $office['title'] }} map"
                        class="h-[260px] w-full rounded-[1.05rem]"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>

                    <div class="p-3 pt-5">
                        <p class="text-xs font-black uppercase tracking-[.15em] text-blue-700">
                            {{ $office['country'] }}
                        </p>

                        <h3 class="mt-2 text-xl font-black text-slate-950">
                            {{ $office['title'] }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            {{ $office['address'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 06. FAQ --}}
<section class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[.8fr_1.2fr] lg:gap-12 lg:px-8">
        <div>
            <p class="contact-label">Contact FAQs</p>

            <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Common contact
                <span class="contact-gradient">questions.</span>
            </h2>

            <p class="mt-4 text-base leading-8 text-slate-600">
                Quick information for brands, dealers, business buyers,
                project partners and career applicants.
            </p>
        </div>

        <div class="grid gap-3">
            @foreach ([
                [
                    'question' => 'Which office should I contact?',
                    'answer' => 'Choose the office closest to your business requirement. You may also contact the Oman central office for routing to the appropriate regional team.',
                ],
                [
                    'question' => 'Can I contact GPT Group for distribution partnerships?',
                    'answer' => 'Yes. Use the enquiry form and select Distribution Partnership or Brand Partnership.',
                ],
                [
                    'question' => 'Does GPT Group handle project and B2B enquiries?',
                    'answer' => 'Yes. GPT Group supports B2B supply, security and ELV, smart home, network infrastructure and structured cabling requirements.',
                ],
                [
                    'question' => 'What is the main contact email?',
                    'answer' => 'The central contact email is info@gptgroups.com.',
                ],
                [
                    'question' => 'Can I submit a career enquiry?',
                    'answer' => 'Yes. Select Career Enquiry in the contact form and include the relevant role or department in your message.',
                ],
            ] as $faq)
                <details
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-5 shadow-sm"
                    {{ $loop->first ? 'open' : '' }}
                >
                    <summary class="cursor-pointer text-sm font-black text-slate-950 sm:text-base">
                        {{ $faq['question'] }}
                    </summary>

                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        {{ $faq['answer'] }}
                    </p>
                </details>
            @endforeach
        </div>
    </div>
</section>

{{-- 07. Final CTA --}}
<section class="contact-soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
            <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                <div>
                    <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-200">
                        Start a Conversation
                    </p>

                    <h2 class="mt-4 max-w-3xl text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Let’s discuss your next business or technology opportunity.
                    </h2>

                    <p class="mt-4 max-w-2xl text-base leading-8 text-blue-50">
                        Our team is ready to support your distribution,
                        partnership, project and product requirements.
                    </p>
                </div>

                <a
                    href="#contact-form"
                    class="inline-flex min-w-44 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                >
                    Send Enquiry
                </a>
            </div>
        </div>
    </div>
</section>

@endsection 