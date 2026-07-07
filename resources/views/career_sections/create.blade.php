<x-layouts::app :title="__('Create Career Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Create Career Section</h1>

            <a href="{{ route('career-sections.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('career-sections.store') }}" method="POST" class="space-y-6">
                @csrf

                @include('career_sections._form', [
                    'careerSection' => null,
                    'buttonText' => 'Create Section'
                ])
            </form>
        </div>
    </div>

</x-layouts::app>