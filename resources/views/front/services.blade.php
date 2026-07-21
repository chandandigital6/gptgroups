@extends('front_pages.front_components.main')

@section('content')
    <div class="overflow-x-hidden bg-white text-slate-900">

        {{-- HERO --}}
        <section
            class="relative flex min-h-[390px] items-center overflow-hidden bg-slate-950 bg-cover bg-center sm:min-h-[420px] lg:min-h-[450px]"
            style="background-image:linear-gradient(90deg,rgba(2,6,23,.96) 0%,rgba(2,6,23,.84) 52%,rgba(2,6,23,.34) 100%),url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1600&q=75');">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/15 via-transparent to-cyan-400/10"></div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8 lg:py-24">
                <div class="max-w-3xl">
                    <span
                        class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-2 text-[10px] font-bold uppercase tracking-[.16em] text-cyan-100 sm:text-xs">
                        GPT Group • Technology Services
                    </span>

                    <h1 class="mt-5 text-4xl font-black leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Technology solutions built for <span class="text-cyan-300">business growth.</span>
                    </h1>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base sm:leading-8">
                        GPT Group supports organizations, channel partners and end customers with project sales,
                        authorized distribution, pre-sales engineering, technical support and dedicated repair,
                        warranty and RMA services through GPT Care.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                        <a href="#our-services"
                            class="inline-flex min-h-11 items-center justify-center gap-2 rounded-full bg-blue-600 px-6 text-sm font-bold text-white transition hover:bg-blue-700">
                            Explore Our Services <span>→</span>
                        </a>
                        <a href="#service-enquiry"
                            class="inline-flex min-h-11 items-center justify-center rounded-full border border-white/30 bg-white px-6 text-sm font-bold text-slate-900 transition hover:bg-slate-100">
                            Discuss Your Requirement
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- QUICK NAVIGATION --}}
        <section class="relative z-20 -mt-6 sm:-mt-8">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="grid overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg sm:grid-cols-2 lg:grid-cols-5">
                    @php
                        $serviceNav = [
                            [
                                '01',
                                'B2B Project Sales',
                                'Complete project-based solutions for enterprise, commercial and government sectors.',
                                '#b2b-project-sales',
                            ],
                            [
                                '02',
                                'Channel Sales',
                                'Reliable products and commercial support for dealers and resellers.',
                                '#channel-sales',
                            ],
                            [
                                '03',
                                'Pre-Sales Engineering',
                                'Technical planning, surveys, architecture and proposal support.',
                                '#pre-sales-engineering',
                            ],
                            [
                                '04',
                                'After-Sales Support',
                                'Configuration, maintenance and dependable technical assistance.',
                                '#after-sales-support',
                            ],
                            [
                                '05',
                                'GPT Care',
                                'Repair, diagnostics, warranty handling and RMA management.',
                                '#gpt-care',
                            ],
                        ];
                    @endphp

                    @foreach ($serviceNav as $item)
                        <a href="{{ $item[3] }}"
                            class="group border-b border-slate-200 p-5 transition hover:bg-blue-600 sm:border-r lg:border-b-0 last:border-0">
                            <span
                                class="text-xs font-black text-blue-600 group-hover:text-blue-100">{{ $item[0] }}</span>
                            <h3 class="mt-3 text-base font-black text-slate-900 group-hover:text-white">{{ $item[1] }}
                            </h3>
                            <p class="mt-2 text-xs leading-5 text-slate-500 group-hover:text-blue-100">{{ $item[2] }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- INTRO --}}
        <section id="our-services" class="py-16 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.18em] text-blue-600">One Integrated Service
                            Ecosystem</p>
                        <h2
                            class="mt-4 max-w-3xl text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            Supporting every stage of the technology lifecycle.
                        </h2>
                        <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base sm:leading-8">
                            Our service structure is designed around the actual needs of technology projects and
                            distribution businesses. We help customers plan correctly, select suitable products,
                            prepare documentation, complete supply and receive dependable support after delivery.
                        </p>

                        <div class="mt-7 grid gap-4">
                            @php
                                $introPoints = [
                                    [
                                        '01',
                                        'Commercial and Technical Alignment',
                                        'Our sales and engineering teams work together so every proposal is practical, compliant and commercially competitive.',
                                    ],
                                    [
                                        '02',
                                        'Support for Projects and Channel Partners',
                                        'We serve enterprise customers directly while enabling dealers and resellers with stock, training and sales assistance.',
                                    ],
                                    [
                                        '03',
                                        'Reliable Support Beyond Delivery',
                                        'Our relationship continues through technical assistance, maintenance, warranty handling, repair and RMA coordination.',
                                    ],
                                ];
                            @endphp
                            @foreach ($introPoints as $point)
                                <div class="flex gap-4 rounded-2xl border border-slate-200 bg-white p-4">
                                    <div
                                        class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-sm font-black text-blue-600">
                                        {{ $point[0] }}</div>
                                    <div>
                                        <h3 class="font-black text-slate-900">{{ $point[1] }}</h3>
                                        <p class="mt-1 text-sm leading-6 text-slate-600">{{ $point[2] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="relative">
                        <img class="h-[360px] w-full rounded-3xl object-cover shadow-lg sm:h-[430px]"
                            src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=78"
                            alt="GPT Group business technology consultation" loading="lazy">
                        <div class="absolute bottom-5 left-5 rounded-2xl bg-white/95 p-4 shadow-lg">
                            <strong class="block text-2xl font-black text-blue-600">360°</strong>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-600">Technology
                                support</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @php
            $services = [
                [
                    'id' => 'b2b-project-sales',
                    'no' => '01',
                    'title' => 'B2B Project Sales',
                    'tagline' =>
                        'Complete project-based technology solutions for commercial, enterprise, industrial and government sectors.',
                    'description' =>
                        'GPT Group works closely with consultants, contractors, system integrators, corporate IT teams and procurement departments to support technology projects from planning through final product supply.',
                    'image' =>
                        'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1300&q=78',
                    'alt' => 'B2B project sales and enterprise consultation',
                    'items' => [
                        'Project Consultation',
                        'BOQ Analysis',
                        'Solution Design',
                        'Product Selection',
                        'Tender Support',
                        'Commercial Quotations',
                    ],
                    'note' =>
                        'Ideal for corporate offices, hospitality projects, retail developments, educational institutions, industrial facilities and public-sector requirements.',
                    'dark' => false,
                ],
                [
                    'id' => 'channel-sales',
                    'no' => '02',
                    'title' => 'Channel Sales',
                    'tagline' =>
                        'Reliable distribution and dedicated support for dealers, resellers and solution partners.',
                    'description' =>
                        'Our channel sales model helps partners compete effectively through dependable products, responsive commercial support, product knowledge and partner enablement.',
                    'image' =>
                        'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1300&q=78',
                    'alt' => 'GPT Group channel partner and reseller support',
                    'items' => [
                        'Authorized Distribution',
                        'Dealer & Reseller Support',
                        'Competitive Pricing',
                        'Stock Availability',
                        'Marketing Support',
                        'Partner Training',
                    ],
                    'note' =>
                        'Our channel team supports regular trading requirements and project-driven opportunities with quotations, alternatives and order coordination.',
                    'dark' => false,
                ],
                [
                    'id' => 'pre-sales-engineering',
                    'no' => '03',
                    'title' => 'Pre-Sales Engineering',
                    'tagline' =>
                        'Technical expertise that turns business requirements into practical, compliant solutions.',
                    'description' =>
                        'Our pre-sales engineers study requirements, identify technical risks, recommend appropriate products and prepare documentation needed for evaluation and approval.',
                    'image' =>
                        'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1300&q=78',
                    'alt' => 'Pre-sales engineering and technical planning',
                    'items' => [
                        'Requirement Analysis',
                        'Site Survey',
                        'Solution Architecture',
                        'BOQ Preparation',
                        'Technical Proposal',
                        'Product Demonstration',
                        'Compliance Support',
                    ],
                    'note' =>
                        'Pre-sales engineering supports project and channel sales so proposed products match specifications, environment and expected performance.',
                    'dark' => false,
                ],
                [
                    'id' => 'after-sales-support',
                    'no' => '04',
                    'title' => 'After-Sales Support',
                    'tagline' =>
                        'Dependable technical assistance that continues after product delivery and deployment.',
                    'description' =>
                        'GPT Group remains available after delivery to resolve technical queries, configure products, support maintenance practices and coordinate assistance requirements.',
                    'image' =>
                        'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=1300&q=78',
                    'alt' => 'After-sales technical support and maintenance',
                    'items' => [
                        'Technical Assistance',
                        'Product Configuration',
                        'Installation Guidance',
                        'Remote Support',
                        'Preventive Maintenance',
                        'Firmware & Software Updates',
                        'On-site Support, Where Applicable',
                    ],
                    'note' =>
                        'Support scope may vary by product category, project agreement, warranty conditions, brand policy and service location.',
                    'dark' => false,
                ],
                [
                    'id' => 'gpt-care',
                    'no' => '05',
                    'title' => 'GPT Care',
                    'tagline' => 'Dedicated Service, Repair & Warranty Center',
                    'description' =>
                        'GPT Care is the dedicated service division of GPT Group for structured repair, warranty and RMA support for mobile devices and technology products.',
                    'image' =>
                        'https://images.unsplash.com/photo-1620283085068-5aab84e2db8e?auto=format&fit=crop&w=1300&q=78',
                    'alt' => 'GPT Care mobile device repair and warranty service center',
                    'items' => [
                        'Mobile Device Repair',
                        'Warranty Services',
                        'RMA Management',
                        'Product Diagnostics',
                        'Hardware Replacement',
                        'Software Updates & Recovery',
                        'Spare Parts Management',
                        'Service Tracking & Customer Support',
                    ],
                    'note' =>
                        'GPT Care provides customers and partners with a dedicated point of contact for repair, warranty and service-related requirements.',
                    'dark' => true,
                ],
            ];
        @endphp

        @foreach ($services as $index => $service)
            <section id="{{ $service['id'] }}"
                class="py-16 sm:py-20 lg:py-24 {{ $service['dark'] ? 'bg-slate-950 text-white' : ($index % 2 ? 'bg-slate-50' : 'bg-white') }}">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                        <div class="{{ $index % 2 ? 'lg:order-2' : '' }}">
                            <img class="h-[340px] w-full rounded-3xl object-cover shadow-lg sm:h-[430px] lg:h-[500px]"
                                src="{{ $service['image'] }}" alt="{{ $service['alt'] }}" loading="lazy">
                        </div>

                        <div class="{{ $index % 2 ? 'lg:order-1' : '' }}">
                            <span
                                class="inline-grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-500 text-sm font-black text-white">{{ $service['no'] }}</span>
                            <h2
                                class="mt-5 text-3xl font-black leading-tight tracking-tight sm:text-4xl lg:text-5xl {{ $service['dark'] ? 'text-white' : 'text-slate-950' }}">
                                {{ $service['title'] }}</h2>
                            <p class="mt-3 text-sm font-bold {{ $service['dark'] ? 'text-cyan-300' : 'text-blue-600' }}">
                                {{ $service['tagline'] }}</p>
                            <p
                                class="mt-5 text-sm leading-7 sm:text-base sm:leading-8 {{ $service['dark'] ? 'text-slate-300' : 'text-slate-600' }}">
                                {{ $service['description'] }}</p>

                            <div class="mt-7 grid gap-3 sm:grid-cols-2">
                                @foreach ($service['items'] as $item)
                                    <div
                                        class="flex min-h-14 items-start gap-3 rounded-2xl border p-3 text-sm font-bold {{ $service['dark'] ? 'border-white/10 bg-white/5 text-slate-100' : 'border-slate-200 bg-white text-slate-700' }}">
                                        <span
                                            class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-blue-600 text-xs text-white">✓</span>
                                        <span class="pt-0.5">{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div
                                class="mt-6 rounded-r-2xl border-l-4 border-cyan-500 p-4 text-sm leading-6 {{ $service['dark'] ? 'bg-cyan-400/10 text-cyan-50' : 'bg-cyan-50 text-slate-600' }}">
                                {{ $service['note'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        {{-- SERVICE JOURNEY --}}
        <section class="py-16 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="text-xs font-black uppercase tracking-[.18em] text-blue-600">Service Journey</p>
                    <h2
                        class="mt-4 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        A clear path from consultation to long-term support.</h2>
                    <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">All five services work together to create
                        a complete customer and partner experience.</p>
                </div>

                @php
                    $journey = [
                        ['01', 'Consultation', 'Understanding business, project and technical requirements.'],
                        ['02', 'Pre-Sales Engineering', 'Survey, design, architecture and compliance review.'],
                        ['03', 'Quotation & Design', 'Technical proposal, BOQ and commercial quotation.'],
                        ['04', 'Project / Channel Sales', 'Order coordination through direct or partner channels.'],
                        ['05', 'Delivery', 'Product supply, documentation and installation guidance.'],
                        ['06', 'After-Sales Support', 'Configuration, maintenance and technical assistance.'],
                        ['07', 'GPT Care', 'Repair, warranty service, diagnostics and RMA handling.'],
                    ];
                @endphp

                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-7">
                    @foreach ($journey as $step)
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 text-center shadow-sm">
                            <div
                                class="mx-auto grid h-12 w-12 place-items-center rounded-full bg-gradient-to-br from-blue-600 to-cyan-500 text-sm font-black text-white">
                                {{ $step[0] }}</div>
                            <h3 class="mt-4 text-sm font-black text-slate-900">{{ $step[1] }}</h3>
                            <p class="mt-2 text-xs leading-5 text-slate-500">{{ $step[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- WHY GPT --}}
        <section class="bg-slate-50 py-16 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                    <img class="h-[360px] w-full rounded-3xl object-cover shadow-lg sm:h-[460px]"
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=78"
                        alt="GPT Group technology service team" loading="lazy">

                    <div>
                        <p class="text-xs font-black uppercase tracking-[.18em] text-blue-600">Why GPT Group</p>
                        <h2
                            class="mt-4 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            Commercial strength backed by technical capability.</h2>
                        <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base sm:leading-8">Our strength comes from
                            combining distribution experience, project understanding, engineering support and service
                            operations within one organization.</p>

                        @php
                            $whyCards = [
                                [
                                    'Integrated Support',
                                    'Sales, engineering, supply and service teams work within one coordinated ecosystem.',
                                ],
                                [
                                    'Partner Enablement',
                                    'Dealers and resellers receive commercial guidance, product information and opportunity support.',
                                ],
                                [
                                    'Solution-Oriented Approach',
                                    'Recommendations are based on project requirements rather than product supply alone.',
                                ],
                                [
                                    'Post-Delivery Commitment',
                                    'Technical assistance, warranty coordination and repair services continue after delivery.',
                                ],
                                [
                                    'Clear Service Ownership',
                                    'GPT Care provides a dedicated identity for repair, diagnostics, warranty and RMA operations.',
                                ],
                                [
                                    'Business-Focused Communication',
                                    'Customers receive practical technical and commercial support throughout the engagement.',
                                ],
                            ];
                        @endphp

                        <div class="mt-7 grid gap-4 sm:grid-cols-2">
                            @foreach ($whyCards as $card)
                                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                                    <strong class="text-sm font-black text-slate-900">{{ $card[0] }}</strong>
                                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $card[1] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ENQUIRY --}}
        <section id="service-enquiry" class="py-16 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="grid overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl lg:grid-cols-[.85fr_1.15fr]">
                    <div class="bg-gradient-to-br from-blue-800 to-cyan-700 p-7 text-white sm:p-10 lg:p-12">
                        <span
                            class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-2 text-[10px] font-bold uppercase tracking-[.16em] text-cyan-100">Talk
                            to Our Team</span>
                        <h2 class="mt-5 text-3xl font-black leading-tight sm:text-4xl">Tell us how we can support your
                            business.</h2>
                        <p class="mt-5 text-sm leading-7 text-cyan-50">Share your project, channel, technical support or
                            service requirement. Our team will connect you with the appropriate department.</p>

                        <div class="mt-7 grid gap-3">
                            <div class="rounded-2xl border border-white/15 bg-white/10 p-4">
                                <small
                                    class="block text-[10px] font-bold uppercase tracking-wider text-cyan-100">Phone</small>
                                <a href="tel:+96824501533" class="mt-1 block font-black text-white">+968 2450 1533</a>
                            </div>
                            <div class="rounded-2xl border border-white/15 bg-white/10 p-4">
                                <small
                                    class="block text-[10px] font-bold uppercase tracking-wider text-cyan-100">Email</small>
                                <a href="mailto:info@gptgroups.com"
                                    class="mt-1 block font-black text-white">info@gptgroups.com</a>
                            </div>
                            <div class="rounded-2xl border border-white/15 bg-white/10 p-4">
                                <small class="block text-[10px] font-bold uppercase tracking-wider text-cyan-100">Service
                                    Coverage</small>
                                <span class="mt-1 block text-sm font-black text-white">Projects, Distribution, Technical
                                    Support & GPT Care</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-7 sm:p-10 lg:p-12">
                        <form action="#" method="POST">
                            @csrf
                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-xs font-black text-slate-700">Full Name</label>
                                    <input type="text" name="name" required placeholder="Enter your full name"
                                        class="min-h-12 w-full rounded-xl border border-slate-300 px-4 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-black text-slate-700">Company Name</label>
                                    <input type="text" name="company_name" placeholder="Enter company name"
                                        class="min-h-12 w-full rounded-xl border border-slate-300 px-4 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-black text-slate-700">Phone Number</label>
                                    <input type="text" name="phone" placeholder="+968"
                                        class="min-h-12 w-full rounded-xl border border-slate-300 px-4 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-black text-slate-700">Email Address</label>
                                    <input type="email" name="email" required placeholder="name@company.com"
                                        class="min-h-12 w-full rounded-xl border border-slate-300 px-4 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="mb-2 block text-xs font-black text-slate-700">Service Required</label>
                                    <select name="service_type" required
                                        class="min-h-12 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                                        <option value="">Select a service</option>
                                        <option value="b2b_project_sales">B2B Project Sales</option>
                                        <option value="channel_sales">Channel Sales</option>
                                        <option value="pre_sales_engineering">Pre-Sales Engineering</option>
                                        <option value="after_sales_support">After-Sales Support</option>
                                        <option value="gpt_care_mobile_repair">GPT Care - Mobile Repair</option>
                                        <option value="gpt_care_warranty">GPT Care - Warranty Service</option>
                                        <option value="gpt_care_rma">GPT Care - RMA</option>
                                        <option value="other">Other Requirement</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="mb-2 block text-xs font-black text-slate-700">Requirement Details</label>
                                    <textarea name="message" required rows="5" placeholder="Briefly describe your requirement"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-600 focus:ring-4 focus:ring-blue-100"></textarea>
                                </div>
                                <div class="sm:col-span-2">
                                    <button type="submit"
                                        class="inline-flex min-h-12 items-center justify-center gap-2 rounded-full bg-blue-600 px-7 text-sm font-black text-white transition hover:bg-blue-700">
                                        Submit Enquiry <span>→</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="bg-slate-50 py-16 sm:py-20 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[.75fr_1.25fr] lg:gap-16">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.18em] text-blue-600">Frequently Asked Questions
                        </p>
                        <h2
                            class="mt-4 text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            Service information at a glance.</h2>
                        <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">Common questions related to GPT Group
                            project, channel, technical and service support.</p>
                    </div>

                    @php
                        $faqs = [
                            [
                                'Does GPT Group support complete technology projects?',
                                'Yes. Our B2B Project Sales and Pre-Sales Engineering teams can support requirement analysis, BOQ review, product selection, solution design, technical proposals, quotations and product supply.',
                            ],
                            [
                                'Can dealers and resellers work with GPT Group?',
                                'Yes. Our Channel Sales division supports dealers and resellers with product access, quotations, stock coordination, technical information, marketing support and partner training.',
                            ],
                            [
                                'What is included in pre-sales engineering?',
                                'Pre-sales support may include requirement analysis, site surveys, solution architecture, BOQ preparation, technical proposals, demonstrations and compliance assistance.',
                            ],
                            [
                                'What support is available after product delivery?',
                                'Depending on the product and agreement, support may include configuration, installation guidance, remote assistance, maintenance, updates and on-site support where applicable.',
                            ],
                            [
                                'What services are handled by GPT Care?',
                                'GPT Care handles mobile device repair, warranty service, diagnostics, hardware replacement, software recovery, spare parts management and RMA coordination.',
                            ],
                            [
                                'Is on-site support available for every service?',
                                'On-site support depends on project scope, location, product category, service agreement, warranty conditions and resource availability.',
                            ],
                        ];
                    @endphp

                    <div class="grid gap-3">
                        @foreach ($faqs as $i => $faq)
                            <details class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
                                {{ $i === 0 ? 'open' : '' }}>
                                <summary
                                    class="flex cursor-pointer list-none items-center justify-between gap-4 text-sm font-black text-slate-900">
                                    {{ $faq[0] }}
                                    <span class="text-xl text-blue-600 transition group-open:rotate-45">+</span>
                                </summary>
                                <p class="mt-4 text-sm leading-7 text-slate-600">{{ $faq[1] }}</p>
                            </details>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="bg-slate-50 pb-16 sm:pb-20 lg:pb-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="flex flex-col gap-7 rounded-3xl bg-gradient-to-r from-blue-800 via-blue-600 to-cyan-600 p-7 text-white shadow-xl sm:p-10 lg:flex-row lg:items-center lg:justify-between lg:p-12">
                    <div>
                        <h2 class="max-w-4xl text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Planning a project,
                            growing your channel business or looking for service support?</h2>
                        <p class="mt-4 max-w-3xl text-sm leading-7 text-blue-50 sm:text-base">Connect with GPT Group for
                            structured commercial, technical and after-sales assistance.</p>
                    </div>
                    <a href="#service-enquiry"
                        class="inline-flex min-h-12 shrink-0 items-center justify-center gap-2 rounded-full bg-white px-7 text-sm font-black text-blue-700 transition hover:bg-blue-50">
                        Contact Our Team <span>→</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
