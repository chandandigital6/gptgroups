@php
    $retailOutletSection = $retailOutletSection ?? null;
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
               value="{{ old('label', $retailOutletSection?->label ?? 'Retail Outlets') }}"
               placeholder="Retail Outlets"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $retailOutletSection?->sort_order ?? 0) }}"
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
           value="{{ old('title', $retailOutletSection?->title ?? 'Retail network designed for customer confidence.') }}"
           required
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="5"
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $retailOutletSection?->description ?? 'GPT Group works with retail IRs, wholesale partners, key dealer retailers and B2B accounts to create strong last-mile availability and consistent brand visibility.') }}</textarea>
</div>

{{-- Cards --}}
<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Feature Cards
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        @foreach([
            1 => ['Retail IRs', 'Customer-facing counters and city-level presence.'],
            2 => ['Wholesale', 'Bulk movement and regional distribution support.'],
            3 => ['KDR Network', 'Key dealer relationships for premium category growth.'],
            4 => ['B2B Accounts', 'Corporate and institutional supply opportunities.'],
        ] as $i => $defaultCard)

            @php
                $titleField = 'card_' . $i . '_title';
                $descriptionField = 'card_' . $i . '_description';
            @endphp

            <div class="space-y-4 rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="font-bold text-neutral-900 dark:text-white">
                    Card {{ $i }}
                </h3>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Title
                    </label>

                    <input type="text"
                           name="{{ $titleField }}"
                           value="{{ old($titleField, $retailOutletSection?->{$titleField} ?? $defaultCard[0]) }}"
                           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Description
                    </label>

                    <textarea name="{{ $descriptionField }}"
                              rows="3"
                              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old($descriptionField, $retailOutletSection?->{$descriptionField} ?? $defaultCard[1]) }}</textarea>
                </div>
            </div>
        @endforeach
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
               value="{{ old('button_text', $retailOutletSection?->button_text ?? 'View Retail Outlet Page') }}"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Button Link
        </label>

        <input type="text"
               name="button_link"
               value="{{ old('button_link', $retailOutletSection?->button_link ?? '/retail-outlets') }}"
               placeholder="/retail-outlets"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

{{-- Images --}}
<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Section Images
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        @foreach([
            'image_1' => 'Retail Outlet',
            'image_2' => 'Warehouse',
            'image_3' => 'Partner Support',
            'image_4' => 'Business Partner',
        ] as $field => $label)

            @php
                $altField = $field . '_alt';
            @endphp

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    {{ $label }}
                </label>

                @if($retailOutletSection?->{$field})
                    <div class="mb-4 h-40 overflow-hidden rounded-xl bg-neutral-100 dark:bg-neutral-800">
                        <img src="{{ asset('storage/' . $retailOutletSection->{$field}) }}"
                             alt="{{ $retailOutletSection->{$altField} }}"
                             class="h-full w-full object-cover">
                    </div>
                @endif

                <input type="file"
                       name="{{ $field }}"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 file:mr-4 file:rounded-lg file:border-0 file:bg-black file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                <input type="text"
                       name="{{ $altField }}"
                       value="{{ old($altField, $retailOutletSection?->{$altField} ?? $label) }}"
                       placeholder="Alt text"
                       class="mt-3 w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>
        @endforeach
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $retailOutletSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('retail-outlet-sections.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>