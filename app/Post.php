<?php

namespace App;
use App\Like;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    /**
     * Determine whether a post has been marked as liked by a user.
     *
     * @return boolean
     */
    public function liked()
    {
        
        return (bool) Like::where('user_id', auth()->id())
        ->where('post_id', $this->id)
        ->first();
    }

    public function addLike($like)
    {
        $this->likes()->create($like);
    }

    public function addComment($comment)
    {
        $this->comments()->create($comment);
    }


}
