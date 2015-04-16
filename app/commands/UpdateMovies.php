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

		$movie = TMDB::getMoviesApi()->getMovie(1);

		return var_dump($genres);

		foreach ($genres['genres'] as $genre)
		{

			$aux = Genre::find($genre['id']);

			if ( ! $aux)
			{

				$aux = new Genre;
				$aux->id = $genre['id'];
			}

			$aux->description = $genre['name'];
			$aux->save();
		}

		$this->info('Saved ' . count($genres['genres']) . ' genres');
	}
}
