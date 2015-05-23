<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $hidden = ['password', 'remember_token'];

	public function movies() {

		return $this->belongsToMany('Movie')
			->withPivot(['type']);
	}

	public function shows() {

		return $this->belongsToMany('Show');
	}

	public function episodes() {

		return $this->belongsToMany('SeasonEpisode');
	}
}
