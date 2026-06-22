<x-layouts::app :title="__('Team Members')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">
                    Team Members
                </h1>

                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Manage leadership team members.
                </p>
            </div>

            <a href="{{ route('team-members.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white transition hover:bg-neutral-800 dark:bg-white dark:text-black">
                + Create Team Member
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative h-full flex-1 overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                    <thead class="bg-neutral-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">#</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Member</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Profile Link</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-neutral-600 dark:text-neutral-300">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($teamMembers as $member)
                            <tr class="transition hover:bg-neutral-50 dark:hover:bg-neutral-800/60">
                                <td class="px-6 py-4 text-sm text-neutral-700 dark:text-neutral-300">
                                    {{ $member->id }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-14 w-14 overflow-hidden rounded-xl bg-neutral-100 dark:bg-neutral-800">
                                            @if($member->image)
                                                <img src="{{ asset('storage/' . $member->image) }}"
                                                     class="h-full w-full object-cover"
                                                     alt="{{ $member->name }}">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center text-xs text-neutral-400">
                                                    No
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <div class="font-semibold text-neutral-900 dark:text-white">
                                                {{ $member->name }}
                                            </div>
                                            <div class="text-xs text-neutral-500">
                                                {{ $member->designation ?: '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    @if($member->profile_link)
                                        <a href="{{ $member->profile_link }}" target="_blank"
                                           class="text-sm font-semibold text-blue-600 hover:underline">
                                            Open Link
                                        </a>
                                    @else
                                        <span class="text-sm text-neutral-400">No Link</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-sm font-semibold text-neutral-800 dark:text-neutral-200">
                                    {{ $member->sort_order }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($member->status)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                            Active
                                        </span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-900/30 dark:text-red-300">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('team-members.show', $member) }}"
                                           class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-100 dark:border-blue-800 dark:bg-blue-900/20 dark:text-blue-300">
                                            View
                                        </a>

                                        <a href="{{ route('team-members.edit', $member) }}"
                                           class="rounded-xl border border-yellow-200 bg-yellow-50 px-4 py-2 text-sm font-medium text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300">
                                            Edit
                                        </a>

                                        <form action="{{ route('team-members.destroy', $member) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this team member?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-20 text-center text-neutral-500">
                                    No team members found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($teamMembers, 'links'))
                <div class="border-t border-neutral-200 px-6 py-4 dark:border-neutral-700">
                    {{ $teamMembers->links() }}
                </div>
            @endif
        </div>
    </div>

</x-layouts::app>