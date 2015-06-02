<section id="shows-statuses" class="container">
			
	<div class="row">

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos filmes</h4>

				@forelse($next_movies as $movie)
					
					<div class="list-group">

						<a href="{{ url('movies/show/' . $movie->id) }}" class="list-group-item">

							<div class="row-picture">

								@if ($movie->poster_url)
				            		<img class="circle"
				            			src="https://image.tmdb.org/t/p/w185/{{ $movie->poster_url }}"
				            			alt="{{ $movie->title }}">
				            	@else
						        	<img class="circle"
						            	src="https://placehold.it/75"
						            	alt="{{ $movie->name }}">
				            	@endif
							</div>

							<div class="row-content">
								<div class="least-content">{{ $movie->release_date_readable or $movie->release_date }}</div>
								<h4 class="list-group-item-heading">{{ $movie->title }}</h4>
								<p class="list-group-item-text">{{ str_limit($movie->overview, 150, '...') }}</p>
							</div>
						</a>

						<div class="list-group-separator"></div>
					</div>
				@empty

					Não existem filmes para mostrar
				@endforelse
			</div>
		</div>

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos episódios</h4>

				@forelse($next_episodes as $episode)

					<div class="list-group">

						<a href="{{ url('season-episodes/show/' . $episode->id) }}" class="list-group-item">

							<div class="row-picture">

								@if ($episode->still_url)
						            <img class="circle"
						            	src="https://image.tmdb.org/t/p/w185/{{ $episode->still_url }}"
						            	alt="{{ $episode->name }}">
						        @else
						        	<img class="circle"
						            	src="https://placehold.it/75"
						            	alt="{{ $episode->name }}">
								@endif
							</div>

							<div class="row-content">
								<div class="least-content">{{ $episode->air_date_readable or $episode->air_date }}</div>
								<h4 class="list-group-item-heading">{{ $episode->name }}</h4>
								<p class="list-group-item-text">{{ str_limit($episode->overview, 150, '...') }}</p>
							</div>
						</a>

						<div class="list-group-separator"></div>
					</div>
				@empty

					Não existem episódios para exibir
				@endforelse
			</div>
		</div>
	</div>
</section>
