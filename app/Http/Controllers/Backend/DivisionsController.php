<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{
    public function index(){
        $divisions = Division::orderby('priority','asc')->get();
        return view('admin.Pages.division.index',compact('divisions'));
    }
    public function create(){
        return view('admin.Pages.brand.create');


    }
    public function store(Request $request){
$this->validate($request,[
'name'=> 'required',
'priority'=>'required'],
[

'name.required'=>'Please provided a divison name',
'priority.required'=> 'please provide a divison priority'

]);
$division = new Division();
$division->name = $request->name;
$division->priority = $request->priority;
$division->save();
session()->flash('sucess', 'A new divison added sucessfully');
return redirect()->route('admin.division.index');

    }
    public function edit($id){
        $division = Division::find($id);
        if(!is_null($division)){
            return redirect()->route('admin.district.edit',compact('division'));

        }else{
            return redirect()->route('admin.division.index');

        }
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=> 'required',
            'priority'=>'required'],
            [

            'name.required'=>'Please provided a divison name',
            'priority.required'=> 'please provide a divison priority'

            ]);
            $division = Division::find($id);
            $division->name = $request->name;
            $division->priority = $request->priority;
            $division->save();
            session()->flash('sucess', 'A new divison updated sucessfully');
            return redirect()->route('admin.division.index');

    }
    public function delete($id){
        $division = Division::find('id');
        if(!is_null($division)){
            $division->delete();
        }
        session()->flash('sucess', 'Division has deleted sucessfully');
        return back();
    }
}
