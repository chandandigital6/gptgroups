@php
    $careerSection = $careerSection ?? null;
@endphp

<div class="rounded-2xl border border-blue-100 bg-blue-50 p-4 text-sm text-blue-700">
    Section keys use karo:
    <strong>open_positions</strong>,
    <strong>hiring_process</strong>,
    <strong>apply_form</strong>
</div>

<div class="grid gap-5 md:grid-cols-2">

    <div>
        <label class="mb-2 block text-sm font-semibold">Section Key *</label>
        <input type="text" name="section_key" value="{{ old('section_key', $careerSection->section_key ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm" required>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Label</label>
        <input type="text" name="label" value="{{ old('label', $careerSection->label ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Title</label>
        <input type="text" name="title" value="{{ old('title', $careerSection->title ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Button Text</label>
        <input type="text" name="button_text" value="{{ old('button_text', $careerSection->button_text ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Button URL</label>
        <input type="text" name="button_url" value="{{ old('button_url', $careerSection->button_url ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Email Title</label>
        <input type="text" name="email_title" value="{{ old('email_title', $careerSection->email_title ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Email</label>
        <input type="text" name="email" value="{{ old('email', $careerSection->email ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Phone Title</label>
        <input type="text" name="phone_title" value="{{ old('phone_title', $careerSection->phone_title ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $careerSection->phone ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $careerSection->sort_order ?? 0) }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="status" value="1" id="status"
               @checked(old('status', $careerSection->status ?? 1))>
        <label for="status" class="text-sm font-semibold">Active</label>
    </div>

</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description</label>
    <textarea name="description" rows="5"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $careerSection->description ?? '') }}</textarea>
</div>

<button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
    {{ $buttonText }}
</button>