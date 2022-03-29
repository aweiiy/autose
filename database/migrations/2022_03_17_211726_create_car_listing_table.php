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
            $table->foreignId('city_id')->nullable();
            $table->foreignId('fuel_type_id')->nullable();
            $table->integer('cubic_capacity')->nullable();
            $table->integer('battery_capacity')->nullable();
            $table->foreignId('transmission_id');
            $table->string('description')->nullable();
            $table->integer('year');
            $table->integer('mileage');
            $table->integer('engine_power');
            $table->string('vin')->nullable();
            $table->integer('price');
            $table->integer('phone_number');
            $table->string('email')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_model_id')->references('id')->on('car_model');
            $table->foreign('car_make_id')->references('id')->on('car_make');
            $table->foreign('car_body_type_id')->references('id')->on('car_body_type');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_type');
            $table->foreign('transmission_id')->references('id')->on('transmissions');

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
