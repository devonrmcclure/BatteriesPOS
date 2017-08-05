<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockOrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('sku')->unsigned();
            $table->string('description');
            $table->integer('quantity_ordered');
            $table->integer('quantity_filled')->nullable();
            $table->boolean('received')->default(0); 

            $table->foreign('order_id')
                  ->references('order_number')->on('stock_order_history')
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
        Schema::drop('stock_order_products');
    }
}
