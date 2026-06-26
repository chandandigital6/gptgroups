<x-layouts::app :title="__('Testimonial Sections')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900">
                    Testimonial Sections
                </h1>
                <p class="text-sm text-neutral-500">
                    Manage testimonial slider section.
                </p>
            </div>

            <a href="{{ route('testimonial-sections.create') }}"
               class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                + Create Testimonial Section
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-4 md:grid-cols-4">
            <div class="rounded-2xl border bg-white p-5 shadow-sm">
                <div class="text-sm text-neutral-500">Total Sections</div>
                <div class="mt-2 text-3xl font-bold">{{ \App\Models\TestimonialSection::count() }}</div>
            </div>

            <div class="rounded-2xl border bg-white p-5 shadow-sm">
                <div class="text-sm text-neutral-500">Active</div>
                <div class="mt-2 text-3xl font-bold">{{ \App\Models\TestimonialSection::where('status', 1)->count() }}</div>
            </div>

            <div class="rounded-2xl border bg-white p-5 shadow-sm">
                <div class="text-sm text-neutral-500">Testimonials</div>
                <div class="mt-2 text-3xl font-bold">{{ \App\Models\Testimonial::count() }}</div>
            </div>

            <div class="rounded-2xl border bg-white p-5 shadow-sm">
                <div class="text-sm text-neutral-500">Latest</div>
                <div class="mt-2 text-3xl font-bold">{{ optional(\App\Models\TestimonialSection::latest()->first())->id ?? 0 }}</div>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-5 shadow-sm">
            <form action="{{ route('testimonial-sections.index') }}" method="GET" class="flex gap-3">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search..."
                       class="w-full rounded-xl border px-4 py-3 text-sm">

                <button type="submit" class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">
                    Search
                </button>

                @if(request('search'))
                    <a href="{{ route('testimonial-sections.index') }}"
                       class="rounded-xl border px-6 py-3 text-sm font-semibold">
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
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Section</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Testimonials</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse($testimonialSections as $section)
                            <tr>
                                <td class="px-6 py-4">{{ $section->id }}</td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold">{{ $section->title }}</div>
                                    <div class="text-xs text-blue-600">{{ $section->label }}</div>
                                    <div class="max-w-md truncate text-xs text-neutral-500">{{ $section->description }}</div>
                                </td>

                                <td class="px-6 py-4 font-semibold">
                                    {{ $section->testimonials_count }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $section->sort_order }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($section->status)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700">Active</span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs text-red-700">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('testimonial-sections.show', $section) }}"
                                           class="rounded-xl bg-blue-50 px-4 py-2 text-sm text-blue-600">
                                            View
                                        </a>

                                        <a href="{{ route('testimonial-sections.edit', $section) }}"
                                           class="rounded-xl bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                            Edit
                                        </a>

                                        <form action="{{ route('testimonial-sections.destroy', $section) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this section?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="rounded-xl bg-red-50 px-4 py-2 text-sm text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-20 text-center">
                                    No Testimonial Section Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t px-6 py-4">
                {{ $testimonialSections->links() }}
            </div>
        </div>
    </div>

</x-layouts::app>