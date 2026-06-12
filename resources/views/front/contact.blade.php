@extends('front_pages.front_components.main')

@section('content')

{{-- CONTACT HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80"
            alt="Contact GPT Group"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                Contact GPT Group
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                Let’s Build
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Business Together
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                Connect with GPT Group for brand partnership, product distribution, retail outlet support, B2B enquiries, careers and customer service.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#contact-form" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    Send Enquiry
                </a>
                <a href="tel:+96824501533" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Call Now
                </a>
            </div>
        </div>
    </div>
</section>


{{-- CONTACT CARDS --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-2xl font-black text-blue-700">☎</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Phone</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Speak with GPT Group team.</p>
                <a href="tel:+96824501533" class="mt-4 block text-lg font-black text-blue-700">+968 2450-1533</a>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-50 text-2xl font-black text-cyan-700">✉</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Email</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Send enquiries and business requests.</p>
                <a href="mailto:info@gptgroups.com" class="mt-4 block text-lg font-black text-blue-700">info@gptgroups.com</a>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-2xl font-black text-blue-700">⌖</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Office</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Main office and business operations.</p>
                <p class="mt-4 text-lg font-black text-slate-950">Muscat, Sultanate of Oman</p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-slate-950 text-2xl font-black text-white">↗</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Business Enquiry</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">Distribution, retail outlet, B2B and brand partnership.</p>
                <a href="#contact-form" class="mt-4 inline-flex rounded-full bg-slate-950 px-5 py-3 text-sm font-black text-white">Start Now</a>
            </div>
        </div>
    </div>
</section>


{{-- MAIN CONTACT SECTION --}}
<section id="contact-form" class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">

            {{-- FORM --}}
            <div class="rounded-[2.5rem] bg-white p-8 sm:p-10 shadow-xl border border-slate-100">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Send Enquiry</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight text-slate-950">
                    Tell us how we can help.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Fill the form below for distribution partnership, retail outlet setup, B2B supply, service support or career enquiry.
                </p>

                <form action="#" method="POST" class="mt-8 grid gap-4">
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
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone</label>
                            <input
                                type="text"
                                name="phone"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                                placeholder="Enter phone number"
                            >
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                                placeholder="Enter email"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Company / Brand</label>
                            <input
                                type="text"
                                name="company"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                                placeholder="Company name"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Enquiry Type</label>
                        <select
                            name="enquiry_type"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                        >
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
                        <textarea
                            name="message"
                            rows="5"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none transition focus:border-blue-500 focus:bg-white"
                            placeholder="Write your message"
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

            {{-- CONTACT INFO --}}
            <div class="rounded-[2.5rem] bg-slate-950 p-8 sm:p-10 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Contact Details</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    GPT Group Head Office
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-300">
                    Reach GPT Group for business partnership, product distribution, retail support and customer enquiries.
                </p>

                <div class="mt-8 grid gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6 border border-white/10">
                        <p class="text-sm font-black uppercase tracking-[.2em] text-cyan-300">Office Address</p>
                        <p class="mt-3 text-xl font-black">Muscat, Sultanate of Oman</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6 border border-white/10">
                        <p class="text-sm font-black uppercase tracking-[.2em] text-cyan-300">Phone</p>
                        <a href="tel:+96824501533" class="mt-3 block text-xl font-black text-white">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6 border border-white/10">
                        <p class="text-sm font-black uppercase tracking-[.2em] text-cyan-300">Email</p>
                        <a href="mailto:info@gptgroups.com" class="mt-3 block text-xl font-black text-white">info@gptgroups.com</a>
                    </div>
                </div>

                <div class="mt-8 rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-7">
                    <h3 class="text-2xl font-black">Need quick business support?</h3>
                    <p class="mt-3 leading-7 text-blue-50">
                        Contact us for brand distribution, authorized retail stores, B2B supply and market expansion support.
                    </p>
                    <a href="mailto:info@gptgroups.com" class="mt-6 inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950">
                        Email Now
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- MAP SECTION --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 items-stretch">
            <div class="lg:col-span-1">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Find Us</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight text-slate-950">
                    Visit or connect with GPT Group.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Add your exact Google Maps embed here. For now, this section is ready with a clean map container.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Business Hours</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Sunday to Thursday, business hours as per Oman local time.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-slate-50 p-6">
                        <h3 class="text-xl font-black">Location</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Muscat, Sultanate of Oman</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 overflow-hidden rounded-[2.5rem] bg-slate-100 shadow-xl border border-slate-100">
                {{-- Replace src with exact Google Map embed URL --}}
                <iframe
                    class="h-[480px] w-full"
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
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">How We Can Help</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Connect with the right team.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                Choose the enquiry category that best matches your business requirement.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">D</div>
                <h3 class="mt-6 text-2xl font-black">Distribution</h3>
                <p class="mt-3 leading-7 text-slate-600">Brand distribution, product launch and channel supply support.</p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">R</div>
                <h3 class="mt-6 text-2xl font-black">Retail Outlets</h3>
                <p class="mt-3 leading-7 text-slate-300">Authorized mobile store, showroom and retail partner support.</p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">B</div>
                <h3 class="mt-6 text-2xl font-black">B2B Supply</h3>
                <p class="mt-3 leading-7 text-slate-600">Corporate, institutional, wholesale and dealer supply enquiries.</p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">C</div>
                <h3 class="mt-6 text-2xl font-black">Careers</h3>
                <p class="mt-3 leading-7 text-slate-600">Career, internship and team joining enquiries with GPT Group.</p>
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
                    Contact questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Quick answers for brands, dealers, retailers, B2B buyers and career applicants.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">What can I contact GPT Group for?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can contact GPT Group for distribution partnership, retail outlet setup, B2B supply, customer service, brand partnership and career enquiries.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">What is GPT Group’s contact email?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        You can email GPT Group at info@gptgroups.com.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Does GPT Group support retail store partnerships?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. GPT Group supports businesses with authorized mobile retail store setup, distribution and market execution.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Where is GPT Group located?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        GPT Group is based in Muscat, Sultanate of Oman.
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
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Partner With GPT Group</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Get the competitive advantage with GPT Group.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with us for product distribution, authorized store setup, retail support and B2B market expansion.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#contact-form" class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection