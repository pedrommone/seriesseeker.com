<?php

use Tmdb\Laravel\Facades\Tmdb;

Route::get('/', 'HomeController@getIndex');

Route::controller('status', 'StatusController');
Route::controller('users', 'UsersController');
Route::controller('movies', 'MoviesController');
Route::controller('search', 'SearchController');
Route::controller('season-episodes', 'SeasonEpisodesController');
Route::controller('seasons', 'SeasonsController');
Route::controller('my-account', 'MyAccountController');
Route::controller('calendar', 'CalendarController');
Route::controller('shows', 'ShowsController');

Route::get('teste', function(){

	$movie = TMDB::getMoviesApi()->getMovie(151590);

	return var_dump($movie);
});
