<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSchema extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('shows', function($table) {

			$table->increments('id');
			$table->string('backdrop_url', 255);
			$table->timestamp('first_air_date');
			$table->string('homepage', 255);
			$table->string('name', 200);
			$table->text('overview');
			$table->double('vote_averange', 5, 2);
			$table->unsignedInteger('vote_count');

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('show_seasons', function($table) {

			$table->increments('id');
			$table->unsignedInteger('show_id');
			$table->unsignedInteger('season_number');
			$table->timestamp('air_date');
			$table->string('poster_url', 255);

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('show_id')
				->on('shows')
				->references('id');
		});

		Schema::create('season_episodes', function($table) {

			$table->increments('id');
			$table->unsignedInteger('show_season_id');
			$table->unsignedInteger('episode_number');
			$table->timestamp('air_date');
			$table->string('name', 100);
			$table->text('overview');
			$table->string('still_url', 255);
			$table->double('vote_averange', 5, 2);
			$table->unsignedInteger('vote_count');

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('show_season_id')
				->on('show_seasons')
				->references('id');
		});

		Schema::create('movies', function($table) {

			$table->increments('id');
			$table->string('backdrop_url', 255);
			$table->string('poster_url', 255);
			$table->unsignedInteger('imdb_id');
			$table->timestamp('release_date');
			$table->unsignedInteger('runtime');
			$table->string('title', 100);
			$table->double('vote_averange', 5, 2);
			$table->unsignedInteger('vote_count');

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('genres', function($table) {

			$table->increments('id');
			$table->string('description', 100);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('genre_movie', function($table) {

			$table->unsignedInteger('genre_id');
			$table->unsignedInteger('movie_id');

			$table->foreign('genre_id')
				->on('genres')
				->references('id');

			$table->foreign('movie_id')
				->on('movies')
				->references('id');
		});

		Schema::create('genre_show', function($table) {

			$table->unsignedInteger('show_id');
			$table->unsignedInteger('genre_id');

			$table->foreign('genre_id')
				->on('genres')
				->references('id');

			$table->foreign('show_id')
				->on('shows')
				->references('id');
		});

		Schema::create('users', function($table) {

			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 255);
			$table->string('password', 60);
			$table->enum('is_administrator', ['Y', 'N']);
			$table->string('timezone', 255);

			$table->timestamp('verfied_at');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('movie_user', function($table) {

			$table->unsignedInteger('movie_id');
			$table->unsignedInteger('user_id');

			$table->foreign('movie_id')
				->on('movies')
				->references('id');

			$table->foreign('user_id')
				->on('users')
				->references('id');
		});

		Schema::create('show_user', function($table) {

			$table->unsignedInteger('show_id');
			$table->unsignedInteger('user_id');

			$table->foreign('show_id')
				->on('shows')
				->references('id');

			$table->foreign('user_id')
				->on('users')
				->references('id');
		});

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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('seasson_episode_user');
		Schema::drop('show_user');
		Schema::drop('movie_user');
		Schema::drop('users');
		Schema::drop('genre_show');
		Schema::drop('genre_movie');
		Schema::drop('genres');
		Schema::drop('movies');
		Schema::drop('season_episodes');
		Schema::drop('show_seasons');
		Schema::drop('shows');
	}

}
