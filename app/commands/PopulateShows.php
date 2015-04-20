<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PopulateShows extends Command {

	protected $name 			= 'populate:shows';
	protected $description 	= 'Populate shows database';

	public function fire()
	{
		
		$last_show = Show::orderBy('id', 'DESC')
			->first();

		$start = $last_show ? $last_show->id : 0;

		do
		{

			$this->info("Trying ID: " . ++$start);

			try
			{

				$show = TMDB::getTvApi()->getTvshow($start);

				$this->info("Found show: " . $show["name"]);

				$model = Show::find($show["id"]);

				if ( ! $model )
				{

					$model = new Show;
					$model->id = $show["id"];
				}

				$model->backdrop_url = is_null($show["backdrop_path"]) ? 'place-holder' : $show["backdrop_path"];
				$model->first_air_date = $show["first_air_date"];
				$model->homepage = is_null($show["homepage"]) ? 'n/a' : $show["homepage"];
				$model->name = $show["name"];
				$model->overview = $show["overview"];
				$model->vote_average = $show["vote_average"];
				$model->vote_count = $show["vote_count"];
				
				$model->save();

				$genres = [];

				$genres = [];

				foreach ($show['genres'] as $genre)
				{

					$db_genre = Genre::find($genre['id']);

					if ( ! $db_genre)
					{

						$db_genre = new Genre;
						$db_genre->description = $genre["name"];
						$db_genre->save();
					}

					$genres[] = $db_genre->id;
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
