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
            $table->string('bussiness_type')->nullable();
            $table->string('price')->nullable();
            $table->string('color')->nullable();
            $table->string('year')->nullable();
            $table->string('vin')->nullable();
            $table->string('current_meter')->nullable();
            $table->string('passagers');
            $table->string('bags');
            $table->string('status');
            $table->string('photo')->default('');
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
            $table->string('filename')->nullable();

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
