@php
    $isEdit = !empty($product);
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 p-5 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
        <div class="mb-2 font-bold">Please fix these errors:</div>

        <ul class="list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $formAction }}"
      method="POST"
      enctype="multipart/form-data"
      class="grid gap-6">

    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                Product Details
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Add product brand, category, details, images, tags and specifications.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Brand
                </label>

                <select name="product_brand_id"
                        class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    <option value="">Select Brand</option>

                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            @selected(old('product_brand_id', $product->product_brand_id ?? '') == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Category
                </label>

                <select name="product_category_id"
                        class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected(old('product_category_id', $product->product_category_id ?? '') == $category->id)>
                            {{ $category->brand?->name ? $category->brand->name . ' - ' : '' }}{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Product Name <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $product->name ?? '') }}"
                       placeholder="Samsung Galaxy S24"
                       required
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Slug
                </label>

                <input type="text"
                       name="slug"
                       value="{{ old('slug', $product->slug ?? '') }}"
                       placeholder="samsung-galaxy-s24"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <p class="mt-1 text-xs text-neutral-500">
                    Blank छोड़ने पर name से auto generate होगा.
                </p>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Product Type <span class="text-red-500">*</span>
                </label>

                <select name="product_type"
                        required
                        class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    <option value="latest" @selected(old('product_type', $product->product_type ?? 'latest') == 'latest')>
                        Latest Product
                    </option>

                    <option value="upcoming" @selected(old('product_type', $product->product_type ?? '') == 'upcoming')>
                        Upcoming Product
                    </option>

                    <option value="normal" @selected(old('product_type', $product->product_type ?? '') == 'normal')>
                        Normal Product
                    </option>
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Badge
                </label>

                <input type="text"
                       name="badge"
                       value="{{ old('badge', $product->badge ?? '') }}"
                       placeholder="New / 5G / Upcoming"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Model No
                </label>

                <input type="text"
                       name="model_no"
                       value="{{ old('model_no', $product->model_no ?? '') }}"
                       placeholder="SM-S921B"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    SKU
                </label>

                <input type="text"
                       name="sku"
                       value="{{ old('sku', $product->sku ?? '') }}"
                       placeholder="SKU-001"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Short Description
                </label>

                <textarea name="short_description"
                          rows="3"
                          placeholder="Short product text for cards..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('short_description', $product->short_description ?? '') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Full Description
                </label>

                <textarea name="description"
                          rows="6"
                          placeholder="Full product details..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Main Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $product->image)
                    <div class="mt-3 rounded-xl border border-neutral-200 bg-white p-3 dark:border-neutral-700 dark:bg-neutral-950">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="h-32 w-full object-contain">
                    </div>
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Gallery Images
                </label>

                <input type="file"
                       name="gallery[]"
                       accept="image/*"
                       multiple
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && is_array($product->gallery) && count($product->gallery))
                    <div class="mt-3 grid grid-cols-3 gap-2">
                        @foreach($product->gallery as $galleryImage)
                            <img src="{{ asset('storage/' . $galleryImage) }}"
                                 class="h-20 w-full rounded-lg bg-white object-contain p-1">
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Tags
                </label>

                <input type="text"
                       name="tags"
                       value="{{ old('tags', isset($product) && is_array($product->tags) ? implode(', ', $product->tags) : '') }}"
                       placeholder="5G, Retail, B2B"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <p class="mt-1 text-xs text-neutral-500">
                    Comma से separate करें: 5G, Retail, B2B
                </p>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Launch Date
                </label>

                <input type="date"
                       name="launch_date"
                       value="{{ old('launch_date', isset($product) && $product->launch_date ? $product->launch_date->format('Y-m-d') : '') }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Specifications
                </label>

                <textarea name="specifications"
                          rows="5"
                          placeholder="RAM: 8GB&#10;Storage: 128GB&#10;Battery: 5000mAh"
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('specifications', isset($product) && is_array($product->specifications) ? collect($product->specifications)->map(fn($v, $k) => $k . ': ' . $v)->implode("\n") : '') }}</textarea>

                <p class="mt-1 text-xs text-neutral-500">
                    Har line me key:value likho. Example: RAM: 8GB
                </p>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $product->sort_order ?? 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="flex items-center gap-6">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           @checked(old('is_featured', $product->is_featured ?? 0))
                           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Featured
                    </span>
                </label>

                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           @checked(old('status', $product->status ?? 1))
                           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Active Product
                    </span>
                </label>
            </div>

        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Product' : 'Create Product' }}
        </button>
    </div>
</form>