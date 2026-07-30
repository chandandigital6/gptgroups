<x-layouts::app :title="__('Home Advertisements')">

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
                    Home Advertisements
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage homepage advertisements and product promotions.
                </p>
            </div>

            <a
                href="{{ route('home-advertisements.create') }}"
                class="inline-flex items-center justify-center
                       rounded-xl bg-black px-5 py-3 text-sm
                       font-semibold text-white transition
                       hover:bg-neutral-800
                       dark:bg-white dark:text-black"
            >
                + Create Advertisement
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div
                class="rounded-2xl border border-green-200
                       bg-green-50 px-5 py-4 text-sm font-semibold
                       text-green-700 dark:border-green-800
                       dark:bg-green-900/20 dark:text-green-300"
            >
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats --}}
        <div
            style="
                display:grid;
                grid-template-columns:repeat(
                    auto-fit,
                    minmax(180px, 1fr)
                );
                gap:16px;
            "
        >
            <div
                class="rounded-2xl border border-neutral-200
                       bg-white p-5 shadow-sm
                       dark:border-neutral-700 dark:bg-neutral-900"
            >
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Total Advertisements
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['total'] ?? $advertisements->total() }}
                </div>
            </div>

            <div
                class="rounded-2xl border border-neutral-200
                       bg-white p-5 shadow-sm
                       dark:border-neutral-700 dark:bg-neutral-900"
            >
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Active
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['active'] ?? 0 }}
                </div>
            </div>

            <div
                class="rounded-2xl border border-neutral-200
                       bg-white p-5 shadow-sm
                       dark:border-neutral-700 dark:bg-neutral-900"
            >
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Inactive
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['inactive'] ?? 0 }}
                </div>
            </div>

            <div
                class="rounded-2xl border border-neutral-200
                       bg-white p-5 shadow-sm
                       dark:border-neutral-700 dark:bg-neutral-900"
            >
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    Currently Running
                </div>

                <div class="mt-2 text-3xl font-bold text-black dark:text-white">
                    {{ $stats['running'] ?? 0 }}
                </div>
            </div>
        </div>

        {{-- Search --}}
        <div
            class="rounded-2xl border border-neutral-200
                   bg-white p-5 shadow-sm
                   dark:border-neutral-700 dark:bg-neutral-900"
        >
            <form
                action="{{ route('home-advertisements.index') }}"
                method="GET"
                class="flex flex-col gap-3
                       md:flex-row md:items-center"
            >
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by brand, title or launch text..."
                    class="w-full rounded-xl border border-neutral-200
                           bg-white px-4 py-3 text-sm text-neutral-900
                           outline-none transition focus:border-black
                           dark:border-neutral-700 dark:bg-neutral-950
                           dark:text-white dark:focus:border-white"
                >

                <select
                    name="status"
                    class="rounded-xl border border-neutral-200
                           bg-white px-4 py-3 text-sm text-neutral-900
                           outline-none transition focus:border-black
                           dark:border-neutral-700 dark:bg-neutral-950
                           dark:text-white dark:focus:border-white"
                >
                    <option value="">All Status</option>

                    <option
                        value="active"
                        @selected(request('status') === 'active')
                    >
                        Active
                    </option>

                    <option
                        value="inactive"
                        @selected(request('status') === 'inactive')
                    >
                        Inactive
                    </option>
                </select>

                <button
                    type="submit"
                    class="rounded-xl bg-black px-6 py-3
                           text-sm font-semibold text-white transition
                           hover:bg-neutral-800
                           dark:bg-white dark:text-black"
                >
                    Search
                </button>

                @if (request('search') || request('status'))
                    <a
                        href="{{ route('home-advertisements.index') }}"
                        class="rounded-xl border border-neutral-200
                               px-6 py-3 text-center text-sm
                               font-semibold text-neutral-700 transition
                               hover:bg-neutral-100
                               dark:border-neutral-700
                               dark:text-neutral-300
                               dark:hover:bg-neutral-800"
                    >
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div
            class="relative h-full flex-1 overflow-hidden
                   rounded-2xl border border-neutral-200
                   bg-white shadow-sm
                   dark:border-neutral-700 dark:bg-neutral-900"
        >
            <div class="overflow-x-auto">
                <table
                    class="min-w-full divide-y divide-neutral-200
                           dark:divide-neutral-700"
                >
                    <thead class="bg-neutral-100 dark:bg-neutral-800">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                #
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                Advertisement
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                Launch
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                Schedule
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                Order
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                Status
                            </th>

                            <th
                                class="px-6 py-4 text-right text-xs
                                       font-semibold uppercase tracking-wider
                                       text-neutral-600 dark:text-neutral-300"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody
                        class="divide-y divide-neutral-200
                               dark:divide-neutral-700"
                    >
                        @forelse ($advertisements as $advertisement)

                            <tr
                                class="transition hover:bg-neutral-50
                                       dark:hover:bg-neutral-800/60"
                            >
                                <td
                                    class="px-6 py-4 text-sm
                                           text-neutral-700
                                           dark:text-neutral-300"
                                >
                                    {{ $advertisement->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex min-w-[300px] items-center gap-4">

                                        <div
                                            class="h-16 w-24 shrink-0
                                                   overflow-hidden rounded-xl
                                                   border border-neutral-200
                                                   bg-neutral-100
                                                   dark:border-neutral-700
                                                   dark:bg-neutral-800"
                                        >
                                            <img
                                                src="{{ asset(
                                                    'storage/' .
                                                    $advertisement->image
                                                ) }}"
                                                alt="{{ $advertisement->title }}"
                                                class="h-full w-full object-contain"
                                            >
                                        </div>

                                        <div class="min-w-0">
                                            <div
                                                class="font-semibold
                                                       text-neutral-900
                                                       dark:text-white"
                                            >
                                                {{ $advertisement->title }}
                                            </div>

                                            @if ($advertisement->brand)
                                                <div
                                                    class="mt-1 text-xs
                                                           font-semibold
                                                           text-blue-600
                                                           dark:text-blue-300"
                                                >
                                                    {{ $advertisement->brand }}
                                                </div>
                                            @endif

                                            @if ($advertisement->subtitle)
                                                <div
                                                    class="mt-1 max-w-xs
                                                           truncate text-xs
                                                           text-neutral-400"
                                                >
                                                    {{ $advertisement->subtitle }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full
                                               bg-amber-100 px-3 py-1
                                               text-xs font-semibold
                                               text-amber-700
                                               dark:bg-amber-900/30
                                               dark:text-amber-300"
                                    >
                                        {{ $advertisement->launch_text
                                            ?: 'Coming Soon' }}
                                    </span>
                                </td>

                                <td
                                    class="px-6 py-4 text-xs
                                           text-neutral-600
                                           dark:text-neutral-300"
                                >
                                    <div>
                                        <span class="font-semibold">
                                            Start:
                                        </span>

                                        {{ $advertisement->starts_at
                                            ? $advertisement->starts_at
                                                ->format('d M Y, h:i A')
                                            : 'Immediately' }}
                                    </div>

                                    <div class="mt-1">
                                        <span class="font-semibold">
                                            End:
                                        </span>

                                        {{ $advertisement->ends_at
                                            ? $advertisement->ends_at
                                                ->format('d M Y, h:i A')
                                            : 'No expiry' }}
                                    </div>
                                </td>

                                <td
                                    class="px-6 py-4 text-sm font-semibold
                                           text-neutral-800
                                           dark:text-neutral-200"
                                >
                                    {{ $advertisement->sort_order ?? 0 }}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($advertisement->is_active)
                                        <span
                                            class="rounded-full bg-green-100
                                                   px-3 py-1 text-xs
                                                   font-medium text-green-700
                                                   dark:bg-green-900/30
                                                   dark:text-green-300"
                                        >
                                            Active
                                        </span>
                                    @else
                                        <span
                                            class="rounded-full bg-red-100
                                                   px-3 py-1 text-xs
                                                   font-medium text-red-700
                                                   dark:bg-red-900/30
                                                   dark:text-red-300"
                                        >
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td
                                    class="whitespace-nowrap
                                           px-6 py-4 text-right"
                                >
                                    <div
                                        class="flex items-center
                                               justify-end gap-2"
                                    >
                                        <a
                                            href="{{ route(
                                                'home-advertisements.show',
                                                $advertisement
                                            ) }}"
                                            class="inline-flex items-center
                                                   justify-center rounded-xl
                                                   border border-blue-200
                                                   bg-blue-50 px-4 py-2
                                                   text-sm font-medium
                                                   text-blue-600 transition
                                                   hover:bg-blue-100
                                                   dark:border-blue-800
                                                   dark:bg-blue-900/20
                                                   dark:text-blue-300"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route(
                                                'home-advertisements.edit',
                                                $advertisement
                                            ) }}"
                                            class="inline-flex items-center
                                                   justify-center rounded-xl
                                                   border border-yellow-200
                                                   bg-yellow-50 px-4 py-2
                                                   text-sm font-medium
                                                   text-yellow-700 transition
                                                   hover:bg-yellow-100
                                                   dark:border-yellow-800
                                                   dark:bg-yellow-900/20
                                                   dark:text-yellow-300"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route(
                                                'home-advertisements.toggle-status',
                                                $advertisement
                                            ) }}"
                                            method="POST"
                                            class="inline-block"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center
                                                       justify-center rounded-xl
                                                       border border-purple-200
                                                       bg-purple-50 px-4 py-2
                                                       text-sm font-medium
                                                       text-purple-700
                                                       transition
                                                       hover:bg-purple-100
                                                       dark:border-purple-800
                                                       dark:bg-purple-900/20
                                                       dark:text-purple-300"
                                            >
                                                {{ $advertisement->is_active
                                                    ? 'Disable'
                                                    : 'Enable' }}
                                            </button>
                                        </form>

                                        <form
                                            action="{{ route(
                                                'home-advertisements.destroy',
                                                $advertisement
                                            ) }}"
                                            method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this advertisement?'
                                            )"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center
                                                       justify-center rounded-xl
                                                       border border-red-200
                                                       bg-red-50 px-4 py-2
                                                       text-sm font-medium
                                                       text-red-600 transition
                                                       hover:bg-red-100
                                                       dark:border-red-800
                                                       dark:bg-red-900/20
                                                       dark:text-red-300"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="7"
                                    class="px-6 py-20 text-center"
                                >
                                    <h3
                                        class="text-lg font-semibold
                                               text-neutral-800
                                               dark:text-white"
                                    >
                                        No Advertisement Found
                                    </h3>

                                    <p
                                        class="mt-1 text-sm text-neutral-500
                                               dark:text-neutral-400"
                                    >
                                        Create your first homepage advertisement.
                                    </p>

                                    <a
                                        href="{{ route(
                                            'home-advertisements.create'
                                        ) }}"
                                        class="mt-5 inline-flex items-center
                                               justify-center rounded-xl
                                               bg-black px-5 py-3 text-sm
                                               font-semibold text-white
                                               transition hover:bg-neutral-800
                                               dark:bg-white dark:text-black"
                                    >
                                        + Create Advertisement
                                    </a>
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($advertisements->hasPages())
                <div
                    class="border-t border-neutral-200 px-6 py-4
                           dark:border-neutral-700"
                >
                    {{ $advertisements->links() }}
                </div>
            @endif
        </div>

    </div>

</x-layouts::app>