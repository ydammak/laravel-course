<div class="from-group">
    <label for="title">Your title</label>
<input class="form-control" type="text" name="title" id="title" value="{{old('title', $post->title ?? null)}}">
</div>
<div class="from-group">
    <label for="content">Your content</label>
    <input class="form-control" type="text" name="content" id="content" value="{{old('content', $post->content ?? null)}}">
</div>
@if($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif