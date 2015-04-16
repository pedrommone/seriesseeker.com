<?php

class SeasonEpisode extends Eloquent {

	protected $table = 'season_episodes';

	public function users() {

		return $this->belongsToMany('User');
	}

	public function season() {

		return $this->belongsTo('Season');
	}
}
