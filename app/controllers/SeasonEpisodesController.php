<?php

class SeasonEpisodesController extends BaseController {

	public function getShow($id)
	{

		$episode = SeasonEpisode::with('season', 'season.show')
			->findOrFail($id);

		$show = Show::with('seasons', 'seasons.episodes')
			->findOrFail($episode->season->show->id);
		
		if (Auth::check())
		{

			$watched_episodes = Auth::user()
				->with('episodes', 'episodes.season', 'episodes.season.show')
				->episodes()
				->lists('id');
		}
		else
		{

			$watched_episodes = [];
		}

		return View::make('season-episodes.show')->with([
			'episode' => $episode,
			'show' => $show,
			'watched_episodes' => $watched_episodes
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

		$episode = SeasonEpisode::findOrFail($id);

		$episode->users()->attach(Auth::user(), [
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
			$bag->add('success', 'Marcado como assistido com sucesso!');

			return Redirect::back()
				->with('success', $bag);
		}
	}

	public function getMarkAsUnwatched($id)
	{

		if ( ! Auth::check())
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'É preciso estar logado para executar essa ação.');

			return Redirect::back()
				->withErrors($bag);
		}

		$episode = SeasonEpisode::findOrFail($id);

		$episode->users()->detach(Auth::user(), [
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
			$bag->add('success', 'Desmarcado como assistido com sucesso!');

			return Redirect::back()
				->with('success', $bag);
		}
	}
}
