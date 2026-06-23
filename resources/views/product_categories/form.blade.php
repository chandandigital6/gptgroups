@php
    $isEdit = !empty($productCategory);
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
                Category Details
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Add category name, brand, image and description.
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
                            @selected(old('product_brand_id', $productCategory->product_brand_id ?? '') == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>

                <p class="mt-1 text-xs text-neutral-500">
                    Example: Samsung, LAVA, Apple
                </p>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Category Name <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $productCategory->name ?? '') }}"
                       placeholder="Mobiles"
                       required
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Slug
                </label>

                <input type="text"
                       name="slug"
                       value="{{ old('slug', $productCategory->slug ?? '') }}"
                       placeholder="mobiles"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <p class="mt-1 text-xs text-neutral-500">
                    Blank छोड़ने पर name से auto generate होगा.
                </p>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $productCategory->sort_order ?? 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Write category description..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $productCategory->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Category Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $productCategory->image)
                    <img src="{{ asset('storage/' . $productCategory->image) }}"
                         alt="{{ $productCategory->name }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

            <div class="flex items-center">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           @checked(old('status', $productCategory->status ?? 1))
                           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Active Category
                    </span>
                </label>
            </div>

        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Category' : 'Create Category' }}
        </button>
    </div>
</form>