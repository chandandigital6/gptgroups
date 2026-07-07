<x-layouts::app :title="__('Career Sections')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Career Sections</h1>
                <p class="text-sm text-neutral-500">Manage career page headings.</p>
            </div>

            <a href="{{ route('career-sections.create') }}"
               class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                + Create Section
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
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Key</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($careerSections as $section)
                        <tr>
                            <td class="px-6 py-4">{{ $section->id }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold">{{ $section->title ?: '-' }}</div>
                                <div class="text-xs text-neutral-500">{{ $section->label ?: '-' }}</div>
                            </td>
                            <td class="px-6 py-4">{{ $section->section_key }}</td>
                            <td class="px-6 py-4">{{ $section->status ? 'Active' : 'Inactive' }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('career-sections.edit', $section->id) }}"
                                       class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('career-sections.destroy', $section->id) }}" method="POST"
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
                            <td colspan="5" class="px-6 py-20 text-center">No Section Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $careerSections->links() }}

    </div>

</x-layouts::app>