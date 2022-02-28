<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Pagescontroller extends Controller
{
    public function index(){
        $products = Product::orderby('id','desc')->paginate(2);
        return view('pages.index',compact('products'));
    }
 
}

