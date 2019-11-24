<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('barcode');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('telpon');
            $table->string('kode_Pos');
            $table->text('deskripsi');
            $table->string('type_masuk');
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
        Schema::dropIfExists('produkins');
    }
}
