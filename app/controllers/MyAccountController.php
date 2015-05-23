<?php

class MyAccountController extends BaseController {

	public function getIndex()
	{

		return View::make('my-account.index', [

			'next_movies' => User::with('movies')
				->findOrFail(Auth::user()->id)
				->movies()
				->next()
				->get()
				->take(5),			
			
			'next_episodes' => []
		]);
	}
}
