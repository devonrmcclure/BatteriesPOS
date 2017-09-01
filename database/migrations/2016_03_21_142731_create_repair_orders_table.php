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
                        $table->string('referred_by');
                        $table->integer('customer_id')->unsigned();
                        $table->integer('call_if_over')->nullable();
                        $table->boolean('original_receipt')->nullable()->default(NULL);
                        $table->string('warranty');
                        $table->float('deposit')->nullable();
                        $table->integer('staff_id')->unsigned();
                        $table->string('product');
                        $table->string('model')->nullable();
                        $table->string('type')->nullable();
                        $table->string('date_code')->nullable();
                        $table->string('condition');
                        $table->string('accessories');
                        $table->integer('location_id')->unsigned();
                        $table->integer('invoice_id')->unsigned()->nullable();
                        $table->text('problem');
                        $table->text('notes')->nullable();
                        $table->timestamp('to_head_office')->default('0000-00-00 00:00:00');
                        $table->timestamp('from_head_office')->default('0000-00-00 00:00:00');
                        $table->timestamp('customer_pick_up')->default('0000-00-00 00:00:00');
                        $table->timestamp('customer_called')->default('0000-00-00 00:00:00');
                        $table->timestamp('updated_at')->nullable() ;
                        $table->timestamp('created_at')->useCurrent();

                        $table->foreign('customer_id')
                              ->references('id')->on('customers')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');

                        $table->foreign('location_id')
                              ->references('id')->on('users')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');

                        $table->foreign('staff_id')
                              ->references('id')->on('staff')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');
                        //$table->foreign('invoice_id')
                              //->references('id')->on('invoices');

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
