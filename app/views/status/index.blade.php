@extends('master')

@section('content')
	
	@include('partials.global-search')

	@include('partials.alerts-box')

	<section class="container" id="statuses">

		<div class="row">

			<div class="col-md-12">

				<div class="row text-center">

					<div class="col-md-2 col-md-offset-1 well">
						
						<h2>{{ $count_movies }}</h2>
						<small>Filmes</small>
					</div>

					<div class="col-md-2 col-md-offset-1 well">
						
						<h2>{{ $count_shows }}</h2>
						<small>Séries</small>
					</div>

					<div class="col-md-2 col-md-offset-1 well">
						
						<h2>{{ $count_seasons }}</h2>
						<small>Temporadas</small>
					</div>

					<div class="col-md-2 col-md-offset-1 well">
						
						<h2>{{ $count_episodes }}</h2>
						<small>Episódios</small>
					</div>
				</div>
			</div>
		</div>

		<div class="row graphics">
			
			<div class="col-md-5 col-md-offset-1 well">

				<h4>Gêneros por filmes</h4><br>

				<ol class="list-styled">
					@foreach($genres_by_movies as $genre)
					
						<li><b>{{ $genre->description }},</b> presente em <b>{{ $genre->contador }}</b> filmes</li>
					@endforeach
				</ol>
			</div>

			<div class="col-md-5 col-md-offset-1 well">
				
				<h4>Gêneros por séries</h4><br>

				<ol class="list-styled">
					@foreach($genres_by_shows as $genre)
					
						<li><b>{{ $genre->description }},</b> presente em <b>{{ $genre->contador }}</b> séries</li>
					@endforeach
				</ol>
			</div>
		</div>

		<div class="row credits">
			<div class="col-md-12 text-center">
				
				Todos os dados são coletados do <a href="http://themoviedb.org">themoviedb.org</a>, que é um grande parceiro.
			</div>
		</div>
	</section>
@stop
