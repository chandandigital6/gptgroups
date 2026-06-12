@extends('front_pages.front_components.main')

@section('content')

{{-- NEWS HERO --}}
<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1600&q=80"
            alt="GPT Group News"
            class="h-full w-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_35%),radial-gradient(circle_at_85%_15%,rgba(37,99,235,.25),transparent_32%)]"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-cyan-300"></span>
                GPT Group News
            </div>

            <h1 class="mt-7 text-5xl sm:text-6xl lg:text-7xl font-black leading-[.95] tracking-tight">
                News, Offers
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-400 bg-clip-text text-transparent">
                    Launches & Events
                </span>
            </h1>

            <p class="mt-7 max-w-3xl text-lg sm:text-xl leading-8 text-slate-300">
                Stay updated with GPT Group’s latest product launches, retail offers, partner programs, service updates and business announcements.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#latest-updates" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl hover:-translate-y-1 transition">
                    View Updates
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                    Send Enquiry
                </a>
            </div>
        </div>
    </div>
</section>


{{-- QUICK CATEGORIES --}}
<section class="relative z-10 -mt-10 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">01</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Latest Offers</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Retail deals, promotional offers and customer-focused campaigns.
                </p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">02</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Product Launches</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    New smartphones, accessories, gadgets and partner brand updates.
                </p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">03</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Retail Events</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Store openings, retail activations and customer engagement events.
                </p>
            </div>

            <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-slate-950 text-xl font-black text-white">04</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Partner Training</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Dealer support, sales training and product knowledge sessions.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- FEATURED UPDATE --}}
<section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Featured Update</p>

                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight text-slate-950">
                    GPT Group continues to expand retail and distribution support.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s updates section is designed to showcase new product announcements, promotional campaigns, retail outlet news, service centre updates and B2B program highlights.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Use this page to keep dealers, retailers, B2B partners and customers informed about what is new inside the GPT Group ecosystem.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-xl font-black text-blue-700">✓</div>
                        <h3 class="mt-5 text-xl font-black">Partner Updates</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Announcements for retail partners, dealers and business customers.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white p-6 shadow-sm">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-50 text-xl font-black text-cyan-700">✓</div>
                        <h3 class="mt-5 text-xl font-black">Market Activities</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Launch campaigns, retail promotions and customer engagement.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] bg-white p-5 shadow-2xl">
                    <img
                        class="h-[520px] w-full rounded-[2rem] object-cover"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT Group Update"
                    >

                    <div class="absolute bottom-8 left-8 right-8 rounded-[2rem] bg-slate-950/90 p-6 text-white backdrop-blur">
                        <p class="text-3xl font-black">Latest Business Updates</p>
                        <p class="mt-2 text-slate-300">
                            Offers, launches, events and partner announcements.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- LATEST UPDATES --}}
<section id="latest-updates" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">Latest Updates</p>
                <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                    News & announcements.
                </h2>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Add your real news posts, offer banners and launch announcements here.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="inline-flex w-fit rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition">
                Share Enquiry
            </a>
        </div>

        <div class="mt-12 grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- Update 1 --}}
            <article class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                        alt="Product Launch"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
                        Product Launch
                    </span>
                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-blue-700">New Product Update</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-950">
                        New mobile products and accessories coming to retail channels.
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Use this card to publish new smartphone, tablet, watch and accessory launch announcements.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Read More
                    </a>
                </div>
            </article>

            {{-- Update 2 --}}
            <article class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1607082349566-187342175e2f?auto=format&fit=crop&w=900&q=80"
                        alt="Offers"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">
                        Offers
                    </span>
                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-blue-700">Retail Offer</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-950">
                        Special retail offers for customers and partner stores.
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Add seasonal offers, bundle discounts, accessories deals and showroom promotions here.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Read More
                    </a>
                </div>
            </article>

            {{-- Update 3 --}}
            <article class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=900&q=80"
                        alt="Partner Training"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-slate-950 px-4 py-2 text-xs font-black text-white">
                        Training
                    </span>
                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-blue-700">Partner Training</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-950">
                        Product knowledge and sales training for retail partners.
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Publish dealer training updates, product demo events and sales enablement programs.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Read More
                    </a>
                </div>
            </article>

            {{-- Update 4 --}}
            <article class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail Event"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
                        Retail Event
                    </span>
                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-blue-700">Retail Activation</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-950">
                        Retail events and showroom customer engagement activities.
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Use this section for event announcements, showroom activity and customer campaigns.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Read More
                    </a>
                </div>
            </article>

            {{-- Update 5 --}}
            <article class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="Distribution"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">
                        Distribution
                    </span>
                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-blue-700">Distribution Update</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-950">
                        Warehouse, stock movement and partner distribution updates.
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Add updates about new stock arrival, channel support and B2B supply announcements.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Read More
                    </a>
                </div>
            </article>

            {{-- Update 6 --}}
            <article class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="relative h-60">
                    <img
                        src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=900&q=80"
                        alt="Service Update"
                        class="h-full w-full object-cover"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-slate-950 px-4 py-2 text-xs font-black text-white">
                        Service
                    </span>
                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-blue-700">GPT Care Update</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-950">
                        Mobile repair, service centre and customer support updates.
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Publish GPT Care repair service announcements, pickup support and service centre updates.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-slate-950 px-6 py-3 text-sm font-black text-white">
                        Read More
                    </a>
                </div>
            </article>

        </div>
    </div>
</section>


{{-- NEWS CATEGORIES --}}
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Update Categories</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                Everything important in one place.
            </h2>
            <p class="mt-5 text-lg leading-8 text-slate-600">
                Keep customers and partners updated with latest business activities.
            </p>
        </div>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">O</div>
                <h3 class="mt-6 text-2xl font-black">Offers</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Retail discounts, bundle offers and customer promotions.
                </p>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-400 text-slate-950 text-2xl font-black">L</div>
                <h3 class="mt-6 text-2xl font-black">Launches</h3>
                <p class="mt-3 leading-7 text-slate-300">
                    New mobiles, accessories, gadgets and product announcements.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">E</div>
                <h3 class="mt-6 text-2xl font-black">Events</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Retail events, showroom activities and customer engagement.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 border border-slate-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-white text-2xl font-black">T</div>
                <h3 class="mt-6 text-2xl font-black">Training</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Product knowledge, dealer training and partner enablement.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- SUBSCRIBE / ENQUIRY --}}
<section class="bg-slate-950 py-16 lg:py-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-stretch">
            <div class="rounded-[2.5rem] bg-white/10 p-8 sm:p-10 border border-white/10">
                <p class="font-black uppercase tracking-[.3em] text-cyan-300">Stay Connected</p>

                <h2 class="mt-4 text-4xl sm:text-5xl font-black leading-tight">
                    Get updates about products, offers and partnerships.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-300">
                    Retailers, dealers, B2B buyers and customers can contact GPT Group for upcoming launches, stock availability, offers and partnership announcements.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-5">
                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Phone</h3>
                        <a href="tel:+96824501533" class="mt-2 block text-sm text-slate-300">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block text-sm text-slate-300">info@gptgroups.com</a>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-white p-8 sm:p-10 text-slate-950 shadow-xl">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">News Enquiry</p>
                <h3 class="mt-4 text-3xl font-black">Ask about latest updates</h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-4">
                        <input
                            type="text"
                            name="name"
                            class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="contact"
                            class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                            placeholder="Phone / Email"
                        >
                    </div>

                    <select
                        name="enquiry_type"
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                    >
                        <option>Latest Offers</option>
                        <option>Product Launch</option>
                        <option>Retail Events</option>
                        <option>Partner Training</option>
                        <option>Stock Availability</option>
                        <option>Service Update</option>
                    </select>

                    <textarea
                        name="message"
                        rows="4"
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 outline-none focus:border-blue-500"
                        placeholder="Message"
                    ></textarea>

                    <button
                        type="submit"
                        class="inline-flex justify-center rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-8 py-4 text-sm font-black text-white shadow-xl hover:-translate-y-1 transition"
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
                    News & update questions.
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful information for customers, dealers, retailers and B2B partners.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100" open>
                    <summary class="cursor-pointer text-lg font-black">What type of updates can be published here?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Latest offers, product launches, retail events, partner training, distribution updates and GPT Care service updates.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Can dealers ask about stock availability?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. Dealers and B2B buyers can use the enquiry form for stock availability and product launch information.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">Can offers be added dynamically later?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. This static layout can later be connected with a backend news/offers table for dynamic posts.
                    </p>
                </details>

                <details class="rounded-[1.75rem] bg-slate-50 p-6 border border-slate-100">
                    <summary class="cursor-pointer text-lg font-black">How can customers contact GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Customers can contact GPT Group at +968 2450-1533 or info@gptgroups.com.
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
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">Stay Updated</p>
                    <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight">
                        Don’t miss GPT Group announcements.
                    </h2>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with GPT Group for product launches, offers, retail events, partner programs and B2B updates.
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