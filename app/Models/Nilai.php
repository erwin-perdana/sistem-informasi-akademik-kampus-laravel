<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilai extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_krs', 'id_mahasiswa', 'id_schedule', 'id_ta', 'nilai_absen', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_akhir', 'nilai_huruf'
    ];

    protected $hidden = [
        
    ];

    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class,'id_mahasiswa','id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'id_schedule','id');
    }
}
