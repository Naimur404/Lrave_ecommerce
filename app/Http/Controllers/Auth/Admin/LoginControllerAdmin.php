<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerAdmin extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Admin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        //find user by this email


            // login this user
            if (Auth::guard('admin')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->remember
            )){
            // log him now
            return redirect()->intended(route('admin.product.index'));
            } else {
                session()->flash('sticky_error', 'Invalid login');
                return back();

        }
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
