<?php

class SearchController extends BaseController {

	public function anyAutocomplete()
	{

		if ( ! Input::has('query'))

			App::abort(404);

		$query = Input::get('query');

		$shows = Show::where('name', 'LIKE', '%' . $query . '%')
			->get()
			->take(5);

		foreach ($shows as $show)
		{
		
			$response[] = [
				'value' => $show->name,
				'data' => [
					'category' => 'Séries',
					'route' => 'shows',
					'id' => $show->id
				]
			];
		}

		$seasons = SeasonEpisode::where('name', 'LIKE', '%' . $query . '%')
			->get()
			->take(5);

		foreach ($seasons as $season)
		{
		
			$response[] = [
				'value' => $season->name,
				'data' => [
					'category' => 'Episódios',
					'route' => 'season-episodes',
					'id' => $season->id
				]
			];
		}

		$movies = Movie::where('title', 'LIKE', '%' . $query . '%')
			->get()
			->take(5);

		foreach ($movies as $movie)
		{
		
			$response[] = [
				'value' => $movie->title,
				'data' => [
					'category' => 'Filmes',
					'route' => 'movies',
					'id' => $movie->id
				]
			];
		}

		return Response::json([
			'suggestions' => $response
		]);
	}
}
