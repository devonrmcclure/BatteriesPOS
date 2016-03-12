<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('name');
                        $table->string('address')->nullable();
                        $table->string('rep_code');
                        $table->string('email');
                        $table->string('phone');
                        $table->integer('location_id')->unsigned();
                        $table->timestamps();

                        $table->foreign('location_id')
                              ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff');
    }
}
