@extends('layouts.master')

<!--Display the parent post-->
@section('post')
<div class='postFeed'>
@foreach($posts as $post)
    <div class='postBox'>
        <div class='postHeader'>
            <div class='postIcon'>
                <img src='{{{ $post->image }}}' width='50px'></img>
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
                  <li><a href='{{{ url("edit_post/$post->id") }}}'>Edit</a></li>
                  <li><a href='{{{ url("delete_post_action/$post->id") }}}'>Delete</a></li>
                </ul>
            </div>
        </div>
        <div class='postContent'>
            {{{ $post->message }}}
        </div>
    </div>
@endforeach
</div>
@stop

<!--Display the form for adding a comment-->
@section('commentForm')
    <div class='commentForm'>
        <form method="post" action = '{{{ url("add_comment_action/$post->id") }}}' >
            <span class='formTitle'>Post a comment</span>
            <div class='form-fields'>
               <div class="field-title">Name:</div>
               <input type="text" name="name" class='form-field' required/><br>
               <div class="field-title">Message:</div>
               <textarea rows="2" cols="50" name="message" required></textarea><br>
            </div>
            <div class='buttonBar'><input type="submit" class='formButton saveButton'></div>
        </form>
    </div>
@stop

<!--Display the list of comments-->
@section('comments')
    @foreach($comments as $comment)
        <div class='commentBox'>
            <div class='commentHeader'>
                <div class='commentDescription'>
                    <span class='commentName'>Posted by {{{ $comment->name}}}</span>
                </div>
                <div class='dropdown postOptions'>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                      
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href='{{{ url("delete_comment_action/$post->id/$comment->commentid") }}}'>Delete</a></li>
                    </ul>
                </div>
            </div>
            <div class='commentContent'>
                {{{ $comment->message }}}
            </div>
        </div>
    @endforeach
    <div class='bottomMessage'>No more comments</div>
    <div class='footer'></div>
@stop
