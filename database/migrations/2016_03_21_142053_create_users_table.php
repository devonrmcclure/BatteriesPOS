<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Location codes:
            HO: 1
            RM: 2
            WR: 3
            GF: 6
            NM: 7
            MR: 8
        */
        Schema::create('users', function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('name');
                        $table->string('email');
                        $table->string('password', 60);
                        $table->string('location_code');
                        $table->string('gst_number');
                        $table->string('pst_number');
                        $table->boolean('admin');
                        $table->rememberToken();]
                        $table->string('api_token', 60)->unique();
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
        Schema::drop('users');
    }
}
