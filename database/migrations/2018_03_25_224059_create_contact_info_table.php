<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_contact_info', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->primary('user_id');
            $table->string('contact_name', 100);
            $table->string('contact_phone', 30);
            $table->string('contact_website', 100);
            $table->string('contact_email_address', 100);
            $table->string('contact_avatar', 30);
            $table->string('contact_language', 30);
            $table->string('contact_country', 30);
            $table->integer('ward_id')->unsigned();
            $table->foreign('ward_id')->references('id')->on('vnt_ward');
            $table->foreign('user_id')->references('user_id')->on('vnt_user');
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
        Schema::dropIfExists('vnt_contact_info');
    }
}
