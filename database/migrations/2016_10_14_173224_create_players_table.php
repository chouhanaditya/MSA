<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('player_name');
            $table->string('player_email')->unique();
            $table->string('player_address');
            $table->string('player_city');
            $table->string('player_state');
            $table->integer('player_zipcode');
            $table->integer('player_contactno');
            $table->string('player_eligibility_status')->default('In');
            $table->integer('team_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('players', function (Blueprint $table) {
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('players');

    }
}
