<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $districts = District::orderby('name', 'asc')->get();
        return view('admin.Pages.district.index', compact('districts'));
    }
    public function create()
    {

        $divisions = Division::orderby('priority', 'asc')->get();
        return view('admin.Pages.district.create', compact('divisions'));
    }
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'division_id' => 'required'
            ],
            [

                'name.required' => 'Please provided a district name',
                'division_id.required' => 'please provide a divison id'

            ]
        );
        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();
        session()->flash('sucess', 'A new divison added sucessfully');
        return redirect()->route('admin.district.index');
    }
    public function edit($id)
    {
        $divisions = Division::orderby('priority', 'asc')->get();
        $district = District::find($id);
        if (!is_null($district)) {
            return view('admin.Pages.district.edit', compact('district', 'divisions'));
        } else {
            return redirect()->route('admin.district.index');
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'division_id' => 'required'
            ],
            [

                'name.required' => 'Please provided a district name',
                'division_id.required' => 'please provide a division id'

            ]
        );
        $district = District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();
        session()->flash('sucess', 'A new divison updated sucessfully');
        return redirect()->route('admin.district.index');
    }
    public function delete($id)
    {
        $district = District::find($id);
        if (!is_null($district)) {
            $district->delete();
        }
        session()->flash('sucess', 'Division has deleted sucessfully');
        return back();
    }
}
