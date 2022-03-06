<?php

namespace App\Http\Controllers\Fontend;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {


        $user = Auth::user();
        return view('pages.users.dashboard', compact('user'));
    }
    public function profile()
    {

        $divisions = Division::orderby('priority', 'asc')->get();
        $districts = District::orderby('name', 'asc')->get();
        $user = Auth::user();
        return view('pages.users.updateprofile', compact('user', 'divisions', 'districts'));
    }

    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['string', 'max:20'],
            'username' => 'required|alpha_dash|max:50|unique:users,username,' . $user->id,
            'phone_no' => ['required', 'max:12', 'unique:users,phone_no,' . $user->id],
            'email' => ['required', 'string', 'max:100', 'unique:users,email,' . $user->id],


            'street_address' => ['required', 'string', 'max:100'],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],

        ]);


        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone_no = $request->phone_no;
        $user->street_address = $request->street_address;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->ip_address = request()->ip();
        $user->save();

        session()->flash('sucess', 'User profile update sucessfully');
        return back();
    }
}
