<?php

class HomeController extends BaseController {

	public function getIndex()
	{

		return View::make('home.index')->with([

			'next_movies' 	=> Movie::next()->get()->take(5),			
			'next_episodes' => SeasonEpisode::next()->get()->take(5)
		]);
	}
}
