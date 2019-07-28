@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"> 
        <!-- image and back,edit and delete -->
        <div class="col-md-6">
            <img src="/images/posts/{{$post->path}}" class="img-fluid rounded" alt="Responsive image">
            <div class="row justify-content-between mt-2">
                <div class="col-md-12">
                <div class="float-left">
                    <a href="/posts" class="text-secondary">< Back</a>
                </div>
                @auth
                <div class="float-right">  
                    @if ( $user->id  ==  $post->user_id)
                        <form method="POST" action="/posts/{{ $post->id }}" class="form-inline">
                            @method('DELETE')
                            @csrf 
                            <div class="form-group mb-2 mr-2">
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-secondary btn-sm mb-2">Edit post</a>
                            </div>
                            <div class="form-group mb-2">    
                            <button type="submit" class="btn btn-danger btn-sm mb-2">Delete</button>
                            </div>
                        </form>
                    @endif
                </div>
                @endauth
                </div>
                
                
            </div>
        </div>
        
        
        <!-- Date, Likes, Like button, title, Body, Comments, Post comment -->
        <div class="col-md-6">
                <div class="row justify-content-between">
                    <div><p class="text-secondary">{{ $post->created_at->format('d/m/Y') }}</p></div>
                    @auth
                    <div><strong>{{ $post->likes->count() }} Likes</strong></div> 
                    <div>
                        
                        @if($post->liked() )
                        <form action="/post/{{$post->id}}/unlike" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-danger">Unlike</button>
                        </form>
                        @else
                        <form action="/post/{{$post->id}}/like" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-outline-danger">Like</button>
                        </form>
                        @endif
                    </div>
                    @endauth
                </div>
                <div class="row">
                    <h4>{{ $post->title }}</h4>
                </div>
                <div class="row">
                <p>
                    {{ $post->description }}
                </p>
                </div>
                <!-- comments -->
                <div class="row">
                

                
                @if ($post->comments->count())
                    
                    <div class="panel panel-white post panel-shadow">
                            <h3>Comments</h3>
                            @foreach ($post->comments as $comment)
                             
                             <!-- Single Comment -->
                            <div class="media mb-4">
                                @if(Auth()->user()->avatar === null)
                                    <img class="d-flex mr-3 rounded-circle" src="/images/static/default.png" width="60" height="60"  alt="profile_pic_{{Auth()->user()->name}}">
                                @else
                                    <img class="d-flex mr-3 rounded-circle" src="/images/profiles/{{Auth()->user()->avatar}}" width="60" height="60"  alt="profile_pic_{{Auth()->user()->name}}">
                                @endif
                                <div class="media-body">
                                    <h5 class="mt-0"><strong>{{$comment->user->find($comment->user_id)->name}}</strong> <a class="text-secondary">{{$comment->created_at->format('d/m/Y')}}</a></h5>
                                    <p>{{$comment->body}}</p>
                                </div>
                            </div>       
                            @endforeach
                    </div> 
                        
                        
                @endif
                </div>

                @auth
                <!-- <div class="col-12"> -->
                @include ('errors')
                <form method="POST" action="/post/{{ $post->id }}/comments">
                    @csrf
                    
                    <div class="form-group">
                        <label for="body" class="sr-only">Add comment</label>
                        <textarea name="body" class="form-control form-control-lg" id="bosy" rows="3" placeholder="Add comment">{{ old('description') }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-secondary float-right">Add comment</button>
                    
                </form>
                <!-- </div> -->
                @endauth

                @guest
                <p class="text-secondary">You must <a href="/login">login</a> in order to comment or like this post!</p>
                @endguest
                
        </div>
    </div>    
</div>
    

   

    
    
@endsection


