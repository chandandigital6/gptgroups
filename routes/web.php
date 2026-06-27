<?php

use App\Http\Controllers\B2bBenefitSectionController;
use App\Http\Controllers\B2bProgramSectionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompanyOverviewController;
use App\Http\Controllers\FaqSectionController;
use App\Http\Controllers\FounderSectionController;
use App\Http\Controllers\NetworkSectionController;
use App\Http\Controllers\PageHeroController;
use App\Http\Controllers\PartnerLogoSectionController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\QuickFactSectionController;
use App\Http\Controllers\RepairServiceSectionController;
use App\Http\Controllers\RetailOutletSectionController;
use App\Http\Controllers\ServiceSectionController;
use App\Http\Controllers\StrategySectionController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TestimonialSectionController;
use App\Http\Controllers\WhatWeDoSectionController;


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/brands', [FrontController::class, 'brands'])->name('brands');
Route::get('/brands/{brand:slug}', [FrontController::class, 'brandCategories'])->name('brands.show');
Route::get('/brands/{brand:slug}/categories/{category:slug}', [FrontController::class, 'categoryProducts'])
    ->name('brands.categories.show');
Route::get('/carriers', [FrontController::class, 'carriers'])->name('carriers');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/groups_company', [FrontController::class, 'groups_company'])->name('groups_company');
Route::get('/network', [FrontController::class, 'network'])->name('network');
Route::get('/news', [FrontController::class, 'news'])->name('news');
Route::get('/retail_outlet', [FrontController::class, 'retail_outlet'])->name('retail_outlet');
Route::get('/products', [FrontController::class, 'products'])->name('products');
Route::get('/services', [FrontController::class, 'services'])->name('services');
Route::get('/product/{slug}', [FrontController::class, 'productDetail'])->name('product.detail');







Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });



Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/banners', [BannerController::class, 'index'])
        ->name('banners.index');

    Route::get('/banners/create', [BannerController::class, 'create'])
        ->name('banners.create');

    Route::post('/banners', [BannerController::class, 'store'])
        ->name('banners.store');

    Route::get('/banners/{banner}', [BannerController::class, 'show'])
        ->name('banners.show');

    Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])
        ->name('banners.edit');

    Route::put('/banners/{banner}', [BannerController::class, 'update'])
        ->name('banners.update');

    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])
        ->name('banners.destroy');



    Route::get('/founder-sections', [FounderSectionController::class, 'index'])->name('founder-sections.index');
    Route::get('/founder-sections/create', [FounderSectionController::class, 'create'])->name('founder-sections.create');
    Route::post('/founder-sections', [FounderSectionController::class, 'store'])->name('founder-sections.store');
    Route::get('/founder-sections/{founderSection}', [FounderSectionController::class, 'show'])->name('founder-sections.show');
    Route::get('/founder-sections/{founderSection}/edit', [FounderSectionController::class, 'edit'])->name('founder-sections.edit');
    Route::put('/founder-sections/{founderSection}', [FounderSectionController::class, 'update'])->name('founder-sections.update');
    Route::delete('/founder-sections/{founderSection}', [FounderSectionController::class, 'destroy'])->name('founder-sections.destroy');




    Route::get('/team-members', [TeamMemberController::class, 'index'])->name('team-members.index');
    Route::get('/team-members/create', [TeamMemberController::class, 'create'])->name('team-members.create');
    Route::post('/team-members', [TeamMemberController::class, 'store'])->name('team-members.store');
    Route::get('/team-members/{teamMember}', [TeamMemberController::class, 'show'])->name('team-members.show');
    Route::get('/team-members/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('team-members.edit');
    Route::put('/team-members/{teamMember}', [TeamMemberController::class, 'update'])->name('team-members.update');
    Route::delete('/team-members/{teamMember}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');


    Route::get('/what-we-do-sections', [WhatWeDoSectionController::class, 'index'])->name('what-we-do-sections.index');
    Route::get('/what-we-do-sections/create', [WhatWeDoSectionController::class, 'create'])->name('what-we-do-sections.create');
    Route::post('/what-we-do-sections', [WhatWeDoSectionController::class, 'store'])->name('what-we-do-sections.store');
    Route::get('/what-we-do-sections/{whatWeDoSection}', [WhatWeDoSectionController::class, 'show'])->name('what-we-do-sections.show');
    Route::get('/what-we-do-sections/{whatWeDoSection}/edit', [WhatWeDoSectionController::class, 'edit'])->name('what-we-do-sections.edit');
    Route::put('/what-we-do-sections/{whatWeDoSection}', [WhatWeDoSectionController::class, 'update'])->name('what-we-do-sections.update');
    Route::delete('/what-we-do-sections/{whatWeDoSection}', [WhatWeDoSectionController::class, 'destroy'])->name('what-we-do-sections.destroy');




    Route::get('/product-brands', [ProductBrandController::class, 'index'])->name('product-brands.index');
    Route::get('/product-brands/create', [ProductBrandController::class, 'create'])->name('product-brands.create');
    Route::post('/product-brands', [ProductBrandController::class, 'store'])->name('product-brands.store');
    Route::get('/product-brands/{productBrand}/edit', [ProductBrandController::class, 'edit'])->name('product-brands.edit');
    Route::put('/product-brands/{productBrand}', [ProductBrandController::class, 'update'])->name('product-brands.update');
    Route::delete('/product-brands/{productBrand}', [ProductBrandController::class, 'destroy'])->name('product-brands.destroy');



    Route::get('/product-categories', [ProductCategoryController::class, 'index'])->name('product-categories.index');
    Route::get('/product-categories/create', [ProductCategoryController::class, 'create'])->name('product-categories.create');
    Route::post('/product-categories', [ProductCategoryController::class, 'store'])->name('product-categories.store');
    Route::get('/product-categories/{productCategory}/edit', [ProductCategoryController::class, 'edit'])->name('product-categories.edit');
    Route::put('/product-categories/{productCategory}', [ProductCategoryController::class, 'update'])->name('product-categories.update');
    Route::delete('/product-categories/{productCategory}', [ProductCategoryController::class, 'destroy'])->name('product-categories.destroy');



    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


     Route::get('/company-overviews', [CompanyOverviewController::class, 'index'])
        ->name('company-overviews.index');

    Route::get('/company-overviews/create', [CompanyOverviewController::class, 'create'])
        ->name('company-overviews.create');

    Route::post('/company-overviews', [CompanyOverviewController::class, 'store'])
        ->name('company-overviews.store');

    Route::get('/company-overviews/{companyOverview}', [CompanyOverviewController::class, 'show'])
        ->name('company-overviews.show');

    Route::get('/company-overviews/{companyOverview}/edit', [CompanyOverviewController::class, 'edit'])
        ->name('company-overviews.edit');

    Route::put('/company-overviews/{companyOverview}', [CompanyOverviewController::class, 'update'])
        ->name('company-overviews.update');

    Route::delete('/company-overviews/{companyOverview}', [CompanyOverviewController::class, 'destroy'])
        ->name('company-overviews.destroy');




Route::get('/network-sections', [NetworkSectionController::class, 'index'])
        ->name('network-sections.index');

    Route::get('/network-sections/create', [NetworkSectionController::class, 'create'])
        ->name('network-sections.create');

    Route::post('/network-sections', [NetworkSectionController::class, 'store'])
        ->name('network-sections.store');

    Route::get('/network-sections/{networkSection}', [NetworkSectionController::class, 'show'])
        ->name('network-sections.show');

    Route::get('/network-sections/{networkSection}/edit', [NetworkSectionController::class, 'edit'])
        ->name('network-sections.edit');

    Route::put('/network-sections/{networkSection}', [NetworkSectionController::class, 'update'])
        ->name('network-sections.update');

    Route::delete('/network-sections/{networkSection}', [NetworkSectionController::class, 'destroy'])
        ->name('network-sections.destroy');



         Route::get('/retail-outlet-sections', [RetailOutletSectionController::class, 'index'])
        ->name('retail-outlet-sections.index');

    Route::get('/retail-outlet-sections/create', [RetailOutletSectionController::class, 'create'])
        ->name('retail-outlet-sections.create');

    Route::post('/retail-outlet-sections', [RetailOutletSectionController::class, 'store'])
        ->name('retail-outlet-sections.store');

    Route::get('/retail-outlet-sections/{retailOutletSection}', [RetailOutletSectionController::class, 'show'])
        ->name('retail-outlet-sections.show');

    Route::get('/retail-outlet-sections/{retailOutletSection}/edit', [RetailOutletSectionController::class, 'edit'])
        ->name('retail-outlet-sections.edit');

    Route::put('/retail-outlet-sections/{retailOutletSection}', [RetailOutletSectionController::class, 'update'])
        ->name('retail-outlet-sections.update');

    Route::delete('/retail-outlet-sections/{retailOutletSection}', [RetailOutletSectionController::class, 'destroy'])
        ->name('retail-outlet-sections.destroy');




          Route::get('/strategy-sections', [StrategySectionController::class, 'index'])
        ->name('strategy-sections.index');

    Route::get('/strategy-sections/create', [StrategySectionController::class, 'create'])
        ->name('strategy-sections.create');

    Route::post('/strategy-sections', [StrategySectionController::class, 'store'])
        ->name('strategy-sections.store');

    Route::get('/strategy-sections/{strategySection}', [StrategySectionController::class, 'show'])
        ->name('strategy-sections.show');

    Route::get('/strategy-sections/{strategySection}/edit', [StrategySectionController::class, 'edit'])
        ->name('strategy-sections.edit');

    Route::put('/strategy-sections/{strategySection}', [StrategySectionController::class, 'update'])
        ->name('strategy-sections.update');

    Route::delete('/strategy-sections/{strategySection}', [StrategySectionController::class, 'destroy'])
        ->name('strategy-sections.destroy');



        Route::get('/faq-sections', [FaqSectionController::class, 'index'])
        ->name('faq-sections.index');

    Route::get('/faq-sections/create', [FaqSectionController::class, 'create'])
        ->name('faq-sections.create');

    Route::post('/faq-sections', [FaqSectionController::class, 'store'])
        ->name('faq-sections.store');

    Route::get('/faq-sections/{faqSection}', [FaqSectionController::class, 'show'])
        ->name('faq-sections.show');

    Route::get('/faq-sections/{faqSection}/edit', [FaqSectionController::class, 'edit'])
        ->name('faq-sections.edit');

    Route::put('/faq-sections/{faqSection}', [FaqSectionController::class, 'update'])
        ->name('faq-sections.update');

    Route::delete('/faq-sections/{faqSection}', [FaqSectionController::class, 'destroy'])
        ->name('faq-sections.destroy');


    Route::resource('partner-logo-sections', PartnerLogoSectionController::class);
    Route::resource('testimonial-sections', TestimonialSectionController::class);
    Route::resource('service-sections', ServiceSectionController::class);
    Route::resource('page-heroes', PageHeroController::class);
     Route::resource('repair-service-sections', RepairServiceSectionController::class);
      Route::resource('b2b-program-sections', B2bProgramSectionController::class);
    Route::resource('b2b-benefit-sections', B2bBenefitSectionController::class);
     Route::resource('quick-fact-sections', QuickFactSectionController::class);

});









Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);

    Route::delete('roles/{role}/permissions/{permission}', [RoleController::class, 'removePermission'])
        ->name('roles.permissions.remove');

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions/assign', [PermissionController::class, 'assign'])->name('permissions.assign');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');
});

Route::middleware(['auth'])->group(function () {
    Route::livewire('invitations/{invitation}/accept', 'pages::teams.accept-invitation')
        ->name('invitations.accept');
});








require __DIR__ . '/settings.php';
