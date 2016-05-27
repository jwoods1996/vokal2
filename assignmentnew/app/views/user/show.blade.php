@extends('layout.master')

@section('userProfile')
<div class='profileHeader'>
    <div class='personIcon'>
        <img src='{{ $user->image }}'>
    </div>
    <div class='personInfo'>
        {{ $user->fullname }}<br>
        <span style='font-style:italic'>{{ $user->email }}</span><br>
        XX years old<br>
    </div>
</div>
@section('postContainer')
@foreach ($posts as $post)
    <div class='postBox'>
        <div class='postHeader'>
            <div class='postIcon'>
                <img src='{{{ $post->image }}}' width='50px' height='50px'>
            </div>
            <div class='postDescription'>
                <span class='postTitle'>{{{ $post->title }}}</span></br>
                <span class='postName'>Posted by {{{ $post->name}}}</span>
            </div>
            <div class='dropdown postOptions'>
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                  
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        {{ Form::open(array('method' => 'GET', 'action' => array('post.edit', $post->id))) }}
                        {{ Form::submit('Edit', array('class' => 'formButton saveButton')) }}
                        {{ Form::close() }}
                    </li>
                    <li>
                        {{ Form::open(array('method' => 'DELETE', 'action' => array('post.destroy', $post->id))) }}
                        {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
        <div class='postContent'>
            {{{ $post->message }}}
        </div>
        <div class='postComments'>
            <!--Get the total amount of comments for the relevant post-->
            <?php
            		$comments = $post->comments;
		            $commentsAmount = count($comments);
		            $post->commentsAmount = $commentsAmount;
		      ?>
            <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'><a href='{{{ url("post/$post->id") }}}'>View Comments</a></span>
        </div>
    </div>
@endforeach
@stop
@stop
