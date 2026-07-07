<x-layouts::app :title="__('Career Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ $careerSection->title ?: 'Career Section' }}</h1>

            <a href="{{ route('career-sections.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <p><strong>Key:</strong> {{ $careerSection->section_key }}</p>
            <p><strong>Label:</strong> {{ $careerSection->label }}</p>
            <p><strong>Title:</strong> {{ $careerSection->title }}</p>
            <p><strong>Status:</strong> {{ $careerSection->status ? 'Active' : 'Inactive' }}</p>
            <p class="mt-4 whitespace-pre-line">{{ $careerSection->description }}</p>
        </div>
    </div>

</x-layouts::app>