<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();
        session()->flash('success','You have been logged out');
        return redirect('/');
    }

    public function create() {
        return view('login.login-page');
    }

    public function store (Request $request) {
       $user = User::where('email' , '=' ,$request->email)->first();
        if($user->is_verified === 0)    
        {
            return back()->with(['isntVerified' => 'You have to verify your account before you can log in!']);
        }
            $data = request()->validate([
                'email'=>['required','email'],
                'password'=>['required']
            ]);

            $remember =  $request->has('remember') ? true : false;
    
            if(auth()->attempt($data, $remember)){
                session()->flash('success','You are logged in');
                return redirect('/');
            }
            return back()->withErrors(['email'=> 'Your provided credentials could not be verifid']);
    }
}
