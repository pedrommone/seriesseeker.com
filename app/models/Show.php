<?php

class Show extends Eloquent {

	protected $table = 'shows';

	public function genres() {

		return $this->belongsToMany('Genre');
	}

	public function users() {

		return $this->belongsToMany('User');
	}

	public function seasons() {

		return $this->hasMany('ShowSeason');
	}

	public function episodes() {

		return $this->hasManyThrough('SeasonEpisode', 'ShowSeason', 'show_id', 'show_season_id');
	}

	public function getFirstAirDateReadableAttribute() {

		return Carbon::parse($this->attributes['first_air_date'])
			->diffForHumans();
	}
}
