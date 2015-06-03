<html>
	<body>
		
		<p>

			Olá {{ $user->name }}! :) <br>
		</p>

		@if (count($user->movies) > 0)

			<h4>Filmes que estreiam hoje ({{ count($user->movies) }})</h4>

			<ul>
				@foreach($user->movies as $movie)
					
					<li>

						<a href="{{ url('/movies/show/' . $movie->id) }}" title="{{ $movie->title }}">

							{{ $movie->title or 'Sem nome' }}
						</a>
					</li>
				@endforeach
			</ul>
		@endif

		<p>Caso não queira mais receber essa notificação, atualize o seu painel.</p>
	</body>
</html>
