<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class)->withTrashed();
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
