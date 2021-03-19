<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAkademik extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun_akademik', 'semester', 'status'
    ];

    protected $hidden = [
        
    ];
    
}
