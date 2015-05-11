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

			foreach ($genres['genres'] as $genre)
			{

				$db_genre = Genre::firstOrCreate([
						'description' => $genre['name']
				]);
			}
		}

		$this->info('Saved ' . count($genres['genres']) . ' genres');
	}
}
