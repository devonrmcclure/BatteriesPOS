<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_invoice_id');
            $table->integer('sku');
            $table->string('description');
            $table->string('brand');
            $table->float('ep_cost_vendor');
            $table->float('ep_cost_landed');
            $table->integer('quantity');
            $table->float('total');
            $table->timestamps();

            $table->foreign('vendor_invoice_id')
                  ->references('invoice_id')->on('vendor_invoices')
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
        Schema::drop('purchases');
    }
}
