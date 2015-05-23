<?php

class SeasonsController extends BaseController {

	public function getMarkAsWatched($id)
	{

		$show = ShowSeason::with('episodes')
			->findOrFail($id);

		foreach ($show->episodes as $episode)
		{
	
			$episode->users()->attach(Auth::user(), [
				'added_on' => Carbon::now()
			]);
		}

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

		$show = ShowSeason::with('episodes')
			->findOrFail($id);


		foreach ($show->episodes as $episode)
		{
		
			$episode->users()->detach(Auth::user(), [
				'added_on' => Carbon::now()
			]);
		}

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
