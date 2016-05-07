@extends('layout.master')

<!-- Edit box -->
@section('postEditor')

    <div class='postForm'>
        <span class='formTitle'>Edit post..</span>
    {{ Form::model($post, array('method' => 'PUT', 'action' => array('PostController@update_post', $post->id))) }}
        <div class='form-fields'>
           <div class="form-title">{{ Form::label('name', 'Name: ') }}</div>
           <span class='form-field'>{{ Form::text('name') }}</span><br>
            {{ $errors->first('name') }}
           <div class="form-title">{{ Form::label('title', 'Title: ') }}</div>
           <span class='form-field'>{{ Form::text('title') }}</span><br>
           <div class="form-title">{{ Form::label('message', 'Message: ') }}</div>
           <span class="form-field">{{ Form::text('message') }}</span>
           {{ $errors->first('message') }}
        </div>
        <div class='buttonBar'>
            {{ Form::submit('Save', array('class' => 'formButton saveButton', 'name' => 'button', 'value' => 'save')) }}
            {{ Form::submit('Cancel', array('class' => 'formButton cancelButton', 'name' => 'button', 'value' => 'cancel')) }}
        </div>
    {{ Form::close() }}
    </div>
@stop