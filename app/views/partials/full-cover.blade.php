<section id="full-cover">

	<img src="{{ $url }}" alt="{{ $title }}">

	<div class="container">
		
		@if (isset($link))

			<a href="{{ url($link) }}"><h3>{{ $title }}</h3></a>
		@else

			<h3>{{ $title }}</h3>
		@endif
	</div>
</section>
