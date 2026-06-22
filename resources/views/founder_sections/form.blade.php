@php
    $isEdit = !empty($founderSection);
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
        <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
            Founder Content
        </h2>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Label
                </label>
                <input type="text" name="label"
                       value="{{ old('label', $founderSection->label ?? '') }}"
                       placeholder="FOUNDER SECTION"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Image
                </label>
                <input type="file" name="image" accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $founderSection->image)
                    <img src="{{ asset('storage/' . $founderSection->image) }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Title <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title"
                       value="{{ old('title', $founderSection->title ?? '') }}"
                       required
                       placeholder="Mr. Tripathi — Founder & CEO, GPT Group."
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>
                <textarea name="description" rows="5"
                          placeholder="Write founder description..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">{{ old('description', $founderSection->description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
            Stats
        </h2>

        <div class="grid gap-5 md:grid-cols-3">
            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Stat 1 Value</label>
                <input type="text" name="stat_1_value" value="{{ old('stat_1_value', $founderSection->stat_1_value ?? '') }}" placeholder="20+" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                <label class="mb-2 mt-4 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Stat 1 Label</label>
                <input type="text" name="stat_1_label" value="{{ old('stat_1_label', $founderSection->stat_1_label ?? '') }}" placeholder="Years" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Stat 2 Value</label>
                <input type="text" name="stat_2_value" value="{{ old('stat_2_value', $founderSection->stat_2_value ?? '') }}" placeholder="2016" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                <label class="mb-2 mt-4 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Stat 2 Label</label>
                <input type="text" name="stat_2_label" value="{{ old('stat_2_label', $founderSection->stat_2_label ?? '') }}" placeholder="GPT Founded" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Stat 3 Value</label>
                <input type="text" name="stat_3_value" value="{{ old('stat_3_value', $founderSection->stat_3_value ?? '') }}" placeholder="GCC" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                <label class="mb-2 mt-4 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Stat 3 Label</label>
                <input type="text" name="stat_3_label" value="{{ old('stat_3_label', $founderSection->stat_3_label ?? '') }}" placeholder="Market Vision" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
            Button & Settings
        </h2>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Button Text</label>
                <input type="text" name="button_text" value="{{ old('button_text', $founderSection->button_text ?? '') }}" placeholder="Read Journey" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Button Link</label>
                <input type="text" name="button_link" value="{{ old('button_link', $founderSection->button_link ?? '') }}" placeholder="/about" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $founderSection->sort_order ?? 0) }}" min="0" class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div class="flex items-center">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox" name="status" value="1" @checked(old('status', $founderSection->status ?? 1)) class="h-5 w-5 rounded border-neutral-300 text-black">
                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">Active</span>
                </label>
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Founder Section' : 'Create Founder Section' }}
        </button>
    </div>
</form>