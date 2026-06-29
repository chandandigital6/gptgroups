@php
    $category = $category ?? null;
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
        <label class="mb-2 block text-sm font-semibold">Name</label>
        <input type="text" name="name" value="{{ old('name', $category?->name) }}"
               required class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category?->slug) }}"
               placeholder="auto-generate if blank"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Theme</label>
        <select name="theme" class="w-full rounded-xl border px-4 py-3 text-sm">
            @foreach(['blue', 'cyan', 'pink', 'slate'] as $theme)
                <option value="{{ $theme }}" @selected(old('theme', $category?->theme ?? 'blue') === $theme)>
                    {{ ucfirst($theme) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $category?->sort_order ?? 0) }}"
               min="0" class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div class="flex items-center gap-3 rounded-2xl border bg-neutral-50 p-5">
    <input type="checkbox" name="status" value="1" id="status"
           {{ old('status', $category?->status ?? 1) ? 'checked' : '' }}>
    <label for="status" class="text-sm font-semibold">Active</label>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('news-categories.index') }}" class="rounded-xl border px-6 py-3 text-sm font-semibold">Cancel</a>
    <button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>