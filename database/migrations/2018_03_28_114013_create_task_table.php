<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnt_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_title',40);
            $table->string('task_description', 255);
            $table->text('content');
            $table->string('date_start');
            $table->string('date_end');
            $table->tinyInteger('status');
            $table->integer('assigner_user_id')->unsigned();
            $table->foreign('assigner_user_id')->references('user_id')->on('vnt_user');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('vnt_task');
    }
}
