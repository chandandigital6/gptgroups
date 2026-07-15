@php
    $pageHero = $pageHero ?? null;
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
            Page Slug <span class="text-red-500">*</span>
        </label>

        <input type="text"
               name="page_slug"
               value="{{ old('page_slug', $pageHero?->page_slug ?? 'services') }}"
               placeholder="services, about, brands, custom-page"
               required
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">

        <p class="mt-1 text-xs text-neutral-500">
            Example: services, about, brands, network, custom-page
        </p>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Sort Order
        </label>

        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $pageHero?->sort_order ?? 0) }}"
               min="0"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Badge Text
    </label>

    <input type="text"
           name="badge_text"
           value="{{ old('badge_text', $pageHero?->badge_text ?? 'GPT Group Services') }}"
           class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Title Line 1 <span class="text-red-500">*</span>
        </label>

        <input type="text"
               name="title_line_1"
               value="{{ old('title_line_1', $pageHero?->title_line_1 ?? 'Smart Services For') }}"
               required
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Title Line 2
        </label>

        <input type="text"
               name="title_line_2"
               value="{{ old('title_line_2', $pageHero?->title_line_2 ?? 'Customers & Businesses') }}"
               class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
    </div>
</div>

<div>
    <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Description
    </label>

    <textarea name="description"
              rows="4"
              class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $pageHero?->description ?? 'GPT Group provides reliable mobile repair support through GPT Care and business-focused distribution solutions through GPT B2B Programs.') }}</textarea>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Buttons
    </h2>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Primary Button Text
            </label>

            <input type="text"
                   name="primary_button_text"
                   value="{{ old('primary_button_text', $pageHero?->primary_button_text ?? 'GPT Care') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Primary Button Link
            </label>

            <input type="text"
                   name="primary_button_link"
                   value="{{ old('primary_button_link', $pageHero?->primary_button_link ?? '#gpt-care') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Secondary Button Text
            </label>

            <input type="text"
                   name="secondary_button_text"
                   value="{{ old('secondary_button_text', $pageHero?->secondary_button_text ?? 'B2B Programs') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Secondary Button Link
            </label>

            <input type="text"
                   name="secondary_button_link"
                   value="{{ old('secondary_button_link', $pageHero?->secondary_button_link ?? '#b2b-program') }}"
                   class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
        </div>
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
        Small Stats
    </h2>

    <div class="grid gap-5 md:grid-cols-4">
        @foreach([
            1 => ['Care', 'Repair'],
            2 => ['B2B', 'Program'],
            3 => ['Oman', 'Support'],
            4 => ['Fast', 'Service'],
        ] as $i => $default)
            @php
                $valueField = 'stat_' . $i . '_value';
                $labelField = 'stat_' . $i . '_label';
            @endphp

            <div class="rounded-2xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Stat {{ $i }} Value
                </label>

                <input type="text"
                       name="{{ $valueField }}"
                       value="{{ old($valueField, $pageHero?->{$valueField} ?? $default[0]) }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">

                <label class="mb-2 mt-3 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Stat {{ $i }} Label
                </label>

                <input type="text"
                       name="{{ $labelField }}"
                       value="{{ old($labelField, $pageHero?->{$labelField} ?? $default[1]) }}"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm">
            </div>
        @endforeach
    </div>
</div>

<div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <div class="mb-5">
        <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
            Hero Image, GIF, Video & Card
        </h2>

        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
            Supported formats: JPG, JPEG, PNG, WEBP, GIF, MP4, WEBM and MOV.
            Maximum file size: 30 MB.
        </p>
    </div>

    @php
        $existingMedia = $pageHero?->image;
        $existingExtension = $existingMedia
            ? strtolower(pathinfo($existingMedia, PATHINFO_EXTENSION))
            : null;

        $existingIsVideo = in_array(
            $existingExtension,
            ['mp4', 'webm', 'mov']
        );
    @endphp

    {{-- Existing File Preview --}}
    @if($existingMedia)
        <div class="mb-5">
            <p class="mb-2 text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Current Media
            </p>

            <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-black dark:border-neutral-700">

                @if($existingIsVideo)
                    <video
                        src="{{ asset('storage/' . $existingMedia) }}"
                        class="h-72 w-full object-cover"
                        controls
                        muted
                        loop
                        playsinline
                    ></video>
                @else
                    <img
                        src="{{ asset('storage/' . $existingMedia) }}"
                        alt="{{ $pageHero?->image_alt ?: $pageHero?->title_line_1 }}"
                        class="h-72 w-full object-cover"
                    >
                @endif

            </div>
        </div>
    @endif

    {{-- New File Preview --}}
    <div
        id="heroMediaPreviewWrapper"
        class="mb-5 hidden"
    >
        <p class="mb-2 text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            New Media Preview
        </p>

        <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-black dark:border-neutral-700">
            <img
                id="heroImagePreview"
                src=""
                alt="Selected media preview"
                class="hidden h-72 w-full object-cover"
            >

            <video
                id="heroVideoPreview"
                class="hidden h-72 w-full object-cover"
                controls
                muted
                loop
                playsinline
            ></video>
        </div>
    </div>

    <div class="grid gap-5 md:grid-cols-2">

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Hero Image, GIF or Video
            </label>

            <input
                type="file"
                name="image"
                id="heroMediaInput"
                accept=".jpg,.jpeg,.png,.webp,.gif,.mp4,.webm,.mov,image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm,video/quicktime"
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 file:mr-4 file:rounded-lg file:border-0 file:bg-black file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-neutral-800 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:file:bg-white dark:file:text-black"
            >

            @error('image')
                <p class="mt-2 text-xs font-semibold text-red-600">
                    {{ $message }}
                </p>
            @enderror

            <p class="mt-2 text-xs text-neutral-500 dark:text-neutral-400">
                Recommended video: MP4, landscape ratio 16:9, short duration
                and optimized file size.
            </p>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Media Alt Text
            </label>

            <input
                type="text"
                name="image_alt"
                value="{{ old('image_alt', $pageHero?->image_alt ?? 'GPT Group Services') }}"
                placeholder="Describe image or video"
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white"
            >
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Media Card Title
            </label>

            <input
                type="text"
                name="card_title"
                value="{{ old('card_title', $pageHero?->card_title ?? 'Repair + Business Support') }}"
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white"
            >
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Media Card Description
            </label>

            <textarea
                name="card_description"
                rows="3"
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white"
            >{{ old('card_description', $pageHero?->card_description ?? 'GPT Care for customers and GPT B2B Programs for business partners.') }}</textarea>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mediaInput = document.getElementById('heroMediaInput');
        const previewWrapper = document.getElementById(
            'heroMediaPreviewWrapper'
        );
        const imagePreview = document.getElementById(
            'heroImagePreview'
        );
        const videoPreview = document.getElementById(
            'heroVideoPreview'
        );

        if (
            !mediaInput ||
            !previewWrapper ||
            !imagePreview ||
            !videoPreview
        ) {
            return;
        }

        let currentPreviewUrl = null;

        mediaInput.addEventListener('change', function (event) {
            const file = event.target.files[0];

            imagePreview.classList.add('hidden');
            videoPreview.classList.add('hidden');

            imagePreview.removeAttribute('src');
            videoPreview.removeAttribute('src');
            videoPreview.load();

            if (currentPreviewUrl) {
                URL.revokeObjectURL(currentPreviewUrl);
                currentPreviewUrl = null;
            }

            if (!file) {
                previewWrapper.classList.add('hidden');
                return;
            }

            currentPreviewUrl = URL.createObjectURL(file);
            previewWrapper.classList.remove('hidden');

            if (file.type.startsWith('video/')) {
                videoPreview.src = currentPreviewUrl;
                videoPreview.classList.remove('hidden');
                videoPreview.load();
                return;
            }

            imagePreview.src = currentPreviewUrl;
            imagePreview.classList.remove('hidden');
        });
    });
</script>

<div class="flex items-center gap-3 rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
    <input type="checkbox"
           name="status"
           value="1"
           id="status"
           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black"
           {{ old('status', $pageHero?->status ?? 1) ? 'checked' : '' }}>

    <label for="status" class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
        Active
    </label>
</div>

<div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-end">
    <a href="{{ route('page-heroes.index') }}"
       class="rounded-xl border border-neutral-200 px-6 py-3 text-center text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100">
        Cancel
    </a>

    <button type="submit"
            class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800">
        {{ $buttonText ?? 'Save' }}
    </button>
</div>