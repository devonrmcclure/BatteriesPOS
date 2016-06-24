<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('location'); //White Rock
                        $table->float('total_pst');
                        $table->float('total_gst');
                        $table->float('total');
                        $table->integer('customer_id')->unsigned();
                        $table->string('payment_method');
                        $table->string('staff');
                        $table->string('invoice_comment');
                        $table->string('comments')->nullable();
                        $table->string('gst_number');
                        $table->string('printed');
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
        Schema::drop('invoices');
    }
}
