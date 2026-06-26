@php
    $repairServiceSection = $repairServiceSection ?? null;

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($repairServiceSection && $repairServiceSection->items) {
        $items = $repairServiceSection->items;
    } else {
        $items = collect([
            [
                'title' => 'Screen Replacement',
                'description' => 'Cracked or shattered screen replacement with standard warranty.',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'title' => 'Battery Issues',
                'description' => 'Battery health diagnosis and replacement for fast draining devices.',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Software & Performance',
                'description' => 'Slow performance, startup issues, freezing and OS support.',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'title' => 'Water Damage',
                'description' => 'Moisture damage cleaning, testing and component-level diagnostics.',
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
               value="{{ old('page_slug', $repairServiceSection?->page_slug ?? 'services') }}"
               placeholder="services"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $repairServiceSection?->sort_order ?? 0) }}"
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
               value="{{ old('label', $repairServiceSection?->label ?? 'Mobile Repair Services') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Title <span class="text-red-500">*</span>
        </label>

        <input type="text"
               name="title"
               value="{{ old('title', $repairServiceSection?->title ?? 'Common repair solutions.') }}"
               required
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">
        Description
    </label>

    <textarea name="description"
              rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $repairServiceSection?->description ?? 'GPT Care handles day-to-day smartphone issues with professional diagnostics and repair support.') }}</textarea>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">
            Button Text
        </label>

        <input type="text"
               name="button_text"
               value="{{ old('button_text', $repairServiceSection?->button_text ?? 'Book Repair') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Button Link
        </label>

        <input type="text"
               name="button_link"
               value="{{ old('button_link', $repairServiceSection?->button_link ?? '#service-form') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold">
            Repair Service Cards
        </h2>

        <p class="text-xs text-neutral-500">
            18 repair services tak add kar sakte ho. Blank title ignore ho jayega.
        </p>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 18; $i++)
            @php
                $item = $items[$i] ?? null;

                $itemId = !is_array($item) ? ($item?->id ?? null) : null;
                $title = is_array($item) ? ($item['title'] ?? '') : ($item?->title ?? '');
                $description = is_array($item) ? ($item['description'] ?? '') : ($item?->description ?? '');
                $imageAlt = is_array($item) ? ($item['image_alt'] ?? '') : ($item?->image_alt ?? '');
                $sortOrder = is_array($item) ? ($item['sort_order'] ?? $i) : ($item?->sort_order ?? $i);
                $status = is_array($item) ? (!empty($item['status'])) : ($item?->status ?? true);
                $imagePath = !is_array($item) ? ($item?->image ?? null) : null;
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                @if($itemId)
                    <input type="hidden" name="items[{{ $i }}][id]" value="{{ $itemId }}">
                @endif

                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">
                        Repair Service {{ $i + 1 }}
                    </h3>

                    <label class="flex items-center gap-2 text-xs font-semibold">
                        <input type="checkbox"
                               name="items[{{ $i }}][status]"
                               value="1"
                               {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                @if($imagePath)
                    <div class="mb-4 h-40 overflow-hidden rounded-xl bg-neutral-100">
                        <img src="{{ asset('storage/' . $imagePath) }}"
                             alt="{{ $imageAlt ?: $title }}"
                             class="h-full w-full object-cover">
                    </div>
                @endif

                <div class="grid gap-4 md:grid-cols-3">
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-semibold">
                            Title
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][title]"
                               value="{{ $title }}"
                               placeholder="Screen Replacement"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
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

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">
                        Description
                    </label>

                    <textarea name="items[{{ $i }}][description]"
                              rows="3"
                              class="w-full rounded-xl border px-4 py-3 text-sm">{{ $description }}</textarea>
                </div>

                <div class="mt-4 grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Image
                        </label>

                        <input type="file"
                               name="items[{{ $i }}][image]"
                               accept="image/*"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Image Alt
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][image_alt]"
                               value="{{ $imageAlt }}"
                               placeholder="Screen Replacement"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>
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
           {{ old('status', $repairServiceSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold">
        Active Section
    </label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('repair-service-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>