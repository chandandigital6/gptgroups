@extends('front_pages.front_components.main')

@section('content')

<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.22),transparent_35%),radial-gradient(circle_at_80%_25%,rgba(37,99,235,.22),transparent_35%)]"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
            <div>
                <a href="{{ route('brands.show', $brand->slug) }}" class="text-sm font-black uppercase tracking-[.25em] text-cyan-300">
                    ← {{ $brand->name }} Categories
                </a>

                <h1 class="mt-5 text-5xl sm:text-6xl lg:text-7xl font-black leading-tight">
                    {{ $category->name }}
                </h1>

                @if($category->description)
                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">
                        {{ $category->description }}
                    </p>
                @endif

                <div class="mt-8 flex flex-wrap gap-3">
                    <span class="rounded-full bg-white px-5 py-2 text-sm font-black text-slate-950">
                        {{ $brand->name }}
                    </span>

                    <span class="rounded-full bg-cyan-300 px-5 py-2 text-sm font-black text-slate-950">
                        {{ $products->total() }} Products
                    </span>
                </div>
            </div>

            <div class="rounded-[2.5rem] bg-white/10 p-6 border border-white/10">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}"
                         alt="{{ $category->name }}"
                         class="h-80 w-full rounded-[2rem] object-cover">
                @else
                    <div class="grid h-80 w-full place-items-center rounded-[2rem] bg-white/10">
                        <span class="text-7xl font-black text-cyan-300">
                            {{ strtoupper(substr($category->name, 0, 1)) }}
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
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Products</p>
            <h2 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-black text-slate-950">
                {{ $category->name }} Products
            </h2>
        </div>

        @if($products->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($products as $product)
                    <a href="{{ route('product.detail', $product->slug) }}"
                       class="group overflow-hidden rounded-[2rem] bg-slate-50 shadow-sm border border-slate-100 transition hover:-translate-y-2 hover:shadow-2xl">

                        <div class="relative h-72 bg-gradient-to-br from-white to-blue-50 p-6">
                            @if($product->badge)
                                <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if($product->product_type)
                                <span class="absolute right-5 top-5 rounded-full bg-white px-4 py-2 text-xs font-black text-blue-700 shadow">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            @endif

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

                            @if($product->short_description)
                                <p class="mt-2 text-sm leading-6 text-slate-600 line-clamp-2">
                                    {{ $product->short_description }}
                                </p>
                            @endif

                            <div class="mt-5 flex items-center justify-between">
                                <span class="text-xs font-black uppercase tracking-[.2em] text-blue-700">
                                    View Details
                                </span>

                                <span class="grid h-10 w-10 place-items-center rounded-full bg-slate-100 text-xl text-slate-500 transition group-hover:bg-blue-600 group-hover:text-white">
                                    →
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @else
            <div class="rounded-[2rem] bg-slate-50 p-10 text-center">
                <h2 class="text-2xl font-black text-slate-950">No products found in this category.</h2>
            </div>
        @endif

    </div>
</section>

@if($otherCategories->count())
<section class="bg-slate-100 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <p class="font-black uppercase tracking-[.3em] text-blue-700">Other Categories</p>
            <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl">
                More from {{ $brand->name }}
            </h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($otherCategories as $item)
                <a href="{{ route('brands.categories.show', [$brand->slug, $item->slug]) }}"
                   class="rounded-[2rem] bg-white p-6 shadow-sm transition hover:-translate-y-2 hover:shadow-xl">

                    <h3 class="text-2xl font-black text-slate-950">
                        {{ $item->name }}
                    </h3>

                    <p class="mt-3 text-sm font-black uppercase tracking-[.2em] text-blue-700">
                        {{ $item->products_count }} Products
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection