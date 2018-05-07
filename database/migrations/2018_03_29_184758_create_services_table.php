<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_services', function (Blueprint $table) {
            $table->increments('id');
            $table->text('sv_description');
            $table->string('sv_open', 25);
            $table->string('sv_close', 25);
            $table->string('sv_highest_price', 15);
            $table->string('sv_lowest_price', 15);
            $table->string('sv_website', 100);
            $table->string('sv_phone_number', 25);
            $table->integer('sv_counter_view');
            $table->integer('sv_counter_point');            
            $table->string('sv_status', 10);
            $table->integer('sv_types');
            $table->integer('tourist_places_id')->unsigned();
            $table->foreign('tourist_places_id')->references('id')->on('vnt_tourist_places');
            $table->integer('user_partner_id')->unsigned()->nullable();
            $table->foreign('user_partner_id')->references('user_id')->on('vnt_partner_user');
            $table->integer('user_tour_guide_id')->unsigned()->nullable();
            $table->foreign('user_tour_guide_id')->references('user_id')->on('vnt_tour_guide');
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
        Schema::dropIfExists('vnt_services');
    }
}
