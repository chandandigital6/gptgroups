@php
    $hiringProcessStep = $hiringProcessStep ?? null;
@endphp

<div class="grid gap-5 md:grid-cols-2">

    <div>
        <label class="mb-2 block text-sm font-semibold">Icon Text</label>
        <input type="text" name="icon_text" value="{{ old('icon_text', $hiringProcessStep->icon_text ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm" placeholder="1">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Title *</label>
        <input type="text" name="title" value="{{ old('title', $hiringProcessStep->title ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm" required>
        @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Theme</label>
        <select name="theme" class="w-full rounded-xl border px-4 py-3 text-sm">
            @foreach(['blue','cyan','green','slate'] as $theme)
                <option value="{{ $theme }}" @selected(old('theme', $hiringProcessStep->theme ?? 'blue') == $theme)>
                    {{ ucfirst($theme) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $hiringProcessStep->sort_order ?? 0) }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="status" value="1" id="status"
               @checked(old('status', $hiringProcessStep->status ?? 1))>
        <label for="status" class="text-sm font-semibold">Active</label>
    </div>

</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description</label>
    <textarea name="description" rows="5"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $hiringProcessStep->description ?? '') }}</textarea>
</div>

<button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
    {{ $buttonText }}
</button>