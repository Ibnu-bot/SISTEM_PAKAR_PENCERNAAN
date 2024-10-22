<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    protected $table = 'diagnosis';
    protected $fillable = [
        'pasien_id',
        'gejala_id',
        'penyakit_id',
        'nilai_cf',
        'cf_hasil',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class,'pasien_id');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class,'penyakit_id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
}
