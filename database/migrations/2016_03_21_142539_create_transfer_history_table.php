<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_history', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('from_store')->unsigned();
                        $table->integer('quantity');
                        $table->integer('sku')->unsigned();
                        $table->integer('to_store')->unsigned();
                        $table->timestamps();

                        $table->foreign('from_store')
                              ->references('id')->on('users')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');

                        $table->foreign('to_store')
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
        Schema::drop('transfer_history');
    }
}
