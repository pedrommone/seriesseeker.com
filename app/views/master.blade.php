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

						@include('partials.navigation')
					</ul>
				</div>
			</div>
		</section>

		@yield('content')

		<footer>
			
			<div class="container">
				
				<div class="row">
					
					<div class="col-md-6 footer-navigation-links">
						
						<ul>
							
							@include('partials.navigation')
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
