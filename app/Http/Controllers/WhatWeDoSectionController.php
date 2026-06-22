<?php

namespace App\Http\Controllers;

use App\Models\WhatWeDoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhatWeDoSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = WhatWeDoSection::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $whatWeDoSections = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view('what_we_do_sections.index', compact('whatWeDoSections'));
    }

    public function create()
    {
        return view('what_we_do_sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'overlay_title' => 'nullable|string|max:255',
            'overlay_text' => 'nullable|string|max:255',

            'card_1_title' => 'nullable|string|max:255',
            'card_1_description' => 'nullable|string',

            'card_2_title' => 'nullable|string|max:255',
            'card_2_description' => 'nullable|string',

            'card_3_title' => 'nullable|string|max:255',
            'card_3_description' => 'nullable|string',

            'card_4_title' => 'nullable|string|max:255',
            'card_4_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except('image');

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('what-we-do-sections', 'public');
        }

        WhatWeDoSection::create($data);

        return redirect()
            ->route('what-we-do-sections.index')
            ->with('success', 'What We Do section created successfully.');
    }

    public function show(WhatWeDoSection $whatWeDoSection)
    {
        return view('what_we_do_sections.show', compact('whatWeDoSection'));
    }

    public function edit(WhatWeDoSection $whatWeDoSection)
    {
        return view('what_we_do_sections.edit', compact('whatWeDoSection'));
    }

    public function update(Request $request, WhatWeDoSection $whatWeDoSection)
    {
        $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'overlay_title' => 'nullable|string|max:255',
            'overlay_text' => 'nullable|string|max:255',

            'card_1_title' => 'nullable|string|max:255',
            'card_1_description' => 'nullable|string',

            'card_2_title' => 'nullable|string|max:255',
            'card_2_description' => 'nullable|string',

            'card_3_title' => 'nullable|string|max:255',
            'card_3_description' => 'nullable|string',

            'card_4_title' => 'nullable|string|max:255',
            'card_4_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except('image');

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($whatWeDoSection->image) {
                Storage::disk('public')->delete($whatWeDoSection->image);
            }

            $data['image'] = $request->file('image')->store('what-we-do-sections', 'public');
        }

        $whatWeDoSection->update($data);

        return redirect()
            ->route('what-we-do-sections.index')
            ->with('success', 'What We Do section updated successfully.');
    }

    public function destroy(WhatWeDoSection $whatWeDoSection)
    {
        if ($whatWeDoSection->image) {
            Storage::disk('public')->delete($whatWeDoSection->image);
        }

        $whatWeDoSection->delete();

        return redirect()
            ->route('what-we-do-sections.index')
            ->with('success', 'What We Do section deleted successfully.');
    }
}