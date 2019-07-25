<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class SearchController extends Controller
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

    
    public function index()
    {
        
        $query_string = request()->validate([
            'search' => ['required','min:3' ]
        ]);
        $q = $query_string['search'];
        
        //search for users
        if (substr( $q, 0, 1 ) === "@")
        {
            $q = substr($q, 1);
            $user = User::where( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get();
            if (count ( $user ) > 0)
                return view ( 'search',compact('user','q') );
            else
            return view ('search')->withMessage ( 'No Users found. Try to search again !' );
        }
        $post = Post::where('title','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        if(count($post) > 0)
            return view('search', compact('post','q'));
        else 
            return view ('search')->withMessage('No Post found. Try to search again !');
    }

    


}
