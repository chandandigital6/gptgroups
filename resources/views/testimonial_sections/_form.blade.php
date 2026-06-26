@php
    $section = $section ?? null;

    $oldTestimonials = old('testimonials');

    if ($oldTestimonials) {
        $testimonials = collect($oldTestimonials);
    } elseif ($section && $section->testimonials) {
        $testimonials = $section->testimonials;
    } else {
        $testimonials = collect([
            [
                'message' => 'GPT Group brings speed, clarity and discipline to retail distribution. Their team understands market requirements.',
                'name' => 'Retail Partner',
                'designation' => 'Partner',
                'location' => 'Muscat',
                'sort_order' => 0,
                'status' => 1,
            ],
            [
                'message' => 'Strong warehouse support and reliable communication make them a dependable partner for product movement.',
                'name' => 'Wholesale Partner',
                'designation' => 'Partner',
                'location' => 'Oman',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'message' => 'Their leadership team is proactive in launch planning, partner training and customer support.',
                'name' => 'Brand Associate',
                'designation' => 'Associate',
                'location' => 'GCC',
                'sort_order' => 2,
                'status' => 1,
            ],
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
               value="{{ old('label', $section?->label ?? 'Testimonials') }}"
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
           value="{{ old('title', $section?->title ?? 'What partners say about GPT Group.') }}"
           required
           class="w-full rounded-xl border px-4 py-3 text-sm">
</div>

<div>
    <label class="mb-2 block text-sm font-semibold">Description</label>
    <textarea name="description"
              rows="3"
              class="w-full rounded-xl border px-4 py-3 text-sm">{{ old('description', $section?->description) }}</textarea>
</div>

<div class="rounded-2xl border bg-neutral-50 p-5">
    <h2 class="mb-5 text-lg font-bold">Testimonials</h2>

    <div class="grid gap-5">
        @for($i = 0; $i < 10; $i++)
            @php
                $testimonial = $testimonials[$i] ?? null;

                $message = is_array($testimonial) ? ($testimonial['message'] ?? '') : ($testimonial?->message ?? '');
                $name = is_array($testimonial) ? ($testimonial['name'] ?? '') : ($testimonial?->name ?? '');
                $designation = is_array($testimonial) ? ($testimonial['designation'] ?? '') : ($testimonial?->designation ?? '');
                $location = is_array($testimonial) ? ($testimonial['location'] ?? '') : ($testimonial?->location ?? '');
                $sortOrder = is_array($testimonial) ? ($testimonial['sort_order'] ?? $i) : ($testimonial?->sort_order ?? $i);
                $status = is_array($testimonial) ? (!empty($testimonial['status'])) : ($testimonial?->status ?? true);
                $imagePath = !is_array($testimonial) ? ($testimonial?->image ?? null) : null;
            @endphp

            <div class="rounded-2xl border bg-white p-5">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold">Testimonial {{ $i + 1 }}</h3>

                    <label class="flex items-center gap-2 text-xs font-semibold">
                        <input type="checkbox"
                               name="testimonials[{{ $i }}][status]"
                               value="1"
                               {{ $status ? 'checked' : '' }}>
                        Active
                    </label>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold">Message</label>
                    <textarea name="testimonials[{{ $i }}][message]"
                              rows="3"
                              class="w-full rounded-xl border px-4 py-3 text-sm">{{ $message }}</textarea>
                </div>

                <div class="mt-4 grid gap-4 md:grid-cols-4">
                    <div>
                        <label class="mb-2 block text-sm font-semibold">Name</label>
                        <input type="text"
                               name="testimonials[{{ $i }}][name]"
                               value="{{ $name }}"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Designation</label>
                        <input type="text"
                               name="testimonials[{{ $i }}][designation]"
                               value="{{ $designation }}"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Location</label>
                        <input type="text"
                               name="testimonials[{{ $i }}][location]"
                               value="{{ $location }}"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold">Order</label>
                        <input type="number"
                               name="testimonials[{{ $i }}][sort_order]"
                               value="{{ $sortOrder }}"
                               min="0"
                               class="w-full rounded-xl border px-4 py-3 text-sm">
                    </div>
                </div>

                <div class="mt-4">
                    @if($imagePath)
                        <img src="{{ asset('storage/' . $imagePath) }}"
                             class="mb-3 h-20 w-20 rounded-full object-cover"
                             alt="{{ $name }}">
                    @endif

                    <label class="mb-2 block text-sm font-semibold">Image</label>
                    <input type="file"
                           name="testimonials[{{ $i }}][image]"
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
    <a href="{{ route('testimonial-sections.index') }}"
       class="rounded-xl border px-6 py-3 text-sm font-semibold">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>