<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = [
        'id_peminjaman',
        'tgl_kembali',
        'keterangan',
    ];

    /**
     * Get the peminjaman associated with the pengembalian.
     */
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
