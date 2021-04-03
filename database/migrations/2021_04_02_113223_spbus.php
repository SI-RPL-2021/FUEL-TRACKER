<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Spbus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spbus', function(Blueprint $table)
        {
            $table->increments('spbu_id', true);
            $table->text('address');
            $table->string('city');
            $table->text('spbu_iframe');
            $table->string('spbu_name');
            $table->timestamps();
        });
        Schema::table('supervisors', function($table) {
            $table->foreign('spbu_id')->references('spbu_id')->on('spbus');
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
