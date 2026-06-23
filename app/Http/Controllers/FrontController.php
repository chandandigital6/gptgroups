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

        return view('front.index', compact('banners', 'founderSection', 'whatWeDoSection','productBrands','productCategories','upcomingProducts','latestProducts'));
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







    public function brands()
    {
        return view('front.brands');
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




    public function products()
    {
        return view('front.products');
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
