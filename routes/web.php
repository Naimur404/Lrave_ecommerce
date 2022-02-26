<?php

use App\Http\Controllers\Backend\AdminPage;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Fontend\Pagescontroller;
use App\Http\Controllers\Fontend\ProductController;
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

Route::get('/',[Pagescontroller::class,'index'])->name('index');
Route::get('/products',[ProductController::class,'products'])->name('products');
Route::group(['prefix'=> 'admin'],function(){

// Route::get('/',[AdminPage::class,'index'])->name('admin.index');
Route::group(['prefix '=> '/product'],function(){

    Route::get('/create',[AdminProductController::class,'create'])->name('admin.product.create');
    Route::post('/store',[AdminProductController::class,'store'])->name('admin.product.store');
    Route::post('/edit/{id}',[AdminProductController::class,'update'])->name('admin.product.update');
    Route::post('/delete/{id}',[AdminProductController::class,'delete'])->name('admin.product.delete');
    Route::get('/',[AdminProductController::class,'show'])->name('admin.product.index');
    Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('admin.product.edit');
});

});

