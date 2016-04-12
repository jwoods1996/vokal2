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

function displayPosts() {
    $sql = "select * from posts order by time DESC";
    $posts = DB::select($sql);
    return $posts;
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
    $name = $_POST["name"];
    $message = $_POST["message"];
    $id = add_post($name, $message, $time);
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
function add_post($name, $message, $time)
{
    $sql = "insert into posts (image, name, message, time) values (?, ?, ?, ?)";
    DB::insert($sql, array('http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', $name, $message, $time));
    $order = "select * from posts order by time DESC";
    DB::statement($order);
    $id = DB::getPdo()->lastInsertId();
    return $id;
} 


