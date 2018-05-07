<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_visitor_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vr_title',50);
            $table->string('vr_ratings_details',255);
            $table->integer('vr_rating');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('vnt_user');
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
        Schema::dropIfExists('vnt_visitor_ratings');
    }
}
