<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:title}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/posts/{post:title}/comments', [PostCommentController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
