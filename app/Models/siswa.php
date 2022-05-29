<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class siswa extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'nisn',
        'nis',
        'nama_siswa',
        'jenis_kelamin',
        'nik_siswa',
        'nokk_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'anak_ke',
        'alamat',
        'status',
        'asal_sekolah',
        'nomor_ujian_smp',
        'nomor_ijazah',
        'nomor_skhun',
        'nama_ortu',
        'telpon_siswa',
        'telpon_ortu_siswa',
        'bahasa_indonesia',
        'bahasa_inggris',
        'matematika',
        'ipa',
    ];
}
