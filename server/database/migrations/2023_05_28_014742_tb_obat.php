<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obat', function (Blueprint $table) {
            $table->id();
            $table->string('gambar', 100);
            $table->string('nama', 100);
            $table->foreignId('jenis_id')->references('id')->on('tb_jenis');
            $table->foreignId('kategori_id')->references('id')->on('tb_kategori');
            $table->foreignId('rak_id')->references('id')->on('tb_rak');
            $table->string('harga', 100);
            $table->string('stock', 100);
            $table->foreignId('keterangan_minum_id')->references('id')->on('tb_keterangan_minum');
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
        Schema::dropIfExists('tb_obat');
    }
}
