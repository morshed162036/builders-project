<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::prefix('/')->group(function(){
    Route::match(['get', 'post'], 'login',[AdminController::class,'login'])->name('admin.login');
    Route::group(['middleware'=>['user']],function(){
        Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::resource('brand', BrandController::class);
        Route::post('update-brand-status',[BrandController::class,'updateBrandStatus'])->name('updateBrandStatus');
        Route::resource('catalogue', CatalogueController::class);
        Route::post('update-catalogue-status',[CatalogueController::class,'updateCatalogueStatus'])->name('updateCatalogueStatus');
        Route::resource('category', CategoryController::class);
        Route::get('append-categories-level',[CategoryController::class,'appendCategoryLevel'])->name('appendCategoryLevel');
        Route::post('update-category-status',[CategoryController::class,'updateCategoryStatus'])->name('updateCategoryStatus');
        Route::resource('role', RoleController::class);
    });
});
