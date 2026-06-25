
@php
    $footerCompanyLinks = [
        ['label' => 'About GPT Group', 'route' => 'about'],
        ['label' => 'Our Network', 'route' => 'network'],
        ['label' => 'Group Companies', 'route' => 'groups_company'],
        ['label' => 'Careers', 'route' => 'carriers'],
        ['label' => 'Contact Us', 'route' => 'contact'],
    ];

    $footerServiceLinks = [
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'Retail Outlets', 'route' => 'retail_outlet'],
        ['label' => 'GPT Care', 'route' => 'services', 'hash' => '#gpt-care'],
        ['label' => 'B2B Programs', 'route' => 'services', 'hash' => '#b2b-program'],
        ['label' => 'Service Enquiry', 'route' => 'services', 'hash' => '#service-form'],
    ];

    $footerProductLinks = [
        ['label' => 'Our Brands', 'route' => 'brands'],
        ['label' => 'All Products', 'route' => 'products'],
        ['label' => 'Offers & Launches', 'route' => 'news'],
        ['label' => 'Partner Enquiry', 'route' => 'contact'],
    ];
@endphp

<footer class="relative overflow-hidden bg-slate-950 text-white">
    {{-- Background Glow --}}
    <div class="absolute inset-0">
        <div class="absolute -top-28 -left-28 h-80 w-80 rounded-full bg-blue-600/20 blur-3xl"></div>
        <div class="absolute right-0 top-20 h-96 w-96 rounded-full bg-cyan-400/10 blur-3xl"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px] opacity-20"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 pb-8 pt-20 sm:px-6 lg:px-8">

        {{-- Top CTA --}}
        <div class="mb-14 overflow-hidden rounded-[2.5rem] border border-white/10 bg-white/10 p-8 backdrop-blur sm:p-10 lg:p-12">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="font-black uppercase tracking-[.3em] text-cyan-300">
                        Partner With GPT Group
                    </p>

                    <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
                        Build your distribution advantage across Oman & GCC.
                    </h2>

                    <p class="mt-4 max-w-2xl leading-7 text-slate-300">
                        Connect with GPT Group for telecom distribution, retail outlet support, B2B supply, product launches and market expansion.
                    </p>
                </div>

                <div class="lg:text-right">
                    <a href="{{ route('contact') }}"
                       class="inline-flex rounded-full bg-white px-8 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                        Start Partnership
                    </a>
                </div>
            </div>
        </div>

        {{-- Footer Grid --}}
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-5">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <img
                        src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                        alt="GPT Group Logo"
                        class="h-16 w-auto max-w-[190px] rounded-xl bg-white p-2 object-contain"
                    >
                </a>

                <p class="mt-6 max-w-md text-sm leading-7 text-slate-300">
                    Tech distributor for the modern age. Building strong telecom, retail, B2B, service and supply-chain partnerships across Oman and GCC.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="#" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 text-sm font-black text-white transition hover:bg-blue-600">f</a>
                    <a href="#" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 text-sm font-black text-white transition hover:bg-blue-600">in</a>
                    <a href="#" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 text-sm font-black text-white transition hover:bg-blue-600">ig</a>
                    <a href="#" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 text-sm font-black text-white transition hover:bg-blue-600">x</a>
                </div>
            </div>

            {{-- Company --}}
            <div>
                <h4 class="text-lg font-black">Company</h4>
                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerCompanyLinks as $link)
                        <a class="transition hover:text-cyan-300" href="{{ route($link['route']) }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Services --}}
            <div>
                <h4 class="text-lg font-black">Services</h4>
                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerServiceLinks as $link)
                        <a class="transition hover:text-cyan-300" href="{{ route($link['route']) }}{{ $link['hash'] ?? '' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Products / Updates --}}
            <div>
                <h4 class="text-lg font-black">Products & Updates</h4>
                <div class="mt-6 grid gap-3 text-sm text-slate-300">
                    @foreach ($footerProductLinks as $link)
                        <a class="transition hover:text-cyan-300" href="{{ route($link['route']) }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>

                <div class="mt-6 rounded-2xl border border-white/10 bg-white/5 p-4">
                    <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-300">Subscribe</p>

                    <form action="#" method="POST" class="mt-3">
                        @csrf
                        <div class="flex overflow-hidden rounded-full border border-white/10 bg-white">
                            <input
                                type="email"
                                name="email"
                                class="w-full min-w-0 px-4 py-3 text-sm text-slate-950 outline-none placeholder:text-slate-400"
                                placeholder="Enter email"
                            >
                            <button
                                type="submit"
                                class="shrink-0 bg-gradient-to-r from-blue-600 to-cyan-500 px-4 py-3 text-xs font-black text-white">
                                Join
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Contact Strip --}}
        <div class="mt-12 grid gap-4 rounded-[2rem] border border-white/10 bg-white/5 p-5 md:grid-cols-3">
            <a href="tel:+96824501533" class="rounded-2xl p-3 transition hover:bg-white/5">
                <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-300">Helpline</p>
                <p class="mt-1 text-sm font-bold text-slate-200">+968 2450-1533</p>
            </a>

            <a href="mailto:info@gptgroups.com" class="rounded-2xl p-3 transition hover:bg-white/5">
                <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-300">Email</p>
                <p class="mt-1 break-words text-sm font-bold text-slate-200">info@gptgroups.com</p>
            </a>

            <div class="rounded-2xl p-3">
                <p class="text-xs font-black uppercase tracking-[.2em] text-cyan-300">Location</p>
                <p class="mt-1 text-sm font-bold text-slate-200">Muscat, Sultanate of Oman</p>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="mt-8 border-t border-white/10 pt-8">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <p class="text-sm text-slate-400">
                    Copyright © <span data-year></span> Global Phone Technologies. All Rights Reserved.
                </p>

                <div class="flex flex-wrap gap-4 text-sm text-slate-400">
                    <a href="#" class="transition hover:text-cyan-300">Privacy Policy</a>
                    <a href="#" class="transition hover:text-cyan-300">Terms</a>
                    <span>Designed with Chandan</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function () {
                const isHidden = mobileMenu.classList.toggle('hidden');
                menuBtn.setAttribute('aria-expanded', isHidden ? 'false' : 'true');

                if (menuIcon) {
                    menuIcon.textContent = isHidden ? '☰' : '×';
                }
            });
        }

        document.querySelectorAll('.mobileDropdownBtn').forEach(function (button) {
            button.addEventListener('click', function () {
                const wrapper = button.closest('div');
                const dropdown = wrapper ? wrapper.querySelector('.mobileDropdownMenu') : null;
                const icon = wrapper ? wrapper.querySelector('.mobileDropdownIcon') : null;

                if (dropdown) {
                    const isHidden = dropdown.classList.toggle('hidden');

                    if (icon) {
                        icon.textContent = isHidden ? '+' : '−';
                    }
                }
            });
        });

        document.querySelectorAll('[data-year]').forEach(function (el) {
            el.textContent = new Date().getFullYear();
        });
    });
</script>
