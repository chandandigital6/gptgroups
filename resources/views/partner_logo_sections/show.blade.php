<x-layouts::app :title="__('Partner Logo Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Partner Logo Section Details</h1>
                <p class="text-sm text-neutral-500">View partner logo section.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('partner-logo-sections.edit', $partnerLogoSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('partner-logo-sections.index') }}"
                   class="rounded-xl border px-5 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="font-black uppercase tracking-[.25em] text-blue-700">
                        {{ $partnerLogoSection->label }}
                    </p>

                    <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                        {{ $partnerLogoSection->title }}
                    </h2>
                </div>

                <p class="max-w-xl text-lg text-slate-600">
                    {{ $partnerLogoSection->description }}
                </p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-8">
                @foreach($partnerLogoSection->logos as $logo)
                    <div class="rounded-3xl border p-6 text-center font-black text-slate-700">
                        @if($logo->logo)
                            <img src="{{ asset('storage/' . $logo->logo) }}"
                                 class="mx-auto h-16 w-full object-contain"
                                 alt="{{ $logo->name }}">
                        @else
                            {{ $logo->name }}
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>