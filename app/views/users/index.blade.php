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
									<input type="email" class="form-control" name="email" id="email" placeholder="Email">
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-lg-2 control-label">Senha</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" name="password" id="password" placeholder="Senha">
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

							<div class="form-group">
								<label for="name" class="col-lg-2 control-label">Nome</label>
								<div class="col-lg-10">
									<input type="name" class="form-control" name="name" id="name" placeholder="Nome">
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email">
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-lg-2 control-label">Senha</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" name="password" id="password" placeholder="Senha">
								</div>
							</div>

							<div class="form-group">
								<label for="timezone" class="col-lg-2 control-label">Fuso horário</label>
								<div class="col-lg-10">
									{{ Form::select('timezone', $timezones, null, ['class' => 'form-control']); }}
								</div>
							</div>

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
