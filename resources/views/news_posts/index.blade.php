<x-layouts::app :title="__('News Posts')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">News Posts</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Manage news, blogs and announcements.</p>
            </div>

            <a href="{{ route('news-posts.create') }}"
               class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white dark:bg-white dark:text-black">
                + Create News
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border bg-white p-5 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('news-posts.index') }}" method="GET" class="grid gap-3 md:grid-cols-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search news..."
                       class="md:col-span-2 w-full rounded-xl border px-4 py-3 text-sm">

                <select name="news_category_id" class="w-full rounded-xl border px-4 py-3 text-sm">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('news_category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <div class="flex gap-3">
                    <button class="rounded-xl bg-black px-6 py-3 text-sm font-semibold text-white">Search</button>

                    @if(request('search') || request('news_category_id'))
                        <a href="{{ route('news-posts.index') }}" class="rounded-xl border px-6 py-3 text-sm font-semibold">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="overflow-hidden rounded-2xl border bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <table class="min-w-full divide-y">
                <thead class="bg-neutral-100 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">News</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($newsPosts as $post)
                        <tr>
                            <td class="px-6 py-4">{{ $post->id }}</td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-16 w-24 overflow-hidden rounded-xl bg-neutral-100">
                                        @if($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                 class="h-full w-full object-cover"
                                                 alt="{{ $post->image_alt }}">
                                        @endif
                                    </div>

                                    <div>
                                        <div class="font-semibold">{{ $post->title }}</div>
                                        <div class="text-xs text-blue-600">{{ $post->small_title }}</div>
                                        <div class="max-w-md truncate text-xs text-neutral-500">{{ $post->excerpt }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">{{ $post->category?->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $post->published_date?->format('d M Y') ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $post->status ? 'Active' : 'Inactive' }}</td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('front.news.show', $post->slug) }}" target="_blank"
                                       class="rounded-xl bg-green-50 px-4 py-2 text-sm text-green-700">
                                        Open
                                    </a>

                                    <a href="{{ route('news-posts.edit', $post) }}"
                                       class="rounded-xl bg-yellow-50 px-4 py-2 text-sm text-yellow-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('news-posts.destroy', $post) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this news?')">
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
                            <td colspan="6" class="px-6 py-20 text-center">No news post found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="border-t px-6 py-4">
                {{ $newsPosts->links() }}
            </div>
        </div>
    </div>

</x-layouts::app>