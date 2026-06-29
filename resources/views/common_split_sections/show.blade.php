<x-layouts::app :title="__('Common Split Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Common Split Section Details</h1>
                <p class="text-sm text-neutral-500">View common split section.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('common-split-sections.edit', $commonSplitSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('common-split-sections.index') }}"
                   class="rounded-xl border px-5 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>
        </div>

        @include('front.sections.common-split-section', [
            'pageSlug' => $commonSplitSection->page_slug,
            'sectionKey' => $commonSplitSection->section_key
        ])

    </div>

</x-layouts::app>