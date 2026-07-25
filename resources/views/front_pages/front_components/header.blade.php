@php
    /*
    |--------------------------------------------------------------------------
    | Header Navigation
    |--------------------------------------------------------------------------
    */
    $navItems = [
        /*
        |--------------------------------------------------------------------------
        | Home
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Home',
            'route' => 'home',
            'active' => ['home'],
        ],

        /*
        |--------------------------------------------------------------------------
        | About Us
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'About Us',
            'route' => 'about',
            'active' => [
                'about',
                'oman-vision',
                'carriers',
            ],
            'children' => [
                [
                    'label' => 'GPT Group',
                    'route' => 'about',
                    'active' => ['about'],
                ],
                [
                    'label' => 'Oman Vision 2040',
                    'route' => 'oman-vision',
                    'active' => ['oman-vision'],
                ],
                [
                    'label' => 'Careers',
                    'route' => 'carriers',
                    'active' => ['carriers'],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Business
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Business',
            'route' => 'business.index',
            'active' => [
                'business.*',
            ],
            'children' => [
                [
                    'label' => 'Mobility Solutions',
                    'route' => 'business.mobility',
                    'active' => ['business.mobility'],
                ],
                [
                    'label' => 'Integrated Security & ELV Solutions',
                    'route' => 'business.security-elv',
                    'active' => ['business.security-elv'],
                ],
                [
                    'label' => 'Smart Home & IoT Solutions',
                    'route' => 'business.smart-home-iot',
                    'active' => ['business.smart-home-iot'],
                ],
                [
                    'label' => 'Network Infrastructure & Structured Cabling Solutions',
                    'route' => 'business.network',
                    'active' => ['business.network'],
                ],

[
                    'label' => 'Architectural Solutions',
                    'route' => 'architecturalSolutions',
                    'active' => ['architecturalSolutions'],
                ],

                [
                    'label' => 'Real Estate',
                    'route' => 'business.real-estate',
                    'active' => ['business.real-estate'],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Group Companies
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Group Companies',
            'route' => 'groups_company',
            'active' => ['groups_company'],
        ],

        /*
        |--------------------------------------------------------------------------
        | Our Network
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Our Network',
            'route' => 'network',
            'active' => [
                'network',
                'brands',
                'brands.*',
                'retail_outlet',
            ],
            'children' => [
                // [
                //     'label' => 'GPT Oman Network',
                //     'route' => 'network',
                //     'active' => ['network'],
                // ],
                [
                    'label' => 'Our Partners',
                    'route' => 'brands',
                    'active' => [
                        'brands',
                        'brands.*',
                    ],
                ],
                [
                    'label' => 'Retail Network',
                    'route' => 'retail_outlet',
                    'active' => ['retail_outlet'],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Services
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Services',
            'route' => 'services',
            'active' => ['services'],
        ],

        /*
        |--------------------------------------------------------------------------
        | Contact
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Contact',
            'route' => 'contact',
            'active' => ['contact'],
        ],
    ];
@endphp


<header
    id="siteHeader"
    class="sticky top-0 z-50 border-b border-slate-100 bg-white/95 shadow-sm backdrop-blur-xl"
>
    <div class="containerx flex h-20 items-center justify-between gap-4">

        {{-- Logo --}}
        <a
            href="{{ route('home') }}"
            class="flex shrink-0 items-center gap-3"
            aria-label="GPT Group Home"
        >
            <img
                src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                alt="GPT Group Logo"
                class="h-14 w-auto max-w-[170px] object-contain"
                loading="eager"
            >
        </a>

        {{-- Desktop Navigation --}}
        <nav
            class="hidden items-center gap-1 rounded-full border border-slate-100 bg-white/80 px-2 py-2 text-[13px] font-bold shadow-sm xl:flex"
            aria-label="Main navigation"
        >
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs(...$item['active']);
                    $hasChildren = !empty($item['children']);
                @endphp

                @if ($hasChildren)
                    <div class="group relative">
                        <a
                            href="{{ route($item['route']) }}"
                            class="inline-flex items-center gap-1.5 rounded-full px-3.5 py-2 transition duration-200
                            {{ $isActive
                                ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                                : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                            }}"
                        >
                            <span>{{ $item['label'] }}</span>

                            <svg
                                class="h-4 w-4 transition-transform duration-200 group-hover:rotate-180"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </a>

                        {{-- Invisible bridge prevents dropdown closing --}}
                        <div class="absolute left-0 top-full h-3 w-full"></div>

                        {{-- Desktop Dropdown --}}
                        <div
                            class="invisible absolute left-0 top-full z-50 min-w-[320px] translate-y-4 pt-3 opacity-0 transition-all duration-200
                            group-hover:visible group-hover:translate-y-0 group-hover:opacity-100"
                        >
                            <div
                                class="overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-2 shadow-2xl shadow-slate-900/10"
                            >
                                @foreach ($item['children'] as $child)
                                    @php
                                        $childActive = request()->routeIs(
                                            ...$child['active']
                                        );
                                    @endphp

                                    <a
                                        href="{{ route($child['route']) }}"
                                        class="flex items-center justify-between gap-4 rounded-2xl px-4 py-3 text-sm transition duration-200
                                        {{ $childActive
                                            ? 'bg-blue-50 font-black text-blue-700'
                                            : 'text-slate-700 hover:bg-slate-50 hover:text-blue-700'
                                        }}"
                                    >
                                        <span class="leading-5">
                                            {{ $child['label'] }}
                                        </span>

                                        <span
                                            class="shrink-0 text-lg leading-none"
                                            aria-hidden="true"
                                        >
                                            →
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <a
                        href="{{ route($item['route']) }}"
                        class="rounded-full px-3.5 py-2 transition duration-200
                        {{ $isActive
                            ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                            : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                        }}"
                    >
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- Desktop CTA --}}
        <a
            href="{{ route('contact') }}"
            class="hidden shrink-0 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition duration-200 hover:-translate-y-0.5 md:inline-flex"
        >
            Partner Enquiry
        </a>

        {{-- Mobile Menu Button --}}
        <button
            id="menuBtn"
            type="button"
            class="inline-flex items-center gap-2 rounded-2xl bg-slate-950 px-4 py-3 text-sm font-black text-white shadow transition active:scale-95 xl:hidden"
            aria-controls="mobileMenu"
            aria-expanded="false"
            aria-label="Open navigation menu"
        >
            <span>Menu</span>

            <svg
                id="menuOpenIcon"
                class="h-5 w-5"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>

            <svg
                id="menuCloseIcon"
                class="hidden h-5 w-5"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    d="M6 6l12 12M18 6L6 18"
                />
            </svg>
        </button>
    </div>

    {{-- Mobile Navigation --}}
    <div
        id="mobileMenu"
        class="hidden border-t border-slate-100 bg-white shadow-xl xl:hidden"
    >
        <nav
            class="containerx max-h-[calc(100dvh-80px)] overflow-y-auto overscroll-contain py-4"
            aria-label="Mobile navigation"
        >
            <div class="grid gap-2">
                @foreach ($navItems as $item)
                    @php
                        $isActive = request()->routeIs(...$item['active']);
                        $hasChildren = !empty($item['children']);
                        $dropdownId = 'mobile-dropdown-' . $loop->index;
                    @endphp

                    @if ($hasChildren)
                        <div
                            class="mobileDropdownWrapper overflow-hidden rounded-2xl border
                            {{ $isActive
                                ? 'border-blue-200 bg-blue-50/70'
                                : 'border-slate-100 bg-slate-50'
                            }}"
                        >
                            <button
                                type="button"
                                class="mobileDropdownBtn flex w-full items-center justify-between gap-4 px-4 py-4 text-left"
                                aria-expanded="{{ $isActive ? 'true' : 'false' }}"
                                aria-controls="{{ $dropdownId }}"
                            >
                                <span
                                    class="font-black
                                    {{ $isActive
                                        ? 'text-blue-700'
                                        : 'text-slate-800'
                                    }}"
                                >
                                    {{ $item['label'] }}
                                </span>

                                <svg
                                    class="mobileDropdownIcon h-5 w-5 shrink-0 transition-transform duration-200
                                    {{ $isActive ? 'rotate-180 text-blue-700' : 'text-slate-500' }}"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>

                            <div
                                id="{{ $dropdownId }}"
                                class="mobileDropdownMenu {{ $isActive ? '' : 'hidden' }} border-t border-slate-100 p-2"
                            >
                                <div class="grid gap-1">
                                    @foreach ($item['children'] as $child)
                                        @php
                                            $childActive = request()->routeIs(
                                                ...$child['active']
                                            );
                                        @endphp

                                        <a
                                            href="{{ route($child['route']) }}"
                                            class="rounded-xl px-4 py-3 text-sm transition duration-200
                                            {{ $childActive
                                                ? 'bg-gradient-to-r from-blue-600 to-cyan-500 font-black text-white shadow-md shadow-blue-500/20'
                                                : 'bg-white font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                                            }}"
                                        >
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ route($item['route']) }}"
                            class="rounded-2xl border px-4 py-4 font-black transition duration-200
                            {{ $isActive
                                ? 'border-transparent bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                                : 'border-slate-100 bg-slate-50 text-slate-800 hover:border-blue-100 hover:bg-blue-50 hover:text-blue-700'
                            }}"
                        >
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach

                {{-- Mobile CTA --}}
                <a
                    href="{{ route('contact') }}"
                    class="mt-2 rounded-2xl bg-slate-950 px-4 py-4 text-center font-black text-white shadow"
                >
                    Partner Enquiry
                </a>
            </div>
        </nav>
    </div>
</header>