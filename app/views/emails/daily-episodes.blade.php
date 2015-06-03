<html>
	<body>
		
		<p>

			Olá {{ $user->name }}! :) <br>
		</p>

		@if (count($user->episodes) > 0)

			<h4>Séries que vão ao ar hoje ({{ count($user->episodes) }})</h4>

			<ul>
				@foreach($user->episodes as $episode)
					
					<li>

						<a href="{{ url('/season-episodes/show/' . $episode->id) }}" title="{{ $episode->name }}">

							{{ $episode->name or 'Sem nome' }}
						</a>
					</li>
				@endforeach
			</ul>
		@endif

		<p>Caso não queira mais receber essa notificação, atualize o seu painel.</p>
	</body>
</html>
