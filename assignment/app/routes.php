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

Route::get('/comments/{postid}', function($postid)
{
    $posts = displaySinglePost($postid);
    $comments = displayComments($postid);
    return View::make('social.comments')->withPosts($posts)->withComments($comments);
});

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

Route::post('add_comment_action/{postid}', function($postid)
{
    $name = $_POST["name"];
    $message = $_POST["message"];
    $id = add_comment($postid, $name, $message);
    return Redirect::to("/comments/$postid");
});

Route::get('delete_comment_action/{postid}/{commentid}', function($postid, $commentid)
{   
    delete_comment($commentid);
    return Redirect::to("/comments/$postid");

});

Route::get('delete_post_action/{postid}', function($postid)
{   
    delete_post($postid);
    return Redirect::to("/feed");
});

Route::get('edit_post/{postid}', function($postid)
{
    $posts = displaySinglePost($postid);
    return View::make('social.editor')->withPosts($posts);
});

Route::post('edit_post_action/{postid}', function($postid)
{
    $time = date(DATE_ATOM);
    $title = $_POST["title"];
    $name = $_POST["name"];
    $message = $_POST["message"];
    edit_post($postid, $title, $name, $message, $time); 
    return Redirect::to("/feed");
});

function edit_post($postid, $title, $name, $message, $time) {
    $sql = "UPDATE posts SET time=?,title=?,name=?,message=? WHERE id=?";
    DB::update($sql, array($time, $title, $name, $message, $postid));
}
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

function add_post($title, $name, $message, $time)
{
    $sql = "insert into posts (image, title, name, message, time) values (?, ?, ?, ?, ?)";
    DB::insert($sql, array('http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', $title, $name, $message, $time));
    $order = "select * from posts order by time DESC";
    DB::statement($order);
    $id = DB::getPdo()->lastInsertId();
    return $id;
} 

function delete_post($postid) {
    $sql = "delete from posts where id = ?";
    DB::delete($sql, array($postid));
}

function displayComments($postid) {
    $sql = "select * from comments where postid = ?";
    $comments = DB::select($sql, array($postid));
    return $comments;
}

function add_comment($postid, $name, $message)
{
    $sql = "insert into comments (postid, name, message) values (?, ?, ?)";
    DB::insert($sql, array($postid, $name, $message));
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

function delete_comment($commentid)
{
    $sql = "delete from comments where commentid = ?";
    DB::delete($sql, array($commentid));
}