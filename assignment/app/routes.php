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

Route::get('/', function()
{
  $posts = displayPosts();
  return View::make('social.feed')->with('posts', $posts);
});
Route::get('/feed', function()
{

  $posts = displayPosts();
  return View::make('social.feed')->with('posts', $posts);
});


Route::get('comments/{postid}', function($postid)
{
    $posts = displaySinglePost($postid);
    $comments = displayComments($postid);

    return View::make('social.comments')->withPosts($posts)->withComments($comments);
});
Route::get('add_comment_action/{postid}', function($postid)
{
    $name = $_POST["name"];
    $message = $_POST["message"];
    $id = add_comment($postid, $name, $message);
    return Redirect::to("/comments/$postid");
});
function displayPosts() {
    $sql = "select * from posts order by time DESC";
    $posts = DB::select($sql);
    return $posts;
}
function displaySinglePost($postid) {
    $sql = "select * from posts where id = ?";
    $posts = DB::select($sql, array($postid));
    return $posts;
}
function displayComments() {
    $sql = "select * from comments where postid = ?";
    $comments = DB::select($sql);
    return $comments;
}
Route::get('/editor', function()
{
    return View::make('social.editor');
});

Route::get('/friends', function()
{
    return View::make('social.friends');
});

Route::get('/messages', function()
{
    return View::make('social.messages');
});

Route::get('/notifications', function()
{
    return View::make('social.notifications');
});




Route::post('add_post_action', function()
{
    $time = date(DATE_ATOM);
    $title = $_POST["title"];
    $name = $_POST["name"];
    $message = $_POST["message"];
    $id = add_post($title, $name, $message, $time);
    return Redirect::to("/feed");

});

Route::get('delete_post_action/{postid}', function($postid)
{   
    delete_post($postid);

    return Redirect::to("/feed");

});

function delete_post($postid) {
    $sql = "delete from posts where id = ?";
    DB::delete($sql, array($postid));
}
function add_post($title, $name, $message, $time)
{
    $sql = "insert into posts (image, title, name, message, time) values (?, ?, ?, ?, ?)";
    DB::insert($sql, array('http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', $title, $name, $message, $time));
    $order = "select * from posts order by time DESC";
    DB::statement($order);
    $id = DB::getPdo()->lastInsertId();
    return $id;
} 
function add_comment($postid, $name, $message)
{
    $sql = "insert into comments (postid, name, message) values (?, ?, ?)";
    DB::insert($sql, array($postid, $name, $message));
    $id = DB::getPdo()->lastInsertId();
    return $id;
}