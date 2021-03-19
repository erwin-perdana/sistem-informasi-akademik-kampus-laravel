<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nidn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'telp', 'email', 'photo', 'id_fakultas'
    ];

    protected $hidden = [
        
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class,'id_fakultas','id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class,'id_prodi');
    }

    public function prodi()
    {
    	return $this->hasOne(Prodi::class, 'ka_prodi');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'id_dosen');
    }
}
