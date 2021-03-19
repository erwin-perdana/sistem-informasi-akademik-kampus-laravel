<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama', 'id_prodi', 'id_dosen', 'angkatan'
    ];

    protected $hidden = [
        
    ];
    
    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi','id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'id_dosen','id');
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class,'id_kelas');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'id_kelas');
    }
}
