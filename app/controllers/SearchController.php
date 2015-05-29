<?php

class SearchController extends BaseController {

	public function anyAutocomplete()
	{

		if ( ! Input::has('query'))

			App::abort(404);

		$query = Input::get('query');

		$results = DB::select(DB::raw(
			"(SELECT title as title, id as id, 'Filmes' as category, 'movies' as route " . 
				"FROM movies WHERE title LIKE '%$query%' LIMIT 5)" .
			"UNION ALL" .
			"(SELECT name as title, id as id, 'Séries' as category, 'shows' as route " . 
				"FROM shows WHERE name LIKE '%$query%' LIMIT 5)" .
			"UNION ALL" .
			"(SELECT name as title, id as id, 'Episódios' as category, 'season-eapisodes' as route " . 
				"FROM season_episodes WHERE name LIKE '%$query%' LIMIT 5)"
		));

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
