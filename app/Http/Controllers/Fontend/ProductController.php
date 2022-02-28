<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function products(){
        $products = Product::orderby('id','desc')->paginate(9);
        return view('pages.product.index')->with('products',$products);
    }
    public function show($slug){
      $product = Product::where('slug', $slug)->first();
      if(!is_null($product)){
return view('pages.product.show',compact('product'));

      }else{
          session()->flash('errors' ,'sorry  product not fund');
          return redirect()->route('products');
      }

    }
    public function search(Request $request){
        $search = $request->search;
        //onwhere use for search multiple parameter
        $products = Product::orwhere('title','like', '%'.$search.'%')
        ->orwhere('description','like', '%'.$search.'%')
        ->paginate(9);
return view('pages.product.search', compact('search','products'));

    }
}
