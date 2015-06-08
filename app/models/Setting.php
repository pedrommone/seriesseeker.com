<?php

class Setting extends Eloquent {

	protected $table = 'settings';
	protected $fillable = ['key', 'value'];

	public $timestamps = false;
}
