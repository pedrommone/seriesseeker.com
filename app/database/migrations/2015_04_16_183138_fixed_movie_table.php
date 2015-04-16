<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixedMovieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('movies', function($table) {

			$table->dropColumn('imdb_id');
		});


		Schema::table('movies', function($table) {

			$table->dropColumn('vote_averange');
			$table->string('imdb_id', 20);
			$table->double('vote_average');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {}
}
