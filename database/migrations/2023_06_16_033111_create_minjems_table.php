<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinjemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minjems', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('dari_tanggal');
            $table->date('sampai_tanggal');
            $table->string('photo_ktp');
            $table->string('photo_jaminan');
            $table->text('alamat_lengkap');
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
        Schema::dropIfExists('minjems');
    }
}
