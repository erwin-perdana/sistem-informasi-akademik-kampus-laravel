<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_gedung', 'ruangan'
    ];

    protected $hidden = [
        
    ];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class,'id_gedung','id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'id_ruangan');
    }
}
