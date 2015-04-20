<section id="shows-statuses" class="container">
			
	<div class="row">

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximos filmes</h4>

				@foreach(range(1, 5) as $row)
					<div class="list-group">

						<div class="list-group-item">

							<div class="row-picture">
				            <img class="circle" src="http://lorempixel.com/56/56/people/{{ $row }}" alt="icon">
				         </div>

							<div class="row-content">
								<div class="least-content">15m</div>
								<h4 class="list-group-item-heading">Tile with a label</h4>
								<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
							</div>
						</div>

						<div class="list-group-separator"></div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="col-md-6">
			
			<div class="well">

				<h4>Próximas series</h4>

				@foreach(range(1, 5) as $row)
					<div class="list-group">

						<div class="list-group-item">

							<div class="row-picture">
				            <img class="circle" src="http://lorempixel.com/56/56/sports/{{ $row }}" alt="icon">
				         </div>

							<div class="row-content">
								<div class="least-content">15m</div>
								<h4 class="list-group-item-heading">Tile with a label</h4>
								<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
							</div>
						</div>

						<div class="list-group-separator"></div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>