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
            <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr]">
                <div>
                    <p class="sol-label">GPT Group Solutions</p>
                    <h1 class="mt-5 text-4xl font-black leading-[1.08] text-slate-950 sm:text-5xl lg:text-6xl">Technology
                        solutions that connect <span class="sol-gradient">people, places and businesses.</span></h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">GPT Group brings mobility,
                        integrated security, smart home automation and network infrastructure solutions to customers,
                        channel partners and projects across Oman.</p>
                    <div class="mt-8 flex flex-wrap gap-3"><a href="#solutions"
                            class="rounded-full bg-gradient-to-r from-blue-700 to-cyan-500 px-7 py-3.5 text-sm font-black text-white shadow-lg">Explore
                            Solutions</a><a href="{{ route('contact') }}"
                            class="rounded-full border border-slate-200 bg-white px-7 py-3.5 text-sm font-black text-slate-950">Partner
                            With Us</a></div>
                </div>
                <div class="sol-image"><img
                        src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=88"
                        alt="GPT Group technology solutions"
                        class="h-[340px] w-full rounded-[1.35rem] object-cover sm:h-[430px] lg:h-[480px]"></div>
            </div>
        </div>
    </section>

    <section id="solutions" class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="sol-label justify-center">Our Solution Portfolio</p>
                <h2 class="mt-4 text-3xl font-black text-slate-950 sm:text-4xl lg:text-5xl">Four focused solution areas.
                    <span class="sol-gradient">One integrated technology partner.</span></h2>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-2">
                @php
                    $solutions = [
                        [
                            '01',
                            'Mobility Solutions',
                            'Smartphones, connected devices and mobility products for retail, wholesale and enterprise markets.',
                            'solutions.mobility',
                            'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1200&q=85',
                        ],
                        [
                            '02',
                            'Integrated Security & ELV Solutions',
                            'Surveillance, access control, video door phones, parking management and professional display systems.',
                            'solutions.security-elv',
                            'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1200&q=85',
                        ],
                        [
                            '03',
                            'Smart Home & IoT Solutions',
                            'Automation, smart lighting, locks, sensors, curtains, climate and energy management.',
                            'solutions.smart-home-iot',
                            'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=85',
                        ],
                        [
                            '04',
                            'Network Infrastructure & Structured Cabling Solutions',
                            'Fiber, FTTH, data center connectivity, cabinets, ODF and structured cabling systems.',
                            'solutions.network',
                            'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=85',
                        ],
                    ];
                @endphp
                @foreach ($solutions as $item)
                    <a href="{{ route($item[3]) }}"
                        class="group overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                        <div class="h-60 overflow-hidden"><img src="{{ $item[4] }}" alt="{{ $item[1] }}"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-105"></div>
                        <div class="p-6"><span class="sol-number">{{ $item[0] }}</span>
                            <h3 class="mt-5 text-2xl font-black text-slate-950">{{ $item[1] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600">{{ $item[2] }}</p><span
                                class="mt-5 inline-flex text-sm font-black text-blue-700">Explore Solution →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
