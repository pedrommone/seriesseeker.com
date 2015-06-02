<section id="full-cover">

	@if (is_null($url))
	
		<img src="http://placehold.it/2048" alt="{{ $title }}">
	@else

		<img src="https://image.tmdb.org/t/p/original/{{ $url }}" alt="{{ $title }}">
	@endif

	<div class="container">
		
		@if (isset($link))

			<a href="{{ url($link) }}"><h3>{{ $title }}</h3></a>
		@else

			<h3>{{ $title }}</h3>
		@endif
	</div>
</section>
