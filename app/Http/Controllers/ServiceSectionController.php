<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceSection::withCount('items');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('label', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $serviceSections = $query
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('service_sections.index', compact('serviceSections'));
    }

    public function create()
    {
        return view('service_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = ServiceSection::create([
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveItems($request, $section);
        });

        return redirect()
            ->route('service-sections.index')
            ->with('success', 'Service section created successfully.');
    }

    public function show(ServiceSection $serviceSection)
    {
        $serviceSection->load('items');

        return view('service_sections.show', compact('serviceSection'));
    }

    public function edit(ServiceSection $serviceSection)
    {
        $serviceSection->load('items');

        return view('service_sections.edit', compact('serviceSection'));
    }

    public function updateold(Request $request, ServiceSection $serviceSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $serviceSection) {
            $serviceSection->update([
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $oldItems = $serviceSection->items()->get();

            foreach ($oldItems as $oldItem) {
                if ($oldItem->image) {
                    Storage::disk('public')->delete($oldItem->image);
                }
            }

            $serviceSection->items()->delete();

            $this->saveItems($request, $serviceSection);
        });

        return redirect()
            ->route('service-sections.index')
            ->with('success', 'Service section updated successfully.');
    }


    public function update(Request $request, ServiceSection $serviceSection)
{
    $validated = $this->validatedData($request);

    DB::transaction(function () use ($request, $validated, $serviceSection) {
        $serviceSection->update([
            'label' => $validated['label'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $this->updateItems($request, $serviceSection);
    });

    return redirect()
        ->route('service-sections.index')
        ->with('success', 'Service section updated successfully.');
}

    public function destroy(ServiceSection $serviceSection)
    {
        foreach ($serviceSection->items as $item) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
        }

        $serviceSection->delete();

        return redirect()
            ->route('service-sections.index')
            ->with('success', 'Service section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

          'items' => 'nullable|array',
'items.*.id' => 'nullable|integer|exists:service_items,id',
'items.*.label' => 'nullable|string|max:255',
'items.*.title' => 'nullable|string|max:255',
'items.*.description' => 'nullable|string',
'items.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
'items.*.image_alt' => 'nullable|string|max:255',
'items.*.button_link' => 'nullable|string|max:255',
'items.*.accent_color' => 'nullable|string|max:50',
'items.*.sort_order' => 'nullable|integer|min:0',
'items.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveItems(Request $request, ServiceSection $section): void
    {
        $items = $request->input('items', []);

        foreach ($items as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $imagePath = null;

            if ($request->hasFile("items.$index.image")) {
                $imagePath = $request->file("items.$index.image")
                    ->store('service-items', 'public');
            }

            $section->items()->create([
                'label' => $itemData['label'] ?? null,
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'image' => $imagePath,
                'image_alt' => $itemData['image_alt'] ?? $itemData['title'],
                'button_link' => $itemData['button_link'] ?? null,
                'accent_color' => $itemData['accent_color'] ?? 'blue',
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateItems(Request $request, ServiceSection $section): void
{
    $items = $request->input('items', []);
    $keptItemIds = [];

    foreach ($items as $index => $itemData) {
        if (empty($itemData['title'])) {
            continue;
        }

        $itemId = $itemData['id'] ?? null;

        $serviceItem = null;

        if ($itemId) {
            $serviceItem = $section->items()
                ->where('id', $itemId)
                ->first();
        }

        if (! $serviceItem) {
            $serviceItem = $section->items()->create([
                'label' => null,
                'title' => $itemData['title'],
                'description' => null,
                'image' => null,
                'image_alt' => null,
                'button_link' => null,
                'accent_color' => 'blue',
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => 1,
            ]);
        }

        $imagePath = $serviceItem->image;

        if ($request->hasFile("items.$index.image")) {
            if ($serviceItem->image) {
                Storage::disk('public')->delete($serviceItem->image);
            }

            $imagePath = $request->file("items.$index.image")
                ->store('service-items', 'public');
        }

        $serviceItem->update([
            'label' => $itemData['label'] ?? null,
            'title' => $itemData['title'],
            'description' => $itemData['description'] ?? null,
            'image' => $imagePath,
            'image_alt' => $itemData['image_alt'] ?? $itemData['title'],
            'button_link' => $itemData['button_link'] ?? null,
            'accent_color' => $itemData['accent_color'] ?? 'blue',
            'sort_order' => $itemData['sort_order'] ?? $index,
            'status' => ! empty($itemData['status']) ? 1 : 0,
        ]);

        $keptItemIds[] = $serviceItem->id;
    }

    /**
     * Jo existing service item form se remove ho gaya hai,
     * sirf wahi delete hoga.
     */
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