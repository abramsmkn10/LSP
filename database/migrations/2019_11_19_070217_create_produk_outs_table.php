<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('barcode');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('telpon');
            $table->string('type_keluar');
            $table->string('kode_pos');
            $table->string('deskripsi');
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
        Schema::dropIfExists('produk_outs');
    }
}
