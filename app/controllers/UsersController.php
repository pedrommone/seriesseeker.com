<?php

class UsersController extends BaseController {

	public function getIndex()
	{

		return View::make('users.index');
	}
}
