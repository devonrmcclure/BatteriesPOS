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
                        $table->integer('ep_cost_vendor');
                        $table->integer('ep_cost_landed');
                        $table->integer('ep_cost_wholesale');
                        $table->integer('ep_cost_ad'); //associate dealer (leslie, tong)
                        $table->integer('unit_cost');
                        $table->integer('unit_price');
                        $table->integer('unit_sale_price');
                        $table->boolean('pst');
                        $table->boolean('gst');
                        $table->string('supplier');
                        $table->string('brand');
                        $table->string('model');
                        $table->timestamp('updated_at');

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
