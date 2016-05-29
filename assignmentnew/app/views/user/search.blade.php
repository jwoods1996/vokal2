@extends('layout.master')
@section('userInfo')
@stop
@section('searchResults')

@foreach ($users as $user) 
    @if ((stripos($user['email'], $searchTerm) !== FALSE) OR strpos($user['fullName'], $searchTerm) !== FALSE) 
	     <div class='personSummary'>
	         <div class='thumbIcon'>
                @if (Auth::check() AND $user->id == Auth::user()->id)   
                    <img src="{{ asset(Auth::user()->image->url('thumb')) }}">
                @else
                    <?php $user = User::where('id', $user->id)->first(); ?>
                    @if ($user->image)
                        <img src="{{ asset($user->image->url('thumb')) }}">
                    @else
                        <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                    @endif
                @endif
	         </div>
	         <div class='personInfo'>
	             {{ link_to_route('user.show', $user->fullname, $user->email) }}<br>
	             {{ $user->email }}<br>
	             {{ $user->dob }}<br>
	         </div>
	     </div>
    @endif
@endforeach
@stop