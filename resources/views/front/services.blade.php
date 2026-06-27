@extends('front_pages.front_components.main')

@section('content')



{{-- SERVICES HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'services'])


{{-- SERVICE QUICK CARDS --}}
<section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 md:grid-cols-2">
            <a href="#gpt-care" class="group service-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">01</div>
                <h3 class="mt-6 text-3xl font-black text-slate-950">GPT Care</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Professional mobile repair services across Oman for screens, batteries, software issues, water damage and more.
                </p>
                <span class="mt-6 inline-flex text-sm font-black text-blue-700">Explore Service →</span>
            </a>

            <a href="#b2b-program" class="group service-card-hover rounded-[2rem] border border-cyan-100 bg-cyan-50 p-7 shadow-xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-cyan-500 text-2xl font-black text-white">02</div>
                <h3 class="mt-6 text-3xl font-black text-slate-950">GPT B2B Programs</h3>
                <p class="mt-3 leading-7 text-slate-600">
                    Business-to-business programs for mobile devices, smartphones, tablets, accessories and operational support.
                </p>
                <span class="mt-6 inline-flex text-sm font-black text-cyan-700">Explore Program →</span>
            </a>
        </div>
    </div>
</section>



{{-- GPT CARE --}}

@if($gptCareSection)

    <section id="gpt-care" class="service-section-light py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>
                    @if(!empty($gptCareSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $gptCareSection->label }}
                        </p>
                    @endif

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $gptCareSection->title }}
                    </h2>

                    @if(!empty($gptCareSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $gptCareSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($gptCareSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $gptCareSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        @if(!empty($gptCareSection->feature_1_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">
                                    ✓
                                </div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
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
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">
                                    ✓
                                </div>

                                <h3 class="mt-5 text-xl font-black text-slate-950">
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

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">

                        @if(!empty($gptCareSection->image))
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $gptCareSection->image) }}"
                                alt="{{ $gptCareSection->image_alt ?: $gptCareSection->title }}"
                            >
                        @else
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="https://images.unsplash.com/photo-1595941069915-4ebc5197c14a?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $gptCareSection->title }}"
                            >
                        @endif

                        @if(!empty($gptCareSection->card_title) || !empty($gptCareSection->card_description))
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                @if(!empty($gptCareSection->card_title))
                                    <p class="text-2xl font-black text-slate-950">
                                        {{ $gptCareSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($gptCareSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
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

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                @if(!empty($repairOptionSection->label))
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $repairOptionSection->label }}
                    </p>
                @endif

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $repairOptionSection->title }}
                </h2>

                @if(!empty($repairOptionSection->description))
                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        {{ $repairOptionSection->description }}
                    </p>
                @endif
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
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

                    <div class="service-card-hover rounded-[2rem] border {{ $boxClass }} p-8">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl {{ $iconClass }} text-2xl font-black text-white">
                            {{ $item->icon_text ?: $loop->iteration }}
                        </div>

                        <h3 class="mt-6 text-2xl font-black text-slate-950">
                            {{ $item->title }}
                        </h3>

                        @if(!empty($item->description))
                            <p class="mt-3 leading-7 text-slate-600">
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
   
    <section class="service-section-soft py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $repairServiceSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $repairServiceSection->title }}
                    </h2>

                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                        {{ $repairServiceSection->description }}
                    </p>
                </div>

                @if($repairServiceSection->button_text)
                    <a href="{{ $repairServiceSection->button_link ?: '#' }}"
                       class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                        {{ $repairServiceSection->button_text }}
                    </a>
                @endif
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($repairServiceSection->activeItems as $service)
                    <div class="service-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-sm">
                        @if($service->image)
                            <img class="h-44 w-full rounded-[1.5rem] object-cover"
                                 src="{{ asset('storage/' . $service->image) }}"
                                 alt="{{ $service->image_alt ?: $service->title }}">
                        @endif

                        <h3 class="mt-6 text-2xl font-black text-slate-950">
                            {{ $service->title }}
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
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

    <section id="b2b-program" class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div class="relative order-2 lg:order-1">
                    <div class="absolute -inset-5 rounded-full bg-blue-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">
                        @if($b2bProgramSection->image)
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $b2bProgramSection->image) }}"
                                alt="{{ $b2bProgramSection->image_alt ?: $b2bProgramSection->title }}"
                            >
                        @endif

                        @if($b2bProgramSection->card_title || $b2bProgramSection->card_description)
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                <p class="text-2xl font-black text-slate-950">
                                    {{ $b2bProgramSection->card_title }}
                                </p>

                                <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                    {{ $b2bProgramSection->card_description }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        {{ $b2bProgramSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        {{ $b2bProgramSection->title }}
                    </h2>

                    @if($b2bProgramSection->description_1)
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $b2bProgramSection->description_1 }}
                        </p>
                    @endif

                    @if($b2bProgramSection->description_2)
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $b2bProgramSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        @if($b2bProgramSection->feature_1_title)
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $b2bProgramSection->feature_1_title }}
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    {{ $b2bProgramSection->feature_1_description }}
                                </p>
                            </div>
                        @endif

                        @if($b2bProgramSection->feature_2_title)
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
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
    
    <section class="service-section-light py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $b2bBenefitSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $b2bBenefitSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $b2bBenefitSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
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

                    <div class="service-card-hover rounded-[2rem] border {{ $boxClass }} p-8">
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


{{-- SERVICE FORM --}}
<section id="service-form" class="service-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Service Enquiry
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Need repair or B2B support?
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    Use this form for GPT Care mobile repair enquiry or GPT B2B Program partnership enquiry.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Phone</h3>
                        <a href="tel:+96824501533" class="mt-2 block text-sm text-blue-50">+968 2450-1533</a>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <a href="mailto:info@gptgroups.com" class="mt-2 block break-words text-sm text-blue-50">info@gptgroups.com</a>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 text-slate-950 shadow-xl sm:p-10">
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
                        <textarea name="message" rows="5" class="service-input resize-none" placeholder="Describe your repair issue or B2B requirement"></textarea>
                    </div>

                    <button
                        type="submit"
                        class="mt-2 inline-flex justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500"
                    >
                        Submit Enquiry
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>




{{-- CTA --}}
<section class="service-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        GPT Group Services
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Get reliable repair and B2B support.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Choose GPT Care for mobile repair or GPT B2B Program for business distribution and operational support.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="#service-form"
                        class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Send Enquiry
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
