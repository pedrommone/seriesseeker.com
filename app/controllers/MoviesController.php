<?php

class MoviesController extends BaseController {

	public function getShow($id)
	{

		$movie = Movie::findOrFail($id);

		if (Auth::check())
		{

			$has_relationship = Auth::user()
				->movies()
				->lists('type', 'id');
		}
		else
		{

			$has_relationship = [];
		}

		return View::make('movies.show')->with([

			'movie' => $movie,
			'has_relationship' => $has_relationship
		]);
	}

	public function getMarkAsWatched($id)
	{

		if ( ! Auth::check())
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'É preciso estar logado para executar essa ação.');

			return Redirect::back()
				->withErrors($bag);
		}

		$movie = Movie::findOrFail($id);

		$movie->users()->attach(Auth::user(), [
			'added_on' => Carbon::now(),
			'type' => 'W'
		]);

		if (Request::ajax())
		{
		
			return Response::json([

				'message' => 'success'
			], 200);
		}
		else
		{
			$bag = new \Illuminate\Support\MessageBag;	
			$bag->add('success', 'Marcado como assistido com sucesso!');

			return Redirect::back()
				->with('success', $bag);
		}
	}

	public function getFollow($id)
	{

		if ( ! Auth::check())
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'É preciso estar logado para executar essa ação.');

			return Redirect::back()
				->withErrors($bag);
		}

		$movie = Movie::findOrFail($id);

		$movie->users()->attach(Auth::user(), [

			'added_on' => Carbon::now(),
			'type' => 'F'
		]);

		if (Request::ajax())
		{
		
			return Response::json([
				'message' => 'success'
			], 200);
		}
		else
		{
			$bag = new \Illuminate\Support\MessageBag;	
			$bag->add('success', 'Filme está sendo seguido agora!');

			return Redirect::back()
				->with('success', $bag);
		}
	}

	public function getUnfollow($id)
	{

		if ( ! Auth::check())
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'É preciso estar logado para executar essa ação.');

			return Redirect::back()
				->withErrors($bag);
		}

		$movie = Movie::findOrFail($id);

		$movie->users()->detach(Auth::user(), [
			
			'type' => 'F'
		]);

		if (Request::ajax())
		{
		
			return Response::json([
				'message' => 'success'
			], 200);
		}
		else
		{
			$bag = new \Illuminate\Support\MessageBag;	
			$bag->add('success', 'Filme está sendo seguido agora!');

			return Redirect::back()
				->with('success', $bag);
		}
	}
}
