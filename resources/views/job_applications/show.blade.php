<x-layouts::app :title="__('Application Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">{{ $jobApplication->full_name }}</h1>
                <p class="text-sm text-neutral-500">{{ $jobApplication->email }}</p>
            </div>

            <a href="{{ route('job-applications.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        @if(session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <div class="text-sm text-neutral-500">Name</div>
                    <div class="font-semibold">{{ $jobApplication->full_name }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Email</div>
                    <div class="font-semibold">{{ $jobApplication->email }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Phone</div>
                    <div class="font-semibold">{{ $jobApplication->phone ?: '-' }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Location</div>
                    <div class="font-semibold">{{ $jobApplication->current_location ?: '-' }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Applied Job</div>
                    <div class="font-semibold">{{ $jobApplication->jobPosition->title ?? '-' }}</div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">CV</div>
                    @if($jobApplication->cv_path)
                        <a href="{{ asset('storage/' . $jobApplication->cv_path) }}" target="_blank" class="text-blue-600 font-semibold">
                            View CV
                        </a>
                    @else
                        <div class="font-semibold">-</div>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <form action="{{ route('job-applications.update', $jobApplication->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="mb-2 block text-sm font-semibold">Status</label>

                    <div class="flex gap-2">
                        <select name="status" class="rounded-xl border px-4 py-3 text-sm">
                            @foreach(['new','reviewed','shortlisted','rejected'] as $status)
                                <option value="{{ $status }}" @selected($jobApplication->status == $status)>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>

                        <button class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-6">
                <div class="text-sm text-neutral-500">Message</div>
                <div class="mt-2 whitespace-pre-line text-sm">{{ $jobApplication->message ?: '-' }}</div>
            </div>
        </div>

    </div>

</x-layouts::app>