<x-layouts::app :title="__('Job Applications')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div>
            <h1 class="text-2xl font-bold">Job Applications</h1>
            <p class="text-sm text-neutral-500">Manage submitted job applications.</p>
        </div>

        @if(session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border bg-white p-5 shadow-sm">
            <form action="{{ route('job-applications.index') }}" method="GET" class="flex flex-col gap-3 md:flex-row">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search name, email, phone..."
                       class="w-full rounded-xl border px-4 py-3 text-sm">

                <select name="status" class="rounded-xl border px-4 py-3 text-sm">
                    <option value="">All Status</option>
                    @foreach(['new','reviewed','shortlisted','rejected'] as $status)
                        <option value="{{ $status }}" @selected(request('status') == $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>

                <button class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
                    Filter
                </button>
            </form>
        </div>

        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">
            <table class="min-w-full divide-y">
                <thead class="bg-neutral-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Candidate</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Job</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($jobApplications as $application)
                        <tr>
                            <td class="px-6 py-4">{{ $application->id }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold">{{ $application->full_name }}</div>
                                <div class="text-xs text-neutral-500">{{ $application->email }}</div>
                                <div class="text-xs text-neutral-500">{{ $application->phone }}</div>
                            </td>
                            <td class="px-6 py-4">{{ $application->jobPosition->title ?? '-' }}</td>
                            <td class="px-6 py-4">{{ ucfirst($application->status) }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('job-applications.show', $application->id) }}"
                                       class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm text-blue-700">
                                        View
                                    </a>

                                    <form action="{{ route('job-applications.destroy', $application->id) }}" method="POST"
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
                            <td colspan="5" class="px-6 py-20 text-center">No Application Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $jobApplications->links() }}

    </div>

</x-layouts::app>