@php
    $b2bBenefitSection = $b2bBenefitSection ?? null;

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($b2bBenefitSection && $b2bBenefitSection->items) {
        $items = $b2bBenefitSection->items;
    } else {
        $items = collect([
            [
                'icon_text' => 'I',
                'title' => 'Integrity',
                'description' => 'Transparent and productive business interactions for long-term trust.',
                'theme' => 'blue',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'icon_text' => 'S',
                'title' => 'Speed',
                'description' => 'Fast execution for distribution, supply and partner support.',
                'theme' => 'cyan',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'icon_text' => 'T',
                'title' => 'Training',
                'description' => 'Product knowledge, partner enablement and market guidance.',
                'theme' => 'blue',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'icon_text' => 'G',
                'title' => 'Growth',
                'description' => 'Support for business goals, operational efficiency and long-term scale.',
                'theme' => 'cyan',
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
        <label class="mb-2 block text-sm font-semibold">Page Slug</label>
        <input type="text" name="page_slug" value="{{ old('page_slug', $b2bBenefitSection?->page_slug ?? 'services') }}" class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $b2bBenefitSection?->sort_order ?? 0) }}" min="0" class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Label</label>
        <input type="text" name="label" value="{{ old('label', $b2bBenefitSection?->label ?? 'B2B Program Benefits') }}" class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Title</label>
        <input type="text" name="title" value="{{ old('title', $b2bBenefitSection?->title ?? 'Built for reliable business partnerships.') }}" required class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description</label>
    <textarea name="description" rows="4" class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $b2bBenefitSection?->description ?? 'GPT B2B helps organizations navigate market complexity with support, speed and transparent processes.') }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold">Benefit Cards</h2>
        <p class="text-xs text-neutral-500">12 benefits tak add kar sakte ho. Blank title ignore hoga.</p>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 12; $i++)
            @php
                $item = $items[$i] ?? null;

                $itemId = !is_array($item) ? ($item?->id ?? null) : null;
                $iconText = is_array($item) ? ($item['icon_text'] ?? '') : ($item?->icon_text ?? '');
                $title = is_array($item) ? ($item['title'] ?? '') : ($item?->title ?? '');
                $description = is_array($item) ? ($item['description'] ?? '') : ($item?->description ?? '');
                $theme = is_array($item) ? ($item['theme'] ?? 'blue') : ($item?->theme ?? 'blue');
                $sortOrder = is_array($item) ? ($item['sort_order'] ?? $i) : ($item?->sort_order ?? $i);
                $status = is_array($item) ? (!empty($item['status'])) : ($item?->status ?? true);
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                @if($itemId)
                    <input type="hidden" name="items[{{ $i }}][id]" value="{{ $itemId }}">
                @endif

                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">Benefit {{ $i + 1 }}</h3>

                    <label class="flex items-center gap-2 text-xs font-semibold">
                        <input type="checkbox" name="items[{{ $i }}][status]" value="1" {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div>
                        <label class="mb-2 block text-sm font-semibold">Icon Text</label>
                        <input type="text" name="items[{{ $i }}][icon_text]" value="{{ $iconText }}" maxlength="10" class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Theme</label>
                        <select name="items[{{ $i }}][theme]" class="w-full rounded-xl border px-4 py-3 text-sm">
                            @foreach(['blue', 'cyan', 'slate'] as $themeOption)
                                <option value="{{ $themeOption }}" @selected($theme === $themeOption)>
                                    {{ ucfirst($themeOption) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Order</label>
                        <input type="number" name="items[{{ $i }}][sort_order]" value="{{ $sortOrder }}" min="0" class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">Title</label>
                    <input type="text" name="items[{{ $i }}][title]" value="{{ $title }}" class="w-full rounded-xl border px-4 py-3 text-sm">
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">Description</label>
                    <textarea name="items[{{ $i }}][description]" rows="3" class="w-full rounded-xl border px-4 py-3 text-sm">{{ $description }}</textarea>
                </div>
            </div>
        @endfor
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border bg-neutral-50 p-5">
    <input type="checkbox" name="status" value="1" id="status" {{ old('status', $b2bBenefitSection?->status ?? 1) ? 'checked' : '' }}>
    <label for="status" class="text-sm font-semibold">Active Section</label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('b2b-benefit-sections.index') }}" class="rounded-xl border px-6 py-3 text-sm font-semibold">Cancel</a>
    <button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">{{ $buttonText ?? 'Save' }}</button>
</div>