@extends('emails.layout.master')

@section('content')

	@if (count($user->episodes) > 0)

		@include('emails.layout.row-start')
			
			<h4>Séries que vão ao ar hoje ({{ count($user->episodes) }})</h4>
			
			<ul>
				@foreach($user->episodes as $episode)
					
					<li>

						<a href="{{ url('/season-episodes/show/' . $episode->id) }}" title="{{ $episode->name }}">

							{{ $episode->name or 'Sem nome' }}
						</a>
					</li>
				@endforeach
			</ul>
		@include('emails.layout.row-end')
	@endif
@stop
