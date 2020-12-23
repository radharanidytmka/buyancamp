<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentTokenToReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservasi', function (Blueprint $table) {
            $table->string('payment_token')->after('status_pembayaran')->nullable();
            $table->string('payment_url')->after('payment_token')->nullable();
            $table->index('payment_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservasi', function (Blueprint $table) {
            $table->dropColumn('payment_token');
            $table->dropColumn('payment_url');
        });
    }
}
