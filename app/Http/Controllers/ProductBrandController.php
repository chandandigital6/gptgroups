<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductBrandController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductBrand::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $brands = $query
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(10);

        return view('product_brands.index', compact('brands'));
    }

    public function create()
    {
        return view('product_brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:product_brands,slug',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['logo', 'banner_image']);

        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('product-brands/logos', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('product-brands/banners', 'public');
        }

        ProductBrand::create($data);

        return redirect()
            ->route('product-brands.index')
            ->with('success', 'Product brand created successfully.');
    }

    public function edit(ProductBrand $productBrand)
    {
        return view('product_brands.edit', compact('productBrand'));
    }

    public function update(Request $request, ProductBrand $productBrand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:product_brands,slug,' . $productBrand->id,
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['logo', 'banner_image']);

        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('logo')) {
            if ($productBrand->logo) {
                Storage::disk('public')->delete($productBrand->logo);
            }

            $data['logo'] = $request->file('logo')->store('product-brands/logos', 'public');
        }

        if ($request->hasFile('banner_image')) {
            if ($productBrand->banner_image) {
                Storage::disk('public')->delete($productBrand->banner_image);
            }

            $data['banner_image'] = $request->file('banner_image')->store('product-brands/banners', 'public');
        }

        $productBrand->update($data);

        return redirect()
            ->route('product-brands.index')
            ->with('success', 'Product brand updated successfully.');
    }

    public function destroy(ProductBrand $productBrand)
    {
        if ($productBrand->logo) {
            Storage::disk('public')->delete($productBrand->logo);
        }

        if ($productBrand->banner_image) {
            Storage::disk('public')->delete($productBrand->banner_image);
        }

        $productBrand->delete();

        return redirect()
            ->route('product-brands.index')
            ->with('success', 'Product brand deleted successfully.');
    }
}