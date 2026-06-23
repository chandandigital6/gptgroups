@extends('front_pages.front_components.main')

@section('content')

    {{-- PRODUCT HERO --}}
    <section class="relative overflow-hidden bg-slate-950 py-16 text-white lg:py-24">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.18),transparent_35%),radial-gradient(circle_at_85%_35%,rgba(37,99,235,.20),transparent_38%)]"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid items-center gap-12 lg:grid-cols-2">

                {{-- Content --}}
                <div>
                    <div class="flex flex-wrap gap-3">
                        @if($product->brand)
                            <span class="rounded-full border border-white/15 bg-white/10 px-5 py-2 text-sm font-black backdrop-blur">
                                {{ $product->brand->name }}
                            </span>
                        @endif

                        @if($product->category)
                            <span class="rounded-full bg-cyan-300 px-5 py-2 text-sm font-black text-slate-950">
                                {{ $product->category->name }}
                            </span>
                        @endif

                        @if($product->badge)
                            <span class="rounded-full bg-blue-600 px-5 py-2 text-sm font-black text-white">
                                {{ $product->badge }}
                            </span>
                        @endif
                    </div>

                    <h1 class="mt-6 text-4xl font-black leading-tight sm:text-5xl lg:text-7xl">
                        {{ $product->name }}
                    </h1>

                    @if($product->short_description)
                        <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                            {{ $product->short_description }}
                        </p>
                    @endif

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}"
                           class="rounded-full bg-cyan-300 px-7 py-4 text-sm font-black text-slate-950 shadow-xl transition hover:-translate-y-1">
                            Enquire Now
                        </a>

                        <a href="{{ route('home') }}"
                           class="rounded-full border border-white/20 bg-white/10 px-7 py-4 text-sm font-black text-white backdrop-blur transition hover:-translate-y-1 hover:bg-white/20">
                            Back Home
                        </a>
                    </div>
                </div>

                {{-- Main Image --}}
                <div class="rounded-[2.5rem] border border-white/10 bg-white/10 p-5 shadow-2xl backdrop-blur">
                    <div class="rounded-[2rem] bg-white p-6">
                        @if($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="h-[360px] w-full object-contain sm:h-[460px]"
                            >
                        @else
                            <div class="grid h-[360px] w-full place-items-center text-slate-400 sm:h-[460px]">
                                No Image
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- DETAILS --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid gap-10 lg:grid-cols-[1fr_.8fr]">

                {{-- Description + Gallery --}}
                <div>
                    <h2 class="text-4xl font-black text-slate-950">
                        Product Details
                    </h2>

                    @if($product->description)
                        <div class="mt-6 whitespace-pre-line text-lg leading-8 text-slate-600">
                            {{ $product->description }}
                        </div>
                    @endif

                    @if(is_array($product->gallery) && count($product->gallery))
                        <div class="mt-10">
                            <h3 class="text-3xl font-black text-slate-950">
                                Product Gallery
                            </h3>

                            <div class="mt-6 grid gap-5 sm:grid-cols-2">
                                @foreach($product->gallery as $galleryImage)
                                    <div class="rounded-[2rem] bg-slate-50 p-5 shadow-sm">
                                        <img
                                            src="{{ asset('storage/' . $galleryImage) }}"
                                            alt="{{ $product->name }}"
                                            class="h-72 w-full object-contain"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Info Box --}}
                <aside class="h-fit rounded-[2.5rem] bg-slate-50 p-7 shadow-sm">
                    <h3 class="text-2xl font-black text-slate-950">
                        Product Information
                    </h3>

                    <div class="mt-6 grid gap-3">
                        @if($product->brand)
                            <div class="flex justify-between gap-4 rounded-2xl bg-white p-4">
                                <span class="font-bold text-slate-500">Brand</span>
                                <span class="text-right font-black text-slate-950">{{ $product->brand->name }}</span>
                            </div>
                        @endif

                        @if($product->category)
                            <div class="flex justify-between gap-4 rounded-2xl bg-white p-4">
                                <span class="font-bold text-slate-500">Category</span>
                                <span class="text-right font-black text-slate-950">{{ $product->category->name }}</span>
                            </div>
                        @endif

                        @if($product->model_no)
                            <div class="flex justify-between gap-4 rounded-2xl bg-white p-4">
                                <span class="font-bold text-slate-500">Model No</span>
                                <span class="text-right font-black text-slate-950">{{ $product->model_no }}</span>
                            </div>
                        @endif

                        @if($product->sku)
                            <div class="flex justify-between gap-4 rounded-2xl bg-white p-4">
                                <span class="font-bold text-slate-500">SKU</span>
                                <span class="text-right font-black text-slate-950">{{ $product->sku }}</span>
                            </div>
                        @endif

                        @if($product->launch_date)
                            <div class="flex justify-between gap-4 rounded-2xl bg-white p-4">
                                <span class="font-bold text-slate-500">Launch Date</span>
                                <span class="text-right font-black text-slate-950">{{ $product->launch_date->format('d M Y') }}</span>
                            </div>
                        @endif
                    </div>

                    @if(is_array($product->tags) && count($product->tags))
                        <div class="mt-7">
                            <h4 class="font-black text-slate-950">
                                Tags
                            </h4>

                            <div class="mt-3 flex flex-wrap gap-2">
                                @foreach($product->tags as $tag)
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if(is_array($product->specifications) && count($product->specifications))
                        <div class="mt-8">
                            <h4 class="font-black text-slate-950">
                                Specifications
                            </h4>

                            <div class="mt-4 grid gap-3">
                                @foreach($product->specifications as $key => $value)
                                    <div class="flex justify-between gap-4 rounded-2xl bg-white p-4">
                                        <span class="font-bold text-slate-500">{{ $key }}</span>
                                        <span class="text-right font-black text-slate-950">{{ $value }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>

            </div>
        </div>
    </section>

    {{-- RELATED PRODUCTS --}}
    @if($relatedProducts->count() > 0)
        <section class="bg-slate-100 py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mb-10">
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">
                        Related
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
                        Related Products
                    </h2>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($relatedProducts as $item)
                        <a href="{{ route('product.detail', $item->slug) }}"
                           class="group overflow-hidden rounded-[2rem] bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">

                            <div class="h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                                @if($item->image)
                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->name }}"
                                        class="h-full w-full object-contain transition group-hover:scale-110"
                                    >
                                @else
                                    <div class="grid h-full w-full place-items-center text-slate-400">
                                        No Image
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-black text-slate-950">
                                    {{ $item->name }}
                                </h3>

                                @if($item->short_description)
                                    <p class="mt-2 text-sm leading-6 text-slate-500 line-clamp-2">
                                        {{ $item->short_description }}
                                    </p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection