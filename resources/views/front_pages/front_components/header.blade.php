  <header class="sticky top-0 z-50 glass">
      <div class="containerx h-20 flex items-center justify-between">
        <a href="./index.html" class="flex items-center gap-3"
          ><div
            class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-400 grid place-items-center text-white font-black text-xl"
          >
            GPT
          </div>
          <div>
            <p class="font-black tracking-tight text-xl">GPT Group</p>
            <p class="text-xs text-slate-500 -mt-1">Global Phone Technology</p>
          </div></a
        >
        <nav class="hidden lg:flex items-center gap-7 font-semibold text-sm">
          <a class="nav-link hover:text-blue-700" href="index.html">Home</a
          ><a class="nav-link hover:text-blue-700" href="pages/about.html"
            >About</a
          ><a class="nav-link hover:text-blue-700" href="pages/brands.html"
            >Brands</a
          ><a class="nav-link hover:text-blue-700" href="pages/network.html"
            >Network</a
          ><a class="nav-link hover:text-blue-700" href="pages/news.html"
            >News</a
          ><a
            class="nav-link hover:text-blue-700"
            href="pages/group-companies.html"
            >Group Companies</a
          ><a class="nav-link hover:text-blue-700" href="pages/careers.html"
            >Careers</a
          ><a class="nav-link hover:text-blue-700" href="pages/contact.html"
            >Contact</a
          >
        </nav>
        <a
          href="./pages/contact.html"
          class="hidden md:inline-flex btn-primary py-3 px-5"
          >Partner Enquiry</a
        ><button
          id="menuBtn"
          class="lg:hidden bg-white rounded-xl shadow px-4 py-3 font-bold"
        >
          Menu
        </button>
      </div>
      <div id="mobileMenu" class="mobile-menu lg:hidden border-t bg-white">
        <div class="containerx py-5 grid gap-4 font-semibold">
          <a class="nav-link hover:text-blue-700" href="{{ route('home') }}">Home</a
          ><a class="nav-link hover:text-blue-700" href="{{ route('about') }}"
            >About</a
          ><a class="nav-link hover:text-blue-700" href="{{ route('brands') }}"
            >Brands</a
          ><a class="nav-link hover:text-blue-700" href="{{ route('network') }}"
            >Network</a
          ><a class="nav-link hover:text-blue-700" href="{{ route('news') }}"
            >News</a
          ><a
            class="nav-link hover:text-blue-700"
            href="{{ route('groups_company') }}"
            >Group Companies</a
          ><a class="nav-link hover:text-blue-700" href="{{ route('carriers') }}"
            >Careers</a
          ><a class="nav-link hover:text-blue-700" href="{{ route('contact') }}"
            >Contact</a
          >
        </div>
      </div>
    </header>