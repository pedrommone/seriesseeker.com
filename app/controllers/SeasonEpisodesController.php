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

		return View::make('season-episodes.show')->with([
			'episode' => $episode,
			'show' => $show,
			'watched_episodes' => $watched_episodes
		]);
	}

	public function getMarkAsWatched($id)
	{

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
