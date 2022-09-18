<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalPembayaranToSpps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spps', function (Blueprint $table) {
            //
            $table->date('tanggal_pembayaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spps', function (Blueprint $table) {
            //
            $table->dropColumn('tanggal_pembayaran');
        });
    }
}
