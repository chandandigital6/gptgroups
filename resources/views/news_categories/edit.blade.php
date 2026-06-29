<x-layouts::app :title="__('Edit News Category')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Edit News Category</h1>
                <p class="text-sm text-neutral-500">Update category.</p>
            </div>

            <a href="{{ route('news-categories.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">Back</a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('news-categories.update', $newsCategory) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                @include('news_categories._form', ['category' => $newsCategory, 'buttonText' => 'Update Category'])
            </form>
        </div>
    </div>
</x-layouts::app>