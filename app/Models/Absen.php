<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absen extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_krs', 'id_mahasiswa', 'id_schedule', 'id_ta', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15', 'p16', 'p17', 'p18'
    ];

    protected $hidden = [
        
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'id_schedule','id');
    }

    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class,'id_mahasiswa','id');
    }
}
