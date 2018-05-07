<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_name',50);
            $table->integer('hotel_number_star');
            $table->string('hotel_status',10);
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('vnt_services');
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
        Schema::dropIfExists('vnt_hotels');
    }
}
