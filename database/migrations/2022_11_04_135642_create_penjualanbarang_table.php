<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_penjualan');
            $table->date('tanggal');
            $table->foreignId('id_barang');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('diskon');
            $table->integer('subtotal');
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
        Schema::dropIfExists('penjualan_barang');
    }
};
