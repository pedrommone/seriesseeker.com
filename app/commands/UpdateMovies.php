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

		$changes = TMDB::getChangesApi()->getMovieChanges('tt0094675');


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
