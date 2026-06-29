<x-layouts::app :title="__('Edit Common Split Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Edit Common Split Section
                </h1>

                <p class="text-sm text-neutral-500">
                    Update page-wise common two-column section.
                </p>
            </div>

            <a href="{{ route('common-split-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('common-split-sections.update', $commonSplitSection) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf
                @method('PUT')

                @include('common_split_sections._form', [
                    'commonSplitSection' => $commonSplitSection,
                    'buttonText' => 'Update Section'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>