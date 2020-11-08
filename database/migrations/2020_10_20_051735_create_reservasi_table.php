<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('no_pemesan');
            $table->string('tgl_datang');
            $table->string('tgl_pulang');
            $table->integer('durasi');
            $table->string('status_pembayaran');
            $table->string('status_konfirmasi');
            $table->integer('total_bayar');
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
        Schema::dropIfExists('reservasi');
    }
}
