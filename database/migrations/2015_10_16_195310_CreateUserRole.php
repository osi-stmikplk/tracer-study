<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->unique();
            $table->string('desc')->nullable()->default(null);
            // sebuah group mewarisi perizinan group yang lain?
            // misalnya group editor akan mewarisi perizinan milik group contributor
            // hanya satu group perizinan saja!
            $table->unsignedInteger('inherit_from_id')->nullable()->default(null);
//            $table->timestamps();
        });

        Schema::create('role_user', function(Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("user_id")->index();
            $table->unsignedInteger("role_id")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_user');
        Schema::drop('role');
    }
}
