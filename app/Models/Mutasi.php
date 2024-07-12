<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasi';

    protected $fillable = [
        'id_barang',
        'asal',
        'tujuan',
        'jumlah',
        'tanggal',
    ];

    /**
     * Get the barang associated with the mutasi.
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
