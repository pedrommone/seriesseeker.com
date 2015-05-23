<?php

class ShowSeason extends Eloquent {

	protected $table = 'show_seasons';

	public function show() {

		return $this->belongsTo('Show');
	}

	public function episodes() {

		return $this->hasMany('SeasonEpisode');
	}

	public function getSeasonNumberAttribute() {

		return str_pad($this->attributes['season_number'], 2, '0', STR_PAD_LEFT);
	}
}
