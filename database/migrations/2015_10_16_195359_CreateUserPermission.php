<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->unique();
            $table->string('desc')->nullable()->default(null);
//            $table->timestamps();
        });

        // polymorphic many to many
        // permission bisa dimiliki oleh User dan juga oleh Role
        Schema::create('permission_owner', function(Blueprint $table)
        {
            $table->increments("id");
            $table->unsignedInteger("permission_id")->index();
            $table->unsignedInteger("owner_id")->index();
            $table->string("owner_type")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_owner');
        Schema::drop('permission');
    }
}
