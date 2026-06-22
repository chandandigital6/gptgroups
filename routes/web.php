<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FounderSectionController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\WhatWeDoSectionController;


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/brands', [FrontController::class, 'brands'])->name('brands');
Route::get('/carriers', [FrontController::class, 'carriers'])->name('carriers');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/groups_company', [FrontController::class, 'groups_company'])->name('groups_company');
Route::get('/network', [FrontController::class, 'network'])->name('network');
Route::get('/news', [FrontController::class, 'news'])->name('news');
Route::get('/retail_outlet', [FrontController::class, 'retail_outlet'])->name('retail_outlet');
Route::get('/products', [FrontController::class, 'products'])->name('products');
Route::get('/services', [FrontController::class, 'services'])->name('services');







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
