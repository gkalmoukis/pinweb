@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-columns">
        @foreach ($posts as $p)
            <div class="card   border-white">
                <a href="/posts/{{ $p->id }}" >
                    <img class="card-img-top rounded-conrners preview "  src="/images/posts/{{ $p->path }}" alt="alt">
                </a>
                <div class="card-footer d-flex justify-content-between mb-0" style="background-color: transparent; border-top : none;">
                    <!-- <a href="/posts/{{ $p->id }}" >{{ $p->title }}</a> -->
                    <p class="text-secondary">{{ $p->title }}</p>
                    <button type="button" data-toggle="tooltip" data-placement="top" title="{{$p->created_at}} <br> {{$p->likes->count()}} likes <br> {{$p->comments->count()}} comments" data-html="true" class="btn btn-link"  >
                        <i class="fa fa-ellipsis-h" ></i>
                    </button>
                </div>
            </div>
        @endforeach  
    </div> 
</div>
      
@endsection
