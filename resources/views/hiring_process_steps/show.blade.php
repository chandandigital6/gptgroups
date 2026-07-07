<x-layouts::app :title="__('Hiring Step Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ $hiringProcessStep->title }}</h1>

            <a href="{{ route('hiring-process-steps.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <p><strong>Icon:</strong> {{ $hiringProcessStep->icon_text ?: '-' }}</p>
            <p><strong>Theme:</strong> {{ $hiringProcessStep->theme }}</p>
            <p><strong>Status:</strong> {{ $hiringProcessStep->status ? 'Active' : 'Inactive' }}</p>
            <p class="mt-4 whitespace-pre-line">{{ $hiringProcessStep->description }}</p>
        </div>
    </div>

</x-layouts::app>