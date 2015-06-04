@extends('master')

@section('content')
	
	@include('partials.alerts-box')

	@include('partials.global-search')

	@include('partials.calendar.personal', [

		'movies' => $next_movies,
		'episodes' => $next_episodes
	])
@stop
