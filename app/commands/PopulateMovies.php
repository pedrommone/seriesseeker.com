<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PopulateMovies extends Command {

	protected $name 			= 'populate:movies';
	protected $description 	= 'Populate movies database';

	public function fire()
	{
		
		// workaround, remove it!
		Config::set('tmdb-package::tmdb.api_key', $_ENV['TMDB_API']);

		$start = 0;

		do
		{

			$this->info("Trying ID: " . ++$start);

			try
			{

				$movie = TMDB::getMoviesApi()->getMovie($start);

				$this->info("Found movie: " . $movie["original_title"]);

				$model = Movie::find($movie["id"]);

				if ( ! $model )
				{

					$model = new Movie;
					$model->id = $movie["id"];
				}

				$model->backdrop_url = array_get($movie, "backdrop_path", "place-holder");
				$model->poster_url = array_get($movie, "poster_path", "place-holder");
				$model->imdb_id = $movie["imdb_id"];
				$model->release_date = $movie["release_date"];
				$model->runtime = $movie["runtime"];
				$model->title = $movie["original_title"];
				$model->vote_average = $movie["vote_average"];
				$model->vote_count = $movie["vote_count"];

				$model->save();

				$genres = [];

				foreach ($movie['genres'] as $genre)
				{

					$genres[] = $genre['id'];
				}

				$model->genres()->sync($genres);
			}
			catch (Tmdb\Exception\TmdbApiException $e)
			{

				$this->info("ID not found: " . $e->getMessage());
			}
			catch (Exception $e)
			{

				$this->error("Error: " . $e->getMessage());
			}

			usleep(500);
		}
		while (true);
	}
}
