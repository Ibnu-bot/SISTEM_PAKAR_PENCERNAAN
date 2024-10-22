<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejalas';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
        
    ];

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'rules', 'id_gejala', 'id_penyakit');
    }

    public function prioritasgejala()
    {
        return $this->hasMany(PrioritasGejala::class, 'id_gejala');
    }
}
