@php
    $navItems = [
        [
            'label' => 'Home',
            'route' => 'home',
            'active' => ['home'],
        ],
        [
            'label' => 'About',
            'route' => 'about',
            'active' => ['about'],
        ],
        [
            'label' => 'Brands',
            'route' => 'brands',
            'active' => ['brands', 'brands.*', 'products', 'product.detail'],
            'children' => [
                [
                    'label' => 'All Brands',
                    'route' => 'brands',
                    'active' => ['brands', 'brands.*'],
                ],
                [
                    'label' => 'Products',
                    'route' => 'products',
                    'active' => ['products', 'product.detail'],
                ],
            ],
        ],
        [
            'label' => 'Services',
            'route' => 'services',
            'active' => ['services', 'retail_outlet'],
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
        [
            'label' => 'Company',
            'route' => 'network',
            'active' => ['network', 'news', 'groups_company'],
            'children' => [
                [
                    'label' => 'Network',
                    'route' => 'network',
                    'active' => ['network'],
                ],
                [
                    'label' => 'News',
                    'route' => 'news',
                    'active' => ['news'],
                ],
                [
                    'label' => 'Group Companies',
                    'route' => 'groups_company',
                    'active' => ['groups_company'],
                ],
            ],
        ],
        [
            'label' => 'Careers',
            'route' => 'carriers',
            'active' => ['carriers'],
        ],
        [
            'label' => 'Contact',
            'route' => 'contact',
            'active' => ['contact'],
        ],
    ];
@endphp

<header
    class="sticky top-0 z-[100] w-full border-b border-slate-100
           bg-white/95 shadow-sm backdrop-blur-xl"
>
    {{-- Main Navbar Container --}}
    <div class="mx-auto flex h-20 w-full max-w-[1280px] items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

        {{-- Logo --}}
        <a
            href="{{ route('home') }}"
            class="flex shrink-0 items-center"
            aria-label="GPT Group Home"
        >
            <img
                src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                alt="GPT Group Logo"
                class="h-12 w-auto max-w-[145px] object-contain sm:h-14 sm:max-w-[165px]"
            >
        </a>

        {{-- Desktop Navigation --}}
        <nav
            class="hidden items-center gap-0.5 rounded-full border border-slate-100
                   bg-white px-2 py-2 text-[13px] font-bold shadow-sm xl:flex"
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
                            class="inline-flex items-center gap-1 rounded-full px-3.5 py-2.5
                                   whitespace-nowrap transition duration-200
                                   {{ $isActive
                                        ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                                        : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                                   }}"
                        >
                            <span>{{ $item['label'] }}</span>

                            <svg
                                class="h-3.5 w-3.5 transition-transform duration-200 group-hover:rotate-180"
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

                        {{-- Dropdown --}}
                        <div
                            class="invisible absolute left-0 top-full z-[110] min-w-[225px]
                                   translate-y-3 pt-2 opacity-0 transition-all duration-200
                                   group-hover:visible group-hover:translate-y-0 group-hover:opacity-100"
                        >
                            <div
                                class="overflow-hidden rounded-2xl border border-slate-100
                                       bg-white p-2 shadow-2xl shadow-slate-900/10"
                            >
                                @foreach ($item['children'] as $child)
                                    @php
                                        $childActive = request()->routeIs(...$child['active']);
                                    @endphp

                                    <a
                                        href="{{ route($child['route']) }}"
                                        class="flex items-center justify-between rounded-xl px-4 py-3
                                               text-sm transition duration-200
                                               {{ $childActive
                                                    ? 'bg-blue-50 font-black text-blue-700'
                                                    : 'text-slate-700 hover:bg-slate-50 hover:text-blue-700'
                                               }}"
                                    >
                                        <span>{{ $child['label'] }}</span>
                                        <span aria-hidden="true">→</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <a
                        href="{{ route($item['route']) }}"
                        class="rounded-full px-3.5 py-2.5 whitespace-nowrap transition duration-200
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

        {{-- Right Side --}}
        <div class="flex shrink-0 items-center gap-3">

            {{-- CTA Button --}}
            <a
                href="{{ route('contact') }}"
                class="hidden items-center justify-center whitespace-nowrap rounded-full
                       bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-3
                       text-sm font-black text-white shadow-lg shadow-blue-500/20
                       transition duration-200 hover:-translate-y-0.5 xl:inline-flex"
            >
                Partner Enquiry
            </a>

            {{-- Mobile / Tablet Menu Button --}}
            <button
                id="menuBtn"
                type="button"
                class="inline-flex items-center gap-2 rounded-xl bg-slate-950
                       px-4 py-3 text-sm font-black text-white shadow
                       xl:hidden"
                aria-controls="mobileMenu"
                aria-expanded="false"
            >
                <span>Menu</span>
                <span id="menuIcon" aria-hidden="true">☰</span>
            </button>
        </div>
    </div>

    {{-- Mobile / Tablet Menu --}}
    <div
        id="mobileMenu"
        class="hidden border-t border-slate-100 bg-white xl:hidden"
    >
        <div class="mx-auto grid w-full max-w-[1280px] gap-2 px-4 py-5 font-semibold sm:px-6 lg:px-8">

            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs(...$item['active']);
                    $hasChildren = !empty($item['children']);
                @endphp

                @if ($hasChildren)
                    <div class="rounded-2xl border border-slate-100 bg-slate-50 p-2">
                        <button
                            type="button"
                            class="mobileDropdownBtn flex w-full items-center justify-between
                                   rounded-xl px-4 py-3 text-left font-black
                                   {{ $isActive ? 'text-blue-700' : 'text-slate-800' }}"
                        >
                            <span>{{ $item['label'] }}</span>

                            <span
                                class="mobileDropdownIcon text-xl leading-none"
                                aria-hidden="true"
                            >
                                {{ $isActive ? '−' : '+' }}
                            </span>
                        </button>

                        <div
                            class="mobileDropdownMenu mt-1 grid gap-1
                                   {{ $isActive ? '' : 'hidden' }}"
                        >
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
                class="mt-3 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500
                       px-4 py-3 text-center font-black text-white
                       shadow-lg shadow-blue-500/20"
            >
                Partner Enquiry
            </a>
        </div>
    </div>
</header>