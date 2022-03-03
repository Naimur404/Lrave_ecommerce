<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class verificationController extends Controller
{
    public function verify($token){
        $user = User::where('remember_token', $token)->first();
        if(!is_null($user)){
         $user->status = 1;
           $user->remember_token = NULL;
           $user->save();
            session()->flash('sucess', 'Your are registered sucessfully !! Login Now ');
            return redirect('login');


        }


        else{
            session()->flash('errors', 'Sorry your token is not match');
            return redirect('/');
        }


    }
}
