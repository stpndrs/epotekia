<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbTransaksiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->references('id')->on('tb_transaksi');
            $table->foreignId('obat_id')->references('id')->on('tb_obat');
            $table->string('qty', 10);
            $table->string('sub_total', 20);
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
        Schema::dropIfExists('tb_transaksi_detail');
    }
}
