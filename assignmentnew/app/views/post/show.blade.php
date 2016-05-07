@extends('layout.master')

@section('postContainer')
    ID: {{{ $post->id }}}<br>
    Name: {{{ $post->name }}}<br>
    Title: {{{ $post->title }}}<br>
    Message: {{{ $post->message }}}<br>
    Comments: {{{ $post->commentsAmount }}}<br>
    Created at: {{{ $post->created_at }}}<br>
    Updated at: {{{ $post->updated_at }}}<br><br><br>
@stop