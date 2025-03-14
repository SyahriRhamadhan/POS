<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gudang;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'tokos';
    protected $fillable = ['name', 'location', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gudangs()
    {
        return $this->hasMany(Gudang::class, 'id_toko');
    }
}
