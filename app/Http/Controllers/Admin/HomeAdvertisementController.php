<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HomeAdvertisementController extends Controller
{
    /**
     * Advertisement listing.
     */
   public function index(Request $request): View
{
    $search = trim((string) $request->query('search', ''));
    $status = trim((string) $request->query('status', ''));

    $advertisements = HomeAdvertisement::query()
        ->when($search !== '', function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where('brand', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%")
                    ->orWhere('launch_text', 'like', "%{$search}%");
            });
        })
        ->when($status === 'active', function ($query) {
            $query->where('is_active', true);
        })
        ->when($status === 'inactive', function ($query) {
            $query->where('is_active', false);
        })
        ->orderBy('sort_order')
        ->latest('id')
        ->paginate(15)
        ->withQueryString();

    $stats = [
        'total' => HomeAdvertisement::count(),

        'active' => HomeAdvertisement::where(
            'is_active',
            true
        )->count(),

        'inactive' => HomeAdvertisement::where(
            'is_active',
            false
        )->count(),

        'running' => HomeAdvertisement::query()
            ->currentlyActive()
            ->count(),
    ];

    return view(
        'homeadvertisements.index',
        compact('advertisements', 'stats')
    );
}

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('homeadvertisements.create');
    }

    /**
     * Store advertisement.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'brand' => [
                'nullable',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'link' => [
                'nullable',
                'string',
                'max:2048',
            ],

            'launch_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'launch_note' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'starts_at' => [
                'nullable',
                'date',
            ],

            'ends_at' => [
                'nullable',
                'date',
                'after_or_equal:starts_at',
            ],
        ]);

        $validated['image'] = $request
            ->file('image')
            ->store('home-advertisements', 'public');

        $validated['launch_text'] =
            $validated['launch_text'] ?: 'Coming Soon';

        $validated['sort_order'] =
            (int) ($validated['sort_order'] ?? 0);

        $validated['is_active'] =
            $request->boolean('is_active');

        HomeAdvertisement::create($validated);

        return redirect()
            ->route('home-advertisements.index')
            ->with('success', 'Advertisement created successfully.');
    }

    /**
     * Show single advertisement.
     */
    public function show(HomeAdvertisement $homeAdvertisement): View
    {
        return view(
            'homeadvertisements.show',
            compact('homeAdvertisement')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(HomeAdvertisement $homeAdvertisement): View
    {
        return view(
            'homeadvertisements.edit',
            compact('homeAdvertisement')
        );
    }

    /**
     * Update advertisement.
     */
    public function update(
        Request $request,
        HomeAdvertisement $homeAdvertisement
    ): RedirectResponse {
        $validated = $request->validate([
            'brand' => [
                'nullable',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'link' => [
                'nullable',
                'string',
                'max:2048',
            ],

            'launch_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'launch_note' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'starts_at' => [
                'nullable',
                'date',
            ],

            'ends_at' => [
                'nullable',
                'date',
                'after_or_equal:starts_at',
            ],
        ]);

        if ($request->hasFile('image')) {
            if (
                $homeAdvertisement->image &&
                Storage::disk('public')->exists(
                    $homeAdvertisement->image
                )
            ) {
                Storage::disk('public')->delete(
                    $homeAdvertisement->image
                );
            }

            $validated['image'] = $request
                ->file('image')
                ->store('home-advertisements', 'public');
        }

        $validated['launch_text'] =
            $validated['launch_text'] ?: 'Coming Soon';

        $validated['sort_order'] =
            (int) ($validated['sort_order'] ?? 0);

        $validated['is_active'] =
            $request->boolean('is_active');

        $homeAdvertisement->update($validated);

        return redirect()
            ->route('home-advertisements.index')
            ->with('success', 'Advertisement updated successfully.');
    }

    /**
     * Delete advertisement.
     */
    public function destroy(
        HomeAdvertisement $homeAdvertisement
    ): RedirectResponse {
        if (
            $homeAdvertisement->image &&
            Storage::disk('public')->exists(
                $homeAdvertisement->image
            )
        ) {
            Storage::disk('public')->delete(
                $homeAdvertisement->image
            );
        }

        $homeAdvertisement->delete();

        return redirect()
            ->route('home-advertisements.index')
            ->with('success', 'Advertisement deleted successfully.');
    }

    /**
     * Active/inactive status change.
     */
    public function toggleStatus(
        HomeAdvertisement $homeAdvertisement
    ): RedirectResponse {
        $homeAdvertisement->update([
            'is_active' => !$homeAdvertisement->is_active,
        ]);

        return back()->with(
            'success',
            $homeAdvertisement->is_active
                ? 'Advertisement activated successfully.'
                : 'Advertisement deactivated successfully.'
        );
    }
}