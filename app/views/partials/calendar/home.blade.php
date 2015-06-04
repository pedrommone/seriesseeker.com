<section id="home-calendar" class="container">
			
	<div class="row">

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos filmes</h4>

				@include('partials.calendar.movies', [

					'next_movies' => $next_movies
				])
			</div>
		</div>

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos episódios</h4>

				@include('partials.calendar.episodes', [

					'next_episodes' => $next_episodes
				])
			</div>
		</div>
	</div>
</section>
