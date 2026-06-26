@php
    $section = $section ?? null;

    $oldLogos = old('logos');

    if ($oldLogos) {
        $logos = collect($oldLogos);
    } elseif ($section && $section->logos) {
        $logos = $section->logos;
    } else {
        $logos = collect([
            ['name' => 'Samsung', 'sort_order' => 0, 'status' => 1],
            ['name' => 'LAVA', 'sort_order' => 1, 'status' => 1],
            ['name' => 'Apple', 'sort_order' => 2, 'status' => 1],
            ['name' => 'Nokia', 'sort_order' => 3, 'status' => 1],
            ['name' => 'Vivo', 'sort_order' => 4, 'status' => 1],
            ['name' => 'Xiaomi', 'sort_order' => 5, 'status' => 1],
            ['name' => 'Huawei', 'sort_order' => 6, 'status' => 1],
            ['name' => 'Sony', 'sort_order' => 7, 'status' => 1],
        ]);
    }
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
        <div class="font-semibold">Please fix these errors:</div>
        <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Label</label>
        <input type="text"
               name="label"
               value="{{ old('label', $section?->label ?? 'Partner Logos') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $section?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Title <span class="text-red-500">*</span></label>
    <input type="text"
           name="title"
           value="{{ old('title', $section?->title ?? 'Trusted brand ecosystem.') }}"
           required
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description</label>
    <textarea name="description"
              rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $section?->description ?? 'Use this section for final authorised partner logos. Current cards are editable placeholders.') }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Partner Logos</h2>

    <div class="grid gap-5 md:grid-cols-2">
        @for($i = 0; $i < 12; $i++)
            @php
                $logo = $logos[$i] ?? null;

                $name = is_array($logo) ? ($logo['name'] ?? '') : ($logo?->name ?? '');
                $sortOrder = is_array($logo) ? ($logo['sort_order'] ?? $i) : ($logo?->sort_order ?? $i);
                $status = is_array($logo) ? (!empty($logo['status'])) : ($logo?->status ?? true);
                $logoPath = !is_array($logo) ? ($logo?->logo ?? null) : null;
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">Logo {{ $i + 1 }}</h3>

                    <label class="flex items-center gap-2 text-xs font-semibold">
                        <input type="checkbox"
                               name="logos[{{ $i }}][status]"
                               value="1"
                               {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                @if($logoPath)
                    <div class="mb-4 flex h-24 items-center justify-center rounded-xl bg-neutral-100 p-3">
                        <img src="{{ asset('storage/' . $logoPath) }}"
                             class="max-h-full max-w-full object-contain"
                             alt="{{ $name }}">
                    </div>
                @endif

                <div class="grid gap-4 md:grid-cols-3">
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-semibold">Name</label>
                        <input type="text"
                               name="logos[{{ $i }}][name]"
                               value="{{ $name }}"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Order</label>
                        <input type="number"
                               name="logos[{{ $i }}][sort_order]"
                               value="{{ $sortOrder }}"
                               min="0"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold">Logo Image</label>
                    <input type="file"
                           name="logos[{{ $i }}][logo]"
                           accept="image/*"
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
           {{ old('status', $section?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold">
        Active Section
    </label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('partner-logo-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>