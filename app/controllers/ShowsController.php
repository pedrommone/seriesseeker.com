<?php

class ShowsController extends BaseController {

	public function getShow($id)
	{

		$show = Show::with('seasons', 'seasons.episodes')
			->findOrFail($id);

		if (Auth::check())
		{

			$watched_episodes = Auth::user()
				->episodes()
				->lists('id');

			$user_follow = Auth::user()
				->with('shows')
				->whereHas('shows', function($query) use($show) {

					$query->whereId($show->id);
				})
				->count() > 0;
		}
		else
		{

			$watched_episodes = [];
			$user_follow = false;
		}

		return View::make('shows.show')->with([

			'show' => $show,
			'watched_episodes' => $watched_episodes,
			'user_follow' => $user_follow
		]);
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

		$show = Show::findOrFail($id);

		$show->users()->detach(Auth::user());
		$show->users()->attach(Auth::user(), [

			'added_on' => Carbon::now()
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
			$bag->add('success', 'Agora você está seguindo a série.');

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

		$show = Show::findOrFail($id);

		$show->users()->detach(Auth::user());

		if (Request::ajax())
		{
		
			return Response::json([

				'message' => 'success'
			], 200);
		}
		else
		{

			$bag = new \Illuminate\Support\MessageBag;	
			$bag->add('success', 'Agora você não está seguindo a série.');

			return Redirect::back()
				->with('success', $bag);
		}
	}
}
