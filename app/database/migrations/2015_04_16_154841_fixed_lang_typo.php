<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixedLangTypo extends Migration {

	/**
	 * Run the migrationzs.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::drop('seasson_episode_user');

		Schema::create('season_episode_user', function($table) {

			$table->unsignedInteger('seasson_episode_id');
			$table->unsignedInteger('user_id');

			$table->foreign('seasson_episode_id')
				->on('season_episodes')
				->references('id');

			$table->foreign('user_id')
				->on('users')
				->references('id');
		});

		Schema::table('movie_user', function($table) {

			$table->enum('type', ['W', 'F']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('season_episode_user');

		Schema::create('seasson_episode_user', function($table) {

			$table->unsignedInteger('seasson_episode_id');
			$table->unsignedInteger('user_id');

			$table->foreign('seasson_episode_id')
				->on('season_episodes')
				->references('id');

			$table->foreign('user_id')
				->on('users')
				->references('id');
		});

		Schema::table('movie_user', function($table) {

			$table->dropColumn('type');
		});
	}
}
