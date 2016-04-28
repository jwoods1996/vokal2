<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

require "models/posts.php";

//When the homepage is loaded, load all the posts from the database
Route::get('/', function()
{
  $posts = displayPosts();
  return View::make('social.feed')->with('posts', $posts);
});

//When the homepage is loaded, load all the posts from the database
Route::get('/feed', function()
{
  $posts = displayPosts();
  return View::make('social.feed')->with('posts', $posts);
});

//Documentation page
Route::get('/documentation', function()
{
    return View::make('social.documentation');
});

//When on the comments page, only the relevant post must be displayed,
//so call a function to display this post only, as well as its comments
Route::get('/comments/{postid}', function($postid)
{
    $posts = displaySinglePost($postid);
    $comments = displayComments($postid);
    return View::make('social.comments')->withPosts($posts)->withComments($comments);
});

//Edit page
Route::get('/editor', function()
{
    return View::make('social.editor');
});

//Friends page
Route::get('/friends', function()
{
    return View::make('social.friends');
});

//Messages page
Route::get('/messages', function()
{
    return View::make('social.messages');
});

//Notifications page
Route::get('/notifications', function()
{
    return View::make('social.notifications');
});

//When a post is submitted, insert the time (for sorting), title, name, and 
//message into the database
Route::post('add_post_action', function()
{
    $time = date(DATE_ATOM);
    $title = clean($_POST["title"]);
    $name = clean($_POST["name"]);
    $message = clean($_POST["message"]);
    $commentsAmount = 0;
    $id = add_post($title, $name, $message, $time, $commentsAmount);
    //Redirect to the homepage
    return Redirect::to("/feed");

});

//When the edit screen is called, retrieve the post id from the url and display
//that post
Route::get('edit_post/{postid}', function($postid)
{
    $posts = displaySinglePost($postid);
    return View::make('social.editor')->withPosts($posts);
});

//When the post is edited, retrieve the data from the input frields and
//perform an action based on whether the user has pressed the save button
//or the cancel button
Route::post('edit_post_action/{postid}', function($postid)
{
    $button = $_POST["button"];
    //If the user clicked save,
    if ($button == "save") {
        //Store the new data,
        $time = date(DATE_ATOM);
        $title = $_POST["title"];
        $title = clean($title);
        $message = $_POST["message"];
        $message = clean($message);
        //Call a function to change this data in the database, and
        edit_post($postid, $title, $message, $time);
        //Redirect to the comments page
        return Redirect::to("/comments/$postid");   
    //If the user clicked cancel,
    } else if ($button == "cancel") {
        //Do nothing other than redirect to the homepage
        return Redirect::to("/feed");
    }
});

//When the user presses the delete button
Route::get('delete_post_action/{postid}', function($postid)
{   
    //Simply call a function to delete the post from the database
    delete_post($postid);
    //and then redirect to the homepage
    return Redirect::to("/feed");
});

//When the user posts a comment,
Route::post('add_comment_action/{postid}', function($postid)
{
    //Retrieve the data from the input fields
    $name = Input::get('name');
    $name = clean($name);
    $message = Input::get('message');
    $message = clean($message);
    //Call a function to submit the comment to the database
    $id = add_comment($postid, $name, $message);
    //Update the number of comments
    $commentsAmount = update_comment_amount($postid);
    //Redirect to the same comments page
    return Redirect::to("/comments/$postid");
});

//When the user deletes a comment, retrieve the post id and comment id from
//the url
Route::get('delete_comment_action/{postid}/{commentid}', function($postid, $commentid)
{   
    //Call a function to delete the comment from the database
    delete_comment($commentid);
    //Update the number of comments
    $commentsAmount = update_comment_amount($postid);
    //Redirect to the same comments page
    return Redirect::to("/comments/$postid");
});

//Update the comments amount variable for the relevant post
function update_comment_amount($postid) {
    $commentsAmount = DB::table('comments')->where('postid', $postid)->count();
    $sql = "UPDATE posts SET commentsAmount=? WHERE id=?";
    DB::update($sql, array($commentsAmount, $postid));
}
//Retrieve ALL the posts from the database, and sort them by most recent to
//least recent
function displayPosts() {
    $sql = "select * from posts order by time DESC";
    $posts = DB::select($sql);
    return $posts;
}

//Display only the revelant post, found with postid
function displaySinglePost($postid) {
    $sql = "select * from posts where id = ?";
    $posts = DB::select($sql, array($postid));
    return $posts;
}

//Add a post to the database
function add_post($title, $name, $message, $time, $commentsAmount)
{
    $sql = "insert into posts (image, title, name, message, time, commentsAmount) values (?, ?, ?, ?, ?, ?)";
    DB::insert($sql, array('https://s3.amazonaws.com/whisperinvest-images/default.png', $title, $name, $message, $time, $commentsAmount));
} 

//Update a post in the database
function edit_post($postid, $title, $message, $time) {
    $sql = "UPDATE posts SET time=?,title=?,message=? WHERE id=?";
    DB::update($sql, array($time, $title, $message, $postid));
}

//Remove a post from the database, based on the post's id
function delete_post($postid) {
    $sql = "delete from posts where id = ?";
    DB::delete($sql, array($postid));
}

//Retrieve a post's comments from the database
function displayComments($postid) {
    $sql = "select * from comments where postid = ?";
    $comments = DB::select($sql, array($postid));
    return $comments;
}

//Add a comment to the database
function add_comment($postid, $name, $message)
{
    $sql = "insert into comments (postid, name, message) values (?, ?, ?)";
    DB::insert($sql, array($postid, $name, $message));
}

//Remove a comment from the database
function delete_comment($commentid)
{
    $sql = "delete from comments where commentid = ?";
    DB::delete($sql, array($commentid));
}

function clean($input)
{
    return $input;
}