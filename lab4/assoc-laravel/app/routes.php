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
require "models/users.php";


// Display search form
Route::get('/', function()
{
	return View::make('users.query');
});

// Perform search and display results
Route::get('search', function()
{
  $userSearch = Input::get('searchTerm');

  $results = search($userSearch);

	return View::make('users.results')->withUsers($results)->with('userSearch', $userSearch);
});


/* Functions for user database example. */

/* Search sample data for $name or $year or $state from form. */
function search($userSearch) {
  $users = getUsers();

  if (!empty($userSearch)) {
    $results = array();
	  foreach ($users as $user) {
	    if ((stripos($user['name'], $userSearch) !== FALSE) || 
		   	(strpos($user['address'], $userSearch) !== FALSE) || 
		   	(strpos($user['phone'], $userSearch) !== FALSE) || 
		   	(stripos($user['email'], $userSearch) !== FALSE)) {
		  $results[] = $user;
	    }
	}
    $users = $results;
  }
  if (!empty($address)) {
    $results = array();
    foreach ($users as $user) {
      if (stripos($user['name'], $name) !== FALSE) {
        $results[] = $user;
      }
    }
    $users = $results;
  }
    if (!empty($phone)) {
    $results = array();
    foreach ($users as $user) {
      if (stripos($user['name'], $name) !== FALSE) {
        $results[] = $user;
      }
    }
    $users = $results;
  }
    if (!empty($name)) {
    $results = array();
    foreach ($users as $user) {
      if (stripos($user['name'], $name) !== FALSE) {
        $results[] = $user;
      }
    }
    $users = $results;
  }

  return $users;
}