<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	$input = Input::all();
	$id = $_GET['id'];
	$post = Post::find($id);
	$comment = new Comment;
	$v = Validator::make($input, Comment::$rules);
	if ($v->passes()) {
	    $comment->name = $input['name'];
	    $comment->message = $input['message'];
	    $post->comments()->save($comment);
		return Redirect::action('post.show', $id);
	} else {
	//die("ERRORS");
		return Redirect::action('post.show')->withErrors($v);
	}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return Redirect::route('comment.store', $post->id);
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
		$comment = Comment::find($id);
		$comment->delete();
		return Redirect::back();	
	}


}
