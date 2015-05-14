<?php

class StatusController extends BaseController {

	public function getIndex()
	{

		return View::make('status.index')->with([

			'count_movies' => Movie::count(),
			'count_shows' => Show::count(),
			'count_seasons' => ShowSeason::count(),
			'count_episodes' => SeasonEpisode::count()
		]);
	}
}
