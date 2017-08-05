<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyCloseOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_close_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->float('cash');
            $table->float('interac');
            $table->float('visa');
            $table->float('mastercard');
            $table->float('other');
            $table->float('total');
            $table->integer('store_id')->unsigned();
            $table->timestamps();

            $table->foreign('store_id')
                  ->references('id')->on('users')
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
        Schema::drop('daily_close_outs');
    }
}

