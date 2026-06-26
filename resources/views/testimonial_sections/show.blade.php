<x-layouts::app :title="__('Testimonial Section Details')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Testimonial Section Details</h1>
                <p class="text-sm text-neutral-500">View testimonial section.</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('testimonial-sections.edit', $testimonialSection) }}"
                   class="rounded-xl bg-black px-5 py-3 text-sm font-semibold text-white">
                    Edit
                </a>

                <a href="{{ route('testimonial-sections.index') }}"
                   class="rounded-xl border px-5 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <div class="mx-auto max-w-3xl text-center">
                <p class="font-black uppercase tracking-[.25em] text-blue-700">
                    {{ $testimonialSection->label }}
                </p>

                <h2 class="mt-4 text-4xl font-black text-slate-950 md:text-6xl">
                    {{ $testimonialSection->title }}
                </h2>

                @if($testimonialSection->description)
                    <p class="mt-4 text-lg text-slate-600">
                        {{ $testimonialSection->description }}
                    </p>
                @endif
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach($testimonialSection->testimonials as $testimonial)
                    <div class="rounded-[34px] border p-8">
                        <p class="text-xl leading-8 text-slate-700">
                            “{{ $testimonial->message }}”
                        </p>

                        <div class="mt-6 flex items-center gap-3">
                            @if($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}"
                                     class="h-12 w-12 rounded-full object-cover"
                                     alt="{{ $testimonial->name }}">
                            @endif

                            <div>
                                <p class="font-black text-slate-950">{{ $testimonial->name }}</p>
                                <p class="text-slate-500">{{ $testimonial->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</x-layouts::app>