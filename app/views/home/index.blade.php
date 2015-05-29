@extends('master')

@section('content')

	@include('partials.alerts-box')
	
	@include('partials.global-search')
	
	@include('partials.show-statuses', [

		'next_movies' => $next_movies,
		'next_episod' => $next_movies
	])
	
	@include('partials.create-account-bar')
@stop
