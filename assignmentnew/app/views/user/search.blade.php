@extends('layout.master')
@section('userInfo')
@stop
@section('searchResults')

@foreach ($users as $user) 
    @if ((stripos($user['email'], $searchTerm) !== FALSE) OR strpos($user['fullName'], $searchTerm) !== FALSE) 
	     <div class='personSummary'>
	         <div class='searchIcon'>
                    <?php $user = User::where('id', $user->id)->first(); ?>
                    @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                        <img src="{{ asset($user->image->url('thumb')) }}">
                    @else
                        <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                    @endif
	         </div>
	         <div class='personInfo'>
	             {{ link_to_route('user.show', $user->fullname, $user->email) }}<br>
	             {{ $user->email }}<br>
	         </div>
	     </div>
    @endif
@endforeach
@stop