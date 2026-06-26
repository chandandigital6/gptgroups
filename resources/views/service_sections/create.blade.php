<x-layouts::app :title="__('Create Service Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Create Service Section
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Add services section heading and service cards.
                </p>
            </div>

            <a href="{{ route('service-sections.index') }}"
               class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                Back
            </a>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('service-sections.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                @include('service_sections._form', [
                    'serviceSection' => null,
                    'buttonText' => 'Create Service Section'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>