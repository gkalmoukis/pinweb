<?php

namespace App\Http\Controllers;
use \App\Post;
use \App\Like;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
   
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        $user = auth()->user();
        return view('posts.show', compact('post','user'));
    }
  
    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required','min:3' ],
            'description' => ['required','min:3' ],
            'path' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        $attributes['user_id'] = auth()->id();
        
        

        $imageName = time().'.'.Input::file('path')->getClientOriginalExtension();

            

        Input::file('path')->move(public_path('images/posts'), $imageName);

        $attributes['path'] = $imageName;

        Post::create($attributes);
        return back()
                    ->with('success','You have successfully upload image.')
                    ->with('image',$imageName);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $post->update(request(['title', 'description']));
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->path);
        $post->delete();
        return redirect('/posts');
    }

    
}
