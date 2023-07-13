<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->bigInteger('telepon');
            $table->string('kota');
            $table->longText('alamat');
            $table->string('agama');
            $table->string('nik');
            $table->date('tgl_lahir');
            $table->integer('usia');
            $table->integer('tb');
            $table->integer('bb');
            $table->string('vaksin');
            $table->string('sekolah');
            $table->integer('thn_lulus');
            $table->longText('pengalaman');
            $table->string('jurusan');
            $table->char('cv');
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
        Schema::dropIfExists('lamaran');
    }
}
