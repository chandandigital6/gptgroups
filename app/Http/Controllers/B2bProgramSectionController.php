<?php

namespace App\Http\Controllers;

use App\Models\B2bProgramSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class B2bProgramSectionController extends Controller
{
    public function index(Request $request)
{
    $search = trim((string) $request->get('search'));

    $query = B2bProgramSection::query();

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('label', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description_1', 'like', "%{$search}%")
                ->orWhere('description_2', 'like', "%{$search}%");
        });
    }

    $b2bProgramSections = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total' => B2bProgramSection::count(),
        'active' => B2bProgramSection::where('status', 1)->count(),
        'inactive' => B2bProgramSection::where('status', 0)->count(),
        'latest' => B2bProgramSection::latest('id')->value('id') ?? 0,
    ];

    return view('b2b_program_sections.index', compact('b2bProgramSections', 'stats'));
}

    public function create()
    {
        return view('b2b_program_sections.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('b2b-programs', 'public');
        }

        B2bProgramSection::create($data);

        return redirect()
            ->route('b2b-program-sections.index')
            ->with('success', 'B2B program section created successfully.');
    }

    public function show(B2bProgramSection $b2bProgramSection)
    {
        return view('b2b_program_sections.show', compact('b2bProgramSection'));
    }

  public function edit(B2bProgramSection $b2bProgramSection)
{
    return view('b2b_program_sections.edit', [
        'b2bProgramSection' => $b2bProgramSection,
    ]);
}

    public function update(Request $request, B2bProgramSection $b2bProgramSection)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($b2bProgramSection->image) {
                Storage::disk('public')->delete($b2bProgramSection->image);
            }

            $data['image'] = $request->file('image')->store('b2b-programs', 'public');
        }

        $b2bProgramSection->update($data);

        return redirect()
            ->route('b2b-program-sections.index')
            ->with('success', 'B2B program section updated successfully.');
    }

    public function destroy(B2bProgramSection $b2bProgramSection)
    {
        if ($b2bProgramSection->image) {
            Storage::disk('public')->delete($b2bProgramSection->image);
        }

        $b2bProgramSection->delete();

        return redirect()
            ->route('b2b-program-sections.index')
            ->with('success', 'B2B program section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',

            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',

            'description_1' => 'nullable|string',
            'description_2' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',

            'card_title' => 'nullable|string|max:255',
            'card_description' => 'nullable|string',

            'feature_1_title' => 'nullable|string|max:255',
            'feature_1_description' => 'nullable|string',

            'feature_2_title' => 'nullable|string|max:255',
            'feature_2_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}