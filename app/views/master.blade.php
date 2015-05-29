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

		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/roboto.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/ripples.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/seriesseeker.css') }}" rel="stylesheet">
		<link href="{{ asset('css/snackbar.css') }}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
				
		<section id="header">

			<div class="navbar navbar-inverse">

				<div class="container">
					
					<div class="navbar-header">

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">

							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="{{ url('/') }}">SeriesSeeker</a>
					</div>

					<div class="navbar-collapse collapse navbar-inverse-collapse">

						<ul class="nav navbar-nav">

							@include('partials.navigation')
						</ul>
					</div>
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

		<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/jquery.autocomplete.min.js') }}"></script>
		<script src="{{ asset('js/ripples.min.js') }}"></script>
		<script src="{{ asset('js/material.min.js') }}"></script>
		<script src="{{ asset('js/snackbar.min.js') }}"></script>

		<script>
			$(document).ready(function() {

				var BASE_URL = '{{ url("/") }}';
				var IS_LOGGED_IN = {{ Auth::check() ? 'true' : 'false' }};

				$.material.init();

				$('#global-search input').autocomplete({

					serviceUrl: BASE_URL + '/search/autocomplete',
					groupBy: 'category',
					onSelect: function (suggestion) {

						window.location.href = BASE_URL + '/' + suggestion.data.route + '/show/' + suggestion.data.id;
					}
				});

				var seasonIsFullyWatched = function(season_id) {

					var episodes = $('#tree-list .is-episode[data-target-season="' + season_id + '"]');
					var episodesWatched = $('#tree-list .is-episode[data-target-season="' + season_id + '"]:checked');

					var totalOfEpisodes = episodes.length;
					var totalOfWatchedEpisodes = episodesWatched.length;

					return totalOfEpisodes == totalOfWatchedEpisodes;
				}

				var checkForFullSeason = function() {

					var season = $('#tree-list .is-season');

					$.each(season, function(k, v) {

						var season = $(v);

						if (seasonIsFullyWatched(season.data('target-season')))
						{

							$('#tree-list .is-season[data-target-season="' + season.data('target-season') + '"]')
								.prop('checked', 'checked');
						}
					});
				}

				checkForFullSeason();

				$('#tree-list .is-season').on('click', function() {

					if ( ! IS_LOGGED_IN)
					{

						$.snackbar({content: "É preciso entrar para controlar esse função"});
						$(this).prop('checked', false);

						return;
					}

					var checked = $(this).is(':checked');
					
					$('#tree-list .episodes[data-season="' + $(this).data('target-season') + '"] .is-episode')
						.prop('checked', checked);

					if (checked)
					{

						$.ajax({
							
							url: BASE_URL + '/seasons/mark-as-watched/' + $(this).data('target-season'),
						}).done(function() {

							$.snackbar({content: "Todos os episódios marcados como assistidos"});
						});
					}
					else
					{

						$.ajax({
							
							url: BASE_URL + '/seasons/mark-as-unwatched/' + $(this).data('target-season'),
						}).done(function() {

							$.snackbar({content: "Todos os episódios marcados como não assistidos"});
						});
					}
				});

				$('#tree-list .is-episode').on('click', function() {

					if ( ! IS_LOGGED_IN)
					{

						$.snackbar({content: "É preciso entrar para controlar esse função"});
						$(this).prop('checked', false);

						return;
					}

					var checked = $(this).is(':checked');

					if (checked)
					{

						$.ajax({
							
							url: BASE_URL + '/season-episodes/mark-as-watched/' + $(this).data('target-episode'),
						}).done(function() {

							$.snackbar({content: "Episódio marcado como assistido"});
						});
					}
					else
					{

						$.ajax({
							
							url: BASE_URL + '/season-episodes/mark-as-unwatched/' + $(this).data('target-episode'),
						}).done(function() {

							$.snackbar({content: "Episódio marcado como não assistido"});
						});
					}

					if (seasonIsFullyWatched($(this).data('target-season')))
					{

						$('#tree-list .is-season[data-target-season="' + $(this).data('target-season') + '"]')
							.prop('checked', 'checked');
					}
				});
			});
		</script>
	</body>
</html>
