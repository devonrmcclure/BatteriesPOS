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
                        $table->string('description');
                        $table->integer('category_id')->unsigned();
                        $table->float('ep_cost_vendor');
                        $table->float('ep_cost_landed');
                        $table->float('ep_cost_wholesale');
                        $table->float('ep_cost_ad'); //associate dealer (leslie, tong)
                        $table->float('unit_cost');
                        $table->float('unit_price');
                        $table->float('unit_sale_price');
                        $table->boolean('pst');
                        $table->boolean('gst');
                        $table->string('supplier');
                        $table->string('brand');
                        $table->string('model');
                        $table->timestamps();

                        $table->foreign('category_id')
                              ->references('id')->on('categories');
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
