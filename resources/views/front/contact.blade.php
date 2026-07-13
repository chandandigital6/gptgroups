@extends('front_pages.front_components.main')

@section('content')

<style>
    html {
        scroll-behavior: smooth;
    }

    .contact-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .24), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .24), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .contact-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .contact-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .contact-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .contact-card-hover {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .contact-card-hover:hover {
        transform: translateY(-4px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 16px 42px rgba(15, 23, 42, .10);
    }

    .contact-input {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: .8rem;
        background: #ffffff;
        padding: .72rem 1rem;
        color: #0f172a;
        font-size: .875rem;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .contact-input::placeholder {
        color: #94a3b8;
    }

    .contact-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, .14);
    }
</style>

{{-- 01. CONTACT HERO --}}
<section class="relative overflow-hidden contact-soft-bg py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-7 lg:grid-cols-2 lg:gap-10">

            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-1.5 text-xs font-black text-blue-700 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                    Contact GPT Group
                </div>

                <h1 class="mt-4 text-4xl font-black leading-tight tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    Let’s build
                    <span class="block contact-gradient-text">business together.</span>
                </h1>

                <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600 lg:text-[17px]">
                    Connect with GPT Group for distribution, retail outlet support, B2B enquiries,
                    careers and customer service.
                </p>

                <div class="mt-5 flex flex-wrap gap-3">
                    <a
                        href="#contact-form"
                        class="inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Send Enquiry
                    </a>

                    <a
                        href="tel:+96824501533"
                        class="inline-flex rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-md transition hover:-translate-y-1 hover:bg-slate-50"
                    >
                        Call Now
                    </a>
                </div>

                <div class="mt-6 grid max-w-xl grid-cols-2 gap-3 sm:grid-cols-4">
                    @foreach ([
                        ['value' => 'Phone', 'label' => 'Support'],
                        ['value' => 'Email', 'label' => 'Enquiry'],
                        ['value' => 'Oman', 'label' => 'Office'],
                        ['value' => 'B2B', 'label' => 'Business'],
                    ] as $stat)
                        <div class="rounded-xl border border-slate-100 bg-white/85 p-3 shadow-sm backdrop-blur">
                            <p class="contact-gradient-text text-lg font-black">
                                {{ $stat['value'] }}
                            </p>

                            <p class="mt-1 text-[11px] font-bold text-slate-500">
                                {{ $stat['label'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative">
                <div class="relative overflow-hidden rounded-[1.6rem] border border-white bg-white/90 p-3 shadow-xl ring-1 ring-cyan-100">
                    <img
                        src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=85"
                        alt="Contact GPT Group"
                        class="h-[260px] w-full rounded-[1.2rem] object-cover sm:h-[320px] lg:h-[360px]"
                        loading="lazy"
                    >

                    <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-md">
                        <p class="text-lg font-black text-slate-950">
                            Business & Customer Support
                        </p>

                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                            Distribution, retail setup, B2B enquiries, customer service and careers.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- 02. CONTACT CARDS --}}
<section class="relative z-10 -mt-5 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

            <div class="contact-card-hover rounded-2xl border border-slate-100 bg-white p-4 shadow-lg">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-blue-600 text-base font-black text-white">
                    ☎
                </div>

                <h3 class="mt-3 text-lg font-black text-slate-950">Phone</h3>
                <p class="mt-1.5 text-sm leading-6 text-slate-500">Speak with our team.</p>

                <a href="tel:+96824501533" class="mt-2 block text-sm font-black text-blue-700">
                    +968 2450-1533
                </a>
            </div>

            <div class="contact-card-hover rounded-2xl border border-slate-100 bg-white p-4 shadow-lg">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-cyan-500 text-base font-black text-white">
                    ✉
                </div>

                <h3 class="mt-3 text-lg font-black text-slate-950">Email</h3>
                <p class="mt-1.5 text-sm leading-6 text-slate-500">Send a business enquiry.</p>

                <a href="mailto:info@gptgroups.com" class="mt-2 block break-words text-sm font-black text-blue-700">
                    info@gptgroups.com
                </a>
            </div>

            <div class="contact-card-hover rounded-2xl border border-slate-100 bg-white p-4 shadow-lg">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-blue-600 text-base font-black text-white">
                    ⌖
                </div>

                <h3 class="mt-3 text-lg font-black text-slate-950">Office</h3>
                <p class="mt-1.5 text-sm leading-6 text-slate-500">Main business operations.</p>

                <p class="mt-2 text-sm font-black text-slate-950">
                    Muscat, Sultanate of Oman
                </p>
            </div>

            <div class="contact-card-hover rounded-2xl border border-slate-100 bg-white p-4 shadow-lg">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-cyan-500 text-base font-black text-white">
                    ↗
                </div>

                <h3 class="mt-3 text-lg font-black text-slate-950">Business Enquiry</h3>
                <p class="mt-1.5 text-sm leading-6 text-slate-500">
                    Distribution, retail and B2B.
                </p>

                <a href="#contact-form" class="mt-2 inline-flex text-sm font-black text-blue-700">
                    Start Now →
                </a>
            </div>

        </div>
    </div>
</section>

{{-- 03. MAIN CONTACT --}}
<section id="contact-form" class="contact-section-light py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-stretch gap-5 lg:grid-cols-[1.1fr_.9fr] lg:gap-7">

            <div class="rounded-[1.6rem] border border-slate-100 bg-white p-6 shadow-xl sm:p-7">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    Send Enquiry
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Tell us how we can help.
                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Submit your requirement for distribution, retail setup, B2B supply,
                    customer service or career enquiry.
                </p>

                <form action="#" method="POST" class="mt-5 grid gap-3">
                    @csrf

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-black text-slate-700">Full Name</label>
                            <input type="text" name="name" class="contact-input" placeholder="Enter full name">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-black text-slate-700">Phone</label>
                            <input type="text" name="phone" class="contact-input" placeholder="Enter phone number">
                        </div>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-black text-slate-700">Email</label>
                            <input type="email" name="email" class="contact-input" placeholder="Enter email">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-black text-slate-700">Company / Brand</label>
                            <input type="text" name="company" class="contact-input" placeholder="Company name">
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-black text-slate-700">Enquiry Type</label>

                        <select name="enquiry_type" class="contact-input">
                            <option>Distribution Partnership</option>
                            <option>Retail Outlet Setup</option>
                            <option>B2B / Wholesale Supply</option>
                            <option>Brand Partnership</option>
                            <option>Customer Service</option>
                            <option>Career Enquiry</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-black text-slate-700">Message</label>

                        <textarea
                            name="message"
                            rows="3"
                            class="contact-input resize-none"
                            placeholder="Write your message"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-1 inline-flex justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Submit Enquiry
                    </button>
                </form>
            </div>

            <div class="rounded-[1.6rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-6 text-white shadow-xl sm:p-7">
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-100 sm:text-sm">
                    Contact Details
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight sm:text-4xl">
                    GPT Group Head Office
                </h2>

                <p class="mt-3 text-sm leading-6 text-blue-50">
                    Reach us for business partnerships, distribution, retail support and customer enquiries.
                </p>

                <div class="mt-5 grid gap-3">
                    <div class="rounded-xl bg-white/15 p-4">
                        <p class="text-[11px] font-black uppercase tracking-[.18em] text-blue-100">
                            Office Address
                        </p>
                        <p class="mt-2 text-base font-black">Muscat, Sultanate of Oman</p>
                    </div>

                    <div class="rounded-xl bg-white/15 p-4">
                        <p class="text-[11px] font-black uppercase tracking-[.18em] text-blue-100">
                            Phone
                        </p>
                        <a href="tel:+96824501533" class="mt-2 block text-base font-black text-white">
                            +968 2450-1533
                        </a>
                    </div>

                    <div class="rounded-xl bg-white/15 p-4">
                        <p class="text-[11px] font-black uppercase tracking-[.18em] text-blue-100">
                            Email
                        </p>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block break-words text-base font-black text-white">
                            info@gptgroups.com
                        </a>
                    </div>
                </div>

                <a
                    href="mailto:info@gptgroups.com"
                    class="mt-5 inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                >
                    Email Now
                </a>
            </div>

        </div>
    </div>
</section>

{{-- 04. MAP --}}
<section class="contact-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-start gap-5 lg:grid-cols-[.75fr_1.25fr] lg:gap-7">

            <div>
                <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                    Find Us
                </p>

                <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Visit or connect with GPT Group.
                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Our main office is located in Muscat, Sultanate of Oman.
                </p>

                <div class="mt-4 grid gap-3">
                    <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                        <h3 class="text-base font-black text-slate-950">Business Hours</h3>
                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                            Sunday to Thursday, Oman local business hours.
                        </p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm">
                        <h3 class="text-base font-black text-slate-950">Location</h3>
                        <p class="mt-1.5 text-sm leading-6 text-slate-600">
                            Muscat, Sultanate of Oman
                        </p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-3 shadow-xl">
                <iframe
                    class="h-[300px] w-full rounded-[1.1rem] sm:h-[360px]"
                    src="https://www.google.com/maps?q=Muscat%20Oman&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
            </div>

        </div>
    </div>
</section>

{{-- 05. FAQ --}}
<section class="bg-white py-10 sm:py-12 lg:py-14">
    <div class="mx-auto grid max-w-7xl gap-7 px-4 sm:px-6 lg:grid-cols-2 lg:gap-10 lg:px-8">

        <div>
            <p class="text-xs font-black uppercase tracking-[.22em] text-blue-700 sm:text-sm">
                FAQs
            </p>

            <h2 class="mt-3 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                Contact questions.
            </h2>

            <p class="mt-3 text-sm leading-6 text-slate-600">
                Quick answers for brands, retailers, B2B buyers and career applicants.
            </p>
        </div>

        <div class="grid gap-3">
            @foreach ([
                [
                    'question' => 'What can I contact GPT Group for?',
                    'answer' => 'Distribution partnerships, retail outlet setup, B2B supply, customer service, brand partnerships and career enquiries.',
                ],
                [
                    'question' => 'What is GPT Group’s contact email?',
                    'answer' => 'You can email GPT Group at info@gptgroups.com.',
                ],
                [
                    'question' => 'Does GPT Group support retail store partnerships?',
                    'answer' => 'Yes. GPT Group supports authorized retail store setup, distribution and market execution.',
                ],
                [
                    'question' => 'Where is GPT Group located?',
                    'answer' => 'GPT Group is based in Muscat, Sultanate of Oman.',
                ],
            ] as $faq)
                <details class="rounded-xl border border-slate-100 bg-slate-50 p-4 shadow-sm" {{ $loop->first ? 'open' : '' }}>
                    <summary class="cursor-pointer text-sm font-black text-slate-950 sm:text-base">
                        {{ $faq['question'] }}
                    </summary>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        {{ $faq['answer'] }}
                    </p>
                </details>
            @endforeach
        </div>

    </div>
</section>

@endsection