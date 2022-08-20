<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenerimaToTableSpps extends Migration
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
            $table->integer('guru_penerima_id')->nullable()->after('guru_id');
            $table->integer('guru_piket_id')->nullable();
            $table->integer('total_pembayaran')->default(0)->after('sisa_bayar');
            $table->enum('status_pembayaran', ['Belum Bayar', 'Lunas', 'Cicilan'])->default('Belum Bayar')->after('keterangan');
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
            $table->dropColumn('guru_penerima_id');
            $table->dropColumn('guru_piket_id');
            $table->dropColumn('total_pembayaran');
            $table->dropColumn('status_pembayaran');
        });
    }
}
