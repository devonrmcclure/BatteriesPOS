<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_orders', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('repair_order_number')->unique();
                        $table->string('refered_by');
                        $table->integer('customer_id')->unsigned();
                        $table->integer('call_if_over')->nullable();
                        $table->boolean('original_receipt')->nullable()->default(NULL);
                        $table->boolean('warranty');
                        $table->integer('deposit')->nullable();
                        $table->string('staff');
                        $table->string('product');
                        $table->string('model')->nullable();
                        $table->string('type')->nullable();
                        $table->string('date_code')->nullable();
                        $table->string('condition');
                        $table->string('accessories');
                        $table->integer('location_id')->unsigned();
                        $table->integer('invoice_number')->nullable();
                        $table->text('problem');
                        $table->text('notes');
                        $table->timestamp('to_head_office');
                        $table->timestamp('from_head_office');
                        $table->timestamp('customer_pick_up');
                        $table->timestamps();

                        $table->foreign('customer_id')
                              ->references('id')->on('customers');
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
        Schema::drop('repair_orders');
    }
}
