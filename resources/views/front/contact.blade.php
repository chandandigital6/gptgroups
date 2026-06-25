@extends('front_pages.front_components.main')

@section('content')

<style>
    .contact-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .contact-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .contact-blob {
        filter: blur(10px);
        opacity: .45;
        animation: contactBlob 7s ease-in-out infinite alternate;
    }

    @keyframes contactBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .contact-card-hover {
        transition: all .35s ease;
    }

    .contact-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .contact-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .contact-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .contact-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .contact-input::placeholder {
        color: #94a3b8;
    }

    .contact-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- CONTACT HERO --}}
<section class="relative overflow-hidden contact-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 contact-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 contact-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    Contact GPT Group
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Let’s Build
                    <span class="mt-2 block contact-gradient-text">
                        Business Together
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    Connect with GPT Group for brand partnership, product distribution, retail outlet support, B2B enquiries, careers and customer service.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#contact-form"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        Send Enquiry
                    </a>

                    <a href="tel:+96824501533"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Call Now
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black contact-gradient-text">Phone</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Support</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black contact-gradient-text">Email</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Enquiry</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black contact-gradient-text">Oman</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Office</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black contact-gradient-text">B2B</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Business</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=85"
                        alt="Contact GPT Group"
                        class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            Business & Customer Support
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Distribution, retail outlet setup, B2B enquiries, customer service and careers.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- CONTACT CARDS --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">☎</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Phone</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Speak with GPT Group team.</p>
                <a href="tel:+96824501533" class="mt-4 block text-lg font-black text-blue-700">+968 2450-1533</a>
            </div>

            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">✉</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Email</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Send enquiries and business requests.</p>
                <a href="mailto:info@gptgroups.com" class="mt-4 block break-words text-lg font-black text-blue-700">info@gptgroups.com</a>
            </div>

            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">⌖</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Office</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Main office and business operations.</p>
                <p class="mt-4 text-lg font-black text-slate-950">Muscat, Sultanate of Oman</p>
            </div>

            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">↗</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Business Enquiry</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Distribution, retail outlet, B2B and brand partnership.</p>
                <a href="#contact-form" class="mt-4 inline-flex rounded-full bg-blue-600 px-5 py-3 text-sm font-black text-white transition hover:bg-blue-500">Start Now</a>
            </div>
        </div>
    </div>
</section>


{{-- MAIN CONTACT SECTION --}}
<section id="contact-form" class="contact-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            {{-- FORM --}}
            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Send Enquiry
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Tell us how we can help.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Fill the form below for distribution partnership, retail outlet setup, B2B supply, service support or career enquiry.
                </p>

                <form action="#" method="POST" class="mt-8 grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input type="text" name="name" class="contact-input" placeholder="Enter full name">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone</label>
                            <input type="text" name="phone" class="contact-input" placeholder="Enter phone number">
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Email</label>
                            <input type="email" name="email" class="contact-input" placeholder="Enter email">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Company / Brand</label>
                            <input type="text" name="company" class="contact-input" placeholder="Company name">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Enquiry Type</label>
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
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea name="message" rows="5" class="contact-input resize-none" placeholder="Write your message"></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-2 inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Submit Enquiry
                    </button>
                </form>
            </div>

            {{-- CONTACT INFO --}}
            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Contact Details
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    GPT Group Head Office
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Reach GPT Group for business partnership, product distribution, retail support and customer enquiries.
                </p>

                <div class="mt-8 grid gap-5">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <p class="text-sm font-black uppercase tracking-[.2em] text-blue-100">Office Address</p>
                        <p class="mt-3 text-xl font-black">Muscat, Sultanate of Oman</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <p class="text-sm font-black uppercase tracking-[.2em] text-blue-100">Phone</p>
                        <a href="tel:+96824501533" class="mt-3 block text-xl font-black text-white">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <p class="text-sm font-black uppercase tracking-[.2em] text-blue-100">Email</p>
                        <a href="mailto:info@gptgroups.com" class="mt-3 block break-words text-xl font-black text-white">info@gptgroups.com</a>
                    </div>
                </div>

                <div class="mt-8 rounded-[2rem] border border-white/20 bg-white/15 p-7">
                    <h3 class="text-2xl font-black">Need quick business support?</h3>
                    <p class="mt-3 leading-7 text-blue-50">
                        Contact us for brand distribution, authorized retail stores, B2B supply and market expansion support.
                    </p>
                    <a href="mailto:info@gptgroups.com" class="mt-6 inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 transition hover:-translate-y-1">
                        Email Now
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- MAP SECTION --}}
<section class="contact-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3 lg:items-stretch">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Find Us
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Visit or connect with GPT Group.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Add your exact Google Maps embed here. For now, this section is ready with a clean map container.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Business Hours</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Sunday to Thursday, business hours as per Oman local time.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Location</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Muscat, Sultanate of Oman</p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-3 shadow-xl lg:col-span-2">
                <iframe
                    class="h-[480px] w-full rounded-[2rem]"
                    src="https://www.google.com/maps?q=Muscat%20Oman&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>


{{-- ENQUIRY TYPES --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                How We Can Help
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                Connect with the right team.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                Choose the enquiry category that best matches your business requirement.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">D</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Distribution</h3>
                <p class="mt-3 leading-7 text-slate-600">Brand distribution, product launch and channel supply support.</p>
            </div>

            <div class="contact-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">R</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Retail Outlets</h3>
                <p class="mt-3 leading-7 text-slate-600">Authorized mobile store, showroom and retail partner support.</p>
            </div>

            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">B</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">B2B Supply</h3>
                <p class="mt-3 leading-7 text-slate-600">Corporate, institutional, wholesale and dealer supply enquiries.</p>
            </div>

            <div class="contact-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">C</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Careers</h3>
                <p class="mt-3 leading-7 text-slate-600">Career, internship and team joining enquiries with GPT Group.</p>
            </div>
        </div>

    </div>
</section>


{{-- FAQ --}}
<section class="contact-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    FAQs
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Contact questions.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Quick answers for brands, dealers, retailers, B2B buyers and career applicants.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm" open>
                    <summary class="cursor-pointer text-lg font-black text-slate-950">What can I contact GPT Group for?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can contact GPT Group for distribution partnership, retail outlet setup, B2B supply, customer service, brand partnership and career enquiries.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">What is GPT Group’s contact email?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can email GPT Group at info@gptgroups.com.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Does GPT Group support retail store partnerships?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group supports businesses with authorized mobile retail store setup, distribution and market execution.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Where is GPT Group located?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group is based in Muscat, Sultanate of Oman.
                    </p>
                </details>
            </div>
        </div>

    </div>
</section>


{{-- CTA --}}
<section class="contact-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Partner With GPT Group
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Get the competitive advantage with GPT Group.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with us for product distribution, authorized store setup, retail support and B2B market expansion.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#contact-form"
                        class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
