<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'siswa_id', 'id')->orderBy('nama_siswa', 'ASC');
    }

    public function allsiswa()
    {
        return $this->hasMany(siswa::class, 'siswa_id', 'id');
    }

    // public function spp()
    // {
    //     return $this->hasMany(Spp::class, );
    // }
}
