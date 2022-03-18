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
            $table->foreignId('owner_id');
            $table->foreignId('id_car_make');
            $table->foreignId('id_car_model');
            $table->foreignId('id_car_body_type');
            $table->string('description');
            $table->integer('year');
            $table->integer('price');
            $table->integer('phone_number');
            $table->string('email');
            $table->string('image');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('id_car_model')->references('id')->on('car_model');
            $table->foreign('id_car_make')->references('id')->on('car_make');
            $table->foreign('id_car_body_type')->references('id')->on('car_body_type');

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
