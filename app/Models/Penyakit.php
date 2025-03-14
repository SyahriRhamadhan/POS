<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $fillable = ['nama_penyakit'];

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'penyakit_id');
    }
}
