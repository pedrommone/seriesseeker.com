@extends('master')

@section('content')
	
	@include('partials.alerts-box')

	@include('partials.global-search')

	<section id="my-account" class="container">


		<div class="row containers">

			<div class="col-md-6">
				
				<div class="well">

					<h4>Trocar minha senha</h4>

					<form class="form-horizontal" method="POST" action="{{ url('/users/path-password') }}">

						<fieldset>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

								<label for="password" class="col-lg-3 control-label">Nova senha</label>

								<div class="col-lg-9">
									<input
										type="password"
										class="form-control"
										name="password"
										id="password"
										placeholder="Senha"
										autocomplete="off">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-12 text-right">
									<button type="submit" class="btn btn-primary">Salvar nova senha</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>

			<div class="col-md-6">
				
				<div class="well">

					<h4>Meus dados pessoais</h4>

					<ul class="list-unstyled">
						<li><b>Nome:</b> {{ Auth::user()->name }}</li>
						<li><b>Email:</b> {{ Auth::user()->email }}</li> 
					</ul>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		
		<div class="row">
			
			<div class="col-md-12">
				
				<h2>Minha lista de filmes/séries</h2>
			</div>
		</div>
	</div>

	@include('partials.calendar.personal-list', [

		'shows' => $shows,
		'movies' => $movies
	])
</section>

@stop
