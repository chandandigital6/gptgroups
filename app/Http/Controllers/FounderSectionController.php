<?php

namespace App\Http\Controllers;

use App\Models\FounderSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FounderSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = FounderSection::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $founderSections = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view('founder_sections.index', compact('founderSections'));
    }

    public function create()
    {
        return view('founder_sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'stat_1_value' => 'nullable|string|max:255',
            'stat_1_label' => 'nullable|string|max:255',

            'stat_2_value' => 'nullable|string|max:255',
            'stat_2_label' => 'nullable|string|max:255',

            'stat_3_value' => 'nullable|string|max:255',
            'stat_3_label' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('founder-sections', 'public');
        }

        FounderSection::create($data);

        return redirect()
            ->route('founder-sections.index')
            ->with('success', 'Founder section created successfully.');
    }

    public function show(FounderSection $founderSection)
    {
        return view('founder_sections.show', compact('founderSection'));
    }

    public function edit(FounderSection $founderSection)
    {
        return view('founder_sections.edit', compact('founderSection'));
    }

    public function update(Request $request, FounderSection $founderSection)
    {
        $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'stat_1_value' => 'nullable|string|max:255',
            'stat_1_label' => 'nullable|string|max:255',

            'stat_2_value' => 'nullable|string|max:255',
            'stat_2_label' => 'nullable|string|max:255',

            'stat_3_value' => 'nullable|string|max:255',
            'stat_3_label' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($founderSection->image) {
                Storage::disk('public')->delete($founderSection->image);
            }

            $data['image'] = $request->file('image')->store('founder-sections', 'public');
        }

        $founderSection->update($data);

        return redirect()
            ->route('founder-sections.index')
            ->with('success', 'Founder section updated successfully.');
    }

    public function destroy(FounderSection $founderSection)
    {
        if ($founderSection->image) {
            Storage::disk('public')->delete($founderSection->image);
        }

        $founderSection->delete();

        return redirect()
            ->route('founder-sections.index')
            ->with('success', 'Founder section deleted successfully.');
    }
}