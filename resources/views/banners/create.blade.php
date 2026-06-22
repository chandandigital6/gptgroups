<x-layouts::app :title="__('Create Banner')">

    @php
        $team = request()->route('current_team');

        $backRoute = $team
            ? route('banners.index', $team)
            : route('banners.index');

        $formAction = $team
            ? route('banners.store', $team)
            : route('banners.store');
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Create Banner
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Add a new homepage banner with images, text and links.
                </p>
            </div>

            <a href="{{ $backRoute }}"
               class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                Back
            </a>
        </div>

        @include('banners.form', [
            'banner' => null,
            'formAction' => $formAction,
            'method' => 'POST',
        ])

    </div>

</x-layouts::app>