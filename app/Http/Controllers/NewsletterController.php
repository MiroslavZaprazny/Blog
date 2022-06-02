<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        try {
            // $newsletter =  new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter'
            ]);
        }
        session()->flash('success', 'You have signed up for our newsletter');
        return redirect('/');
    }
}
