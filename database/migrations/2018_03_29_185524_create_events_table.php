<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name', 100);
            $table->date('event_start');
            $table->date('event_end');
            $table->string('event_status', 10);
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('vnt_types');
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
        Schema::dropIfExists('vnt_events');
    }
}
