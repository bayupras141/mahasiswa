<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaMatakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->nullable();
            $table->unsignedBigInteger('matakuliah_id')->nullable();
            $table->integer('nilai');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
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
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
}
