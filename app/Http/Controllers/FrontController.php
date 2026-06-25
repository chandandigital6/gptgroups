<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\FounderSection;
use App\Models\TeamMemberGpt;
use Illuminate\Http\Request;
use App\Models\WhatWeDoSection;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\Product;

class FrontController extends Controller
{

    public function index()
    {
        $banners = Banner::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        $founderSection = FounderSection::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->first();
        $whatWeDoSection = WhatWeDoSection::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->first();


              $productBrands = ProductBrand::where('status', 1)
        ->withCount(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->limit(8)
        ->get();

    $productCategories = ProductCategory::with('brand')
        ->where('status', 1)
        ->withCount(['products' => function ($query) {
            $query->where('status', 1);
        }])
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->limit(8)
        ->get();

    $latestProducts = Product::with(['brand', 'category'])
        ->where('status', 1)
        ->where('product_type', 'latest')
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->limit(12)
        ->get();

    $upcomingProducts = Product::with(['brand', 'category'])
        ->where('status', 1)
        ->where('product_type', 'upcoming')
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->limit(8)
        ->get();

          $companyOverview = \App\Models\CompanyOverview::active()
        ->orderBy('sort_order')
        ->latest()
        ->first();


         $networkSection = \App\Models\NetworkSection::active()
        ->orderBy('sort_order')
        ->latest()
        ->first();

         $retailOutletSection = \App\Models\RetailOutletSection::active()
        ->orderBy('sort_order')
        ->latest()
        ->first();


           $strategySection = \App\Models\StrategySection::active()
        ->orderBy('sort_order')
        ->latest()
        ->first();

        return view('front.index', compact('banners', 'founderSection', 'whatWeDoSection','productBrands','productCategories','upcomingProducts','latestProducts','companyOverview','networkSection','retailOutletSection','strategySection'));
    }


    public function about()
    {
        $founderSection = FounderSection::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->first();

        $teamMembers = TeamMemberGpt::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        $whatWeDoSection = WhatWeDoSection::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->first();
        return view('front.about', compact('founderSection', 'teamMembers', 'whatWeDoSection'));
    }




//    public function brands()
//     {
//         $brands = ProductBrand::where('status', 1)
//             ->withCount([
//                 'products' => function ($query) {
//                     $query->where('status', 1);
//                 },
//                 'categories' => function ($query) {
//                     $query->where('status', 1);
//                 },
//             ])
//             ->orderBy('sort_order', 'asc')
//             ->latest()
//             ->paginate(12);

//         return view('front.brands', compact('brands'));
//     }

  


public function brands()
{
    $brands = ProductBrand::where('status', 1)
        ->withCount([
            'products' => function ($query) {
                $query->where('status', 1);
            },
            'categories' => function ($query) {
                $query->where('status', 1);
            },
        ])
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->paginate(12);

    $productCategories = ProductCategory::with('brand')
        ->where('status', 1)
        ->withCount([
            'products' => function ($query) {
                $query->where('status', 1);
            },
        ])
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->limit(6)
        ->get();

    return view('front.brands', compact('brands', 'productCategories'));
}


public function brandCategories(ProductBrand $brand)
    {
        abort_if($brand->status != 1, 404);

        $categories = ProductCategory::with('brand')
            ->where('status', 1)
            ->where('product_brand_id', $brand->id)
            ->withCount(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(12);

        $latestProducts = Product::with(['brand', 'category'])
            ->where('status', 1)
            ->where('product_brand_id', $brand->id)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->limit(8)
            ->get();

        return view('front.brand_categories', compact(
            'brand',
            'categories',
            'latestProducts'
        ));
    }

    public function categoryProducts(ProductBrand $brand, ProductCategory $category)
    {
        abort_if($brand->status != 1, 404);
        abort_if($category->status != 1, 404);
        abort_if($category->product_brand_id != $brand->id, 404);

        $products = Product::with(['brand', 'category'])
            ->where('status', 1)
            ->where('product_brand_id', $brand->id)
            ->where('product_category_id', $category->id)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(12);

        $otherCategories = ProductCategory::where('status', 1)
            ->where('product_brand_id', $brand->id)
            ->where('id', '!=', $category->id)
            ->withCount(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->orderBy('sort_order', 'asc')
            ->limit(6)
            ->get();

        return view('front.category_products', compact(
            'brand',
            'category',
            'products',
            'otherCategories'
        ));
    }

    public function products()
    {
        $products = Product::with(['brand', 'category'])
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(12);

        return view('front.products', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::with(['brand', 'category'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $relatedProducts = Product::with(['brand', 'category'])
            ->where('status', 1)
            ->where('id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                $query->where('product_brand_id', $product->product_brand_id)
                    ->orWhere('product_category_id', $product->product_category_id);
            })
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->limit(4)
            ->get();

        return view('front.product_detail', compact('product', 'relatedProducts'));
    }


    

    public function productDetailold($slug)
{
    $product = Product::with(['brand', 'category'])
        ->where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

    $relatedProducts = Product::with(['brand', 'category'])
        ->where('status', 1)
        ->where('id', '!=', $product->id)
        ->where(function ($query) use ($product) {
            $query->where('product_brand_id', $product->product_brand_id)
                ->orWhere('product_category_id', $product->product_category_id);
        })
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->limit(4)
        ->get();

    return view('front.product_detail', compact('product', 'relatedProducts'));
}



    public function groups_company()
    {
        return view('front.groups_company');
    }



    public function network()
    {
        return view('front.network');
    }



    public function news()
    {
        return view('front.news');
    }


    public function retail_outlet()
    {
        return view('front.retail_outlet');
    }



    public function carriers()
    {
        return view('front.carriers');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function services()
    {
        return view('front.services');
    }
}
