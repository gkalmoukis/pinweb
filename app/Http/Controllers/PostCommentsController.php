<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class PostCommentsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $attributes = request()->validate(['body' => 'required']);
        
        $attributes['user_id'] = auth()->id();
        $post->addComment($attributes);
        return back();
    }
}
