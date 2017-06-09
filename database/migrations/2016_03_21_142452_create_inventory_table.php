<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
                        $table->increments('sku');
                        $table->text('description');
                        $table->integer('category_id')->unsigned();
                        // $table->float('ep_cost_vendor');
                        // $table->float('ep_cost_landed');
                        // $table->float('ep_cost_wholesale');
                        // $table->float('ep_cost_ad'); //associate dealer (leslie, tong)
                        // $table->float('unit_cost');
                        $table->float('unit_price');
                        $table->float('unit_sale_price')->nullable()->default('0.00');
                        $table->boolean('pst');
                        $table->boolean('gst');
                        $table->integer('eco_fee_sku')->unsigned()->nullable();
                        $table->string('image');
                        $table->string('manufacturer')->nullable();
                        $table->string('model_number')->nullable();
                        $table->string('order_number')->nullable();
                        $table->float('last_purchase_vendor')->nullable();
                        $table->float('current_purchase_vendor')->nullable();
                        $table->timestamps();

                        $table->foreign('category_id')
                              ->references('id')->on('categories');
                        $table->foreign('eco_fee_sku')
                              ->references('sku')->on('inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventory');
    }
}
