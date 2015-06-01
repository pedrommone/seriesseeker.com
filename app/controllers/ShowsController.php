<?php

class ShowsController extends BaseController {

	public function getShow($id)
	{

		$show = Show::with('seasons', 'seasons.episodes')
			->findOrFail($id);

		if (Auth::check())
		{

			$watched_episodes = User::findOrFail(Auth::user()->id)
				->with('episodes', 'episodes.season', 'episodes.season.show')
				->first()
				->episodes()
				->lists('id');
		}
		else
		{

			$watched_episodes = [];
		}

		return View::make('shows.show')->with([
			'show' => $show,
			'watched_episodes' => $watched_episodes
		]);
	}
}
