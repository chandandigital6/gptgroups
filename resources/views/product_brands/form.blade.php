@php
    $isEdit = !empty($productBrand);
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
                Brand Details
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Add brand name, logo, banner and basic details.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Brand Name <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $productBrand->name ?? '') }}"
                       placeholder="Samsung"
                       required
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Slug
                </label>

                <input type="text"
                       name="slug"
                       value="{{ old('slug', $productBrand->slug ?? '') }}"
                       placeholder="samsung"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

                <p class="mt-1 text-xs text-neutral-500">
                    Blank छोड़ने पर name से auto generate होगा.
                </p>
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Write brand description..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $productBrand->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Brand Logo
                </label>

                <input type="file"
                       name="logo"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $productBrand->logo)
                    <div class="mt-3 rounded-xl border border-neutral-200 bg-white p-3 dark:border-neutral-700 dark:bg-neutral-950">
                        <img src="{{ asset('storage/' . $productBrand->logo) }}"
                             alt="{{ $productBrand->name }}"
                             class="h-20 w-full object-contain">
                    </div>
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Banner Image
                </label>

                <input type="file"
                       name="banner_image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $productBrand->banner_image)
                    <img src="{{ asset('storage/' . $productBrand->banner_image) }}"
                         alt="{{ $productBrand->name }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $productBrand->sort_order ?? 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="flex items-center">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           @checked(old('status', $productBrand->status ?? 1))
                           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Active Brand
                    </span>
                </label>
            </div>

        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Brand' : 'Create Brand' }}
        </button>
    </div>
</form>