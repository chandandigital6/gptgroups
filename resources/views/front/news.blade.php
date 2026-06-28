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
@include('front.sections.page_hero', ['pageSlug' => 'news'])



{{-- QUICK CATEGORIES --}}

@include('front.sections.quick_facts', ['pageSlug' => 'news'])




{{-- FEATURED UPDATE --}}

@if($featuredUpdateSection)

    <section class="news-section-light py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>
                    @if(!empty($featuredUpdateSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $featuredUpdateSection->label }}
                        </p>
                    @endif

                    @if(!empty($featuredUpdateSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $featuredUpdateSection->title }}
                        </h2>
                    @endif

                    @if(!empty($featuredUpdateSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $featuredUpdateSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($featuredUpdateSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $featuredUpdateSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($featuredUpdateSection->feature_1_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">
                                    ✓
                                </div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
                                    {{ $featuredUpdateSection->feature_1_title }}
                                </h3>

                                @if(!empty($featuredUpdateSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $featuredUpdateSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($featuredUpdateSection->feature_2_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">
                                    ✓
                                </div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
                                    {{ $featuredUpdateSection->feature_2_title }}
                                </h3>

                                @if(!empty($featuredUpdateSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $featuredUpdateSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">

                        @if(!empty($featuredUpdateSection->image))
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $featuredUpdateSection->image) }}"
                                alt="{{ $featuredUpdateSection->image_alt ?: $featuredUpdateSection->title }}"
                            >
                        @else
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $featuredUpdateSection->title ?? 'GPT Group Update' }}"
                            >
                        @endif

                        @if(!empty($featuredUpdateSection->card_title) || !empty($featuredUpdateSection->card_description))
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">

                                @if(!empty($featuredUpdateSection->card_title))
                                    <p class="text-2xl font-black text-slate-950">
                                        {{ $featuredUpdateSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($featuredUpdateSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                        {{ $featuredUpdateSection->card_description }}
                                    </p>
                                @endif

                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

@endif


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



@if($newsCategorySection && $newsCategorySection->activeItems->count())

    <section class="news-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $newsCategorySection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $newsCategorySection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $newsCategorySection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($newsCategorySection->activeItems as $item)

                    @php
                        $boxClass = match($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'blue' => 'border-blue-100 bg-blue-50',
                            'white' => 'border-slate-100 bg-white shadow-sm',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-white shadow-sm',
                        };

                        $iconClass = match($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'blue' => 'bg-blue-600',
                            'slate' => 'bg-slate-700',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="news-card-hover rounded-[2rem] border {{ $boxClass }} p-8 shadow-sm">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl {{ $iconClass }} text-2xl font-black text-white">
                            {{ $item->icon_text }}
                        </div>

                        <h3 class="mt-6 text-2xl font-black text-slate-950">
                            {{ $item->title }}
                        </h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            {{ $item->description }}
                        </p>
                    </div>

                @endforeach
            </div>

        </div>
    </section>

@endif


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

@if($faqSection && $faqSection->activeItems->count())

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid gap-12 lg:grid-cols-2">

                <div>
                    @if(!empty($faqSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $faqSection->label }}
                        </p>
                    @endif

                    @if(!empty($faqSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                            {{ $faqSection->title }}
                        </h2>
                    @endif

                    @if(!empty($faqSection->description))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $faqSection->description }}
                        </p>
                    @endif

                    @if(!empty($faqSection->button_text))
                        <a href="{{ $faqSection->button_link ?: '#' }}"
                           class="mt-8 inline-flex rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                            {{ $faqSection->button_text }}
                        </a>
                    @endif
                </div>

                <div class="grid gap-4">
                    @foreach($faqSection->activeItems as $faq)
                        <details class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6 shadow-sm"
                                 {{ $faq->is_open ? 'open' : '' }}>

                            <summary class="cursor-pointer text-lg font-black text-slate-950">
                                {{ $faq->question }}
                            </summary>

                            @if(!empty($faq->answer))
                                <p class="mt-3 leading-7 text-slate-600">
                                    {{ $faq->answer }}
                                </p>
                            @endif
                        </details>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

@endif


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
