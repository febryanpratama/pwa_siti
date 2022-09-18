<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailKelas::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function detailKelas()
    {
        return $this->hasMany(DetailKelas::class);
    }

    public function spp()
    {
        return $this->hasMany(Spp::class);
    }
}
