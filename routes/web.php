<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\FavoritePostController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PendingEmailVerificationController;
use App\Http\Controllers\EmailVerificationNotificationController;

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:title}', [PostController::class, 'show']);

Route::post('/posts/{post:title}/comments', [PostCommentController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::middleware('admin')->group(function () {
    Route::get('admin/posts/create', [PostController::class, 'create']);
    Route::post('admin/posts', [PostController::class, 'store']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
    Route::get('admin/category/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories', [CategoryController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    Route::get('profile/{user:username}', [UserController::class, 'edit']);
    Route::post('/logout', [SessionController::class, 'destroy']);
    Route::patch('/profile/update/{user:username}', [UserController::class, 'update']);
    Route::delete('/profile/delete/{user:username}', [UserController::class, 'destroy']);
    Route::get('user/passwordreset', [UserController::class, 'reset']);
    Route::post('/add-to-favorites',[FavoritePostController::class,'create']);
    Route::get('/favorites/{user:username}',[FavoritePostController::class,'index']);
    Route::delete('/favorites/delete/{post:id}',[FavoritePostController::class,'delete']);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionController::class, 'create']);
    Route::post('login', [SessionController::class, 'store']);
    Route::get('/pending-verification',[PendingEmailVerificationController::class, 'index']);
    Route::get('/verify',[EmailVerificationController::class, 'index']);
});
