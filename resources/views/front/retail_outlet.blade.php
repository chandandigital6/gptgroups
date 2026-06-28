@extends('front_pages.front_components.main')

@section('content')

<style>
    .outlet-soft-bg {
        background:
            radial-gradient(circle at 88% 10%, rgba(103, 232, 249, .35), transparent 28%),
            radial-gradient(circle at 8% 45%, rgba(147, 197, 253, .35), transparent 28%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eff6ff 100%);
    }

    .outlet-gradient-text {
        background: linear-gradient(90deg, #2563eb, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .outlet-blob {
        filter: blur(10px);
        opacity: .45;
        animation: outletBlob 7s ease-in-out infinite alternate;
    }

    @keyframes outletBlob {
        from { transform: translateY(0) scale(1); }
        to { transform: translateY(18px) scale(1.06); }
    }

    .outlet-card-hover {
        transition: all .35s ease;
    }

    .outlet-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 28px 70px rgba(15, 23, 42, .14);
    }

    .outlet-section-light {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .outlet-section-soft {
        background:
            radial-gradient(circle at 85% 15%, rgba(34, 211, 238, .16), transparent 30%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }

    .outlet-input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        padding: 1rem 1.25rem;
        color: #0f172a;
        outline: none;
        transition: all .25s ease;
    }

    .outlet-input::placeholder {
        color: #94a3b8;
    }

    .outlet-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, .16);
    }
</style>


{{-- HERO --}}
@include('front.sections.page_hero', ['pageSlug' => 'retail-outlets'])



{{-- QUICK FACTS --}}

@include('front.sections.quick_facts', ['pageSlug' => 'retail-outlets'])

{{-- <section class="relative z-10 -mt-8 bg-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="outlet-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black outlet-gradient-text">Retail</p>
                <p class="mt-2 font-bold text-slate-700">Showrooms</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Official retail presence for customer engagement.</p>
            </div>

            <div class="outlet-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black outlet-gradient-text">Oman</p>
                <p class="mt-2 font-bold text-slate-700">Market Locations</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Muscat, Ruwi, Salalah, Sur and Sohar coverage.</p>
            </div>

            <div class="outlet-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black outlet-gradient-text">B2B</p>
                <p class="mt-2 font-bold text-slate-700">Partner Support</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Authorized store setup and business support.</p>
            </div>

            <div class="outlet-card-hover rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                <p class="text-4xl font-black outlet-gradient-text">Care</p>
                <p class="mt-2 font-bold text-slate-700">Customer Service</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Product support, service and customer satisfaction.</p>
            </div>
        </div>
    </div>
</section> --}}


{{-- CUSTOMER SATISFACTION --}}
<section class="outlet-section-light py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Customer Satisfaction
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    We aim for professional telecom retail execution.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    GPT Group’s vision is to become one of the most professional and respected telecom distributors in Oman and the UAE, creating value for partners and retail customers.
                </p>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    The company supports retail growth through automated distribution processes, demand generation activities, product knowledge and training, efficient supply-chain management and customer service.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-600 text-xl font-black text-white">01</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Demand Generation</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Promotional campaigns and market visibility for partner stores.</p>
                    </div>

                    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-cyan-500 text-xl font-black text-white">02</div>
                        <h3 class="mt-5 text-xl font-black text-slate-950">Product Training</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Product knowledge and support for sales teams and retail counters.</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                <div class="relative grid grid-cols-2 gap-5">
                    <img class="h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80"
                        alt="Retail outlet">

                    <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                        alt="Technology retail">

                    <div class="rounded-[2rem] border border-slate-100 bg-white p-7 shadow-xl">
                        <p class="text-4xl font-black outlet-gradient-text">GPT</p>
                        <p class="mt-3 text-lg font-bold text-slate-950">Retail Support</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Store setup, visibility and market execution.</p>
                    </div>

                    <img class="mt-10 h-72 w-full rounded-[2rem] object-cover shadow-xl"
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="Supply chain">
                </div>
            </div>

        </div>
    </div>
</section>


{{-- CHANNEL SUPPORT --}}

{{-- CHANNEL SUPPORT --}}

@if($channelSupportSection && $channelSupportSection->activeItems->count())

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $channelSupportSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $channelSupportSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $channelSupportSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($channelSupportSection->activeItems as $item)

                    @php
                        $boxClass = match($item->theme) {
                            'cyan' => 'border-cyan-100 bg-cyan-50',
                            'blue' => 'border-blue-100 bg-blue-50',
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

                    <div class="outlet-card-hover rounded-[2rem] border {{ $boxClass }} p-8">
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


{{-- OUTLETS LIST --}}
<section id="outlets" class="outlet-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    Our Outlets
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    Retail & Service Locations
                </h2>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">
                    Official showrooms and partner outlets listed for customer convenience and business visibility.
                </p>
            </div>

            <a href="{{ route('contact') }}"
                class="inline-flex w-fit rounded-full bg-blue-600 px-7 py-4 text-sm font-black text-white shadow-xl shadow-blue-500/20 transition hover:-translate-y-1 hover:bg-blue-500">
                Open Partner Outlet
            </a>
        </div>

        @php
            $outlets = [
                [
                    'title' => 'GPT Samsung Lounge',
                    'subtitle' => 'Showroom @ Ruwi, Muscat',
                    'image' => 'https://images.unsplash.com/photo-1604719312566-8912e9227c6a?auto=format&fit=crop&w=900&q=80',
                    'badge' => 'Official Showroom',
                    'badgeClass' => 'bg-blue-600',
                    'details' => [
                        'Company' => 'Global Phone Technology',
                        'Brands' => 'Samsung, Honor, Apple',
                        'Contact Person' => 'Mr. Shafi',
                        'Contact No' => '+968 7258 8851',
                    ],
                ],
                [
                    'title' => 'GPT Hikvision Salalah',
                    'subtitle' => 'Showroom @ Salalah',
                    'image' => 'https://images.unsplash.com/photo-1556741533-6e6a62bd8b49?auto=format&fit=crop&w=900&q=80',
                    'badge' => 'Showroom',
                    'badgeClass' => 'bg-cyan-500',
                    'details' => [
                        'Outlet' => 'Globtech Mobile Showroom',
                        'Location' => 'Ruwi Heights, Muscat, Oman',
                        'Brands' => 'Samsung, Honor, Apple',
                        'Contact' => 'Mr. Sudhanshu Mishra | +968 9810 0827',
                    ],
                ],
                [
                    'title' => 'GPT Service Centre',
                    'subtitle' => 'Service Centre @ Sur, Muscat',
                    'image' => 'https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&fit=crop&w=900&q=80',
                    'badge' => 'Service Centre',
                    'badgeClass' => 'bg-blue-600',
                    'details' => [
                        'Outlet' => 'Globtech Mobile Showroom',
                        'Address' => 'ONTC Bus Stop, Sur, Oman',
                        'Brands' => 'Samsung, Honor, Apple',
                        'Service' => 'Customer support and product assistance',
                    ],
                ],
                [
                    'title' => 'Honor Phone Outlet',
                    'subtitle' => 'Showroom @ Sohar',
                    'image' => 'https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?auto=format&fit=crop&w=900&q=80',
                    'badge' => 'Official Showroom',
                    'badgeClass' => 'bg-blue-600',
                    'details' => [
                        'Location' => 'Al Hambar, Sohar, Oman',
                        'Brands' => 'Samsung, Honor, Apple',
                        'Contact Person' => 'Mr. Sudhanshu Mishra',
                        'Contact No' => '+968 9810 0827',
                    ],
                ],
                [
                    'title' => 'GPT Samsung Lounge',
                    'subtitle' => 'Showroom @ Salalah',
                    'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=900&q=80',
                    'badge' => 'Showroom',
                    'badgeClass' => 'bg-cyan-500',
                    'details' => [
                        'Outlet' => 'Honor Phone Outlet',
                        'Location' => 'Salalah, Oman',
                        'Brands' => 'Samsung, Honor, Apple',
                        'Contact' => 'Mr. Sudhanshu Mishra | +968 9810 0827',
                    ],
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($outlets as $outlet)
                <div class="group outlet-card-hover overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="{{ $outlet['image'] }}"
                            alt="{{ $outlet['title'] }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                        >
                        <span class="absolute left-5 top-5 rounded-full {{ $outlet['badgeClass'] }} px-4 py-2 text-xs font-black text-white">
                            {{ $outlet['badge'] }}
                        </span>
                    </div>

                    <div class="p-7">
                        <h3 class="text-2xl font-black text-slate-950">
                            {{ $outlet['title'] }}
                        </h3>

                        <p class="mt-2 font-bold text-blue-700">
                            {{ $outlet['subtitle'] }}
                        </p>

                        <div class="mt-5 space-y-3 text-sm leading-6 text-slate-600">
                            @foreach ($outlet['details'] as $label => $value)
                                <p><b>{{ $label }}:</b> {{ $value }}</p>
                            @endforeach
                        </div>

                        <a href="{{ route('contact') }}"
                            class="mt-7 inline-flex rounded-full bg-blue-600 px-6 py-3 text-sm font-black text-white transition hover:bg-blue-500">
                            Contact Outlet
                        </a>
                    </div>
                </div>
            @endforeach

            <div class="rounded-[2rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl">
                <p class="font-black uppercase tracking-[.25em] text-blue-100">Partner Outlet</p>
                <h3 class="mt-4 text-3xl font-black leading-tight">Want to open an authorized mobile store?</h3>
                <p class="mt-4 leading-7 text-blue-50">
                    GPT Group supports businesses and entrepreneurs with authorized mobile store setup, brand standards, retail guidance and market execution.
                </p>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-full bg-white px-6 py-3 text-sm font-black text-slate-950 transition hover:-translate-y-1">
                    Start Enquiry
                </a>
            </div>
        </div>

    </div>
</section>


{{-- STORE SETUP SUPPORT --}}
{{-- STORE SETUP SUPPORT --}}

@if($storeSetupSupportSection)

    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div class="relative order-2 lg:order-1">
                    <div class="absolute -inset-5 rounded-full bg-cyan-300/20 blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white p-4 shadow-2xl">

                        @if(!empty($storeSetupSupportSection->image))
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="{{ asset('storage/' . $storeSetupSupportSection->image) }}"
                                alt="{{ $storeSetupSupportSection->image_alt ?: $storeSetupSupportSection->title }}"
                            >
                        @else
                            <img
                                class="h-[420px] w-full rounded-[2rem] object-cover lg:h-[560px]"
                                src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $storeSetupSupportSection->title ?? 'Retail store support' }}"
                            >
                        @endif

                        @if(!empty($storeSetupSupportSection->card_title) || !empty($storeSetupSupportSection->card_description))
                            <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                @if(!empty($storeSetupSupportSection->card_title))
                                    <p class="text-2xl font-black text-slate-950">
                                        {{ $storeSetupSupportSection->card_title }}
                                    </p>
                                @endif

                                @if(!empty($storeSetupSupportSection->card_description))
                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                        {{ $storeSetupSupportSection->card_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    @if(!empty($storeSetupSupportSection->label))
                        <p class="font-black uppercase tracking-[.3em] text-blue-700">
                            {{ $storeSetupSupportSection->label }}
                        </p>
                    @endif

                    @if(!empty($storeSetupSupportSection->title))
                        <h2 class="mt-4 text-4xl font-black leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                            {{ $storeSetupSupportSection->title }}
                        </h2>
                    @endif

                    @if(!empty($storeSetupSupportSection->description_1))
                        <p class="mt-6 text-lg leading-8 text-slate-600">
                            {{ $storeSetupSupportSection->description_1 }}
                        </p>
                    @endif

                    @if(!empty($storeSetupSupportSection->description_2))
                        <p class="mt-5 text-lg leading-8 text-slate-600">
                            {{ $storeSetupSupportSection->description_2 }}
                        </p>
                    @endif

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                        @if(!empty($storeSetupSupportSection->feature_1_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $storeSetupSupportSection->feature_1_title }}
                                </h3>

                                @if(!empty($storeSetupSupportSection->feature_1_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $storeSetupSupportSection->feature_1_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($storeSetupSupportSection->feature_2_title))
                            <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $storeSetupSupportSection->feature_2_title }}
                                </h3>

                                @if(!empty($storeSetupSupportSection->feature_2_description))
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        {{ $storeSetupSupportSection->feature_2_description }}
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if(!empty($storeSetupSupportSection->feature_3_title))
    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
        <h3 class="text-xl font-black text-slate-950">
            {{ $storeSetupSupportSection->feature_3_title }}
        </h3>

        @if(!empty($storeSetupSupportSection->feature_3_description))
            <p class="mt-2 text-sm leading-6 text-slate-600">
                {{ $storeSetupSupportSection->feature_3_description }}
            </p>
        @endif
    </div>
@endif

@if(!empty($storeSetupSupportSection->feature_4_title))
    <div class="rounded-[1.75rem] border border-slate-100 bg-slate-50 p-6">
        <h3 class="text-xl font-black text-slate-950">
            {{ $storeSetupSupportSection->feature_4_title }}
        </h3>

        @if(!empty($storeSetupSupportSection->feature_4_description))
            <p class="mt-2 text-sm leading-6 text-slate-600">
                {{ $storeSetupSupportSection->feature_4_description }}
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


{{-- LOCATION CTA --}}
<section class="outlet-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-stretch">

            <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-xl sm:p-10">
                <p class="font-black uppercase tracking-[.3em] text-blue-100">
                    Location Enquiry
                </p>

                <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">
                    Find the right outlet or start a new partnership.
                </h2>

                <p class="mt-5 text-lg leading-8 text-blue-50">
                    For showroom details, retail support, service centre enquiry or authorized store partnership, contact GPT Group.
                </p>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Helpline</h3>
                        <p class="mt-2 text-sm text-blue-50">+968 2450-1533</p>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/15 p-6">
                        <h3 class="text-xl font-black">Email</h3>
                        <p class="mt-2 break-words text-sm text-blue-50">info@gptgroups.com</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2.5rem] border border-slate-100 bg-white p-8 shadow-2xl sm:p-10">
                <form action="#" method="POST" class="grid gap-4">
                    @csrf

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Full Name</label>
                            <input type="text" name="name" class="outlet-input" placeholder="Enter full name">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-black text-slate-700">Phone / Email</label>
                            <input type="text" name="contact" class="outlet-input" placeholder="Enter contact detail">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Enquiry Type</label>
                        <select name="enquiry_type" class="outlet-input">
                            <option>Retail Outlet Information</option>
                            <option>Open Authorized Store</option>
                            <option>Service Centre Enquiry</option>
                            <option>B2B / Wholesale Enquiry</option>
                            <option>Brand Partnership</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Preferred Location</label>
                        <input type="text" name="location" class="outlet-input" placeholder="Example: Muscat, Salalah, Sur, Sohar">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Message</label>
                        <textarea name="message" rows="4" class="outlet-input resize-none" placeholder="Write your enquiry"></textarea>
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
<section class="outlet-section-soft py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-blue-700 to-cyan-500 p-8 text-white shadow-2xl sm:p-12 lg:p-16">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-100">
                        Retail Partnership
                    </p>

                    <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl lg:text-6xl">
                        Get the competitive advantage with GPT Group.
                    </h2>

                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Build authorized mobile retail stores with brand support, product supply, market expertise and customer-focused execution.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}"
                        class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
