<?php

use Illuminate\Console\Command;

class AlertWeeklyUpdate extends Command {

	protected $name = 'alert:weekly-update';
	protected $description = 'Alert all users about they incomming updates';

	public function fire()
	{

		$users = User::all();

		foreach ($users as $user)
		{
		
			$next_episodes = DB::select(DB::raw(
				"select season_episodes.* " .
					"from users " .
					"join show_user on show_user.user_id = users.id " .
					"join shows on shows.id = show_user.show_id " .
					"join show_seasons on show_seasons.show_id = shows.id " .
					"join season_episodes on season_episodes.show_season_id = show_seasons.id " .
					"where DATE(season_episodes.air_date) > NOW() " .
						"and DATE(DATE_ADD(season_episodes.air_date, INTERVAL 7 DAY))" .
						"and users.id = " . $user->id . " " .
					"order by season_episodes.air_date asc " .
					"limit 5"
			));

			$next_movies = DB::select(DB::raw(
				"select movies.* " .
					"from users " .
					"join movie_user on movie_user.user_id = users.id " .
					"join movies on movies.id = movie_user.movie_id " .
					"where DATE(movies.release_date) > NOW() " .
						"and users.id = " . $user->id . " " .
						"and DATE(DATE_ADD(movies.release_date, INTERVAL 7 DAY))" .
					"limit 5"
			));

			if ( count($next_movies) > 0 || count($next_episodes) > 0 )

				Mail::send('emails.weekly-report', [

					'next_episodes' => $next_episodes,
					'next_movies' => $next_movies,
					'user' => $user
				], function($message) use ($user)
				{

					$message
						->to($user->email, $user->name)
						->subject('Relatório semanal');
				});
		}
	}
}
