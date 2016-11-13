<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name');
            $table->string('field_address');
            $table->string('field_city');
            $table->string('field_state');
            $table->integer('field_zipcode');
            $table->string('field_owner_org');
            $table->string('field_owner_name');
            $table->string('field_owner_email');
            $table->integer('field_owner_contactno');
            $table->string('field_notes');
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
        Schema::drop('fields');

    }
}
