@extends('emails.layout.master')

@section('content')

	@if (count($next_movies) > 0)

		@include('emails.layout.row-start')
			
			<h4>Filmes ({{ count($next_movies) }})</h4>

			<ul>
				@foreach($next_movies as $movie)
					
					<li>

						<a href="{{ url('/movies/show/' . $movie->id) }}" title="{{ $movie->title }}">

							{{ $movie->title or 'Sem nome' }}, dia {{ Carbon::parse($movie->release_date)->format('d/M - l') }}
						</a>
					</li>
				@endforeach
			</ul>
		@include('emails.layout.row-end')
	@endif

	@if (count($next_episodes) > 0)

		@include('emails.layout.row-start')
			
			<h4>Séries ({{ count($next_episodes) }})</h4>
			
			<ul>
				@foreach($next_episodes as $episode)
					
					<li>

						<a href="{{ url('/season-episodes/show/' . $episode->id) }}" title="{{ $episode->name }}">

							{{ $episode->name or 'Sem nome' }}, dia {{ Carbon::parse($episode->air_date)->format('d/M - l') }}
						</a>
					</li>
				@endforeach
			</ul>
		@include('emails.layout.row-end')
	@endif
@stop
