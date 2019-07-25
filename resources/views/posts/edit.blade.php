@extends('layouts.app')

@section('content')
    
    <h1 class="text-center">Edit this post</h1>

    <br>
    <form method="POST" action="/posts/{{ $post->id }}">
        @method('PATCH')
        @csrf
        <div class="form-row">
            <div class="col-md-6">

                <img src="/images/{{$post->path}}" alt="..." class="rounded img-thumbnail" >

                  
                
            </div>
            <div class="col-md-6">
                
                <div class="form-group ">
                    <label for="title" class="sr-only">Post title</label>
                    <input name="title" value="{{ $post->title }}" type="text"  class="form-control form-control-lg" id="title" placeholder="Post title">
                </div>

                <div class="form-group ">
                    <label for="desc" class="sr-only">Post description</label>
                    <textarea name="description" class="form-control form-control-lg" id="desc" rows="3" placeholder="Post description">{{ $post->description }}</textarea>
                </div>
               
                <button type="submit" class="btn btn-danger btn-block">Update</button>
            </div>
            
        </div>    
        <a href="{{ url()->previous() }}" class="text-muted">Back</a>      
    </form>  
@endsection