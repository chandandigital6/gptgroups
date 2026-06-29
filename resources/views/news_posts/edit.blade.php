<x-layouts::app :title="__('Edit News Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Edit News Post</h1>
                <p class="text-sm text-neutral-500">Update news or blog details.</p>
            </div>

            <a href="{{ route('news-posts.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">Back</a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('news-posts.update', $newsPost) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                @include('news_posts._form', ['newsPost' => $newsPost, 'categories' => $categories, 'buttonText' => 'Update News'])
            </form>
        </div>
    </div>
</x-layouts::app>