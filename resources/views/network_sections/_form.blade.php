@php
    $networkSection = $networkSection ?? null;
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
            Label
        </label>

        <input type="text"
               name="label"
               value="{{ old('label', $networkSection?->label ?? 'Network') }}"
               placeholder="Network"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $networkSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Title <span class="text-red-500">*</span>
    </label>

    <input type="text"
           name="title"
           value="{{ old('title', $networkSection?->title ?? 'Oman market coverage with retail and warehouse support.') }}"
           required
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="5"
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $networkSection?->description ?? 'GPT Group network retail, wholesale and B2B channels ko supply-chain execution ke saath support karta hai.') }}</textarea>
</div>

{{-- Cards --}}
<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Feature Cards
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        <div class="space-y-4 rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
            <h3 class="font-bold text-neutral-900 dark:text-white">Card 1</h3>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Title
                </label>

                <input type="text"
                       name="card_1_title"
                       value="{{ old('card_1_title', $networkSection?->card_1_title ?? 'Sur & Salalah') }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="card_1_description"
                          rows="3"
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('card_1_description', $networkSection?->card_1_description ?? 'Regional market coverage.') }}</textarea>
            </div>
        </div>

        <div class="space-y-4 rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
            <h3 class="font-bold text-neutral-900 dark:text-white">Card 2</h3>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Title
                </label>

                <input type="text"
                       name="card_2_title"
                       value="{{ old('card_2_title', $networkSection?->card_2_title ?? 'MCT-Ghala & Sohar') }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="card_2_description"
                          rows="3"
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('card_2_description', $networkSection?->card_2_description ?? 'Warehouse and stock support.') }}</textarea>
            </div>
        </div>
    </div>
</div>

{{-- Button --}}
<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Button Text
        </label>

        <input type="text"
               name="button_text"
               value="{{ old('button_text', $networkSection?->button_text ?? 'View Network') }}"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Button Link
        </label>

        <input type="text"
               name="button_link"
               value="{{ old('button_link', $networkSection?->button_link ?? '/network') }}"
               placeholder="/network"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

{{-- Image --}}
<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Main Image
    </h2>

    @if($networkSection?->image)
        <div class="mb-4 h-72 overflow-hidden rounded-2xl bg-neutral-100 dark:bg-neutral-800">
            <img src="{{ asset('storage/' . $networkSection->image) }}"
                 alt="{{ $networkSection->image_alt }}"
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
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 file:mr-4 file:rounded-lg file:border-0 file:bg-black file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Image Alt
            </label>

            <input type="text"
                   name="image_alt"
                   value="{{ old('image_alt', $networkSection?->image_alt ?? 'GPT Network') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
        </div>
    </div>
</div>

{{-- Overlay --}}
<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Image Overlay Card
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Overlay Title
            </label>

            <input type="text"
                   name="overlay_title"
                   value="{{ old('overlay_title', $networkSection?->overlay_title ?? 'Retail + Warehouse') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Overlay Description
            </label>

            <input type="text"
                   name="overlay_description"
                   value="{{ old('overlay_description', $networkSection?->overlay_description ?? 'Built for fast stock movement and partner success.') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
        </div>
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $networkSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('network-sections.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>