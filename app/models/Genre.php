<?php

class Genre extends Eloquent {

	protected $table = 'genres';

	public function movies() {

		return $this->belongsToMany('Movie');
	}

	public function shows() {

		return $this->belongsToMany('Show');
	}
}
