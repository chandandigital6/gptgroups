<?php

namespace App\Http\Controllers;

use App\Models\CompanyOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyOverviewController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanyOverview::query();

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('card_1_title', 'like', "%{$search}%")
                    ->orWhere('card_2_title', 'like', "%{$search}%");
            });
        }

        $companyOverviews = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('company_overviews.index', compact('companyOverviews'));
    }

    public function create()
    {
        return view('company_overviews.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)
                    ->store('company-overviews', 'public');
            }
        }

        CompanyOverview::create($data);

        return redirect()
            ->route('company-overviews.index')
            ->with('success', 'Company overview created successfully.');
    }

    public function show(CompanyOverview $companyOverview)
    {
        return view('company_overviews.show', compact('companyOverview'));
    }

    public function edit(CompanyOverview $companyOverview)
    {
        return view('company_overviews.edit', compact('companyOverview'));
    }

    public function update(Request $request, CompanyOverview $companyOverview)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($companyOverview->{$imageField}) {
                    Storage::disk('public')->delete($companyOverview->{$imageField});
                }

                $data[$imageField] = $request->file($imageField)
                    ->store('company-overviews', 'public');
            }
        }

        $companyOverview->update($data);

        return redirect()
            ->route('company-overviews.index')
            ->with('success', 'Company overview updated successfully.');
    }

    public function destroy(CompanyOverview $companyOverview)
    {
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($companyOverview->{$imageField}) {
                Storage::disk('public')->delete($companyOverview->{$imageField});
            }
        }

        $companyOverview->delete();

        return redirect()
            ->route('company-overviews.index')
            ->with('success', 'Company overview deleted successfully.');
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