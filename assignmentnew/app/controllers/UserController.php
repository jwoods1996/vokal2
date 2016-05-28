<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return View::make('user.index'); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create'); 
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
 		$input = Input::all();
        $v = Validator::make($input, User::$rules);
 		if ($v->passes()) {
			$password = $input['password'];
 			$encrypted = Hash::make($password);
 			$user = new User;
 			$firstName = $input['firstName'];
 			$lastName = $input['lastName'];
 			$user->email = $input['email'];
			$user->password = $encrypted;
 			$user->fullName = $input['firstName'] . " " . $input['lastName'];
 			$user->dob = $input['dob'];
 			$user->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
 			$user->save();
 			return Redirect::route('user.index'); 
        } else {
       		//die("ERRORS");
        	return Redirect::route('user.create')->withErrors($v);
        }

	}
	
	public function login()
	{
		$userdata = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);
		
		if (Auth::attempt($userdata)){
			return Redirect::to(URL::previous());
		} else {
			 Session::put('login_error', 'Login failed');
			return Redirect::to(URL::previous())->withInput();
			
		}
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::action('user.index');
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where("email", $id)->first();
		$user_id = $user->id;
		if (Auth::check()) {
			$friendshipstatus = Friend::where("user_id", Auth::user()->id)->where("friend_id", $user_id)->first();
		} else {
			$friendshipstatus = false;
		}
		$posts = Post::orderBy('updated_at', 'DESC')->where("user_id", $user->id)->get();
		return View::make('user.show', compact('user', 'posts', 'friendship', 'friendshipstatus'));
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
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function search()
	{
		$searchTerm = Input::get('searchTerm');
  		$users = User::all();

 		if (!empty($searchTerm)) {
			return View::make('user.search')->withUsers($users)->with('searchTerm', $searchTerm);
 		}

	}

}
