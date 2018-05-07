<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_point_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('like_id')->unsigned()->nullable();
            $table->foreign('like_id')->references('id')->on('vnt_likes');
            $table->integer('share_id')->unsigned()->nullable();
            $table->foreign('share_id')->references('id')->on('vnt_share');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')->on('vnt_services');
            $table->integer('rating_id')->unsigned()->nullable();
            $table->foreign('rating_id')->references('user_id')->on('vnt_visitor_ratings');
            $table->integer('point_id')->unsigned()->nullable();
            $table->foreign('point_id')->references('user_id')->on('vnt_moderator_users');
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
        Schema::dropIfExists('vnt_point_details');
    }
}
