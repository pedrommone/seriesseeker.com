@extends('master')

@section('content')
	
	@include('partials.global-search')

	@include('partials.show-statuses', [

		'next_movies' => $next_movies,
		'next_episod' => $next_movies
	])
@stop
