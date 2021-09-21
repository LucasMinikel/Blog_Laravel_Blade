<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\User;
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
Route::get('metadados', function () {
    return view('posts', [
        'posts' =>  PostMeta::allPosts()
    ]);
});

Route::get('metadados/post/{post}', function ($id) {
    return view('post', [
        'post' =>  PostMeta::findOrFailPost($id)
    ]);
})->whereNumber('post');

//ELOQUENT
Route::get('/', function () {
    // DB::listen(function($query){
    //     logger($query->sql);
    // });
    return view('posts', [
        'posts' =>  Post::latest()->with(['category', 'author'])->get(),
        'categories' =>  Category::all()
    ]);
})->name('home');

Route::get('post/{post}', function (Post $post) {//Route Model Binding
    return view('post', [
        'post' =>  $post
    ]);
})->whereNumber('post');

Route::get('categories/{category:slug}', function (Category $category) {//Route Model Binding
    return view('posts', [
        'posts' =>  $category->posts->load(['category','author']),
        'categories' =>  Category::all(),
        'currentCategory' => $category
    ]);
})->name('categorias');

Route::get('authors/{author}', function (User $author) {//Route Model Binding
    return view('posts', [
        'posts' =>  $author->posts->load(['category','author']),
        'categories' =>  Category::all()
    ]);
});