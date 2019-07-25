@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">Publish an new post</h1>
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

</div>



@endif
    @include ('errors')
    <form method="POST" action="/posts" enctype="multipart/form-data">

        @csrf
        


        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image" class="sr-only">Image</label>
                    <input type="file" name="path"  class="form-control-file form-control-lg" id="image">
                </div>
                
            </div>
            <div class="col-md-6">
                
                <div class="form-group ">
                    <label for="title" class="sr-only">Post title</label>
                    <input name="title" value="{{ old('title') }}" type="text"  class="form-control form-control-lg" id="title" placeholder="Post title">
                </div>

                <div class="form-group ">
                    <label for="desc" class="sr-only">Post description</label>
                    <textarea name="description" class="form-control form-control-lg" id="desc" rows="3" placeholder="Post description">{{ old('description') }}</textarea>
                </div>
               
                <button type="submit" class="btn btn-danger btn-block">Publish</button>
            </div>
            
        </div>
        
        
        
            <a href="{{ url()->previous() }}" class="text-muted">< Cancel post</a>
        
        



        
         
    </form>


</div>


@endsection