<?php

use App\Http\Controllers\Backend\AdminPage;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Fontend\CategoryController as FontendCategoryController;
use App\Http\Controllers\Fontend\Pagescontroller;
use App\Http\Controllers\Fontend\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Pagescontroller::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [ProductController::class, 'search'])->name('search');

//categories routes
Route::get('/Category', [FontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/Category/{id}', [FontendCategoryController::class, 'show'])->name('categories.show');


Route::group(['prefix' => 'admin'], function () {

    // Route::get('/',[AdminPage::class,'index'])->name('admin.index');
    Route::group(['prefix ' => '/product'], function () {

        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('admin.product.store');
        Route::post('/edit/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
        Route::post('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/', [AdminProductController::class, 'show'])->name('admin.product.index');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    });

    //categories route
    Route::group(['prefix ' => '/categories'], function () {

        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::post('/categories/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    });
    //brand routes
    Route::group(['prefix ' => '/brands'], function () {

        Route::get('/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('/brand/store', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::post('/brand/edit/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::post('/brand/delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::get('/brand', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [Pagescontroller::class, 'index'])->name('index');
