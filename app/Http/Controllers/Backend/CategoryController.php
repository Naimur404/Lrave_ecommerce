<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::orderby('id', 'desc')->get();
        return view('admin.Pages.categories.index', compact('categories'));
    }
    public function create()
    {
        $main_category  = Category::orderby('id', 'desc')->where('praent_id', null)->get();
        return view('admin.Pages.categories.create', compact('main_category'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->praent_id = $request->praent_id;
        //insert image also
        if (!is_null($request->image)) {


                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $img);
                Image::make($image)->save($location);
                $category->image = $img;
        }

        $category->save();
        session()->flash('sucess', 'A new Category has Created');
        return redirect()->route('admin.category.index');
    }
}
