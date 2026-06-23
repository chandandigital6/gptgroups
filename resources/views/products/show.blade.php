<x-layouts::app :title="__('Product Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Product Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View product full details.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>

                <a href="{{ route('products.edit', $product) }}"
                   class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit Product
                </a>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[.9fr_1.1fr]">

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <div class="rounded-2xl bg-neutral-50 p-5 dark:bg-neutral-950">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="h-[420px] w-full object-contain">
                    @else
                        <div class="flex h-[420px] items-center justify-center text-neutral-400">
                            No Image
                        </div>
                    @endif
                </div>

                @if(is_array($product->gallery) && count($product->gallery))
                    <div class="mt-5 grid grid-cols-3 gap-3">
                        @foreach($product->gallery as $galleryImage)
                            <div class="rounded-xl border border-neutral-200 bg-white p-2 dark:border-neutral-700 dark:bg-neutral-950">
                                <img src="{{ asset('storage/' . $galleryImage) }}"
                                     alt="{{ $product->name }}"
                                     class="h-24 w-full object-contain">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

                <div class="flex flex-wrap gap-2">
                    @if($product->badge)
                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                            {{ $product->badge }}
                        </span>
                    @endif

                    <span class="rounded-full bg-cyan-100 px-3 py-1 text-xs font-bold capitalize text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                        {{ $product->product_type }}
                    </span>

                    @if($product->is_featured)
                        <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-bold text-purple-700 dark:bg-purple-900/30 dark:text-purple-300">
                            Featured
                        </span>
                    @endif

                    @if($product->status)
                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700 dark:bg-green-900/30 dark:text-green-300">
                            Active
                        </span>
                    @else
                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700 dark:bg-red-900/30 dark:text-red-300">
                            Inactive
                        </span>
                    @endif
                </div>

                <h2 class="mt-5 text-4xl font-black text-neutral-950 dark:text-white">
                    {{ $product->name }}
                </h2>

                @if($product->short_description)
                    <p class="mt-4 text-lg leading-8 text-neutral-600 dark:text-neutral-300">
                        {{ $product->short_description }}
                    </p>
                @endif

                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                        <p class="text-xs font-bold uppercase text-neutral-500">Brand</p>
                        <p class="mt-1 font-black text-neutral-950 dark:text-white">
                            {{ $product->brand?->name ?? '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                        <p class="text-xs font-bold uppercase text-neutral-500">Category</p>
                        <p class="mt-1 font-black text-neutral-950 dark:text-white">
                            {{ $product->category?->name ?? '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                        <p class="text-xs font-bold uppercase text-neutral-500">Model No</p>
                        <p class="mt-1 font-black text-neutral-950 dark:text-white">
                            {{ $product->model_no ?: '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                        <p class="text-xs font-bold uppercase text-neutral-500">SKU</p>
                        <p class="mt-1 font-black text-neutral-950 dark:text-white">
                            {{ $product->sku ?: '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                        <p class="text-xs font-bold uppercase text-neutral-500">Launch Date</p>
                        <p class="mt-1 font-black text-neutral-950 dark:text-white">
                            {{ $product->launch_date ? $product->launch_date->format('d M Y') : '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                        <p class="text-xs font-bold uppercase text-neutral-500">Sort Order</p>
                        <p class="mt-1 font-black text-neutral-950 dark:text-white">
                            {{ $product->sort_order }}
                        </p>
                    </div>
                </div>

                @if(is_array($product->tags) && count($product->tags))
                    <div class="mt-6">
                        <p class="mb-3 text-sm font-bold text-neutral-700 dark:text-neutral-300">
                            Tags
                        </p>

                        <div class="flex flex-wrap gap-2">
                            @foreach($product->tags as $tag)
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @if($product->description)
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="text-xl font-bold text-neutral-950 dark:text-white">
                    Full Description
                </h3>

                <div class="mt-4 whitespace-pre-line text-sm leading-7 text-neutral-600 dark:text-neutral-300">
                    {{ $product->description }}
                </div>
            </div>
        @endif

        @if(is_array($product->specifications) && count($product->specifications))
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="text-xl font-bold text-neutral-950 dark:text-white">
                    Specifications
                </h3>

                <div class="mt-5 grid gap-3 md:grid-cols-2">
                    @foreach($product->specifications as $key => $value)
                        <div class="flex justify-between gap-4 rounded-2xl bg-neutral-50 p-4 dark:bg-neutral-950">
                            <span class="font-semibold text-neutral-500">
                                {{ $key }}
                            </span>

                            <span class="text-right font-bold text-neutral-950 dark:text-white">
                                {{ $value }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</x-layouts::app>