@php
    $isEdit = !empty($whatWeDoSection);
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 p-5 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
        <div class="mb-2 font-bold">Please fix these errors:</div>

        <ul class="list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $formAction }}"
      method="POST"
      enctype="multipart/form-data"
      class="grid gap-6">

    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    {{-- Main Content --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                What We Do Content
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Manage main section title, description and image.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Label
                </label>

                <input type="text"
                       name="label"
                       value="{{ old('label', $whatWeDoSection->label ?? '') }}"
                       placeholder="What We Do"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $whatWeDoSection->image)
                    <img src="{{ asset('storage/' . $whatWeDoSection->image) }}"
                         class="mt-3 h-28 w-full rounded-xl object-cover">
                @endif
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Title <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title', $whatWeDoSection->title ?? '') }}"
                       required
                       placeholder="Complete market execution for telecom and lifestyle brands."
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Write section description..."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">{{ old('description', $whatWeDoSection->description ?? '') }}</textarea>
            </div>

        </div>
    </div>

    {{-- Overlay --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
            Image Overlay Box
        </h2>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Overlay Title
                </label>

                <input type="text"
                       name="overlay_title"
                       value="{{ old('overlay_title', $whatWeDoSection->overlay_title ?? '') }}"
                       placeholder="End-to-end support"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Overlay Text
                </label>

                <input type="text"
                       name="overlay_text"
                       value="{{ old('overlay_text', $whatWeDoSection->overlay_text ?? '') }}"
                       placeholder="From product arrival to retail sell-through."
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>
        </div>
    </div>

    {{-- Cards --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
            Feature Cards
        </h2>

        <div class="grid gap-5 md:grid-cols-2">

            @for($i = 1; $i <= 4; $i++)
                <div class="rounded-2xl border border-neutral-200 p-5 dark:border-neutral-700">
                    <h3 class="mb-4 font-bold text-neutral-900 dark:text-white">
                        Card {{ $i }}
                    </h3>

                    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Card {{ $i }} Title
                    </label>

                    <input type="text"
                           name="card_{{ $i }}_title"
                           value="{{ old('card_'.$i.'_title', $whatWeDoSection->{'card_'.$i.'_title'} ?? '') }}"
                           placeholder="Brand Distribution"
                           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                    <label class="mb-2 mt-4 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Card {{ $i }} Description
                    </label>

                    <textarea name="card_{{ $i }}_description"
                              rows="3"
                              placeholder="Card description..."
                              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">{{ old('card_'.$i.'_description', $whatWeDoSection->{'card_'.$i.'_description'} ?? '') }}</textarea>
                </div>
            @endfor

        </div>
    </div>

    {{-- Settings --}}
    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
            Settings
        </h2>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $whatWeDoSection->sort_order ?? 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">
            </div>

            <div class="flex items-center">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           @checked(old('status', $whatWeDoSection->status ?? 1))
                           class="h-5 w-5 rounded border-neutral-300 text-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Active Section
                    </span>
                </label>
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Section' : 'Create Section' }}
        </button>
    </div>
</form>