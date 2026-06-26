<x-layouts::app :title="__('Create Testimonial Section')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Create Testimonial Section</h1>
                <p class="text-sm text-neutral-500">Add heading and testimonials.</p>
            </div>

            <a href="{{ route('testimonial-sections.index') }}"
               class="rounded-xl border px-5 py-3 text-sm font-semibold">
                Back
            </a>
        </div>

        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <form action="{{ route('testimonial-sections.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                @include('testimonial_sections._form', [
                    'section' => null,
                    'buttonText' => 'Create Testimonial Section'
                ])
            </form>
        </div>

    </div>

</x-layouts::app>