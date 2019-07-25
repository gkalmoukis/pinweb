<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;

class LikeController extends Controller
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

    /**
     * Favorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function store(Post $post)
    {
        auth()->user()->likes()->attach($post->id);

        return back();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        auth()->user()->likes()->detach($post->id);

        return back();
    }

    


}
