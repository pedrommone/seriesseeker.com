<li class="active"><a href="{{ url('/') }}">Home</a></li>

@if (Auth::check())
	
	<li><a href="{{ url('/my-account') }}">Minha conta</a></li>
	<li><a href="{{ url('/users/logout') }}">Sair</a></li>
@else

	<li><a href="{{ url('/users') }}">Criar conta/Entrar</a></li>
@endif

<li><a href="{{ url('/status') }}">Status</a></li>
