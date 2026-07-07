<x-layouts::app :title="__('Hiring Process Steps')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Hiring Process Steps</h1>
                <p class="text-sm text-neutral-500">Manage hiring process.</p>
            </div>

            <a href="{{ route('hiring-process-steps.create') }}"
               class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                + Create Step
            </a>
        </div>

        @if(session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm">
            <table class="min-w-full divide-y">
                <thead class="bg-neutral-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Theme</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($hiringProcessSteps as $step)
                        <tr>
                            <td class="px-6 py-4">{{ $step->id }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold">{{ $step->title }}</div>
                                <div class="text-xs text-neutral-500">{{ $step->description }}</div>
                            </td>
                            <td class="px-6 py-4">{{ $step->theme }}</td>
                            <td class="px-6 py-4">{{ $step->status ? 'Active' : 'Inactive' }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('hiring-process-steps.edit', $step->id) }}"
                                       class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('hiring-process-steps.destroy', $step->id) }}" method="POST"
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
                            <td colspan="5" class="px-6 py-20 text-center">No Step Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $hiringProcessSteps->links() }}

    </div>

</x-layouts::app>