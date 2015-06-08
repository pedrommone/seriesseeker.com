@extends('emails.layout.master')

@section('content')

	@include('emails.layout.row-start')

		Precisamos confirmar seu email, por favor, clique no link abaixo:
		<br>
		{{ url('/users/validate/' . $hash) }}
	@include('emails.layout.row-end')
@stop
