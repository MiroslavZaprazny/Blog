<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // auth()->login(User::create(
        //     request()->validate([
        //         'name' => ['required', 'max:255'],
        //         'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
        //         'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
        //         'password' => ['required', 'max:255', 'min:6', 'confirmed']
        //     ])
        // ));

        $user = User::create(
            request()->validate([
                'name' => ['required', 'max:255'],
                'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                'password' => ['required', 'max:255', 'min:6', 'confirmed']
            ])
        );
        // event(new Registered($user));
        auth()->login($user);

        Mail::to($user->email)->send(new WelcomeMail());
        session()->flash('success', 'Your account has been registered');
        return redirect('/');
    }
}
