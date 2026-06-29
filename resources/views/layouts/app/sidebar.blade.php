<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky collapsible="mobile"
        class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <livewire:team-switcher />

        <flux:sidebar.nav>
            <flux:sidebar.group :heading="__('Platform')" class="grid">

                <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate>
                    {{ __('Dashboard') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="photo" :href="route('banners.index')"
                    :current="request()->routeIs('banners.*')" wire:navigate>
                    {{ __('Banners') }}
                </flux:sidebar.item>


                <flux:sidebar.item icon="building-office-2" :href="route('company-overviews.index')"
                    :current="request()->routeIs('company-overviews.*')" wire:navigate>
                    {{ __('Company Overview') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="globe-alt" :href="route('network-sections.index')"
                    :current="request()->routeIs('network-sections.*')" wire:navigate>
                    {{ __('Network Section') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="building-storefront" :href="route('retail-outlet-sections.index')"
                    :current="request()->routeIs('retail-outlet-sections.*')" wire:navigate>
                    {{ __('Retail Outlets') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="rectangle-stack" :href="route('business-vertical-sections.index')"
                    :current="request()->routeIs('business-vertical-sections.*')" wire:navigate>
                    {{ __('Business Verticals') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="chart-bar-square" :href="route('strategy-sections.index')"
                    :current="request()->routeIs('strategy-sections.*')" wire:navigate>
                    {{ __('Strategies') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="question-mark-circle" :href="route('faq-sections.index')"
                    :current="request()->routeIs('faq-sections.*')" wire:navigate>
                    {{ __('FAQs') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="chart-bar-square" :href="route('quick-fact-sections.index')"
                    :current="request()->routeIs('quick-fact-sections.*')" wire:navigate>
                    {{ __('Quick Facts') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="photo" :href="route('partner-logo-sections.index')"
                    :current="request()->routeIs('partner-logo-sections.*')" wire:navigate>
                    {{ __('Partner Logos') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="chat-bubble-left-right" :href="route('testimonial-sections.index')"
                    :current="request()->routeIs('testimonial-sections.*')" wire:navigate>
                    {{ __('Testimonials') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="rectangle-stack" :href="route('page-heroes.index')"
                    :current="request()->routeIs('page-heroes.*')" wire:navigate>
                    {{ __('Page Heroes') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="wrench-screwdriver" :href="route('repair-service-sections.index')"
                    :current="request()->routeIs('repair-service-sections.*')" wire:navigate>
                    {{ __('Repair Services') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="building-office" :href="route('b2b-program-sections.index')"
                    :current="request()->routeIs('b2b-program-sections.*')" wire:navigate>
                    {{ __('B2B Program') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="sparkles" :href="route('b2b-benefit-sections.index')"
                    :current="request()->routeIs('b2b-benefit-sections.*')" wire:navigate>
                    {{ __('B2B Benefits') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="wrench-screwdriver" :href="route('service-sections.index')"
                    :current="request()->routeIs('service-sections.*')" wire:navigate>
                    {{ __('Services') }}
                </flux:sidebar.item>



                <flux:sidebar.item icon="user-circle" :href="route('founder-sections.index')"
                    :current="request()->routeIs('founder-sections.*')" wire:navigate>
                    {{ __('Founder Section') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="user-group" :href="route('team-members.index')"
                    :current="request()->routeIs('team-members.*')" wire:navigate>
                    {{ __('Team Members') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="briefcase" :href="route('what-we-do-sections.index')"
                    :current="request()->routeIs('what-we-do-sections.*')" wire:navigate>
                    {{ __('What We Do') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="building-storefront" :href="route('product-brands.index')"
                    :current="request()->routeIs('product-brands.*')" wire:navigate>
                    {{ __('Product Brands') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="squares-2x2" :href="route('product-categories.index')"
                    :current="request()->routeIs('product-categories.*')" wire:navigate>
                    {{ __('Product Categories') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="cube" :href="route('products.index')"
                    :current="request()->routeIs('products.*')" wire:navigate>
                    {{ __('Products') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="tag" :href="route('news-categories.index')"
                    :current="request()->routeIs('news-categories.*')" wire:navigate>
                    {{ __('News Categories') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="newspaper" :href="route('news-posts.index')"
                    :current="request()->routeIs('news-posts.*')" wire:navigate>
                    {{ __('News Posts') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="users" :href="route('users.index')"
                    :current="request()->routeIs('users.*')" wire:navigate>
                    {{ __('Users') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="shield-check" :href="route('roles.index')"
                    :current="request()->routeIs('roles.*')" wire:navigate>
                    {{ __('Roles') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="key" :href="route('permissions.index')"
                    :current="request()->routeIs('permissions.*')" wire:navigate>
                    {{ __('Permissions') }}
                </flux:sidebar.item>

            </flux:sidebar.group>
        </flux:sidebar.nav>


        <flux:spacer />



        <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                        class="w-full cursor-pointer" data-test="logout-button">
                        {{ __('Log out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @persist('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>
