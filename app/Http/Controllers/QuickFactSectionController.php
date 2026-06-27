<?php

namespace App\Http\Controllers;

use App\Models\QuickFactSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuickFactSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = QuickFactSection::withCount('items');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('page_slug', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('page_slug')) {
            $query->where('page_slug', $request->page_slug);
        }

        $quickFactSections = $query
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('quick_fact_sections.index', compact('quickFactSections'));
    }

    public function create()
    {
        return view('quick_fact_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = QuickFactSection::create([
                'page_slug' => $validated['page_slug'] ?? 'home',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'] ?? null,
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveItems($request, $section);
        });

        return redirect()
            ->route('quick-fact-sections.index')
            ->with('success', 'Quick fact section created successfully.');
    }

    public function show(QuickFactSection $quickFactSection)
    {
        $quickFactSection->load('items');

        return view('quick_fact_sections.show', compact('quickFactSection'));
    }

    public function edit(QuickFactSection $quickFactSection)
    {
        $quickFactSection->load('items');

        return view('quick_fact_sections.edit', compact('quickFactSection'));
    }

    public function update(Request $request, QuickFactSection $quickFactSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $quickFactSection) {
            $quickFactSection->update([
                'page_slug' => $validated['page_slug'] ?? 'home',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'] ?? null,
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->updateItems($request, $quickFactSection);
        });

        return redirect()
            ->route('quick-fact-sections.index')
            ->with('success', 'Quick fact section updated successfully.');
    }

    public function destroy(QuickFactSection $quickFactSection)
    {
        $quickFactSection->delete();

        return redirect()
            ->route('quick-fact-sections.index')
            ->with('success', 'Quick fact section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'items' => 'nullable|array',
            'items.*.id' => 'nullable|integer|exists:quick_fact_items,id',
            'items.*.value' => 'nullable|string|max:255',
            'items.*.title' => 'nullable|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveItems(Request $request, QuickFactSection $section): void
    {
        $items = $request->input('items', []);

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title']) && empty($itemData['value'])) {
                continue;
            }

            $section->items()->create([
                'value' => $itemData['value'] ?? null,
                'title' => $itemData['title'] ?? null,
                'description' => $itemData['description'] ?? null,
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateItems(Request $request, QuickFactSection $section): void
    {
        $items = $request->input('items', []);
        $keptItemIds = [];

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title']) && empty($itemData['value'])) {
                continue;
            }

            $itemId = $itemData['id'] ?? null;

            $factItem = null;

            if ($itemId) {
                $factItem = $section->items()
                    ->where('id', $itemId)
                    ->first();
            }

            if (! $factItem) {
                $factItem = $section->items()->create([
                    'value' => $itemData['value'] ?? null,
                    'title' => $itemData['title'] ?? 'Quick Fact',
                    'description' => null,
                    'sort_order' => $itemData['sort_order'] ?? $index,
                    'status' => 1,
                ]);
            }

            $factItem->update([
                'value' => $itemData['value'] ?? null,
                'title' => $itemData['title'] ?? null,
                'description' => $itemData['description'] ?? null,
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);

            $keptItemIds[] = $factItem->id;
        }

        $section->items()
            ->whereNotIn('id', $keptItemIds)
            ->delete();
    }
}