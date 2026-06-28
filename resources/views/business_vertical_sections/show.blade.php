<x-layouts::app :title="__('Business Vertical Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold">
                    Business Vertical Section Details
                </h1>

                <p class="text-sm text-neutral-500">
                    View business vertical section and cards.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('business-vertical-sections.edit', $businessVerticalSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('business-vertical-sections.index') }}"
                   class="rounded-xl border px-5 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">
                    {{ $businessVerticalSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 sm:text-5xl lg:text-6xl">
                    {{ $businessVerticalSection->title }}
                </h2>

                <p class="mt-5 text-lg leading-8 text-slate-600">
                    {{ $businessVerticalSection->description }}
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($businessVerticalSection->items as $item)
                    <div class="overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                        <div class="relative h-60 overflow-hidden">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                     alt="{{ $item->image_alt ?: $item->title }}"
                                     class="h-full w-full object-cover">
                            @endif

                            @if($item->badge_text)
                                <span class="absolute left-5 top-5 rounded-full bg-blue-600 px-4 py-2 text-xs font-black text-white">
                                    {{ $item->badge_text }}
                                </span>
                            @endif
                        </div>

                        <div class="p-7">
                            <h3 class="text-2xl font-black text-slate-950">
                                {{ $item->title }}
                            </h3>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ $item->description }}
                            </p>

                            @if($item->tags)
                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach($item->tagList() as $tag)
                                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>