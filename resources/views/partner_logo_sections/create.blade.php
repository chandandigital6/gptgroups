<x-layouts::app :title="__('Create Partner Logo Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Create Partner Logo Section</h1>
                <p class="text-sm text-neutral-500">Add heading and partner logos.</p>
            </div>

            <a href="{{ route('partner-logo-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('partner-logo-sections.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                @include('partner_logo_sections._form', [
                    'section' => null,
                    'buttonText' => 'Create Partner Logo Section'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>