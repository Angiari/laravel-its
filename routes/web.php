<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;



//route principale della dashboard
Route::get('/', function () {
    return view('welcome');
});

//route per la pagina dei blog
// Route::get('/blogs', function () {
//     return view('blogs.index');
// });

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/test-post', [BlogController::class, 'getRequest']);
Route::post('/test-post', [BlogController::class, 'postRequest']);

Route::get('/test-par/{id}', [BlogController::class, 'getPar']);

Route::get('getfile', [BlogController::class, 'getFile']);

Route::get('posts', [PostController::class, 'index'])->name('posts');

Route::get('create-post', [PostController::class, 'create'])->name('create-post');
Route::post('create-post', [PostController::class, 'savePost']);

Route::get('edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');;
Route::post('edit-post/{id}', [PostController::class, 'updatePost']);

Route::delete('delete-post/{id}', [PostController::class, 'delete'])->name('delete-post');


Route::get('user/{id}', [UserController::class, 'index'])->name('user');