@extends('master')

@section('content')
	
	@include('partials.global-search')

	<div class="container">

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

		<br>
		<br>
		<br>

		<div class="row">
			<div class="col-md-12 text-center">
				
				Todos os dados são coletados do <a href="themoviedb.org">themoviedb.org</a>, que é um grante parceiro.
			</div>
		</div>

		<br>
		<br>
		<br>
	</div>
@stop
