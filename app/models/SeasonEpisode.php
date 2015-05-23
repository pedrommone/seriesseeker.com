<?php

class SeasonEpisode extends Eloquent {

	protected $table = 'season_episodes';

	public function users() {

		return $this->belongsToMany('User');
	}

	public function season() {

		return $this->belongsTo('ShowSeason', 'show_season_id');
	}

	public function scopeNext() {

		return $this->where('air_date', '>', Carbon::now())		
			->orderBy('air_date', 'ASC');
	}

	public function getAirDateReadableAttribute() {

		return Carbon::parse($this->attributes['air_date'])
			->diffForHumans();
	}

	public function getAirDateAttribute() {

		return Carbon::parse($this->attributes['air_date'])
			->format('d/m/Y');
	}

	public function getEpisodeNumberAttribute() {

		return str_pad($this->attributes['episode_number'], 2, '0', STR_PAD_LEFT);
	}
}
