<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('invoice_id')->unsigned();
                        $table->integer('location_id')->unsigned();
                        $table->integer('sku');
                        $table->string('description');
                        $table->string('category');
                        $table->integer('quantity');
                        $table->float('price');
                        $table->float('discount');
                        $table->float('extended');
                        $table->float('pst');
                        $table->float('gst');
                        $table->float('total');
                        $table->timestamps();

                        $table->foreign('invoice_id')
                              ->references('id')->on('invoices');

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
        Schema::drop('sales');
    }
}
