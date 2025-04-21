<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanan";
    protected $fillable = [
        'id_users',
        'id_produk',
        'jumlah',
        'total_harga',
        'status_pesanan',
    ];

    function users(){
        return $this->belongsTo(User::class, 'id_users');
    }

    function produk(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
