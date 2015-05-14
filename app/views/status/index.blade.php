@extends('master')

@section('content')

	@include('partials.floating-covers')
	
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

				<br>
				<br>
				<br>
			</div>
		</div>
	</div>
@stop
