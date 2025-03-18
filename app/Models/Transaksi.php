<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_costumer',
        'id_discount',
        'id_keranjang',
        'id_user',
        'id_toko',
        'created_at',
        'updated_at'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'id_costumer');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'id_discount');
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_keranjang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
