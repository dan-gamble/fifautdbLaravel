<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNationData14Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nation_data_14', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('asset_id')->unsigned()->unique();
            $table->string('nation_name');
            $table->string('nation_name_abbr3');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nation_data_14');
	}

}
