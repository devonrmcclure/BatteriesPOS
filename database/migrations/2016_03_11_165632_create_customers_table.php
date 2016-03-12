<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('name');
                        $table->string('company')->nullable();
                        $table->string('address')->nullable();
                        $table->string('province')->nullable();
                        $table->string('country')->nullable();
                        $table->string('primary_phone');
                        $table->string('secondary_phone')->nullable();
                        $table->string('email')->nullable();
                        $table->text('comments')->nullable();
                        $table->integer('store_credit')->nullable();
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
        Schema::drop('customers');
    }
}
