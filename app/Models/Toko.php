<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'tipe',
        'created_at',
        'updated_at'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }

    public function gudang()
    {
        return $this->hasMany(Gudang::class, 'id_toko');
    }
}
