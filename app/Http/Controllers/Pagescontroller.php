<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Pagescontroller extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function products(){
        $products = Product::orderby('id','desc')->get();
        return view('pages.product.index')->with('products',$products);
    }
}

