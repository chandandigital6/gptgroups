<x-layouts::app :title="__('Job Positions')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Job Positions</h1>
                <p class="text-sm text-neutral-500">Manage all jobs.</p>
            </div>

            <a href="{{ route('job-positions.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                + Create Job
            </a>
        </div>

        @if(session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border bg-white p-5 shadow-sm">
            <form action="{{ route('job-positions.index') }}" method="GET" class="flex flex-col gap-3 md:flex-row">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search job..."
                       class="w-full rounded-xl border px-4 py-3 text-sm">

                <button class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
                    Search
                </button>

                @if(request('search'))
                    <a href="{{ route('job-positions.index') }}" class="rounded-xl border px-6 py-3 text-center text-sm font-semibold">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y">
                    <thead class="bg-neutral-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">#</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Job</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Type</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Location</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Applications</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($jobPositions as $job)
                            <tr>
                                <td class="px-6 py-4 text-sm">{{ $job->id }}</td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold">{{ $job->title }}</div>
                                    <div class="text-xs text-neutral-500">{{ $job->company ?: '-' }}</div>
                                </td>

                                <td class="px-6 py-4 text-sm">{{ $job->job_type }}</td>
                                <td class="px-6 py-4 text-sm">{{ $job->location ?: '-' }}</td>
                                <td class="px-6 py-4 text-sm">{{ $job->applications_count ?? 0 }}</td>

                                <td class="px-6 py-4">
                                    @if($job->status)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Active</span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('job-positions.show', $job->id) }}"
                                           class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm text-blue-700">
                                            View
                                        </a>

                                        <a href="{{ route('job-positions.edit', $job->id) }}"
                                           class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                            Edit
                                        </a>

                                        <form action="{{ route('job-positions.destroy', $job->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-sm text-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    No Job Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{ $jobPositions->links() }}

    </div>

</x-layouts::app>