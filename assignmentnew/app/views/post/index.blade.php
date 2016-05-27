@extends('layout.master')

@section('postForm')
    @if (Auth::check()) 
    {{ Auth::user()->username }}
    <div class='postForm'>
        <span class='formTitle'>Create post..</span>
    {{ Form::open(array('action' => array('post.store', Auth::user()->username))) }}
        <div class='form-fields'>
           <div class="form-title">{{ Form::label('name', 'Name: ') }}</div>
           <span class='form-field'>{{ Form::text('name') }}</span><br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('name') }}</span>
           <div class="form-title">{{ Form::label('title', 'Title: ') }}</div>
           <span class='form-field'>{{ Form::text('title') }}</span><br>
            <span style="color:yellow;font-style:italic;">{{ $errors->first('title') }}</span>
           <div class="form-title">{{ Form::label('message', 'Message: ') }}</div>
           <span class="form-field">{{ Form::text('message') }}</span><br>
           <span style="color:yellow;font-style:italic;">{{ $errors->first('message') }}</span>
        </div>
        <div class='buttonBar'>
            {{ Form::submit('Post', array('class' => 'formButton saveButton')) }}
        </div>
    {{ Form::close() }}
    </div>
    @endif
@stop
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