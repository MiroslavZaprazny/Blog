<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:title}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/posts/{post:title}/comments', [PostCommentController::class, 'store']);

Route::post('/newsletter', function () {
    request()->validate([
        'email' => ['required', 'email']
    ]);
    $mailchimp = new ApiClient();
    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us17'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('fc4dab9d27', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch (\Exception $e) {
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter'
        ]);
    }



    session()->flash('success', 'You have signed up for our newsletter');
    return redirect('/');
});
