@forelse($movies as $movie)
	
	<div class="list-group">

		<a href="{{ url('movies/show/' . $movie->id) }}" class="list-group-item">

			<div class="row-picture">

				@if ($movie->poster_url)

            		<img class="circle"
            			src="https://image.tmdb.org/t/p/original/{{ $movie->poster_url }}"
            			alt="{{ $movie->title }}">
            	@else
            	
		        	<img class="circle"
		            	src="https://placehold.it/75"
		            	alt="{{ $movie->name }}">
            	@endif
			</div>

			<div class="row-content">

				<div class="least-content">{{ $movie->release_date_readable or $movie->release_date }}</div>
				<h4 class="list-group-item-heading">{{ str_limit($movie->title, 25, '...') }}</h4>
				<p class="list-group-item-text">{{ str_limit($movie->overview, 150, '...') }}</p>
			</div>
		</a>

		<div class="list-group-separator"></div>
	</div>
@empty

	Não existem filmes para mostrar
@endforelse
