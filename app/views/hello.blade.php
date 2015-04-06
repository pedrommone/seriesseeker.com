<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="seriesseeker.com">
		<link rel="icon" href="{{ asset('favicon.ico') }}">

		<title>Acompanhe suas series facilmente - SeriesSeeker</title>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{ asset('css/roboto.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/ripples.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/seriesseeker.css') }}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<section id="header">

			<div class="navbar navbar-inverse">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">

						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="javascript:void(0)">SeriesSeeker</a>
				</div>

				<div class="navbar-collapse collapse navbar-inverse-collapse">

					<ul class="nav navbar-nav">

						<li class="active"><a href="javascript:void(0)">Home</a></li>
						<li><a href="javascript:void(0)">Criar conta</a></li>
						<li><a href="javascript:void(0)">Entrar</a></li>
						<li><a href="javascript:void(0)">Status</a></li>
					</ul>
				</div>
			</div>
		</section>

		<section id="floating-covers">
			
			<ul>
				@foreach(range(1, 30) as $row)
					<li><img src="http://lorempixel.com/241/150/sports/{{ $row }}" alt="Placeholder"></li>
				@endforeach
			</ul>		
		</section>

		<section id="global-search" class="container">
			
			<form action="{{ url('/') }}" method="post" autocomplete="off">
				
				<input class="form-control" type="text" id="title" name="title" autocomplete="off" placeholder="Avengers 2015">
				<button class="btn btn-material-green" type="submit">Buscar</button>
			</form>
		</section>

		<section id="shows-statuses" class="container">
			
			<div class="row">

				<div class="col-md-6">
					
					<div class="well">

						<h4>Próximos filmes</h4>

						@foreach(range(1, 5) as $row)
							<div class="list-group">

								<div class="list-group-item">

									<div class="row-picture">
						            <img class="circle" src="http://lorempixel.com/56/56/people/{{ $row }}" alt="icon">
						         </div>

									<div class="row-content">
										<div class="least-content">15m</div>
										<h4 class="list-group-item-heading">Tile with a label</h4>
										<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
									</div>
								</div>

								<div class="list-group-separator"></div>
							</div>
						@endforeach
					</div>
				</div>

				<div class="col-md-6">
					
					<div class="well">

						<h4>Próximas series</h4>

						@foreach(range(1, 5) as $row)
							<div class="list-group">

								<div class="list-group-item">

									<div class="row-picture">
						            <img class="circle" src="http://lorempixel.com/56/56/sports/{{ $row }}" alt="icon">
						         </div>

									<div class="row-content">
										<div class="least-content">15m</div>
										<h4 class="list-group-item-heading">Tile with a label</h4>
										<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
									</div>
								</div>

								<div class="list-group-separator"></div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>

		<section id="create-account-bar" class="container">

			<form action="{{ url('/') }}" method="post" autocomplete="off">
				
				<input class="form-control" type="email" id="email" name="email" autocomplete="off" placeholder="meuemail@provedor.com">
				<input class="form-control" type="password" id="password" name="password" autocomplete="off" placeholder="M1nh4Senh4Segur4">
				<button class="btn btn-material-green" type="submit">Criar minha conta</button>
			</form>
		</section>

		<footer>
			
			<div class="container">
				
				<div class="row">
					
					<div class="col-md-6 footer-navigation-links">
						
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Contato</a></li>
							<li><a href="#">Status</a></li>
						</ul>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-13 text-right">
						
						Último atualização às {{ date('d/m/y h:s:i') }}
					</div>
				</div>
			</div>
		</footer>

		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

		<script src="{{ asset('js/ripples.min.js') }}"></script>
		<script src="{{ asset('js/material.min.js') }}"></script>

		<script>
			$(document).ready(function() {
				// This command is used to initialize some elements and make them work properly
				$.material.init();
			});
		</script>
	</body>
</html>
