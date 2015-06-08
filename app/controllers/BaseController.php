<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{

		if ( ! is_null($this->layout))
		{
			
			$this->layout = View::make($this->layout);
		}

		View::share('last_update', Setting::whereKey('last_update')->first()->value);
	}

}
