<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;
    protected $table = 'kategori_beritas';
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function Kategori(){
        return $this->hasMany(kategoriberita::class, 'kategori_id');
    }
}
