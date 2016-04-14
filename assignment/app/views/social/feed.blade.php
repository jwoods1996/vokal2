@extends('layouts.master')

<!-- For the form to make a new post -->
@section('postForm')
    <div class='postForm'>
    <form method="post" action = '{{{ url('add_post_action') }}}' >
        <span class='formTitle'>Create a post..</span>
        <div class='form-fields'>
           <div class="field-title">Title:</div>
           <input type="text" name="title" class='form-field' required/><br>
           <div class="field-title">Name:</div>
           <input type="text" name="name" class='form-field' required/><br>
           <div class="field-title">Message:</div>
           <textarea rows="2" cols="50" name="message" required></textarea><br>
        </div>
        <input type="submit" class='submitButton'>
    </form>
    </div>
@stop




<!-- Code for the collection of posts in the feed -->
@section('postContainer')

                <div class='postFeed'>
@foreach($posts as $post)

    <div class='postBox'>
        <div class='postHeader'>
            <div class='postIcon'>
                <img src='{{{ $post->image }}}' width='50px'>
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
        <div class='postComments'>
        <?php 
            $sql = "SELECT COUNT(*) FROM comments WHERE postid = ?";
            $commentsAmount = DB::table('comments')->where('postid', $post->id)->count();
        ?>
            <span class='commentCount'>{{{$commentsAmount}}} comments</span><span class='commentLink'><a href='{{{ url("comments/$post->id") }}}'>View Comments</a></span>
        </div>
    </div>
@endforeach
</div>
@stop