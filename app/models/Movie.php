<?php

class Movie extends Eloquent {

	protected $table = 'movies';

	public function genres() {

		return $this->belongsToMany('Genre');
	}

	public function users() {

		return $this->belongsToMany('User')
				->withPivot(['type']);
	}

	public function scopeNext() {

		return $this->where('release_date', '>', Carbon::now())
			->orderBy('release_date', 'ASC');
	}

	public function getReleaseDateReadableAttribute() {

		return Carbon::parse($this->release_date)
			->diffForHumans();
	}
}
