@php
    $b2bProgramSection = $b2bProgramSection ?? null;
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
        <div class="font-semibold">Please fix these errors:</div>

        <ul class="mt-2 list-inside list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Page Slug
        </label>

        <input type="text"
               name="page_slug"
               value="{{ old('page_slug', $b2bProgramSection?->page_slug ?? 'services') }}"
               placeholder="services, about, brands"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $b2bProgramSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Label
    </label>

    <input type="text"
           name="label"
           value="{{ old('label', $b2bProgramSection?->label ?? 'B2B Program') }}"
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Title <span class="text-red-500">*</span>
    </label>

    <input type="text"
           name="title"
           value="{{ old('title', $b2bProgramSection?->title ?? '') }}"
           required
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Description 1
        </label>

        <textarea name="description_1"
                  rows="5"
                  class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description_1', $b2bProgramSection?->description_1 ?? '') }}</textarea>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Description 2
        </label>

        <textarea name="description_2"
                  rows="5"
                  class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description_2', $b2bProgramSection?->description_2 ?? '') }}</textarea>
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Image
    </h2>

    @if(!empty($b2bProgramSection?->image))
        <div class="mb-4 h-72 overflow-hidden rounded-2xl bg-neutral-100 dark:bg-neutral-800">
            <img src="{{ asset('storage/' . $b2bProgramSection->image) }}"
                 alt="{{ $b2bProgramSection->image_alt }}"
                 class="h-full w-full object-cover">
        </div>
    @endif

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Image
            </label>

            <input type="file"
                   name="image"
                   accept="image/*"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Image Alt
            </label>

            <input type="text"
                   name="image_alt"
                   value="{{ old('image_alt', $b2bProgramSection?->image_alt ?? '') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
        </div>
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Card Content
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Card Title
            </label>

            <input type="text"
                   name="card_title"
                   value="{{ old('card_title', $b2bProgramSection?->card_title ?? '') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Card Description
            </label>

            <textarea name="card_description"
                      rows="3"
                      class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('card_description', $b2bProgramSection?->card_description ?? '') }}</textarea>
        </div>
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Feature Boxes
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        <div class="rounded-2xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Feature 1 Title
            </label>

            <input type="text"
                   name="feature_1_title"
                   value="{{ old('feature_1_title', $b2bProgramSection?->feature_1_title ?? '') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">

            <label class="mb-2 mt-4 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Feature 1 Description
            </label>

            <textarea name="feature_1_description"
                      rows="3"
                      class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">{{ old('feature_1_description', $b2bProgramSection?->feature_1_description ?? '') }}</textarea>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Feature 2 Title
            </label>

            <input type="text"
                   name="feature_2_title"
                   value="{{ old('feature_2_title', $b2bProgramSection?->feature_2_title ?? '') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">

            <label class="mb-2 mt-4 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Feature 2 Description
            </label>

            <textarea name="feature_2_description"
                      rows="3"
                      class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">{{ old('feature_2_description', $b2bProgramSection?->feature_2_description ?? '') }}</textarea>
        </div>
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $b2bProgramSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('b2b-program-sections.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>