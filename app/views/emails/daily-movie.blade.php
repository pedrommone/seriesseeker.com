@extends('emails.layout.master')

@section('content')

	@if (count($user->movies) > 0)

		@include('emails.layout.row-start')
			
			<h4>Filmes que estreiam hoje ({{ count($user->movies) }})</h4>
			
			<ul>
				@foreach($user->movies as $movie)
					
					<li>

						<a href="{{ url('/movies/show/' . $movie->id) }}" title="{{ $movie->title }}">

							{{ $movie->title or 'Sem nome' }}
						</a>
					</li>
				@endforeach
			</ul>
		@include('emails.layout.row-end')
	@endif
@stop
