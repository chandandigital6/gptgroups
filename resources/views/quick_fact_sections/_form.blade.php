@php
    $quickFactSection = $quickFactSection ?? null;

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($quickFactSection && $quickFactSection->items) {
        $items = $quickFactSection->items;
    } else {
        $items = collect([
            [
                'value' => '2016',
                'title' => 'GPT Founded',
                'description' => 'Started as a modern technology distributor in Oman.',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'value' => '20+',
                'title' => 'Years Leadership',
                'description' => 'Founder’s Middle East telecom industry experience.',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'value' => 'GCC',
                'title' => 'Market Coverage',
                'description' => 'Oman, UAE, Kuwait and regional business exposure.',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'value' => 'B2B',
                'title' => 'Retail Support',
                'description' => 'Distribution, dealer support and business programs.',
                'sort_order' => 3,
                'status' => 1,
            ],
        ]);
    }
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
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
        <label class="mb-2 block text-sm font-semibold">
            Page Slug
        </label>

        <input type="text"
               name="page_slug"
               value="{{ old('page_slug', $quickFactSection?->page_slug ?? 'home') }}"
               placeholder="home, about, services, custom-page"
               class="w-full rounded-xl border px-4 py-3 text-sm">

        <p class="mt-1 text-xs text-neutral-500">
            Example: home, about, services, brands, custom-page
        </p>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $quickFactSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">
            Label
        </label>

        <input type="text"
               name="label"
               value="{{ old('label', $quickFactSection?->label) }}"
               placeholder="Quick Facts"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Title
        </label>

        <input type="text"
               name="title"
               value="{{ old('title', $quickFactSection?->title) }}"
               placeholder="Company Highlights"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">
        Description
    </label>

    <textarea name="description"
              rows="3"
              placeholder="Optional description"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $quickFactSection?->description) }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold">
            Quick Fact Items
        </h2>

        <p class="text-xs text-neutral-500">
            12 facts tak add kar sakte ho. Blank value/title ignore hoga.
        </p>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 12; $i++)
            @php
                $item = $items[$i] ?? null;

                $itemId = !is_array($item) ? ($item?->id ?? null) : null;
                $value = is_array($item) ? ($item['value'] ?? '') : ($item?->value ?? '');
                $title = is_array($item) ? ($item['title'] ?? '') : ($item?->title ?? '');
                $description = is_array($item) ? ($item['description'] ?? '') : ($item?->description ?? '');
                $sortOrder = is_array($item) ? ($item['sort_order'] ?? $i) : ($item?->sort_order ?? $i);
                $status = is_array($item) ? (!empty($item['status'])) : ($item?->status ?? true);
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                @if($itemId)
                    <input type="hidden" name="items[{{ $i }}][id]" value="{{ $itemId }}">
                @endif

                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">
                        Fact {{ $i + 1 }}
                    </h3>

                    <label class="flex items-center gap-2 text-xs font-semibold">
                        <input type="checkbox"
                               name="items[{{ $i }}][status]"
                               value="1"
                               {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Value
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][value]"
                               value="{{ $value }}"
                               placeholder="2016"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-semibold">
                            Title
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][title]"
                               value="{{ $title }}"
                               placeholder="GPT Founded"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">
                        Description
                    </label>

                    <textarea name="items[{{ $i }}][description]"
                              rows="3"
                              class="w-full rounded-xl border px-4 py-3 text-sm">{{ $description }}</textarea>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">
                        Order
                    </label>

                    <input type="number"
                           name="items[{{ $i }}][sort_order]"
                           value="{{ $sortOrder }}"
                           min="0"
                           class="w-full rounded-xl border px-4 py-3 text-sm">
                </div>
            </div>
        @endfor
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border bg-neutral-50 p-5">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           {{ old('status', $quickFactSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold">
        Active Section
    </label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('quick-fact-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>