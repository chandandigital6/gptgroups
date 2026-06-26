<x-layouts::app :title="__('FAQ Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    FAQ Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View FAQ section and questions.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('faq-sections.edit', $faqSection->id) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('faq-sections.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <div class="text-sm text-neutral-500">Page</div>
                    <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                        {{ \Illuminate\Support\Str::headline($faqSection->page_slug) }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Status</div>
                    <div class="mt-1">
                        @if($faqSection->status)
                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                Active
                            </span>
                        @else
                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                Inactive
                            </span>
                        @endif
                    </div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Label</div>
                    <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                        {{ $faqSection->label ?: '-' }}
                    </div>
                </div>

                <div>
                    <div class="text-sm text-neutral-500">Sort Order</div>
                    <div class="mt-1 font-semibold text-neutral-900 dark:text-white">
                        {{ $faqSection->sort_order }}
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="text-sm text-neutral-500">Title</div>
                <h2 class="mt-1 text-xl font-bold text-neutral-900 dark:text-white">
                    {{ $faqSection->title }}
                </h2>
            </div>

            <div class="mt-6">
                <div class="text-sm text-neutral-500">Description</div>
                <p class="mt-1 text-neutral-700 dark:text-neutral-300">
                    {{ $faqSection->description ?: '-' }}
                </p>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <h2 class="mb-5 text-lg font-bold text-neutral-900 dark:text-white">
                FAQ Questions
            </h2>

            <div class="space-y-4">
                @forelse($faqSection->items as $item)
                    <div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
                        <h3 class="font-bold text-neutral-900 dark:text-white">
                            {{ $item->question }}
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-neutral-600 dark:text-neutral-300">
                            {{ $item->answer ?: '-' }}
                        </p>
                    </div>
                @empty
                    <div class="rounded-2xl border border-neutral-200 bg-neutral-50 p-8 text-center text-sm text-neutral-500">
                        No FAQ questions added.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</x-layouts::app>