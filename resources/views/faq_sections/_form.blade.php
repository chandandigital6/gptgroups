@php
    $faqSection = $faqSection ?? null;
    $pages = $pages ?? [];

    $oldItems = old('items');

    if ($oldItems) {
        $items = collect($oldItems);
    } elseif ($faqSection && $faqSection->items) {
        $items = $faqSection->items;
    } else {
        $items = collect([
            [
                'question' => '',
                'answer' => '',
                'sort_order' => 0,
                'is_open' => 1,
                'status' => 1,
            ],
        ]);
    }

    $selectedPage = old('page_slug', $faqSection?->page_slug ?? 'home');
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
            Page <span class="text-red-500">*</span>
        </label>

        <select name="page_slug"
                id="page_slug"
                required
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            @foreach($pages as $value => $label)
                <option value="{{ $value }}" @selected($selectedPage === $value)>
                    {{ $label }}
                </option>
            @endforeach

            <option value="__custom__" @selected(old('page_slug') === '__custom__')>
                + Add New Page
            </option>
        </select>

        <input type="text"
               name="custom_page_slug"
               id="custom_page_slug"
               value="{{ old('custom_page_slug') }}"
               placeholder="Enter new page name, example: product details"
               class="mt-3 hidden w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $faqSection?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Label
        </label>

        <input type="text"
               name="label"
               value="{{ old('label', $faqSection?->label ?? 'FAQs') }}"
               placeholder="FAQs"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Title <span class="text-red-500">*</span>
        </label>

        <input type="text"
               name="title"
               value="{{ old('title', $faqSection?->title ?? '') }}"
               required
               placeholder="Frequently asked questions."
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="4"
              placeholder="Write FAQ section description"
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $faqSection?->description ?? '') }}</textarea>
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Button Text
        </label>

        <input type="text"
               name="button_text"
               value="{{ old('button_text', $faqSection?->button_text ?? '') }}"
               placeholder="Contact Us"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Button Link
        </label>

        <input type="text"
               name="button_link"
               value="{{ old('button_link', $faqSection?->button_link ?? '') }}"
               placeholder="/contact-us"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
            FAQ Questions
        </h2>

        <p class="text-xs text-neutral-500">
            Blank question save nahi hoga.
        </p>
    </div>

    <div class="space-y-5">
        @for($i = 0; $i < 10; $i++)
            @php
                $item = $items[$i] ?? null;

                $question = is_array($item) ? ($item['question'] ?? '') : ($item?->question ?? '');
                $answer = is_array($item) ? ($item['answer'] ?? '') : ($item?->answer ?? '');
                $sortOrder = is_array($item) ? ($item['sort_order'] ?? $i) : ($item?->sort_order ?? $i);
                $isOpen = is_array($item) ? (!empty($item['is_open'])) : ($item?->is_open ?? false);
                $status = is_array($item) ? (!empty($item['status'])) : ($item?->status ?? true);
            @endphp

            <div class="rounded-2xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="font-bold text-neutral-900 dark:text-white">
                        Question {{ $i + 1 }}
                    </h3>

                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 text-xs font-semibold text-neutral-600 dark:text-neutral-300">
                            <input type="checkbox"
                                   name="items[{{ $i }}][is_open]"
                                   value="1"
                                   class="rounded border-neutral-300"
                                   {{ $isOpen ? 'checked' : '' }}>
                            Open
                        </label>

                        <label class="flex items-center gap-2 text-xs font-semibold text-neutral-600 dark:text-neutral-300">
                            <input type="checkbox"
                                   name="items[{{ $i }}][status]"
                                   value="1"
                                   class="rounded border-neutral-300"
                                   {{ $status ? 'checked' : '' }}>
                            Active
                        </label>
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-4">
                    <div class="md:col-span-3">
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Question
                        </label>

                        <input type="text"
                               name="items[{{ $i }}][question]"
                               value="{{ $question }}"
                               placeholder="Write question"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Order
                        </label>

                        <input type="number"
                               name="items[{{ $i }}][sort_order]"
                               value="{{ $sortOrder }}"
                               min="0"
                               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Answer
                    </label>

                    <textarea name="items[{{ $i }}][answer]"
                              rows="3"
                              placeholder="Write answer"
                              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ $answer }}</textarea>
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
           {{ old('status', $faqSection?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active Section
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('faq-sections.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pageSelect = document.getElementById('page_slug');
        const customInput = document.getElementById('custom_page_slug');

        function toggleCustomPage() {
            if (pageSelect.value === '__custom__') {
                customInput.classList.remove('hidden');
                customInput.setAttribute('required', 'required');
            } else {
                customInput.classList.add('hidden');
                customInput.removeAttribute('required');
                customInput.value = '';
            }
        }

        pageSelect.addEventListener('change', toggleCustomPage);
        toggleCustomPage();
    });
</script>