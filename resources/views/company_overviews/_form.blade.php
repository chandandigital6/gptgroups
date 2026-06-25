@php
    $companyOverview = $companyOverview ?? null;
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

{{-- Main Content --}}
<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Label
        </label>

        <input type="text"
               name="label"
               value="{{ old('label', $companyOverview?->label ?? 'Company Overview') }}"
               placeholder="Company Overview"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $companyOverview?->sort_order ?? 0) }}"
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
           value="{{ old('title', $companyOverview?->title ?? 'Bringing latest tech to GCC markets.') }}"
           placeholder="Bringing latest tech to GCC markets."
           required
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="5"
              placeholder="Through automated distribution, demand generation..."
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $companyOverview?->description ?? 'Through automated distribution, demand generation, product training, supply-chain management and customer service, GPT Group supports brands and retail partners with a scalable market expansion model.') }}</textarea>
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
                       value="{{ old('card_1_title', $companyOverview?->card_1_title ?? 'Distribution') }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="card_1_description"
                          rows="3"
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('card_1_description', $companyOverview?->card_1_description ?? 'Brand launches, channel supply and partner coverage.') }}</textarea>
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
                       value="{{ old('card_2_title', $companyOverview?->card_2_title ?? 'Marketing') }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="card_2_description"
                          rows="3"
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('card_2_description', $companyOverview?->card_2_description ?? 'Demand generation, campaigns and retail visibility.') }}</textarea>
            </div>
        </div>
    </div>
</div>

{{-- Images --}}
<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Section Images
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        @foreach([
            'image_1' => 'Warehouse Image',
            'image_2' => 'Retail Image',
            'image_3' => 'Product Image',
            'image_4' => 'Business Image',
        ] as $field => $label)

            @php
                $altField = $field . '_alt';
            @endphp

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    {{ $label }}
                </label>

                @if($companyOverview?->{$field})
                    <div class="mb-4 h-40 overflow-hidden rounded-xl bg-neutral-100 dark:bg-neutral-800">
                        <img src="{{ asset('storage/' . $companyOverview->{$field}) }}"
                             alt="{{ $companyOverview->{$altField} }}"
                             class="h-full w-full object-cover">
                    </div>
                @endif

                <input type="file"
                       name="{{ $field }}"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 file:mr-4 file:rounded-lg file:border-0 file:bg-black file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                <input type="text"
                       name="{{ $altField }}"
                       value="{{ old($altField, $companyOverview?->{$altField} ?? $label) }}"
                       placeholder="Alt text"
                       class="mt-3 w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>
        @endforeach
    </div>
</div>

{{-- Status --}}
<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $companyOverview?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active
    </label>
</div>

{{-- Buttons --}}
<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('company-overviews.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>