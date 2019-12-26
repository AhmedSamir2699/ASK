@extends('layouts.app')

@section('content')
<h1>posts</h1>
 @if (count($posts) > 0)
   @foreach ($posts as $post)


<div class='post-box'>
       <div class="row">
              <div class="col-md-4 col-sm-4">
                 <img style="width:100%"src="/storage/cover_images/{{$post->cover_image}}">
              </div>
              <div class="col-md-8 col-sm-8">
                   <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                   <span class='post-date'>writen on {{$post->created_at}}</span>
                   {!!$post->body!!}
                   <hr>
                   <span class='post-author'>By {{$post->user['name']}}</span>
                   <div class="parent">
                   <span class="parent">
                       {!!Form::open(['action'=>['PostsController@LikeCount',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{ Form::button('<i class="fa fa-heart fa-lg"></i>', ['type' => 'submit', 'class' => 'btn btn-light btn-sm'] )}}
                        {{Form::hidden('_method','')}}
                        {!!Form::close()!!}</span>
                     </div>
                       <span ><i class="fa fa-comments fa-lg"></i></span>
              </div>
        </div>
</div>

    @endforeach
   @else
   <p>no posts found</p>
 @endif
 <script type="text/javascript">
    clicked = true;
    count=0;
    $(document).ready(function(){
        $("i").click(function(){
            if(clicked){
                $(this).css('color', '#E91E63');
                clicked  = false;
                count=count+1;
                console.log(count);
            } else {
                $(this).css('color', 'black');
                 clicked  = true;
                 count=count-1;
                 console.log(count);
            }
        });

    });
    </script>
@endsection
