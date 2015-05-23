<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixColumbnName extends Migration {

	public function up()
	{
		
		Schema::drop('season_episode_user');

		Schema::create('season_episode_user', function($table) {

			$table->unsignedInteger('season_episode_id');
			$table->unsignedInteger('user_id');
			$table->timestamp('added_on');

			$table->foreign('season_episode_id')
				->on('season_episodes')
				->references('id');

			$table->foreign('user_id')
				->on('users')
				->references('id');
		});
	}

	public function down()
	{
		
		Schema::drop('season_episode_user');

		Schema::create('season_episode_user', function($table) {

			$table->unsignedInteger('season_episode_id');
			$table->unsignedInteger('user_id');
			$table->timestamp('added_on');

			$table->foreign('season_episode_id')
				->on('season_episodes')
				->references('id');

			$table->foreign('user_id')
				->on('users')
				->references('id');
		});
	}

}
