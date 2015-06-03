@extends('master')

@section('content')
	
	@include('partials.global-search')

	@include('partials.alerts-box')
	
	<section id="shows-statuses" class="container">
				
		<div class="row">

			<div class="col-md-6">
				
				<div class="well">

					<form class="form-horizontal" method="POST" action="{{ url('/users/auth') }}">
						<fieldset>
							<legend>Entrar</legend>

							<div class="form-group">
								<label for="email" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-lg-2 control-label">Senha</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" name="password" id="password" placeholder="Senha" autocomplete="off">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="submit" class="btn btn-primary">Entrar</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>

			<div class="col-md-6">
				
				<div class="well">

					<form class="form-horizontal" method="POST" action="{{ url('/users/store') }}">
						<fieldset>
							<legend>Criar conta</legend>

							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name" class="col-lg-2 control-label">Nome</label>
								<div class="col-lg-10">
									<input
										type="name"
										class="form-control"
										name="name"
										id="name"
										placeholder="Nome"
										value="{{ Input::old('name') }}"
										autocomplete="off">
								</div>
							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input
										type="email"
										class="form-control"
										name="email"
										id="email"
										placeholder="Email"
										value="{{ Input::old('email') }}"
										autocomplete="off">
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-lg-2 control-label">Senha</label>
								<div class="col-lg-10">
									<input
										type="password"
										class="form-control"
										name="password"
										id="password"
										placeholder="Senha"
										autocomplete="off">
								</div>
							</div>

							<input type="hidden" id="timezone" name="timezone" value="America/Buenos_Aires">

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="submit" class="btn btn-primary">Criar conta</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>
@stop
