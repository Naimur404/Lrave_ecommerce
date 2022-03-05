<?php

use App\Http\Controllers\Backend\AdminPage;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\DistrictsController;
use App\Http\Controllers\Backend\DivisionsController;
use App\Http\Controllers\Fontend\CategoryController as FontendCategoryController;
use App\Http\Controllers\Fontend\Pagescontroller;
use App\Http\Controllers\Fontend\ProductController;
use App\Http\Controllers\Fontend\UsersController;
use App\Http\Controllers\Fontend\verificationController;
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
    Route::group(['prefix ' => '/'], function () {

        Route::get('/product/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/product/store', [AdminProductController::class, 'store'])->name('admin.product.store');
        Route::post('/product/edit/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
        Route::post('/product/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/', [AdminProductController::class, 'show'])->name('admin.product.index');
        Route::get('/product/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
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
    Route::group(['prefix ' => '/divison'], function () {

        Route::get('/divison/create', [DivisionsController::class, 'create'])->name('admin.division.create');
        Route::post('/divison/store', [DivisionsController::class, 'store'])->name('admin.division.store');
        Route::post('/divison/edit/{id}', [DivisionsController::class, 'update'])->name('admin.division.update');
        Route::post('/divison/delete/{id}', [DivisionsController::class, 'delete'])->name('admin.division.delete');
        Route::get('/divison', [DivisionsController::class, 'index'])->name('admin.division.index');
        Route::get('/division/edit/{id}', [DivisionsController::class, 'edit'])->name('admin.division.edit');
    });

    Route::group(['prefix ' => '/district'], function () {

        Route::get('/district/create', [DistrictsController::class, 'create'])->name('admin.district.create');
        Route::post('/district/store', [DistrictsController::class, 'store'])->name('admin.district.store');
        Route::post('/district/edit/{id}', [DistrictsController::class, 'update'])->name('admin.district.update');
        Route::post('/district/delete/{id}', [DistrictsController::class, 'delete'])->name('admin.district.delete');
        Route::get('/district', [DistrictsController::class, 'index'])->name('admin.district.index');
        Route::get('/district/edit/{id}', [DistrictsController::class, 'edit'])->name('admin.district.edit');
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [Pagescontroller::class, 'index'])->name('index');

//user verification route

Route::group(['prefix ' => '/'], function () {
    Route::get('/token/{token}', [verificationController::class, 'verify'])->name('user.verification');
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UsersController::class, 'profile'])->name('user.profile');
    Route::get('/profile/update', [UsersController::class, 'updateprofile'])->name('user.profile.update');
});
