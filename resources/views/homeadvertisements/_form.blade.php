@php
    $advertisement = $homeAdvertisement ?? null;
@endphp

{{-- Validation Errors --}}
@if ($errors->any())
    <div
        class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4
               text-sm text-red-700 dark:border-red-800
               dark:bg-red-900/20 dark:text-red-300"
    >
        <div class="font-bold">
            Please fix the following errors:
        </div>

        <ul class="mt-2 list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-6 lg:grid-cols-2">

    {{-- Brand --}}
    <div>
        <label
            for="brand"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Brand
        </label>

        <input
            type="text"
            id="brand"
            name="brand"
            value="{{ old('brand', $advertisement?->brand) }}"
            placeholder="Example: Samsung Galaxy"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('brand')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Title --}}
    <div>
        <label
            for="title"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Title <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $advertisement?->title) }}"
            placeholder="Example: Galaxy Z Fold8 Ultra"
            required
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('title')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Subtitle --}}
    <div>
        <label
            for="subtitle"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Subtitle
        </label>

        <input
            type="text"
            id="subtitle"
            name="subtitle"
            value="{{ old('subtitle', $advertisement?->subtitle) }}"
            placeholder="Example: Galaxy AI"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('subtitle')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Link --}}
    <div>
        <label
            for="link"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Advertisement Link
        </label>

        <input
            type="text"
            id="link"
            name="link"
            value="{{ old('link', $advertisement?->link) }}"
            placeholder="https://example.com/product"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('link')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Launch Text --}}
    <div>
        <label
            for="launch_text"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Launch Text
        </label>

        <input
            type="text"
            id="launch_text"
            name="launch_text"
            value="{{ old(
                'launch_text',
                $advertisement?->launch_text ?? 'Coming Soon'
            ) }}"
            placeholder="Coming Soon"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('launch_text')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Launch Note --}}
    <div>
        <label
            for="launch_note"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Launch Note
        </label>

        <input
            type="text"
            id="launch_note"
            name="launch_note"
            value="{{ old(
                'launch_note',
                $advertisement?->launch_note
            ) }}"
            placeholder="Coming soon through GPT Group Oman"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('launch_note')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Sort Order --}}
    <div>
        <label
            for="sort_order"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Sort Order
        </label>

        <input
            type="number"
            id="sort_order"
            name="sort_order"
            min="0"
            value="{{ old(
                'sort_order',
                $advertisement?->sort_order ?? 0
            ) }}"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('sort_order')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Image --}}
    <div>
        <label
            for="image"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Advertisement Image

            @if (!$advertisement)
                <span class="text-red-500">*</span>
            @endif
        </label>

        <input
            type="file"
            id="image"
            name="image"
            accept=".jpg,.jpeg,.png,.webp,image/*"
            {{ !$advertisement ? 'required' : '' }}
            class="block w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-700
                   file:mr-4 file:rounded-lg file:border-0
                   file:bg-black file:px-4 file:py-2
                   file:text-xs file:font-semibold file:text-white
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-neutral-300 dark:file:bg-white
                   dark:file:text-black"
        >

        <p class="mt-2 text-xs text-neutral-500">
            Allowed: JPG, JPEG, PNG, WEBP. Maximum size: 5MB.
        </p>

        @error('image')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Start Date --}}
    <div>
        <label
            for="starts_at"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Start Date & Time
        </label>

        <input
            type="datetime-local"
            id="starts_at"
            name="starts_at"
            value="{{ old(
                'starts_at',
                $advertisement?->starts_at?->format('Y-m-d\TH:i')
            ) }}"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('starts_at')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- End Date --}}
    <div>
        <label
            for="ends_at"
            class="mb-2 block text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            End Date & Time
        </label>

        <input
            type="datetime-local"
            id="ends_at"
            name="ends_at"
            value="{{ old(
                'ends_at',
                $advertisement?->ends_at?->format('Y-m-d\TH:i')
            ) }}"
            class="w-full rounded-xl border border-neutral-200
                   bg-white px-4 py-3 text-sm text-neutral-900
                   outline-none transition focus:border-black
                   dark:border-neutral-700 dark:bg-neutral-950
                   dark:text-white dark:focus:border-white"
        >

        @error('ends_at')
            <p class="mt-1 text-xs font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>

{{-- Description --}}
<div>
    <label
        for="description"
        class="mb-2 block text-sm font-semibold
               text-neutral-800 dark:text-neutral-200"
    >
        Description
    </label>

    <textarea
        id="description"
        name="description"
        rows="5"
        placeholder="Enter advertisement description..."
        class="w-full rounded-xl border border-neutral-200
               bg-white px-4 py-3 text-sm text-neutral-900
               outline-none transition focus:border-black
               dark:border-neutral-700 dark:bg-neutral-950
               dark:text-white dark:focus:border-white"
    >{{ old('description', $advertisement?->description) }}</textarea>

    @error('description')
        <p class="mt-1 text-xs font-medium text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Current Image Preview --}}
@if ($advertisement?->image)
    <div>
        <p
            class="mb-3 text-sm font-semibold
                   text-neutral-800 dark:text-neutral-200"
        >
            Current Advertisement Image
        </p>

        <div
            class="overflow-hidden rounded-2xl border
                   border-neutral-200 bg-neutral-100 p-3
                   dark:border-neutral-700 dark:bg-neutral-800"
        >
            <img
                src="{{ asset('storage/' . $advertisement->image) }}"
                alt="{{ $advertisement->title }}"
                class="max-h-72 w-full rounded-xl object-contain"
            >
        </div>
    </div>
@endif

{{-- Status --}}
<div
    class="flex items-center justify-between gap-4 rounded-2xl
           border border-neutral-200 bg-neutral-50 px-5 py-4
           dark:border-neutral-700 dark:bg-neutral-800/50"
>
    <div>
        <p
            class="text-sm font-semibold
                   text-neutral-900 dark:text-white"
        >
            Active Status
        </p>

        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
            Enable this advertisement to display it on the homepage.
        </p>
    </div>

    <label class="relative inline-flex cursor-pointer items-center">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            class="peer sr-only"
            @checked(
                old(
                    'is_active',
                    $advertisement
                        ? $advertisement->is_active
                        : true
                )
            )
        >

        <span
            class="h-6 w-11 rounded-full bg-neutral-300
                   transition peer-checked:bg-green-600
                   peer-focus:ring-4 peer-focus:ring-green-100
                   after:absolute after:left-[2px] after:top-[2px]
                   after:h-5 after:w-5 after:rounded-full
                   after:bg-white after:transition-all
                   after:content-['']
                   peer-checked:after:translate-x-full
                   dark:bg-neutral-700"
        ></span>
    </label>
</div>

{{-- Submit Button --}}
<div
    class="flex flex-col-reverse gap-3 border-t
           border-neutral-200 pt-6 sm:flex-row
           sm:items-center sm:justify-end dark:border-neutral-700"
>
    <a
        href="{{ route('home-advertisements.index') }}"
        class="inline-flex items-center justify-center rounded-xl
               border border-neutral-200 px-6 py-3 text-sm
               font-semibold text-neutral-700 transition
               hover:bg-neutral-100 dark:border-neutral-700
               dark:text-neutral-300 dark:hover:bg-neutral-800"
    >
        Cancel
    </a>

    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-xl
               bg-black px-6 py-3 text-sm font-semibold text-white
               transition hover:bg-neutral-800
               dark:bg-white dark:text-black"
    >
        {{ $buttonText ?? 'Save Advertisement' }}
    </button>
</div>