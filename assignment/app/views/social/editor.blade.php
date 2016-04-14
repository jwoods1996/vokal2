@extends('layouts.master')

<!-- Edit box -->
@section('postEditor')
@foreach($posts as $post)
    <div class='postForm'>
    <form method="post" action = '{{{ url("edit_post_action/$post->id") }}}' >
        <div class='form-fields'>
           <div class="form-title">Title:</div>
           <input type="text" name="title" class='form-field' value={{{$post->title}}}><br>
           <div class="form-title">Name:</div>
           <input type="text" name="name" class='form-field' value={{{$post->name}}}><br>
           <div class="form-title">Message:</div>
           <textarea rows="2" cols="50" name="message">{{{$post->message}}}</textarea><br>
        </div>
        <button type="submit" class='btn btn-default' name="button" value='save'>Save</button>
        <button type ="submit" class='btn btn-default' name="button" value='cancel'>Cancel</button>
    </form>
    </div>
@endforeach
@stop