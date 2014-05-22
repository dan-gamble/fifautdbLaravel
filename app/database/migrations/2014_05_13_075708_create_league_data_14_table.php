<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeagueData14Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('league_data_14', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('asset_id')->unsigned()->unique();
            $table->string('league_name');
            $table->string('league_name_abbr5');
            $table->string('league_name_abbr15');
            $table->integer('nation_id')->unsigned();
			$table->timestamps();

            $table->foreign('nation_id')->references('asset_id')->on('nation_data_14');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('league_data_14');
	}

}
