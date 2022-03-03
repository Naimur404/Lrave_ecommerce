<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // @override
    //dispay the registration form
    public function showRegistrationForm()
    {
        $divisions = Division::orderby('priority', 'asc')->get();
        $districts = District::orderby('name', 'asc')->get();
        return view('auth.register', compact('divisions', 'districts'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required', 'max:12'],
            'street_address' => ['required', 'string', 'max:100'],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'username' => Str::slug($request->first_name . $request->last_name),
            'street_address' => $request->street_address,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(50),
            'status' => 0,
        ]);

        //send him a token
        $user->notify(new VerifyRegistration($user));
        session()->flash('sucess', 'A new comfirmation email sent to you.. Please check and confirm your email');
        return redirect('/');
    }
}
