<div id="tree-list">

	<ul class="list-unstyled">

		@foreach($show->seasons as $season)

			<li>

				<div class="togglebutton">

                    <label>

                        <input
							class="is-season"
                        	type="checkbox"
                        	data-target-season="{{ $season->id }}"> Temporada {{ $season->season_number }}
                    </label>
                </div>

				<ul class="list-unstyled episodes" data-season="{{ $season->id }}">
					
					@foreach($season->episodes as $episode)
						
						<li>

							<div class="checkbox">

			                    <label>
			                    	<input
										class="is-episode"
			                    		type="checkbox"
				                    	data-target-season="{{ $season->id }}"
				                    	data-target-episode="{{ $episode->id }}"
				                    	checked="{{ in_array($episode->id, $watched_episodes) ? 'checked' : 'false' }}">
								</label>

			                    <a href="{{ url('season-episodes/show/' . $episode->id) }}">{{ $episode->name or 'Não encontrado' }}</a>
			                </div>
		                </li>
					@endforeach
				</ul>
			</li>
		@endforeach
	</ul>
</div>
