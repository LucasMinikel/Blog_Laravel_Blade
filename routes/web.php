<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//METADADOS
// Route::get('metadados', function () {
//     return view('posts', [
//         'posts' =>  PostMeta::allPosts()
//     ]);
// });

// Route::get('metadados/post/{post}', function ($id) {
//     return view('post', [
//         'post' =>  PostMeta::findOrFailPost($id)
//     ]);
// })->whereNumber('post');

//ELOQUENT
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post}', [PostController::class, 'show'])->whereNumber('post');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('posts/{post:id}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);