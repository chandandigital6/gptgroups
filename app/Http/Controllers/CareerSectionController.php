<?php

namespace App\Http\Controllers;

use App\Models\CareerSection;
use Illuminate\Http\Request;

class CareerSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = CareerSection::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('section_key', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            });
        }

        $stats = [
            'total' => CareerSection::count(),
            'active' => CareerSection::where('status', 1)->count(),
            'inactive' => CareerSection::where('status', 0)->count(),
        ];

        $careerSections = $query->orderBy('sort_order')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('career_sections.index', compact('careerSections', 'stats'));
    }

    public function create()
    {
        return view('career_sections.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');

        CareerSection::create($data);

        return redirect()
            ->route('career-sections.index')
            ->with('success', 'Career section created successfully.');
    }

    public function show(CareerSection $careerSection)
    {
        return view('career_sections.show', compact('careerSection'));
    }

    public function edit(CareerSection $careerSection)
    {
        return view('career_sections.edit', compact('careerSection'));
    }

    public function update(Request $request, CareerSection $careerSection)
    {
        $data = $this->validatedData($request, $careerSection->id);
        $data['status'] = $request->boolean('status');

        $careerSection->update($data);

        return redirect()
            ->route('career-sections.index')
            ->with('success', 'Career section updated successfully.');
    }

    public function destroy(CareerSection $careerSection)
    {
        $careerSection->delete();

        return redirect()
            ->route('career-sections.index')
            ->with('success', 'Career section deleted successfully.');
    }

    private function validatedData(Request $request, $id = null): array
    {
        return $request->validate([
            'section_key' => ['required', 'string', 'max:255', 'unique:career_sections,section_key,' . $id],
            'label' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'email_title' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'phone_title' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}