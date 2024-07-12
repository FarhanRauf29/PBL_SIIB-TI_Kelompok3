<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodis';
    protected $fillable = [
        'nama_prodi',
        'keterangan',
    ];

    public function prodi(){
        return $this->hasMany(prodi::class, 'prodi_id');
    }
}
