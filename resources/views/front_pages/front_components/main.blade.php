<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Premium Telecom Distribution Website | GPT Group</title>
    <meta name="description" content="GPT Group business website" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  </head>
  <body class="bg-slate-50 text-slate-900">
  @include('front_pages.front_components.header')

  

  @yield('content')



    @include('front_pages.front_components.footer')
  
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>
