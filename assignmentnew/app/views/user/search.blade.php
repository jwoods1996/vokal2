@extends('layout.master')
@section('userInfo')
@stop
@section('searchResults')

@foreach ($users as $user) 
    @if ((stripos($user['email'], $searchTerm) !== FALSE) OR strpos($user['fullName'], $searchTerm) !== FALSE) 
	     <div class='personSummary'>
	         <div class='personIcon'>
	             <img src='{{ $user->image }}'>
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