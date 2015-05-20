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

			<div class="col-md-6">
				
				@include('partials.stars', [

					'start-count' => 4,
				])
			</div>
		</div>

		<div class="row description">

			<div class="col-md-6">
				
				<p>{{ $movie->overview or 'Filme não possuí sinopse' }}</p>
			</div>

			<div class="col-md-6">
				
				<ul class="list-unstyled">
				<li><b>Dia de estreia:</b> {{ $movie->release_date or 'Não encontrado' }}</li>
					<li><b>Tempo de duração:</b> {{ $movie->runtime or '0'}} minutos</li>
					<li><b>Quantidade de votos:</b> {{ $movie->vote_count or '0' }}</li>
					<li><b>Média dos votos:</b> {{ $movie->vote_average or '0' }}</li>
				</ul>
			</div>
		</div>

		<div class="row">
			
			<div class="col-md-12 text-right">
				
				<a class="btn" href="">Acessar IMDB do filme</a>
				<a class="btn btn-success" href="">Marcar como assistido</a>
			</div>
		</div>
	</section>
@stop
