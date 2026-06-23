<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'category']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('model_no', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('badge', 'like', "%{$search}%")
                    ->orWhereHas('brand', function ($brandQuery) use ($search) {
                        $brandQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('brand')) {
            $query->where('product_brand_id', $request->brand);
        }

        if ($request->filled('category')) {
            $query->where('product_category_id', $request->category);
        }

        if ($request->filled('product_type')) {
            $query->where('product_type', $request->product_type);
        }

        $products = $query
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(10);

        $brands = ProductBrand::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $categories = ProductCategory::with('brand')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('products.index', compact('products', 'brands', 'categories'));
    }

    public function create()
    {
        $brands = ProductBrand::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $categories = ProductCategory::with('brand')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_brand_id' => 'nullable|exists:product_brands,id',
            'product_category_id' => 'nullable|exists:product_categories,id',

            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',

            'model_no' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'product_type' => 'required|in:latest,upcoming,normal',

            'short_description' => 'nullable|string',
            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'tags' => 'nullable|string',
            'specifications' => 'nullable|string',

            'launch_date' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',

            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['image', 'gallery', 'tags', 'specifications']);

        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        $data['tags'] = $this->makeArray($request->tags);
        $data['specifications'] = $this->makeKeyValueArray($request->specifications);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];

            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('products/gallery', 'public');
            }

            $data['gallery'] = $gallery;
        }

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load(['brand', 'category']);

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $brands = ProductBrand::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $categories = ProductCategory::with('brand')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return view('products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_brand_id' => 'nullable|exists:product_brands,id',
            'product_category_id' => 'nullable|exists:product_categories,id',

            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,

            'model_no' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'product_type' => 'required|in:latest,upcoming,normal',

            'short_description' => 'nullable|string',
            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'tags' => 'nullable|string',
            'specifications' => 'nullable|string',

            'launch_date' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',

            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['image', 'gallery', 'tags', 'specifications']);

        $data['slug'] = $request->slug ?: Str::slug($request->name);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        $data['tags'] = $this->makeArray($request->tags);
        $data['specifications'] = $this->makeKeyValueArray($request->specifications);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('gallery')) {
            if (is_array($product->gallery)) {
                foreach ($product->gallery as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $gallery = [];

            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('products/gallery', 'public');
            }

            $data['gallery'] = $gallery;
        }

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        if (is_array($product->gallery)) {
            foreach ($product->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function makeArray(?string $value): array
    {
        if (!$value) {
            return [];
        }

        return collect(explode(',', $value))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->toArray();
    }

    private function makeKeyValueArray(?string $value): array
    {
        if (!$value) {
            return [];
        }

        $rows = explode("\n", $value);
        $data = [];

        foreach ($rows as $row) {
            if (str_contains($row, ':')) {
                [$key, $val] = explode(':', $row, 2);
                $data[trim($key)] = trim($val);
            }
        }

        return $data;
    }
}