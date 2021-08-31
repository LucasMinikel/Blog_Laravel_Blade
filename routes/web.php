<?php

use App\Models\PostModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use PhpParser\Node\Expr\YieldFrom;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {
    return view('posts', [
        'posts' =>  PostModel::allPosts()
    ]);
});

Route::get('post/{post}', function ($id) {
    return view('post', [
        'post' =>  PostModel::findPost($id)
    ]);
})->whereNumber('post');