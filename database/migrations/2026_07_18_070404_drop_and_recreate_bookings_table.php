<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAndRecreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('bookings');

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('event_date');
            $table->string('venue')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_view')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
