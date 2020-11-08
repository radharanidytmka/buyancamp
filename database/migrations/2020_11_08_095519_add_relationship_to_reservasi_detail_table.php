<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToReservasiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservasi_detail', function (Blueprint $table) {
            $table->foreign('reservasi_id')
                ->references('id')->on('reservasi')
                ->onDelete('cascade');
            $table->foreign('fasilitas_id')
                ->references('id')->on('fasilitas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservasi_details', function (Blueprint $table) {
            $table->dropForeign('reservasi_details_reservasi_id_foreign');
            $table->dropForeign('reservasi_details_fasilitas_id_foreign');
        });
    }
}
