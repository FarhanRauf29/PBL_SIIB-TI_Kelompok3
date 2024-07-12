<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama',
        'kategori_id',
        'barcode',
        'stok',
        'status',
    ];

    public function kategoribarang(){
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function barang(){
        return $this->hasMany(barang::class, 'barang_id');
    }
}
