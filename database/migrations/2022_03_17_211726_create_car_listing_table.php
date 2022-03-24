<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_listing', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->foreignId('car_make_id');
            $table->foreignId('car_model_id');
            $table->foreignId('car_body_type_id');
            $table->foreignId('city_id');
            $table->foreignId('fuel_type_id');
            $table->integer('cubic_capacity');
            $table->integer('battery_capacity');
            $table->string('description');
            $table->integer('year');
            $table->integer('mileage');
            $table->string('vin');
            $table->integer('price');
            $table->integer('phone_number');
            $table->string('email');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_model_id')->references('id')->on('car_model');
            $table->foreign('car_make_id')->references('id')->on('car_make');
            $table->foreign('car_body_type_id')->references('id')->on('car_body_type');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_listing');
    }
}
