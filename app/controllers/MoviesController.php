<?php

class MoviesController extends BaseController {

	public function getShow($id)
	{

		$movie = Movie::findOrFail($id);

		return View::make('movie.show')->with([
			'movie' => $movie
		]);
	}
}
