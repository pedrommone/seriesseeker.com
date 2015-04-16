<?php

class Genre extends Eloquent {

	protected $table = 'movies';

	public function movies() {

		return $this->belongsToMany('Movie');
	}

	public function shows() {

		return $this->belongsToMany('Show');
	}
}
