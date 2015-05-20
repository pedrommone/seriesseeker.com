@extends('master')

@section('content')

	@include('partials.full-cover', [

		'title' => $movie->title,
		'url' => ''
	])

	<section class="container" id="movie">
		
		<div class="row">

			<div class="col-md-6">
				
				<h3>{{ $movie->title }}</h3>	
			</div>

			<div class="col-md-5 col-md-offset-1">
				
				@include('partials.stars', [

					'star_pc' => $movie->vote_average * 10,
				])
			</div>
		</div>

		<div class="row description">

			<div class="col-md-6">
				
				<p>{{ $movie->overview or 'Filme não possuí sinopse' }}</p>
			</div>

			<div class="col-md-5 col-md-offset-1">
				
				<ul class="list-unstyled">
				<li><b>Dia de estreia:</b> {{ $movie->release_date or 'Não encontrado' }}</li>
					<li><b>Tempo de duração:</b> {{ $movie->runtime or '0'}} minutos</li>
					<li><b>Quantidade de votos:</b> {{ $movie->vote_count or '0' }}</li>
					<li><b>Média dos votos:</b> {{ $movie->vote_average or '0' }}</li>
				</ul>
			</div>
		</div>

		<div class="row bottom-area">
			
			<div class="col-md-12 text-right">
				
				@if ($movie->imdb_id)
					<a class="btn" href="http://www.imdb.com/title/{{ $movie->imdb_id }}" target="_blank">Acessar IMDB do filme</a>
				@endif
				
				<a class="btn btn-success" href="">Marcar como assistido</a>
			</div>
		</div>
	</section>
@stop
