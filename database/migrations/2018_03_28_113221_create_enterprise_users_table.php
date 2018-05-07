<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_enterprise_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('user_email_enterprise', 100);
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
        Schema::dropIfExists('vnt_enterprise_user');
    }
}
