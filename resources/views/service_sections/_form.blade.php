@php
    $serviceSection = $serviceSection ?? null;

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($serviceSection && $serviceSection->items) {
        $items = $serviceSection->items;
    } else {
        $items = collect([
            [
                'label' => 'GPT Care',
                'title' => 'Mobile Repair & Service',
                'description' => 'Screen, battery, software, water damage and mobile service enquiries ke liye professional support.',
                'button_link' => '/services#gpt-care',
                'accent_color' => 'blue',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'label' => 'B2B Program',
                'title' => 'Business Distribution Support',
                'description' => 'Corporate supply, wholesale, dealer network and operational efficiency ke liye B2B support.',
                'button_link' => '/services#b2b-program',
                'accent_color' => 'cyan',
                'sort_order' => 1,
                'status' => 1,
            ],
        ]);
    }
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
               value="{{ old('label', $serviceSection?->label ?? 'Services') }}"
               placeholder="Services"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $serviceSection?->sort_order ?? 0) }}"
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
           value="{{ old('title', $serviceSection?->title ?? 'Customer & Business Support') }}"
           required
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="4"
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $serviceSection?->description ?? 'GPT Group customers and partners ke liye repair, B2B supply, retail support and distribution solutions.') }}</textarea>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
            Service Cards
        </h2>

        <p class="text-xs text-neutral-500">
            Blank service ignore ho jayegi. Extra services add karne ke liye loop count badha sakte ho.
        </p>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 12; $i++)
            @php
                $item = $items[$i] ?? null;

                $label = is_array($item) ? ($item['label'] ?? '') : ($item?->label ?? '');
                $title = is_array($item) ? ($item['title'] ?? '') : ($item?->title ?? '');
                $description = is_array($item) ? ($item['description'] ?? '') : ($item?->description ?? '');
                $buttonLink = is_array($item) ? ($item['button_link'] ?? '') : ($item?->button_link ?? '');
                $accentColor = is_array($item) ? ($item['accent_color'] ?? 'blue') : ($item?->accent_color ?? 'blue');
                $imageAlt = is_array($item) ? ($item['image_alt'] ?? '') : ($item?->image_alt ?? '');
                $sortOrder = is_array($item) ? ($item['sort_order'] ?? $i) : ($item?->sort_order ?? $i);
                $status = is_array($item) ? (!empty($item['status'])) : ($item?->status ?? true);
                $imagePath = !is_array($item) ? ($item?->image ?? null) : null;
                $itemId = !is_array($item) ? ($item?->id ?? null) : null;
            @endphp

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="mb-4 flex items-center justify-between">
                       @if($itemId)
        <input type="hidden" name="items[{{ $i }}][id]" value="{{ $itemId }}">
    @endif
                    <h3 class="font-bold text-neutral-900 dark:text-white">
                        Service {{ $i + 1 }}
                    </h3>

                    <label class="flex items-center gap-2 text-xs font-semibold text-neutral-600 dark:text-neutral-300">
                        <input type="checkbox"
                               name="items[{{ $i }}][status]"
                               value="1"
                               class="rounded border-neutral-300"
                               {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                @if($imagePath)
                    <div class="mb-4 h-40 overflow-hidden rounded-xl bg-neutral-100 dark:bg-neutral-800">
                        <img src="{{ asset('storage/' . $imagePath) }}"
                             alt="{{ $imageAlt ?: $title }}"
                             class="h-full w-full object-cover">
                    </div>
                @endif

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Label
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][label]"
                               value="{{ $label }}"
                               placeholder="GPT Care"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Order
                        </label>

                        <input type="number"
                               name="items[{{ $i }}][sort_order]"
                               value="{{ $sortOrder }}"
                               min="0"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Title
                    </label>

                    <input type="text"
                           name="items[{{ $i }}][title]"
                           value="{{ $title }}"
                           placeholder="Mobile Repair & Service"
                           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Description
                    </label>

                    <textarea name="items[{{ $i }}][description]"
                              rows="3"
                              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">{{ $description }}</textarea>
                </div>

                <div class="mt-4 grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Link
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][button_link]"
                               value="{{ $buttonLink }}"
                               placeholder="/services#gpt-care"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Accent Color
                        </label>

                        <select name="items[{{ $i }}][accent_color]"
                                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                            @foreach(['blue', 'cyan', 'indigo', 'purple', 'emerald', 'orange'] as $color)
                                <option value="{{ $color }}" @selected($accentColor === $color)>
                                    {{ ucfirst($color) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4 grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Image
                        </label>

                        <input type="file"
                               name="items[{{ $i }}][image]"
                               accept="image/*"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Image Alt
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][image_alt]"
                               value="{{ $imageAlt }}"
                               placeholder="GPT Care"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $serviceSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active Section
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('service-sections.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>