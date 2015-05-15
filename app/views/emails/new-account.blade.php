<html>
	<body>
		
		<p>

			Olá {{ $name }},<br>
			<br>
			Precisamos confirmar seu email, por favor, clique no link abaixo:<br>
			{{ url('/users/validate/' . $hash) }}
		</p>
	</body>
</html>
