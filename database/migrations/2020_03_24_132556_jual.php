<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul',200);
            $table->enum('kategori', array('mobil', 'motor'))->default('mobil');
            $table->enum('jenis', array('baru', 'bekas'))->default('baru');
            $table->text('deskripsi');
            $table->string('harga');
            $table->string('lokasi',200);
            $table->string('gambar');
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
        Schema::dropIfExists('jual');
    }
}
