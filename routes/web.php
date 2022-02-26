<?php

use App\Http\Controllers\AdminPage;
use App\Http\Controllers\Pagescontroller;
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
Route::get('/products',[Pagescontroller::class,'products'])->name('products');
Route::group(['prefix'=> 'admin'],function(){

// Route::get('/',[AdminPage::class,'index'])->name('admin.index');
Route::get('/products/create',[AdminPage::class,'product_create'])->name('admin.product.create');
Route::post('/products',[AdminPage::class,'product_store'])->name('admin.product.store');
Route::get('/',[AdminPage::class,'show'])->name('admin.product.show');
Route::get('/products/create/{id}',[AdminPage::class,'product_edit'])->name('admin.product.edit');
});

