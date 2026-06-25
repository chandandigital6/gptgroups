<x-layouts::app :title="__('Create Retail Outlet Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Create Retail Outlet Section
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Add retail outlet content, cards, button and images.
                </p>
            </div>

            <a href="{{ route('retail-outlet-sections.index') }}"
               class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                Back
            </a>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('retail-outlet-sections.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                @include('retail_outlet_sections._form', [
                    'retailOutletSection' => null,
                    'buttonText' => 'Create Retail Outlet Section'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>