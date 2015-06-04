<li {{ Request::segment(1) == '' ? 'class="active"' : '' }}><a href="{{ url('/') }}">Home</a></li>

@if (Auth::check())
	
	<li{{ Request::segment(1) == 'calendar' ? ' class="active"' : ''}}>
		<a href="{{ url('/calendar') }}">Calendário</a>
	</li>

	<li{{ Request::segment(1) == 'my-account' ? ' class="active"' : ''}}>
		<a href="{{ url('/my-account') }}">Minha conta</a>
	</li>
@else

	<li{{ Request::segment(1) == 'users' ? ' class="active"' : '' }}>
		<a href="{{ url('/users') }}">Criar conta</a>
	</li>

	<li{{ Request::segment(1) == 'users' ? ' class="active"' : '' }}>
		<a href="{{ url('/users') }}">Entrar</a>
	</li>
@endif

<li{{ Request::segment(1) == 'status' ? ' class="active"' : '' }}>
	<a href="{{ url('/status') }}">Status</a>
</li>

@if (Auth::check())
	
	<li>
		<a href="{{ url('/users/logout') }}">Sair</a>
	</li>
@endif
