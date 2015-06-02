<?php

class MyAccountController extends BaseController {

	public function getIndex()
	{

		die(var_dump(

			User::with('shows')
				->findOrFail(Auth::user()->id)
				->shows()
				->get()
				->take(5)

		));

		return View::make('my-account.index', [

			'next_movies' => User::with('movies')
				->findOrFail(Auth::user()->id)
				->movies()
				->next()
				->get()
				->take(5),
			
			'next_episodes' => User::with('shows', 'shows.episodes')
				->findOrFail(Auth::user()->id)
				->shows()
				->episodes()
				->get()
				->take(5)
		]);
	}
}
