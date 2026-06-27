<x-layouts::app :title="__('B2B Program Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">B2B Program Details</h1>
                <p class="text-sm text-neutral-500">View B2B program section.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('b2b-program-sections.edit', $b2bProgramSection) }}" class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">Edit</a>
                <a href="{{ route('b2b-program-sections.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">Back</a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                <div>
                    @if($b2bProgramSection->image)
                        <img src="{{ asset('storage/' . $b2bProgramSection->image) }}" class="h-[420px] w-full rounded-[2rem] object-cover" alt="{{ $b2bProgramSection->image_alt }}">
                    @endif

                    <div class="mt-5 rounded-[1.75rem] border p-6 shadow-lg">
                        <p class="text-2xl font-black">{{ $b2bProgramSection->card_title }}</p>
                        <p class="mt-2 text-base font-semibold leading-7 text-slate-600">{{ $b2bProgramSection->card_description }}</p>
                    </div>
                </div>

                <div>
                    <p class="font-black uppercase tracking-[.3em] text-blue-700">{{ $b2bProgramSection->label }}</p>
                    <h2 class="mt-4 text-4xl font-black">{{ $b2bProgramSection->title }}</h2>
                    <p class="mt-6 text-lg leading-8 text-slate-600">{{ $b2bProgramSection->description_1 }}</p>
                    <p class="mt-5 text-lg leading-8 text-slate-600">{{ $b2bProgramSection->description_2 }}</p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div class="rounded-[1.75rem] border bg-slate-50 p-6">
                            <h3 class="text-xl font-black">{{ $b2bProgramSection->feature_1_title }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $b2bProgramSection->feature_1_description }}</p>
                        </div>

                        <div class="rounded-[1.75rem] border bg-slate-50 p-6">
                            <h3 class="text-xl font-black">{{ $b2bProgramSection->feature_2_title }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $b2bProgramSection->feature_2_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layouts::app>