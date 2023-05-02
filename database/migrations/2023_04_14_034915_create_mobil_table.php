<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_merk')->unsigned();
            $table->foreign('id_merk')->references('id')->on('jenis_kelamin')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_mobil', 255);
            $table->string('plat_nomor', 8);
            $table->string('harga_sewa', 50);
            $table->string('keterangan', 255);
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
        Schema::dropIfExists('mobil');
    }
}
