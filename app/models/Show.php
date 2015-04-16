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
}
