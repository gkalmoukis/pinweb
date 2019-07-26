@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
        @if(Auth()->user()->avatar === null)
            <img style="width: 200px; height: 200px" src="/images/static/default.png" class="rounded-circle mx-auto d-block img-thumbnail" alt="profile_pic_{{Auth()->user()->name}}">
        @else
            <img style="width: 200px; height: 200px" src="/images/profiles/{{Auth()->user()->avatar}}" class="rounded-circle mx-auto d-block img-thumbnail" alt="profile_pic_{{Auth()->user()->name}}">
        @endif
        <br>
        <div class="row mx-auto d-block">
            <div class="d-flex justify-content-center">

              <button type="button" data-toggle="modal" data-target="#edit_avatar_modal" class="btn btn-secondary btn-sm">
                @if($user->avatar === null) 
                  Add avatar 
                @else 
                  Edit avatar 
                @endif
              </button>
 
            </div>
        </div>

        
        </div>

        <div class="col-md-8">
            <h2>{{  $user->name }} @if ( $user->id  ==  auth()->id()) <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit_name_modal" >Edit</button>  @endif </h2> 
            <p>Joined: {{  $user->created_at }}</p>
            <p class="lead">
                @if($user->moto === null)
                  @if ( $user->id  ==  auth()->id())
                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit_moto_modal" >Add moto</button>
                  @endif
                @else
                  @if ( $user->id  ==  auth()->id())
                    {{$user->moto}} 
                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit_moto_modal" >Edit</button>
                  @endif
                @endif
            
            </p>
            
            <p>Total likes: TODO :)</p>
            <div class="card-columns">
                @foreach ($user->posts as $p)
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
        



        
        

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_name_modal" tabindex="-1" role="dialog" aria-labelledby="modalNameLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNameLabel">Edit name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/profile/{{ $user->id }}/update">
        @method('PATCH')
        @csrf
        <div class="form-group ">
            <label for="name" class="sr-only">Current Name</label>
            <input name="name" value="{{ $user->name }}" type="text"  class="form-control form-control-lg" id="name" placeholder="New name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel edit</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form> 
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="edit_moto_modal" tabindex="-1" role="dialog" aria-labelledby="modalMotoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMotoLabel">Edit moto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/profile/{{ $user->id }}/update">
        @method('PATCH')
        @csrf
        
        <div class="form-group ">
            <label for="moto" class="sr-only">User moto</label>
            <textarea name="moto" class="form-control form-control-lg" id="moto" rows="3" placeholder="Type a new moto"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel edit</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form> 
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_avatar_modal" tabindex="-1" role="dialog" aria-labelledby="modalAvatarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAvatarLabel">Edit moto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/profile/{{ $user->id }}/update" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        
        
          <div class="custom-file">
            <input type="file" name="avatar" class="custom-file-input" id="customFile">
            <label class="custom-file-label"  for="customFile">Choose file</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel edit</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form> 
    </div>
  </div>
</div>


@endsection