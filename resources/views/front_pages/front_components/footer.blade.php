@php
    /*
    |--------------------------------------------------------------------------
    | Footer Company Links
    |--------------------------------------------------------------------------
    */
    $footerCompanyLinks = [
        [
            'label' => 'About GPT Group',
            'route' => 'about',
        ],
        [
            'label' => 'Oman Vision 2040',
            'route' => 'oman-vision',
        ],
        [
            'label' => 'Group Companies',
            'route' => 'groups_company',
        ],
        [
            'label' => 'Careers',
            'route' => 'carriers',
        ],
        [
            'label' => 'News',
            'route' => 'news',
        ],
        [
            'label' => 'Contact Us',
            'route' => 'contact',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Footer Network Links
    |--------------------------------------------------------------------------
    */
    $footerNetworkLinks = [
        [
            'label' => 'GPT Oman Network',
            'route' => 'network',
        ],
        [
            'label' => 'Our Partners',
            'route' => 'brands',
        ],
        [
            'label' => 'Retail Network',
            'route' => 'retail_outlet',
        ],
        [
            'label' => 'All Products',
            'route' => 'products',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Footer Business Links
    |--------------------------------------------------------------------------
    */
    $footerBusinessLinks = [
        [
            'label' => 'Mobility Solutions',
            'route' => 'business.mobility',
        ],
        [
            'label' => 'Integrated Security & ELV Solutions',
            'route' => 'business.security-elv',
        ],
        [
            'label' => 'Smart Home & IoT Solutions',
            'route' => 'business.smart-home-iot',
        ],
        [
            'label' => 'Network Infrastructure & Structured Cabling',
            'route' => 'business.network',
        ],
        [
            'label' => 'Real Estate',
            'route' => 'business.real-estate',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Footer Services & Updates Links
    |--------------------------------------------------------------------------
    */
    $footerServiceLinks = [
        [
            'label' => 'All Services',
            'route' => 'services',
        ],
        [
            'label' => 'GPT Care',
            'route' => 'services',
            'hash' => '#gpt-care',
        ],
        [
            'label' => 'B2B Programs',
            'route' => 'services',
            'hash' => '#b2b-program',
        ],
        [
            'label' => 'Service Enquiry',
            'route' => 'services',
            'hash' => '#service-form',
        ],
        [
            'label' => 'News & Updates',
            'route' => 'news',
        ],
        [
            'label' => 'Partner Enquiry',
            'route' => 'contact',
        ],
    ];
@endphp


<footer class="relative overflow-hidden bg-slate-950 text-white">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div
            class="absolute -left-28 -top-28 h-80 w-80 rounded-full bg-blue-600/20 blur-3xl"
        ></div>

        <div
            class="absolute right-0 top-20 h-96 w-96 rounded-full bg-cyan-400/10 blur-3xl"
        ></div>

        <div
            class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-indigo-500/10 blur-3xl"
        ></div>

        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px] opacity-20"
        ></div>
    </div>

    <div
        class="relative mx-auto max-w-7xl px-4 pb-8 pt-16 sm:px-6 sm:pt-20 lg:px-8"
    >

        {{-- Top Partnership CTA --}}
        <div
            class="mb-14 overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.08] p-7 shadow-2xl backdrop-blur sm:rounded-[2.5rem] sm:p-10 lg:p-12"
        >
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p
                        class="text-xs font-black uppercase tracking-[0.28em] text-cyan-300 sm:text-sm"
                    >
                        Partner With GPT Group
                    </p>

                    <h2
                        class="mt-4 text-3xl font-black leading-tight text-white sm:text-4xl lg:text-5xl"
                    >
                        Build your business advantage across Oman and GCC.
                    </h2>

                    <p
                        class="mt-4 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base"
                    >
                        Connect with GPT Group for mobility, technology,
                        integrated security, smart solutions, network
                        infrastructure, retail support, services and real estate
                        opportunities.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3 lg:justify-end">
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full bg-white px-7 py-4 text-sm font-black text-slate-950 shadow-xl transition duration-200 hover:-translate-y-1 hover:bg-cyan-50"
                    >
                        Start Partnership
                    </a>

                    <a
                        href="{{ route('business.index') }}"
                        class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/10 px-7 py-4 text-sm font-black text-white transition duration-200 hover:-translate-y-1 hover:bg-white/20"
                    >
                        Explore Business
                    </a>
                </div>
            </div>
        </div>

        {{-- Main Footer Grid --}}
        <div
            class="grid gap-10 sm:grid-cols-2 lg:grid-cols-6 lg:gap-8"
        >

            {{-- Brand Information --}}
            <div class="sm:col-span-2 lg:col-span-2">
                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center"
                    aria-label="GPT Group Home"
                >
                    <img
                        src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                        alt="GPT Group Logo"
                        class="h-16 w-auto max-w-[190px] rounded-xl bg-white p-2 object-contain"
                        loading="lazy"
                    >
                </a>

                <p class="mt-6 max-w-md text-sm leading-7 text-slate-300">
                    GPT Group is building strong technology, mobility, retail,
                    service, distribution, infrastructure and business
                    partnerships across Oman and the GCC.
                </p>

                {{-- Social Links --}}
                <div class="mt-6 flex flex-wrap gap-3">
                    <a
                        href="#"
                        aria-label="Facebook"
                        class="grid h-10 w-10 place-items-center rounded-full border border-white/10 bg-white/10 text-sm font-black text-white transition duration-200 hover:-translate-y-1 hover:border-blue-500 hover:bg-blue-600"
                    >
                        f
                    </a>

                    <a
                        href="#"
                        aria-label="LinkedIn"
                        class="grid h-10 w-10 place-items-center rounded-full border border-white/10 bg-white/10 text-xs font-black text-white transition duration-200 hover:-translate-y-1 hover:border-blue-500 hover:bg-blue-600"
                    >
                        in
                    </a>

                    <a
                        href="#"
                        aria-label="Instagram"
                        class="grid h-10 w-10 place-items-center rounded-full border border-white/10 bg-white/10 text-xs font-black text-white transition duration-200 hover:-translate-y-1 hover:border-pink-500 hover:bg-pink-600"
                    >
                        ig
                    </a>

                    <a
                        href="#"
                        aria-label="X"
                        class="grid h-10 w-10 place-items-center rounded-full border border-white/10 bg-white/10 text-sm font-black text-white transition duration-200 hover:-translate-y-1 hover:border-slate-500 hover:bg-slate-800"
                    >
                        x
                    </a>
                </div>
            </div>

            {{-- Company Links --}}
            <div>
                <h3 class="text-lg font-black text-white">
                    Company
                </h3>

                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerCompanyLinks as $link)
                        <a
                            href="{{ route($link['route']) }}"
                            class="group inline-flex items-center gap-2 transition duration-200 hover:translate-x-1 hover:text-cyan-300"
                        >
                            <span
                                class="text-cyan-400 opacity-70 transition group-hover:opacity-100"
                                aria-hidden="true"
                            >
                                →
                            </span>

                            <span>{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Business Links --}}
            <div>
                <h3 class="text-lg font-black text-white">
                    Business
                </h3>

                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerBusinessLinks as $link)
                        <a
                            href="{{ route($link['route']) }}"
                            class="group inline-flex items-start gap-2 transition duration-200 hover:translate-x-1 hover:text-cyan-300"
                        >
                            <span
                                class="mt-0.5 shrink-0 text-cyan-400 opacity-70 transition group-hover:opacity-100"
                                aria-hidden="true"
                            >
                                →
                            </span>

                            <span class="leading-5">
                                {{ $link['label'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Network Links --}}
            <div>
                <h3 class="text-lg font-black text-white">
                    Our Network
                </h3>

                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerNetworkLinks as $link)
                        <a
                            href="{{ route($link['route']) }}"
                            class="group inline-flex items-center gap-2 transition duration-200 hover:translate-x-1 hover:text-cyan-300"
                        >
                            <span
                                class="text-cyan-400 opacity-70 transition group-hover:opacity-100"
                                aria-hidden="true"
                            >
                                →
                            </span>

                            <span>{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Services & Updates --}}
            <div>
                <h3 class="text-lg font-black text-white">
                    Services & Updates
                </h3>

                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerServiceLinks as $link)
                        <a
                            href="{{ route($link['route']) }}{{ $link['hash'] ?? '' }}"
                            class="group inline-flex items-center gap-2 transition duration-200 hover:translate-x-1 hover:text-cyan-300"
                        >
                            <span
                                class="text-cyan-400 opacity-70 transition group-hover:opacity-100"
                                aria-hidden="true"
                            >
                                →
                            </span>

                            <span>{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </div>

                {{-- News Highlight --}}
                <a
                    href="{{ route('news') }}"
                    class="mt-6 block rounded-2xl border border-cyan-400/20 bg-cyan-400/10 p-4 transition duration-200 hover:-translate-y-1 hover:border-cyan-300/40 hover:bg-cyan-400/15"
                >
                    <p
                        class="text-xs font-black uppercase tracking-[0.18em] text-cyan-300"
                    >
                        Latest News
                    </p>

                    <p class="mt-2 text-sm font-bold leading-6 text-white">
                        View company updates, product launches and business
                        announcements.
                    </p>

                    <span
                        class="mt-3 inline-flex text-sm font-black text-cyan-300"
                    >
                        Read News →
                    </span>
                </a>
            </div>
        </div>

        {{-- Contact Information --}}
        <div
            class="mt-12 grid gap-3 rounded-[2rem] border border-white/10 bg-white/[0.05] p-4 sm:p-5 md:grid-cols-3"
        >
            <a
                href="tel:+96824501533"
                class="rounded-2xl border border-transparent p-4 transition duration-200 hover:border-white/10 hover:bg-white/[0.06]"
            >
                <p
                    class="text-xs font-black uppercase tracking-[0.2em] text-cyan-300"
                >
                    Helpline
                </p>

                <p class="mt-2 text-sm font-bold text-slate-200">
                    +968 2450-1533
                </p>
            </a>

            <a
                href="mailto:info@gptgroups.com"
                class="rounded-2xl border border-transparent p-4 transition duration-200 hover:border-white/10 hover:bg-white/[0.06]"
            >
                <p
                    class="text-xs font-black uppercase tracking-[0.2em] text-cyan-300"
                >
                    Email
                </p>

                <p class="mt-2 break-words text-sm font-bold text-slate-200">
                    info@gptgroups.com
                </p>
            </a>

            <div class="rounded-2xl p-4">
                <p
                    class="text-xs font-black uppercase tracking-[0.2em] text-cyan-300"
                >
                    Location
                </p>

                <p class="mt-2 text-sm font-bold text-slate-200">
                    Muscat, Sultanate of Oman
                </p>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="mt-8 border-t border-white/10 pt-8">
            <div
                class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"
            >
                <p class="text-sm leading-6 text-slate-400">
                    Copyright ©
                    <span data-current-year>{{ date('Y') }}</span>
                    Global Phone Technologies. All Rights Reserved.
                </p>

                <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-slate-400">
                    <a
                        href="#"
                        class="transition hover:text-cyan-300"
                    >
                        Privacy Policy
                    </a>

                    <a
                        href="#"
                        class="transition hover:text-cyan-300"
                    >
                        Terms & Conditions
                    </a>

                    <a
                        href="{{ route('news') }}"
                        class="transition hover:text-cyan-300"
                    >
                        News
                    </a>

                    <span>
                        Designed with Chandan
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document
            .querySelectorAll('[data-current-year]')
            .forEach(function (element) {
                element.textContent = new Date().getFullYear();
            });
    });
</script>