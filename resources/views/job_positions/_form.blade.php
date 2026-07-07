@php
    $jobPosition = $jobPosition ?? null;
@endphp

<div class="grid gap-5 md:grid-cols-2">

    <div>
        <label class="mb-2 block text-sm font-semibold">Job Title *</label>
        <input type="text" name="title" value="{{ old('title', $jobPosition->title ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm" required>
        @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Company</label>
        <input type="text" name="company" value="{{ old('company', $jobPosition->company ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Job Type *</label>
        <input type="text" name="job_type" value="{{ old('job_type', $jobPosition->job_type ?? 'In-Office') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm" required>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Location</label>
        <input type="text" name="location" value="{{ old('location', $jobPosition->location ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Experience</label>
        <input type="text" name="experience" value="{{ old('experience', $jobPosition->experience ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Icon Text</label>
        <input type="text" name="icon_text" value="{{ old('icon_text', $jobPosition->icon_text ?? '') }}"
               class="w-full rounded-xl border px-4 py-3 text-sm" placeholder="M">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Icon Theme</label>
        <select name="icon_theme" class="w-full rounded-xl border px-4 py-3 text-sm">
            @foreach(['blue','cyan','pink','purple','orange','emerald','slate'] as $theme)
                <option value="{{ $theme }}" @selected(old('icon_theme', $jobPosition->icon_theme ?? 'blue') == $theme)>
                    {{ ucfirst($theme) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Badge Theme</label>
        <select name="badge_theme" class="w-full rounded-xl border px-4 py-3 text-sm">
            @foreach(['green','yellow','blue','red','slate'] as $theme)
                <option value="{{ $theme }}" @selected(old('badge_theme', $jobPosition->badge_theme ?? 'green') == $theme)>
                    {{ ucfirst($theme) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $jobPosition->sort_order ?? 0) }}"
               class="w-full rounded-xl border px-4 py-3 text-sm">
    </div>

    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="status" value="1" id="status"
               @checked(old('status', $jobPosition->status ?? 1))>
        <label for="status" class="text-sm font-semibold">Active</label>
    </div>

</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Short Description</label>
    <textarea name="short_description" rows="3"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('short_description', $jobPosition->short_description ?? '') }}</textarea>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Full Description</label>
    <textarea name="full_description" rows="5"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('full_description', $jobPosition->full_description ?? '') }}</textarea>
</div>

<button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
    {{ $buttonText }}
</button>