<x-layouts::app :title="__('Store Outlet Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Store Outlet Section Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View section information and linked outlets.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('store-outlet-sections.index') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700 transition hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800">
                    Back
                </a>

                <a href="{{ route('store-outlet-sections.edit', $storeOutletSection->id) }}"
                   class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                    Edit Section
                </a>
            </div>
        </div>

        {{-- Success --}}
        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Main Info --}}
        <div class="grid gap-6 lg:grid-cols-3">

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 lg:col-span-2">
                <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[.25em] text-blue-600">
                            {{ $storeOutletSection->label ?: 'Store Outlets' }}
                        </p>

                        <h2 class="mt-3 text-3xl font-black text-neutral-950 dark:text-white">
                            {{ $storeOutletSection->title ?: 'Store Outlet Section' }}
                        </h2>

                        @if(!empty($storeOutletSection->description))
                            <p class="mt-4 text-sm leading-7 text-neutral-600 dark:text-neutral-300">
                                {{ $storeOutletSection->description }}
                            </p>
                        @endif
                    </div>

                    @if((int) $storeOutletSection->status === 1)
                        <span class="w-fit rounded-full bg-green-100 px-4 py-2 text-xs font-bold text-green-700 dark:bg-green-900/30 dark:text-green-300">
                            Active
                        </span>
                    @else
                        <span class="w-fit rounded-full bg-red-100 px-4 py-2 text-xs font-bold text-red-700 dark:bg-red-900/30 dark:text-red-300">
                            Inactive
                        </span>
                    @endif
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-neutral-100 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
                        <div class="text-xs font-semibold uppercase text-neutral-500 dark:text-neutral-400">
                            Page Slug
                        </div>

                        <div class="mt-2 text-sm font-bold text-neutral-900 dark:text-white">
                            {{ $storeOutletSection->page_slug ?: '-' }}
                        </div>
                    </div>

                    <div class="rounded-2xl border border-neutral-100 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
                        <div class="text-xs font-semibold uppercase text-neutral-500 dark:text-neutral-400">
                            Sort Order
                        </div>

                        <div class="mt-2 text-sm font-bold text-neutral-900 dark:text-white">
                            {{ $storeOutletSection->sort_order ?? 0 }}
                        </div>
                    </div>

                    <div class="rounded-2xl border border-neutral-100 bg-neutral-50 p-5 dark:border-neutral-700 dark:bg-neutral-950">
                        <div class="text-xs font-semibold uppercase text-neutral-500 dark:text-neutral-400">
                            Total Outlets
                        </div>

                        <div class="mt-2 text-sm font-bold text-neutral-900 dark:text-white">
                            {{ $storeOutletSection->outlets_count ?? $storeOutletSection->outlets?->count() ?? 0 }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Side Card --}}
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="text-lg font-black text-neutral-950 dark:text-white">
                    Quick Actions
                </h3>

                <div class="mt-5 grid gap-3">
                    <a href="{{ route('store-outlet-sections.edit', $storeOutletSection->id) }}"
                       class="inline-flex items-center justify-center rounded-xl border border-yellow-200 bg-yellow-50 px-5 py-3 text-sm font-semibold text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300">
                        Edit
                    </a>

                    <form action="{{ route('store-outlet-sections.destroy', $storeOutletSection->id) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this store outlet section?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="w-full rounded-xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
                            Delete
                        </button>
                    </form>
                </div>

                <div class="mt-6 border-t border-neutral-200 pt-5 text-xs text-neutral-500 dark:border-neutral-700 dark:text-neutral-400">
                    <div>
                        Created:
                        <span class="font-semibold text-neutral-700 dark:text-neutral-300">
                            {{ optional($storeOutletSection->created_at)->format('d M Y, h:i A') }}
                        </span>
                    </div>

                    <div class="mt-2">
                        Updated:
                        <span class="font-semibold text-neutral-700 dark:text-neutral-300">
                            {{ optional($storeOutletSection->updated_at)->format('d M Y, h:i A') }}
                        </span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Outlets --}}
        <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="border-b border-neutral-200 px-6 py-5 dark:border-neutral-700">
                <h2 class="text-xl font-black text-neutral-950 dark:text-white">
                    Store Outlets
                </h2>

                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    Outlets linked with this section.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                    <thead class="bg-neutral-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Outlet
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Location
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Contact
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($storeOutletSection->outlets ?? [] as $outlet)
                            <tr class="transition hover:bg-neutral-50 dark:hover:bg-neutral-800/60">
                                <td class="px-6 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                    {{ $outlet->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-neutral-900 dark:text-white">
                                        {{ $outlet->name ?? $outlet->title ?? 'Outlet' }}
                                    </div>

                                    @if(!empty($outlet->type))
                                        <div class="mt-1 text-xs text-blue-600 dark:text-blue-300">
                                            {{ $outlet->type }}
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-300">
                                    {{ $outlet->location ?? $outlet->address ?? $outlet->city ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-300">
                                    <div>{{ $outlet->phone ?? $outlet->mobile ?? '-' }}</div>

                                    @if(!empty($outlet->email))
                                        <div class="mt-1 text-xs text-neutral-400">
                                            {{ $outlet->email }}
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    @if((int) ($outlet->status ?? 1) === 1)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                            Active
                                        </span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-900/30 dark:text-red-300">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <h3 class="text-lg font-semibold text-neutral-800 dark:text-white">
                                        No Outlets Found
                                    </h3>

                                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                                        Add outlets for this section.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</x-layouts::app>