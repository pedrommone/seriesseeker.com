<section id="global-search" class="container">
			
	<form action="{{ url('/search') }}" method="get" autocomplete="off">
		
		<input class="form-control" type="text" id="keyword" name="keyword" autocomplete="off" placeholder="Avengers 2015">
		<button class="btn btn-material-green" type="submit">Buscar</button>
	</form>
</section>
