<?php

class PostController extends \BaseController {


//function update_comment_amount($id) 
//{
//	$post = Post::find($id);
//	$comments = Post::find($id)->comments;
//	$commentsAmount = count($comments);
//	$post->commentsAmount = $commentsAmount;
//    $post->save(); 
//	return Redirect::action('PostController@displayComments', $id);
//}
//function displayPosts() 
//{
//	$posts = Post::orderBy('updated_at', 'DESC')->get();
//	return View::make('social.feed', compact('posts')); 
//}
//function displaySinglePost($postid) 
//{
////$posts = Post::find($postid);
////die("Displaying?");
////return View::make('social.comments', compact('posts')); --}}	
//}
//function create_post() {}
//function add_post() 
//{
//	$input = Input::all();
//	$v = Validator::make($input, Post::$rules);
//	if ($v->passes()) {
//	    $post->name = $input['name'];
//	    $post->name = $input['title'];
//	    $post->message = $input['message'];
//	    $post->save(); 
//		$post = Post::create(array(
//			'image' => 'https://s3.amazonaws.com/whisperinvest-images/default.png',
//			'name' => $input['name'],
//			'title' => $input['title'], 
//			'message' => $input['message'],
//			'commentsAmount' => '0'
//		));
//		return Redirect::action('PostController@displayPosts');
//	} else {
//	//die("ERRORS");
//		return Redirect::action('PostController@displayPosts')->withErrors($v);
//	}
//} 
//function edit_post($id) 
//{
//	$post = Post::find($id);
//	return View::make('social.editor')->withPost($post);	
//}
//function update_post($id) 
//{
//	$button = $_POST["button"];
//    //If the user clicked save,
//	$input = Input::all();
//	$post = Post::find($id);
//    if ($button = "save") {
//        $v = Validator::make($input, Post::$rules);
// 		if ($v->passes()) {
//    	   	$post->title = $input['title'];
//    	   	$post->message = $input['message'];
//    	   	$post->save(); 
//			//return Redirect::route('social.update_post', $post->id);
//			return Redirect::action('PostController@displayComments', $post->id);
//    	} else {
//    		return Redirect::action('PostController@edit_post', $post->id)->withErrors($v);
//    	}	
//    } else if ($button = "cancel") {
//    	return Redirect::action('PostController@displayPosts', $post->id);
//    }
//}
//function delete_post($id) 
//{
// 		$post = Post::find($id);
//		$post->delete();
//		return Redirect::action('PostController@displayPosts');	
//}
//function displayComments($postid) {
//	$post = Post::find($postid);
//	$comments = Post::find($postid)->comments;
//	return View::make('social.comments', compact('post', 'comments')); 
//	
//}
//function add_comment($id) 
//{
//	$input = Input::all();
//	$post = Post::find($id);
//    $v = Validator::make($input, Comment::$rules);
// 	if ($v->passes()) {
//		$comment = new Comment;
//		$comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
//		$comment->name = $input['name'];
//		$comment->message = $input['message'];
//		$post->comments()->save($comment);
//		return Redirect::action('PostController@update_comment_amount', $id);
//	} else {
//		return Redirect::action('PostController@displayComments', $post->id)->withErrors($v);
//	}	
//}
//function delete_comment($postid, $commentid) 
//{
// 		$post = Post::find($postid);
//		$comment = Comment::find($commentid);
//		$comment->delete();
//		return Redirect::action('post.show', $postid);		
//}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function index()
{
	$posts = Post::orderBy('updated_at', 'DESC')->get();
	if (Auth::check()) {
	$friends = User::find(Auth::user()->id)->friends;
	}
	return View::make('post.index', compact('posts')); 
}


/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */
public function create()
{
	return View::make('post.create');
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
	$user = User::where("id", $id)->first();
	$post = new Post;
	$v = Validator::make($input, Post::$rules);
	if ($v->passes()) {
		$post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
	    $post->name = Auth::user()->fullname;
	    $post->title = $input['title'];
	    $post->privacy = $input['privacy'];
	    $post->message = $input['message'];
	    $post->commentsAmount = 0;
	    $user->posts()->save($post); 
		return Redirect::route('post.index');
	} else {
	//die("ERRORS");
		return Redirect::action('post.index')->withErrors($v);
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
	if ($post->comments->count()>0) {
		$comments = $post->comments;
	} else {
		$comments = 'null';
		$comment = 'null';
	}
	return View::make('post.show', compact('post', 'comments', 'comment'));

}


/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
public function edit($id)
{
	$post = Post::find($id);
	if ($post->user_id == Auth::user()->id){
	return View::make('post.edit')->withPost($post);
	}
}


/**
 * Update the specified resource in storage.
 *
 * @param  int  $id
 * @return Response
 */
public function update($id)
{
	$input = Input::all();
	$post = Post::find($id);
	$v = Validator::make($input, Post::$rules);
	if ($v->passes()) {
		$post->title = $input['title'];
		$post->privacy = $input['privacy'];
	    $post->name = Auth::user()->fullname;
	    $post->message = $input['message'];
	    $post->save(); 
		return Redirect::route('post.show', $post->id);
	} else {
	//die("ERRORS");
		return Redirect::route('post.show', $post->id)->withErrors($v);
	}
} 


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
public function destroy($id)
{
	$post = Post::find($id);
	$post->delete();
	return Redirect::action('post.index');	
}//


}
