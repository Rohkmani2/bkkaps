<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencaker', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->bigInteger('telepon');
            $table->string('ttl');
            $table->longText('alamat');
            $table->string('agama');
            $table->string('nik');
            $table->date('tgl_lahir');
            $table->integer('usia');
            $table->integer('tb');
            $table->integer('bb');
            $table->string('sekolah');
            $table->integer('thn_lulus');
            $table->string('jurusan');
            $table->string('password');
            $table->char('foto');
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
        Schema::dropIfExists('pencaker');
    }
}
