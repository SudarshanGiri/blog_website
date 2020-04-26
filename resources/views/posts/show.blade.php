@extends('layouts.app')
@section('content')
<div class="container">

    <a href="/posts" class="btn btn-default">Go Back</a>
    <div class="blogpage" style="background-color:#fff;padding:20px;">
        <h1 style="padding: 20px 50px;">{{$post->title}}</h1>
        <div class="body " style="background-color:white; color:black; font-size:30px;padding:50px;">
            {!!$post->body!!}
        </div>
        <hr>
        <small>written on{{$post->created_at}} by {{$post->user->name}}</small>
        <hr>
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
        @endif
    @endif
</div>
@endsection