@forelse($shows as $show)

	<div class="list-group">

		<a href="{{ url('shows/show/' . $show->id) }}" class="list-group-item">

			<div class="row-picture">

				@if ($show->backdrop_url)
		            <img class="circle"
		            	src="https://image.tmdb.org/t/p/original/{{ $show->backdrop_url }}"
		            	alt="{{ $show->name }}">
		        @else
		        	<img class="circle"
		            	src="https://placehold.it/75"
		            	alt="{{ $show->name }}">
				@endif
			</div>

			<div class="row-content">
				<div class="least-content">{{ $show->first_air_date_readable or $show->fist_air_date }}</div>
				<h4 class="list-group-item-heading">{{ $show->name }}</h4>
				<p class="list-group-item-text">{{ str_limit($show->overview, 150, '...') }}</p>
			</div>
		</a>

		<div class="list-group-separator"></div>
	</div>
@empty

	Não existem episódios para exibir
@endforelse
