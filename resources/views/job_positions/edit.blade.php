<x-layouts::app :title="__('Edit Job')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Edit Job
                </h1>
                <p class="text-sm text-neutral-500">Update job position.</p>
            </div>

            <a href="{{ route('job-positions.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('job-positions.update', $jobPosition->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @include('job_positions._form', [
                    'jobPosition' => $jobPosition,
                    'buttonText' => 'Update Job'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>