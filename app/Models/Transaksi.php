<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'id_user',
        'id_pen_jwb',
        'barang_id',
        'batas_waktu',
        'status',
        'feedback',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function pen_jwb(){
        return $this->belongsTo(User::class, 'id_pen_jwb');
    }

}
