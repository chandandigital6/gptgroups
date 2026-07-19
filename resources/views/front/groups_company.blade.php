@extends('front_pages.front_components.main')

@section('content')

<style>
    :root {
        --group-blue: #1d4ed8;
        --group-cyan: #06b6d4;
        --group-dark: #071a35;
        --group-muted: #64748b;
    }

    .group-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background:
            radial-gradient(circle at 88% 12%, rgba(6, 182, 212, .20), transparent 29%),
            radial-gradient(circle at 7% 74%, rgba(37, 99, 235, .14), transparent 32%),
            linear-gradient(135deg, #f7fbff 0%, #ffffff 48%, #edf7ff 100%);
    }

    .group-hero::before {
        position: absolute;
        inset: 0;
        z-index: -1;
        content: "";
        opacity: .5;
        background-image:
            linear-gradient(rgba(37, 99, 235, .045) 1px, transparent 1px),
            linear-gradient(90deg, rgba(37, 99, 235, .045) 1px, transparent 1px);
        background-size: 42px 42px;
        mask-image: linear-gradient(to bottom, #000, transparent 95%);
    }

    .group-label {
        display: inline-flex;
        align-items: center;
        gap: .65rem;
        color: var(--group-blue);
        font-size: .72rem;
        font-weight: 900;
        letter-spacing: .2em;
        text-transform: uppercase;
    }

    .group-label::before {
        width: 2rem;
        height: 2px;
        content: "";
        background: linear-gradient(90deg, var(--group-blue), var(--group-cyan));
    }

    .group-gradient-text {
        background: linear-gradient(90deg, var(--group-blue), var(--group-cyan));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .group-image-shell {
        position: relative;
        border: 1px solid rgba(203, 213, 225, .85);
        border-radius: 1.8rem;
        background: rgba(255, 255, 255, .86);
        padding: .7rem;
        box-shadow: 0 30px 80px rgba(15, 46, 82, .16);
    }

    .company-card {
        position: relative;
        display: flex;
        min-height: 100%;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        border-radius: 1.5rem;
        background: #ffffff;
        box-shadow: 0 12px 38px rgba(15, 23, 42, .06);
        transition:
            transform .35s ease,
            box-shadow .35s ease,
            border-color .35s ease;
    }

    .company-card:hover {
        transform: translateY(-8px);
        border-color: rgba(37, 99, 235, .24);
        box-shadow: 0 25px 65px rgba(37, 99, 235, .14);
    }

    .company-image {
        position: relative;
        height: 14rem;
        overflow: hidden;
        background: #e8f1fb;
    }

    .company-image::after {
        position: absolute;
        inset: 0;
        content: "";
        background: linear-gradient(to top, rgba(7, 26, 53, .78), transparent 62%);
    }

    .company-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .65s ease;
    }

    .company-card:hover .company-image img {
        transform: scale(1.06);
    }

    .company-number {
        display: grid;
        width: 3rem;
        height: 3rem;
        place-items: center;
        border-radius: 1rem;
        background: linear-gradient(135deg, var(--group-blue), var(--group-cyan));
        color: #ffffff;
        font-size: .8rem;
        font-weight: 900;
        box-shadow: 0 12px 26px rgba(37, 99, 235, .24);
    }

    .company-arrow {
        display: grid;
        width: 2.75rem;
        height: 2.75rem;
        place-items: center;
        border-radius: 999px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 1.15rem;
        font-weight: 900;
        transition: .3s ease;
    }

    .company-card:hover .company-arrow {
        transform: rotate(-35deg);
        background: #1d4ed8;
        color: #ffffff;
    }

    .company-tag {
        border-radius: 999px;
        background: #eff6ff;
        padding: .42rem .75rem;
        color: #1d4ed8;
        font-size: .68rem;
        font-weight: 900;
    }

    .feature-card {
        border: 1px solid #e2e8f0;
        border-radius: 1.25rem;
        background: #ffffff;
        padding: 1.35rem;
        box-shadow: 0 10px 32px rgba(15, 23, 42, .05);
    }

    .soft-section {
        background:
            radial-gradient(circle at 90% 10%, rgba(6, 182, 212, .07), transparent 28%),
            linear-gradient(180deg, #f8fafc 0%, #eef6ff 100%);
    }
</style>

{{-- Hero --}}
<section class="group-hero py-12 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr]">
            <div>
                <p class="group-label">GPT Group of Companies</p>

                <h1 class="mt-5 max-w-4xl text-4xl font-black leading-[1.08] text-slate-950 sm:text-5xl lg:text-6xl">
                    A diversified group built around
                    <span class="group-gradient-text">technology, trade and modern business.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                    GPT Group brings together companies operating across technology distribution,
                    digital commerce, retail, lifestyle solutions and architectural hardware.
                    Each business supports the Group’s wider vision of connecting global products
                    and services with customers and partners across Oman and the GCC.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a
                        href="#group-companies"
                        class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-1"
                    >
                        Explore Group Companies
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-sm transition hover:-translate-y-1"
                    >
                        Partner With Us
                    </a>
                </div>

                <div class="mt-9 grid max-w-xl grid-cols-3 gap-3">
                    <div class="feature-card">
                        <p class="text-2xl font-black text-blue-700">06</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Group Companies</p>
                    </div>

                    <div class="feature-card">
                        <p class="text-2xl font-black text-blue-700">Oman</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Headquartered</p>
                    </div>

                    <div class="feature-card">
                        <p class="text-2xl font-black text-blue-700">GCC</p>
                        <p class="mt-1 text-xs font-bold text-slate-600">Regional Vision</p>
                    </div>
                </div>
            </div>

            <div class="group-image-shell">
                <img
                    src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1600&q=88"
                    alt="GPT Group business companies"
                    class="h-[350px] w-full rounded-[1.35rem] object-cover sm:h-[440px] lg:h-[500px]"
                >

                <div class="absolute -bottom-5 left-6 right-6 rounded-2xl border border-white/60 bg-white/95 p-4 shadow-xl backdrop-blur sm:left-10 sm:right-auto sm:max-w-sm">
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
<section class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-9 lg:grid-cols-2 lg:gap-12">
            <div>
                <p class="group-label">Our Business House</p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Creating value through
                    <span class="group-gradient-text">focused businesses and shared expertise.</span>
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
                <div class="feature-card">
                    <span class="company-number">01</span>
                    <h3 class="mt-4 text-lg font-black text-slate-950">Technology Distribution</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Mobile devices, electronics, smart security and connected technology.
                    </p>
                </div>

                <div class="feature-card">
                    <span class="company-number">02</span>
                    <h3 class="mt-4 text-lg font-black text-slate-950">International Trade</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Regional sourcing, cross-market partnerships and business expansion.
                    </p>
                </div>

                <div class="feature-card">
                    <span class="company-number">03</span>
                    <h3 class="mt-4 text-lg font-black text-slate-950">Digital & Retail</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Digital commerce, modern retail experiences and consumer-focused services.
                    </p>
                </div>

                <div class="feature-card">
                    <span class="company-number">04</span>
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
<section id="group-companies" class="soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <p class="group-label justify-center">Our Companies</p>

            <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">
                Six companies.
                <span class="group-gradient-text">One shared vision.</span>
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
                    'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=85',
                    'description' => 'Global Phone Technology is the core technology distribution company of GPT Group. It serves Oman’s consumer and business markets with mobile devices, smartphones, accessories, smart security products, professional displays and connected technology solutions.',
                    'tags' => ['Mobility', 'Smart Security', 'Distribution', 'B2B Supply'],
                    'website' => 'https://gptgroups.com/',
                ],
                [
                    'number' => '02',
                    'name' => 'Global Phone Technology International',
                    'short_name' => 'GPT International',
                    'category' => 'International Business',
                    'image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1200&q=85',
                    'description' => 'Global Phone Technology International supports the Group’s wider regional and international business activities. Its role is aligned with cross-border sourcing, strategic partnerships, market expansion and the development of new distribution opportunities.',
                    'tags' => ['International Trade', 'Market Expansion', 'Partnerships', 'Sourcing'],
                    'website' => null,
                ],
                [
                    'number' => '03',
                    'name' => 'Global Digital Company',
                    'short_name' => 'GDC',
                    'category' => 'Digital Commerce',
                    'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=85',
                    'description' => 'Global Digital Company focuses on digital-first business opportunities, online commerce and technology-enabled customer experiences. It supports the Group’s transition toward scalable digital platforms, modern communication and connected business operations.',
                    'tags' => ['E-Commerce', 'Digital Platforms', 'Online Services', 'Technology'],
                    'website' => null,
                ],
                [
                    'number' => '04',
                    'name' => 'Mosaic',
                    'short_name' => 'Mosaic',
                    'category' => 'Lifestyle & Retail',
                    'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=85',
                    'description' => 'Mosaic represents the Group’s lifestyle and consumer-facing retail interests. The business is positioned around curated products, modern presentation and customer-focused retail experiences designed for evolving market preferences.',
                    'tags' => ['Retail', 'Lifestyle', 'Consumer Products', 'Customer Experience'],
                    'website' => null,
                ],
                [
                    'number' => '05',
                    'name' => 'Smart Concept Solutions',
                    'short_name' => 'SCS',
                    'category' => 'Technology Solutions',
                    'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=85',
                    'description' => 'Smart Concept Solutions supports technology-led business requirements through practical, integrated and customer-focused solutions. Its capabilities are aligned with digital systems, smart technologies, connectivity and modern business infrastructure.',
                    'tags' => ['Smart Technology', 'IT Solutions', 'Connectivity', 'Business Systems'],
                    'website' => null,
                ],
                [
                    'number' => '06',
                    'name' => 'Global Spec',
                    'short_name' => 'Global Spec',
                    'category' => 'Architectural Hardware',
                    'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=85',
                    'description' => 'Global Spec Middle East is a specialist division of GPT Group serving architectural and project requirements. Its portfolio includes architectural hardware, decorative hardware, life-safety products, electronic access control, hotel locking systems and door solutions.',
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
                    @if (filled($company['website']))
                        href="{{ $company['website'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    @endif
                    class="company-card group"
                >
                    <div class="company-image">
                        <img
                            src="{{ $company['image'] }}"
                            alt="{{ $company['name'] }}"
                            loading="lazy"
                        >

                        <span class="absolute left-5 top-5 z-10 rounded-full border border-white/30 bg-slate-950/55 px-3 py-1.5 text-[10px] font-black uppercase tracking-[.16em] text-white backdrop-blur">
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
                            <span class="company-number">
                                {{ $company['number'] }}
                            </span>

                            <span class="company-arrow">
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
                                <span class="company-tag">
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
<section class="bg-white py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[.95fr_1.05fr] lg:gap-14">
            <div class="group-image-shell">
                <img
                    src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1500&q=88"
                    alt="GPT Group shared business model"
                    class="h-[340px] w-full rounded-[1.35rem] object-cover sm:h-[420px]"
                    loading="lazy"
                >
            </div>

            <div>
                <p class="group-label">How We Work</p>

                <h2 class="mt-4 text-3xl font-black leading-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Independent companies supported by
                    <span class="group-gradient-text">shared group strength.</span>
                </h2>

                <p class="mt-5 text-base leading-8 text-slate-600">
                    Each company maintains its own specialist focus while drawing value from
                    GPT Group’s market experience, partner relationships, operational knowledge
                    and regional business network.
                </p>

                <div class="mt-7 grid gap-4 sm:grid-cols-2">
                    <div class="feature-card">
                        <h3 class="text-lg font-black text-slate-950">Shared Market Knowledge</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Strong understanding of Oman and GCC customer and channel requirements.
                        </p>
                    </div>

                    <div class="feature-card">
                        <h3 class="text-lg font-black text-slate-950">Partner Relationships</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Long-term cooperation with brands, suppliers, dealers and project partners.
                        </p>
                    </div>

                    <div class="feature-card">
                        <h3 class="text-lg font-black text-slate-950">Operational Support</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Shared experience in sourcing, distribution, marketing and customer service.
                        </p>
                    </div>

                    <div class="feature-card">
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
<section class="soft-section py-14 sm:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
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

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex min-w-44 items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950 shadow-lg transition hover:-translate-y-1"
                >
                    Contact GPT Group
                </a>
            </div>
        </div>
    </div>
</section>

@endsection