<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderby('id', 'desc')->get();
        return view('admin.Pages.slider.index', compact('sliders'));
    }
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'image' => 'required|image',
                'priority' => 'required',
                'button_link' => 'nullable|url'

            ]

        );
        $slider = new Slider();
        $slider->title = $request->title;

        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if (!is_null($request->image)) {


            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }

        $slider->save();
        session()->flash('sucess', 'A new Slider has Added');
        return redirect()->route('admin.slider.index');
    }
    public function update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'title' => 'required',
                'image' => 'nullable|image',
                'priority' => 'required',
                'button_link' => 'nullable|url'

            ],
        );
        $slider = Slider::find($id);
        $slider->title = $request->title;

        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if (!is_null($request->image)) {

            if (file_exists(public_path('images/' . $slider->image))) {
                File::delete(public_path('images/' . $slider->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();
        session()->flash('sucess', 'A new Slider has Updated');
        return redirect()->route('admin.slider.index');
    }
    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
            if (file_exists(public_path('images/' . $slider->image))) {
                File::delete(public_path('images/' . $slider->image));
            }
            $slider->delete();
        }
        session()->flash('sucess', 'A new Slider has Deleted');
        return redirect()->route('admin.slider.index');
    }
}
