<?php

namespace App\Http\Controllers;

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

    public function store () {
        $data = request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if(auth()->attempt($data)){
            session()->flash('success','You are logged in');
            return redirect('/');
        }
        return back()->withErrors(['email'=> 'Your provided credentials could not be verifid']);
    }
}
