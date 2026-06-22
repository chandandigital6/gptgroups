@php
    $isEdit = !empty($teamMember);
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

    <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

        <div class="mb-5">
            <h2 class="text-lg font-bold text-neutral-900 dark:text-white">
                Team Member Details
            </h2>

            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Add name, designation, image, description and optional profile link.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Name <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $teamMember->name ?? '') }}"
                       placeholder="Pradeep Tripathi"
                       required
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Designation
                </label>

                <input type="text"
                       name="designation"
                       value="{{ old('designation', $teamMember->designation ?? '') }}"
                       placeholder="Founder | Chairman"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="20+ years telecom experience in the Middle East."
                          class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">{{ old('description', $teamMember->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Profile Link
                </label>

                <input type="text"
                       name="profile_link"
                       value="{{ old('profile_link', $teamMember->profile_link ?? '') }}"
                       placeholder="https://linkedin.com/in/username"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $teamMember->sort_order ?? 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-black dark:border-neutral-700 dark:bg-neutral-950 dark:text-white dark:focus:border-white">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                    Image
                </label>

                <input type="file"
                       name="image"
                       accept="image/*"
                       class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                @if($isEdit && $teamMember->image)
                    <img src="{{ asset('storage/' . $teamMember->image) }}"
                         class="mt-3 h-32 w-full rounded-xl object-cover">
                @endif
            </div>

            <div class="flex items-center">
                <label class="mt-7 inline-flex items-center gap-3">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           @checked(old('status', $teamMember->status ?? 1))
                           class="h-5 w-5 rounded border-neutral-300 text-black focus:ring-black">

                    <span class="text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                        Active Member
                    </span>
                </label>
            </div>

        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
                class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
            {{ $isEdit ? 'Update Team Member' : 'Create Team Member' }}
        </button>
    </div>
</form>