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
                        $table->integer('invoice_number');
                        $table->string('location'); //White Rock
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
                        $table->integer('customer_id')->unsigned();
                        $table->string('payment_method');
                        $table->string('staff');
                        $table->string('invoice_comment');
                        $table->string('comments')->nullable();
                        $table->string('gst_number');
                        $table->boolean('printed');
                        $table->timestamps();

                        $table->foreign('customer_id')
                              ->references('id')->on('customers');
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
