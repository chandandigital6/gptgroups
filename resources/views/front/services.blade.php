@extends('front_pages.front_components.main')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Safe Image Helper
    |--------------------------------------------------------------------------
    | Storage image missing/null hone par fallback image return karega.
    */
    $serviceImage = function ($path, $fallback) {
        if (!empty($path)) {
            $cleanPath = ltrim($path, '/');

            if (file_exists(public_path('storage/' . $cleanPath))) {
                return asset('storage/' . $cleanPath);
            }
        }

        return $fallback;
    };
@endphp

<style>
    :root {
        --gpt-blue: #2563eb;
        --gpt-cyan: #06b6d4;
        --gpt-dark: #0f172a;
    }

    html {
        scroll-behavior: smooth;
    }

    .service-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .service-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .08), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .service-card-hover {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .service-card-hover:hover {
        transform: translateY(-5px);
        border-color: rgba(37, 99, 235, .18);
        box-shadow: 0 18px 48px rgba(15, 23, 42, .10);
    }

    .service-input {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: .8rem;
        background: #ffffff;
        padding: .75rem 1rem;
        color: #0f172a;
        font-size: .875rem;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .service-input::placeholder {
        color: #94a3b8;
    }

    .service-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, .14);
    }

    .service-image-wrap {
        overflow: hidden;
        border: 1px solid #e2e8f0;
        border-radius: 1.5rem;
        background: linear-gradient(135deg, #eff6ff, #ecfeff);
        padding: .75rem;
        box-shadow: 0 16px 46px rgba(15, 23, 42, .08);
    }

    .service-image {
        display: block;
        width: 100%;
        object-fit: cover;
        border-radius: 1rem;
    }
</style>




{{-- SERVICES HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'services'])


{{-- SERVICE QUICK CARDS --}}
<section class="relative z-10 -mt-4 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-2">
            <a href="#gpt-care" class="group service-card-hover rounded-2xl border border-slate-100 bg-white p-5 shadow-xl">
                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">01</div>
                <h3 class="mt-4 text-xl font-black text-slate-950">GPT Care</h3>
                <p class="mt-3 leading-6 text-slate-600">
                    Professional mobile repair services across Oman for screens, batteries, software issues, water damage and more.
                </p>
                <span class="mt-4 inline-flex text-sm font-black text-blue-700">Explore Service →</span>
            </a>

            <a href="#b2b-program" class="group service-card-hover rounded-2xl border border-cyan-100 bg-cyan-50 p-5 shadow-xl">
                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">02</div>
                <h3 class="mt-4 text-xl font-black text-slate-950">GPT B2B Programs</h3>
                <p class="mt-3 leading-6 text-slate-600">
                    Business-to-business programs for mobile devices, smartphones, tablets, accessories and operational support.
                </p>
                <span class="mt-4 inline-flex text-sm font-black text-cyan-700">Explore Program →</span>
            </a>
        </div>
    </div>
</section>



{{-- GPT CARE --}}

@if($gptCareSection)

    <section id="gpt-care" class="service-section-light py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 lg:grid-cols-2 lg:items-center">

                <div>
                    @if(!empty($gptCareSection->label))
                        <p class="font-black uppercase tracking-[.22em] text-blue-700">
                            {{ $gptCareSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $gptCareSection->title }}
                    </h2>

                    @if(!empty($gptCareSection->description_1))
                        <p class="mt-4 text-base leading-6 text-slate-600">
                            {{ $gptCareSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($gptCareSection->description_2))
                        <p class="mt-3 text-base leading-6 text-slate-600">
                            {{ $gptCareSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-4 grid gap-5 sm:grid-cols-2">
                        @if(!empty($gptCareSection->feature_1_title))
                            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">
                                    ✓
                                </div>

                                <h3 class="mt-3 text-xl font-black text-slate-950">
                                    {{ $gptCareSection->feature_1_title }}
                                </h3>

                                @if(!empty($gptCareSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $gptCareSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($gptCareSection->feature_2_title))
                            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">
                                    ✓
                                </div>

                                <h3 class="mt-3 text-xl font-black text-slate-950">
                                    {{ $gptCareSection->feature_2_title }}
                                </h3>

                                @if(!empty($gptCareSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $gptCareSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-xl border border-slate-100 bg-white p-4 shadow-2xl">

                        <img
                            class="service-image h-[280px] sm:h-[340px] lg:h-[410px]"
                            src="{{ $serviceImage(
                                $gptCareSection->image ?? null,
                                'https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=1200&q=80'
                            ) }}"
                            alt="{{ ($gptCareSection->image_alt ?? null) ?: $gptCareSection->title }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.style.display='none';"
                        >

                        @if(!empty($gptCareSection->card_title) || !empty($gptCareSection->card_description))
                            <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-lg">
                                @if(!empty($gptCareSection->card_title))
                                    <p class="text-xl font-black text-slate-950">
                                        {{ $gptCareSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($gptCareSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-6 text-slate-600">
                                        {{ $gptCareSection->card_description }}
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




{{-- REPAIR OPTIONS MAIN --}}

@if($repairOptionSection && $repairOptionSection->activeItems->count())

    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                @if(!empty($repairOptionSection->label))
                    <p class="font-black uppercase tracking-[.22em] text-blue-700">
                        {{ $repairOptionSection->label }}
                    </p>
                @endif

                <h2 class="mt-4 text-xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $repairOptionSection->title }}
                </h2>

                @if(!empty($repairOptionSection->description))
                    <p class="mt-3 text-base leading-6 text-slate-600">
                        {{ $repairOptionSection->description }}
                    </p>
                @endif
            </div>

            <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($repairOptionSection->activeItems as $item)
                    @php
                        $boxClass = match($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'blue' => 'border-blue-100 bg-blue-50',
                            'white' => 'border-slate-100 bg-white',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-slate-50',
                        };

                        $iconClass = match($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            'blue' => 'bg-blue-600',
                            'slate' => 'bg-slate-800',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="service-card-hover rounded-2xl border {{ $boxClass }} p-5">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl {{ $iconClass }} text-2xl font-black text-white">
                            {{ $item->icon_text ?: $loop->iteration }}
                        </div>

                        <h3 class="mt-4 text-xl font-black text-slate-950">
                            {{ $item->title }}
                        </h3>

                        @if(!empty($item->description))
                            <p class="mt-3 leading-6 text-slate-600">
                                {{ $item->description }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
    </section>

@endif


{{-- REPAIR SERVICES --}}

@if($repairServiceSection && $repairServiceSection->activeItems->count())
   
    <section class="service-section-soft py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.22em] text-blue-700">
                        {{ $repairServiceSection->label }}
                    </p>

                    <h2 class="mt-4 text-xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $repairServiceSection->title }}
                    </h2>

                    <p class="mt-3 max-w-2xl text-base leading-6 text-slate-600">
                        {{ $repairServiceSection->description }}
                    </p>
                </div>

                @if($repairServiceSection->button_text)
                    <a href="{{ $repairServiceSection->button_link ?: '#' }}"
                       class="inline-flex w-fit rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        {{ $repairServiceSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="mt-4 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                @foreach($repairServiceSection->activeItems as $service)
                    <div class="service-card-hover rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                        <img
                            class="h-36 w-full rounded-xl object-cover"
                            src="{{ $serviceImage(
                                $service->image ?? null,
                                'https://images.unsplash.com/photo-1601972599720-36938d4ecd31?auto=format&fit=crop&w=900&q=80'
                            ) }}"
                            alt="{{ ($service->image_alt ?? null) ?: $service->title }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.style.display='none';"
                        >

                        <h3 class="mt-4 text-xl font-black text-slate-950">
                            {{ $service->title }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            {{ $service->description }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif


{{-- B2B PROGRAM --}}

@if($b2bProgramSection)

    <section id="b2b-program" class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 lg:grid-cols-2 lg:items-center">

                <div class="relative order-2 lg:order-1">
                    <div class="absolute -inset-5 rounded-full bg-blue-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-xl border border-slate-100 bg-white p-4 shadow-2xl">
                        <img
                            class="service-image h-[280px] sm:h-[340px] lg:h-[410px]"
                            src="{{ $serviceImage(
                                $b2bProgramSection->image ?? null,
                                'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80'
                            ) }}"
                            alt="{{ ($b2bProgramSection->image_alt ?? null) ?: $b2bProgramSection->title }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.style.display='none';"
                        >

                        @if($b2bProgramSection->card_title || $b2bProgramSection->card_description)
                            <div class="mt-3 rounded-xl border border-slate-100 bg-white p-4 shadow-lg">
                                <p class="text-xl font-black text-slate-950">
                                    {{ $b2bProgramSection->card_title }}
                                </p>

                                <p class="mt-2 text-base font-semibold leading-6 text-slate-600">
                                    {{ $b2bProgramSection->card_description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <p class="font-black uppercase tracking-[.22em] text-blue-700">
                        {{ $b2bProgramSection->label }}
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        {{ $b2bProgramSection->title }}
                    </h2>

                    @if($b2bProgramSection->description_1)
                        <p class="mt-4 text-base leading-6 text-slate-600">
                            {{ $b2bProgramSection->description_1 }}
                        </p>
                    @endif

                    @if($b2bProgramSection->description_2)
                        <p class="mt-3 text-base leading-6 text-slate-600">
                            {{ $b2bProgramSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-4 grid gap-5 sm:grid-cols-2">
                        @if($b2bProgramSection->feature_1_title)
                            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $b2bProgramSection->feature_1_title }}
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $b2bProgramSection->feature_1_description }}
                                </p>
                            </div>
                        @endif

                        @if($b2bProgramSection->feature_2_title)
                            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $b2bProgramSection->feature_2_title }}
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $b2bProgramSection->feature_2_description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif


{{-- B2B BENEFITS --}}

@if($b2bBenefitSection && $b2bBenefitSection->activeItems->count())
    
    <section class="service-section-light py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.22em] text-blue-700">
                    {{ $b2bBenefitSection->label }}
                </p>

                <h2 class="mt-4 text-xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    {{ $b2bBenefitSection->title }}
                </h2>

                <p class="mt-3 text-base leading-6 text-slate-600">
                    {{ $b2bBenefitSection->description }}
                </p>
            </div>

            <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($b2bBenefitSection->activeItems as $item)
                    @php
                        $boxClass = match($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'slate' => 'border-slate-100 bg-slate-50',
                            default => 'border-slate-100 bg-slate-50',
                        };

                        $iconClass = match($item->theme) {
                            'cyan' => 'bg-cyan-500',
                            default => 'bg-blue-600',
                        };
                    @endphp

                    <div class="service-card-hover rounded-2xl border {{ $boxClass }} p-5">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl {{ $iconClass }} text-2xl font-black text-white">
                            {{ $item->icon_text }}
                        </div>

                        <h3 class="mt-4 text-xl font-black text-slate-950">
                            {{ $item->title }}
                        </h3>

                        <p class="mt-3 leading-6 text-slate-600">
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif






{{-- SERVICE FORM --}}
<section id="service-form" class="service-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 p-5 text-white shadow-xl sm:p-7">
                <p class="font-black uppercase tracking-[.22em] text-blue-100">
                    Service Enquiry
                </p>

                <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                    Need repair or B2B support?
                </h2>

                <p class="mt-3 text-base leading-7 text-blue-50">
                    Use this form for GPT Care mobile repair enquiry or GPT B2B Program partnership enquiry.
                </p>

                <div class="mt-4 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-xl bg-white/15 p-4">
                        <h3 class="text-xl font-black">Phone</h3>
                        <a href="tel:+96824501533" class="mt-2 block text-sm text-blue-50">+968 2450-1533</a>
                    </div>

                    <div class="rounded-xl bg-white/15 p-4">
                        <h3 class="text-xl font-black">Email</h3>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block break-words text-sm text-blue-50">info@gptgroups.com</a>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-100 bg-white p-5 text-slate-950 shadow-xl sm:p-7">
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
                        <textarea name="message" rows="4" class="service-input resize-none" placeholder="Describe your repair issue or B2B requirement"></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-2 inline-flex justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500"
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

    <section class="bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid gap-5 lg:grid-cols-2">

                <div>
                    @if(!empty($faqSection->label))
                        <p class="font-black uppercase tracking-[.22em] text-blue-700">
                            {{ $faqSection->label }}
                        </p>
                    @endif

                    @if(!empty($faqSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl">
                            {{ $faqSection->title }}
                        </h2>
                    @endif

                    @if(!empty($faqSection->description))
                        <p class="mt-3 text-base leading-6 text-slate-600">
                            {{ $faqSection->description }}
                        </p>
                    @endif

                    @if(!empty($faqSection->button_text))
                        <a href="{{ $faqSection->button_link ?: '#' }}"
                           class="mt-4 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                            {{ $faqSection->button_text }}
                        </a>
                    @endif
                </div>

                <div class="grid gap-4">
                    @foreach($faqSection->activeItems as $faq)
                        <details class="rounded-xl border border-slate-100 bg-slate-50 p-4 shadow-sm"
                                 {{ $faq->is_open ? 'open' : '' }}>

                            <summary class="cursor-pointer text-lg font-black text-slate-950">
                                {{ $faq->question }}
                            </summary>

                            @if(!empty($faq->answer))
                                <p class="mt-3 leading-6 text-slate-600">
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
<section class="service-section-soft py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 p-5 text-white shadow-2xl sm:p-8 lg:p-10">
            <div class="grid gap-5 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.22em] text-blue-100">
                        GPT Group Services
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Get reliable repair and B2B support.
                    </h2>

                    <p class="mt-3 text-base leading-7 text-blue-50">
                        Choose GPT Care for mobile repair or GPT B2B Program for business distribution and operational support.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#service-form"
                        class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection