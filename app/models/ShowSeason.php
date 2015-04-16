<?php

class ShowSeason extends Eloquent {

	protected $table = 'show_seasons';

	public function show() {

		return $this->belongsTo('Show');
	}

	public function episodes() {

		return $this->hasMany('SeasonEpidose');
	}
}
