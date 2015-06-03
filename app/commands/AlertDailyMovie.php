<?php

use Illuminate\Console\Command;

class AlertDailyMovie extends Command {

	protected $name = 'alert:daily-movie';
	protected $description = 'Alert all users about daily movies';

	public function fire()
	{

		$users = User::with('movies')
			->whereHas('movies', function($query) {

				$query->whereRaw('DATE(movies.release_date) = DATE(NOW())');
			})
			->get();

		if (count($users) > 0)
		{
			
			foreach ($users as $user)
			{

				Mail::send('emails.daily-movie', [

						'user' => $user
				], function($message) use ($user)
				{

					$message
						->to($user->email, $user->name)
						->subject('Hoje tem filme!');
				});
			}
		}
	}
}
