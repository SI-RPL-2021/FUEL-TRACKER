<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table)
        {
            $table->increments('tasks_id', true);
            $table->text('desc');
            $table->string('litre');
            $table->integer('did')->unsigned()->nullable();
            $table->integer('spbu_id_1')->unsigned()->nullable();
            $table->integer('spbu_id_2')->unsigned()->nullable();
            $table->integer('spbu_id_3')->unsigned()->nullable();
            $table->foreign('spbu_id_1')->references('spbu_id')->on('spbus');
            $table->foreign('spbu_id_2')->references('spbu_id')->on('spbus');
            $table->foreign('spbu_id_3')->references('spbu_id')->on('spbus');
            $table->foreign('did')->references('uid')->on('users');

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
        //
    }
}
