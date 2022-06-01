<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        auth()->login(User::create(request()->validate([
                'name'=>['required','max:255'],
                'username'=>['required','max:255','min:3',Rule::unique('users','username')],
                'email'=>['required','email','max:255',Rule::unique('users','email')],
                'password'=>['required','max:255','min:6']
            ])
        ));

        session()->flash('success','Your account has been registered');
        return redirect('/');
    }
}
