<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Project\ProjectEstimationController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ClientController;
use App\Http\Controllers\Project\TeamController;
use App\Http\Controllers\Project\TeamMembersController;

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;

use App\Http\Controllers\Accounts\AccountGroupController;
use App\Http\Controllers\Accounts\ChartofAccountController;

use App\Http\Controllers\Stock\StockController;

use App\Http\Controllers\settings\UnitController;
use App\Http\Controllers\settings\PaymentMethodController;
use App\Http\Controllers\settings\TransferController;
use App\Http\Controllers\settings\TransectionHistoryController;

use App\Http\Controllers\DesignationController;
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
        Route::get('append-categories-level',[CategoryController::class,'appendCategoryLevel'])->name('appendCategory');
        Route::post('update-category-status',[CategoryController::class,'updateCategoryStatus'])->name('updateCategoryStatus');
        Route::resource('product', ProductController::class);
        Route::post('update-product-status',[ProductController::class,'updateProductStatus'])->name('updateProductStatus');
        //Supplier Management
        Route::resource('supplier',SupplierController::class);
        Route::post('update-supplier-status',[SupplierController::class,'updateSupplierStatus'])->name('updateSupplierStatus');
        Route::get('supplier-advance',[SupplierController::class,'advanceSupplier'])->name('supplier.advance');
        Route::get('supplier-payable',[SupplierController::class,'payableSupplier'])->name('supplier.payable');
        
        //Project Management
        Route::resource('client',ClientController::class);
        Route::resource('team',TeamController::class);
        Route::post('update-team-status',[TeamController::class,'updateTeamStatus'])->name('updateTeamStatus');
        Route::resource('team-members',TeamMembersController::class);
        Route::resource('project',ProjectController::class);
        Route::resource('project-estimation',ProjectEstimationController::class);

        // Stock
        Route::resource('stock', StockController::class);
        Route::get('stock-edit/{slug}/{id}',[StockController::class,'editStock']);
        
        // Invoice
        Route::resource('invoice', InvoiceController::class);
        Route::get('invoice-purchase', [InvoiceController::class,'purchaseIndex'])->name('purchase_index');
        Route::get('invoice-purchase-create', [InvoiceController::class,'purchaseCreate'])->name('purchase_create');
        Route::get('invoice-sell', [InvoiceController::class,'sellIndex'])->name('sell_index');
        Route::get('invoice-sell-create', [InvoiceController::class,'sellCreate'])->name('sell_create');
        Route::get('invoice-project', [InvoiceController::class,'projectIndex'])->name('project_index');
        Route::get('invoice-project-create', [InvoiceController::class,'projectCreate'])->name('project_create');
        Route::resource('invoice-details', InvoiceDetailController::class);
        // Accounts
        Route::resource('accounts', AccountGroupController::class);
        Route::resource('chart-of-account',ChartofAccountController::class);
        // settings
        Route::resource('unit', UnitController::class);
        Route::post('update-unit-status',[UnitController::class,'updateUnitStatus'])->name('UnitStatus');
        Route::resource('payment-method', PaymentMethodController::class);
        Route::post('update-payment-method-status',[PaymentMethodController::class,'updateMethodStatus'])->name('updateMethodStatus');
        Route::resource('transection-history', TransectionHistoryController::class);
        Route::resource('payment-transfer', TransferController::class);
        // Role Management
        Route::resource('designation',DesignationController::class);
        Route::post('update-designation-status',[DesignationController::class,'updateDesignationStatus'])->name('updateDesignationStatus');
        Route::resource('role', RoleController::class);
    });
});
