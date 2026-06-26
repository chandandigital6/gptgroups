<?php

namespace App\Http\Controllers;

use App\Models\TestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = TestimonialSection::withCount('testimonials');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('label', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $testimonialSections = $query
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('testimonial_sections.index', compact('testimonialSections'));
    }

    public function create()
    {
        return view('testimonial_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = TestimonialSection::create([
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveTestimonials($request, $section);
        });

        return redirect()
            ->route('testimonial-sections.index')
            ->with('success', 'Testimonial section created successfully.');
    }

    public function show(TestimonialSection $testimonialSection)
    {
        $testimonialSection->load('testimonials');

        return view('testimonial_sections.show', compact('testimonialSection'));
    }

    public function edit(TestimonialSection $testimonialSection)
    {
        $testimonialSection->load('testimonials');

        return view('testimonial_sections.edit', compact('testimonialSection'));
    }

    public function update(Request $request, TestimonialSection $testimonialSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $testimonialSection) {
            $testimonialSection->update([
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $oldTestimonials = $testimonialSection->testimonials()->get();

            foreach ($oldTestimonials as $oldTestimonial) {
                if ($oldTestimonial->image) {
                    Storage::disk('public')->delete($oldTestimonial->image);
                }
            }

            $testimonialSection->testimonials()->delete();

            $this->saveTestimonials($request, $testimonialSection);
        });

        return redirect()
            ->route('testimonial-sections.index')
            ->with('success', 'Testimonial section updated successfully.');
    }

    public function destroy(TestimonialSection $testimonialSection)
    {
        foreach ($testimonialSection->testimonials as $testimonial) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
        }

        $testimonialSection->delete();

        return redirect()
            ->route('testimonial-sections.index')
            ->with('success', 'Testimonial section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'testimonials' => 'nullable|array',
            'testimonials.*.message' => 'nullable|string',
            'testimonials.*.name' => 'nullable|string|max:255',
            'testimonials.*.designation' => 'nullable|string|max:255',
            'testimonials.*.location' => 'nullable|string|max:255',
            'testimonials.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'testimonials.*.sort_order' => 'nullable|integer|min:0',
            'testimonials.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveTestimonials(Request $request, TestimonialSection $section): void
    {
        $testimonials = $request->input('testimonials', []);

        foreach ($testimonials as $index => $testimonialData) {
            if (empty($testimonialData['message'])) {
                continue;
            }

            $imagePath = null;

            if ($request->hasFile("testimonials.$index.image")) {
                $imagePath = $request->file("testimonials.$index.image")
                    ->store('testimonials', 'public');
            }

            $section->testimonials()->create([
                'message' => $testimonialData['message'],
                'name' => $testimonialData['name'] ?? null,
                'designation' => $testimonialData['designation'] ?? null,
                'location' => $testimonialData['location'] ?? null,
                'image' => $imagePath,
                'sort_order' => $testimonialData['sort_order'] ?? $index,
                'status' => ! empty($testimonialData['status']) ? 1 : 0,
            ]);
        }
    }
}