<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarBodyTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_body_type', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_car_model');
            $table->string('name');
            $table->timestamps();

            $table->foreign('id_car_model')->references('id')->on('car_model');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_body_type');
    }
}
