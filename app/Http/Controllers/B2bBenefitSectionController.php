<?php

namespace App\Http\Controllers;

use App\Models\B2bBenefitSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class B2bBenefitSectionController extends Controller
{
  public function index(Request $request)
{
    $search = trim((string) $request->get('search'));

    $query = B2bBenefitSection::withCount('items');

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('label', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    $b2bBenefitSections = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total' => B2bBenefitSection::count(),
        'active' => B2bBenefitSection::where('status', 1)->count(),
        'inactive' => B2bBenefitSection::where('status', 0)->count(),
        'items' => \App\Models\B2bBenefitItem::count(),
        'latest' => B2bBenefitSection::latest('id')->value('id') ?? 0,
    ];

    return view('b2b_benefit_sections.index', compact('b2bBenefitSections', 'stats'));
}

    public function create()
    {
        return view('b2b_benefit_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = B2bBenefitSection::create([
                'page_slug' => $validated['page_slug'] ?? 'services',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveItems($request, $section);
        });

        return redirect()
            ->route('b2b-benefit-sections.index')
            ->with('success', 'B2B benefit section created successfully.');
    }

    public function show(B2bBenefitSection $b2bBenefitSection)
    {
        $b2bBenefitSection->load('items');

        return view('b2b_benefit_sections.show', compact('b2bBenefitSection'));
    }

    public function edit(B2bBenefitSection $b2bBenefitSection)
    {
        $b2bBenefitSection->load('items');

        return view('b2b_benefit_sections.edit', compact('b2bBenefitSection'));
    }

    public function update(Request $request, B2bBenefitSection $b2bBenefitSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $b2bBenefitSection) {
            $b2bBenefitSection->update([
                'page_slug' => $validated['page_slug'] ?? 'services',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->updateItems($request, $b2bBenefitSection);
        });

        return redirect()
            ->route('b2b-benefit-sections.index')
            ->with('success', 'B2B benefit section updated successfully.');
    }

    public function destroy(B2bBenefitSection $b2bBenefitSection)
    {
        $b2bBenefitSection->delete();

        return redirect()
            ->route('b2b-benefit-sections.index')
            ->with('success', 'B2B benefit section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'items' => 'nullable|array',
            'items.*.id' => 'nullable|integer|exists:b2b_benefit_items,id',
            'items.*.icon_text' => 'nullable|string|max:10',
            'items.*.title' => 'nullable|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.theme' => 'nullable|string|max:50',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveItems(Request $request, B2bBenefitSection $section): void
    {
        $items = $request->input('items', []);

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $section->items()->create([
                'icon_text' => $itemData['icon_text'] ?? null,
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'theme' => $itemData['theme'] ?? 'blue',
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateItems(Request $request, B2bBenefitSection $section): void
    {
        $items = $request->input('items', []);
        $keptItemIds = [];

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $itemId = $itemData['id'] ?? null;

            $benefitItem = null;

            if ($itemId) {
                $benefitItem = $section->items()
                    ->where('id', $itemId)
                    ->first();
            }

            if (! $benefitItem) {
                $benefitItem = $section->items()->create([
                    'icon_text' => $itemData['icon_text'] ?? null,
                    'title' => $itemData['title'],
                    'description' => null,
                    'theme' => $itemData['theme'] ?? 'blue',
                    'sort_order' => $itemData['sort_order'] ?? $index,
                    'status' => 1,
                ]);
            }

            $benefitItem->update([
                'icon_text' => $itemData['icon_text'] ?? null,
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'theme' => $itemData['theme'] ?? 'blue',
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);

            $keptItemIds[] = $benefitItem->id;
        }

        $section->items()
            ->whereNotIn('id', $keptItemIds)
            ->delete();
    }
}