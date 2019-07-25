<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    

    public function update(User $user)
    {
        // todo validation
        $attributes = request()->validate([
            'name' => ['min:3'], 
            'moto' => ['min:3'],
            'avatar' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        if(isset($attributes['avatar'])){
            $imageName = time().'.'.Input::file('avatar')->getClientOriginalExtension();

            Input::file('avatar')->move(public_path('images/profiles'), $imageName);

            $attributes['avatar'] = $imageName;
        }
        
        
        
        

        User::whereId($user->id)->update($attributes);

        return redirect('/profile/'.$user->id);
    }
}
