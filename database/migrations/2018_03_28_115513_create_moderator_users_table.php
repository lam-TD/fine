<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeratorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_moderator_users', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->primary('user_id');
            
            $table->tinyInteger('account_active');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('vnt_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vnt_moderator_users');
    }
}
