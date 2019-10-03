<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('driver_id')->nullable();
            $table->string('plate');
            $table->string('make');
            $table->string('model');
            $table->string('bussiness_type');
            $table->string('price');
            $table->string('color');
            $table->string('year');
            $table->string('vin');
            $table->string('current_meter');
            $table->string('photo')->default('');
            $table->string('mime');
            $table->string('original_filename');
            $table->string('filename');

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
        Schema::dropIfExists('vehicles');
    }
}
