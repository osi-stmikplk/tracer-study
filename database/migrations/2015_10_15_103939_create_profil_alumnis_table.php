<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_alumni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap')->index();
            $table->string('gelar_depan', 50)->nullable();
            $table->string('gelar_belakang', 50)->nullable();
            $table->string('tempat_lahir',100);
            $table->date('tgl_lahir');
            $table->string('NIM',30)->index()->unique();
            $table->string('alamat_rumah',500);
            $table->string('provinsi');
            $table->string('nomor_hp');
            $table->string('pekerjaan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tempat_bekerja')->nullable();
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
        Schema::drop('profil_alumni');
    }
}
