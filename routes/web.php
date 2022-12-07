<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\NewsletterController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;  //used to get metadata 





// main webpage route - homepage goes here
Route::get('/', [PostController::class, 'index'])->name('home');

//post route based on the slug of the post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

// Registration when not signed in
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Login for existing users
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

// Logout for Logged in users
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


// Admin functionality
Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);


    Route::get('admin/users', [AdminUserController::class, 'index']);
    Route::post('admin/users', [AdminUserController::class, 'store']);
    Route::get('admin/users/create', [AdminUserController::class, 'create']);
    Route::get('admin/users/{user}/edit', [AdminUserController::class, 'edit']);

    Route::patch('admin/users/{user}', [AdminUserController::class, 'update']);
    Route::delete('admin/users/{user}', [AdminUserController::class, 'destroy']);
});

////////UPLOADS//////////

Route::get('uploads', [UploadController::class, 'create']);

//file upload submission with post
Route::post('uploads', [UploadController::class, 'store']);

Route::get('uploads/{upload}/{originalName?}', [UploadController::class, 'show']);
