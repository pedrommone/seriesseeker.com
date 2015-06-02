@extends('master')

@section('content')

	@include('partials.alerts-box')

	<section id="home" class="container">
		
		<div class="row text-center">

			<div class="col-md-4">
				
				<img src="{{ url('img/iconmonstr-checkbox-2-icon-256.png') }}" alt="">
				<h4>Acompanhe as suas séries e filmes com uma interface simples</h4>
			</div>

			<div class="col-md-4">
				
				<img src="{{ url('img/iconmonstr-video-5-icon-256.png') }}" alt="">
				<h4>Descubra um mundo de filmes e séries com a nossa busca</h4>
			</div>

			<div class="col-md-4">
				
				<img src="{{ url('img/iconmonstr-megaphone-7-icon-256.png') }}" alt="">
				<h4>Seja notificado e receba relatórios sobre seus gostos</h4>
			</div>
		</div>
	</section>
	
	@include('partials.global-search')
	
	@include('partials.show-statuses', [

		'next_movies' => $next_movies,
		'next_episod' => $next_movies
	])
	
	@include('partials.create-account-bar')
@stop
