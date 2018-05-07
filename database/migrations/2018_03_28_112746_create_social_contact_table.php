<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_social_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('social_id')->unsigned();
            $table->integer('contact_info_id')->unsigned();
            $table->foreign('social_id')->references('id')->on('vnt_social');
            $table->foreign('contact_info_id')->references('user_id')->on('vnt_contact_info');
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
        Schema::dropIfExists('vnt_social_contact');
    }
}
