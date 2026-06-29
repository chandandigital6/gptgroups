@extends('front_pages.front_components.main')

@section('content')

<style>
    .network-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .network-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .network-blob {
        filter: blur(10px);
        opacity: .45;
        animation: networkBlob 7s ease-in-out infinite alternate;
    }

    @keyframes networkBlob {
        from {
            transform: translateY(0) scale(1);
        }

        to {
            transform: translateY(18px) scale(1.06);
        }
    }

    .network-card-hover {
        transition: all .35s ease;
    }

    .network-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .network-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .network-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .network-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .network-input::placeholder {
        color: #94a3b8;
    }

    .network-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- NETWORK HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'networks'])



{{-- QUICK NETWORK CARDS --}}

@include('front.sections.quick_facts', ['pageSlug' => 'networks'])



{{-- NETWORK INTRO --}}

@include('front.sections.common_split_section', [
    'pageSlug' => 'network',
    'sectionKey' => 'distribution-network'
])




{{-- COVERAGE LOCATIONS --}}

@if($coverageLocationSection && $coverageLocationSection->activeItems->count())

    <section id="coverage" class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $coverageLocationSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $coverageLocationSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $coverageLocationSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($coverageLocationSection->activeItems as $item)

                    @php
                        $boxClass = match($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'blue' => 'border-blue-100 bg-blue-50',
                            'white' => 'border-slate-100 bg-white shadow-sm',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-slate-50',
                        };

                        $iconClass = match($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'blue' => 'bg-blue-600',
                            'slate' => 'bg-slate-700',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="network-card-hover rounded-[2rem] border {{ $boxClass }} p-8">
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


{{-- CHANNELS --}}


@if($channelNetworkSection && $channelNetworkSection->activeItems->count())

    <section class="network-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $channelNetworkSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $channelNetworkSection->title }}
                    </h2>

                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        {{ $channelNetworkSection->description }}
                    </p>
                </div>

                <a href="{{ route('contact') }}"
                    class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                    Become Partner
                </a>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($channelNetworkSection->activeItems as $item)

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

                    <div class="network-card-hover rounded-[2rem] border {{ $boxClass }} p-8 shadow-sm">
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



{{-- OPERATING MODEL --}}

@if($operatingModelSection)

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>
                    @if(!empty($operatingModelSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $operatingModelSection->label }}
                        </p>
                    @endif

                    @if(!empty($operatingModelSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $operatingModelSection->title }}
                        </h2>
                    @endif

                    @if(!empty($operatingModelSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $operatingModelSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($operatingModelSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $operatingModelSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($operatingModelSection->feature_1_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $operatingModelSection->feature_1_title }}
                                </h3>

                                @if(!empty($operatingModelSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $operatingModelSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($operatingModelSection->feature_2_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $operatingModelSection->feature_2_title }}
                                </h3>

                                @if(!empty($operatingModelSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $operatingModelSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($operatingModelSection->feature_3_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $operatingModelSection->feature_3_title }}
                                </h3>

                                @if(!empty($operatingModelSection->feature_3_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $operatingModelSection->feature_3_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($operatingModelSection->feature_4_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $operatingModelSection->feature_4_title }}
                                </h3>

                                @if(!empty($operatingModelSection->feature_4_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $operatingModelSection->feature_4_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-6 rounded-full bg-blue-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">

                        @if(!empty($operatingModelSection->image))
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $operatingModelSection->image) }}"
                                alt="{{ $operatingModelSection->image_alt ?: $operatingModelSection->title }}"
                            >
                        @else
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $operatingModelSection->title ?? 'Warehouse operations' }}"
                            >
                        @endif

                        @if(!empty($operatingModelSection->card_title) || !empty($operatingModelSection->card_description))
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">

                                @if(!empty($operatingModelSection->card_title))
                                    <p class="text-2xl font-black text-slate-950">
                                        {{ $operatingModelSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($operatingModelSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                        {{ $operatingModelSection->card_description }}
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


{{-- MAP STYLE SECTION --}}
<section class="network-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid gap-8 lg:grid-cols-3 lg:items-stretch">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Network Map
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                    Key support points in Oman.
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Use this section to show your exact map locations or Google Map embeds for warehouse and outlet points.
                </p>

                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Muscat / Ghala</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Warehouse and main supply point.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-black text-slate-950">Sohar / Sur / Salalah</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Regional market and partner support.</p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-3 shadow-xl lg:col-span-2">
                <iframe
                    class="h-[480px] w-full rounded-[2rem]"
                    src="https://www.google.com/maps?q=Oman&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

    </div>
</section>


{{-- NETWORK ENQUIRY --}}

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Network Partnership
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Want to join GPT Group’s distribution network?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Connect for retail partnership, wholesale supply, KDR network, B2B distribution and regional product availability.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Retail Partners</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Customer-facing sales and product visibility.</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">B2B Supply</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-50">Corporate, institutional and bulk product needs.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-slate-50 p-8 shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Quick Enquiry
                </p>

                <h3 class="mt-4 text-3xl font-black text-slate-950">
                    Submit network enquiry
                </h3>

                <form action="#" method="POST" class="mt-7 grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <input
                            type="text"
                            name="name"
                            class="network-input"
                            placeholder="Full Name"
                        >

                        <input
                            type="text"
                            name="company"
                            class="network-input"
                            placeholder="Company / Brand"
                        >
                    </div>

                    <input
                        type="text"
                        name="contact"
                        class="network-input"
                        placeholder="Phone / Email"
                    >

                    <select
                        name="enquiry_type"
                        class="network-input"
                    >
                        <option>Retail Partner</option>
                        <option>Wholesale</option>
                        <option>KDR Network</option>
                        <option>B2B Supply</option>
                        <option>Warehouse / Logistics</option>
                        <option>Brand Distribution</option>
                    </select>

                    <textarea
                        name="message"
                        rows="4"
                        class="network-input resize-none"
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
<section class="network-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Build With GPT Group
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Expand through a stronger distribution network.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Partner with GPT Group for retail coverage, warehouse-backed distribution, wholesale supply and B2B market growth.
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
