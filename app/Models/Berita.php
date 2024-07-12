<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'kategori',
        'isi',
    ];

    public function kategoriberita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }
}
