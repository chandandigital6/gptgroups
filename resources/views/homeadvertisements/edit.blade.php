<x-layouts::app :title="__('Edit Home Advertisement')">

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
                    Edit Home Advertisement
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Update advertisement content, image and visibility.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a
                    href="{{ route(
                        'home-advertisements.show',
                        $homeAdvertisement
                    ) }}"
                    class="inline-flex items-center justify-center
                           rounded-xl border border-blue-200
                           bg-blue-50 px-5 py-3 text-sm font-semibold
                           text-blue-700 transition hover:bg-blue-100
                           dark:border-blue-800 dark:bg-blue-900/20
                           dark:text-blue-300"
                >
                    View
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

        {{-- Form Card --}}
        <div
            class="rounded-2xl border border-neutral-200
                   bg-white p-6 shadow-sm
                   dark:border-neutral-700 dark:bg-neutral-900"
        >
            <form
                action="{{ route(
                    'home-advertisements.update',
                    $homeAdvertisement
                ) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >
                @csrf
                @method('PUT')

                @include('homeadvertisements._form', [
                    'homeAdvertisement' => $homeAdvertisement,
                    'buttonText' => 'Update Advertisement',
                ])
            </form>
        </div>

    </div>

</x-layouts::app>