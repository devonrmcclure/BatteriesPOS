<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_invoices', function (Blueprint $table) {
            $table->string('invoice_id')->primary();
            $table->string('vendor');
            $table->float('total_gst');
            $table->float('total');
            $table->string('payment_method');
            $table->string('staff');
            $table->string('comments')->nullable();
            $table->timestamp('date_received')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vendor_invoices');
    }
}
