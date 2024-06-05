<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [\App\Http\Controllers\PostsController::class, 'main'])->name('posts.main');
Route::get('/posts/create', [\App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::post('/posts', [\App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [\App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
Route::get('posts/{post}/edit', [\App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit');
Route::patch('posts/{post}', [\App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [\App\Http\Controllers\PostsController::class, 'destroy'])->name('posts.delete');
Route::get('posts/delete', [\App\Http\Controllers\PostsController::class, 'delete']);



Route::get('/comment/{post}/create', [\App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
Route::post('/comment/{post}', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('comment/{comment}/edit', [\App\Http\Controllers\CommentController::class, 'edit'])->name('comments.edit');
Route::patch('comment/{comment}', [\App\Http\Controllers\CommentController::class, 'update'])->name('comments.update');
Route::delete('comment/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.delete');
Route::get('comment/delete', [\App\Http\Controllers\CommentController::class, 'delete']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
