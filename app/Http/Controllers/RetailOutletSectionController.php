<?php

namespace App\Http\Controllers;

use App\Models\RetailOutletSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RetailOutletSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = RetailOutletSection::query();

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('card_1_title', 'like', "%{$search}%")
                    ->orWhere('card_2_title', 'like', "%{$search}%")
                    ->orWhere('card_3_title', 'like', "%{$search}%")
                    ->orWhere('card_4_title', 'like', "%{$search}%");
            });
        }

        $retailOutletSections = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('retail_outlet_sections.index', compact('retailOutletSections'));
    }

    public function create()
    {
        return view('retail_outlet_sections.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)
                    ->store('retail-outlet-sections', 'public');
            }
        }

        RetailOutletSection::create($data);

        return redirect()
            ->route('retail-outlet-sections.index')
            ->with('success', 'Retail outlet section created successfully.');
    }

    public function show(RetailOutletSection $retailOutletSection)
    {
        return view('retail_outlet_sections.show', compact('retailOutletSection'));
    }

    public function edit(RetailOutletSection $retailOutletSection)
    {
        return view('retail_outlet_sections.edit', compact('retailOutletSection'));
    }

    public function update(Request $request, RetailOutletSection $retailOutletSection)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($retailOutletSection->{$imageField}) {
                    Storage::disk('public')->delete($retailOutletSection->{$imageField});
                }

                $data[$imageField] = $request->file($imageField)
                    ->store('retail-outlet-sections', 'public');
            }
        }

        $retailOutletSection->update($data);

        return redirect()
            ->route('retail-outlet-sections.index')
            ->with('success', 'Retail outlet section updated successfully.');
    }

    public function destroy(RetailOutletSection $retailOutletSection)
    {
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($retailOutletSection->{$imageField}) {
                Storage::disk('public')->delete($retailOutletSection->{$imageField});
            }
        }

        $retailOutletSection->delete();

        return redirect()
            ->route('retail-outlet-sections.index')
            ->with('success', 'Retail outlet section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'card_1_title' => 'nullable|string|max:255',
            'card_1_description' => 'nullable|string',

            'card_2_title' => 'nullable|string|max:255',
            'card_2_description' => 'nullable|string',

            'card_3_title' => 'nullable|string|max:255',
            'card_3_description' => 'nullable|string',

            'card_4_title' => 'nullable|string|max:255',
            'card_4_description' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_1_alt' => 'nullable|string|max:255',

            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_2_alt' => 'nullable|string|max:255',

            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_3_alt' => 'nullable|string|max:255',

            'image_4' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_4_alt' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}