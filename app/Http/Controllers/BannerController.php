<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('highlight', 'like', "%{$search}%")
                    ->orWhere('badge', 'like', "%{$search}%");
            });
        }

        $banners = $query->orderBy('sort_order')->latest()->paginate(10);

        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'highlight' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'second_button_text' => 'nullable|string|max:255',
            'second_button_link' => 'nullable|string|max:255',

            'desktop_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'theme' => 'required|in:cyan,yellow,emerald',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['desktop_image', 'mobile_image', 'product_image']);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('desktop_image')) {
            $data['desktop_image'] = $request->file('desktop_image')->store('banners', 'public');
        }

        if ($request->hasFile('mobile_image')) {
            $data['mobile_image'] = $request->file('mobile_image')->store('banners', 'public');
        }

        if ($request->hasFile('product_image')) {
            $data['product_image'] = $request->file('product_image')->store('banners', 'public');
        }

        Banner::create($data);

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'highlight' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',

            'second_button_text' => 'nullable|string|max:255',
            'second_button_link' => 'nullable|string|max:255',

            'desktop_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'mobile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'theme' => 'required|in:cyan,yellow,emerald',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['desktop_image', 'mobile_image', 'product_image']);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('desktop_image')) {
            if ($banner->desktop_image) {
                Storage::disk('public')->delete($banner->desktop_image);
            }

            $data['desktop_image'] = $request->file('desktop_image')->store('banners', 'public');
        }

        if ($request->hasFile('mobile_image')) {
            if ($banner->mobile_image) {
                Storage::disk('public')->delete($banner->mobile_image);
            }

            $data['mobile_image'] = $request->file('mobile_image')->store('banners', 'public');
        }

        if ($request->hasFile('product_image')) {
            if ($banner->product_image) {
                Storage::disk('public')->delete($banner->product_image);
            }

            $data['product_image'] = $request->file('product_image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->desktop_image) {
            Storage::disk('public')->delete($banner->desktop_image);
        }

        if ($banner->mobile_image) {
            Storage::disk('public')->delete($banner->mobile_image);
        }

        if ($banner->product_image) {
            Storage::disk('public')->delete($banner->product_image);
        }

        $banner->delete();

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner deleted successfully.');
    }

}