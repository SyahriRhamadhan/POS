<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount';

    protected $fillable = [
        'discount',
        'deskrpsi',
        'status',
        'tgl_mulai',
        'tgl_selesai',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'status' => 'string',
        'tgl_mulai' => 'date',
        'tgl_selesai' => 'date',
    ];
}
