@extends('master')

@section('content')
	
	@include('partials.global-search')

	@include('partials.alerts-box')

	@include('partials.show-statuses', [

		'next_movies' => $next_movies,
		'next_episod' => $next_movies
	])
@stop
