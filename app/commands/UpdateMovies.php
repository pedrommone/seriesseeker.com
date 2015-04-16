<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateMovies extends Command {

	protected $name 			= 'update:movies';
	protected $description 	= 'Update movies database';

	public function fire()
	{
		
		// workaround, remove it!
		Config::set('tmdb-package::tmdb.api_key', $_ENV['TMDB_API']);

		var_dump( Tmdb::getMoviesApi()->getMovie( 300 ) );
	}
}
