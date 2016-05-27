@extends('layout.master')

@section('createSection')
        @if (Auth::check()) 
        {{ Auth::user()->email }}
        Logged in.
        @else
        <div class='loginBlock'>
        <div class='loginHeader'>
        <div class='loginStatus'>Create account</div><div class='createLink'>Already have an account? {{ link_to_route('user.index', 'Log in here') }}</div>
        </div>
        {{ Form::open(array('method' => 'POST', 'url' => secure_url('user'), 'class' => 'loginForm')) }} 
            {{ Form::label('email', 'Email: ') }}
            {{ Form::text('email') }}<br><br>
            {{ Form::label('firstName', 'First Name: ') }}
            {{ Form::text('firstName') }}<br><br>
            {{ Form::label('lastName', 'Surname: ') }}
            {{ Form::text('lastName') }}<br><br>
            {{ Form::label('dob', 'Date of birth: ') }}
            {{ Form::text('dob') }}<br><br>
            {{ Form::label('password', 'Password: ') }}
            {{ Form::password('password') }}<br><br>
            {{  Session::pull('login_error') }}
            {{ Form::submit('Login') }}
        {{ Form::close() }}
        </div>
        @endif
@stop