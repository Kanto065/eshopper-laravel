<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCat')->name('editsubcat');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
        Route::post('/admin/update-subcategory', 'UpdateSubCat')->name('updatesubcat');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-image/{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-image', 'UpdateProductImg')->name('updateproductimg');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');
    });
});

require __DIR__ . '/auth.php';