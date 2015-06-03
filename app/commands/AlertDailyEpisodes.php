<?php

use Illuminate\Console\Command;

class AlertDailyEpisodes extends Command {

	protected $name = 'alert:daily-episodes';
	protected $description = 'Alert all users about daily episodes';

	public function fire()
	{

		$users = User::with(['episodes' => function($query) {

				$query->whereRaw('DATE(season_episodes.air_date) = DATE(NOW())');
			}])
			->whereHas('episodes', function($query) {

				$query->whereRaw('DATE(season_episodes.air_date) = DATE(NOW())');
			})
			->get();

		if (count($users) > 0)
		{
			
			foreach ($users as $user)
			{

				Mail::send('emails.daily-episodes', [

						'user' => $user
				], function($message) use ($user)
				{

					$message
						->to($user->email, $user->name)
						->subject('Hoje tem série!');
				});
			}
		}
	}
}
