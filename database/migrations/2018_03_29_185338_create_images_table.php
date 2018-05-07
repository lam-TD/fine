<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_banner', 50);
            $table->string('image_details_1', 50);
            $table->string('image_details_2', 50);
            $table->string('image_status', 10);
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
        Schema::dropIfExists('vnt_images');
    }
}
