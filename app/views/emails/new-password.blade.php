@extends('emails.layout.master')

@section('content')

	@include('emails.layout.row-start')

		Essa é a sua nova senha: <b>{{ $new_password }}</b>
	@include('emails.layout.row-end')
@stop
