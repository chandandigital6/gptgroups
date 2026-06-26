<x-layouts::app :title="__('Service Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Service Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View services section and cards.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('service-sections.edit', $serviceSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('service-sections.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $serviceSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 dark:text-white sm:text-5xl lg:text-6xl">
                    {{ $serviceSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600 dark:text-neutral-300">
                    {{ $serviceSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach($serviceSection->items as $item)
                    <div class="overflow-hidden rounded-[2.5rem] border border-neutral-200 dark:border-neutral-700">
                        @if($item->image)
                            <img class="h-72 w-full object-cover"
                                 src="{{ asset('storage/' . $item->image) }}"
                                 alt="{{ $item->image_alt ?: $item->title }}">
                        @endif

                        <div class="p-8">
                            <p class="font-black uppercase tracking-[.25em] text-blue-700">
                                {{ $item->label }}
                            </p>

                            <h3 class="mt-4 text-3xl font-black text-slate-950 dark:text-white">
                                {{ $item->title }}
                            </h3>

                            <p class="mt-3 leading-7 text-slate-600 dark:text-neutral-300">
                                {{ $item->description }}
                            </p>

                            @if($item->button_link)
                                <p class="mt-3 text-sm text-blue-600">
                                    {{ $item->button_link }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>