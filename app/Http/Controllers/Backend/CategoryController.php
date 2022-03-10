<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
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

    public function edit($id)
    {
        $category = Category::find($id);
        $main_category  = Category::orderby('id', 'desc')->where('praent_id', null)->get();
        if (!is_null($category)) {
            return view('admin.Pages.categories.edit', compact('category', 'main_category'));
        } else {
            return redirect()->route('admin.category.index');
        }
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable|image'
        ]);
        $category =  Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->praent_id = $request->praent_id;
        //insert image also
        if (!is_null($request->image)) {

            //delete the old image from folder
            if (file_exists(public_path('images/' . $category->image))) {
                File::delete(public_path('images/' . $category->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }

        $category->save();
        session()->flash('sucess', ' Category has updated sucessfully');
        return redirect()->route('admin.category.index');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            //if it is parent category , then delete all its subcategory
            if ($category->praent_id == null) {
                $sub_category  = Category::orderby('id', 'desc')->where('praent_id', $category->id)->get();
                foreach ($sub_category as $sub) {
                    if (file_exists(public_path('images/' . $sub->image))) {
                        File::delete(public_path('images/' . $sub->image));
                    }
                    $sub->delete();
                }
            }
            //delete category image
            if (file_exists(public_path('images/' . $category->image))) {
                File::delete(public_path('images/' . $category->image));

            }
$category->delete();
        }
        session()->flash('sucess', 'category deleted successfully');
            return back();
    }
}
