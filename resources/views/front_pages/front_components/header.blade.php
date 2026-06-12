@php
    $navItems = [
        ['label' => 'Home', 'route' => 'home', 'active' => ['home']],
        ['label' => 'About', 'route' => 'about', 'active' => ['about']],
        ['label' => 'Brands', 'route' => 'brands', 'active' => ['brands', 'products']],
        ['label' => 'Network', 'route' => 'network', 'active' => ['network']],
        ['label' => 'News', 'route' => 'news', 'active' => ['news']],
        ['label' => 'Group Companies', 'route' => 'groups_company', 'active' => ['groups_company']],
        ['label' => 'Careers', 'route' => 'carriers', 'active' => ['carriers']],
        ['label' => 'Contact', 'route' => 'contact', 'active' => ['contact']],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-white/20 bg-white/80 backdrop-blur-xl shadow-sm">
    <div class="containerx h-20 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-400 grid place-items-center text-white font-black text-xl shadow-lg shadow-blue-500/20">
                GPT
            </div>
            <div>
                <p class="font-black tracking-tight text-xl text-slate-950">GPT Group</p>
                <p class="text-xs text-slate-500 -mt-1">Global Phone Technology</p>
            </div>
        </a>

        <nav class="hidden lg:flex items-center gap-2 font-semibold text-sm">
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs($item['active']);
                @endphp

                <a
                    href="{{ route($item['route']) }}"
                    class="rounded-full px-4 py-2 transition
                    {{ $isActive
                        ? 'bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/20'
                        : 'text-slate-700 hover:bg-blue-50 hover:text-blue-700'
                    }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <a
            href="{{ route('contact') }}"
            class="hidden md:inline-flex rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-0.5"
        >
            Partner Enquiry
        </a>

        <button
            id="menuBtn"
            type="button"
            class="lg:hidden rounded-xl bg-slate-950 px-4 py-3 text-sm font-black text-white shadow"
        >
            Menu
        </button>
    </div>

    <div id="mobileMenu" class="mobile-menu lg:hidden border-t border-slate-100 bg-white">
        <div class="containerx py-5 grid gap-2 font-semibold">
            @foreach ($navItems as $item)
                @php
                    $isActive = request()->routeIs($item['active']);
                @endphp

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
            @endforeach

            <a
                href="{{ route('contact') }}"
                class="mt-3 rounded-2xl bg-slate-950 px-4 py-3 text-center text-white font-black"
            >
                Partner Enquiry
            </a>
        </div>
    </div>
</header>