<?php

class MyAccountController extends BaseController {

	public function getIndex()
	{

		$next_episodes = DB::select(DB::raw(
			"select season_episodes.* " .
				"from users " .
				"join show_user on show_user.user_id = users.id " .
				"join shows on shows.id = show_user.show_id " .
				"join show_seasons on show_seasons.show_id = shows.id " .
				"join season_episodes on season_episodes.show_season_id = show_seasons.id " .
				"where season_episodes.air_date > now() " .
					"and users.id = 1 " . 
					"order by season_episodes.air_date asc"
		));

		return View::make('my-account.index', [

			'next_movies' => User::with('movies')
				->findOrFail(Auth::user()->id)
				->movies()
				->next()
				->get()
				->take(5),
			
			'next_episodes' => $next_episodes
		]);
	}
}
