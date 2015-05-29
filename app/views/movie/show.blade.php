@extends('master')

@section('content')

	@include('partials.full-cover', [

		'title' => $movie->title,
		'url' => ''
	])

	@include('partials.alerts-box')

	<section class="container" id="movie">
		
		<div class="row">

			<div class="col-md-6">
				
				<h3>{{ $movie->title }}</h3>	
			</div>

			<div class="col-md-5 col-md-offset-1">
				
				@if ($movie->already_released)

					@include('partials.stars', [

						'star_pc' => $movie->vote_average * 10,
					])
				@endif
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

					@if ($movie->already_released)
					
						<li><b>Quantidade de votos:</b> {{ $movie->vote_count or '0' }}</li>
						<li><b>Média dos votos:</b> {{ $movie->vote_average or '0' }}</li>
					@endif
				</ul>
			</div>
		</div>
		
		<div class="row bottom-area">
			
			<div class="col-md-12 text-right">
				
				@if ($movie->imdb_id)

					<a class="btn" href="http://www.imdb.com/title/{{ $movie->imdb_id }}/" target="_blank">Ver no IMDB</a>
				@endif

				@if ($movie->already_released)

					@if (in_array($movie->id, array_keys($has_relationship)))

						@if ($has_relationship[$movie->id] == "W")

							<a
								class="btn btn-warning"
								href="{{ url('movies/follow/' . $movie->id) }}">Somente seguir</a>
						@else

							<a
								class="btn btn-success"
								href="{{ url('movies/mark-as-watched/' . $movie->id) }}">Marcar como assistido</a>

							@if ($has_relationship[$movie->id] != "F")
								
								<a 
									class="btn btn-primary"
									href="{{ url('movies/follow/' . $movie->id) }}">Me avise quando estreiar</a>
							@endif
						@endif
					@else

						<a
							class="btn btn-success"
							href="{{ url('movies/mark-as-watched/' . $movie->id) }}">Marcar como assistido</a>

						<a
							class="btn btn-warning"
							href="{{ url('movies/follow/' . $movie->id) }}">Seguir</a>
					@endif
				@else

					<a
						class="btn btn-warning"
						href="{{ url('movies/follow/' . $movie->id) }}">Me avise quando estreiar</a>
				@endif
			</div>
		</div>
	</section>
@stop
