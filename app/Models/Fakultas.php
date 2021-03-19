<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fakultas extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fakultas',
    ];

    protected $hidden = [
        
    ];

    public function prodis()
    {
        return $this->hasMany(Prodi::class,'id_fakultas');
    }

    public function dosens()
    {
        return $this->hasMany(Dosen::class,'id_fakultas');
    }
}
