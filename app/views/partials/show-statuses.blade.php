<section id="shows-statuses" class="container">
			
	<div class="row">

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos filmes</h4>

				@foreach($next_movies as $movie)
					<div class="list-group">

						<div class="list-group-item">

							<div class="row-picture">

								@if ($movie->poster_url)
				            		<img class="circle"
				            			src="https://image.tmdb.org/t/p/w185/{{ $movie->poster_url }}"
				            			alt="{{ $movie->title }}">
				            	@else
						        	<img class="circle"
						            	src="https://placeholde.it/75"
						            	alt="{{ $episode->name }}">
				            	@endif
							</div>

							<div class="row-content">
								<div class="least-content">{{ $movie->release_date_readable }}</div>
								<h4 class="list-group-item-heading">{{ $movie->title }}</h4>
								<p class="list-group-item-text">{{ str_limit($movie->overview, 150, '...') }}</p>
							</div>
						</div>

						<div class="list-group-separator"></div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos episódios</h4>

				@foreach($next_episodes as $episode)
					<div class="list-group">

						<div class="list-group-item">

							<div class="row-picture">

								@if ($episode->still_url)
						            <img class="circle"
						            	src="https://image.tmdb.org/t/p/w185/{{ $episode->still_url }}"
						            	alt="{{ $episode->name }}">
						        @else
						        	<img class="circle"
						            	src="https://placeholde.it/75"
						            	alt="{{ $episode->name }}">
								@endif
							</div>

							<div class="row-content">
								<div class="least-content">{{ $episode->air_date_readable }}</div>
								<h4 class="list-group-item-heading">{{ $episode->name }}</h4>
								<p class="list-group-item-text">{{ str_limit($episode->overview, 150, '...') }}</p>
							</div>
						</div>

						<div class="list-group-separator"></div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
