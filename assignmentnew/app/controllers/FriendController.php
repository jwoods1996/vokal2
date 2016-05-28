<?php

class FriendController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	//	$friendships = Friend::where("user_id", Auth::user()->id);
	//	$friend_id = $friendships->friend_id;
	//	$friends = User::where("user_id", $friend_id);
	//	return View::make('friend.index', compact('friends'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $user_id = $_GET['user_id'];
        $friend_id = $_GET['friend_id'];
        $person = User::where("id", $friend_id)->first();
        
        $friend = new Friend;
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $friend_id;
        $friend->save();
        
        $friend = new Friend;
        $friend->user_id = $friend_id;
        $friend->friend_id = Auth::user()->id;
        $friend->save();
        return Redirect::action('user.show', $person->email);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id)->first();
		//die($friends);
		$user_id = $user->id;
		if (Auth::check()) {
			$friendshipstatus = Friend::where("user_id", Auth::user()->id)->where("friend_id", $user_id)->first();
		} else {
			$friendshipstatus = false;
		}
		$friendships = Friend::where("user_id", $id)->get();
		//$friends = [];
		//foreach ($friendships as $friendship) {
		//	$friends[] = User::where("id", $friendship->friend_id)->first();
		//}
		
		return View::make('friend.show', compact('user', 'friends', 'friendshipstatus'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		$friend = Friend::where("id", $id);
        $friend_id = $_GET['friend_id'];
		$person = User::where("id", $friend_id)->first();
		$friend->delete();
        return Redirect::action('user.show', $person->email);
	}


}
