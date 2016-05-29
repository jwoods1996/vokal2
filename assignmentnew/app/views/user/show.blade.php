@extends('layout.master')

@section('userProfile')
<div>
<div class='profileHeader'>
    <div class='profileIcon'>
        @if (Auth::check() AND $user->id == Auth::user()->id)   
            <img src="{{ asset(Auth::user()->image->url('medium')) }}">
        @else
            <?php $user = User::where('id', $user->id)->first(); ?>
            @if ($user->image)
                <img src="{{ asset(asset($user->image->url('medium'))) }}">
            @else
                <img src="https://s3.amazonaws.com/whisperinvest-images/default.png">
            @endif
        @endif
    </div>
    <div class='personInfo'>
        {{ $user->fullname }}<br>
        <span style='font-style:italic'>{{ $user->email }}</span><br>
        <?php $dob = new DateTime($user->dob);
        $dob->format('Y-m-d');
        $datenow = new DateTime();
        $datenow->format('Y-m-d');
        $age = $dob->diff($datenow)->y;?>
        {{ $age . ' years old.' }}
        <br><br>
    @if (Auth::check())
        @if ($friendshipstatus)
        ✓ Friends
        @endif
    @endif
    </div>
    <div class='interact'>
    @if (Auth::check())
    
        @if ($user->id != Auth::user()->id)
            @if ($friendshipstatus)
                    {{ Form::open(array('method' => 'DELETE', 'action' => array('friend.destroy', $friendshipstatus->id, 'friend_id' => $user->id, 'user_id' => Auth::user()->id))) }}
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
@section('userPosts')
@foreach ($posts as $post)
    @if ($post->privacy == 'public')
        <div class='postBox'>
            <div class='postHeader'>
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
                <div class='postDescription'>
                    <span class='postTitle'>{{{ $post->title }}}</span></br>
                    <span class='postName'>Posted by {{{ $post->name}}}</span>
                </div>
        @if (Auth::check())
        @if ($post->user_id == Auth::user()->id)
        <div class='dropdown postOptions'>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              
              <span class="caret"></span>
            </button>
                    <ul class="dropdown-menu">
                        <li>
                            {{ Form::open(array('method' => 'GET', 'action' => array('post.edit', $post->id))) }}
                            {{ Form::submit('Edit', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                        </li>
                        <li>
                            {{ Form::open(array('method' => 'DELETE', 'action' => array('post.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
        </div>
        @endif
        @endif
            </div>
            <div class='postContent'>
                {{{ $post->message }}}
            </div>
            <div class='postComments'>
                <!--Get the total amount of comments for the relevant post-->
                <?php
                		$comments = $post->comments;
            	 	            $commentsAmount = count($comments);
            	 	            $post->commentsAmount = $commentsAmount;
            	 	      ?>
                <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'><a href='{{url("post/$post->id") }}'>View Comments</a></span>
            </div>
        </div>
    @endif
    @if ($post->privacy == 'private')
    @if (Auth::check())
    @if ($post->user_id == Auth::user()->id)
        <div class='postBox'>
            <div class='postHeader'>
                <div class='postIcon'>
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
                </div>
                <div class='postDescription'>
                    <span class='postTitle'>{{{ $post->title }}}</span></br>
                    <span class='postName'>Posted by {{{ $post->name}}}</span>
                </div>
        @if ($post->user_id == Auth::user()->id)
        <div class='dropdown postOptions'>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              
              <span class="caret"></span>
            </button>
                    <ul class="dropdown-menu">
                        <li>
                            {{ Form::open(array('method' => 'GET', 'action' => array('post.edit', $post->id))) }}
                            {{ Form::submit('Edit', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                        </li>
                        <li>
                            {{ Form::open(array('method' => 'DELETE', 'action' => array('post.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
        </div>
        @endif
            </div>
            <div class='postContent'>
                {{{ $post->message }}}
            </div>
            <div class='postComments'>
                <!--Get the total amount of comments for the relevant post-->
                <?php
                		$comments = $post->comments;
            	 	            $commentsAmount = count($comments);
            	 	            $post->commentsAmount = $commentsAmount;
            	 	      ?>
                <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'>
                <a href='{{url("post/$post->id") }}'>View Comments</a></span>
            </div>
        </div>    
    @endif
    @endif
    @endif
    @if ($post->privacy == 'friends')
        @if (Auth::check())
            @if ($friendshipstatus)
                <div class='postBox'>
                    <div class='postHeader'>
                        <div class='postIcon'>
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
                        </div>
                        <div class='postDescription'>
                            <span class='postTitle'>{{{ $post->title }}}</span></br>
                            <span class='postName'>Posted by {{{ $post->name}}}</span>
                        </div>
                @if ($post->user_id == Auth::user()->id)
                <div class='dropdown postOptions'>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                      
                      <span class="caret"></span>
                    </button>
                            <ul class="dropdown-menu">
                                <li>
                                    {{ Form::open(array('method' => 'GET', 'action' => array('post.edit', $post->id))) }}
                                    {{ Form::submit('Edit', array('class' => 'formButton saveButton')) }}
                                    {{ Form::close() }}
                                </li>
                                <li>
                                    {{ Form::open(array('method' => 'DELETE', 'action' => array('post.destroy', $post->id))) }}
                                    {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                                    {{ Form::close() }}
                                </li>
                            </ul>
                </div>
                @endif
                    </div>
                    <div class='postContent'>
                        {{{ $post->message }}}
                    </div>
                    <div class='postComments'>
                        <!--Get the total amount of comments for the relevant post-->
                        <?php
                        		$comments = $post->comments;
                    	 	            $commentsAmount = count($comments);
                    	 	            $post->commentsAmount = $commentsAmount;
                    	 	      ?>
                        <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'>
                        <a href='{{url("post/$post->id") }}'>View Comments</a></span>
                    </div>
                </div>    
            @endif
    @if ($post->user_id == Auth::user()->id)
        <div class='postBox'>
            <div class='postHeader'>
                <div class='postIcon'>
                    <img src='{{{ $post->image }}}' width='50px' height='50px'>
                </div>
                <div class='postDescription'>
                    <span class='postTitle'>{{{ $post->title }}}</span></br>
                    <span class='postName'>Posted by {{{ $post->name}}}</span>
                </div>
        @if ($post->user_id == Auth::user()->id)
        <div class='dropdown postOptions'>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              
              <span class="caret"></span>
            </button>
                    <ul class="dropdown-menu">
                        <li>
                            {{ Form::open(array('method' => 'GET', 'action' => array('post.edit', $post->id))) }}
                            {{ Form::submit('Edit', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                        </li>
                        <li>
                            {{ Form::open(array('method' => 'DELETE', 'action' => array('post.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'formButton saveButton')) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
        </div>
        @endif
            </div>
            <div class='postContent'>
                {{{ $post->message }}}
            </div>
            <div class='postComments'>
                <!--Get the total amount of comments for the relevant post-->
                <?php
                		$comments = $post->comments;
            	 	            $commentsAmount = count($comments);
            	 	            $post->commentsAmount = $commentsAmount;
            	 	      ?>
                <span class='commentCount'>{{{$post->commentsAmount}}} comments</span><span class='commentLink'>
                <a href='{{url("post/$post->id") }}'>View Comments</a></span>
            </div>
        </div>    
    @endif
        @endif
    @endif
@endforeach
@stop
