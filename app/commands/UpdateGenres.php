<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateGenres extends Command {

	protected $name 			= 'update:genres';
	protected $description 	= 'Update genres database';

	public function fire()
	{

		$genres = TMDB::getGenresApi()->getGenres();

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
