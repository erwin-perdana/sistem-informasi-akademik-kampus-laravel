<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gedung extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'gedung',
    ];

    protected $hidden = [
        
    ];

    public function ruangans()
    {
        return $this->hasMany(Ruangan::class,'id_gedung');
    }

}
