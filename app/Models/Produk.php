<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'id_kategori',
        'harga',
        'lokasi',
        'id_toko',
        'qr_code',
        'created_at',
        'updated_at'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}

