<?php

namespace App\Http\Controllers;

use App\Models\CommonSplitSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommonSplitSectionController extends Controller
{
  public function index(Request $request)
{
    $search = trim((string) $request->get('search'));

    $query = CommonSplitSection::withCount('items');

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('section_key', 'like', "%{$search}%")
                ->orWhere('label', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description_1', 'like', "%{$search}%")
                ->orWhere('description_2', 'like', "%{$search}%");
        });
    }

    $commonSplitSections = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total' => CommonSplitSection::count(),
        'active' => CommonSplitSection::where('status', 1)->count(),
        'inactive' => CommonSplitSection::where('status', 0)->count(),
        'items' => \App\Models\CommonSplitItem::count(),
    ];

    return view('common_split_sections.index', compact(
        'commonSplitSections',
        'stats'
    ));
}

    public function create()
    {
        return view('common_split_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $data = $this->sectionData($request, $validated);

            foreach ([1, 2, 3] as $i) {
                if ($request->hasFile("image_$i")) {
                    $data["image_$i"] = $request->file("image_$i")->store('common-split-sections', 'public');
                }
            }

            $section = CommonSplitSection::create($data);

            $this->saveItems($request, $section);
        });

        return redirect()
            ->route('common-split-sections.index')
            ->with('success', 'Common split section created successfully.');
    }

    public function show(CommonSplitSection $commonSplitSection)
    {
        $commonSplitSection->load('items');

        return view('common_split_sections.show', compact('commonSplitSection'));
    }

    public function edit(CommonSplitSection $commonSplitSection)
    {
        $commonSplitSection->load('items');

        return view('common_split_sections.edit', compact('commonSplitSection'));
    }

    public function update(Request $request, CommonSplitSection $commonSplitSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $commonSplitSection) {
            $data = $this->sectionData($request, $validated);

            foreach ([1, 2, 3] as $i) {
                if ($request->hasFile("image_$i")) {
                    if ($commonSplitSection->{"image_$i"}) {
                        Storage::disk('public')->delete($commonSplitSection->{"image_$i"});
                    }

                    $data["image_$i"] = $request->file("image_$i")->store('common-split-sections', 'public');
                }
            }

            $commonSplitSection->update($data);

            $this->updateItems($request, $commonSplitSection);
        });

        return redirect()
            ->route('common-split-sections.index')
            ->with('success', 'Common split section updated successfully.');
    }

    public function destroy(CommonSplitSection $commonSplitSection)
    {
        foreach ([1, 2, 3] as $i) {
            if ($commonSplitSection->{"image_$i"}) {
                Storage::disk('public')->delete($commonSplitSection->{"image_$i"});
            }
        }

        $commonSplitSection->delete();

        return redirect()
            ->route('common-split-sections.index')
            ->with('success', 'Common split section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',
            'section_key' => 'nullable|string|max:255',

            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description_1' => 'nullable|string',
            'description_2' => 'nullable|string',

            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_1_alt' => 'nullable|string|max:255',

            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_2_alt' => 'nullable|string|max:255',

            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_3_alt' => 'nullable|string|max:255',

            'card_value' => 'nullable|string|max:255',
            'card_title' => 'nullable|string|max:255',
            'card_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'items' => 'nullable|array',
            'items.*.id' => 'nullable|integer|exists:common_split_items,id',
            'items.*.icon_text' => 'nullable|string|max:50',
            'items.*.theme' => 'nullable|string|max:50',
            'items.*.title' => 'nullable|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.status' => 'nullable|boolean',
        ]);
    }

    private function sectionData(Request $request, array $validated): array
    {
        return [
            'page_slug' => $validated['page_slug'] ?? 'home',
            'section_key' => $validated['section_key'] ?? null,
            'label' => $validated['label'] ?? null,
            'title' => $validated['title'],
            'description_1' => $validated['description_1'] ?? null,
            'description_2' => $validated['description_2'] ?? null,
            'image_1_alt' => $validated['image_1_alt'] ?? null,
            'image_2_alt' => $validated['image_2_alt'] ?? null,
            'image_3_alt' => $validated['image_3_alt'] ?? null,
            'card_value' => $validated['card_value'] ?? null,
            'card_title' => $validated['card_title'] ?? null,
            'card_description' => $validated['card_description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ];
    }

    private function saveItems(Request $request, CommonSplitSection $section): void
    {
        foreach ($request->input('items', []) as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $section->items()->create([
                'icon_text' => $itemData['icon_text'] ?? null,
                'theme' => $itemData['theme'] ?? 'blue',
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateItems(Request $request, CommonSplitSection $section): void
    {
        $keptItemIds = [];

        foreach ($request->input('items', []) as $index => $itemData) {
            if (empty($itemData['title'])) {
                continue;
            }

            $item = null;

            if (! empty($itemData['id'])) {
                $item = $section->items()
                    ->where('id', $itemData['id'])
                    ->first();
            }

            if (! $item) {
                $item = $section->items()->create([
                    'title' => $itemData['title'],
                    'sort_order' => $itemData['sort_order'] ?? $index,
                    'status' => 1,
                ]);
            }

            $item->update([
                'icon_text' => $itemData['icon_text'] ?? null,
                'theme' => $itemData['theme'] ?? 'blue',
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'sort_order' => $itemData['sort_order'] ?? $index,
                'status' => ! empty($itemData['status']) ? 1 : 0,
            ]);

            $keptItemIds[] = $item->id;
        }

        $section->items()
            ->whereNotIn('id', $keptItemIds)
            ->delete();
    }
}