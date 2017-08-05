<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQohTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qoh', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('location_id')->unsigned();
                        $table->integer('quantity');
                        $table->integer('sku')->unsigned();
                        $table->timestamps();

                        $table->foreign('location_id')
                              ->references('id')->on('users')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');

                        $table->foreign('sku')
                              ->references('sku')->on('inventory')
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
        Schema::drop('qoh');
    }
}
