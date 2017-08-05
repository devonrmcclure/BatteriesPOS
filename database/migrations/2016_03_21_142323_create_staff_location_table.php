<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_location', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('staff_id')->unsigned();
                        $table->integer('location_id')->unsigned();
                        $table->timestamps();

                        $table->foreign('staff_id')
                              ->references('id')->on('staff')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');

                        $table->foreign('location_id')
                              ->references('id')->on('users')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff_location');
    }
}
