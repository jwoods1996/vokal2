@extends('layout.master')
@section('userProfile')
<div>
<div class='profileHeader'>
    <div class='personIcon'>
        <img src='{{ $user->image }}'>
    </div>
    <div class='personInfo'>
        {{ $user->fullname }}<br>
        <span style='font-style:italic'>{{ $user->email }}</span><br>
        XX years old<br>
    
    </div>
    <div class='interact'>
    @if (Auth::check())
        
        @if ($friendshipstatus)
                {{ Form::open(array('method' => 'DELETE', 'action' => array('friend.destroy', $friendshipstatus->id, 'friend_id' => $user->id))) }}
                {{ Form::submit('Remove Friend', array('class' => 'friendBtn')) }}
                {{ Form::close() }}
        @else
                {{ Form::open(array('method' => 'POST', 'action' => array('friend.store', 'friend_id' => $user->id, 'user_id' => Auth::user()->id))) }}
                {{ Form::submit('Add Friend', array('class' => 'friendBtn')) }}
                {{ Form::close() }}
        @endif





    @endif
        
    </div>
</div>
<div class='profileNavbar'>
    <div class='postLink'>
        {{ link_to_route('user.show', 'Posts', $user->email) }}
    </div>
    <div class='friendLink'>
        {{ link_to_route('friend.show', 'Friends', $user->id) }}
    </div>
</div>
</div>
@stop
@section('friendsList')
    @foreach ($friends as $friend)
	     <div class='personSummary'>
	         <div class='personIcon'>
	             <img src='{{ $friend->image }}'>
	         </div>
	         <div class='personInfo'>
	             {{ link_to_route('user.show', $friend->fullname, $friend->email) }}<br>
	             {{ $friend->email }}<br>
	             {{ $friend->dob }}<br>
	         </div>
	     </div>
    @endforeach
@stop