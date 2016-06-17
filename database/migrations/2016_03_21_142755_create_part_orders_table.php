<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_orders', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('invoice_id')->unsigned()->nullable();
                        $table->string('referred_by')->nullable();
                        $table->string('make');
                        $table->string('item');
                        $table->string('model');
                        $table->integer('sku')->unsigned();
                        $table->string('description');
                        $table->string('part_number');
                        $table->float('deposit');
                        $table->integer('customer_id')->unsigned();
                        $table->integer('staff_id')->unsigned();
                        $table->integer('location_id')->unsigned();
                        $table->string('pick_up_location');
                        $table->text('notes')->nullable();
                        $table->timestamp('to_head_office');
                        $table->timestamp('from_head_office')->default('0000-00-00 00:00:00');
                        $table->timestamp('customer_pick_up')->default('0000-00-00 00:00:00');
                        $table->timestamp('customer_called')->default('0000-00-00 00:00:00');
                        $table->timestamps();

                        $table->foreign('customer_id')
                              ->references('id')->on('customers');
                        $table->foreign('sku')
                              ->references('sku')->on('inventory');
                        $table->foreign('location_id')
                              ->references('id')->on('users');
                        $table->foreign('staff_id')
                              ->references('id')->on('staff');
                        $table->foreign('invoice_id')
                              ->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('part_orders');
    }
}
