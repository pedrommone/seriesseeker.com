<?php

Route::get('/', 'HomeController@getIndex');

Route::controller('status', 'StatusController');
Route::controller('users', 'UsersController');
Route::controller('movies', 'MoviesController');
Route::controller('search', 'SearchController');
Route::controller('season-episodes', 'SeasonEpisodesController');
Route::controller('seasons', 'SeasonsController');
Route::controller('my-account', 'MyAccountController');
Route::controller('shows', 'ShowsController');
