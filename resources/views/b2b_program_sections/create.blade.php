<x-layouts::app :title="__('Create B2B Program Section')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Create B2B Program Section</h1>
                <p class="text-sm text-neutral-500">Add B2B program content.</p>
            </div>

            <a href="{{ route('b2b-program-sections.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('b2b-program-sections.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                @include('b2b_program_sections._form', [
                    'b2bProgramSection' => null,
                    'buttonText' => 'Create B2B Program'
                ])
            </form>
        </div>
    </div>
</x-layouts::app>