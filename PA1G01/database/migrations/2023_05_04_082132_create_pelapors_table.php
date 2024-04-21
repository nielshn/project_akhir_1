<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelapor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('noTelepon');
            $table->string('judul_laporan');
            $table->string('email');
            $table->integer('kategoriPelapor_id');
            $table->string('unit_pelapor');
            $table->LongText('body');
            $table->string('bukti_pelapor')->nullable();
            $table->string('lampiran');
            $table->string('lampiran_path')->nullable();
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
        Schema::dropIfExists('pelapor');
    }
}
