@extends('layouts.master')

<!-- For the form to make a new post -->
@section('postForm')
    <form method="post" action = '{{{ url('add_post_action') }}}' >
        Name: <br>
        <input type="text" name="name"/><br>
        Message: <br>
        <input type="textarea" name="message"/><br>
        <input type="submit">
    </form>
    

@stop




<!-- Code for the collection of posts in the feed -->
@section('postContainer')
@foreach($posts as $post)

    <table style="width:200px">
        <tr>
            <th rowspan="2"><img src="{{{ $post->image }}}" width='50' height ='50'></img></th>
            <td>{{{ $post->name }}}</td>
        </tr>
    <tr>
        <td>{{{ $post->message }}}</td>
    </tr>
    <tr>
        <td>{{{ $post->time }}}</td>
    </tr>
    <button type="button" class="btn btn-default"><a href='{{{ url("delete_post_action/$post->id") }}}'>Delete</a></button>
    </table></br></br>
@endforeach
@stop