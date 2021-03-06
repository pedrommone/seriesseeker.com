<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

Artisan::add(new UpdateMovies);
Artisan::add(new UpdateGenres);
Artisan::add(new UpdateShows);
Artisan::add(new PopulateMovies);
Artisan::add(new PopulateShows);
Artisan::add(new UpdateQueue);
Artisan::add(new AlertWeeklyUpdate);
Artisan::add(new AlertDailyEpisodes);
Artisan::add(new AlertDailyMovie);
