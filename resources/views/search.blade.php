@extends('layouts.app')

@section('content')
<div class="container">

    
    @error('search')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    

    @if(isset($user))
        <p class="lead">
            Results on: @{{$q}}
        </p>
        <ul class="list-group">
        @foreach($user as $u)
        
        <a href="profile/{{$u->id}}" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
            {{$u->name}}
            <span class="badge badge-primary badge-pill">{{$u->posts->count()}}</span>
        </a>
        @endforeach
        </ul>
            
        
        
    @endif  

    @if(isset($post))
        <p class="lead">
            Results on: {{$q}}
        </p>
        <div class="card-columns">
            @foreach ($post as $p)
                <div class="card  border-white">
                    <a href="/posts/{{ $p->id }}" >
                        <img class="card-img-top rounded-conrners preview"  src="/images/posts/{{ $p->path }}" alt="alt">
                    </a>
                    <div class="card-footer d-flex justify-content-between" style="background-color: transparent; border-top : none;">
                        <!-- <a href="/posts/{{ $p->id }}" >{{ $p->title }}</a> -->
                        <p class="h4 text-secondary">{{ $p->title }}</p>
                        <button type="button" data-toggle="tooltip" data-placement="top" title="{{$p->created_at}} <br> {{$p->likes->count()}} likes <br> {{$p->comments->count()}} comments" data-html="true" class="btn btn-link"  >
                            <i class="fa fa-ellipsis-h" ></i>
                        </button>
                    </div>
                </div>
            @endforeach  
        </div> 
        
    @endif  

    
    @if(isset($message))
        <p class="lead">{{$message}}</p>
    @endif  

    
</div> 

@endsection