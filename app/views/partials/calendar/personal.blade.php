<section id="personal-calendar" class="container">
			
	<div class="row">

		<div class="col-md-6">
			
			<div class="well">

				<h4>Meus filmes</h4>

				@include('partials.calendar.movies', [

					'movies' => $movies
				])
			</div>
		</div>

		<div class="col-md-6">
			
			<div class="well">

				<h4>Minhas séries</h4>

				@include('partials.calendar.episodes', [

					'episodes' => $episodes
				])
			</div>
		</div>
	</div>
</section>
