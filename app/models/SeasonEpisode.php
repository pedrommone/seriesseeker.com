<?php

class SeasonEpisode extends Eloquent {

	protected $table = 'season_episodes';

	public function users() {

		return $this->belongsToMany('User');
	}

	public function season() {

		return $this->belongsTo('Season');
	}

	public function scopeNext() {

		return $this->where('air_date', '>', Carbon::now())		
			->orderBy('air_date', 'ASC');
	}

	public function getAirDateReadableAttribute() {

		return Carbon::parse($this->air_date)
			->diffForHumans();
	}
}
