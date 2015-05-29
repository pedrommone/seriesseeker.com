@extends('master')

@section('content')
	
	@include('partials.alerts-box')

	<section id="search" class="container">
				
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				
				<h2>Resultados para: {{ $keyword }}</h2>
				
				<div class="well">

					@foreach($results as $row)
						
						<div class="list-group">

							<a href="{{ url("$row->route/show/$row->id") }}" class="list-group-item">

								<div class="row-picture">

									@if (isset($row->poster_url))
					            		<img class="circle"
					            			src="https://image.tmdb.org/t/p/w185/{{ $movie->poster_url }}"
					            			alt="{{ $row->title }}">
					            	@else
							        	<img class="circle"
							            	src="https://placehold.it/75"
							            	alt="{{ $row->title }}">
					            	@endif
								</div>

								<div class="row-content">
									<div class="least-content">{{ $row->category }}</div>
									<h4 class="list-group-item-heading">{{ $row->title }}</h4>
									<p class="list-group-item-text">{{ str_limit($row->overview, 270, '...') }}</p>
								</div>
							</a>

							<div class="list-group-separator"></div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@stop
