@extends('front_pages.front_components.main')

@section('content')
    <style>
        :root {
            --brand: #135fc9;
            --cyan: #00a9d6;
            --ink: #071a35;
            --muted: #5d6d82
        }

        .sol-hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 87% 12%, rgba(0, 169, 214, .18), transparent 28%),
                radial-gradient(circle at 7% 78%, rgba(19, 95, 201, .12), transparent 30%),
                linear-gradient(135deg, #f7fbff 0%, #fff 48%, #eef8ff 100%)
        }

        .sol-grid {
            background-image: linear-gradient(rgba(19, 95, 201, .04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(19, 95, 201, .04) 1px, transparent 1px);
            background-size: 40px 40px
        }

        .sol-label {
            display: inline-flex;
            align-items: center;
            gap: .65rem;
            color: var(--brand);
            font-size: .72rem;
            font-weight: 900;
            letter-spacing: .19em;
            text-transform: uppercase
        }

        .sol-label:before {
            content: "";
            width: 1.9rem;
            height: 2px;
            background: linear-gradient(90deg, var(--brand), var(--cyan))
        }

        .sol-gradient {
            background: linear-gradient(90deg, var(--brand), var(--cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent
        }

        .sol-image {
            position: relative;
            border: 1px solid #dce7f2;
            border-radius: 1.75rem;
            background: #fff;
            padding: .65rem;
            box-shadow: 0 28px 75px rgba(9, 39, 77, .16)
        }

        .sol-card {
            height: 100%;
            border: 1px solid #e2eaf3;
            border-radius: 1.35rem;
            background: #fff;
            padding: 1.45rem;
            box-shadow: 0 10px 34px rgba(13, 43, 78, .06);
            transition: .3s
        }

        .sol-card:hover {
            transform: translateY(-6px);
            border-color: rgba(19, 95, 201, .3);
            box-shadow: 0 22px 56px rgba(19, 95, 201, .13)
        }

        .sol-number {
            display: grid;
            width: 3rem;
            height: 3rem;
            place-items: center;
            border-radius: 1rem;
            background: linear-gradient(135deg, var(--brand), var(--cyan));
            color: #fff;
            font-size: .78rem;
            font-weight: 900
        }

        .brand-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #e2eaf3;
            border-radius: 1.35rem;
            background: #fff;
            padding: 1rem;
            box-shadow: 0 10px 34px rgba(13, 43, 78, .06);
            transition: .3s
        }

        .brand-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 56px rgba(19, 95, 201, .12)
        }

        .brand-logo {
            display: grid;
            height: 8rem;
            place-items: center;
            border: 1px solid #edf2f7;
            border-radius: 1rem;
            background: linear-gradient(145deg, #fff, #f4f9ff);
            padding: 1.2rem
        }

        .brand-logo img {
            max-height: 4.5rem;
            width: 100%;
            object-fit: contain
        }

        .pill {
            border-radius: 999px;
            background: #edf6ff;
            padding: .45rem .8rem;
            font-size: .69rem;
            font-weight: 800;
            color: #135fc9
        }
    </style>

    <section class="sol-hero sol-grid py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-[1.04fr_.96fr]">
                <div>
                    <a href="{{ route('solutions.index') }}"
                        class="inline-flex rounded-full border border-blue-100 bg-white px-4 py-2 text-xs font-black text-blue-700 shadow-sm">←
                        All Solutions</a>
                    <p class="sol-label mt-6">Integrated Security & ELV Solutions</p>
                    <h1 class="mt-5 text-4xl font-black leading-[1.08] text-slate-950 sm:text-5xl lg:text-6xl">Integrated
                        protection for safer
                        <span class="sol-gradient">smarter environments.</span>
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">GPT Group delivers integrated
                        security and ELV technologies for residential, commercial, hospitality, retail, enterprise and
                        project environments across Oman.</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('contact') }}"
                            class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg">Request
                            a Consultation</a>
                        <a href="#capabilities"
                            class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950">Explore
                            Capabilities</a>
                    </div>
                </div>
                <div class="sol-image"><img
                        src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1600&q=88"
                        alt="Integrated Security & ELV Solutions"
                        class="h-[340px] w-full rounded-[1.35rem] object-cover sm:h-[430px] lg:h-[480px]"></div>
            </div>
        </div>
    </section>

    <section id="capabilities" class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="sol-label justify-center">Solutions & Capabilities</p>
                <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">Complete technology capabilities
                    for <span class="sol-gradient">modern requirements.</span></h2>
            </div>
            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                <article class="sol-card"><span class="sol-number">01</span>
                    <h3 class="mt-5 text-xl font-black text-slate-950">Security & Surveillance</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">IP cameras, recording systems and intelligent
                        monitoring technologies.</p>
                </article>
                <article class="sol-card"><span class="sol-number">02</span>
                    <h3 class="mt-5 text-xl font-black text-slate-950">Access Control</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Secure entry management for offices, buildings and
                        restricted locations.</p>
                </article>
                <article class="sol-card"><span class="sol-number">03</span>
                    <h3 class="mt-5 text-xl font-black text-slate-950">Video Door Phone</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Visitor identification and communication solutions for
                        homes and buildings.</p>
                </article>
                <article class="sol-card"><span class="sol-number">04</span>
                    <h3 class="mt-5 text-xl font-black text-slate-950">Parking Management</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Vehicle access, barrier control and parking monitoring
                        technologies.</p>
                </article>
                <article class="sol-card"><span class="sol-number">05</span>
                    <h3 class="mt-5 text-xl font-black text-slate-950">Professional Display</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Commercial display systems for control rooms, retail
                        and enterprise spaces.</p>
                </article>
                <article class="sol-card"><span class="sol-number">06</span>
                    <h3 class="mt-5 text-xl font-black text-slate-950">Video Management Software</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Centralized monitoring, recording and security
                        management platforms.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="sol-label justify-center">Technology Brands</p>
                <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">Brands supporting this solution
                    portfolio.</h2>
                <p class="mt-4 text-base leading-8 text-slate-600"></p>
            </div>
            <div class="mx-auto mt-10 grid max-w-5xl gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <article class="brand-card">
                    <div class="brand-logo"><img
                            src="{{ asset('assets/logo brands/hikvision.png') }}"
                            alt="Hikvision logo" loading="lazy"></div>
                    <div class="flex flex-1 flex-col p-2 pt-5">
                        <h3 class="text-xl font-black text-slate-950">Hikvision</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Video surveillance, access control,
                            intercom, displays and security management technologies.</p>
                    </div>
                </article>
                <article class="brand-card">
                    <div class="brand-logo"><img src="{{ asset('assets/logo brands/ezviz.png') }}"
                            alt="EZVIZ logo" loading="lazy"></div>
                    <div class="flex flex-1 flex-col p-2 pt-5">
                        <h3 class="text-xl font-black text-slate-950">EZVIZ</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Residential cameras, smart doorbells and
                            connected home security products.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 md:grid-cols-3">
                <article class="sol-card">
                    <p class="sol-gradient text-4xl font-black">01</p>
                    <h3 class="mt-4 text-xl font-black text-slate-950">Integrated Architecture</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Security technologies designed to work as one connected
                        ecosystem.</p>
                </article>
                <article class="sol-card">
                    <p class="sol-gradient text-4xl font-black">02</p>
                    <h3 class="mt-4 text-xl font-black text-slate-950">Scalable Deployment</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Solutions suitable for homes, businesses and large
                        project environments.</p>
                </article>
                <article class="sol-card">
                    <p class="sol-gradient text-4xl font-black">03</p>
                    <h3 class="mt-4 text-xl font-black text-slate-950">Project & Channel Support</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Product guidance and supply support for partners and
                        integrators.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="rounded-[2rem] bg-gradient-to-br from-blue-800 via-blue-700 to-cyan-500 p-7 text-white shadow-2xl sm:p-10 lg:p-12">
                <div class="grid items-center gap-8 lg:grid-cols-[1fr_auto]">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-200">Start a Conversation</p>
                        <h2 class="mt-4 max-w-3xl text-3xl font-black sm:text-4xl lg:text-5xl">Planning an integrated
                            security or ELV project? Connect with GPT Group.</h2>
                    </div><a href="{{ route('contact') }}"
                        class="rounded-full bg-white px-7 py-3.5 text-sm font-black text-slate-950">Send Enquiry</a>
                </div>
            </div>
        </div>
    </section>
@endsection
