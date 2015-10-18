<?php
/**
 * Post adalah polymorphic terhadap berbagai tipe inputan yang bercirikan sama: memiliki judul, isi dan author.
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->index();
            $table->text('isi');
            $table->unsignedInteger('author_id')->index();
            $table->unsignedInteger('owner_id')->index();
            $table->string('owner_type')->index();
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
        Schema::drop('post');
    }
}
