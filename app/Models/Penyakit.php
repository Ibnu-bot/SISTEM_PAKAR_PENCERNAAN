<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakits';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'penanganan',
        'deskripsi',
    ];

    // Relasi ke AnalisisPenyakit
    public function analisis1()
    {
        return $this->hasMany(AnalisisPenyakit::class, 'penyakit1');
    }

    public function analisis2()
    {
        return $this->hasMany(AnalisisPenyakit::class, 'penyakit2');
    }

    // Relasi ke PrioritasPenyakit
    public function prioritas()
    {
        return $this->hasOne(PrioritasPenyakit::class, 'penyakit_id');
    }
    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'rules', 'id_penyakit', 'id_gejala');
    }
}
