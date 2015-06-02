@extends('master')

@section('content')

	@include('partials.full-cover', [

		'title' => $show->name,
		'url' => $show->backdrop_url
	])

	@include('partials.alerts-box')

	<section class="container" id="show">

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
			
						<h3>{{ $show->name }}</h3>	
					</div>

					<div class="col-md-4 col-md-offset-1">
						
						@include('partials.stars', [

							'star_pc' => $show->vote_average * 10,
						])
					</div>
				</div>

				<div class="row description">

					<div class="col-md-12">
						
						<p>{{ $show->overview or 'Esse episódio não possuí sinopse' }}</p>
						
						<ul class="list-unstyled">
							<li><b>No ar desde o dia:</b> {{ $show->first_air_date_readable or 'Não encontrado' }}</li>
							<li><b>Quantidade de votos:</b> {{ $show->vote_count or '0' }}</li>
							<li><b>Média dos votos:</b> {{ $show->vote_average or '0' }}</li>
						</ul>
					</div>
				</div>

				<div class="row bottom-area">
					
					<div class="col-md-12 text-right">

						@if ($user_follow)

							<a
								class="btn btn-warning"
								href="{{ url('shows/unfollow/' . $show->id) }}">Deixar de seguir</a>
						@else

							<a
								class="btn btn-success"
								href="{{ url('shows/follow/' . $show->id) }}">Seguir série</a>
						@endif
					</div>
				</div>
			</div>
		</div>
		
	</section>
@stop
