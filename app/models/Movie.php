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
}
