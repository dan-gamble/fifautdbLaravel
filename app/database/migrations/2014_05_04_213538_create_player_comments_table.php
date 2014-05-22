<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayerCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('player_comments', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('player_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('comment_parent_id')->nullable()->unsigned();
            $table->string('comment');
            $table->integer('points');
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('player_data_14');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comment_parent_id')->references('id')->on('player_comments');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('player_comments');
	}

}
