@extends('front_pages.front_components.main')

@section('content')
    {{-- Hero --}}
    <section
        class="relative flex min-h-[340px] items-center overflow-hidden bg-gradient-to-br from-white via-slate-50 to-blue-50 py-8 sm:min-h-[360px] sm:py-9 lg:min-h-[390px] lg:py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-7 lg:grid-cols-[1.08fr_.92fr]">
                <div>
                    <p
                        class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        GPT Group of Companies
                    </p>

                    <h1 class="mt-4 max-w-4xl text-3xl font-black leading-[1.08] text-slate-950 sm:text-4xl lg:text-5xl">
                        A diversified group built around
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">technology,
                            trade and modern business.</span>
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                        GPT Group brings together companies operating across technology distribution,
                        digital commerce, retail, lifestyle solutions and architectural hardware.
                        Each business supports the Group’s wider vision of connecting global products
                        and services with customers and partners across Oman and the GCC.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="#group-companies"
                            class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-0.5">
                            Explore Group Companies
                        </a>

                        <a href="{{ route('contact') }}"
                            class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-sm transition hover:-translate-y-0.5">
                            Partner With Us
                        </a>
                    </div>

                    <div class="mt-6 grid max-w-xl grid-cols-3 gap-3">
                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                            <p class="text-2xl font-black text-blue-700">06</p>
                            <p class="mt-1 text-xs font-bold text-slate-600">Group Companies</p>
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                            <p class="text-2xl font-black text-blue-700">Oman</p>
                            <p class="mt-1 text-xs font-bold text-slate-600">Headquartered</p>
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 shadow-sm">
                            <p class="text-2xl font-black text-blue-700">GCC</p>
                            <p class="mt-1 text-xs font-bold text-slate-600">Regional Vision</p>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                    <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1400&q=76"
                        alt="GPT Group business companies"
                        class="h-[240px] w-full rounded-xl object-cover sm:h-[270px] lg:h-[300px]" loading="eager"
                        fetchpriority="high">

                    <div
                        class="absolute bottom-3 left-3 right-3 rounded-xl border border-white/60 bg-white/95 p-3 shadow-lg sm:left-5 sm:right-auto sm:max-w-xs">
                        <p class="text-xs font-black uppercase tracking-[.18em] text-blue-700">
                            One Group, Multiple Capabilities
                        </p>

                        <p class="mt-2 text-sm font-bold leading-6 text-slate-700">
                            Distribution, digital commerce, retail solutions,
                            technology services and architectural hardware.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Intro --}}
    <section class="bg-white py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-9 lg:grid-cols-2 lg:gap-12">
                <div>
                    <p
                        class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        Our Business House
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Creating value through
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">focused
                            businesses and shared expertise.</span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        GPT Group’s journey is rooted in technology distribution and market development.
                        Over time, the Group expanded its capabilities to serve a wider mix of consumer,
                        business and project requirements.
                    </p>

                    <p class="mt-4 text-base leading-8 text-slate-600">
                        The companies work independently within their specialist markets while benefiting
                        from shared relationships, operational experience, regional knowledge and a
                        customer-first business culture.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">01</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">Technology Distribution</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Mobile devices, electronics, smart security and connected technology.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">02</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">International Trade</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Regional sourcing, cross-market partnerships and business expansion.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">03</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">Digital & Retail</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Digital commerce, modern retail experiences and consumer-focused services.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <span
                            class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">04</span>
                        <h3 class="mt-4 text-lg font-black text-slate-950">Project Solutions</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Architectural hardware, security, connectivity and technical solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Group Companies --}}
    <section id="group-companies" class="bg-slate-50 py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p
                    class="inline-flex items-center justify-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                    <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                    Our Companies
                </p>

                <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                    Six companies.
                    <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">One shared
                        vision.</span>
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600">
                    Explore the businesses that form GPT Group and support its presence
                    across technology, trade, digital commerce, retail and project solutions.
                </p>
            </div>

            @php
                $companies = [
                    [
                        'number' => '01',
                        'name' => 'Global Phone Technology',
                        'short_name' => 'GPT',
                        'category' => 'Technology Distribution',
                        'image' =>
                            'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1000&q=76',
                        'description' =>
                            'Global Phone Technology is the core technology distribution company of GPT Group. It serves Oman’s consumer and business markets with mobile devices, smartphones, accessories, smart security products, professional displays and connected technology solutions.',
                        'tags' => ['Mobility', 'Smart Security', 'Distribution', 'B2B Supply'],
                        'website' => 'https://gptgroups.com/',
                    ],
                    [
                        'number' => '02',
                        'name' => 'Global Phone Technology International',
                        'short_name' => 'GPT International',
                        'category' => 'International Business',
                        'image' =>
                            'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1000&q=76',
                        'description' =>
                            'Global Phone Technology International supports the Group’s wider regional and international business activities. Its role is aligned with cross-border sourcing, strategic partnerships, market expansion and the development of new distribution opportunities.',
                        'tags' => ['International Trade', 'Market Expansion', 'Partnerships', 'Sourcing'],
                        'website' => null,
                    ],
                    [
                        'number' => '03',
                        'name' => 'Global Digital Company',
                        'short_name' => 'GDC',
                        'category' => 'Digital Commerce',
                        'image' =>
                            'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=76',
                        'description' =>
                            'Global Digital Company focuses on digital-first business opportunities, online commerce and technology-enabled customer experiences. It supports the Group’s transition toward scalable digital platforms, modern communication and connected business operations.',
                        'tags' => ['E-Commerce', 'Digital Platforms', 'Online Services', 'Technology'],
                        'website' => null,
                    ],
                    [
                        'number' => '04',
                        'name' => 'Mosaic',
                        'short_name' => 'Mosaic',
                        'category' => 'Lifestyle & Retail',
                        'image' =>
                            'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1000&q=76',
                        'description' =>
                            'Mosaic represents the Group’s lifestyle and consumer-facing retail interests. The business is positioned around curated products, modern presentation and customer-focused retail experiences designed for evolving market preferences.',
                        'tags' => ['Retail', 'Lifestyle', 'Consumer Products', 'Customer Experience'],
                        'website' => null,
                    ],
                    [
                        'number' => '05',
                        'name' => 'Smart Concept Solutions',
                        'short_name' => 'SCS',
                        'category' => 'Technology Solutions',
                        'image' =>
                            'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1000&q=76',
                        'description' =>
                            'Smart Concept Solutions supports technology-led business requirements through practical, integrated and customer-focused solutions. Its capabilities are aligned with digital systems, smart technologies, connectivity and modern business infrastructure.',
                        'tags' => ['Smart Technology', 'IT Solutions', 'Connectivity', 'Business Systems'],
                        'website' => null,
                    ],
                    [
                        'number' => '06',
                        'name' => 'Global Spec',
                        'short_name' => 'Global Spec',
                        'category' => 'Architectural Hardware',
                        'image' =>
                            'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1000&q=76',
                        'description' =>
                            'Global Spec Middle East is a specialist division of GPT Group serving architectural and project requirements. Its portfolio includes architectural hardware, decorative hardware, life-safety products, electronic access control, hotel locking systems and door solutions.',
                        'tags' => ['Architectural Hardware', 'Access Control', 'Door Solutions', 'Project Supply'],
                        'website' => 'https://globalspecworld.com/',
                    ],
                ];
            @endphp

            <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($companies as $company)
                    @php
                        $cardTag = filled($company['website']) ? 'a' : 'article';
                    @endphp

                    <{{ $cardTag }}
                        @if (filled($company['website'])) href="{{ $company['website'] }}"
                        target="_blank"
                        rel="noopener noreferrer" @endif
                        class="relative flex min-h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-xl group">
                        <div class="relative h-56 overflow-hidden bg-slate-100">
                            <img src="{{ $company['image'] }}" alt="{{ $company['name'] }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                loading="lazy">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-950/10 to-transparent">
                            </div>

                            <span
                                class="absolute left-5 top-5 z-10 rounded-full border border-white/30 bg-slate-950/55 px-3 py-1.5 text-[10px] font-black uppercase tracking-[.16em] text-white">
                                {{ $company['category'] }}
                            </span>

                            <div class="absolute bottom-5 left-5 z-10">
                                <p class="text-xs font-black uppercase tracking-[.15em] text-cyan-300">
                                    GPT Group Company
                                </p>
                                <p class="mt-1 text-lg font-black text-white">
                                    {{ $company['short_name'] }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-1 flex-col p-6">
                            <div class="flex items-start justify-between gap-4">
                                <span
                                    class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-blue-700 to-cyan-500 text-xs font-black text-white shadow-sm">
                                    {{ $company['number'] }}
                                </span>

                                <span
                                    class="grid h-11 w-11 place-items-center rounded-full bg-blue-50 text-lg font-black text-blue-700 transition group-hover:bg-blue-600 group-hover:text-white">
                                    {{ filled($company['website']) ? '↗' : '→' }}
                                </span>
                            </div>

                            <h3 class="mt-5 text-2xl font-black leading-tight text-slate-950">
                                {{ $company['name'] }}
                            </h3>

                            <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">
                                {{ $company['description'] }}
                            </p>

                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach ($company['tags'] as $tag)
                                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[11px] font-black text-blue-700">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>

                            @if (filled($company['website']))
                                <span class="mt-6 inline-flex items-center gap-2 text-sm font-black text-blue-700">
                                    Visit Company Website
                                    <span aria-hidden="true">↗</span>
                                </span>
                            @endif
                        </div>
                        </{{ $cardTag }}>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Group Model --}}
    <section class="bg-white py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-[.95fr_1.05fr] lg:gap-14">
                <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1200&q=76"
                        alt="GPT Group shared business model" class="h-[300px] w-full rounded-xl object-cover sm:h-[360px]"
                        loading="lazy">
                </div>

                <div>
                    <p
                        class="inline-flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.18em] text-blue-700">
                        <span class="h-0.5 w-7 bg-gradient-to-r from-blue-700 to-cyan-500"></span>
                        How We Work
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                        Independent companies supported by
                        <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent">shared group
                            strength.</span>
                    </h2>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        Each company maintains its own specialist focus while drawing value from
                        GPT Group’s market experience, partner relationships, operational knowledge
                        and regional business network.
                    </p>

                    <div class="mt-7 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Shared Market Knowledge</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                Strong understanding of Oman and GCC customer and channel requirements.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Partner Relationships</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                Long-term cooperation with brands, suppliers, dealers and project partners.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Operational Support</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                Shared experience in sourcing, distribution, marketing and customer service.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h3 class="text-lg font-black text-slate-950">Growth Orientation</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                A business culture focused on innovation, expansion and sustainable relationships.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-slate-50 py-12 sm:py-14 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-xl sm:p-10 lg:p-12">
                <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-200">
                            Work With GPT Group
                        </p>

                        <h2 class="mt-4 max-w-3xl text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                            Build new opportunities with a diversified business group.
                        </h2>

                        <p class="mt-4 max-w-2xl text-base leading-8 text-blue-50">
                            Connect with GPT Group for distribution, technology, digital,
                            retail or project partnership opportunities in Oman and the GCC.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="inline-flex min-w-44 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-0.5">
                        Contact GPT Group
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
