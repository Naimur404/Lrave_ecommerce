<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AdminProductController extends Controller
{
    public function create()
    {
        return view('admin.pages.product.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image'  => 'required'
        ]);

        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->slug = str::slug($request->title);
        $product->save();


        //PRODUCTIMAGE MODEL inser image

        //    if($request->hasFile('image')){
        //        $image = $request->file('image');
        //        $img = time() . '.' . $image->getClientOriginalExtension();
        //        $location = public_path('images/'.$img);
        //        Image::make($image)->save($location);
        //        $Product_image = new ProductImage;
        //        $Product_image->product_id= $product->id;
        //        $Product_image->image = $img;
        //        $Product_image->save();

        //    }
        if (count($request->image) > 0) {
            foreach ($request->image as $image) {

                //$image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $img);
                Image::make($image)->save($location);
                $Product_image = new ProductImage;
                $Product_image->product_id = $product->id;
                $Product_image->image = $img;
                $Product_image->save();
            }
        }
        return redirect()->route('admin.product.create');
    }
    public function show()
    {
        $products = Product::orderby('id', 'desc')->get();
        return view('admin.Pages.product.index')->with('products', $products);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.pages.product.edit')->with('product', $product);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        return redirect()->route('admin.product.index');

        //PRODUCTIMAGE MODEL inser image

        //    if($request->hasFile('image')){
        //        $image = $request->file('image');
        //        $img = time() . '.' . $image->getClientOriginalExtension();
        //        $location = public_path('images/'.$img);
        //        Image::make($image)->save($location);
        //        $Product_image = new ProductImage;
        //        $Product_image->product_id= $product->id;
        //        $Product_image->image = $img;
        //        $Product_image->save();

        //    }
        //     if(count($request->image)>0){
        // foreach($request->image as $image){

        //            //$image = $request->file('image');
        //            $img = time() . '.' . $image->getClientOriginalExtension();
        //            $location = public_path('images/'.$img);
        //            Image::make($image)->save($location);
        //            $Product_image = new ProductImage;
        //            $Product_image->product_id= $product->id;
        //            $Product_image->image = $img;
        //            $Product_image->save();
        //    }

        // }
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }
        session()->flash('sucess', 'Product delete sucessfully!!');
        return back();
    }
}
