<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $table = 'costumer';

    protected $fillable = [
        'name',
        'alamat',
        'no_telp',
        'created_at',
        'updated_at'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_costumer');
    }
}
