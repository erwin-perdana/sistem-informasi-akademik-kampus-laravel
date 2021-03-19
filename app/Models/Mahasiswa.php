<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nim', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'id_prodi', 'id_kelas', 'telp', 'email', 'photo'
    ];

    protected $hidden = [
        
    ];

    public function prodis()
    {
        return $this->belongsTo(Prodi::class,'id_prodi','id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }

    public function absen()
    {
        return $this->hasMany(Absen::class,'id_mahasiswa');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class,'id_mahasiswa');
    }
    
}
