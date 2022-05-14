<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            // $table->integer('kelas_id');
            // $table->integer('tahun_ajaran_id');
            $table->string('nama_siswa');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('jenis_kelamin',['Laki-Laki', 'Perempuan']);
            $table->string('agama');
            $table->string('telpon_siswa');
            $table->string('angkatan')->nullable();
            $table->string('nama_ortu');
            $table->string('telpon_ortu_siswa');
            $table->string('nama_siswa');
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
        Schema::dropIfExists('siswas');
    }
}
