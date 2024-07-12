<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $fillable = [
        'nama',
        'nim',
        'prodi_id',
        'email',
        'no_telp',
    ];

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}
