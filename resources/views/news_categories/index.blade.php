<x-layouts::app :title="__('News Categories')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">News Categories</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Manage unlimited news categories.</p>
            </div>

            <a href="{{ route('news-categories.create') }}"
               class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white dark:bg-white dark:text-black">
                + Create Category
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('news-categories.index') }}" method="GET" class="flex gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search category..."
                       class="w-full rounded-xl border px-4 py-3 text-sm dark:border-neutral-700 dark:bg-neutral-950 dark:text-white">

                <button class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white dark:bg-white dark:text-black">
                    Search
                </button>

                @if(request('search'))
                    <a href="{{ route('news-categories.index') }}" class="rounded-xl border px-6 py-3 text-sm font-semibold">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <table class="min-w-full divide-y">
                <thead class="bg-neutral-100 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Slug</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Posts</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Theme</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($newsCategories as $category)
                        <tr>
                            <td class="px-6 py-4">{{ $category->id }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->slug }}</td>
                            <td class="px-6 py-4">{{ $category->posts_count }}</td>
                            <td class="px-6 py-4">{{ ucfirst($category->theme) }}</td>
                            <td class="px-6 py-4">{{ $category->status ? 'Active' : 'Inactive' }}</td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('news-categories.edit', $category) }}"
                                       class="rounded-xl bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('news-categories.destroy', $category) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this category?')">
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
                            <td colspan="7" class="px-6 py-20 text-center">No category found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="border-t px-6 py-4">
                {{ $newsCategories->links() }}
            </div>
        </div>
    </div>

</x-layouts::app>