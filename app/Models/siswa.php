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
        'nama_siswa',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'telpon_siswa',
        'angkatan',
        'nama_ortu',
        'telpon_ortu_siswa',
    ];
}
