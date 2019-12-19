<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('property_id')->references('id')->on('properties');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('favorite')->default(0);
            $table->integer('booked')->default(0);
            $table->date('date_in');
            $table->date('date_out');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties_users');
    }
}
