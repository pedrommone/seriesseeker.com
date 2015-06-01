<?php

class StatusController extends BaseController {

	public function getIndex()
	{

		$genres_by_movies = DB::select(DB::raw(
			"SELECT genres.description, COUNT(*) as contador " .
				"FROM genres " .
				"JOIN genre_movie ON genres.id = genre_movie.genre_id " .
				"GROUP BY genres.id " .
				"ORDER BY contador DESC " . 
				"LIMIT 20"
		));

		$genres_by_shows = DB::select(DB::raw(
			"SELECT genres.description, COUNT(*) as contador " .
				"FROM genres " .
				"JOIN genre_show ON genres.id = genre_show.genre_id " .
				"GROUP BY genres.id " .
				"ORDER BY contador DESC " . 
				"LIMIT 20"
		));

		return View::make('status.index')->with([

			'count_movies' => number_format(Movie::count()),
			'count_shows' => number_format(Show::count()),
			'count_seasons' => number_format(ShowSeason::count()),
			'count_episodes' => number_format(SeasonEpisode::count()),
			'genres_by_movies' => $genres_by_movies,
			'genres_by_shows' => $genres_by_shows
		]);
	}
}
