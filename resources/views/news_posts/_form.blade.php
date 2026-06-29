@php
    $newsPost = $newsPost ?? null;
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
        <label class="mb-2 block text-sm font-semibold">Category</label>
        <select name="news_category_id" class="w-full rounded-xl border px-4 py-3 text-sm">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('news_category_id', $newsPost?->news_category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Published Date</label>
        <input type="date" name="published_date"
               value="{{ old('published_date', $newsPost?->published_date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Title</label>
    <input type="text" name="title" value="{{ old('title', $newsPost?->title) }}"
           required class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $newsPost?->slug) }}"
           placeholder="auto-generate if blank"
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Small Title</label>
    <input type="text" name="small_title" value="{{ old('small_title', $newsPost?->small_title) }}"
           placeholder="New Product Update"
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Short Description / Excerpt</label>
    <textarea name="excerpt" rows="4"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('excerpt', $newsPost?->excerpt) }}</textarea>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Full Details</label>
    <textarea name="content" rows="10"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('content', $newsPost?->content) }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Image</h2>

    @if($newsPost?->image)
        <div class="mb-4 h-72 overflow-hidden rounded-2xl bg-neutral-100">
            <img src="{{ asset('storage/' . $newsPost->image) }}"
                 class="h-full w-full object-cover"
                 alt="{{ $newsPost->image_alt }}">
        </div>
    @endif

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold">Image</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full rounded-xl border px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold">Image Alt</label>
            <input type="text" name="image_alt" value="{{ old('image_alt', $newsPost?->image_alt) }}"
                   class="w-full rounded-xl border px-4 py-3 text-sm">
        </div>
    </div>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $newsPost?->sort_order ?? 0) }}"
               min="0" class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div class="flex items-center gap-5 rounded-2xl border bg-neutral-50 p-5">
        <label class="flex items-center gap-2 text-sm font-semibold">
            <input type="checkbox" name="is_featured" value="1"
                   {{ old('is_featured', $newsPost?->is_featured ?? 0) ? 'checked' : '' }}>
            Featured
        </label>

        <label class="flex items-center gap-2 text-sm font-semibold">
            <input type="checkbox" name="status" value="1"
                   {{ old('status', $newsPost?->status ?? 1) ? 'checked' : '' }}>
            Active
        </label>
    </div>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('news-posts.index') }}" class="rounded-xl border px-6 py-3 text-sm font-semibold">Cancel</a>
    <button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>