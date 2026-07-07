<x-layouts::app :title="__('Edit Hiring Step')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Edit Hiring Step</h1>

            <a href="{{ route('hiring-process-steps.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('hiring-process-steps.update', $hiringProcessStep->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @include('hiring_process_steps._form', [
                    'hiringProcessStep' => $hiringProcessStep,
                    'buttonText' => 'Update Step'
                ])
            </form>
        </div>
    </div>

</x-layouts::app>