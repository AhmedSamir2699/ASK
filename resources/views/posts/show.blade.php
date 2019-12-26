@extends('layouts.app')

@section('content')


<div class='post-box'>
       <div class="row">
              <div class="col-md-4 col-sm-4">
                 <img style="width:100%"src="/storage/cover_images/{{$post->cover_image}}">
              </div>
              <div class="col-md-8 col-sm-8">
                   <h3 class="post-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                   <span class="post-date">writen on {{$post->created_at}}</span>
                   <p class='post-content'>{!!$post->body!!}</p>

                <span class='post-author'>By {{$post->user->name}}</span>
              </div>
        </div>

    @if (!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary post-viwes2">Edit</a>
    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger post-viwes'])}}
    {!!Form::close()!!}
    @endif
    @endif
</div>
<a href="/posts" class="btn btn-primary">Go Back </a>
@endsection
