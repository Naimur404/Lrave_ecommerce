<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class Pagescontroller extends Controller
{
    public function index(){
        $sliders = Slider::orderby('priority', 'asc')->get();
        $products = Product::orderby('id','desc')->paginate(9);
        return view('pages.index',compact('products','sliders'));
    }

}

