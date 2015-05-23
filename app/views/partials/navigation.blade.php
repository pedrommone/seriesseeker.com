<li {{ Request::segment(1) == '' ? 'class="active"' : '' }}><a href="{{ url('/') }}">Home</a></li>

@if (Auth::check())
	
	<li{{ Request::segment(1) == 'my-account' ? ' class="active"' : ''}}>
		<a href="{{ url('/my-account') }}">Minha conta</a>
	</li>
	
	<li>
		<a href="{{ url('/users/logout') }}">Sair</a>
	</li>
@else

	<li{{ Request::segment(1) == 'users' ? ' class="active"' : '' }}>
		<a href="{{ url('/users') }}">Criar conta/Entrar</a>
	</li>
@endif

<li{{ Request::segment(1) == 'status' ? ' class="active"' : '' }}>
	<a href="{{ url('/status') }}">Status</a>
</li>
