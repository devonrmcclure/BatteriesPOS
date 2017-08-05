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
                        $table->integer('location_id')->unsigned();
                        $table->string('first_name');
                        $table->string('last_name');
                        $table->string('address')->nullable();
                        $table->string('city')->nullable();
                        $table->string('province')->nullable();
                        $table->string('country')->nullable();
                        $table->string('postal_code')->nullable();
                        $table->string('primary_phone');
                        $table->string('secondary_phone')->nullable();
                        $table->string('email');
                        $table->string('rep_code')->nullable(false);
                        $table->timestamps();

                        $table->foreign('location_id')->references('id')->on('users')
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
        Schema::drop('staff');
    }
}
