<?php

namespace App\Http\Controllers;

use App\Models\RepairServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RepairServiceSectionController extends Controller
{
 public function index(Request $request)
{
    $search = trim((string) $request->get('search'));

    $query = RepairServiceSection::withCount('items');

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('label', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    $repairServiceSections = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total' => RepairServiceSection::count(),
        'active' => RepairServiceSection::where('status', 1)->count(),
        'items' => \App\Models\RepairServiceItem::count(),
        'latest' => RepairServiceSection::latest('id')->value('id') ?? 0,
    ];

    return view('repair_service_sections.index', compact('repairServiceSections', 'stats'));
}

    public function create()
    {
        return view('repair_service_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = RepairServiceSection::create([
                'page_slug' => $validated['page_slug'] ?? 'services',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_link' => $validated['button_link'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveItems($request, $section);
        });

        return redirect()
            ->route('repair-service-sections.index')
            ->with('success', 'Repair service section created successfully.');
    }

    public function show(RepairServiceSection $repairServiceSection)
    {
        $repairServiceSection->load('items');

        return view('repair_service_sections.show', compact('repairServiceSection'));
    }

    public function edit(RepairServiceSection $repairServiceSection)
    {
        $repairServiceSection->load('items');

        return view('repair_service_sections.edit', compact('repairServiceSection'));
    }

    public function update(Request $request, RepairServiceSection $repairServiceSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $repairServiceSection) {
            $repairServiceSection->update([
                'page_slug' => $validated['page_slug'] ?? 'services',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_link' => $validated['button_link'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->updateItems($request, $repairServiceSection);
        });

        return redirect()
            ->route('repair-service-sections.index')
            ->with('success', 'Repair service section updated successfully.');
    }

    public function destroy(RepairServiceSection $repairServiceSection)
    {
        foreach ($repairServiceSection->items as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
        }

        $repairServiceSection->delete();

        return redirect()
            ->route('repair-service-sections.index')
            ->with('success', 'Repair service section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'items' => 'nullable|array',
            'items.*.id' => 'nullable|integer|exists:repair_service_items,id',
            'items.*.title' => 'nullable|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'items.*.image_alt' => 'nullable|string|max:255',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveItems(Request $request, RepairServiceSection $section): void
    {
        $items = $request->input('items', []);

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $imagePath = null;

            if ($request->hasFile("items.$index.image")) {
                $imagePath = $request->file("items.$index.image")
                    ->store('repair-services', 'public');
            }

            $section->items()->create([
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'image' => $imagePath,
                'image_alt' => $itemData['image_alt'] ?? $itemData['title'],
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateItems(Request $request, RepairServiceSection $section): void
    {
        $items = $request->input('items', []);
        $keptItemIds = [];

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $itemId = $itemData['id'] ?? null;

            $repairItem = null;

            if ($itemId) {
                $repairItem = $section->items()
                    ->where('id', $itemId)
                    ->first();
            }

            if (! $repairItem) {
                $repairItem = $section->items()->create([
                    'title' => $itemData['title'],
                    'description' => null,
                    'image' => null,
                    'image_alt' => null,
                    'sort_order' => $itemData['sort_order'] ?? $index,
                    'status' => 1,
                ]);
            }

            $imagePath = $repairItem->image;

            if ($request->hasFile("items.$index.image")) {
                if ($repairItem->image) {
                    Storage::disk('public')->delete($repairItem->image);
                }

                $imagePath = $request->file("items.$index.image")
                    ->store('repair-services', 'public');
            }

            $repairItem->update([
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'image' => $imagePath,
                'image_alt' => $itemData['image_alt'] ?? $itemData['title'],
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);

            $keptItemIds[] = $repairItem->id;
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