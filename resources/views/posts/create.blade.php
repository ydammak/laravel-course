@extends('layout')

@section('content')

<h1>Create post</h1>
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    @include('posts.form')
    
    <button class="btn btn-block btn-primary" type="submit">Add post</button>

</form>

@endsection