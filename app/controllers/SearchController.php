<?php

class SearchController extends BaseController {

	public function getIndex()
	{

		if ( ! Input::has('keyword'))
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'Você precisa buscar algo, assim que a busca funciona.');

			return Redirect::back()
				->withErrors($bag);
		}

		$keyword = Input::get('keyword');

		$results = DB::select(DB::raw(
			"(SELECT title as title, id, 'Filmes' as category, 'movies' as route, overview " . 
				"FROM movies WHERE title LIKE '%$keyword%')" .
			"UNION ALL" .
			"(SELECT name as title, id, 'Séries' as category, 'shows' as route, overview " . 
				"FROM shows WHERE name LIKE '%$keyword%')" .
			"UNION ALL" .
			"(SELECT name as title, id, 'Episódios' as category, 'season-episodes' as route, overview " . 
				"FROM season_episodes WHERE name LIKE '%$keyword%')"
		));

		return View::make('search.view', [

			'results' => $results,
			'keyword' => $keyword
		]);
	}

	public function anyAutocomplete()
	{

		if ( ! Input::has('query'))
		{

			App::abort(404);
		}

		$query = Input::get('query');
		
		$results = DB::select(DB::raw(
			"(SELECT title as title, id as id, 'Filmes' as category, 'movies' as route " . 
				"FROM movies WHERE title LIKE '%$query%' LIMIT 5)" .
			"UNION ALL" .
			"(SELECT name as title, id as id, 'Séries' as category, 'shows' as route " . 
				"FROM shows WHERE name LIKE '%$query%' LIMIT 5)" .
			"UNION ALL" .
			"(SELECT name as title, id as id, 'Episódios' as category, 'season-episodes' as route " . 
				"FROM season_episodes WHERE name LIKE '%$query%' LIMIT 5)"
		));

		$response = [];

		foreach ($results as $result)
		{
		
			$response[] = [
				'value' => $result->title,
				'data' => [
					'category' => $result->category,
					'route' => $result->route,
					'id' => $result->id
				]
			];
		}

		return Response::json([
			'suggestions' => $response
		]);

	}
}
