<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSightseeingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_sightseeing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sightseeing_name',50);
            $table->string('sightseeing_status',10);
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
        Schema::dropIfExists('vnt_sightseeing');
    }
}
