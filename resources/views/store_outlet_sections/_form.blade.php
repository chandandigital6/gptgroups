@php
    $storeOutletSection = $storeOutletSection ?? null;

    $oldOutlets = old('outlets');

    if ($oldOutlets) {
        $outlets = collect($oldOutlets);
    } elseif ($storeOutletSection && $storeOutletSection->outlets) {
        $outlets = $storeOutletSection->outlets;
    } else {
        $outlets = collect([
            [
                'title' => 'GPT Samsung Lounge',
                'subtitle' => 'Showroom @ Ruwi, Muscat',
                'badge' => 'Official Showroom',
                'theme' => 'blue',
                'button_text' => 'Contact Outlet',
                'button_link' => route('contact'),
                'sort_order' => 0,
                'status' => 1,
                'details' => [
                    ['label' => 'Company', 'value' => 'Global Phone Technology'],
                    ['label' => 'Brands', 'value' => 'Samsung, Honor, Apple'],
                    ['label' => 'Contact Person', 'value' => 'Mr. Shafi'],
                    ['label' => 'Contact No', 'value' => '+968 7258 8851'],
                ],
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

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Page Slug</label>
        <input type="text" name="page_slug"
               value="{{ old('page_slug', $storeOutletSection?->page_slug ?? 'outlets') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Section ID</label>
        <input type="text" name="section_id"
               value="{{ old('section_id', $storeOutletSection?->section_id ?? 'outlets') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Label</label>
        <input type="text" name="label"
               value="{{ old('label', $storeOutletSection?->label ?? 'Our Outlets') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order"
               value="{{ old('sort_order', $storeOutletSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Title</label>
    <input type="text" name="title"
           value="{{ old('title', $storeOutletSection?->title ?? 'Retail & Service Locations') }}"
           required
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description</label>
    <textarea name="description" rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $storeOutletSection?->description ?? 'Official showrooms and partner outlets listed for customer convenience and business visibility.') }}</textarea>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Top Button Text</label>
        <input type="text" name="button_text"
               value="{{ old('button_text', $storeOutletSection?->button_text ?? 'Open Partner Outlet') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Top Button Link</label>
        <input type="text" name="button_link"
               value="{{ old('button_link', $storeOutletSection?->button_link ?? route('contact')) }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Partner CTA Box</h2>

    <div class="grid gap-5 md:grid-cols-2">
        <input type="text" name="cta_label"
               value="{{ old('cta_label', $storeOutletSection?->cta_label ?? 'Partner Outlet') }}"
               placeholder="CTA Label"
               class="w-full rounded-xl border px-4 py-3 text-sm">

        <input type="text" name="cta_title"
               value="{{ old('cta_title', $storeOutletSection?->cta_title ?? 'Want to open an authorized mobile store?') }}"
               placeholder="CTA Title"
               class="w-full rounded-xl border px-4 py-3 text-sm">

        <textarea name="cta_description" rows="3"
                  class="md:col-span-2 w-full rounded-xl border px-4 py-3 text-sm">{{ old('cta_description', $storeOutletSection?->cta_description ?? 'GPT Group supports businesses and entrepreneurs with authorized mobile store setup, brand standards, retail guidance and market execution.') }}</textarea>

        <input type="text" name="cta_button_text"
               value="{{ old('cta_button_text', $storeOutletSection?->cta_button_text ?? 'Start Enquiry') }}"
               placeholder="CTA Button Text"
               class="w-full rounded-xl border px-4 py-3 text-sm">

        <input type="text" name="cta_button_link"
               value="{{ old('cta_button_link', $storeOutletSection?->cta_button_link ?? route('contact')) }}"
               placeholder="CTA Button Link"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold">Outlets / Stores</h2>

        <button type="button"
                id="add-outlet"
                class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
            + Add Outlet
        </button>
    </div>

    <div id="outlet-wrapper" class="grid gap-5">
        @foreach($outlets as $outletIndex => $outlet)
            @php
                $isArray = is_array($outlet);

                $outletId = $isArray ? ($outlet['id'] ?? null) : ($outlet?->id ?? null);
                $title = $isArray ? ($outlet['title'] ?? '') : ($outlet?->title ?? '');
                $subtitle = $isArray ? ($outlet['subtitle'] ?? '') : ($outlet?->subtitle ?? '');
                $badge = $isArray ? ($outlet['badge'] ?? '') : ($outlet?->badge ?? '');
                $theme = $isArray ? ($outlet['theme'] ?? 'blue') : ($outlet?->theme ?? 'blue');
                $imageAlt = $isArray ? ($outlet['image_alt'] ?? '') : ($outlet?->image_alt ?? '');
                $buttonText = $isArray ? ($outlet['button_text'] ?? 'Contact Outlet') : ($outlet?->button_text ?? 'Contact Outlet');
                $buttonLink = $isArray ? ($outlet['button_link'] ?? route('contact')) : ($outlet?->button_link ?? route('contact'));
                $sortOrder = $isArray ? ($outlet['sort_order'] ?? $outletIndex) : ($outlet?->sort_order ?? $outletIndex);
                $status = $isArray ? (!empty($outlet['status'])) : ($outlet?->status ?? true);
                $imagePath = $isArray ? null : ($outlet?->image ?? null);

                if ($isArray) {
                    $details = collect($outlet['details'] ?? []);
                } else {
                    $details = $outlet?->details ?? collect();
                }
            @endphp

            <div class="outlet-card rounded-2xl border bg-white p-5" data-index="{{ $outletIndex }}">
                @if($outletId)
                    <input type="hidden" name="outlets[{{ $outletIndex }}][id]" value="{{ $outletId }}">
                @endif

                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">Outlet</h3>

                    <div class="flex items-center gap-3">
                        <label class="flex items-center gap-2 text-xs font-semibold">
                            <input type="checkbox"
                                   name="outlets[{{ $outletIndex }}][status]"
                                   value="1"
                                   {{ $status ? 'checked' : '' }}>
                            Active
                        </label>

                        <button type="button"
                                class="remove-outlet rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600">
                            Remove
                        </button>
                    </div>
                </div>

                @if($imagePath)
                    <div class="mb-4 h-44 overflow-hidden rounded-xl bg-neutral-100">
                        <img src="{{ asset('storage/' . $imagePath) }}"
                             class="h-full w-full object-cover"
                             alt="{{ $imageAlt ?: $title }}">
                    </div>
                @endif

                <div class="grid gap-4 md:grid-cols-3">
                    <input type="text" name="outlets[{{ $outletIndex }}][title]"
                           value="{{ $title }}" placeholder="Outlet Title"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <input type="text" name="outlets[{{ $outletIndex }}][subtitle]"
                           value="{{ $subtitle }}" placeholder="Subtitle"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <input type="text" name="outlets[{{ $outletIndex }}][badge]"
                           value="{{ $badge }}" placeholder="Badge"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <select name="outlets[{{ $outletIndex }}][theme]"
                            class="w-full rounded-xl border px-4 py-3 text-sm">
                        @foreach(['blue', 'cyan', 'slate', 'pink'] as $themeOption)
                            <option value="{{ $themeOption }}" @selected($theme === $themeOption)>
                                {{ ucfirst($themeOption) }}
                            </option>
                        @endforeach
                    </select>

                    <input type="number" name="outlets[{{ $outletIndex }}][sort_order]"
                           value="{{ $sortOrder }}" min="0"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <input type="text" name="outlets[{{ $outletIndex }}][image_alt]"
                           value="{{ $imageAlt }}" placeholder="Image Alt"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <input type="file" name="outlets[{{ $outletIndex }}][image]"
                           accept="image/*"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <input type="text" name="outlets[{{ $outletIndex }}][button_text]"
                           value="{{ $buttonText }}" placeholder="Button Text"
                           class="w-full rounded-xl border px-4 py-3 text-sm">

                    <input type="text" name="outlets[{{ $outletIndex }}][button_link]"
                           value="{{ $buttonLink }}" placeholder="Button Link"
                           class="w-full rounded-xl border px-4 py-3 text-sm">
                </div>

                <div class="mt-5 rounded-2xl border bg-neutral-50 p-4">
                    <div class="mb-4 flex items-center justify-between">
                        <h4 class="font-bold">Outlet Details</h4>

                        <button type="button"
                                class="add-detail rounded-xl bg-blue-600 px-4 py-2 text-xs font-bold text-white">
                            + Add Detail
                        </button>
                    </div>

                    <div class="detail-wrapper grid gap-3">
                        @forelse($details as $detailIndex => $detail)
                            @php
                                $detailArray = is_array($detail);
                                $detailId = $detailArray ? ($detail['id'] ?? null) : ($detail?->id ?? null);
                                $detailLabel = $detailArray ? ($detail['label'] ?? '') : ($detail?->label ?? '');
                                $detailValue = $detailArray ? ($detail['value'] ?? '') : ($detail?->value ?? '');
                                $detailOrder = $detailArray ? ($detail['sort_order'] ?? $detailIndex) : ($detail?->sort_order ?? $detailIndex);
                                $detailStatus = $detailArray ? (!empty($detail['status'])) : ($detail?->status ?? true);
                            @endphp

                            <div class="detail-row grid gap-3 md:grid-cols-5">
                                @if($detailId)
                                    <input type="hidden" name="outlets[{{ $outletIndex }}][details][{{ $detailIndex }}][id]" value="{{ $detailId }}">
                                @endif

                                <input type="text"
                                       name="outlets[{{ $outletIndex }}][details][{{ $detailIndex }}][label]"
                                       value="{{ $detailLabel }}"
                                       placeholder="Label"
                                       class="rounded-xl border px-4 py-3 text-sm">

                                <input type="text"
                                       name="outlets[{{ $outletIndex }}][details][{{ $detailIndex }}][value]"
                                       value="{{ $detailValue }}"
                                       placeholder="Value"
                                       class="md:col-span-2 rounded-xl border px-4 py-3 text-sm">

                                <input type="number"
                                       name="outlets[{{ $outletIndex }}][details][{{ $detailIndex }}][sort_order]"
                                       value="{{ $detailOrder }}"
                                       min="0"
                                       class="rounded-xl border px-4 py-3 text-sm">

                                <div class="flex items-center gap-2">
                                    <label class="flex items-center gap-2 text-xs font-semibold">
                                        <input type="checkbox"
                                               name="outlets[{{ $outletIndex }}][details][{{ $detailIndex }}][status]"
                                               value="1"
                                               {{ $detailStatus ? 'checked' : '' }}>
                                        Active
                                    </label>

                                    <button type="button"
                                            class="remove-detail rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600">
                                        X
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="detail-row grid gap-3 md:grid-cols-5">
                                <input type="text"
                                       name="outlets[{{ $outletIndex }}][details][0][label]"
                                       placeholder="Label"
                                       class="rounded-xl border px-4 py-3 text-sm">

                                <input type="text"
                                       name="outlets[{{ $outletIndex }}][details][0][value]"
                                       placeholder="Value"
                                       class="md:col-span-2 rounded-xl border px-4 py-3 text-sm">

                                <input type="number"
                                       name="outlets[{{ $outletIndex }}][details][0][sort_order]"
                                       value="0"
                                       min="0"
                                       class="rounded-xl border px-4 py-3 text-sm">

                                <div class="flex items-center gap-2">
                                    <label class="flex items-center gap-2 text-xs font-semibold">
                                        <input type="checkbox"
                                               name="outlets[{{ $outletIndex }}][details][0][status]"
                                               value="1"
                                               checked>
                                        Active
                                    </label>

                                    <button type="button"
                                            class="remove-detail rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600">
                                        X
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border bg-neutral-50 p-5">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           {{ old('status', $storeOutletSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold">
        Active Section
    </label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('store-outlet-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>

<template id="outlet-template">
    <div class="outlet-card rounded-2xl border bg-white p-5" data-index="__OUTLET_INDEX__">
        <div class="mb-4 flex items-center justify-between">
            <h3 class="font-bold">Outlet</h3>

            <div class="flex items-center gap-3">
                <label class="flex items-center gap-2 text-xs font-semibold">
                    <input type="checkbox" name="outlets[__OUTLET_INDEX__][status]" value="1" checked>
                    Active
                </label>

                <button type="button" class="remove-outlet rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600">
                    Remove
                </button>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <input type="text" name="outlets[__OUTLET_INDEX__][title]" placeholder="Outlet Title" class="w-full rounded-xl border px-4 py-3 text-sm">
            <input type="text" name="outlets[__OUTLET_INDEX__][subtitle]" placeholder="Subtitle" class="w-full rounded-xl border px-4 py-3 text-sm">
            <input type="text" name="outlets[__OUTLET_INDEX__][badge]" placeholder="Badge" class="w-full rounded-xl border px-4 py-3 text-sm">

            <select name="outlets[__OUTLET_INDEX__][theme]" class="w-full rounded-xl border px-4 py-3 text-sm">
                <option value="blue">Blue</option>
                <option value="cyan">Cyan</option>
                <option value="slate">Slate</option>
                <option value="pink">Pink</option>
            </select>

            <input type="number" name="outlets[__OUTLET_INDEX__][sort_order]" value="0" min="0" class="w-full rounded-xl border px-4 py-3 text-sm">
            <input type="text" name="outlets[__OUTLET_INDEX__][image_alt]" placeholder="Image Alt" class="w-full rounded-xl border px-4 py-3 text-sm">

            <input type="file" name="outlets[__OUTLET_INDEX__][image]" accept="image/*" class="w-full rounded-xl border px-4 py-3 text-sm">
            <input type="text" name="outlets[__OUTLET_INDEX__][button_text]" value="Contact Outlet" placeholder="Button Text" class="w-full rounded-xl border px-4 py-3 text-sm">
            <input type="text" name="outlets[__OUTLET_INDEX__][button_link]" value="{{ route('contact') }}" placeholder="Button Link" class="w-full rounded-xl border px-4 py-3 text-sm">
        </div>

        <div class="mt-5 rounded-2xl border bg-neutral-50 p-4">
            <div class="mb-4 flex items-center justify-between">
                <h4 class="font-bold">Outlet Details</h4>

                <button type="button" class="add-detail rounded-xl bg-blue-600 px-4 py-2 text-xs font-bold text-white">
                    + Add Detail
                </button>
            </div>

            <div class="detail-wrapper grid gap-3">
                <div class="detail-row grid gap-3 md:grid-cols-5">
                    <input type="text" name="outlets[__OUTLET_INDEX__][details][0][label]" placeholder="Label" class="rounded-xl border px-4 py-3 text-sm">
                    <input type="text" name="outlets[__OUTLET_INDEX__][details][0][value]" placeholder="Value" class="md:col-span-2 rounded-xl border px-4 py-3 text-sm">
                    <input type="number" name="outlets[__OUTLET_INDEX__][details][0][sort_order]" value="0" min="0" class="rounded-xl border px-4 py-3 text-sm">

                    <div class="flex items-center gap-2">
                        <label class="flex items-center gap-2 text-xs font-semibold">
                            <input type="checkbox" name="outlets[__OUTLET_INDEX__][details][0][status]" value="1" checked>
                            Active
                        </label>

                        <button type="button" class="remove-detail rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600">
                            X
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let outletIndex = document.querySelectorAll('.outlet-card').length;

        document.getElementById('add-outlet')?.addEventListener('click', function () {
            const template = document.getElementById('outlet-template').innerHTML;
            const html = template.replaceAll('__OUTLET_INDEX__', outletIndex);

            document.getElementById('outlet-wrapper').insertAdjacentHTML('beforeend', html);
            outletIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-outlet')) {
                e.target.closest('.outlet-card')?.remove();
            }

            if (e.target.classList.contains('add-detail')) {
                const outletCard = e.target.closest('.outlet-card');
                const outletCardIndex = outletCard.dataset.index;
                const wrapper = outletCard.querySelector('.detail-wrapper');
                const detailIndex = wrapper.querySelectorAll('.detail-row').length;

                const html = `
                    <div class="detail-row grid gap-3 md:grid-cols-5">
                        <input type="text" name="outlets[${outletCardIndex}][details][${detailIndex}][label]" placeholder="Label" class="rounded-xl border px-4 py-3 text-sm">
                        <input type="text" name="outlets[${outletCardIndex}][details][${detailIndex}][value]" placeholder="Value" class="md:col-span-2 rounded-xl border px-4 py-3 text-sm">
                        <input type="number" name="outlets[${outletCardIndex}][details][${detailIndex}][sort_order]" value="${detailIndex}" min="0" class="rounded-xl border px-4 py-3 text-sm">

                        <div class="flex items-center gap-2">
                            <label class="flex items-center gap-2 text-xs font-semibold">
                                <input type="checkbox" name="outlets[${outletCardIndex}][details][${detailIndex}][status]" value="1" checked>
                                Active
                            </label>

                            <button type="button" class="remove-detail rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600">
                                X
                            </button>
                        </div>
                    </div>
                `;

                wrapper.insertAdjacentHTML('beforeend', html);
            }

            if (e.target.classList.contains('remove-detail')) {
                e.target.closest('.detail-row')?.remove();
            }
        });
    });
</script>