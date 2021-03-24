<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Driver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function(Blueprint $table)
        {
            $table->increments('did', true);
            $table->string('phone_no');
            $table->string('vehicle_no');
            $table->timestamps();
        });
        Schema::table('users', function($table) {
            $table->foreign('did')->references('did')->on('drivers');
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
