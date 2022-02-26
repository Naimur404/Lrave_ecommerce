<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function products(){
        $products = Product::orderby('id','desc')->get();
        return view('pages.product.index')->with('products',$products);
    }
    public function show($slug){
        
    }
}
