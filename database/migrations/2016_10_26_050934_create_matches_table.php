<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_name');
            $table->integer('tournament_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->integer('referee_id')->unsigned();
            $table->date('match_date');
            $table->string('match_start_time');
            $table->string('match_half_time');
            $table->string('match_end_time');
            $table->integer('match_team1_id')->unsigned();
            $table->integer('match_team2_id')->unsigned();
            $table->integer('match_team1_score')->default('0');
            $table->integer('match_team2_score')->default('0');
            $table->string('match_team1_goals');
            $table->string('match_team2_goals');
            $table->timestamps();
        });

        Schema::table('matches', function (Blueprint $table) {
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
        });
        Schema::table('matches', function (Blueprint $table) {
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
        });
        Schema::table('matches', function (Blueprint $table) {
            $table->foreign('referee_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('matches', function (Blueprint $table) {
            $table->foreign('match_team1_id')->references('id')->on('teams')->onDelete('cascade');
        });

        Schema::table('matches', function (Blueprint $table) {
            $table->foreign('match_team2_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('matches');

    }
}
