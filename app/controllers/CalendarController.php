<?php

class CalendarController extends BaseController {

	public function getIndex()
	{

		if ( ! Auth::check())
		{

			App::abort(404);
		}

		$next_episodes = DB::select(DB::raw(
			"select season_episodes.* " .
				"from users " .
				"join show_user on show_user.user_id = users.id " .
				"join shows on shows.id = show_user.show_id " .
				"join show_seasons on show_seasons.show_id = shows.id " .
				"join season_episodes on season_episodes.show_season_id = show_seasons.id " .
				"where season_episodes.air_date > now() " .
					"and users.id = " . Auth::user()->id . " " .
				"order by season_episodes.air_date asc " .
				"limit 5"
		));

		$next_movies = DB::select(DB::raw(
			"select movies.* " .
				"from users " .
				"join movie_user on movie_user.user_id = users.id " .
				"join movies on movies.id = movie_user.movie_id " .
				"where movies.release_date > now() " .
					"and users.id = " . Auth::user()->id . " " .
				"order by movies.release_date asc " .
				"limit 5"
		));

		return View::make('calendar.index', [

			'next_movies' => $next_movies,			
			'next_episodes' => $next_episodes
		]);
	}
}
