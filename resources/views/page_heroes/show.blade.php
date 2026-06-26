<x-layouts::app :title="__('Page Hero Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Page Hero Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View page hero details.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('page-heroes.edit', $pageHero) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('page-heroes.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <section class="relative overflow-hidden service-soft-bg rounded-[2.5rem]">
                <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
                    <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                        <div>
                            <div class="inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-5 py-2 text-sm font-black text-blue-700 shadow-sm">
                                <span class="h-2.5 w-2.5 rounded-full bg-cyan-400"></span>
                                {{ $pageHero->badge_text }}
                            </div>

                            <h1 class="mt-7 text-5xl font-black leading-[.95] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                                {{ $pageHero->title_line_1 }}

                                @if($pageHero->title_line_2)
                                    <span class="mt-2 block service-gradient-text">
                                        {{ $pageHero->title_line_2 }}
                                    </span>
                                @endif
                            </h1>

                            <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-600 sm:text-xl">
                                {{ $pageHero->description }}
                            </p>
                        </div>

                        <div class="relative">
                            <div class="relative overflow-hidden rounded-[2.75rem] border border-white bg-white/85 p-4 shadow-2xl ring-1 ring-cyan-100 backdrop-blur-xl">
                                @if($pageHero->image)
                                    <img src="{{ asset('storage/' . $pageHero->image) }}"
                                         alt="{{ $pageHero->image_alt }}"
                                         class="h-[330px] w-full rounded-[2.2rem] object-cover sm:h-[430px] lg:h-[500px]">
                                @endif

                                <div class="mt-5 rounded-[1.75rem] border border-slate-100 bg-white p-6 shadow-lg">
                                    <p class="text-2xl font-black leading-tight text-slate-950">
                                        {{ $pageHero->card_title }}
                                    </p>

                                    <p class="mt-2 text-base font-semibold leading-7 text-slate-600">
                                        {{ $pageHero->card_description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </div>

</x-layouts::app>