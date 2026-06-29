<x-layouts::app :title="__('Create Store Outlet Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Create Store Outlet Section
                </h1>

                <p class="text-sm text-neutral-500">
                    Add multiple stores / outlets.
                </p>
            </div>

            <a href="{{ route('store-outlet-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('store-outlet-sections.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                @include('store_outlet_sections._form', [
                    'storeOutletSection' => null,
                    'buttonText' => 'Create Store Outlets'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>