<?php

namespace App\Http\Controllers;

use App\Models\BusinessVerticalSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BusinessVerticalSectionController extends Controller
{
  public function index(Request $request)
{
    $search = trim((string) $request->get('search'));
    $pageSlug = trim((string) $request->get('page_slug'));

    $query = BusinessVerticalSection::withCount('items');

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('label', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    if ($pageSlug !== '') {
        $query->where('page_slug', $pageSlug);
    }

    $businessVerticalSections = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total'  => BusinessVerticalSection::count(),
        'active' => BusinessVerticalSection::where('status', 1)->count(),
        'cards'  => \App\Models\BusinessVerticalItem::count(),
        'pages'  => BusinessVerticalSection::whereNotNull('page_slug')->distinct()->count('page_slug'),
    ];

    return view('business_vertical_sections.index', compact(
        'businessVerticalSections',
        'stats'
    ));
}

    public function create()
    {
        return view('business_vertical_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = BusinessVerticalSection::create([
                'page_slug' => $validated['page_slug'] ?? 'home',
                'section_id' => $validated['section_id'] ?? 'companies',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveItems($request, $section);
        });

        return redirect()
            ->route('business-vertical-sections.index')
            ->with('success', 'Business vertical section created successfully.');
    }

    public function show(BusinessVerticalSection $businessVerticalSection)
    {
        $businessVerticalSection->load('items');

        return view('business_vertical_sections.show', compact('businessVerticalSection'));
    }

    public function edit(BusinessVerticalSection $businessVerticalSection)
    {
        $businessVerticalSection->load('items');

        return view('business_vertical_sections.edit', compact('businessVerticalSection'));
    }

    public function update(Request $request, BusinessVerticalSection $businessVerticalSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $businessVerticalSection) {
            $businessVerticalSection->update([
                'page_slug' => $validated['page_slug'] ?? 'home',
                'section_id' => $validated['section_id'] ?? 'companies',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->updateItems($request, $businessVerticalSection);
        });

        return redirect()
            ->route('business-vertical-sections.index')
            ->with('success', 'Business vertical section updated successfully.');
    }

    public function destroy(BusinessVerticalSection $businessVerticalSection)
    {
        foreach ($businessVerticalSection->items as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
        }

        $businessVerticalSection->delete();

        return redirect()
            ->route('business-vertical-sections.index')
            ->with('success', 'Business vertical section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',
            'section_id' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'items' => 'nullable|array',
            'items.*.id' => 'nullable|integer|exists:business_vertical_items,id',
            'items.*.badge_text' => 'nullable|string|max:255',
            'items.*.theme' => 'nullable|string|max:50',
            'items.*.title' => 'nullable|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'items.*.image_alt' => 'nullable|string|max:255',
            'items.*.tags' => 'nullable|string|max:500',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveItems(Request $request, BusinessVerticalSection $section): void
    {
        $items = $request->input('items', []);

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $imagePath = null;

            if ($request->hasFile("items.$index.image")) {
                $imagePath = $request->file("items.$index.image")
                    ->store('business-verticals', 'public');
            }

            $section->items()->create([
                'badge_text' => $itemData['badge_text'] ?? null,
                'theme' => $itemData['theme'] ?? 'blue',
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'image' => $imagePath,
                'image_alt' => $itemData['image_alt'] ?? $itemData['title'],
                'tags' => $itemData['tags'] ?? null,
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateItems(Request $request, BusinessVerticalSection $section): void
    {
        $items = $request->input('items', []);
        $keptItemIds = [];

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $itemId = $itemData['id'] ?? null;
            $verticalItem = null;

            if ($itemId) {
                $verticalItem = $section->items()
                    ->where('id', $itemId)
                    ->first();
            }

            if (! $verticalItem) {
                $verticalItem = $section->items()->create([
                    'title' => $itemData['title'],
                    'sort_order' => $itemData['sort_order'] ?? $index,
                    'status' => 1,
                ]);
            }

            $imagePath = $verticalItem->image;

            if ($request->hasFile("items.$index.image")) {
                if ($verticalItem->image) {
                    Storage::disk('public')->delete($verticalItem->image);
                }

                $imagePath = $request->file("items.$index.image")
                    ->store('business-verticals', 'public');
            }

            $verticalItem->update([
                'badge_text' => $itemData['badge_text'] ?? null,
                'theme' => $itemData['theme'] ?? 'blue',
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'image' => $imagePath,
                'image_alt' => $itemData['image_alt'] ?? $itemData['title'],
                'tags' => $itemData['tags'] ?? null,
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);

            $keptItemIds[] = $verticalItem->id;
        }

        $itemsToDelete = $section->items()
            ->whereNotIn('id', $keptItemIds)
            ->get();

        foreach ($itemsToDelete as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            $item->delete();
        }
    }
}