<x-layouts::app :title="__('Create News Post')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Create News Post</h1>
                <p class="text-sm text-neutral-500">Add news or blog details.</p>
            </div>

            <a href="{{ route('news-posts.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">Back</a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('news-posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @include('news_posts._form', ['newsPost' => null, 'categories' => $categories, 'buttonText' => 'Create News'])
            </form>
        </div>
    </div>
</x-layouts::app>