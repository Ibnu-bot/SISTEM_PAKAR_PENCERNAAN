<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioritasGejala extends Model
{
    use HasFactory;

    protected $fillable = [
        'gejala_id',
        'penyakit_id',
        'nilai',
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
