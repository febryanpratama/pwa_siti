<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGurupenerimaToSpps extends Migration
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
            $table->string('guru_penerima')->nullable()->after('bendahara_id');
            $table->string('guru_piket')->nullable()->after('guru_penerima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('spps', function (Blueprint $table) {
        //     $table->string('guru_penerima')->nullable()->after('bendahara_id');
        //     $table->string('guru_piket')->nullable()->after('guru_penerima');
        // });
    }
}
