@extends('front_pages.front_components.main')

@section('content')

<style>
    .group-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .group-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .group-blob {
        filter: blur(10px);
        opacity: .45;
        animation: groupBlob 7s ease-in-out infinite alternate;
    }

    @keyframes groupBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .group-card-hover {
        transition: all .35s ease;
    }

    .group-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .group-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .group-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .group-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .group-input::placeholder {
        color: #94a3b8;
    }

    .group-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- GROUP COMPANIES HERO --}}

@include('front.sections.page_hero', ['pageSlug' => 'group-companies'])



{{-- QUICK fact --}}

@include('front.sections.quick_facts', ['pageSlug' => 'group-companies'])

{{-- INTRO --}}
<section class="group-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    GPT Group Business House
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    One group, multiple growth-focused companies.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group began with telecom and technology distribution, specializing in mobile devices, smartphones, tablets and accessories for B2B and B2C segments.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Over time, the group expanded into online retail, fashion retail, beauty care, hospitality and I.T. services, creating a diversified platform for customers, partners and businesses.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">01</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Technology Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Mobile devices, tablets, accessories, gadgets and business supply.
                        </p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">02</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Diversified Expansion</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Online, fashion, beauty, hospitality and I.T. verticals.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img
                        class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                        alt="Technology business"
                    >

                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail business"
                    >

                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                        <p class="text-4xl font-black group-gradient-text">GPT</p>
                        <p class="mt-3 text-lg font-bold text-slate-950">Business Group</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            Distribution, retail, online, beauty, hospitality and I.T.
                        </p>
                    </div>

                    <img
                        class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80"
                        alt="Business team"
                    >
                </div>
            </div>

        </div>
    </div>
</section>


{{-- COMPANIES / VERTICALS --}}


@if($businessVerticalSection && $businessVerticalSection->activeItems->count())
    <section id="{{ $businessVerticalSection->section_id ?: 'companies' }}" class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $businessVerticalSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $businessVerticalSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $businessVerticalSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($businessVerticalSection->activeItems as $item)
                    @php
                        $badgeClass = match($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'pink' => 'bg-pink-500',
                            'slate' => 'bg-slate-800',
                            default => 'bg-blue-600',
                        };

                        $tagClass = match($item->theme) {
                            'cyan' => 'bg-cyan-50 text-cyan-700',
                            'pink' => 'bg-pink-50 text-pink-700',
                            'slate' => 'bg-slate-100 text-slate-700',
                            default => 'bg-blue-50 text-blue-700',
                        };
                    @endphp

                    <div class="group group-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                        <div class="relative h-60 overflow-hidden">
                            @if($item->image)
                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->image_alt ?: $item->title }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                                >
                            @endif

                            @if($item->badge_text)
                                <span class="absolute left-5 top-5 rounded-full {{ $badgeClass }} px-4 py-2 text-xs font-black text-white">
                                    {{ $item->badge_text }}
                                </span>
                            @endif
                        </div>

                        <div class="p-7">
                            <h3 class="text-2xl font-black text-slate-950">
                                {{ $item->title }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ $item->description }}
                            </p>

                            @if($item->tags)
                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach($item->tagList() as $tag)
                                        <span class="rounded-full {{ $tagClass }} px-3 py-1 text-xs font-bold">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif



{{-- BUSINESS MODEL --}}

@if($businessModelSection)

    <section class="group-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div class="relative order-2 lg:order-1">
                    <div class="absolute -inset-5 rounded-full bg-blue-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">

                        @if(!empty($businessModelSection->image))
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $businessModelSection->image) }}"
                                alt="{{ $businessModelSection->image_alt ?: $businessModelSection->title }}"
                            >
                        @else
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $businessModelSection->title ?? 'GPT Group Business Model' }}"
                            >
                        @endif

                        @if(!empty($businessModelSection->card_title) || !empty($businessModelSection->card_description))
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">

                                @if(!empty($businessModelSection->card_title))
                                    <p class="text-2xl font-black text-slate-950">
                                        {{ $businessModelSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($businessModelSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                        {{ $businessModelSection->card_description }}
                                    </p>
                                @endif

                            </div>
                        @endif

                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    @if(!empty($businessModelSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $businessModelSection->label }}
                        </p>
                    @endif

                    @if(!empty($businessModelSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $businessModelSection->title }}
                        </h2>
                    @endif

                    @if(!empty($businessModelSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $businessModelSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($businessModelSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $businessModelSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($businessModelSection->feature_1_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $businessModelSection->feature_1_title }}
                                </h3>

                                @if(!empty($businessModelSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $businessModelSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($businessModelSection->feature_2_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $businessModelSection->feature_2_title }}
                                </h3>

                                @if(!empty($businessModelSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $businessModelSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($businessModelSection->feature_3_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $businessModelSection->feature_3_title }}
                                </h3>

                                @if(!empty($businessModelSection->feature_3_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $businessModelSection->feature_3_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($businessModelSection->feature_4_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $businessModelSection->feature_4_title }}
                                </h3>

                                @if(!empty($businessModelSection->feature_4_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $businessModelSection->feature_4_description }}
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



{{-- PRINCIPLES --}}

@if($groupPrinciplesSection)

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>
                    @if(!empty($groupPrinciplesSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $groupPrinciplesSection->label }}
                        </p>
                    @endif

                    @if(!empty($groupPrinciplesSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $groupPrinciplesSection->title }}
                        </h2>
                    @endif

                    @if(!empty($groupPrinciplesSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $groupPrinciplesSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($groupPrinciplesSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $groupPrinciplesSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($groupPrinciplesSection->feature_1_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $groupPrinciplesSection->feature_1_title }}
                                </h3>

                                @if(!empty($groupPrinciplesSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $groupPrinciplesSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($groupPrinciplesSection->feature_2_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $groupPrinciplesSection->feature_2_title }}
                                </h3>

                                @if(!empty($groupPrinciplesSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $groupPrinciplesSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($groupPrinciplesSection->feature_3_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $groupPrinciplesSection->feature_3_title }}
                                </h3>

                                @if(!empty($groupPrinciplesSection->feature_3_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $groupPrinciplesSection->feature_3_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($groupPrinciplesSection->feature_4_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $groupPrinciplesSection->feature_4_title }}
                                </h3>

                                @if(!empty($groupPrinciplesSection->feature_4_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $groupPrinciplesSection->feature_4_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-6 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">

                        @if(!empty($groupPrinciplesSection->image))
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $groupPrinciplesSection->image) }}"
                                alt="{{ $groupPrinciplesSection->image_alt ?: $groupPrinciplesSection->title }}"
                            >
                        @else
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $groupPrinciplesSection->title ?? 'Group Principles' }}"
                            >
                        @endif

                        @if(!empty($groupPrinciplesSection->card_title) || !empty($groupPrinciplesSection->card_description))
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">

                                @if(!empty($groupPrinciplesSection->card_title))
                                    <p class="text-2xl font-black text-slate-950">
                                        {{ $groupPrinciplesSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($groupPrinciplesSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                        {{ $groupPrinciplesSection->card_description }}
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

{{-- ENQUIRY --}}
<section class="group-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Group Enquiry
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Want to collaborate with GPT Group?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect with GPT Group for telecom distribution, online services, fashion retail, beauty care, hospitality, I.T. solutions or business partnership.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Business Partnership</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Brand, retail, B2B and group-level collaboration.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Vertical Expansion</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Explore new opportunities with GPT Group companies.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Quick Enquiry
                </p>

                <h3 class="mt-4 text-3xl font-black text-slate-950">
                    Submit business enquiry
                </h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <input
                            type="text"
                            name="name"
                            class="group-input"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="company"
                            class="group-input"
                            placeholder="Company / Brand"
                        >
                    </div>

                    <input
                        type="text"
                        name="contact"
                        class="group-input"
                        placeholder="Phone / Email"
                    >

                    <select
                        name="vertical"
                        class="group-input"
                    >
                        <option>Telecom Distribution</option>
                        <option>Online Services / E-Commerce</option>
                        <option>Beauty Care</option>
                        <option>Fashion Retail</option>
                        <option>I.T. Solutions</option>
                        <option>Hospitality</option>
                        <option>General Business Partnership</option>
                    </select>

                    <textarea
                        name="message"
                        rows="4"
                        class="group-input resize-none"
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
<section class="group-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Build With GPT Group
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Partner with a diversified business house.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Work with GPT Group across technology distribution, online services, fashion retail, beauty care, hospitality and I.T. growth opportunities.
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
