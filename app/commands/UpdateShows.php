<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateShows extends Command {

	protected $name = 'update:shows';
	protected $description = 'Process the shows to update in queue.';

	public function fire()
	{

		$debug = $this->option('debug');

		// Get the first 20 shows
		$show_changes = ItemsToUpdate::where('type', 'S')->get()->take(20);

		if ( ! $show_changes)
			return;

		foreach ($show_changes as $change)
		{
			
			try
			{
				
				// Get the target of update
				$show = TMDB::getTvApi()->getTvshow($change->target);

				if ($debug)
					$this->info("Update show: " . $show["name"]);

				$model = Show::find($show["id"]);

				if ( ! $model )
				{

					$model = new Show;
					$model->id = $show["id"];
				}

				$model->backdrop_url = $show["backdrop_path"];
				$model->first_air_date = $show["first_air_date"];
				$model->homepage = $show["homepage"];
				$model->name = $show["name"];
				$model->overview = $show["overview"];
				$model->vote_average = $show["vote_average"];
				$model->vote_count = $show["vote_count"];
				
				$model->save();

				$genres = [];

				foreach ($show['genres'] as $genre)
				{

					$db_genre = Genre::firstOrCreate([
						'description' => $genre['name']
					]);

					$genres[] = $db_genre->id;
				}

				$model->genres()->sync($genres);

				if ($debug)
					$this->info("Updating show: " . $model->name);

				try
				{

					$season_counter = 0;
					
					do
					{

						if ($debug)
							$this->info("Trying ID: " . ++$season_counter);

						try
						{
							
							$season = TMDB::getTvSeasonApi()->getSeason($model->id, $season_counter);
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

						$model_season->show_id = $model->id;
						$model_season->season_number = $season["season_number"];
						$model_season->air_date = $season["air_date"];
						$model_season->poster_url = $season["poster_path"];

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
							$model_episode->still_url = $episode["still_path"];
							$model_episode->vote_average = $episode["vote_average"];
							$model_episode->vote_count = $episode["vote_count"];

							$model_episode->save();							
						}			

					} while (true);
				}
				catch (Tmdb\Exception\TmdbApiException $e)
				{

					if ($debug)
						$this->info("ID not found: " . $e->getMessage());
				}
				catch (Exception $e)
				{

					if ($debug)
						$this->error("Error: " . $e->getMessage());
				}

				sleep(1);
			} catch (Exception $e) {

				if ($debug)
					$this->error("ID not found: " . $e->getMessage());
			}

			$change->delete();

			sleep(5);			
		}

		Setting::whereKey('last_update')
			->update(['value' => Carbon::now()]);
	}

	protected function getOptions()
	{

		return array(
			array('debug', 'd', InputOption::VALUE_NONE, 'Show debug', null),
		);
	}
}
