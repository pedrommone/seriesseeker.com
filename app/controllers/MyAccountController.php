<?php

class MyAccountController extends BaseController {

	public function getIndex()
	{

		if ( ! Auth::check())
		{

			App::abort(404);
		}

		return View::make('my-account.index', [

			'shows' => Auth::user()
				->shows()
				->orderBy('name', 'ASC')
				->get(),

			'movies' => Auth::user()
				->movies()
				->orderBy('title', 'ASC')
				->get()
		]);
	}
}
