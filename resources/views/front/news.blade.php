@extends('front_pages.front_components.main')

@section('content')

<style>
    .news-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .news-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .news-blob {
        filter: blur(10px);
        opacity: .45;
        animation: newsBlob 7s ease-in-out infinite alternate;
    }

    @keyframes newsBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .news-card-hover {
        transition: all .35s ease;
    }

    .news-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .news-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .news-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .news-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .news-input::placeholder {
        color: #94a3b8;
    }

    .news-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- NEWS HERO --}}
<section class="relative overflow-hidden news-soft-bg">
    <div class="absolute -top-24 -right-20 h-96 w-96 rounded-full bg-cyan-300 news-blob"></div>
    <div class="absolute top-44 -left-28 h-96 w-96 rounded-full bg-blue-300 news-blob"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            {{-- Content --}}
            <div>
                <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                    GPT Group News
                </div>

                <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    News, Offers
                    <span class="mt-2 block news-gradient-text">
                        Launches & Events
                    </span>
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                    Stay updated with GPT Group’s latest product launches, retail offers, partner programs, service updates and business announcements.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#latest-updates"
                        class="inline-flex items-center justify-center rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        View Updates
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1 hover:bg-slate-50">
                        Send Enquiry
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black news-gradient-text">Offers</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Retail Deals</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black news-gradient-text">Launch</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Products</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black news-gradient-text">Events</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Retail</p>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-100 bg-white/80 p-5 shadow-sm backdrop-blur">
                        <p class="text-2xl font-black news-gradient-text">GPT</p>
                        <p class="mt-1 text-xs font-bold text-slate-500">Updates</p>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group News"
                        class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black leading-tight text-slate-950">
                            Latest Business Updates
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                            Offers, launches, events, partner announcements and service updates.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- QUICK CATEGORIES --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">01</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Latest Offers</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Retail deals, promotional offers and customer-focused campaigns.
                </p>
            </div>

            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">02</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Product Launches</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    New smartphones, accessories, gadgets and partner brand updates.
                </p>
            </div>

            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">03</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Retail Events</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Store openings, retail activations and customer engagement events.
                </p>
            </div>

            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">04</div>
                <h3 class="mt-6 text-xl font-black text-slate-950">Partner Training</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Dealer support, sales training and product knowledge sessions.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- FEATURED UPDATE --}}
<section class="news-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Featured Update
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    GPT Group continues to expand retail and distribution support.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s updates section is designed to showcase new product announcements, promotional campaigns, retail outlet news, service centre updates and B2B program highlights.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Use this page to keep dealers, retailers, B2B partners and customers informed about what is new inside the GPT Group ecosystem.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">✓</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Partner Updates</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Announcements for retail partners, dealers and business customers.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">✓</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Market Activities</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Launch campaigns, retail promotions and customer engagement.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                    <img
                        class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                        alt="GPT Group Update"
                    >

                    <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                        <p class="text-2xl font-black text-slate-950">
                            Latest Business Updates
                        </p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
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

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Latest Updates
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    News & announcements.
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Add your real news posts, offer banners and launch announcements here.
                </p>
            </div>

            <a href="{{ route('contact') }}"
                class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                Share Enquiry
            </a>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">

            <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80"
                        alt="Product Launch"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Read More
                    </a>
                </div>
            </article>

            <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1607082349566-187342175e2f?auto=format&fit=crop&w=900&q=80"
                        alt="Offers"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
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
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Read More
                    </a>
                </div>
            </article>

            <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=900&q=80"
                        alt="Partner Training"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
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
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Read More
                    </a>
                </div>
            </article>

            <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail Event"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">
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
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Read More
                    </a>
                </div>
            </article>

            <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="Distribution"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
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
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Read More
                    </a>
                </div>
            </article>

            <article class="group news-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                <div class="relative h-60 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=900&q=80"
                        alt="Service Update"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                    >
                    <span class="absolute left-5 top-5 rounded-full bg-cyan-500 px-4 py-2 text-xs font-black text-white">
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
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                        Read More
                    </a>
                </div>
            </article>

        </div>
    </div>
</section>


{{-- NEWS CATEGORIES --}}
<section class="news-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">
                Update Categories
            </p>

            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                Everything important in one place.
            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">
                Keep customers and partners updated with latest business activities.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">O</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Offers</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Retail discounts, bundle offers and customer promotions.
                </p>
            </div>

            <div class="news-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">L</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Launches</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    New mobiles, accessories, gadgets and product announcements.
                </p>
            </div>

            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">E</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Events</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Retail events, showroom activities and customer engagement.
                </p>
            </div>

            <div class="news-card-hover rounded-[2rem] border border-slate-100 bg-white p-8 shadow-sm">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">T</div>
                <h3 class="mt-6 text-2xl font-black text-slate-950">Training</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Product knowledge, dealer training and partner enablement.
                </p>
            </div>
        </div>

    </div>
</section>


{{-- SUBSCRIBE / ENQUIRY --}}
<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Stay Connected
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Get updates about products, offers and partnerships.
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Retailers, dealers, B2B buyers and customers can contact GPT Group for upcoming launches, stock availability, offers and partnership announcements.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Phone</h3>
                        <a href="tel:+96824501533" class="mt-2 block text-sm text-blue-50">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block text-sm text-blue-50">info@gptgroups.com</a>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-slate-50 p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    News Enquiry
                </p>

                <h3 class="mt-4 text-3xl font-black text-slate-950">
                    Ask about latest updates
                </h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <input
                            type="text"
                            name="name"
                            class="news-input"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="contact"
                            class="news-input"
                            placeholder="Phone / Email"
                        >
                    </div>

                    <select
                        name="enquiry_type"
                        class="news-input"
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
                        class="news-input resize-none"
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
<section class="news-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    FAQs
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    News & update questions.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Useful information for customers, dealers, retailers and B2B partners.
                </p>
            </div>

            <div class="grid gap-4">
                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm" open>
                    <summary class="cursor-pointer text-lg font-black text-slate-950">What type of updates can be published here?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Latest offers, product launches, retail events, partner training, distribution updates and GPT Care service updates.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Can dealers ask about stock availability?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. Dealers and B2B buyers can use the enquiry form for stock availability and product launch information.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">Can offers be added dynamically later?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Yes. This static layout can later be connected with a backend news/offers table for dynamic posts.
                    </p>
                </details>

                <details class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                    <summary class="cursor-pointer text-lg font-black text-slate-950">How can customers contact GPT Group?</summary>
                    <p class="mt-3 leading-7 text-slate-600">
                        Customers can contact GPT Group at +968 2450-1533 or info@gptgroups.com.
                    </p>
                </details>
            </div>
        </div>

    </div>
</section>


{{-- CTA --}}
<section class="news-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Stay Updated
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Don’t miss GPT Group announcements.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Connect with GPT Group for product launches, offers, retail events, partner programs and B2B updates.
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
