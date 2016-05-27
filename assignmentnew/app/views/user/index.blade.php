@extends('layout.master')
@section('userInfo')
@section('loginSection')
        @if (Auth::check()) 
        {{ Redirect::action('post.index') }}
        @else
        <div class='loginBlock'>
        <div class='loginHeader'>
        <div class='loginStatus'>You are currently not logged in.<br>Login here.</div><div class='createLink'>Don't have an account? {{ link_to_route('user.create', 'Create an Account') }}</div>
        </div>
        {{ Form::open(array('url' => secure_url('user/login'), 'class' => 'loginForm')) }} 
            {{ Form::label('email', 'Email: ') }}
            {{ Form::text('email') }}<br><br>
            {{ Form::label('password', 'Password: ') }}
            {{ Form::password('password') }}<br><br>
            {{  Session::pull('login_error') }}
            {{ Form::submit('Login') }}
        {{ Form::close() }}
        </div>
        @endif
@stop