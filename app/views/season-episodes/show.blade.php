@extends('master')

@section('content')

	@include('partials.full-cover', [

		'title' => $episode->season->show->name,
		'link' => '/shows/show/' . $episode->season->show->id,
		'url' => $episode->still_url ? $episode->still_url : $show->backdrop_url
	])

	@include('partials.alerts-box')

	<section class="container" id="season-episode">

		<div class="row">
			
			<div class="col-md-3">
				
				@include('partials.tree-list', [

					'show' => $show,
					'watched_episodes' => $watched_episodes
				])
			</div>
			
			<div class="col-md-9">
				
				<div class="row">

					<div class="col-md-7">
			
						<h3>S{{ $episode->season->season_number }}E{{ $episode->episode_number }} {{ $episode->name }}</h3>	
					</div>

					<div class="col-md-4 col-md-offset-1">
						
						@include('partials.stars', [

							'star_pc' => $episode->vote_average * 10,
						])
					</div>
				</div>

				<div class="row description">

					<div class="col-md-12">
						
						<p>{{ $episode->overview or 'Esse episódio não possuí sinopse' }}</p>
						
						<ul class="list-unstyled">
							<li><b>No ar dia:</b> {{ $episode->air_date or 'Não encontrado' }}</li>
							<li><b>Temporada número:</b> {{ $episode->season->season_number }}</li>
							<li><b>Episódio número:</b> {{ $episode->episode_number }}</li>
							<li><b>Quantidade de votos:</b> {{ $episode->vote_count or '0' }}</li>
							<li><b>Média dos votos:</b> {{ $episode->vote_average or '0' }}</li>
						</ul>
					</div>
				</div>

				<div class="row bottom-area">
					
					<div class="col-md-12 text-right">

						@if (in_array($episode->id, $watched_episodes))

							<a
								class="btn btn-warning"
								href="{{ url('season-episodes/mark-as-unwatched/' . $episode->id) }}">Desmarcar como assistido</a>
						@else

							<a
								class="btn btn-success"
								href="{{ url('season-episodes/mark-as-watched/' . $episode->id) }}">Marcar como assistido</a>
						@endif
					</div>
				</div>
			</div>
		</div>
		
	</section>

	@include('partials.global-search')
@stop
