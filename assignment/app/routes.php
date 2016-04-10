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

function displayPosts() {
  $posts = getPosts();
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




Route::get('add_post_action', function()
{

});

function add_post($name, $message)
{
} 


