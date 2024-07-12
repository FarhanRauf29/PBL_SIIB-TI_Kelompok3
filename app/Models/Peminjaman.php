<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'email',
        'tgl_pinjam',
        'barcode',
        'deskripsi'
    ];

    /**
     * Get the mahasiswa associated with the peminjaman.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'email', 'email');
    }

    /**
     * Get the dosen associated with the peminjaman.
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'email', 'email');
    }

    /**
     * Get the staff associated with the peminjaman.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'email', 'email');
    }

    /**
     * Get the barang associated with the peminjaman.
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barcode', 'barcode');
    }

     /**
     * Get the pengembalian associated with the peminjaman.
     */
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_peminjaman');
    }
}
