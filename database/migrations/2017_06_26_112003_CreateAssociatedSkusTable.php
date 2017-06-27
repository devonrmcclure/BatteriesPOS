<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociatedSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associated_skus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sku')->unsigned();
            $table->integer('associated_sku')->unsigned();
            $table->string('type');
            $table->string('multiplyer');
            
            $table->foreign('sku')
                  ->references('sku')->on('inventory');

            $table->foreign('associated_sku')
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
        Schema::drop('associated_skus');
    }
}
