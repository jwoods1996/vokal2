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

/* Load sample data, an array of associative arrays. */
require "models/friends.php";
require "models/posts.php";


// Display search form
Route::get('/', function()
{
  $postamount = rand(1,10);
  $posts = displayPosts($postamount);
	return View::make('social.home')->with('posts', $posts)->with('postamount', $postamount);
});

Route::get('/friends', function()
{
  $friendsList = displayFriends();

	return View::make('social.friends')->with('friendsList', $friendsList);
});

function displayFriends() {
  $friends = getFriends();
  return $friends;
}

function displayPosts($postamount) {
  $posts = getPosts();
  $results = array();
  for ($i=0; $i<($postamount); $i++) {
    $results[] = $posts[$i];
  }
  $posts = $results;
  return $posts;
}

