<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('name');
                        $table->string('company')->nullable();
                        $table->string('address')->nullable();
                        $table->string('city')->nullable();
                        $table->string('province')->nullable();
                        $table->string('country')->nullable();
                        $table->string('postal_code')->nullable();
                        $table->string('primary_phone');
                        $table->string('secondary_phone')->nullable();
                        $table->string('email')->nullable();
                        $table->text('comments')->nullable();
                        $table->string('gst_number');
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
        Schema::drop('vendor');
    }
}
