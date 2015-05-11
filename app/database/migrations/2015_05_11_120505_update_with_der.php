<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWithDer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('movies', function($table) {

			$table->dropColumn('backdrop_url');
			$table->dropColumn('poster_url');
			$table->dropColumn('runtime');
		});

		Schema::table('movies', function($table) {

			$table->string('backdrop_url', 255)
				->nullable();

			$table->string('poster_url', 255)
				->nullable();

			$table->string('runtime', 255)
				->nullable()
				->default(0);
		});

		Schema::table('movie_user', function($table) {

			$table->timestamp('added_on');
		});

		Schema::table('season_episode_user', function($table) {

			$table->timestamp('added_on');
		});

		Schema::table('show_user', function($table) {

			$table->timestamp('added_on');
		});

		Schema::table('season_episodes', function($table) {

			$table->dropColumn('still_url');
		});

		Schema::table('season_episodes', function($table) {

			$table->string('still_url', 255)
				->nullable();
		});

		Schema::table('show_seasons', function($table) {

			$table->dropColumn('poster_url');
		});

		Schema::table('show_seasons', function($table) {

			$table->string('poster_url', 255)
				->nullable();
		});

		Schema::table('shows', function($table) {

			$table->dropColumn('homepage');
			$table->dropColumn('backdrop_url');
		});

		Schema::table('shows', function($table) {

			$table->string('homepage', 255)
				->nullable();

			$table->string('backdrop_url', 255)
				->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table('movies', function($table) {

			$table->dropColumn('backdrop_url');
			$table->dropColumn('poster_url');
			$table->dropColumn('runtime');
		});

		Schema::table('movies', function($table) {

			$table->string('backdrop_url', 255);
			$table->string('poster_url', 255);
			$table->string('runtime', 255);
		});

		Schema::table('movie_user', function($table) {

			$table->dropColumn('added_on');
		});

		Schema::table('season_episode_user', function($table) {

			$table->dropColumn('added_on');
		});

		Schema::table('show_user', function($table) {

			$table->dropColumn('added_on');
		});

		Schema::table('season_episodes', function($table) {

			$table->dropColumn('still_url');
		});

		Schema::table('season_episodes', function($table) {

			$table->string('still_url', 255);
		});

		Schema::table('show_seasons', function($table) {

			$table->dropColumn('poster_url');
		});

		Schema::table('show_seasons', function($table) {

			$table->string('poster_url', 255);
		});

		Schema::table('shows', function($table) {

			$table->dropColumn('homepage');
			$table->dropColumn('backdrop_url');
		});

		Schema::table('shows', function($table) {

			$table->string('homepage', 255);
			$table->string('backdrop_url', 255);
		});
	}
}
