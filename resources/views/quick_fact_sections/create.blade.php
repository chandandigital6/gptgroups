<x-layouts::app :title="__('Create Quick Fact Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Create Quick Fact Section
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Add page-wise quick facts.
                </p>
            </div>

            <a href="{{ route('quick-fact-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('quick-fact-sections.store') }}"
                  method="POST"
                  class="space-y-6">
                @csrf

                @include('quick_fact_sections._form', [
                    'quickFactSection' => null,
                    'buttonText' => 'Create Quick Facts'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>