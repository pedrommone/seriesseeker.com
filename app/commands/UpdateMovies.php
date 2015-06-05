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

		// Get the first 20 movies
		$movie_changes = ItemsToUpdate::where('type', 'M')->get()->take(20);

		if ( ! $movie_changes ) 
			return;

		foreach ($movie_changes as $change)
		{

			try
			{
				
				$movie = TMDB::getMoviesApi()->getMovie($change->target);

				$this->info("Update movie: " . $movie["original_title"]);

				$model = Movie::find($movie["id"]);

				if ( ! $model ) {

					$model = new Movie;
					$model->id = $movie["id"];
				}

				if ( isset($movie["overview"]) )
					$model->overview = $movie["overview"];

				$model->backdrop_url = $movie["backdrop_path"];
				$model->poster_url = $movie["poster_path"];
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

					$db_genre = Genre::firstOrCreate([
						'description' => $genre['name']
					]);

					$genres[] = $db_genre->id;
				}

				$model->genres()->sync($genres);

				// delete the item
				$change->delete();

			} catch (Exception $e) {

				if ( $e->getMessage() == "The pre-requisite id is invalid or not found." )
				{

					$change->delete();
					continue;
				}

				$this->error("ID not found: " . $e->getMessage());
			}

			sleep(1);
		}
	}
}
