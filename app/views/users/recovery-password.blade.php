@extends('master')

@section('content')
	
	@include('partials.alerts-box')
	
	<section id="recovery-password" class="container">
				
		<div class="row">

			<div class="col-md-6 col-md-offset-3">
				
				<div class="well">

					<h4>Esqueci minha senha</h4>

					<p>Você irá receber uma nova senha no seu email.</p>

					<form class="form-horizontal" method="POST" action="{{ url('/users/recovery-password') }}">

						<fieldset>

							<div class="form-group">
								<label for="email" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-12 text-right">
									<button type="submit" class="btn btn-primary">Enviar nova senha</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>
@stop
