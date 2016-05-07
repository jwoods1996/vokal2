<?php

class PostController extends \BaseController {


function update_comment_amount($id) 
{
	$post = Post::find($id);
	$comments = Post::find($id)->comments;
	$commentsAmount = count($comments);
	$post->commentsAmount = $commentsAmount;
    $post->save(); 
	return Redirect::action('PostController@displayComments', $id);
}
function displayPosts() 
{
	$posts = Post::orderBy('updated_at', 'DESC')->get();
	return View::make('social.feed', compact('posts')); 
}
function displaySinglePost($postid) 
{
//$posts = Post::find($postid);
//die("Displaying?");
//return View::make('social.comments', compact('posts')); --}}	
}
function create_post() {}
function add_post() 
{
	$input = Input::all();
//       $v = Validator::make($input, Post::$rules);
// 	if ($v->passes()) {
//       	$post->name = $input['name'];
//       	$post->message = $input['message'];
//       	$post->save(); 
	$post = Post::create(array(
		'image' => 'https://s3.amazonaws.com/whisperinvest-images/default.png',
		'name' => $input['name'],
		'title' => $input['title'], 
		'message' => $input['message'],
		'commentsAmount' => '0'
		));
		return Redirect::action('PostController@displayPosts');
 //      } else {
       	//die("ERRORS");
//       	return Redirect::action('PostController@edit_post', $post->id)->withErrors($v);
 //      }
} 
function edit_post($id) 
{
	$post = Post::find($id);
	return View::make('social.editor')->withPost($post);	
}
function update_post($id) 
{
	$button = $_POST["button"];
    //If the user clicked save,
	$input = Input::all();
	$post = Post::find($id);
    if ($button = "save") {
        $v = Validator::make($input, Post::$rules);
 		if ($v->passes()) {
    	   	$post->title = $input['title'];
    	   	$post->message = $input['message'];
    	   	$post->save(); 
			//return Redirect::route('social.update_post', $post->id);
			return Redirect::action('PostController@displayComments', $post->id);
    	} else {
 			die("Here, mate");
    		//die("ERRORS");
    		return Redirect::action('PostController@edit_post', $post->id)->withErrors($v);
    	}	
    } else if ($button = "cancel") {
    	return Redirect::action('PostController@displayPosts', $post->id);
    }
}
function delete_post($id) 
{
 		$post = Post::find($id);
		$post->delete();
		return Redirect::action('PostController@displayPosts');	
}
function displayComments($postid) {
	$post = Post::find($postid);
	$comments = Post::find($postid)->comments;
	return View::make('social.comments', compact('post', 'comments')); 
	
}
function add_comment($id) 
{
	$input = Input::all();
//       $v = Validator::make($input, Post::$rules);
// 	if ($v->passes()) {
//       	$post->name = $input['name'];
//       	$post->message = $input['message'];
//       	$post->save(); 
		$comment = new Comment;
		$comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
		$comment->name = $input['name'];
		$comment->message = $input['message'];
		$post = Post::find($id);
		$post->comments()->save($comment);
		return Redirect::action('PostController@update_comment_amount', $id);
 //      } else {
       	//die("ERRORS");
//       	return Redirect::action('PostController@edit_post', $post->id)->withErrors($v);
 //      }	
}
function delete_comment($postid, $commentid) 
{
 		$post = Post::find($postid);
		$comment = Comment::find($commentid);
		$comment->delete();
		return Redirect::action('PostController@update_comment_amount', $postid);		
}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//public function index()
	//{
	//	$posts = Post::all();
	//	return View::make('post.index', compact('posts')); 
	//}
//
//
	///**
	// * Show the form for creating a new resource.
	// *
	// * @return Response
	// */
	//public function create()
	//{
	//	return View::make('post.create');
	//}
//
//
	///**
	// * Store a newly created resource in storage.
	// *
	// * @return Response
	// */
	//public function store()
	//{
	//	$input = Input::all();
    //    $v = Validator::make($input, Post::$rules);
 	//	if ($v->passes()) {
	//	$post = Post::create(array(
	//		'name' => 'New name',
	//		'title' => 'New title',
	//		'message' => 'New message',
	//		'image' => '',
	//		'commentsAmount' => 0,
	//		'created_at' => '',
	//		'updated_at' => ''
	//		));
	//		return Redirect::route('post.index');
    //    } else {
    //   		die("ERRORS");
    //    	//return Redirect::action('PostController@edit', $post->id)->withErrors($v);
    //    }
//
	//}
//
//
	///**
	// * Display the specified resource.
	// *
	// * @param  int  $id
	// * @return Response
	// */
	//public function show($id)
	//{
	//	$post = Post::find($id);
	//	return View::make('post.show')->with('post', $post); 
//
	//}
//
//
	///**
	// * Show the form for editing the specified resource.
	// *
	// * @param  int  $id
	// * @return Response
	// */
	//public function edit($id)
	//{
	//	$post = Post::find($id);
	//	return View::make('post.edit')->withPost($post);
	//}
//
//
	///**
	// * Update the specified resource in storage.
	// *
	// * @param  int  $id
	// * @return Response
	// */
	//public function update($id)
	//{
	//	$input = Input::all();
	//	$post = Post::find($id);
    //    $v = Validator::make($input, Post::$rules);
 	//	if ($v->passes()) {
    //    	$post->title = $input['title'];
    //    	$post->name = $input['name'];
    //    	$post->message = $input['message'];
    //    	$post->save(); 
	//		return Redirect::route('post.index', $post->id);
    //    } else {
    //   		die("ERRORS");
    //    	//return Redirect::action('PostController@edit', $post->id)->withErrors($v);
    //    }
	//}
//
//
	///**
	// * Remove the specified resource from storage.
	// *
	// * @param  int  $id
	// * @return Response
	// */
	//public function destroy($id)
	//{
	//	//
	//}//


}
