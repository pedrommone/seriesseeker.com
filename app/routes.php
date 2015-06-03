<?php

use Tmdb\Laravel\Facades\Tmdb;

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

Route::get('/', 'HomeController@getIndex');

Route::controller('status', 'StatusController');
Route::controller('users', 'UsersController');
Route::controller('movies', 'MoviesController');
Route::controller('search', 'SearchController');
Route::controller('season-episodes', 'SeasonEpisodesController');
Route::controller('seasons', 'SeasonsController');
Route::controller('my-account', 'MyAccountController');
Route::controller('shows', 'ShowsController');

Route::get('teste', function(){

	
});
