<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $brands = Brand::orderby('id', 'desc')->get();
        return view('admin.Pages.brand.index', compact('brands'));
    }
    public function create()
    {

        return view('admin.Pages.brand.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        //insert image also
        if (!is_null($request->image)) {


            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }

        $brand->save();
        session()->flash('sucess', 'A new Brand has Created');
        return redirect()->route('admin.brand.index');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        if (!is_null($brand)) {
            return view('admin.Pages.brand.edit', compact('brand'));
        } else {
            return redirect()->route('admin.brand.index');
        }
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image'
        ]);
        $brand =  Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;

        //insert image also
        if (!is_null($request->image)) {

            //delete the old image from folder
            if (file_exists(public_path('images/' . $brand->image))) {
                File::delete(public_path('images/' . $brand->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }

        $brand->save();
        session()->flash('sucess', ' Brand has updated sucessfully');
        return redirect()->route('admin.brand.index');
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            //if it is parent brand , then delete all its subcategory

            //delete brand image
            if (file_exists(public_path('images/' . $brand->image))) {
                File::delete(public_path('images/' . $brand->image));
            }
            $brand->delete();
        }
        session()->flash('sucess', 'brand deleted successfully');
        return back();
    }
}
