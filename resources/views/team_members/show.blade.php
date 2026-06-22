<x-layouts::app :title="__('Team Member Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Team Member Details
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    View team member information.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('team-members.index') }}"
                   class="rounded-xl border border-neutral-200 px-5 py-3 text-sm font-semibold text-neutral-700">
                    Back
                </a>

                <a href="{{ route('team-members.edit', $teamMember) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                @if($teamMember->image)
                    <img src="{{ asset('storage/' . $teamMember->image) }}"
                         class="h-[480px] w-full rounded-2xl object-cover"
                         alt="{{ $teamMember->name }}">
                @else
                    <div class="flex h-[480px] items-center justify-center rounded-2xl bg-neutral-100 text-neutral-400 dark:bg-neutral-800">
                        No Image
                    </div>
                @endif
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h2 class="text-4xl font-black text-neutral-950 dark:text-white">
                    {{ $teamMember->name }}
                </h2>

                <p class="mt-2 text-lg font-bold text-blue-700">
                    {{ $teamMember->designation ?: '-' }}
                </p>

                <p class="mt-6 text-neutral-600 dark:text-neutral-300">
                    {{ $teamMember->description ?: 'No description available.' }}
                </p>

                @if($teamMember->profile_link)
                    <a href="{{ $teamMember->profile_link }}"
                       target="_blank"
                       class="mt-8 inline-flex rounded-full bg-slate-950 px-7 py-4 text-sm font-black text-white">
                        Open Profile →
                    </a>
                @endif

                <div class="mt-8 border-t border-neutral-200 pt-6 text-sm dark:border-neutral-700">
                    <p>Status: {{ $teamMember->status ? 'Active' : 'Inactive' }}</p>
                    <p class="mt-2">Sort Order: {{ $teamMember->sort_order }}</p>
                </div>
            </div>
        </div>

    </div>

</x-layouts::app>