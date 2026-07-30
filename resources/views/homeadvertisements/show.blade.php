<x-layouts::app :title="__('Home Advertisement Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div
            class="flex flex-col gap-4
                   md:flex-row md:items-center md:justify-between"
        >
            <div>
                <h1
                    class="text-2xl font-bold
                           text-neutral-900 dark:text-white"
                >
                    Advertisement Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View complete homepage advertisement information.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a
                    href="{{ route(
                        'home-advertisements.edit',
                        $homeAdvertisement
                    ) }}"
                    class="inline-flex items-center justify-center
                           rounded-xl bg-black px-5 py-3 text-sm
                           font-semibold text-white transition
                           hover:bg-neutral-800
                           dark:bg-white dark:text-black"
                >
                    Edit Advertisement
                </a>

                <a
                    href="{{ route('home-advertisements.index') }}"
                    class="inline-flex items-center justify-center
                           rounded-xl border border-neutral-200
                           px-5 py-3 text-sm font-semibold
                           text-neutral-700 transition
                           hover:bg-neutral-100
                           dark:border-neutral-700
                           dark:text-neutral-300
                           dark:hover:bg-neutral-800"
                >
                    Back
                </a>
            </div>
        </div>

        {{-- Advertisement Preview --}}
        <div
            class="overflow-hidden rounded-2xl border
                   border-neutral-200 bg-white shadow-sm
                   dark:border-neutral-700 dark:bg-neutral-900"
        >
            <div class="grid md:grid-cols-[0.85fr_1.15fr]">

                {{-- Content Preview --}}
                <div
                    class="relative flex min-h-[360px]
                           flex-col justify-center overflow-hidden
                           bg-neutral-950 px-8 py-10 text-white"
                >
                    <div
                        class="absolute -right-16 -top-16
                               h-48 w-48 rounded-full
                               bg-blue-500/20 blur-3xl"
                    ></div>

                    <div
                        class="absolute -bottom-16 -left-16
                               h-48 w-48 rounded-full
                               bg-cyan-500/10 blur-3xl"
                    ></div>

                    <div class="relative">
                        @if ($homeAdvertisement->launch_text)
                            <span
                                class="inline-flex items-center gap-2
                                       rounded-full
                                       border border-amber-400/30
                                       bg-amber-400/10 px-3 py-1.5
                                       text-[10px] font-black uppercase
                                       tracking-[0.15em] text-amber-300"
                            >
                                <span
                                    class="h-2 w-2 rounded-full
                                           bg-amber-400"
                                ></span>

                                {{ $homeAdvertisement->launch_text }}
                            </span>
                        @endif

                        @if ($homeAdvertisement->brand)
                            <p
                                class="mt-5 text-xs font-bold uppercase
                                       tracking-[0.18em] text-cyan-300"
                            >
                                {{ $homeAdvertisement->brand }}
                            </p>
                        @endif

                        <h2
                            class="mt-2 text-3xl font-black
                                   leading-tight tracking-tight
                                   sm:text-4xl"
                        >
                            {{ $homeAdvertisement->title }}
                        </h2>

                        @if ($homeAdvertisement->subtitle)
                            <p
                                class="mt-3 text-lg font-bold
                                       text-cyan-300"
                            >
                                {{ $homeAdvertisement->subtitle }}
                            </p>
                        @endif

                        @if ($homeAdvertisement->description)
                            <p
                                class="mt-4 max-w-lg text-sm
                                       leading-7 text-neutral-300"
                            >
                                {{ $homeAdvertisement->description }}
                            </p>
                        @endif

                        @if ($homeAdvertisement->launch_note)
                            <div
                                class="mt-6 border-t
                                       border-white/10 pt-4"
                            >
                                <p
                                    class="text-xs font-semibold
                                           text-neutral-400"
                                >
                                    {{ $homeAdvertisement->launch_note }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Image Preview --}}
                <div
                    class="flex min-h-[360px] items-center
                           justify-center bg-neutral-50 p-5
                           dark:bg-neutral-800"
                >
                    <img
                        src="{{ asset(
                            'storage/' . $homeAdvertisement->image
                        ) }}"
                        alt="{{ $homeAdvertisement->title }}"
                        class="max-h-[440px] w-full rounded-xl object-contain"
                    >
                </div>
            </div>
        </div>

        {{-- Information --}}
        <div class="grid gap-6 lg:grid-cols-3">

            {{-- Main Details --}}
            <div
                class="rounded-2xl border border-neutral-200
                       bg-white p-6 shadow-sm
                       dark:border-neutral-700 dark:bg-neutral-900
                       lg:col-span-2"
            >
                <h2
                    class="text-lg font-bold
                           text-neutral-900 dark:text-white"
                >
                    Advertisement Information
                </h2>

                <div
                    class="mt-6 grid gap-5
                           sm:grid-cols-2"
                >
                    <div>
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            Brand
                        </p>

                        <p
                            class="mt-1 font-semibold
                                   text-neutral-900 dark:text-white"
                        >
                            {{ $homeAdvertisement->brand ?: 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            Launch Text
                        </p>

                        <p
                            class="mt-1 font-semibold
                                   text-neutral-900 dark:text-white"
                        >
                            {{ $homeAdvertisement->launch_text
                                ?: 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            Sort Order
                        </p>

                        <p
                            class="mt-1 font-semibold
                                   text-neutral-900 dark:text-white"
                        >
                            {{ $homeAdvertisement->sort_order ?? 0 }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            Status
                        </p>

                        <div class="mt-2">
                            @if ($homeAdvertisement->is_active)
                                <span
                                    class="rounded-full bg-green-100
                                           px-3 py-1 text-xs font-semibold
                                           text-green-700
                                           dark:bg-green-900/30
                                           dark:text-green-300"
                                >
                                    Active
                                </span>
                            @else
                                <span
                                    class="rounded-full bg-red-100
                                           px-3 py-1 text-xs font-semibold
                                           text-red-700
                                           dark:bg-red-900/30
                                           dark:text-red-300"
                                >
                                    Inactive
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            Start Date
                        </p>

                        <p
                            class="mt-1 font-semibold
                                   text-neutral-900 dark:text-white"
                        >
                            {{ $homeAdvertisement->starts_at
                                ? $homeAdvertisement->starts_at
                                    ->format('d M Y, h:i A')
                                : 'Immediately' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            End Date
                        </p>

                        <p
                            class="mt-1 font-semibold
                                   text-neutral-900 dark:text-white"
                        >
                            {{ $homeAdvertisement->ends_at
                                ? $homeAdvertisement->ends_at
                                    ->format('d M Y, h:i A')
                                : 'No expiry date' }}
                        </p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-xs font-semibold uppercase text-neutral-400">
                            Advertisement Link
                        </p>

                        @if ($homeAdvertisement->link)
                            <a
                                href="{{ $homeAdvertisement->link }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-1 block break-all
                                       font-semibold text-blue-600
                                       hover:underline
                                       dark:text-blue-300"
                            >
                                {{ $homeAdvertisement->link }}
                            </a>
                        @else
                            <p
                                class="mt-1 font-semibold
                                       text-neutral-900 dark:text-white"
                            >
                                No link added
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Management Card --}}
            <div
                class="rounded-2xl border border-neutral-200
                       bg-white p-6 shadow-sm
                       dark:border-neutral-700 dark:bg-neutral-900"
            >
                <h2
                    class="text-lg font-bold
                           text-neutral-900 dark:text-white"
                >
                    Manage Advertisement
                </h2>

                <div class="mt-5 space-y-3">
                    <form
                        action="{{ route(
                            'home-advertisements.toggle-status',
                            $homeAdvertisement
                        ) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex w-full items-center
                                   justify-center rounded-xl
                                   border border-purple-200
                                   bg-purple-50 px-5 py-3
                                   text-sm font-semibold
                                   text-purple-700 transition
                                   hover:bg-purple-100
                                   dark:border-purple-800
                                   dark:bg-purple-900/20
                                   dark:text-purple-300"
                        >
                            {{ $homeAdvertisement->is_active
                                ? 'Disable Advertisement'
                                : 'Enable Advertisement' }}
                        </button>
                    </form>

                    <a
                        href="{{ route(
                            'home-advertisements.edit',
                            $homeAdvertisement
                        ) }}"
                        class="inline-flex w-full items-center
                               justify-center rounded-xl
                               border border-yellow-200
                               bg-yellow-50 px-5 py-3
                               text-sm font-semibold
                               text-yellow-700 transition
                               hover:bg-yellow-100
                               dark:border-yellow-800
                               dark:bg-yellow-900/20
                               dark:text-yellow-300"
                    >
                        Edit Advertisement
                    </a>

                    <form
                        action="{{ route(
                            'home-advertisements.destroy',
                            $homeAdvertisement
                        ) }}"
                        method="POST"
                        onsubmit="return confirm(
                            'Are you sure you want to delete this advertisement?'
                        )"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="inline-flex w-full items-center
                                   justify-center rounded-xl
                                   border border-red-200
                                   bg-red-50 px-5 py-3
                                   text-sm font-semibold
                                   text-red-600 transition
                                   hover:bg-red-100
                                   dark:border-red-800
                                   dark:bg-red-900/20
                                   dark:text-red-300"
                        >
                            Delete Advertisement
                        </button>
                    </form>
                </div>

                <div
                    class="mt-6 border-t border-neutral-200 pt-5
                           dark:border-neutral-700"
                >
                    <p class="text-xs text-neutral-500 dark:text-neutral-400">
                        Created:
                    </p>

                    <p
                        class="mt-1 text-sm font-semibold
                               text-neutral-800 dark:text-neutral-200"
                    >
                        {{ $homeAdvertisement->created_at
                            ? $homeAdvertisement->created_at
                                ->format('d M Y, h:i A')
                            : 'N/A' }}
                    </p>

                    <p
                        class="mt-4 text-xs
                               text-neutral-500 dark:text-neutral-400"
                    >
                        Last updated:
                    </p>

                    <p
                        class="mt-1 text-sm font-semibold
                               text-neutral-800 dark:text-neutral-200"
                    >
                        {{ $homeAdvertisement->updated_at
                            ? $homeAdvertisement->updated_at
                                ->format('d M Y, h:i A')
                            : 'N/A' }}
                    </p>
                </div>
            </div>

        </div>

    </div>

</x-layouts::app>