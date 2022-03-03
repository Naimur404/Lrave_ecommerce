<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        //find user by this email
        $user = User::where('email', $request->email)->first();
        if ($user->status == 1) {
            // login this user
            if (Auth::guard('web')->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->remember
            ));
            // log him now
            return redirect()->intended(route('index'));
        } else {
            // send him a token again

            if (!is_null($user)) {
              
                $user->notify(new VerifyRegistration($user));

                session()->flash('sucess', 'A comfirmation email sent to you.. Please check and confirm your email');
                return redirect('/');
            }else{
                session()->flash('errors', 'Please login first');
                return redirect()->route('login');
            }
        }
    }
}
