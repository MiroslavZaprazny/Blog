<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TwoFactor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'picture' => ['image'],
            'username' => 'required'
        ]);
        if (isset($attributes['picture'])) {
            $attributes['picture'] = $request->file('picture')->store('pictures');
        }
        $user->update($attributes);

        session()->flash('success', 'Profile Updated!');
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'User Deleted!');
        return redirect('/');
    }

    public function reset()
    {
        return view('user.passwordreset');
    }

    // /**
    //  * The user has been authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  mixed  $user
    //  * @return mixed
    //  */
    // protected function authenticated(Request $request, $user)
    // {
    //     $user->generateTwoFactorCode();
    //     $user->notify(new TwoFactor);
    // }
}
