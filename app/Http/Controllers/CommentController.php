<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post){
        request()->validate([
            'body' => 'required'
        ]);
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);
    
        return back();
    }
}