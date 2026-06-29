@php
    $commonSplitSection = $commonSplitSection ?? null;

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($commonSplitSection && $commonSplitSection->items) {
        $items = $commonSplitSection->items;
    } else {
        $items = collect([
            [
                'icon_text' => '01',
                'theme' => 'blue',
                'title' => 'Demand Generation',
                'description' => 'Promotional campaigns and market visibility for partner stores.',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'icon_text' => '02',
                'theme' => 'cyan',
                'title' => 'Product Training',
                'description' => 'Product knowledge and support for sales teams and retail counters.',
                'sort_order' => 1,
                'status' => 1,
            ],
        ]);
    }
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
        <ul class="list-inside list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 md:grid-cols-3">
    <div>
        <label class="mb-2 block text-sm font-semibold">Page Slug</label>
        <input type="text" name="page_slug"
               value="{{ old('page_slug', $commonSplitSection?->page_slug ?? 'outlets') }}"
               placeholder="outlets, about, services"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Section Key</label>
        <input type="text" name="section_key"
               value="{{ old('section_key', $commonSplitSection?->section_key ?? 'customer-satisfaction') }}"
               placeholder="customer-satisfaction"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order"
               value="{{ old('sort_order', $commonSplitSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Label</label>
    <input type="text" name="label"
           value="{{ old('label', $commonSplitSection?->label ?? 'Customer Satisfaction') }}"
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Title</label>
    <input type="text" name="title"
           value="{{ old('title', $commonSplitSection?->title ?? 'We aim for professional telecom retail execution.') }}"
           required
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description 1</label>
    <textarea name="description_1" rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description_1', $commonSplitSection?->description_1 ?? 'GPT Group’s vision is to become one of the most professional and respected telecom distributors in Oman and the UAE, creating value for partners and retail customers.') }}</textarea>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description 2</label>
    <textarea name="description_2" rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description_2', $commonSplitSection?->description_2 ?? 'The company supports retail growth through automated distribution processes, demand generation activities, product knowledge and training, efficient supply-chain management and customer service.') }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Feature Boxes</h2>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 8; $i++)
            @php
                $item = $items[$i] ?? null;

                $isArray = is_array($item);
                $itemId = $isArray ? ($item['id'] ?? null) : ($item?->id ?? null);
                $iconText = $isArray ? ($item['icon_text'] ?? '') : ($item?->icon_text ?? '');
                $theme = $isArray ? ($item['theme'] ?? 'blue') : ($item?->theme ?? 'blue');
                $title = $isArray ? ($item['title'] ?? '') : ($item?->title ?? '');
                $description = $isArray ? ($item['description'] ?? '') : ($item?->description ?? '');
                $sortOrder = $isArray ? ($item['sort_order'] ?? $i) : ($item?->sort_order ?? $i);
                $status = $isArray ? (!empty($item['status'])) : ($item?->status ?? true);
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                @if($itemId)
                    <input type="hidden" name="items[{{ $i }}][id]" value="{{ $itemId }}">
                @endif

                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">Feature {{ $i + 1 }}</h3>

                    <label class="flex items-center gap-2 text-xs font-semibold">
                        <input type="checkbox"
                               name="items[{{ $i }}][status]"
                               value="1"
                               {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <input type="text"
                           name="items[{{ $i }}][icon_text]"
                           value="{{ $iconText }}"
                           placeholder="01"
                           class="rounded-xl border px-4 py-3 text-sm">

                    <select name="items[{{ $i }}][theme]"
                            class="rounded-xl border px-4 py-3 text-sm">
                        @foreach(['blue', 'cyan', 'slate', 'pink'] as $themeOption)
                            <option value="{{ $themeOption }}" @selected($theme === $themeOption)>
                                {{ ucfirst($themeOption) }}
                            </option>
                        @endforeach
                    </select>

                    <input type="number"
                           name="items[{{ $i }}][sort_order]"
                           value="{{ $sortOrder }}"
                           min="0"
                           class="rounded-xl border px-4 py-3 text-sm">
                </div>

                <input type="text"
                       name="items[{{ $i }}][title]"
                       value="{{ $title }}"
                       placeholder="Demand Generation"
                       class="mt-4 w-full rounded-xl border px-4 py-3 text-sm">

                <textarea name="items[{{ $i }}][description]"
                          rows="3"
                          placeholder="Description"
                          class="mt-4 w-full rounded-xl border px-4 py-3 text-sm">{{ $description }}</textarea>
            </div>
        @endfor
    </div>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Right Side Images</h2>

    <div class="grid gap-5 md:grid-cols-3">
        @foreach([1, 2, 3] as $i)
            @php
                $imageField = 'image_' . $i;
                $altField = 'image_' . $i . '_alt';
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                @if($commonSplitSection?->{$imageField})
                    <div class="mb-4 h-40 overflow-hidden rounded-xl bg-neutral-100">
                        <img src="{{ asset('storage/' . $commonSplitSection->{$imageField}) }}"
                             class="h-full w-full object-cover"
                             alt="{{ $commonSplitSection->{$altField} }}">
                    </div>
                @endif

                <label class="mb-2 block text-sm font-semibold">Image {{ $i }}</label>
                <input type="file"
                       name="{{ $imageField }}"
                       accept="image/*"
                       class="w-full rounded-xl border px-4 py-3 text-sm">

                <input type="text"
                       name="{{ $altField }}"
                       value="{{ old($altField, $commonSplitSection?->{$altField}) }}"
                       placeholder="Image {{ $i }} Alt"
                       class="mt-3 w-full rounded-xl border px-4 py-3 text-sm">
            </div>
        @endforeach
    </div>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Highlight Card</h2>

    <div class="grid gap-5 md:grid-cols-3">
        <input type="text"
               name="card_value"
               value="{{ old('card_value', $commonSplitSection?->card_value ?? 'GPT') }}"
               placeholder="GPT"
               class="rounded-xl border px-4 py-3 text-sm">

        <input type="text"
               name="card_title"
               value="{{ old('card_title', $commonSplitSection?->card_title ?? 'Retail Support') }}"
               placeholder="Retail Support"
               class="rounded-xl border px-4 py-3 text-sm">

        <textarea name="card_description"
                  rows="3"
                  placeholder="Store setup, visibility and market execution."
                  class="rounded-xl border px-4 py-3 text-sm">{{ old('card_description', $commonSplitSection?->card_description ?? 'Store setup, visibility and market execution.') }}</textarea>
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border bg-neutral-50 p-5">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           {{ old('status', $commonSplitSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold">
        Active Section
    </label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('common-split-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>