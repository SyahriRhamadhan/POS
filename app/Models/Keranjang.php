<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = [
        'id_gudang',
        'jumlah',
        'id_diagnosis',
        'id_toko',
        'created_at',
        'updated_at'
    ];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'id_diagnosis');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}

