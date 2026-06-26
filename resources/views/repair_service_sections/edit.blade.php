<x-layouts::app :title="__('Edit Repair Service Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Edit Repair Service Section
                </h1>

                <p class="text-sm text-neutral-500">
                    Update repair services heading and cards.
                </p>
            </div>

            <a href="{{ route('repair-service-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('repair-service-sections.update', $repairServiceSection) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf
                @method('PUT')

                @include('repair_service_sections._form', [
                    'repairServiceSection' => $repairServiceSection,
                    'buttonText' => 'Update Repair Section'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>