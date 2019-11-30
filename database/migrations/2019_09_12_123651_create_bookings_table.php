<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('pickup_address');
            $table->string('pickup_sign');
            $table->string('flight_number')->nullable();;
            $table->string('pickup_time')->nullable();;
            $table->text('special_request')->nullable();
            $table->string('drop_address');
            $table->string('type')->nullable();
            $table->string('date');
            $table->string('seats')->nullable();;
            $table->string('passagers')->nullable();;
            $table->string('bags')->nullable();;
            $table->string('price')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('bookings');
    }
}
