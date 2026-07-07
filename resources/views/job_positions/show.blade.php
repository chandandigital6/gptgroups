<x-layouts::app :title="__('Job Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">{{ $jobPosition->title }}</h1>
                <p class="text-sm text-neutral-500">{{ $jobPosition->company ?: '-' }}</p>
            </div>

            <a href="{{ route('job-positions.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <div class="text-sm text-neutral-500">Job Type</div>
                    <div class="font-semibold">{{ $jobPosition->job_type }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Location</div>
                    <div class="font-semibold">{{ $jobPosition->location ?: '-' }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Experience</div>
                    <div class="font-semibold">{{ $jobPosition->experience ?: '-' }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Status</div>
                    <div class="font-semibold">{{ $jobPosition->status ? 'Active' : 'Inactive' }}</div>
                </div>
            </div>

            <hr class="my-6">

            <h3 class="font-bold">Short Description</h3>
            <p class="mt-2 text-sm text-neutral-600">{{ $jobPosition->short_description ?: '-' }}</p>

            <h3 class="mt-6 font-bold">Full Description</h3>
            <p class="mt-2 whitespace-pre-line text-sm text-neutral-600">{{ $jobPosition->full_description ?: '-' }}</p>
        </div>

    </div>

</x-layouts::app>