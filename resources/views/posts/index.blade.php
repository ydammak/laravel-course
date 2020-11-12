@extends('layout')

@section('content')

<h1>Liste of posts</h1>
<ul class="list-group">
    @forelse ($posts as $post)
    <li class="list-group-item">
        
    <h2><a href="{{ route('posts.show',['post'=> $post->id]) }}">  {{ $post->title }}  </a></h2>
        <p>   {{ $post->content}}   </p>
        <em>  {{$post->created_at }} </em>
        <div>
        @if($post->comments_count)
            <span class="badge badge-success">{{ $post->comments_count}} comments </span>
        @else
            <span class="badge badge-dark">no comments yet!</span>
        @endif
        </div>
    <a  class="btn btn-warning" href="{{route('posts.edit',['post'=> $post->id])}}">edit </a>
    <form  class="form-inline" method="POST" action="{{route('posts.destroy',['post'=> $post->id])}}">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" type="submit">delete</button>

    </form>
    </li>
    @empty
    <span class="badge badge-danger">rien</span>
    @endforelse

</ul>
    
@endsection