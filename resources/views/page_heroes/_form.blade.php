@php
    $pageHero = $pageHero ?? null;
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
            Page Slug <span class="text-red-500">*</span>
        </label>

        <input type="text"
               name="page_slug"
               value="{{ old('page_slug', $pageHero?->page_slug ?? 'services') }}"
               placeholder="services, about, brands, custom-page"
               required
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

        <p class="mt-1 text-xs text-neutral-500">
            Example: services, about, brands, network, custom-page
        </p>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $pageHero?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Badge Text
    </label>

    <input type="text"
           name="badge_text"
           value="{{ old('badge_text', $pageHero?->badge_text ?? 'GPT Group Services') }}"
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Title Line 1 <span class="text-red-500">*</span>
        </label>

        <input type="text"
               name="title_line_1"
               value="{{ old('title_line_1', $pageHero?->title_line_1 ?? 'Smart Services For') }}"
               required
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Title Line 2
        </label>

        <input type="text"
               name="title_line_2"
               value="{{ old('title_line_2', $pageHero?->title_line_2 ?? 'Customers & Businesses') }}"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="4"
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $pageHero?->description ?? 'GPT Group provides reliable mobile repair support through GPT Care and business-focused distribution solutions through GPT B2B Programs.') }}</textarea>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Buttons
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Primary Button Text
            </label>

            <input type="text"
                   name="primary_button_text"
                   value="{{ old('primary_button_text', $pageHero?->primary_button_text ?? 'GPT Care') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Primary Button Link
            </label>

            <input type="text"
                   name="primary_button_link"
                   value="{{ old('primary_button_link', $pageHero?->primary_button_link ?? '#gpt-care') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Secondary Button Text
            </label>

            <input type="text"
                   name="secondary_button_text"
                   value="{{ old('secondary_button_text', $pageHero?->secondary_button_text ?? 'B2B Programs') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Secondary Button Link
            </label>

            <input type="text"
                   name="secondary_button_link"
                   value="{{ old('secondary_button_link', $pageHero?->secondary_button_link ?? '#b2b-program') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Small Stats
    </h2>

    <div class="grid gap-5 md:grid-cols-4">
        @foreach([
            1 => ['Care', 'Repair'],
            2 => ['B2B', 'Program'],
            3 => ['Oman', 'Support'],
            4 => ['Fast', 'Service'],
        ] as $i => $default)
            @php
                $valueField = 'stat_' . $i . '_value';
                $labelField = 'stat_' . $i . '_label';
            @endphp

            <div class="rounded-2xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Stat {{ $i }} Value
                </label>

                <input type="text"
                       name="{{ $valueField }}"
                       value="{{ old($valueField, $pageHero?->{$valueField} ?? $default[0]) }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">

                <label class="mb-2 mt-3 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Stat {{ $i }} Label
                </label>

                <input type="text"
                       name="{{ $labelField }}"
                       value="{{ old($labelField, $pageHero?->{$labelField} ?? $default[1]) }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
            </div>
        @endforeach
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Hero Image & Card
    </h2>

    @if($pageHero?->image)
        <div class="mb-4 h-72 overflow-hidden rounded-2xl bg-neutral-100 dark:bg-neutral-800">
            <img src="{{ asset('storage/' . $pageHero->image) }}"
                 alt="{{ $pageHero->image_alt }}"
                 class="h-full w-full object-cover">
        </div>
    @endif

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Hero Image
            </label>

            <input type="file"
                   name="image"
                   accept="image/*"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Image Alt
            </label>

            <input type="text"
                   name="image_alt"
                   value="{{ old('image_alt', $pageHero?->image_alt ?? 'GPT Group Services') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Image Card Title
            </label>

            <input type="text"
                   name="card_title"
                   value="{{ old('card_title', $pageHero?->card_title ?? 'Repair + Business Support') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Image Card Description
            </label>

            <textarea name="card_description"
                      rows="3"
                      class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">{{ old('card_description', $pageHero?->card_description ?? 'GPT Care for customers and GPT B2B Programs for business partners.') }}</textarea>
        </div>
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $pageHero?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('page-heroes.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>