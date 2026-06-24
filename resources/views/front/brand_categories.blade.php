@extends('front_pages.front_components.main')

@section('content')

<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.22),transparent_35%),radial-gradient(circle_at_80%_25%,rgba(37,99,235,.22),transparent_35%)]"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
            <div>
                <a href="{{ route('brands') }}" class="text-sm font-black uppercase tracking-[.25em] text-cyan-300">
                    ← All Brands
                </a>

                <h1 class="mt-5 text-5xl sm:text-6xl lg:text-7xl font-black leading-tight">
                    {{ $brand->name }}
                </h1>

                @if($brand->description)
                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">
                        {{ $brand->description }}
                    </p>
                @endif
            </div>

            <div class="rounded-[2.5rem] bg-white/10 p-6 border border-white/10">
                @if($brand->banner_image)
                    <img src="{{ asset('storage/' . $brand->banner_image) }}"
                         alt="{{ $brand->name }}"
                         class="h-80 w-full rounded-[2rem] object-cover">
                @elseif($brand->logo)
                    <div class="rounded-[2rem] bg-white p-8">
                        <img src="{{ asset('storage/' . $brand->logo) }}"
                             alt="{{ $brand->name }}"
                             class="h-72 w-full object-contain">
                    </div>
                @else
                    <div class="grid h-80 w-full place-items-center rounded-[2rem] bg-white/10">
                        <span class="text-7xl font-black text-cyan-300">
                            {{ strtoupper(substr($brand->name, 0, 1)) }}
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-12">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Categories</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                {{ $brand->name }} Categories
            </h2>
        </div>

        @if($categories->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($categories as $category)
                    <a href="{{ route('brands.categories.show', [$brand->slug, $category->slug]) }}"
                       class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">

                        <div class="h-56 bg-white p-5">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}"
                                     alt="{{ $category->name }}"
                                     class="h-full w-full rounded-[1.5rem] object-cover transition group-hover:scale-105">
                            @else
                                <div class="grid h-full w-full place-items-center rounded-[1.5rem] bg-blue-50">
                                    <span class="text-5xl font-black text-blue-700">
                                        {{ strtoupper(substr($category->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-7">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-2xl font-black text-slate-950">
                                        {{ $category->name }}
                                    </h3>

                                    @if($category->description)
                                        <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                            {{ $category->description }}
                                        </p>
                                    @endif
                                </div>

                                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-full bg-slate-100 text-2xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>

                            <p class="mt-5 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                {{ $category->products_count }} Products
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $categories->links() }}
            </div>
        @else
            <div class="rounded-[2rem] bg-slate-50 p-10 text-center">
                <h2 class="text-2xl font-black text-slate-950">No categories found for this brand.</h2>
            </div>
        @endif

    </div>
</section>

@if($latestProducts->count())
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Products</p>
            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
                Latest {{ $brand->name }} Products
            </h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($latestProducts as $product)
                <a href="{{ route('product.detail', $product->slug) }}"
                   class="group overflow-hidden rounded-[2rem] bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">

                    <div class="h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="h-full w-full object-contain transition group-hover:scale-110">
                        @else
                            <div class="grid h-full w-full place-items-center text-slate-400">
                                No Image
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-black text-slate-950">
                            {{ $product->name }}
                        </h3>

                        @if($product->category)
                            <p class="mt-2 text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                {{ $product->category->name }}
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