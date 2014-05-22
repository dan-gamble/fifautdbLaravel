<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayerData14Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('player_data_14', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('asset_id')->unsigned()->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('common_name')->nullable();
            $table->integer('overall_rating')->unsigned()->nullable();
            $table->integer('card_att1')->unsigned()->nullable();
            $table->integer('card_att2')->unsigned()->nullable();
            $table->integer('card_att3')->unsigned()->nullable();
            $table->integer('card_att4')->unsigned()->nullable();
            $table->integer('card_att5')->unsigned()->nullable();
            $table->integer('card_att6')->unsigned()->nullable();
            $table->integer('card_type')->unsigned()->nullable();
            $table->string('item_type')->nullable();
            $table->integer('club_id')->unsigned()->nullable();
            $table->integer('league_id')->unsigned()->nullable();
            $table->integer('nation_id')->unsigned()->nullable();
            $table->integer('shirt_number')->unsigned()->nullable();
            $table->date('dob')->nullable();
            $table->date('join_date')->nullable();
            $table->integer('height')->unsigned()->nullable();
            $table->integer('weight')->unsigned()->nullable();
            $table->string('position')->nullable();
            $table->string('role')->nullable();
            $table->string('pref_foot')->nullable();
            $table->integer('weak_foot')->unsigned()->nullable();
            $table->integer('skill_moves')->unsigned()->nullable();
            $table->string('att_workrate')->nullable();
            $table->string('def_workrate')->nullable();
            $table->integer('acceleration')->unsigned()->nullable();
            $table->integer('sprint_speed')->unsigned()->nullable();
            $table->integer('agility')->unsigned()->nullable();
            $table->integer('balance')->unsigned()->nullable();
            $table->integer('jumping')->unsigned()->nullable();
            $table->integer('stamina')->unsigned()->nullable();
            $table->integer('strength')->unsigned()->nullable();
            $table->integer('reactions')->unsigned()->nullable();
            $table->integer('aggression')->unsigned()->nullable();
            $table->integer('interceptions')->unsigned()->nullable();
            $table->integer('positioning')->unsigned()->nullable();
            $table->integer('vision')->unsigned()->nullable();
            $table->integer('ball_control')->unsigned()->nullable();
            $table->integer('crossing')->unsigned()->nullable();
            $table->integer('dribbling')->unsigned()->nullable();
            $table->integer('finishing')->unsigned()->nullable();
            $table->integer('free_kick_accuracy')->unsigned()->nullable();
            $table->integer('heading_accuracy')->unsigned()->nullable();
            $table->integer('long_passing')->unsigned()->nullable();
            $table->integer('short_passing')->unsigned()->nullable();
            $table->integer('marking')->unsigned()->nullable();
            $table->integer('long_shots')->unsigned()->nullable();
            $table->integer('shot_power')->unsigned()->nullable();
            $table->integer('standing_tackle')->unsigned()->nullable();
            $table->integer('sliding_tackle')->unsigned()->nullable();
            $table->integer('volleys')->unsigned()->nullable();
            $table->integer('curve')->unsigned()->nullable();
            $table->integer('penalties')->unsigned()->nullable();
            $table->integer('gk_diving')->unsigned()->nullable();
            $table->integer('gk_handling')->unsigned()->nullable();
            $table->integer('gk_kicking')->unsigned()->nullable();
            $table->integer('gk_reflexes')->unsigned()->nullable();
            $table->integer('gk_positioning')->unsigned()->nullable();
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
		Schema::drop('player_data_14');
	}

}
