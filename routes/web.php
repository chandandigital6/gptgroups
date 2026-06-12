<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;


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






// Route::view('/', 'welcome', [
//     'canRegister' => Features::enabled(Features::registration()),
// ])->name('home');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
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

require __DIR__.'/settings.php';