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
require "models/pms.php";


// Display search form
Route::get('/', function()
{
	return View::make('pms.query');
});

// Perform search and display results
Route::get('search', function()
{
  $pmSearch = Input::get('searchTerm');

  $results = search($pmSearch);

	return View::make('pms.results')->withPms($results)->with('pmSearch', $pmSearch);
});


/* Functions for pm database example. */

/* Search sample data for $name or $year or $state from form. */
function search($pmSearch) {
	

  if (!empty($pmSearch)) {
  	$sql = "select * from pms where name like ?";
		$pms = DB::select($sql, array("%$pmSearch%"));
		/*$queries = DB::getQueryLog(); 
		print_r($queries);
		print_r($pms);
		exit;*/

	}


  return $pms;
}