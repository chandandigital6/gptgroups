<x-layouts::app :title="__('B2B Benefits Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">B2B Benefits Details</h1>
                <p class="text-sm text-neutral-500">View B2B benefit section.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('b2b-benefit-sections.edit', $b2bBenefitSection) }}" class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">Edit</a>
                <a href="{{ route('b2b-benefit-sections.index') }}" class="rounded-xl border px-5 py-3 text-sm font-semibold">Back</a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.3em] text-blue-700">{{ $b2bBenefitSection->label }}</p>
                <h2 class="mt-4 text-4xl font-black">{{ $b2bBenefitSection->title }}</h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">{{ $b2bBenefitSection->description }}</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($b2bBenefitSection->items as $item)
                    <div class="rounded-[2rem] border bg-slate-50 p-8">
                        <div class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-2xl font-black text-white">
                            {{ $item->icon_text }}
                        </div>

                        <h3 class="mt-6 text-2xl font-black">{{ $item->title }}</h3>

                        <p class="mt-3 leading-7 text-slate-600">
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>