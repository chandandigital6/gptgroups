<?php

namespace App\Http\Controllers;

use App\Models\PartnerLogoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartnerLogoSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = PartnerLogoSection::withCount('logos');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('label', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $partnerLogoSections = $query
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('partner_logo_sections.index', compact('partnerLogoSections'));
    }

    public function create()
    {
        return view('partner_logo_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated) {
            $section = PartnerLogoSection::create([
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $this->saveLogos($request, $section);
        });

        return redirect()
            ->route('partner-logo-sections.index')
            ->with('success', 'Partner logo section created successfully.');
    }

    public function show(PartnerLogoSection $partnerLogoSection)
    {
        $partnerLogoSection->load('logos');

        return view('partner_logo_sections.show', compact('partnerLogoSection'));
    }

    public function edit(PartnerLogoSection $partnerLogoSection)
    {
        $partnerLogoSection->load('logos');

        return view('partner_logo_sections.edit', compact('partnerLogoSection'));
    }

    public function update(Request $request, PartnerLogoSection $partnerLogoSection)
    {
        $validated = $this->validatedData($request);

        DB::transaction(function () use ($request, $validated, $partnerLogoSection) {
            $partnerLogoSection->update([
                'label' => $validated['label'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            $oldLogos = $partnerLogoSection->logos()->get();

            foreach ($oldLogos as $oldLogo) {
                if ($oldLogo->logo) {
                    Storage::disk('public')->delete($oldLogo->logo);
                }
            }

            $partnerLogoSection->logos()->delete();

            $this->saveLogos($request, $partnerLogoSection);
        });

        return redirect()
            ->route('partner-logo-sections.index')
            ->with('success', 'Partner logo section updated successfully.');
    }

    public function destroy(PartnerLogoSection $partnerLogoSection)
    {
        foreach ($partnerLogoSection->logos as $logo) {
            if ($logo->logo) {
                Storage::disk('public')->delete($logo->logo);
            }
        }

        $partnerLogoSection->delete();

        return redirect()
            ->route('partner-logo-sections.index')
            ->with('success', 'Partner logo section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'logos' => 'nullable|array',
            'logos.*.name' => 'nullable|string|max:255',
            'logos.*.logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'logos.*.sort_order' => 'nullable|integer|min:0',
            'logos.*.status' => 'nullable|boolean',
        ]);
    }

    private function saveLogos(Request $request, PartnerLogoSection $section): void
    {
        $logos = $request->input('logos', []);

        foreach ($logos as $index => $logoData) {
            if (empty($logoData['name']) && ! $request->hasFile("logos.$index.logo")) {
                continue;
            }

            $logoPath = null;

            if ($request->hasFile("logos.$index.logo")) {
                $logoPath = $request->file("logos.$index.logo")
                    ->store('partner-logos', 'public');
            }

            $section->logos()->create([
                'name' => $logoData['name'] ?? 'Partner Logo',
                'logo' => $logoPath,
                'sort_order' => $logoData['sort_order'] ?? $index,
                'status' => ! empty($logoData['status']) ? 1 : 0,
            ]);
        }
    }
}