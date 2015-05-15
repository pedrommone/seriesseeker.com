<section id="alerts-box">
	@if (isset($errors))
		@if ($errors->has())
			<div class="alert alert-dismissable alert-danger">
				<button type="button" class="close" data-dismiss="alert">×</button>
				
				@foreach ($errors->all() as $error)
					{{ $error }}<br>
				@endforeach
			</div>
		@endif
	@endif

	@if (Session::has('success'))
		<div class="alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			
			@foreach (Session::get('success')->all() as $bag)
					{{ $bag }}<br>
				@endforeach
		</div>
	@endif
</section>