<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_order_history', function (Blueprint $table) {
            $table->string('order_number')->primary();
            $table->integer('requesting_location')->unsigned();
            $table->integer('requesting_from_location')->unsigned();
            $table->string('status')->default('Unordered');
            $table->timestamp('date_ordered')->nullable();
            $table->timestamp('date_in_transit')->nullable();
            $table->timestamp('date_received')->nullable();
            $table->timestamps();

            $table->foreign('requesting_location')
                  ->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('requesting_from_location')
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
        Schema::drop('stock_order_history');
    }
}
