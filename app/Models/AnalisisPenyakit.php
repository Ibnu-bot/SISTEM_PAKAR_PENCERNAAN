<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisPenyakit extends Model
{
    use HasFactory;

    protected $fillable = ['penyakit1', 'penyakit2', 'nilai'];

    public function penyakit1()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit1', 'id');
    }

    public function penyakit2()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit2', 'id');
    }
}
