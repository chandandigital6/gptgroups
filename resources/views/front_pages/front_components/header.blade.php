
@php
    $navItems = [
        [
            'label' => 'Home',
            'route' => 'home',
            'active' => ['home'],
        ],

        /*
        |--------------------------------------------------------------------------
        | About
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'About',
            'route' => 'about',
            'active' => [
                'about',
                'carriers',
            ],
            'children' => [
                [
                    'label' => 'About GPT Group',
                    'route' => 'about',
                    'active' => ['about'],
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
        | Business Verticals
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Business Verticals',
            'route' => 'business.index',
            'active' => ['business.*'],
            'children' => [
                [
                    'label' => 'All Business Verticals',
                    'route' => 'business.index',
                    'active' => ['business.index'],
                ],
                [
                    'label' => 'Mobile & Consumer Electronics',
                    'route' => 'business.mobile',
                    'active' => ['business.mobile'],
                ],
                [
                    'label' => 'Security Solutions',
                    'route' => 'business.security',
                    'active' => ['business.security'],
                ],
                [
                    'label' => 'IT Infrastructure Solutions',
                    'route' => 'business.infrastructure',
                    'active' => ['business.infrastructure'],
                ],
                [
                    'label' => 'Trading & Distribution',
                    'route' => 'business.trading',
                    'active' => ['business.trading'],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Brands
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Brands',
            'route' => 'brands',
            'active' => [
                'brands',
                'brands.*',
                'products',
                'product.detail',
            ],
            'children' => [
                [
                    'label' => 'All Brands',
                    'route' => 'brands',
                    'active' => [
                        'brands',
                        'brands.*',
                    ],
                ],
                [
                    'label' => 'Products',
                    'route' => 'products',
                    'active' => [
                        'products',
                        'product.detail',
                    ],
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
            'active' => [
                'services',
                'retail_outlet',
            ],
            'children' => [
                [
                    'label' => 'Services',
                    'route' => 'services',
                    'active' => ['services'],
                ],
                [
                    'label' => 'Retail Outlets',
                    'route' => 'retail_outlet',
                    'active' => ['retail_outlet'],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Company
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Company',
            'route' => 'network',
            'active' => [
                'network',
                'news',
                'front.news.*',
                'groups_company',
            ],
            'children' => [
                [
                    'label' => 'Network',
                    'route' => 'network',
                    'active' => ['network'],
                ],
                [
                    'label' => 'News',
                    'route' => 'news',
                    'active' => [
                        'news',
                        'front.news.*',
                    ],
                ],
                [
                    'label' => 'Group Companies',
                    'route' => 'groups_company',
                    'active' => ['groups_company'],
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Vendor
        |--------------------------------------------------------------------------
        */
        [
            'label' => 'Vendor',
            'route' => 'vendor',
            'active' => ['vendor'],
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
            'label' => 'Business Verticals',
            'route' => 'business.index',
        ],
        [
            'label' => 'Our Network',
            'route' => 'network',
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
            'label' => 'Vendor',
            'route' => 'vendor',
        ],
        [
            'label' => 'Contact Us',
            'route' => 'contact',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Footer Service Links
    |--------------------------------------------------------------------------
    */
    $footerServiceLinks = [
        [
            'label' => 'Mobile & Consumer Electronics',
            'route' => 'business.mobile',
        ],
        [
            'label' => 'Security Solutions',
            'route' => 'business.security',
        ],
        [
            'label' => 'IT Infrastructure Solutions',
            'route' => 'business.infrastructure',
        ],
        [
            'label' => 'Trading & Distribution',
            'route' => 'business.trading',
        ],
        [
            'label' => 'Retail Outlets',
            'route' => 'retail_outlet',
        ],
    ];

    /*
    |--------------------------------------------------------------------------
    | Footer Product Links
    |--------------------------------------------------------------------------
    */
    $footerProductLinks = [
        [
            'label' => 'Our Brands',
            'route' => 'brands',
        ],
        [
            'label' => 'All Products',
            'route' => 'products',
        ],
        [
            'label' => 'Offers & Launches',
            'route' => 'news',
        ],
        [
            'label' => 'Partner Enquiry',
            'route' => 'contact',
        ],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-slate-100 bg-white/90 shadow-sm backdrop-blur-xl">
    <div class="containerx flex h-20 items-center justify-between gap-4">

        {{-- Logo --}}
        <a
            href="{{ route('home') }}"
            class="flex shrink-0 items-center gap-3"
        >
            <img
                src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                alt="GPT Group Logo"
                class="h-14 w-auto max-w-[170px] object-contain"
                loading="eager"
            >
        </a>

        {{-- Desktop Menu --}}
        <nav
            class="hidden items-center gap-1 rounded-full border border-slate-100 bg-white/80 px-2 py-2 text-[13px] font-bold shadow-sm xl:flex"
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
                            class="inline-flex items-center gap-1.5 rounded-full px-3.5 py-2 transition
                            {{ $isActive
                                ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                                : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                            }}"
                        >
                            {{ $item['label'] }}

                            <svg
                                class="h-4 w-4 transition duration-200 group-hover:rotate-180"
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

                        {{-- Desktop Dropdown --}}
                        <div
                            class="invisible absolute left-0 top-full z-50 min-w-[310px] translate-y-3 opacity-0 transition-all duration-200 group-hover:visible group-hover:translate-y-2 group-hover:opacity-100"
                        >
                            <div class="overflow-hidden rounded-[1.5rem] border border-slate-100 bg-white p-2 shadow-2xl shadow-slate-900/10">
                                @foreach ($item['children'] as $child)
                                    @php
                                        $childActive = request()->routeIs(...$child['active']);
                                    @endphp

                                    <a
                                        href="{{ route($child['route']) }}"
                                        class="flex items-center justify-between gap-4 rounded-2xl px-4 py-3 text-sm transition
                                        {{ $childActive
                                            ? 'bg-blue-50 font-black text-blue-700'
                                            : 'text-slate-700 hover:bg-slate-50 hover:text-blue-700'
                                        }}"
                                    >
                                        <span>{{ $child['label'] }}</span>

                                        <span class="shrink-0 text-lg leading-none">
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
                        class="rounded-full px-3.5 py-2 transition
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
            class="hidden shrink-0 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-0.5 md:inline-flex"
        >
            Partner Enquiry
        </a>

        {{-- Mobile Menu Button --}}
        <button
            id="menuBtn"
            type="button"
            class="inline-flex items-center gap-2 rounded-2xl bg-slate-950 px-4 py-3 text-sm font-black text-white shadow xl:hidden"
            aria-controls="mobileMenu"
            aria-expanded="false"
        >
            <span>Menu</span>
            <span id="menuIcon">☰</span>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div
        id="mobileMenu"
        class="hidden max-h-[calc(100vh-80px)] overflow-y-auto border-t border-slate-100 bg-white xl:hidden"
    >
        <div class="containerx grid gap-2 py-5 font-semibold">
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs(...$item['active']);
                    $hasChildren = !empty($item['children']);
                @endphp

                @if ($hasChildren)
                    <div class="rounded-2xl border border-slate-100 bg-slate-50 p-2">
                        <button
                            type="button"
                            class="mobileDropdownBtn flex w-full items-center justify-between rounded-xl px-4 py-3 text-left font-black
                            {{ $isActive ? 'text-blue-700' : 'text-slate-800' }}"
                        >
                            <span>{{ $item['label'] }}</span>

                            <span class="mobileDropdownIcon text-xl">
                                {{ $isActive ? '−' : '+' }}
                            </span>
                        </button>

                        <div class="mobileDropdownMenu {{ $isActive ? '' : 'hidden' }} mt-1 grid gap-1">
                            @foreach ($item['children'] as $child)
                                @php
                                    $childActive = request()->routeIs(...$child['active']);
                                @endphp

                                <a
                                    href="{{ route($child['route']) }}"
                                    class="rounded-xl px-4 py-3 text-sm transition
                                    {{ $childActive
                                        ? 'bg-gradient-to-r from-blue-600 to-cyan-500 font-black text-white shadow-lg shadow-blue-500/20'
                                        : 'bg-white text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                                    }}"
                                >
                                    {{ $child['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a
                        href="{{ route($item['route']) }}"
                        class="rounded-2xl px-4 py-3 transition
                        {{ $isActive
                            ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                            : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                        }}"
                    >
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach

            <a
                href="{{ route('contact') }}"
                class="mt-3 rounded-2xl bg-slate-950 px-4 py-3 text-center font-black text-white"
            >
                Partner Enquiry
            </a>
        </div>
    </div>
</header>

