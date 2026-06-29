<?php

namespace App\Http\Controllers;

use App\Models\StoreOutletSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreOutletSectionController extends Controller
{
   public function index(Request $request)
{
    $search = trim((string) $request->get('search'));

    $query = StoreOutletSection::withCount('outlets');

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('page_slug', 'like', "%{$search}%")
                ->orWhere('label', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    $storeOutletSections = $query
        ->orderByRaw('COALESCE(sort_order, 0) ASC')
        ->orderByDesc('id')
        ->get();

    $stats = [
        'total' => StoreOutletSection::count(),
        'active' => StoreOutletSection::where('status', 1)->count(),
        'inactive' => StoreOutletSection::where('status', 0)->count(),
        'outlets' => \App\Models\StoreOutlet::count(),
    ];

    return view('store_outlet_sections.index', compact(
        'storeOutletSections',
        'stats'
    ));
}

    public function create()
    {
        return view('store_outlet_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = StoreOutletSection::create([
                'page_slug' => $validated['page_slug'] ?? 'outlets',
                'section_id' => $validated['section_id'] ?? 'outlets',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_link' => $validated['button_link'] ?? null,
                'cta_label' => $validated['cta_label'] ?? null,
                'cta_title' => $validated['cta_title'] ?? null,
                'cta_description' => $validated['cta_description'] ?? null,
                'cta_button_text' => $validated['cta_button_text'] ?? null,
                'cta_button_link' => $validated['cta_button_link'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveOutlets($request, $section);
        });

        return redirect()
            ->route('store-outlet-sections.index')
            ->with('success', 'Store outlet section created successfully.');
    }

    public function show(StoreOutletSection $storeOutletSection)
    {
        $storeOutletSection->load('outlets.details');

        return view('store_outlet_sections.show', compact('storeOutletSection'));
    }

    public function edit(StoreOutletSection $storeOutletSection)
    {
        $storeOutletSection->load('outlets.details');

        return view('store_outlet_sections.edit', compact('storeOutletSection'));
    }

    public function update(Request $request, StoreOutletSection $storeOutletSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $storeOutletSection) {
            $storeOutletSection->update([
                'page_slug' => $validated['page_slug'] ?? 'outlets',
                'section_id' => $validated['section_id'] ?? 'outlets',
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_link' => $validated['button_link'] ?? null,
                'cta_label' => $validated['cta_label'] ?? null,
                'cta_title' => $validated['cta_title'] ?? null,
                'cta_description' => $validated['cta_description'] ?? null,
                'cta_button_text' => $validated['cta_button_text'] ?? null,
                'cta_button_link' => $validated['cta_button_link'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->updateOutlets($request, $storeOutletSection);
        });

        return redirect()
            ->route('store-outlet-sections.index')
            ->with('success', 'Store outlet section updated successfully.');
    }

    public function destroy(StoreOutletSection $storeOutletSection)
    {
        foreach ($storeOutletSection->outlets as $outlet) {
            if ($outlet->image) {
                Storage::disk('public')->delete($outlet->image);
            }
        }

        $storeOutletSection->delete();

        return redirect()
            ->route('store-outlet-sections.index')
            ->with('success', 'Store outlet section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'page_slug' => 'nullable|string|max:255',
            'section_id' => 'nullable|string|max:255',

            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'cta_label' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_link' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'outlets' => 'nullable|array',
            'outlets.*.id' => 'nullable|integer|exists:store_outlets,id',
            'outlets.*.title' => 'nullable|string|max:255',
            'outlets.*.subtitle' => 'nullable|string|max:255',
            'outlets.*.badge' => 'nullable|string|max:255',
            'outlets.*.theme' => 'nullable|string|max:50',
            'outlets.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'outlets.*.image_alt' => 'nullable|string|max:255',
            'outlets.*.button_text' => 'nullable|string|max:255',
            'outlets.*.button_link' => 'nullable|string|max:255',
            'outlets.*.sort_order' => 'nullable|integer|min:0',
            'outlets.*.status' => 'nullable|boolean',

            'outlets.*.details' => 'nullable|array',
            'outlets.*.details.*.id' => 'nullable|integer|exists:store_outlet_details,id',
            'outlets.*.details.*.label' => 'nullable|string|max:255',
            'outlets.*.details.*.value' => 'nullable|string',
            'outlets.*.details.*.sort_order' => 'nullable|integer|min:0',
            'outlets.*.details.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveOutlets(Request $request, StoreOutletSection $section): void
    {
        foreach ($request->input('outlets', []) as $outletIndex => $outletData) {
            if (empty($outletData['title'])) {
                continue;
            }

            $imagePath = null;

            if ($request->hasFile("outlets.$outletIndex.image")) {
                $imagePath = $request->file("outlets.$outletIndex.image")
                    ->store('store-outlets', 'public');
            }

            $outlet = $section->outlets()->create([
                'title' => $outletData['title'],
                'subtitle' => $outletData['subtitle'] ?? null,
                'badge' => $outletData['badge'] ?? null,
                'theme' => $outletData['theme'] ?? 'blue',
                'image' => $imagePath,
                'image_alt' => $outletData['image_alt'] ?? $outletData['title'],
                'button_text' => $outletData['button_text'] ?? 'Contact Outlet',
                'button_link' => $outletData['button_link'] ?? null,
                'sort_order' => $outletData['sort_order'] ?? $outletIndex,
                'status' => ! empty($outletData['status']) ? 1 : 0,
            ]);

            $this->saveDetails($outlet, $outletData['details'] ?? []);
        }
    }

    private function updateOutlets(Request $request, StoreOutletSection $section): void
    {
        $keptOutletIds = [];

        foreach ($request->input('outlets', []) as $outletIndex => $outletData) {
            if (empty($outletData['title'])) {
                continue;
            }

            $outlet = null;

            if (! empty($outletData['id'])) {
                $outlet = $section->outlets()
                    ->where('id', $outletData['id'])
                    ->first();
            }

            if (! $outlet) {
                $outlet = $section->outlets()->create([
                    'title' => $outletData['title'],
                    'sort_order' => $outletData['sort_order'] ?? $outletIndex,
                    'status' => 1,
                ]);
            }

            $imagePath = $outlet->image;

            if ($request->hasFile("outlets.$outletIndex.image")) {
                if ($outlet->image) {
                    Storage::disk('public')->delete($outlet->image);
                }

                $imagePath = $request->file("outlets.$outletIndex.image")
                    ->store('store-outlets', 'public');
            }

            $outlet->update([
                'title' => $outletData['title'],
                'subtitle' => $outletData['subtitle'] ?? null,
                'badge' => $outletData['badge'] ?? null,
                'theme' => $outletData['theme'] ?? 'blue',
                'image' => $imagePath,
                'image_alt' => $outletData['image_alt'] ?? $outletData['title'],
                'button_text' => $outletData['button_text'] ?? 'Contact Outlet',
                'button_link' => $outletData['button_link'] ?? null,
                'sort_order' => $outletData['sort_order'] ?? $outletIndex,
                'status' => ! empty($outletData['status']) ? 1 : 0,
            ]);

            $this->updateDetails($outlet, $outletData['details'] ?? []);

            $keptOutletIds[] = $outlet->id;
        }

        $outletsToDelete = $section->outlets()
            ->whereNotIn('id', $keptOutletIds)
            ->get();

        foreach ($outletsToDelete as $outlet) {
            if ($outlet->image) {
                Storage::disk('public')->delete($outlet->image);
            }

            $outlet->delete();
        }
    }

    private function saveDetails($outlet, array $details): void
    {
        foreach ($details as $index => $detailData) {
            if (empty($detailData['label']) && empty($detailData['value'])) {
                continue;
            }

            $outlet->details()->create([
                'label' => $detailData['label'] ?? 'Detail',
                'value' => $detailData['value'] ?? null,
                'sort_order' => $detailData['sort_order'] ?? $index,
                'status' => ! empty($detailData['status']) ? 1 : 0,
            ]);
        }
    }

    private function updateDetails($outlet, array $details): void
    {
        $keptDetailIds = [];

        foreach ($details as $index => $detailData) {
            if (empty($detailData['label']) && empty($detailData['value'])) {
                continue;
            }

            $detail = null;

            if (! empty($detailData['id'])) {
                $detail = $outlet->details()
                    ->where('id', $detailData['id'])
                    ->first();
            }

            if (! $detail) {
                $detail = $outlet->details()->create([
                    'label' => $detailData['label'] ?? 'Detail',
                    'value' => $detailData['value'] ?? null,
                    'sort_order' => $detailData['sort_order'] ?? $index,
                    'status' => 1,
                ]);
            }

            $detail->update([
                'label' => $detailData['label'] ?? 'Detail',
                'value' => $detailData['value'] ?? null,
                'sort_order' => $detailData['sort_order'] ?? $index,
                'status' => ! empty($detailData['status']) ? 1 : 0,
            ]);

            $keptDetailIds[] = $detail->id;
        }

        $outlet->details()
            ->whereNotIn('id', $keptDetailIds)
            ->delete();
    }
}