@extends('layout.master')
@section('userProfile')
<div>
<div class='profileHeader'>
    <div class='profileIcon'>
            <?php $user = User::where('id', $user->id)->first(); ?>
            @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                <img src="{{ $user->image->url('medium') }}">
            @else
                <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
            @endif
    </div>
    <div class='personInfo'>
        {{ $user->fullname }}<br>
        <span style='font-style:italic'>{{ $user->email }}</span><br>
        {{ $age . ' years old.' }}<br>
    
    </div>
    <div class='interact'>
    @if (Auth::check())
        @if ($user->id != Auth::user()->id)
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
                <div class='searchIcon'>
                        <?php $user = User::where('id', $friend->id)->first(); ?>
                        @if ($user->image->url('thumb')=='http://s2945731-jwoods1996.c9users.io/2503ict/assignmentnew/public/images/thumb/missing.png')
                            <img src="{{ asset($user->image->url('thumb')) }}">
                        @else
                            <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
                        @endif
                </div>  
	         </div>
	         <div class='personInfo'>
	             {{ link_to_route('user.show', $friend->fullname, $friend->email) }}<br>
	             {{ $friend->email }}<br>
	         </div>
	     </div>
    @endforeach
@stop