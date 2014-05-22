<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClubData14Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_data_14', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->unsigned()->unique();
            $table->string('club_name');
            $table->string('club_name_abbr3');
            $table->string('club_name_abbr7');
            $table->string('club_name_abbr15');
            $table->integer('league_id')->unsigned();
            $table->timestamps();

            $table->foreign('league_id')->references('asset_id')->on('league_data_14');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('club_data_14');
    }

}
