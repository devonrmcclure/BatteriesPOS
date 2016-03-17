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
                        $table->integer('originating_store')->unsigned();
                        $table->integer('quantity');
                        $table->integer('sku')->unsigned();
                        $table->integer('destination_store')->unsigned();
                        $table->rememberToken();
                        $table->timestamps();

                        $table->foreign('originating_store')
                              ->references('id')->on('users');

                        $table->foreign('destination_store')
                              ->references('id')->on('users');

                        $table->foreign('sku')
                              ->references('sku')->on('inventory');
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
