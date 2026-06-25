<?php

namespace App\Http\Controllers;

use App\Models\NetworkSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NetworkSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = NetworkSection::query();

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('card_1_title', 'like', "%{$search}%")
                    ->orWhere('card_2_title', 'like', "%{$search}%")
                    ->orWhere('overlay_title', 'like', "%{$search}%");
            });
        }

        $networkSections = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('network_sections.index', compact('networkSections'));
    }

    public function create()
    {
        return view('network_sections.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('network-sections', 'public');
        }

        NetworkSection::create($data);

        return redirect()
            ->route('network-sections.index')
            ->with('success', 'Network section created successfully.');
    }

    public function show(NetworkSection $networkSection)
    {
        return view('network_sections.show', compact('networkSection'));
    }

    public function edit(NetworkSection $networkSection)
    {
        return view('network_sections.edit', compact('networkSection'));
    }

    public function update(Request $request, NetworkSection $networkSection)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($networkSection->image) {
                Storage::disk('public')->delete($networkSection->image);
            }

            $data['image'] = $request->file('image')
                ->store('network-sections', 'public');
        }

        $networkSection->update($data);

        return redirect()
            ->route('network-sections.index')
            ->with('success', 'Network section updated successfully.');
    }

    public function destroy(NetworkSection $networkSection)
    {
        if ($networkSection->image) {
            Storage::disk('public')->delete($networkSection->image);
        }

        $networkSection->delete();

        return redirect()
            ->route('network-sections.index')
            ->with('success', 'Network section deleted successfully.');
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

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt' => 'nullable|string|max:255',

            'overlay_title' => 'nullable|string|max:255',
            'overlay_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}