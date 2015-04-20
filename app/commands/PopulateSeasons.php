<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PopulateSeasons extends Command {

	protected $name 			= 'populate:seasons';
	protected $description 	= 'Populate seasons database';

	public function fire()
	{

		$shows = Show::all();

		foreach ($shows as $show)
		{

			$this->info("Populating show: " . $show->name);

			try
			{

				$season_counter = 0;
				
				do
				{

					$this->info("Trying ID: " . ++$season_counter);

					try
					{
						
						$season = TMDB::getTvSeasonApi()->getSeason($show->id, $season_counter);
					}
					catch (Tmdb\Exception\TmdbApiException $e)
					{

						break;
					}

					$model_season = ShowSeason::find($season["id"]);

					if ( ! $model_season )
					{

						$model_season = new ShowSeason;
						$model_season->id = $season["id"];
					}

					$model_season->show_id = $show->id;
					$model_season->season_number = $season["season_number"];
					$model_season->air_date = $season["air_date"];
					$model_season->poster_url = isset($season["poster_path"]) ? $season["poster_path"] : 'place-holder';

					$model_season->save();

					foreach ($season['episodes'] as $episode)
					{

						$model_episode = SeasonEpisode::find($episode["id"]);

						if ( ! $model_episode )
						{

							$model_episode = new SeasonEpisode;
							$model_episode->id = $episode["id"];
						}

						$model_episode->show_season_id = $model_season->id;
						$model_episode->episode_number = $episode["episode_number"];
						$model_episode->air_date = $episode["air_date"];
						$model_episode->name = $episode["name"];
						$model_episode->overview = $episode["overview"];
						$model_episode->still_url = isset($season["still_path"]) ? $season["still_path"] : 'place-holder';
						$model_episode->vote_average = $episode["vote_average"];
						$model_episode->vote_count = $episode["vote_count"];

						$model_episode->save();
					}

				} while (true);

			}
			catch (Tmdb\Exception\TmdbApiException $e)
			{

				$this->info("ID not found: " . $e->getMessage());
			}
			catch (Exception $e)
			{

				$this->error("Error: " . $e->getMessage());
			}
		}
	}
}
