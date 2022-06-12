<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where(['two_factor_code' => $request->token ])->first();
        $user->is_verified = 1;
        $user->save();
        return view('emails.index');
    }
}
