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
            $table->integer('user_id')->nullable();
            $table->integer('nisn');
            $table->integer('nis');
            $table->string('nama_siswa');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('nik_siswa')->nullable();
            $table->string('nokk_siswa')->nullable();
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->integer('anak_ke')->nullable();

            $table->string('alamat');
            $table->string('asal_sekolah')->nullable();
            $table->string('nomor_ujian_smp')->nullable();
            $table->string('nomor_ijazah');
            $table->string('nomor_skhun')->nullable();

            $table->double('bahasa_indonesia')->nullable();
            $table->double('bahasa_inggris')->nullable();
            $table->double('matematika')->nullable();
            $table->double('ipa')->nullable();

            $table->string('telpon_siswa');
            $table->string('nama_ortu');
            $table->string('telpon_ortu_siswa');
            $table->enum('status', ['Gratis', 'Tidak Gratis'])->default('Tidak Gratis');
            // 
            $table->softDeletes();
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
