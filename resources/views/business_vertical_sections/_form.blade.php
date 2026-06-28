@php
    $businessVerticalSection = $businessVerticalSection ?? null;

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($businessVerticalSection && $businessVerticalSection->items) {
        $items = $businessVerticalSection->items;
    } else {
        $items = collect([
            [
                'badge_text' => 'Core Vertical',
                'theme' => 'blue',
                'title' => 'Telecom Distribution',
                'description' => 'GPT Group’s foundation is telecom distribution, covering mobile devices, smartphones, tablets, accessories and partner supply for B2B and B2C channels.',
                'tags' => 'Mobiles, Tablets, Accessories',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'badge_text' => 'Digital',
                'theme' => 'cyan',
                'title' => 'Online Services & E-Commerce',
                'description' => 'Online services and retail channels help GPT Group reach digital customers, manage product visibility and support modern buying experiences.',
                'tags' => 'Online Retail, Digital Sales',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'badge_text' => 'Lifestyle',
                'theme' => 'pink',
                'title' => 'Beauty Care',
                'description' => 'Beauty care is part of GPT Group’s lifestyle expansion, supporting personal care, customer experience and modern retail opportunities.',
                'tags' => 'Beauty, Personal Care',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'badge_text' => 'Retail',
                'theme' => 'slate',
                'title' => 'Fashion Retail',
                'description' => 'Fashion retail strengthens the group’s lifestyle portfolio with consumer-focused products, retail merchandising and market-facing customer experience.',
                'tags' => 'Fashion, Retail',
                'sort_order' => 3,
                'status' => 1,
            ],
            [
                'badge_text' => 'Technology',
                'theme' => 'blue',
                'title' => 'I.T. Solutions',
                'description' => 'I.T. services support the group’s digital operations, business solutions, automation and technology-led service delivery.',
                'tags' => 'IT, Automation',
                'sort_order' => 4,
                'status' => 1,
            ],
            [
                'badge_text' => 'Service',
                'theme' => 'cyan',
                'title' => 'Hospitality',
                'description' => 'Hospitality reflects GPT Group’s service-led expansion, focusing on customer experience, operations and quality-driven business standards.',
                'tags' => 'Hospitality, Service',
                'sort_order' => 5,
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
               value="{{ old('page_slug', $businessVerticalSection?->page_slug ?? 'home') }}"
               placeholder="home, about, services, companies"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Section ID
        </label>

        <input type="text"
               name="section_id"
               value="{{ old('section_id', $businessVerticalSection?->section_id ?? 'companies') }}"
               placeholder="companies"
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
               value="{{ old('label', $businessVerticalSection?->label ?? 'Business Verticals') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $businessVerticalSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">
        Title <span class="text-red-500">*</span>
    </label>

    <input type="text"
           name="title"
           value="{{ old('title', $businessVerticalSection?->title ?? 'GPT Group companies and focus areas.') }}"
           required
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">
        Description
    </label>

    <textarea name="description"
              rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $businessVerticalSection?->description ?? 'A modern business portfolio built around distribution, customer service, retail experience and digital growth.') }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold">
            Business Vertical Cards
        </h2>

        <p class="text-xs text-neutral-500">
            18 cards tak add kar sakte ho. Blank title ignore hoga.
        </p>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 18; $i++)
            @php
                $item = $items[$i] ?? null;

                $itemId = !is_array($item) ? ($item?->id ?? null) : null;
                $badgeText = is_array($item) ? ($item['badge_text'] ?? '') : ($item?->badge_text ?? '');
                $theme = is_array($item) ? ($item['theme'] ?? 'blue') : ($item?->theme ?? 'blue');
                $title = is_array($item) ? ($item['title'] ?? '') : ($item?->title ?? '');
                $description = is_array($item) ? ($item['description'] ?? '') : ($item?->description ?? '');
                $imageAlt = is_array($item) ? ($item['image_alt'] ?? '') : ($item?->image_alt ?? '');
                $tags = is_array($item) ? ($item['tags'] ?? '') : ($item?->tags ?? '');
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
                        Vertical {{ $i + 1 }}
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
                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Badge
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][badge_text]"
                               value="{{ $badgeText }}"
                               placeholder="Core Vertical"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">
                            Theme
                        </label>

                        <select name="items[{{ $i }}][theme]"
                                class="w-full rounded-xl border px-4 py-3 text-sm">
                            @foreach(['blue', 'cyan', 'pink', 'slate'] as $themeOption)
                                <option value="{{ $themeOption }}" @selected($theme === $themeOption)>
                                    {{ ucfirst($themeOption) }}
                                </option>
                            @endforeach
                        </select>
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
                        Title
                    </label>

                    <input type="text"
                           name="items[{{ $i }}][title]"
                           value="{{ $title }}"
                           placeholder="Telecom Distribution"
                           class="w-full rounded-xl border px-4 py-3 text-sm">
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">
                        Description
                    </label>

                    <textarea name="items[{{ $i }}][description]"
                              rows="4"
                              class="w-full rounded-xl border px-4 py-3 text-sm">{{ $description }}</textarea>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">
                        Tags
                    </label>

                    <input type="text"
                           name="items[{{ $i }}][tags]"
                           value="{{ $tags }}"
                           placeholder="Mobiles, Tablets, Accessories"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <p class="mt-1 text-xs text-neutral-500">
                        Comma separated tags daalo.
                    </p>
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
                               placeholder="Telecom Distribution"
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
           {{ old('status', $businessVerticalSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold">
        Active Section
    </label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('business-vertical-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>