<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\FounderSection;
use App\Models\NewsCategory;
use App\Models\NewsPost;
use App\Models\TeamMemberGpt;
use Illuminate\Http\Request;
use App\Models\WhatWeDoSection;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\FaqSection;
use App\Models\B2bProgramSection;
use App\Models\B2bBenefitSection;


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

        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('home')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $partnerLogoSection = \App\Models\PartnerLogoSection::with('activeLogos')
            ->active()
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $testimonialSection = \App\Models\TestimonialSection::with('activeTestimonials')
            ->active()
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $serviceSection = \App\Models\ServiceSection::with('activeItems')
            ->active()
            ->orderBy('sort_order')
            ->latest()
            ->first();


        return view('front.index', compact('banners', 'founderSection', 'whatWeDoSection', 'productBrands', 'productCategories', 'upcomingProducts', 'latestProducts', 'companyOverview', 'networkSection', 'retailOutletSection', 'strategySection', 'faqSection', 'partnerLogoSection', 'testimonialSection', 'serviceSection'));
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

        $quickFactSection = \App\Models\QuickFactSection::with('activeItems')
            ->active()
            ->forPage($pageSlug ?? 'about')
            ->orderBy('sort_order')
            ->latest()
            ->first();



        return view('front.about', compact('founderSection', 'teamMembers', 'whatWeDoSection', 'quickFactSection'));
    }





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

        //Brand Portfolio
        $brandsPortfolio = \App\Models\B2bProgramSection::active()
            ->forPage('brand-portfolio')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('brands')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        // Partner Support
        $partnerSupportSection = \App\Models\B2bProgramSection::active()
            ->forPage('brand-partner-support')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        return view('front.brands', compact('brands', 'productCategories', 'brandsPortfolio', 'faqSection', 'partnerSupportSection'));
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

        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('products')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $productSupportSection = \App\Models\B2bProgramSection::active()
            ->forPage('product-support')
            ->orderBy('sort_order')
            ->latest()
            ->first();
        return view('front.products', compact('products', 'faqSection', 'productSupportSection'));
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




    public function groups_company()
    {
        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('Company')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $businessModelSection = \App\Models\B2bProgramSection::active()
            ->forPage('business-model-groups-company')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $groupPrinciplesSection = \App\Models\B2bProgramSection::active()
            ->forPage('group-principles')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $businessVerticalSection = \App\Models\BusinessVerticalSection::with('activeItems')
            ->active()
            ->forPage($pageSlug ?? 'groups-companies')
            ->orderBy('sort_order')
            ->latest()
            ->first();
        return view('front.groups_company', compact('faqSection', 'businessModelSection', 'groupPrinciplesSection', 'businessVerticalSection'));
    }



    public function network()
    {

        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('network')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $operatingModelSection = \App\Models\B2bProgramSection::active()
            ->forPage('network-operating-model')
            ->orderBy('sort_order')
            ->latest()
            ->first();


        // Coverage Locations Section
        $coverageLocationSection = \App\Models\B2bBenefitSection::with('activeItems')
            ->active()
            ->forPage('coverage-locations-network')
            ->orderBy('sort_order')
            ->latest()
            ->first();


        // Channels Section
        $channelNetworkSection = \App\Models\B2bBenefitSection::with('activeItems')
            ->active()
            ->forPage('channel-network')
            ->orderBy('sort_order')
            ->latest()
            ->first();


        return view('front.network', compact('faqSection', 'operatingModelSection', 'channelNetworkSection', 'coverageLocationSection'));
    }



  public function news()
{
    $faqSection = FaqSection::with('activeItems')
        ->active()
        ->forPage('news')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();

    $featuredUpdateSection = B2bProgramSection::active()
        ->forPage('news-feature')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();

    $newsCategorySection = B2bBenefitSection::with('activeItems')
        ->active()
        ->forPage('news-categories')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();

    $categories = NewsCategory::active()
        ->withCount(['posts' => function ($q) {
            $q->active();
        }])
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    $newsPosts = NewsPost::with('category')
        ->active()
        ->orderByDesc('published_date')
        ->orderByDesc('id')
        ->paginate(9);

    $latestNewsPosts = NewsPost::with('category')
        ->active()
        ->orderByDesc('published_date')
        ->orderByDesc('id')
        ->take(6)
        ->get();

    return view('front.news', compact(
        'faqSection',
        'featuredUpdateSection',
        'newsCategorySection',
        'categories',
        'newsPosts',
        'latestNewsPosts'
    ));
}

public function category($slug)
{
    $category = NewsCategory::active()
        ->where('slug', $slug)
        ->firstOrFail();

    $faqSection = FaqSection::with('activeItems')
        ->active()
        ->forPage('news')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();

    $featuredUpdateSection = B2bProgramSection::active()
        ->forPage('news-feature')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();

    $newsCategorySection = B2bBenefitSection::with('activeItems')
        ->active()
        ->forPage('news-categories')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();

    $categories = NewsCategory::active()
        ->withCount(['posts' => function ($q) {
            $q->active();
        }])
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    $newsPosts = NewsPost::with('category')
        ->active()
        ->where('news_category_id', $category->id)
        ->orderByDesc('published_date')
        ->orderByDesc('id')
        ->paginate(9);

    $latestNewsPosts = NewsPost::with('category')
        ->active()
        ->orderByDesc('published_date')
        ->orderByDesc('id')
        ->take(6)
        ->get();

    return view('front.news', compact(
        'faqSection',
        'featuredUpdateSection',
        'newsCategorySection',
        'categories',
        'newsPosts',
        'latestNewsPosts',
        'category'
    ));
}

public function show($slug)
{
    $newsPost = NewsPost::with('category')
        ->active()
        ->where('slug', $slug)
        ->firstOrFail();

    $relatedPosts = NewsPost::with('category')
        ->active()
        ->where('id', '!=', $newsPost->id)
        ->when($newsPost->news_category_id, function ($q) use ($newsPost) {
            $q->where('news_category_id', $newsPost->news_category_id);
        })
        ->orderByDesc('published_date')
        ->orderByDesc('id')
        ->take(3)
        ->get();

    return view('front.news.show', compact('newsPost', 'relatedPosts'));
}



    public function services()
    {
        $repairServiceSection = \App\Models\RepairServiceSection::with('activeItems')
            ->active()
            ->forPage('services')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        // GPT Care Section
        $gptCareSection = \App\Models\B2bProgramSection::active()
            ->forPage('services-care')
            ->orderBy('sort_order')
            ->latest()
            ->first();


        $b2bProgramSection = \App\Models\B2bProgramSection::active()
            ->forPage('services')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        // B2B Benefits Section
        $b2bBenefitSection = \App\Models\B2bBenefitSection::with('activeItems')
            ->active()
            ->forPage('services')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        // Repair Options Main Section
        $repairOptionSection = \App\Models\B2bBenefitSection::with('activeItems')
            ->active()
            ->forPage('services-main')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('services')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        return view('front.services', compact(
            'repairServiceSection',
            'b2bProgramSection',
            'b2bBenefitSection',
            'repairOptionSection',
            'gptCareSection',
            'faqSection',
        ));
    }


    public function retail_outlet()
    {
        $faqSection = \App\Models\FaqSection::with('activeItems')
            ->active()
            ->forPage('retail-outlets')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $storeSetupSupportSection = \App\Models\B2bProgramSection::active()
            ->forPage('retail-outlets-store')
            ->orderBy('sort_order')
            ->latest()
            ->first();

        $channelSupportSection = \App\Models\B2bBenefitSection::with('activeItems')
            ->active()
            ->forPage('retail-outlets')
            ->orderBy('sort_order')
            ->latest()
            ->first();

             $storeOutletSection = \App\Models\StoreOutletSection::with('activeOutlets.activeDetails')
        ->active()
        ->forPage($pageSlug ?? 'outlets')
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->first();


        return view('front.retail_outlet', compact('faqSection', 'storeSetupSupportSection', 'channelSupportSection','storeOutletSection'));
    }


    public function carriers()
    {
        // Why Work With Us Section
        $whyWorkSection = \App\Models\B2bBenefitSection::with('activeItems')
            ->active()
            ->forPage('why-work-with-us')
            ->orderBy('sort_order')
            ->latest()
            ->first();
        return view('front.carriers', compact('whyWorkSection'));
    }

    public function contact()
    {
        return view('front.contact');
    }
}
