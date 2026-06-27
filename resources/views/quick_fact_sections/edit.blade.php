<x-layouts::app :title="__('Edit Quick Fact Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Edit Quick Fact Section
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Update page-wise quick facts.
                </p>
            </div>

            <a href="{{ route('quick-fact-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('quick-fact-sections.update', $quickFactSection) }}"
                  method="POST"
                  class="space-y-6">
                @csrf
                @method('PUT')

                @include('quick_fact_sections._form', [
                    'quickFactSection' => $quickFactSection,
                    'buttonText' => 'Update Quick Facts'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>