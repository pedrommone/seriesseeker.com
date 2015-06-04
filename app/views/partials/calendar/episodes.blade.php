@forelse($episodes as $episode)

	<div class="list-group">

		<a href="{{ url('season-episodes/show/' . $episode->id) }}" class="list-group-item">

			<div class="row-picture">

				@if ($episode->still_url)
		            <img class="circle"
		            	src="https://image.tmdb.org/t/p/original/{{ $episode->still_url }}"
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
