@extends('layouts.app')

@section('content')
<div class="container">


    @if(isset($details))
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
        <p>{{$details}}</p>
    @endif  

    
    @if(isset($message))
        <p>{{$message}}</p>
    @endif  

    
</div> 

@endsection