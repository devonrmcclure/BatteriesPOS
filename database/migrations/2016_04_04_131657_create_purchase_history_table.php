<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sku');
            $table->string('description');
            $table->string('vendor');
            $table->string('brand');
            $table->float('ep_cost_vendor');
            $table->float('ep_cost_landed');
            $table->integer('quantity');
            $table->timestamp('goods_received');
            $table->timestamp('date_paid')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchase_history');
    }
}
