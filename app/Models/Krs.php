<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Krs extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_mahasiswa', 'id_schedule', 'id_ta'
    ];

    protected $hidden = [
        
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'id_schedule','id');
    }
}
