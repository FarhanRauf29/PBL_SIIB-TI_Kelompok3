<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;
    protected $table = 'kategori_barangs';
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function kategoribarang(){
        return $this->hasMany(Kategoribarang::class, 'kategori');
    }
}
