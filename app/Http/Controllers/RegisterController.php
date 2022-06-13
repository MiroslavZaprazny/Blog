<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\VerifyMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Jobs\VerificationEmailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
            $user = User::create(
                request()->validate([
                    'name' => ['required', 'max:255'],
                    'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
                    'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                    'password' => ['required', 'max:255', 'min:6', 'confirmed']
                ])
            );
            $user->two_factor_code = Str::random(40);
            $user->save();
            // event(new Registered($user));
            //auth()->login($user);
    
            // Mail::to($user->email)->send(new VerifyMail($user));
            dispatch(new VerificationEmailJob($user));
            session()->flash('success', 'Your account has been registered');
            return redirect('/pending-verification');
    }
}
