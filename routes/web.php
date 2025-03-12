<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blogs', [BlogController::class, 'index']);

    Route::get('/test-post', [BlogController::class, 'getRequest']);
    Route::post('/test-post', [BlogController::class, 'postRequest']);
    
    Route::get('/test-par/{id}', [BlogController::class, 'getPar']);
    
    Route::get('getfile', [BlogController::class, 'getFile']);
    
    Route::get('posts', [PostController::class, 'index'])->name('posts')->middleware(IsAdmin::class);
    
    Route::get('create-post', [PostController::class, 'create'])->name('create-post');
    Route::post('create-post', [PostController::class, 'savePost']);
    
    Route::get('edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');;
    Route::post('edit-post/{id}', [PostController::class, 'updatePost']);
    
    Route::delete('delete-post/{id}', [PostController::class, 'delete'])->name('delete-post');
    
    
    Route::get('user/{id}', [UserController::class, 'index'])->name('user');

});

require __DIR__.'/auth.php';
