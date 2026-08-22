<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'GPT Group Oman | Technology Distribution, Security & B2B Solutions')
    </title>

    <meta name="description"
          content="@yield('meta_description', 'GPT Group, operated by Global Phone Technology LLC, is a technology distribution and business solutions company in Oman offering smartphones, mobility products, Hikvision security systems, smart-home solutions, networking, B2B supply and after-sales support.')">

    <meta name="keywords"
          content="@yield('meta_keywords', 'GPT Group Oman, Global Phone Technology LLC, technology distributor Oman, mobile distributor Oman, Samsung Oman, Vivo distributor Oman, Hikvision distributor Oman, CCTV Oman, B2B technology supply Oman, smart home Oman, networking solutions Oman')">

    <meta name="author" content="Global Phone Technology LLC">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#020617">

    <link rel="canonical" href="{{ url()->current() }}">

    {{-- GPT Group Favicons --}}
    <link rel="icon"
          type="image/x-icon"
          href="{{ asset('favicon.ico') }}?v=3">

    <link rel="shortcut icon"
          type="image/x-icon"
          href="{{ asset('favicon.ico') }}?v=3">

    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="{{ asset('assets/favicon_io/favicon-32x32.png') }}?v=3">

    <link rel="icon"
          type="image/png"
          sizes="16x16"
          href="{{ asset('assets/favicon_io/favicon-16x16.png') }}?v=3">

    <link rel="apple-touch-icon"
          sizes="180x180"
          href="{{ asset('assets/favicon_io/apple-touch-icon.png') }}?v=3">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="GPT Group Oman">
    <meta property="og:title"
          content="@yield('og_title', 'GPT Group Oman | Technology Distribution & Business Solutions')">
    <meta property="og:description"
          content="@yield('og_description', 'Technology distribution, mobility products, security systems, networking, smart-home solutions and B2B supply across Oman and GCC.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image"
          content="@yield('og_image', asset('assets/logo/GPT-Group-Logo.webp'))">
    <meta property="og:image:alt"
          content="GPT Group Oman – Technology Distribution and Business Solutions">
    <meta property="og:locale" content="en_US">

    {{-- Twitter/X Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
          content="@yield('twitter_title', 'GPT Group Oman | Technology Distribution & B2B Solutions')">
    <meta name="twitter:description"
          content="@yield('twitter_description', 'Mobility products, security systems, networking, smart-home solutions and B2B technology supply across Oman.')">
    <meta name="twitter:image"
          content="@yield('twitter_image', asset('assets/logo/GPT-Group-Logo.webp'))">

    {{-- Real GPT Group Organization Data --}}
    @php
        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => url('/') . '/#organization',
            'name' => 'Global Phone Technology LLC',
            'alternateName' => [
                'GPT Group',
                'GPT Group Oman',
            ],
            'url' => url('/'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('assets/logo/GPT-Group-Logo.webp'),
            ],
            'image' => asset('assets/logo/GPT-Group-Logo.webp'),
            'description' => 'GPT Group is a technology distribution and business solutions company serving Oman and the GCC with mobility products, security systems, smart-home technology, networking solutions, B2B supply and after-sales support.',
            'foundingDate' => '2016',
            'telephone' => '+968 2450 1533',
            'email' => 'info@gptgroups.com',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'GPT Tower, Office 1, Building 752, Way 5007, Ghala Heights',
                'addressLocality' => 'Muscat',
                'addressRegion' => 'Muscat',
                'addressCountry' => 'OM',
            ],
            'areaServed' => [
                ['@type' => 'Country', 'name' => 'Oman'],
                ['@type' => 'Place', 'name' => 'GCC'],
            ],
            'sameAs' => [
                'https://www.facebook.com/gptmobiles.om/',
                'https://www.instagram.com/gptgroups.om/',
                'https://www.linkedin.com/company/global-phone-technology-llc/',
            ],
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => url('/') . '/#website',
            'url' => url('/'),
            'name' => 'GPT Group Oman',
            'alternateName' => 'Global Phone Technology LLC',
            'publisher' => [
                '@id' => url('/') . '/#organization',
            ],
            'inLanguage' => 'en',
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet"
          href="{{ asset('assets/css/style.css') }}?v={{ file_exists(public_path('assets/css/style.css')) ? filemtime(public_path('assets/css/style.css')) : time() }}">

    @stack('styles')
</head>

<body class="bg-slate-50 text-slate-900 overflow-x-hidden">

    @include('front_pages.front_components.header')

    @yield('content')

    @include('front_pages.front_components.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script
        src="{{ asset('assets/js/main.js') }}?v={{ file_exists(public_path('assets/js/main.js')) ? filemtime(public_path('assets/js/main.js')) : time() }}"
        defer>
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        defer>
    </script>

    @stack('scripts')
</body>
</html>
