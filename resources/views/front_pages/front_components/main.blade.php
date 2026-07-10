<!doctype html>
<html lang="en">
<head>
    {{-- Basic Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO Title --}}
    <title>@yield('title', 'GPT Group | Telecom Distribution, B2B Supply & Retail Network in Oman')</title>

    {{-- SEO Description --}}
    <meta name="description" content="@yield('meta_description', 'GPT Group is a modern telecom distribution and business group in Oman, supporting mobile devices, smartphones, tablets, accessories, B2B supply, retail outlets, GPT Care and partner programs across Oman and GCC.')">

    {{-- SEO Keywords --}}
    <meta name="keywords" content="@yield('meta_keywords', 'GPT Group, Global Phone Technologies, telecom distributor Oman, mobile distributor Oman, smartphone distributor Oman, B2B supply Oman, retail outlets Oman, GPT Care, Samsung distributor Oman, LAVA mobiles Oman, mobile accessories Oman')">

    <meta name="author" content="GPT Group">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#020617">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/favicon_io/favicon-16x16.png') }}">

    {{-- Open Graph / Facebook / WhatsApp --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="GPT Group">
    <meta property="og:title" content="@yield('og_title', 'GPT Group | Telecom Distribution & B2B Supply in Oman')">
    <meta property="og:description" content="@yield('og_description', 'GPT Group supports telecom distribution, retail outlets, B2B supply, mobile accessories, GPT Care and partner programs across Oman and GCC.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/og-image.jpg'))">
    <meta property="og:image:alt" content="GPT Group Oman Telecom Distribution">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'GPT Group | Telecom Distribution & Retail Network')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Modern telecom distribution, B2B supply, retail outlet support and GPT Care services across Oman and GCC.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/images/og-image.jpg'))">

    {{-- Preconnect for CDN --}}
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Swiper Slider CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Main CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}

    <link
    rel="stylesheet"
    href="{{ asset('assets/css/style.css') }}?v={{ file_exists(public_path('assets/css/style.css')) ? filemtime(public_path('assets/css/style.css')) : time() }}"
>


    @stack('styles')
</head>

<body class="bg-slate-50 text-slate-900 overflow-x-hidden">

    @include('front_pages.front_components.header')

    @yield('content')

    @include('front_pages.front_components.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}

    <script
    src="{{ asset('assets/js/main.js') }}?v={{ file_exists(public_path('assets/js/main.js')) ? filemtime(public_path('assets/js/main.js')) : time() }}"
></script>

    @stack('scripts')
</body>
</html>