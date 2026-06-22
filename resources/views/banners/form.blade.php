@php
    $isEdit = !empty($banner);
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

    {{-- Main Info --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                Banner Content
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Add banner title, description and call-to-action buttons.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Badge
                </label>

                <input type="text"
                       name="badge"
                       value="{{ old('badge', $banner->badge ?? '') }}"
                       placeholder="New Product Arrival"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Theme
                </label>

                <select name="theme"
                        class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    @foreach(['cyan' => 'Cyan', 'yellow' => 'Yellow', 'emerald' => 'Emerald'] as $key => $label)
                        <option value="{{ $key }}" @selected(old('theme', $banner->theme ?? 'cyan') === $key)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Title <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title', $banner->title ?? '') }}"
                       placeholder="Accessories Now Available"
                       required
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Highlight
                </label>

                <input type="text"
                       name="highlight"
                       value="{{ old('highlight', $banner->highlight ?? '') }}"
                       placeholder="Chargers, Watches & Earphones"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Write banner description..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $banner->description ?? '') }}</textarea>
            </div>

        </div>

    </div>

    {{-- Buttons --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                Button Links
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Add primary and secondary button text and links.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Button Text
                </label>

                <input type="text"
                       name="button_text"
                       value="{{ old('button_text', $banner->button_text ?? '') }}"
                       placeholder="Explore Brands"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Button Link
                </label>

                <input type="text"
                       name="button_link"
                       value="{{ old('button_link', $banner->button_link ?? '') }}"
                       placeholder="/brands"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Second Button Text
                </label>

                <input type="text"
                       name="second_button_text"
                       value="{{ old('second_button_text', $banner->second_button_text ?? '') }}"
                       placeholder="Partner Enquiry"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Second Button Link
                </label>

                <input type="text"
                       name="second_button_link"
                       value="{{ old('second_button_link', $banner->second_button_link ?? '') }}"
                       placeholder="/contact-us"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

        </div>

    </div>

    {{-- Images --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                Banner Images
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Upload desktop, mobile and product image.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-3">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Desktop Background Image
                </label>

                <input type="file"
                       name="desktop_image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $banner->desktop_image)
                    <img src="{{ asset('storage/' . $banner->desktop_image) }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Mobile Background Image
                </label>

                <input type="file"
                       name="mobile_image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $banner->mobile_image)
                    <img src="{{ asset('storage/' . $banner->mobile_image) }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Product Image
                </label>

                <input type="file"
                       name="product_image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $banner->product_image)
                    <img src="{{ asset('storage/' . $banner->product_image) }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

        </div>

    </div>

    {{-- Settings --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                Display Settings
            </h2>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $banner->sort_order ?? 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="flex items-center">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           @checked(old('status', $banner->status ?? 1))
                           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Active Banner
                    </span>
                </label>
            </div>

        </div>

    </div>

    {{-- Submit --}}
    <div class="flex items-center justify-end gap-3">

        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Banner' : 'Create Banner' }}
        </button>

    </div>

</form>